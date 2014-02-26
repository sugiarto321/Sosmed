<?php
	class StatusDao extends RSIL_Model{
    	public function Loader(){
			$this->load->library('RSILClause');
			$this->load->library('rsil_filter');
		}

		public function __construct(){
			parent::__construct();
			$this->Loader();
			parent::setTableName('status');
			$fields = array('id_status', 'id_user', 'status', 'tgal_post');
			parent::setFields($fields);
			parent::setPK('id_status');
			$this->load->model('Model/Status/Status');
		}
		public function insert($Status){
			return parent::insert($Status);
		}
		public function update($id, $Status){
			return parent::update($id, $Status);
		}
		public function delete($id){
			return parent::delete($id);
		}
		public function getStatus($id){
			return parent::getObject($id);
		}
		public function getStatuss($Status = NULL, $limit = NULL, $offset = NULL, $order = NULL, $sort = 'desc'){
			$criteria = $this->CreateCriteria($Status);
			return parent::getObjects($criteria, $limit, $offset, $order, $sort);
		}
		public function getCount($Status = NULL){
			$criteria = $this->CreateCriteria($Status);
			return parent::getCount($criteria);
		}

		public function CreateCriteria($Status){
			if($Status == NULL) return NULL;

			$criteria = NULL;
			$this->rsil_filter->ResetClause();

			if($Status->getId() != NULL || $Status->getId() != ''){
				$this->rsil_filter->Where('id_status', $Status->getId());
				$criteria = $this->rsil_filter->Extract();
			}
            if($Status->getUser()->getId() != NULL || $Status->getUser()->getId() != ''){
             	$this->rsil_filter->Where('id_user', $Status->getUser()->getId());
				$criteria = $this->rsil_filter->Extract();
				
            }
            $criteria = $this->rsil_filter->Extract();
			return $criteria;
		}

        public function ToObject($result){
                $Status = new Status();

                $Status->setId($result['id_status']);
//		
                $this->load->model('Model/User/User');
                $User = new User();
                $User->setId($result['id_user']);
                
                $Status->SetUser($User);

                $Status->setUser($User);
                $Status->setStatus($result['status']);
                $Status->setTglPost($result['tgal_post']);

        // 			
			return $Status;
		}
	} 
?>