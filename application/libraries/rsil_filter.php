<?php
	class rsil_filter{
		private $data;

		public function create(){
			$this->data = new ArrayObject();
		}
		public function ResetClause(){
			$this->data = NULL;
		}
		public function Where($field, $value){
			if($this->data == NULL){
				$this->create();
			}
			$clause = new RSILClause();
			$clause->Clause = 'Where';
			$clause->Field = $field;
			$clause->Value = $value;
			$this->data->append($clause);
		}

		public function OrWhere($field, $value){
			if($this->data == NULL){
				$this->create();
			}
			$clause = new RSILClause();
			$clause->Clause = 'OrWhere';
			$clause->Field = $field;
			$clause->Value = $value;
			$this->data->append($clause);
		}
		public function Like($field, $value){
			if($this->data == NULL){
				$this->create();
			}
			$clause = new RSILClause();
			$clause->Clause = 'Like';
			$clause->Field = $field;
			$clause->Value = $value;
			$this->data->append($clause);
		}
		public function OrLike($field, $value){
			if($this->data == NULL){
				$this->create();
			}
			$clause = new RSILClause();
			$clause->Clause = 'OrLike';
			$clause->Field = $field;
			$clause->Value = $value;
			$this->data->append($clause);
		}

		public function Extract(){
			return $this->data;
		}

        public function CreateQuery($val){
            $this->data = $val;
            $CI = & get_instance();
            if($this->data != NULL){
            foreach($this->data as $item){
                switch($item->Clause){
                    case 'Where';
                    {
                        if($item->Value != NULL || $item->Value != '')
                            $CI->db->where($item->Field, $item->Value);
                    }; break;
                    case 'OrWhere';
                    {
                        if($item->Value != NULL || $item->Value != '')
                            $CI->db->or_where($item->Field, $item->Value);
                    }; break;
                    case 'Like';
                    {
                        if($item->Value != NULL || $item->Value != '')
                            $CI->db->like($item->Field, $item->Value);
                    }; break;
                    case 'OrLike';
                    {
                        if($item->Value != NULL || $item->Value != '')
                            $CI->db->or_like($item->Field, $item->Value);
                    }; break;
                }
            }
            }
        }
	}
?>