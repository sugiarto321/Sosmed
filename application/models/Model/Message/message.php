<?php
	class Message extends CI_Model{
		
		private $id;
		private $id_penerima;
		private $pesan;
		private $tgal;
		private $loaded;
		
		public function getId() {
                    return $this->id;
	                }

        public function setId($value) {
            $this->id = $value;
        }
		public function getId_penerima() {
                    return $this->id_penerima;
	                }

        public function setId_penerima($value) {
            $this->id_penerima = $value;
        }
		public function getPesan() {
                   return $this->pesan;
	                }

        public function setPesan($value) {
            $this->pesan = $value;
        }
		public function getTgal() {
                    return $this->tgal;
	                }

        public function setTgal($value) {
            $this->tgal = $value;
        }
		public function getLoaded() {
                    return $this->loaded;
	                }

        public function setLoaded($value) {
            $this->loaded = $value;
        }
		public function ToArray(){
			$array = array(
				'id_pengirim' => $this->id,
				'id_penerima' => $this->id_penerima,
				'pesan' => $this->pesan,
				'tgal' =>$this->tgal
			);
			return $array;
		}
	}?>