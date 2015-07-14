<?php
class Validation {

	public function str ( $str, $type = 'len' ) {
		switch  ($type) {
			case 'len':
				if( strlen($str) > 1 ) return true;
			break;
			case 'num':
				if( is_numeric( $str ) ) return true;
			break;
			case 'string':
				if( is_string( $str ) ) return true;
			break;
			case 'bool':
				if( is_bool( $str ) ) return true;
			break;
			case 'true':
				if( $str === true ) return true;
			break;
			case 'email':
				if( filter_var($str, FILTER_VALIDATE_EMAIL) ) return true;
			break;
		}
		return false;
	}
	
	public function multi ( $array ) {
		$errors = array();

		foreach ($array as $field => $data) {
			if( ! isset($data['value']) || ! $this->str( $data['value'], $data['type'] ) ) $errors[] = $field;
		}

		return count($errors) ? $errors : true;
	}

}