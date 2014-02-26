<?php
    class city_c extends RSIL_Controller{
        public function __construct(){
            parent::__construct();
            if(parent::IsLoginAdmin() == FALSE) redirect ('admin/x_admin');
            
            $this->load->model('Dao/Region/CityDao');
            $this->load->model('Dao/Region/ProvinceDao');
            $this->load->model('Model/Region/City');
            $this->load->model('Model/Region/Province');
        }

        public function index(){
            $limit = 10;
            $city = $this->get_filter();
            $data['filter'] = $city;

            $data['ProvinceCombo'] = $this->ProvinceCombo('province_id', $this->input->get('province_id'), TRUE);

            $count = $this->CityDao->GetCount($city);

            $offset = parent::paging($limit, $count, $city);
            $orderList = array(
                            'ID' => 'city_id',
                            'Province Name' => 'province_id',
                            'City Name' => 'city_name'
            );

            parent::CreateOrderFromArray($orderList);
            $citys = $this->CityDao->GetCitys($city, $limit, $offset, parent::getOrderBy(), parent::getOrder());
            $this->CreateView('region/city/index', $citys, 'region/city_c/index', $data);
        }

        public function create(){
            if(parent::GetMethod()){
                $config = array(
                    array('field' => 'city_name', 'label' => 'City Name', 'rules' => 'required')

                );
                $city = $this->BindDataToObject();
                $data['ProvinceCombo'] = $this->ProvinceCombo('province_id', $city->GetProvince()->GetId());

                if(parent::validate($config)){
                    $result = $this->CityDao->insert($city);
                    if($result != FALSE){
                        redirect('region/city_c/detail/'.$result->GetId());
                    }
                }
            }else{
                $city = new City();
                $data['ProvinceCombo'] = $this->ProvinceCombo('province_id', '');
            }
            parent::CreateView('region/city/input', $city, 'region/city_c/create', $data);
        }

        public function edit($id){

            if(parent::GetMethod()){
                $config = array(
                    array('field' => 'city_name', 'label' => 'City Name', 'rules' => 'required')
                );

                $city = $this->BindDataToObject();
                $data['ProvinceCombo'] = $this->ProvinceCombo('province_id', $city->GetProvince()->GetId());

                if(parent::validate($config)){
                    $result = $this->CityDao->update($city->GetId(), $city);
                    if($result == TRUE){
                        redirect('region/city_c/detail/'.$city->GetId());
                    }
                }
            }else{
                $city = $this->CityDao->GetCity($id);
                $data['ProvinceCombo'] = $this->ProvinceCombo('province_id', $city->GetProvince()->GetId());
            }

            parent::CreateView('region/city/input', $city, 'region/city_c/edit/'.$id, $data);
        }

        public function delete($id){
            $this->CityDao->delete($id);
            redirect('region/city_c');
        }

        public function detail($id){
            $city = $this->CityDao->GetCity($id);
            parent::CreateView('region/city/detail', $city);
        }

        private function get_filter(){
            $city = new City();
            $city->SetId($this->input->get('city_id'));
            $city->SetName($this->input->get('city_name'));

            $province = new Province();
            $province->SetId($this->input->get('province_id'));

            $city->SetProvince($province);

            return $city;
        }

        private function BindDataToObject(){
            $city = new City();
            $city->SetId($this->input->post('city_id'));
            $city->SetName($this->input->post('city_name'));
            $province = new Province();

            $province->SetId($this->input->post('province_id'));
            $city->SetProvince($province);

            return $city;
        }

        private function ProvinceCombo($name, $selected, $ShowAll = FALSE){
            $provinces = $this->ProvinceDao->GetProvinces();
            $combo = array();
            if($ShowAll == TRUE){
                $combo = array('' => '-- SHOW ALL --');
            }
            foreach($provinces as $item){
                $combo = array_merge($combo, array($item->GetId() => $item->GetName()));
            }
            return form_dropdown($name, $combo, $selected);
        }
    }
    ?>