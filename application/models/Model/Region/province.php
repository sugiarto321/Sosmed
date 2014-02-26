<?php
	class Province extends CI_Model{
		private $id;
		private $name;
		private $Loaded;

		public function __construct(){
			parent::__construct();
		}

		public function SetLoaded($value){
			$this->Loaded = $value;
		}

		public function GetLoaded(){
			return $this->Loaded;
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

        public function ToArray(){
            $array = array(
                'province_id' => $this->id,
                'province_name' => $this->name
            );
            return $array;
        }
	}
?>