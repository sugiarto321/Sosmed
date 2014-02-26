<?php
	class Slider extends CI_Model{
		private $id;
		private $name;
        private $path;
        private $FullName;
        private $isActive;
		private $Loaded;

		public function __construct(){
			parent::__construct();
		}

        public function SetFullName($value)
        {
            $this->FullName = $value;
        }
        public function GetFullName()
        {
            return $this->FullName;
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

        public function SetPath($value){
            $this->path = $value;
        }
        public function GetPath(){
            return $this->path;
        }

        public function SetIsActive($value){
            $this->isActive = $value;
        }
        public function GetIsActive(){
            return $this->isActive;
        }

		public function SetLoaded($value){
			$this->Loaded = $value;
		}
		public function GetLoded(){
			return $this->Loaded;
		}

        public function ToArray(){
            $array = array(
                'slider_id' => $this->id,
                'slider_name' => $this->name,
                'path' => $this->path,
                'isActive' => $this->isActive,
                'slider_full_name' => $this->FullName
            );
            return $array;
        }
	}
?>