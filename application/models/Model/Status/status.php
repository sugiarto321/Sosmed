<?php
	class Status Extends CI_Model{
		public function __Construct(){
			parent::__construct();
		}
		
		private $id;
		private $user;
		private $status;
		private $tglPost;
		private $Loaded;
                private $komentar;
        public function getId() {
        return $this->id;
       	}
        public function setId($value) {
            $this->id = $value;
        }
		
	public function getUser(){
            
            $this->load->model('Model/User/User');
            $this->load->model('Dao/User/UserDao');
                   
            if($this->user == NULL) $this->User = new User();
            
           
            if($this->user->getLoaded() == FALSE)
                {
                if($this->user->getId() != ''){        
                    $id_user = $this->user->getId();
                    $this->user = $this->UserDao->getUser($id_user);
                }
                $this->user->setLoaded(TRUE);
            }
            return $this->user;                
        }
	public function setUser($value) {
            $this->user = $value;
        }
		
		public function getStatus(){
			return $this->status;
		}
		public function setStatus($value) {
            $this->status = $value;
        }
		
		public function getTglPost(){
		return	$this->tglPost;
		}
		public function setTglPost($value) {
            $this->tglPost = $value;
        }
		
		public function getLoaded(){
                    return $this->loaded;
		}
		public function setLoaded($value) {
            $this->loaded = $value;
        }
        //////////////////////////one to many
        public function getKomentar() {
            $this->load->model('Dao/Komentar/Komentar_Status_Dao');
            $this->load->model('Model/Komentar/Komentar_Status');
            
            if($this->komentar == NUll && $this->id != ''){
                $komentar = new Komentar();
                $komentar->setIsi_komentar($this);
                $this->komentar = $this->Komentar_Status_Dao->getIsi_komentar($komentar);
                
            }
            return $this->komentar;
        }

        public function setKomentar($value) {
            $this->komentar = $value;
            foreach ($this->komentar as $item){
                $item->setIsi_komentar($this);
            }
        }

        		public function ToArray(){
			$array = array(
				'id_status' => $this->id,
				'id_user' => $this->user,
				'status' => $this->status,
				'tgal_post' => $this->tglPost
			);
			return $array;
		}
	}
	?>