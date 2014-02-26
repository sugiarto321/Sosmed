<?php
	class rsil_uploader{
		private $files;
		
		public function __construct(){
			$this->files = NULL;
		}
		
		public function UploadToBase64($key){
			$name = $_FILES[$key]['name'];
			$size = $_FILES[$key]['size'];
			$temp = $_FILES[$key]['tmp_name'];
			$type = $_FILES[$key]['type'];
				
			$this->files = array(
				'FileName' => $name,
				'Size' => $size,
				'Content' => str_replace(" ", "", base64_encode(file_get_contents($temp))),
				'Type' => $type
			);
			
			return $this->files;
		}
		
		public function ClearCache(){
			$this->files = NULL;
		}
	}
?>