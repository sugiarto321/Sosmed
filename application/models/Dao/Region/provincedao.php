<?php
	class ProvinceDao extends RSIL_Model{
		public function Loader(){
			$this->load->library('RSILClause');
			$this->load->library('rsil_filter');
		}
		public function __construct(){
			parent::__construct();
			$this->Loader();
			parent::setTableName('province');
			$fields = array('province_id', 'province_name');
			parent::setFields($fields);
			parent::setUnique(array('province_name'));
			parent::setPK('province_id');
			$this->load->model('Model/Region/Province');
		}
		public function insert($province){
			return parent::insert($province);
		}
		public function update($id, $province){
			return parent::update($id, $province);
		}
		public function delete($id){
			return parent::delete($id);
		}
		public function GetProvince($id){
			return parent::GetObject($id);
		}
		public function GetProvinces($province = NULL, $limit = NULL, $offset = NULL, $order = NULL, $sort = 'asc'){			
			$criteria = $this->CreateCriteria($province);
			return parent::GetObjects($criteria, $limit, $offset, $order, $sort);
		}
		public function GetCount($province = NULL){
			$criteria = $this->CreateCriteria($province);
			return parent::GetCount($criteria);
		}
		//////////////////////////////////////////////////////////
		public function CreateCriteria($province){
			if($province == NULL) return NULL;

			$criteria = NULL;
			$this->rsil_filter->ResetClause();

			if($province->GetId() != NULL || $province->GetId() != ''){
				if($criteria == NULL){
					$this->rsil_filter->Where('province_id', $province->GetId());
				}else{
					$this->rsil_filter->OrWhere('province_id', $province->GetId());
				}
				$criteria = $this->rsil_filter->Extract();
			}

			if($province->GetName() != NULL || $province->GetName() != ''){
				if($criteria == NULL){
					$this->rsil_filter->Like('province_name', $province->GetName());
				}else{
					$this->rsil_filter->OrLike('province_name', $province->GetName());
				}
				$criteria = $this->rsil_filter->Extract();
			}

			$criteria = $this->rsil_filter->Extract();

			return $criteria;
		}

		public function ToObject($result){
			$province = new Province();
			$province->SetId($result['province_id']);
			$province->SetName($result['province_name']);
			return $province;
		}

		///////////////////////////////////////////////////////////
	}
?>