<?php
	class AdminDao extends RSIL_Model{
		public function Loader(){
			$this->load->library('RSILClause');
			$this->load->library('rsil_filter');
		}

		public function __construct(){
			parent::__construct();
			$this->Loader();
			parent::setTableName('admin');
			$fields = array('id_admin', 'username', 'password');
			parent::setFields($fields);
			parent::setPK('id_admin');
			$this->load->model('Model/Admin');
		}

		public function insert($Admin){
			return parent::insert($Admin);
		}
		public function update($id, $Admin){
			return parent::update($id, $Admin);
		}
		public function delete($id){
			return parent::delete($id);
		}
		public function GetAdmin($id){
			return parent::GetObject($id);
		}
		public function GetAdmins($Admin = NULL, $limit = NULL, $offset = NULL, $order = NULL, $sort = 'asc'){
			$criteria = $this->CreateCriteria($Admin);
			return parent::GetObjects($criteria, $limit, $offset, $order, $sort);
		}
		public function GetCount($Admin = NULL){
			$criteria = $this->CreateCriteria($Admin);
			return parent::GetCount($criteria);
		}

		//////////////////////////////////////////////////////////
        public function CreateCriteria($Admin){
            if($Admin == NULL) return NULL;

            $criteria = NULL;
            $this->rsil_filter->ResetClause();

            if($Admin->GetId() != NULL || $Admin->GetId() != ''){
                $this->rsil_filter->Where('id_admin', $Admin->GetId());
		$criteria = $this->rsil_filter->Extract();
            }

            if($Admin->GetUserName() != NULL || $Admin->GetUserName() != ''){
                $this->rsil_filter->Where('username', $Admin->GetUserName());
                $criteria = $this->rsil_filter->Extract();
            }

            if($Admin->GetPassword() != NULL || $Admin->GetPassword() != ''){
                $this->rsil_filter->Where('password', $Admin->GetPassword());
                $criteria = $this->rsil_filter->Extract();
            }
            $criteria = $this->rsil_filter->Extract();

            return $criteria;
	}
	
        public function ToObject($result){
            $Admin = new Admin();
            $Admin->SetId($result['id_admin']);
            $Admin->SetUserName($result['username']);
            $Admin->SetPassword($result['password']);
            return $Admin;
	}
}
?>