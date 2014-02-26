<?php
	class province_c extends RSIL_Controller{
		public function __construct(){
			parent::__construct();
                        if(parent::IsLoginAdmin() == FALSE) redirect ('admin/x_admin');
            
			$this->load->model('Dao/Region/ProvinceDao');
			$this->load->model('Model/Region/Province');
		}

        public function index(){
            $limit = 10;
            $province = $this->get_filter();
            $data['filter'] = $province;
            $count = $this->ProvinceDao->GetCount($province);
            $offset = parent::paging($limit, $count, $province);
            $orderList = array(
                            'ID' => 'province_id',
                            'Name' => 'province_name'
            );
            parent::CreateOrderFromArray($orderList);
            $provinces = $this->ProvinceDao->Getprovinces($province, $limit, $offset, parent::getOrderBy(), parent::getOrder());
			
            $this->CreateView('region/province/index', $provinces, 'region/province_c/index', $data);
        }

        public function create(){
            if(parent::GetMethod()){
                $config = array(
                    array('field' => 'province_name', 'label' => 'province Name', 'rules' => 'required')
                );
                $province = $this->BindDataToObject();
                if(parent::validate($config)){
                    $result = $this->ProvinceDao->insert($province);
					parent::RSIL_ERROR($this->ProvinceDao->GetError());
                    if($result != FALSE){
                        redirect('region/province_c/detail/'.$result->GetId());
                    }
                }
            }else{
                $province = new Province();
            }
            parent::CreateView('region/province/input', $province, 'region/province_c/create');
        }

        public function edit($id){
            if(parent::GetMethod()){
                $config = array(
                    array('field' => 'province_name', 'label' => 'province Name', 'rules' => 'required')
                );
                $province = $this->BindDataToObject();

                if(parent::validate($config)){
                    $result = $this->ProvinceDao->update($province->GetId(), $province);
					parent::RSIL_ERROR($this->ProvinceDao->GetError());
                    if($result == TRUE){
                        redirect('region/province_c/detail/'.$province->GetId());
                    }
                }
            }else{
                $province = $this->ProvinceDao->GetProvince($id);
            }
            parent::CreateView('region/province/input', $province, 'region/province_c/edit/'.$id);
        }

        public function delete($id){
            $this->ProvinceDao->delete($id);
            redirect('region/province_c');
        }

        public function detail($id){
            $province = $this->ProvinceDao->GetProvince($id);
            parent::CreateView('region/province/detail', $province);
        }

		private function get_filter(){
            $province = new Province();
			$province->SetId($this->input->get('province_id'));
			$province->SetName($this->input->get('province_name'));
            return $province;
        }

        private function BindDataToObject(){
            $province = new Province();
			$province->SetId($this->input->post('province_id'));
			$province->SetName($this->input->post('province_name'));
            return $province;
        }
    }
	?>