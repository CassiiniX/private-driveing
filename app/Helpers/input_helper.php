<?php

function input_sanitize($input){	
	try{						
	 	return \Config\Database::connect()->escapeString(trim(htmlspecialchars($input)));		
	}catch(\Exception $e){
		return $input;
	}
}