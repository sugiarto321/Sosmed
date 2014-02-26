<?php
	class RSIL_Form_validation extends CI_Form_validation{
		public function AddError($key, $message){
			$this->_error_array[$key] = $message;
		}
	}
?>