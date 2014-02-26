<?php
    class slider_c extends RSIL_Controller{
        public function __construct(){
            parent::__construct();
            if(parent::IsLoginAdmin() == FALSE) redirect ('admin/x_admin');
            
            $this->load->model('Dao/Content/SliderDao');
            $this->load->model('Model/Content/Slider');
        }

        public function index(){
            $limit = 10;
            $Slider = $this->get_filter();
            $data['filter'] = $Slider;

            $count = $this->SliderDao->GetCount($Slider);
            $offset = parent::paging($limit, $count, $Slider);
            $orderList = array(
                            'ID' => 'slider_id',
                            'Slider Name' => 'slider_name',
            );

            parent::CreateOrderFromArray($orderList);
            $Sliders = $this->SliderDao->GetSliders($Slider, $limit, $offset, parent::getOrderBy(), parent::getOrder());
            $this->CreateView('content/Slider/index', $Sliders, 'content/slider_c/index', $data);
        }

        public function create(){
            if(parent::GetMethod()){
                $config = array(
                    array('field' => 'slider_name', 'label' => 'Slider Name', 'rules' => 'required')
                );

                $Slider = $this->BindDataToObject();
                if(parent::validate($config)){
                    $result = $this->InsertSlider($Slider);
                    if($result != FALSE){
                        redirect('content/slider_c/detail/'.$result->GetId());
                    }
                }
            }else{
                $Slider = new Slider();
            }
            parent::CreateView('content/Slider/input', $Slider, 'content/slider_c/create');
        }

        public function edit($id){
            if(parent::GetMethod()){
                $config = array(
                    array('field' => 'slider_name', 'label' => 'Slider Name', 'rules' => 'required')
                );
                $Slider = $this->BindDataToObject();

                if(parent::validate($config)){
                    $result = $this->UpdateSlider($Slider->GetId(), $Slider);
                    if($result == TRUE){
                        redirect('content/slider_c/detail/'.$Slider->GetId());
                    }
                }
            }else{
                $Slider = $this->SliderDao->GetSlider($id);
            }
            parent::CreateView('content/Slider/input', $Slider, 'content/slider_c/edit/'.$id);
        }

        public function delete($id){
            $this->DeleteSlider($id);
            redirect('content/Slider_c');
        }

        public function detail($id){
            $Slider = $this->SliderDao->GetSlider($id);
            parent::CreateView('content/Slider/detail', $Slider);
        }

        private function get_filter(){
            $Slider = new Slider();
            $Slider->SetId($this->input->get('slider_id'));
            $Slider->SetName($this->input->get('slider_name'));
            //$Slider->SetIsActive($this->input->get('isActive'));
            return $Slider;
        }

        private function BindDataToObject(){
            $Slider = new Slider();
            $Slider->SetId($this->input->post('slider_id'));
            $Slider->SetName($this->input->post('slider_name'));
            $Slider->SetPath('upload/Slider/');

            $name = $Slider->GetId() . $Slider->GetName() . '.jpg';
            $name = str_replace(' ', '', $name);

            $Slider->SetFullName($name);

            $Slider->SetIsActive(TRUE);
            return $Slider;
        }

        private function files_upload($Slider){
            $base_path = 'upload/Slider/';
            $name = $Slider->GetId() . $Slider->GetName() . '.jpg';
            $name = str_replace(' ', '', $name);
            parent::file_uploader('file', $base_path, $name);
        }

        ///////////////////////////////////////////////////////////////////////////////////////////////
        //Slider Crud///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////

        private function InsertSlider($Slider){
            $this->SliderDao->insert($Slider);
            $this->files_upload($Slider);
            return $Slider;
        }

        private function DeleteSlider($id){
            $this->SliderDao->delete($id);
        }

        private function UpdateSlider($id, $Slider){
            $this->DeleteSlider($id);
            return $this->InsertSlider($Slider);
        }

        ////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////
    }
    ?>