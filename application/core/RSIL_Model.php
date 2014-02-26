<?php
    class RSIL_Model extends CI_Model{
        private $table_name;
        private $pk;
        private $unique = array();
		private $AutoIncrement;
		private $fields;
		private $error;
		
		public function AddError($key, $value){
			if($this->error == NULL){
				$this->error = array();
			}
			$this->error = array_merge($this->error, array($key => $value));
		}
		
		public function GetError(){
			return $this->error;
		}

		public function setFields($value){
			$this->fields = $value;
		}

		public function setAutoIncrement($value){
			$this->AutoIncrement = $value;
		}

		private function getLastID($model){
			$pk = $this->pk;
			if($this->AutoIncrement == TRUE){
				$id = '';
				$this->db->where('table_name', $this->table_name);
				foreach ($this->db->get('AutoIncrement')->result() as $item) {
					$model[$pk] = $item->prefix . $item->count_id;
					$item->count_id = $item->count_id + 1;
					$this->db->where('table_name', $this->table_name);
					$this->db->update('AutoIncrement', $item);
				}
			}
			return $model;
		}

        public function setTableName($value){
            $this->table_name = $value;
        }
        public function setPK($value){
            $this->pk = $value;
        }
        public function setUnique($value){
            $this->unique = $value;
        }
        public function __construct() {
            parent::__construct();
			$this->error = NULL;
        }

        private function has_primary($model){
            $pk = $this->pk;
            $this->db->where($pk, $model[$pk]);

            if($this->GetCount() > 0){
                return true;
            }
            return false;
        }

        private function has_unique($model){
        	
            $unique = $this->unique;
            
            if($unique == NULL)return false;
			
			foreach($unique as $key){
				$this->db->where($key, $model[$key]);
			}
            
            if($this->GetCount() > 0){
                return true;
            }
            return false;
        }

        public function insert($model){
            $model = $model->ToArray();

            $model = $this->getLastID($model);
            if($this->has_primary($model)){
                $this->AddError('PK_REG', 'PK has registered');
                return false;
            }
            if($this->has_unique($model)){
                $this->AddError('FK_REG', 'has unique');
                return false;
            }
            $model[$this->pk] = str_replace(" ", "", $model[$this->pk]);
            $this->db->insert($this->table_name, $model);
            $model = $this->ToObject($model);
            return $model;
        }

        public function update($id, $model){
            $model = $model->ToArray();

            $this->db->where($this->pk, $id);
            return $this->db->update($this->table_name, $model);
        }

        public function delete($id){
            $this->db->where($this->pk, $id);
            return $this->db->delete($this->table_name);
        }

        public function get($limit = NULL, $offset = NULL){
            if($limit != NULL){
                $query = $this->db->get($this->table_name, $limit, $offset);
            }else{
                $query = $this->db->get($this->table_name);
            }
            return $query;
        }

        public function GetCount($filter = NULL){
            if($filter != NULL){
            	$this->ExtractFilter($filter);
            }

            return $this->db->count_all_results($this->table_name);
        }

        public function GetObjects($filter = NULL, $limit = NULL, $offset = NULL, $order_by = NULL, $order = 'asc'){
        	$this->ExtractFilter($filter);

			if($order_by != null){
				$order_by = $this->cek_order($order_by);
				if($order == 'desc'){
					$this->db->order_by($order_by, $order);
				}
				$this->db->order_by($this->pk,'asc');
			}else{
				if($order == 'desc'){
					$this->db->order_by($this->pk, $order);
				}
				$this->db->order_by($this->pk, 'asc');
			}

            if($offset < 0) $offset = 0;
            $results = $this->get($limit, $offset)->result_array();
            return $this->ResultsToObjects($results);
        }

        private function ResultsToObjects($result){
            $objects = new ArrayObject();
            foreach($result as $item){
                $objects->append($this->ToObject($item));
            }
            return $objects;
        }

		private function cek_order($order_by = NULL){
			foreach ($this->fields as $field) {
				if($field == $order_by){
					return $order_by;
				}
			}
			return $this->pk;
		}

        public function GetObject($id){
            $this->db->where($this->pk, $id);
            foreach ($this->get()->result_array() as $item){
                return $this->ToObject($item);
            }
        }

		private function ExtractFilter($filter){
		    $this->load->library('RSILClause');
            $this->load->library('rsil_filter');
            $this->rsil_filter->CreateQuery($filter);
		}
    }

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
