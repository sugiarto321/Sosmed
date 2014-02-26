<?php
	class CityDao extends RSIL_Model{
		public function Loader(){
			$this->load->library('RSILClause');
			$this->load->library('rsil_filter');
		}
		public function __construct(){
			parent::__construct();
			$this->Loader();
			parent::setTableName('city');
			$fields = array('city_id', 'city_name', 'province_id');
			parent::setFields($fields);
			parent::setPK('city_id');
			$this->load->model('Model/Region/City');
		}

		public function insert($city){
			return parent::insert($city);
		}
		public function update($id, $city){
			return parent::update($id, $city);
		}
		public function delete($id){
			return parent::delete($id);
		}
		public function GetCity($id){
			return parent::GetObject($id);
		}
		public function GetCitys($city = NULL, $limit = NULL, $offset = NULL, $order = NULL, $sort = 'asc'){
			$criteria = $this->CreateCriteria($city);
			return parent::GetObjects($criteria, $limit, $offset, $order, $sort);
		}
		public function GetCount($city = NULL){
			$criteria = $this->CreateCriteria($city);
			return parent::GetCount($criteria);
		}

		//////////////////////////////////////////////////////////
		public function CreateCriteria($city){
			if($city == NULL) return NULL;

			$criteria = NULL;
			$this->rsil_filter->ResetClause();

			if($city->GetId() != NULL || $city->GetId() != ''){
				if($criteria == NULL){
					$this->rsil_filter->Where('city_id', $city->GetId());
				}else{
					$this->rsil_filter->OrWhere('city_id', $city->GetId());
				}
				$criteria = $this->rsil_filter->Extract();
			}

			if($city->GetName() != NULL || $city->GetName() != ''){
				if($criteria == NULL){
					$this->rsil_filter->Like('city_name', $city->GetName());
				}else{
					$this->rsil_filter->OrLike('city_name', $city->GetName());
				}
				$criteria = $this->rsil_filter->Extract();
			}

			if($city->GetProvince()->GetId() != NULL || $city->GetProvince()->GetId() != ''){
				$this->rsil_filter->Where('province_id', $city->GetProvince()->GetId());
				$criteria = $this->rsil_filter->Extract();
			}

			$criteria = $this->rsil_filter->Extract();
			return $criteria;
		}

		public function ToObject($result){
			$city = new City();
			$city->SetId($result['city_id']);
			$city->SetName($result['city_name']);

			$province = new Province();
			$province->SetId($result['province_id']);
			$city->SetProvince($province);

			return $city;
		}

		///////////////////////////////////////////////////////////
	}
?>