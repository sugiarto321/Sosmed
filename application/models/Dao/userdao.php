<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class UserDao extends RSIL_Model{
            public function Loader(){
            $this->load->library('RSILClause');
            $this->load->library('rsil_filter');
    }
        public function __construct() {
            parent::__construct();
            $this->Loader();
            parent::setTableName('user');
            parent::setFields('id_user','username','password','email','tgl_lahir','no_hp','jenis_kelamin');
            parent::setPK('id_user');
            $this->load->model('Model/User');
        }
        
		public function insert($User){
			return parent::insert($User);
		}
		public function update($id, $User){
			return parent::update($id, $User);
		}
		public function delete($id){
			return parent::delete($id);
		}
		public function GetAdmin($id){
			return parent::GetObject($id);
		}
		public function GetAdmins($User = NULL, $limit = NULL, $offset = NULL, $order = NULL, $sort = 'asc'){
			$criteria = $this->CreateCriteria($User);
			return parent::GetObjects($criteria, $limit, $offset, $order, $sort);
		}
		public function GetCount($User = NULL){
			$criteria = $this->CreateCriteria($User);
			return parent::GetCount($criteria);
		}

		//////////////////////////////////////////////////////////
        public function CreateCriteria($User){
            if($User == NULL) return NULL;

            $criteria = NULL;
            $this->rsil_filter->ResetClause();

            if($User->GetId() != NULL || $User->GetId() != ''){
                $this->rsil_filter->Where('id_user', $User->GetId());
		$criteria = $this->rsil_filter->Extract();
            }

            if($User->GetUserName() != NULL || $User->GetUserName() != ''){
                $this->rsil_filter->Where('username', $User->GetUserName());
                $criteria = $this->rsil_filter->Extract();
            }

            if($User->GetPassword() != NULL || $User->GetPassword() != ''){
                $this->rsil_filter->Where('password', $User->GetPassword());
                $criteria = $this->rsil_filter->Extract();
            }
            $criteria = $this->rsil_filter->Extract();

            return $criteria;
	}
	
        public function ToObject($result){
            $User = new User();
            $User->SetId($result['id_user']);
            $User->SetUserName($result['username']);
            $User->SetPassword($result['password']);
            $User->setEmail($result['email']);
            $User->setTgl_lahir($result['tgl_lahir']);
            $User->setJenis_kelamin($result['jenis_kelamin']);
            return $User;
	}
    }
?>
