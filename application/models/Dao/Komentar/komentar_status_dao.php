<?php
	class Komentar_Status_Dao extends RSIL_Model{
		public function Loader(){
			$this->load->library('RSILClause');
			$this->load->library('rsil_filter');
		}

		public function __construct(){
			parent::__construct();
			$this->Loader();
			parent::setTableName('komentar_status');
			$fields = array('id_komentar', 'id_status', 'isi_komentar', 'tgal_komentar','user' );
			parent::setFields($fields);
			parent::setPK('id_komentar');
			$this->load->model('Model/Komentar/Komentar_Status');
            parent::setAutoIncrement(TRUE);
		}

		public function insert($Komentar_Status){
			return parent::insert($Komentar_Status);
		}
		public function update($id, $Komentar_Status){
			return parent::update($id, $Komentar_Status);
		}
		public function delete($id){
			return parent::delete($id);
		}
		public function GetKomentar_Status($id){
			return parent::GetObject($id);
		}
		public function GetKomentar_Statuss($Komentar_Status = NULL, $limit = NULL, $offset = NULL, $order = NULL, $sort = 'asc'){
			$criteria = $this->CreateCriteria($Komentar_Status);
			return parent::GetObjects($criteria, $limit, $offset, $order, $sort);
		}
		public function GetCount($Komentar_Status = NULL){
			$criteria = $this->CreateCriteria($Komentar_Status);
			return parent::GetCount($criteria);
		}

		public function CreateCriteria($Komentar_Status){
			if($Komentar_Status == NULL) return NULL;

			$criteria = NULL;
			$this->rsil_filter->ResetClause();

			if($Komentar_Status->GetId() != NULL || $Komentar_Status->GetId() != ''){
				$this->rsil_filter->Where('Komentar_Status_id', $Komentar_Status->GetId());
				$criteria = $this->rsil_filter->Extract();
			}
            if($Komentar_Status->GetId_status() != NULL || $Komentar_Status->GetId_status() != ''){
                if($criteria == NULL){
                    $this->rsil_filter->Like('Id_status', $Komentar_Status->GetId_status());
                }else{
                    $this->rsil_filter->OrLike('Id_status', $Komentar_Status->GetId_status());
                }
                $criteria = $this->rsil_filter->Extract();
            }
            if($Komentar_Status->GetIsi_komentar() != NULL || $Komentar_Status->GetIsi_komentar() != ''){
                $this->rsil_filter->Where('Isi_komentar', $Komentar_Status->GetIsi_komentar());
                $criteria = $this->rsil_filter->Extract();
            }
            if($Komentar_Status->GetTgl_komentar() != NULL || $Komentar_Status->GetTgl_komentar() != ''){
                $this->rsil_filter->Where('tgl_komentar', $Komentar_Status->GetTgl_komentar());
                $criteria = $this->rsil_filter->Extract();
            }
			if($Komentar_Status->GetUser() != null || $Komentar_Status->GetUser() !=''){
				$this->rsil_filter->where('user',$Komentar_Status->GetUser());
				$criteria = $this->rsil_filter->extraxt();
			}
			
            $criteria = $this->rsil_filter->Extract();
			return $criteria;
		}

		public function ToObject($result){
			$Komentar_Status = new Komentar_Status();

			$Komentar_Status->SetId($result['Id_komentar']);
            $Komentar_Status->SetId_status($result['Id_status']);
            $Komentar_Status->SetIsi_komentar($result['Isi_komentar']);
            $Komentar_Status->SetTgl_komentar($result['Tgl_komentar']);
			$Komentar_Status->SetUser($result['User']);
			return $Komentar_Status;
		}

		///////////////////////////////////////////////////////////

	}
?>