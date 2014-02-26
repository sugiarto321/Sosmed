<?php
	class SliderDao extends RSIL_Model{
		public function Loader(){
			$this->load->library('RSILClause');
			$this->load->library('rsil_filter');
		}

		public function __construct(){
			parent::__construct();
			$this->Loader();
			parent::setTableName('slider');
			$fields = array('slider_id', 'slider_name', 'path', 'isActive', 'slider_full_name');
			parent::setFields($fields);
			parent::setPK('slider_id');
			$this->load->model('Model/Content/Slider');
		}

		public function insert($Slider){
			return parent::insert($Slider);
		}
		public function update($id, $Slider){
			return parent::update($id, $Slider);
		}
		public function delete($id){
		    $Slider = $this->GetSlider($id);
            $file = $Slider->GetPath() . $Slider->GetFullName();
            if(file_exists($Slider->GetPath() . $Slider->GetFullName()))
                unlink($file);
			return parent::delete($id);
		}
		public function GetSlider($id){
			return parent::GetObject($id);
		}
		public function GetSliders($Slider = NULL, $limit = NULL, $offset = NULL, $order = NULL, $sort = 'asc'){
			$criteria = $this->CreateCriteria($Slider);
			return parent::GetObjects($criteria, $limit, $offset, $order, $sort);
		}
		public function GetCount($Slider = NULL){
			$criteria = $this->CreateCriteria($Slider);
			return parent::GetCount($criteria);
		}

		//////////////////////////////////////////////////////////
		public function CreateCriteria($Slider){
			if($Slider == NULL) return NULL;

			$criteria = NULL;
			$this->rsil_filter->ResetClause();

			if($Slider->GetId() != NULL || $Slider->GetId() != ''){
				if($criteria == NULL){
					$this->rsil_filter->Where('slider_id', $Slider->GetId());
				}else{
					$this->rsil_filter->OrWhere('slider_id', $Slider->GetId());
				}
				$criteria = $this->rsil_filter->Extract();
			}

			if($Slider->GetName() != NULL || $Slider->GetName() != ''){
				if($criteria == NULL){
					$this->rsil_filter->Like('slider_name', $Slider->GetName());
				}else{
					$this->rsil_filter->OrLike('slider_name', $Slider->GetName());
				}
				$criteria = $this->rsil_filter->Extract();
			}

            if($Slider->GetIsActive() != NULL || $Slider->GetIsActive() != ''){
                $this->rsil_filter->Where('isActive', $Slider->GetIsActive());
                $criteria = $this->rsil_filter->Extract();
            }

			$criteria = $this->rsil_filter->Extract();
			return $criteria;
		}

		public function ToObject($result){
			$Slider = new Slider();
			$Slider->SetId($result['slider_id']);
			$Slider->SetName($result['slider_name']);
            $Slider->SetPath($result['path']);
            $Slider->SetIsActive($result['isActive']);
            $Slider->SetFullName($result['slider_full_name']);
			return $Slider;
		}
		///////////////////////////////////////////////////////////
	}
?>