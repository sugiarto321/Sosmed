<?php
	class Foto Extends CI_Model{
		public function __Construct(){
			parent::__construct();
		}
		private $id;
		private $user;
		private $foto;
		private $tgal_upload;
		private $path;
		private $loaded;
                private $fotoname;
		
		public function getId() {
                    return $this->id;
	                }

                public function setId($value) {
                    $this->id = $value;
                }
                public function getUser() {
            
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

                public function setUser($user) {
                    $this->user = $user;
                }

    		public function getFoto(){
			$this->foto;
				}
		public function setFoto($value) {
                    $this->foto = $value;
                }
		public function getTgal_upload(){
			$this->tgal_upload;
				}
		public function setTgal_upload($value) {
                    $this->tgal_upload = $value;
                }
		public function getPath(){
			return $this->path;
				}
		public function setPath(){
			$this->path;
				}
                public function getLoaded(){
                        $this->loaded;
                            }
                public function setLoaded($value) {
                        $this->loaded = $value;
                 }
                public function getFotoname() {
                    return $this->fotoname;
                }

                public function setFotoname($fotoname) {
                    $this->fotoname = $fotoname;
                }

                public function ToArray(){
                        $array = array(
                                'id_foto' => $this->id,
                                'id_user' => $this->user,
                                'foto' => $this->foto,
                                'tgal_upload' => $this->tgal_upload,
                                'path' => $this->path,
                                'foto_name' => $this->fotoname
                        );
                        return $array;
                }
	}
	?>