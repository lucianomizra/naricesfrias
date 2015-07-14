<?php defined('PATH') OR exit('Error 1');
class Base {

	public function set_session($var,$values) {

		$_SESSION[$var] = $values;
	}

	public function data_user() {
		return isset($_SESSION['user']) ? $_SESSION['user'] : false;
	}

	public function load_model ($objeto,$parametros = null) {
		// if(!is_null($parametros)) { array_unshift($parametros,$this->con); } 
		// else { $parametros = array($this->con); }
		require_once(MDSPATH.$objeto.'.php');

		$objeto = $objeto.'_Model';

		$$objeto    = new $objeto($parametros);

		return $$objeto;
	}

	public function get_date() {
		return date('Y-m-d H:i:s');
	}

}