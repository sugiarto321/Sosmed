<?php
	class City extends CI_Model{
		private $Loaded;
		private $id;
		private $name;
		private $province;

		public function __construct(){
			parent::__construct();
		}

		public function SetId($value){
			$this->id = $value;
		}

		public function GetId(){
			return $this->id;
		}

		public function SetName($value){
			$this->name = $value;
		}
		public function GetName(){
			return $this->name;
		}

		public function SetProvince($value){
			$this->province = $value;
		}

		public function GetProvince(){
			$this->load->model('Dao/Region/ProvinceDao');
			$this->load->model('Model/Region/Province');

            if($this->province == NULL){
                $this->province = new Province();
            }

			if($this->province->GetLoaded() == FALSE){
			    if($this->province->GetId() != ''){
				    $province_id = $this->province->GetId();
				    $this->province = $this->ProvinceDao->GetProvince($province_id);
                }
				$this->province->SetLoaded(TRUE);
			}

			return $this->province;
		}

        public function ToArray(){
            $array = array(
                'city_id' => $this->id,
                'city_name' => $this->name,
                'province_id' => $this->province->GetId()
            );
            return $array;
        }
	}
?>