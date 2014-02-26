<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Message_C extends RSIL_Controller{
        public function __construct() {
            parent::__construct();
         
         if(parent::IsLoginUser() == FALSE) redirect ('Home');
         $this->load->model('Model/User/User');
	 $this->load->model('Dao/User/UserDao');
         $this->load->model('Model/Message/Message');
         $this->load->model('Dao/Message/Message');
        }
        public function index(){
            
            $this->load->view('template/home/top');			
            $this->load->view('user/message');
            $this->load->view('template/home/bottom');

        }
    }
?>
