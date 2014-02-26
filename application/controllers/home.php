<?php
    class Home extends RSIL_Controller{
        function __construct(){
            parent::__construct();
            $this->load->helper('rsil_image');
   			$this->load->model('Model/User');
			$this->load->model('Dao/User/UserDao');
        }
        public function index(){
            $this->load->model('Dao/Content/SliderDao');
            $this->load->model('Model/Content/Slider');
            $Slider = $this->SliderDao->GetSliders();
            parent::CreateUserView('customer/index', $Slider);
        }
       /////////////////////////////////////////////////////////////////////////////////////////////////////
        public function Login(){
            //$User = new User();
			$User = $this->BindUser();
            $count = $this->UserDao->GetCount($User);
			//echo $count;
            if( $count > 0 && $User->GetUsername() != '' && $User->GetPassword() != '' ){
                foreach($this->UserDao->GetUsers($User) as $item){
                	$this->SetLogin($item);
                }
                
                redirect('status/status_c');
            }
            //echo $count;
           redirect('Home');
           
        }
        
        public function Logout(){
           	
            $cust = array(
                'id_user' => NULL,
                'type' => null,
                'user_name' => NULL
            );
            $this->session->set_userdata($cust);
            redirect('Home');
        }


        private function SetLogin($User){
            $cust = array(
            	'type' => 'user',
                'login' => TRUE,
                'id_user' => $User->getId(),
                'user_name' => $User->getUsername(),
            );
            $this->session->set_userdata($cust);            
        }

        //Method Binding ///////////////////////////////////

		public function BindUser(){
	        $User = new User();
	        $User->SetUsername($this->input->post('user'));
	        $User->SetPassword($this->input->post('pass'));
	        return $User;
    }


    }
?>