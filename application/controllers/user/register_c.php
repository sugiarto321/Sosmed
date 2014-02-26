<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Register_C extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Model/User');
			$this->load->model('Dao/UserDao');
			$this->load->library('email');
		}
		function index(){
			$this->load->view('template/user/top');
			$this->load->view('user/register');
			$this->load->view('template/home/bottom');
		}
		function register(){
                        
			$User = $this->bindObject();
                        $this->form_validation->set_rules('user', 'User', 'required');
                        $this->form_validation->set_rules('pass', 'Pass', 'required|matches[passconf]');
                        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
                        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('nohp','Nohp','required|numeric');
                        //var_dump($this->form_validation->run());
                        //die;
                        if($this->form_validation->run() == TRUE){
                            
                            $this->UserDao->insert($User);
                            redirect('home/');
                        }
                        else {
                           // echo "gagal";
                           redirect(base_url('user/register_c'));
                        }
//                        $result = $this->UserDao->insert($User);
//                        
//                                try {
//                            if ($result) {
//                              $id = $this->db->insert_id();    
//                            } else {
//                              throw new Exception("hai");
//                            }
//                          } catch (Exception $e) {
//                            log_message('error',$e->getMessage());
//                            return;
//                          }
                        //$this->email->from('r8784336@gmail.com', 'Budi');
                        //$this->email->to($this->input->post('email')); 
                        
                        //$this->email->subject('Terima kasih telah mendaftar');
                        //$this->email->message('Hai sedang apa disana??');	
                        
                        //$this->email->send();
                        //echo $this->email->print_debugger();
                        
                        //die;
			
			
		}
		private function bindObject(){
			$User = new User();
			//$User->SetId('5');
			$User->SetUsername($this->input->post('user'));
			$User->SetPassword($this->input->post('pass'));
			$User->SetEmail($this->input->post('email'));
			$User->SetTgl_lahir($this->input->post('tgl'));
			$User->SetNo_hp($this->input->post('nohp'));
			$User->SetJenis_kelamin($this->input->post('Pria'));
			return $User;
			// echo var_dump($User);
			// die;	
		}
	}
	?>