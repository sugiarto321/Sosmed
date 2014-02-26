<?php
    class Friend_c extends RSIL_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('Model/User/User');
            $this->load->model('Dao/User/UserDao');
        }
        public function index(){
            $this->load->view('template/home/top');
            $this->data['Model'] = $this->UserDao->getUsers();
//            var_dump($this->data);
//            die;
            $this->load->view('user/friend',$this->data);
            $this->load->view('template/home/bottom');
        }
        public function detail($id){
            
        }
        
    }
    ?>