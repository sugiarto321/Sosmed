<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class x_admin extends RSIL_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Model/Admin');
        $this->load->model('Dao/AdminDao');
    }
    
    public function index(){
        if(parent::IsLoginAdmin() == TRUE) redirect ('content/slider_c');
        $this->load->view('admin/index');
        
       
        
    }
    
    public function Login(){
        $Admin = $this->BindAdmin();
        $count = $this->AdminDao->GetCount($Admin);
        //echo $count;
        if($count > 0 && $Admin->GetPassword() != '' && $Admin->GetUserName() != ''){
          //echo $count;
             $login = array(
                             'type' => 'admin',
                             'username' => $Admin->GetUserName(),
                             'login' => TRUE
                         );
             
             $this->session->set_userdata($login);
        	
        	redirect('content/slider_c');
		}
		//echo $count;
        redirect('admin');
    }
    
    public function Logout(){
        $login = array(
                'type' => NULL,
                'username' => NULL,
                'login' => FALSE
            );
        $this->session->unset_userdata($login);
        redirect('admin/x_admin');
    }
    
    public function BindAdmin(){
        $Admin = new Admin();
        $Admin->SetUserName($this->input->post('user'));
        $Admin->SetPassword($this->input->post('pass'));
        return $Admin;
    }
}

?>
