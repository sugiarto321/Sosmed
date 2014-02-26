<?php
    class Profile_C extends RSIL_Controller{

    
        public function __construct() {
            parent::__construct();
            //if(parent::IsLoginUser() == FALSE) redirect ('Home');
            $this->load->model('Model/User/User');
            $this->load->model('Dao/User/UserDao');
            //$this->load->model();
            
        }
        public function index(){
           
        }
        public function lihat($id){
            $this->load->view('template/home/top');
            $this->session->userdata['id_user'] == $id;
            $this->data['Model'] = $this->UserDao->getUser($id);
            
            
           $this->load->view('user/profile',  $this->data);
//           var_dump($this->data);
//           die;
            $this->load->view('template/home/bottom');
        }
        
    }?>