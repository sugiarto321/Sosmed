<?php
	class RSIL_Controller extends CI_Controller{
		private $counter;
		private $search;
		private $order = array();
		private $paging;
        private $mode;
                
        public function setMode($value){
            $this->mode = $value;
        }
		public function getOrderBy(){
			return $this->rsil_paging->GetOrderBy();
		}

		public function getOrder(){
			return $this->rsil_paging->GetOrder();
		}

		public function paging($limit, $count, $search){
			$this->limit = $limit;
			$this->counter = $count;
			$this->search = $search->ToArray();

			$this->rsil_paging->setDisplay(5);
			$this->rsil_paging->setCount($this->counter);
			$this->rsil_paging->setLimit($this->limit);
			$this->rsil_paging->setFilter($this->search);
			$offset = $this->rsil_paging->getOffset();
			$this->paging = $this->rsil_paging->create_links();
                        if($offset < 0) $offset = 0;
			return $offset;
		}

		public function __construct(){
			parent::__construct();
			$this->load->library('rsil_paging');
            $this->load->library('upload');
		}

		public function CreateOrderLinks($label, $property){
			$this->order = array_merge($this->order, array($label => $this->rsil_paging->CreateOrderLinks($label, $property)));
		}

        public function CreateOrderFromArray($array){
            foreach($array as $key => $value){
                $this->order = array_merge($this->order, array($key => $this->rsil_paging->CreateOrderLinks($key, $value)));
            }
        }
		
		public function RSILUpload($key){
			$this->load->library('rsil_uploader');
			return $this->rsil_uploader->UploadToBase64($key);	
		}
		
		public function file_uploader($InputName, $target_directory, $name = NULL){
                        
                        $config['upload_path'] = $target_directory;
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['overwrite'] = TRUE;
                        
			if($name != NULL) $config['file_name'] = $name;
                        
                        $this->upload->initialize($config);

			if($this->upload->do_upload($InputName)){
				$this->upload->data();
				return true;
			}else{
				$error = array('error' => $this->upload->display_errors());
				return false;
			}
		}

		public function BeginTransaction(){
			$this->db->trans_start();
		}

		public function CommitTransaction(){
			$this->db->trans_complete();

			if($this->db->trans_status() == FALSE){
				$this->db->trans_rollback();
				return false;
			}else{
				$this->db->trans_commit();
				return true;
			}
		}

		public function validate($config){
			$this->form_validation->set_rules($config);
			if($this->form_validation->run()){
				return true;
			}
			return false;
		}

		public function CreateView($view, $object = null, $action = NULL, $other_data = NULL){
		    $data = $other_data;

			if($action != NULL){
				$data['Action'] = $action;
			}
                        
                        $data['mode'] = $this->mode;

			$data['rsil_order'] = $this->order;
			$data['rsil_page'] = $this->paging;
			
			$data['Model'] = $object;
                        $this->load->view('template/admin/top');
			$this->load->view($view, $data);
			$this->load->view('template/admin/bottom');
		}

		public function CreateUserView($view, $object = null, $action = NULL, $other_data = NULL){
		    $data = $other_data;
			$data['Action'] = $action;

			$data['rsil_order'] = $this->order;
			$data['rsil_page'] = $this->paging;
			
                        $data['Model'] = $object;
			$data['IsLogin'] = $this->IsLoginCustomer();
                        
                        $this->load->view('template/user/top', $data);
			$this->load->view($view, $data);
			$this->load->view('template/user/bottom');
		}

		public function GetMethod(){
			if($_SERVER['REQUEST_METHOD'] == 'POST') return true;
			return false;
		}
		
		public function RSIL_ERROR($err){
			if($err != NULL){
				foreach($err as $key=>$value){
					$this->form_validation->AddError($key, $value);
				}
			}
		}
                
        public function IsLoginAdmin(){
            if($this->session->userdata('type') == 'admin'){
                if($this->session->userdata('login') == TRUE){
                    return TRUE;
                }
            }
            return FALSE;
        }
         public function IsLoginUser(){
            if($this->session->userdata('type') == 'user'){
                if($this->session->userdata('login') == TRUE){
                    return TRUE;
                }
            }
            return FALSE;
        }
                
        public function IsLoginCustomer(){
            if($this->session->userdata('customer_id') != NULL || $this->session->userdata('customer_id') != ''){
                return TRUE;
            }
            return FALSE;
        }
	}
?>