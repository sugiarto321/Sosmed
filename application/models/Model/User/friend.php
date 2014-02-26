<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Friend extends CI_Model{
        private $id;
        private $id_user;
        private $status;
        private $loaded;
        
        public function __construct() {
            parent::__construct();
        }

        public function GetId() {
            return $this->id;
        }

        public function setId($value) {
            $this->id = $value;
        }

        public function GetId_user() {
            return $this->id_user;
        }

        public function setId_user($value) {
            $this->id_user = $value;
        }

        public function GetStatus() {
            return $this->status;
        }

        public function setStatus($value) {
            $this->status = $value;
        }

        public function GetLoaded() {
            return $this->loaded;
        }

        public function setLoaded($value) {
            $this->loaded = $value;
        }
        public function ToArray(){
            $array = array(
                'id_friend' => $this->id,
                'id_user' =>  $this->user->GetId(),
                'status' => $this->status
            );
            return $array;
        }


    }
?>
