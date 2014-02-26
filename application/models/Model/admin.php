<?php
class Admin extends CI_Model{
    private $Id;
    private $UserName;
    private $Password;
    private $Loaded;
    
    public function SetLoaded($value){
        $this->Loaded = $value;
    }
    public function GetLoaded(){
        return $this->Loaded;
    }
    public function SetId($value){
        $this->Id = $value;
    }
    public function GetId(){
        return $this->Id;
    }
    public function SetUserName($value){
        $this->UserName = $value;
    }
    public function GetUserName(){
        return $this->UserName;
    }
    public function SetPassword($value){
        $this->Password = $value;
    }
    public function GetPassword(){
        return $this->Password;
    }
    public function ToArray(){
        $array = array(
                    'id_admin' => $this->Id,
                    'username' => $this->UserName,
                    'password' => $this->Password
                );
        return $array;
    }
}

?>
