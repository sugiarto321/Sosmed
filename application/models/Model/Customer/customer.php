<?php
    class Customer extends CI_Model{
        public function __construct(){
            parent::__construct();
        }

        private $id;
        private $FirstName;
        private $LastName;
        private $Address;
        private $ZipCode;
        private $city;
        private $phone;
        private $email;
        private $password;
        private $Loaded;

        public function SetId($value){
            $this->id = $value;
        }
        public function GetId(){
            return $this->id;
        }

        public function SetFirstName($value){
            $this->FirstName = $value;
        }
        public function GetFirstName(){
            return $this->FirstName;
        }

        public function SetLastName($value){
            $this->LastName = $value;
        }
        public function GetLastName(){
            return $this->LastName;
        }

        public function SetAddress($value){
            $this->Address = $value;
        }
        public function GetAddress(){
            return $this->Address;
        }

        public function SetZipCode($value){
            $this->ZipCode = $value;
        }
        public function GetZipCode(){
            return $this->ZipCode;
        }

        public function SetPhone($value){
            $this->phone = $value;
        }
        public function GetPhone(){
            return $this->phone;
        }

        public function SetEmail($value){
            $this->email = $value;
        }
        public function GetEmail(){
            return $this->email;
        }

        public function SetPassword($value){
            $this->password = $value;
        }

        public function GetPassword(){
            return $this->password;
        }

        public function SetLoaded($value){
            $this->Loaded = $value;
        }
        public function GetLoaded(){
            return $this->Loaded;
        }

        public function ToArray(){
            $array = array(
                        'customer_id' => $this->id,
                        'FirstName' => $this->FirstName,
                        'LastName' => $this->LastName,
                        'Address' => $this->Address,
                        'zip_code' => $this->ZipCode,
                        'Phone' => $this->phone,
                        'email' => $this->email,
                        'pass' => $this->password
            );
            return $array;
        }
    }
?>