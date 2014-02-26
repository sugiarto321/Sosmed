<?php
	class FotoDao extends RSIL_Model{
            	public function Loader(){
			$this->load->library('RSILClause');
			$this->load->library('rsil_filter');
		}

		public function __construct(){
			parent::__construct();
			$this->Loader();
			parent::setTableName('foto');
			$fields = array('Id_foto', 'Id_user', 'foto', 'tgl_upload', 'path','file_name');
			parent::setFields($fields);
			parent::setPK('Id_foto');
			$this->load->model('Model/Status/Foto');
		}
		public function insert($Foto){
			return parent::insert($Foto);
		}
		public function update($id, $Foto){
			return parent::update($id, $Foto);
		}
		public function delete($id){
			return parent::delete($id);
		}
		public function getFoto($id){
			return parent::getObject($id);
		}
		public function getFotos($Foto = NULL, $limit = NULL, $offset = NULL, $order = NULL, $sort = 'asc'){
			$criteria = $this->CreateCriteria($Foto);
			return parent::getObjects($criteria, $limit, $offset, $order, $sort);
		}
		public function getCount($Foto = NULL){
			$criteria = $this->CreateCriteria($Foto);
			return parent::getCount($criteria);
		}

		public function CreateCriteria($Foto){
			if($Foto == NULL) return NULL;

			$criteria = NULL;
			$this->rsil_filter->ResetClause();

			if($Foto->getId() != NULL || $Foto->getId() != ''){
				$this->rsil_filter->Where('Id_foto', $Foto->getId());
				$criteria = $this->rsil_filter->Extract();
			}
                        if($Status->getUser()->getId() != NULL || $Foto->getUser()->getId() != ''){
                                  $this->rsil_filter->Where('id_user', $Foto->getUser()->getId());
                                  $criteria = $this->rsil_filter->Extract();

            }
            			
            $criteria = $this->rsil_filter->Extract();
			return $criteria;
		}

		public function ToObject($result){
			$Foto = new Foto();

			$Foto->SetId($result['Id_foto']);
                        
                        $this->load->model('Model/User/User');
                        $User = new User();
                        $User->setId($result['id_user']);

                        $Foto->SetUser($Foto);
                        $Foto->SetFoto($result['foto']);
                        $Foto->SetTgl_upload($result['tgl_upload']);
			$Foto->SetPath($result['Path']);
                        $Foto->setFotoname($result['foto_name']);
			
                        return $Foto;
		}

		///////////////////////////////////////////////////////////
		

        } ?>