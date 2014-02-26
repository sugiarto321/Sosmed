<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Foto_c extends RSIL_Controller{
		function __construct(){
			parent::__construct();
                        if(parent::IsLoginUser() == FALSE) redirect ('home');
			$this->load->model('Model/Status/Foto');
			$this->load->model('Dao/Status/FotoDao');
                        
		}
                function index(){
                     $this->load->view('template/home/top');
                        $this->data['Model'] = $this->FotoDao->getFotos();
					
			$this->load->view('user/foto', $this->data);
			$this->load->view('template/home/bottom');
                }
                function create(){
                    
                }
                function delete($id){
                    
                }
	}
?>