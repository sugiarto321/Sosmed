<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 class User extends CI_Model{
     private $id;
     private $username;
     private $password;
     private $email;
     private $tgl_lahir;
     private $no_hp;
     private $jenis_kelamin;
     private $loaded;

     public function getLoaded() {
         return $this->loaded;
     }

     public function setLoaded($value) {
         $this->loaded = $value;
     }
     public function getId() {
         return $this->id;
     }

     public function setId($value) {
         $this->id = $value;
     }

     public function getUsername() {
         return $this->username;
     }

     public function setUsername($value) {
         $this->username = $value;
     }

     public function getPassword() {
         return $this->password;
     }

     public function setPassword($value) {
         $this->password = $value;
     }

     public function getEmail() {
         return $this->email;
     }

     public function setEmail($value) {
         $this->email = $value;
     }

     public function getTgl_lahir() {
         return $this->tgl_lahir;
     }

     public function setTgl_lahir($value) {
         $this->tgl_lahir = $value;
     }

     public function getNo_hp() {
         return $this->no_hp;
     }

     public function setNo_hp($value) {
         $this->no_hp = $value;
     }

     public function getJenis_kelamin() {
         return $this->jenis_kelamin;
     }

     public function setJenis_kelamin($value) {
         $this->jenis_kelamin = $value;
     }


          public function ToArray(){
         $array = array(
                'id_user' => $this->id,
                'username' => $this->username,
                'password' => $this->password,
                'email' => $this->email,
                'tgl_lahir' => $this->tgl_lahir,
                'no_hp' => $this->no_hp,
                'jenis_kelamin' => $this->jenis_kelamin
         );
         return $array;
     }     
 }
 
?>
