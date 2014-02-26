<?php
    class FriendDao extends RSIL_Model{
        public function Loader(){
            $this->load->library('RSILClause');
            $this->load->library('rsil_filter');
        }
         public function __construct() {
            parent::__construct();
            $this->Loader();
            parent::setTableName('friend');
            parent::setFields('id_friend','id_user','status');
            $this->load->model('Model/Friend');
        }
        
		public function insert($Friend){
			return parent::insert($Friend);
		}
		public function update($id, $Friend){
			return parent::update($id, $Friend);
		}
		public function delete($id){
			return parent::delete($id);
		}
		public function GetFriend($id){
			return parent::GetObject($id);
		}
		public function GetFriends($Friend = NULL, $limit = NULL, $offset = NULL, $order = NULL, $sort = 'asc'){
			$criteria = $this->CreateCriteria($Friend);
			return parent::GetObjects($criteria, $limit, $offset, $order, $sort);
		}
		public function GetCount($Friend = NULL){
			$criteria = $this->CreateCriteria($Friend);
			return parent::GetCount($criteria);
		}
	  public function CreateCriteria($Friend){
	            if($Friend == NULL) return NULL;
	
	            $criteria = NULL;
	            $this->rsil_filter->ResetClause();
	
	            if($Friend->GetId() != NULL || $Friend->GetId() != ''){
	                $this->rsil_filter->Where('id_friend', $Friend->GetId());
			$criteria = $this->rsil_filter->Extract();
	            }
	
	            if($Friend->GetId_user() != NULL || $Friend->GetId_user() != ''){
	                $this->rsil_filter->Where('id_user', $Friend->GetId_user());
	                $criteria = $this->rsil_filter->Extract();
	            }
	            if($Friend->GetStatus() != NULL || $Friend->GetStatus() != ''){
	                $this->rsil_filter->Where('status', $Friend->GetStatus);
	                $criteria = $this->rsil_filter->Extract();
	            }
	            
	
	            $criteria = $this->rsil_filter->Extract();
	
	            return $criteria;
		}
	     public function ToObject($result){
            $Friend = new Friend();
            $Friend->SetId($result['id_Friend']);
			$Friend->SetId_user($result['id_user']);
			$Friend->SetStatus($result['status']);
            return $Friend;
	}

    } 
?>