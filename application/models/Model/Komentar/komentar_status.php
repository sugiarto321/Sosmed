<?php
	class Komentar_Status extends CI_Model{
            public function __construct() {
                parent::__construct();
            }
		private $id;
		private $id_status;
		private $isi_komentar;
		private $tgl_komentar;
		private $user;
                private $loaded;
                public function getId() {
                    return $this->id;
                }

                public function setId($value) {
                    $this->id = $value;
                }

                public function getId_status() {
                    return $this->id_status;
                }

                public function setId_status($value) {
                    $this->id_status = $value;
                }

                public function getIsi_komentar() {
                    return $this->isi_komentar;
                }

                public function setIsi_komentar($value) {
                    $this->isi_komentar = $value;
                }

                public function getTgl_komentar() {
                    return $this->tgl_komentar;
                }

                public function setTgl_komentar($value) {
                    $this->tgl_komentar = $value;
                }
				
                public function getUser() {
                    return $this->user;
                }

                public function setUser($value) {
                    $this->user = $value;
                }
                public function getLoaded() {
                    return $this->loaded;
                }

                public function setLoaded($value) {
                    $this->loaded = $value;
                }
                public function ToArray(){
                    $array = array(
                        'id_komentar' => $this->id,
                        'id_status' => $this->id_status,
                        'isi_komentar' =>  $this->isi_komentar,
                        'tgl_komentar' => $this->tgl_komentar,
                        'user' => $this->user
                    );
                    return $array;
                }

	}
	?>