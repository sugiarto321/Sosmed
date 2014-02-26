<?php
	class Komentar_Foto_Dao extends RSIL_Model{
		public function Loader(){
			$this->load->library('RSILClause');
			$this->load->library('rsil_filter');
		}

		public function __construct(){
			parent::__construct();
			$this->Loader();
			parent::setTableName('Komentar_Foto');
			$fields = array('id_komentar', 'id_foto', 'isi_komentar', 'tgal_komentar','user' );
			parent::setFields($fields);
			parent::setPK('id_komentar');
			$this->load->model('Model/Komentar/Komentar_Foto');
            parent::setAutoIncrement(TRUE);
		}

		public function insert($Komentar_Foto){
			return parent::insert($Komentar_Foto);
		}
		public function update($id, $Komentar_Foto){
			return parent::update($id, $Komentar_Foto);
		}
		public function delete($id){
			return parent::delete($id);
		}
		public function GetKomentar_Foto($id){
			return parent::GetObject($id);
		}
		public function GetKomentar_Fotos($Komentar_Foto = NULL, $limit = NULL, $offset = NULL, $order = NULL, $sort = 'asc'){
			$criteria = $this->CreateCriteria($Komentar_Foto);
			return parent::GetObjects($criteria, $limit, $offset, $order, $sort);
		}
		public function GetCount($Komentar_Foto = NULL){
			$criteria = $this->CreateCriteria($Komentar_Foto);
			return parent::GetCount($criteria);
		}

		public function CreateCriteria($Komentar_Foto){
			if($Komentar_Foto == NULL) return NULL;

			$criteria = NULL;
			$this->rsil_filter->ResetClause();

			if($Komentar_Foto->GetId() != NULL || $Komentar_Foto->GetId() != ''){
				$this->rsil_filter->Where('id_komentar', $Komentar_Foto->GetId());
				$criteria = $this->rsil_filter->Extract();
			}
            if($Komentar_Foto->GetId_foto() != NULL || $Komentar_Foto->GetId_foto() != ''){
                if($criteria == NULL){
                    $this->rsil_filter->Like('Id_foto', $Komentar_Foto->GetId_foto());
                }else{
                    $this->rsil_filter->OrLike('Id_foto', $Komentar_Foto->GetId_foto());
                }
                $criteria = $this->rsil_filter->Extract();
            }
            if($Komentar_Foto->GetIsi_komentar() != NULL || $Komentar_Foto->GetIsi_komentar() != ''){
                $this->rsil_filter->Where('Isi_komentar', $Komentar_Foto->GetIsi_komentar());
                $criteria = $this->rsil_filter->Extract();
            }
            if($Komentar_Foto->GetTgl_komentar() != NULL || $Komentar_Foto->GetTgl_komentar() != ''){
                $this->rsil_filter->Where('tgl_komentar', $Komentar_Foto->GetTgl_komentar());
                $criteria = $this->rsil_filter->Extract();
            }
			if($Komentar_Foto->GetUser() != null || $Komentar_Foto->GetUser() !=''){
				$this->rsil_filter->where('user',$Komentar_Foto->GetUser());
				$criteria = $this->rsil_filter->extraxt();
			}
			
            $criteria = $this->rsil_filter->Extract();
			return $criteria;
		}

		public function ToObject($result){
			$Komentar_Foto = new Komentar_Foto();

			$Komentar_Foto->SetId($result['Id_komentar']);
            $Komentar_Foto->SetId_foto($result['Id_foto']);
            $Komentar_Foto->SetIsi_komentar($result['Isi_komentar']);
            $Komentar_Foto->SetTgl_komentar($result['Tgl_komentar']);
			$Komentar_Foto->SetUser($result['User']);
			return $Komentar_Foto;
		}

		///////////////////////////////////////////////////////////

	}
?>