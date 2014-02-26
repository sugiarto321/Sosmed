<?php
	function rsil_base64image($type, $content, $attributes = NULL){
		$attribute = '';
		if($attributes != NULL){
			foreach($attributes as $key=>$value){
				$attribute .= ' ' .$key . '=' . $value . ' ';
			}
		}
		$src = 'data:' . $type . ';base64,' . $content;
		return '<img src="'. $src . '" '. $attribute .' />';
	}
?>