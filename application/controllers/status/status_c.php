<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Status_c extends Rsil_Controller{
		function __construct(){
			parent::__construct();
                        if(parent::IsLoginUser() == FALSE) redirect ('Home');
                        $this->load->model('Model/Status/Status');
			$this->load->model('Dao/Status/StatusDao');
                        $this->load->model('Model/User/User');
                        $this->load->model('Dao/User/UserDao');
		}
                function index(){
			
                        $this->load->view('template/home/top');
                        $this->data['Model'] = $this->StatusDao->getStatuss();
						
			$this->load->view('user/status', $this->data);
			$this->load->view('template/home/bottom');
                }

                function create(){
			$status = $this->bindObject();
			$this->StatusDao->insert($status);
			redirect('status/status_c/index');
		}
	    function delete($id){
            $this->StatusDao->delete($id);
            redirect('status/status_c');
        }
		private function bindObject(){
			$Status = new Status();
			$Status->setUser($this->session->userdata['id_user']);
			$Status->setStatus($this->input->post('status'));
			$Status->setTglPost(date('Y-m-d'));
			return $Status;
		}
	}
?>