<?php
	class Komentar_foto extends CI_Model{
		public function __construct(){
			parent::__construct();
		}
		private $id;
		private $id_foto;
		private $isi_komentar;
		private $tgl_komentar;
        private $user;
        private $loaded;
		
		public function GetId() {
                    return $this->id;
                }

                public function SetId($value) {
                    $this->id = $value;
                }

                public function GetId_foto() {
                    $this->load->model('Dao/');
                    return $this->id_foto;
                }

                public function SetId_foto($value) {
                    $this->id_foto = $value;
                }

                public function GetIsi_komentar() {
                    return $this->isi_komentar;
                }

                public function SetIsi_komentar($value) {
                    $this->isi_komentar = $value;
                }

                public function GetTgl_komentar() {
                    return $this->tgl_komentar;
                }

                public function SetTgl_komentar($value) {
                    $this->tgl_komentar = $value;
                }
               public function GetUser() {
                    return $this->user;
                }

                public function SetUser($value) {
                    $this->user = $value;
                }
                public function GetLoaded() {
                    return $this->loaded;
                }

                public function SetLoaded($value) {
                    $this->loaded = $value;
                }
                public  function ToArray(){
                    $array = array(
                        'id_komentar' => $this->id,
                        'id_foto' => $this->id_foto,
                        'isi_komentar' => $this->isi_komentar,
                        'tgl_komentar' => $this->tgl_komentar,
                        'user' => $this->user
                    );
                    return $array;
                }
                }?>