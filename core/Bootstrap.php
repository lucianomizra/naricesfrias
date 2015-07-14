<?php defined('PATH') OR exit('Error 1');
session_start();

define('AJAX', (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') );

date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_ALL, 'es_AR'); 
header('Content-Type: text/html; charset=UTF-8');

require_once( COREPATH.'Functions.php' );

// ruteo
$base_url = '';
$is_id = false;

if( isset( $_GET['r'] ) ) {

	$params = explode('/', $_GET['r']);

	if( count($params) >= 1 ) { $base_url .= BASE; }

	$controller = ucwords($params[0]);
	if( isset( $params[1] ) && $params[1] ) {

		if(is_numeric($params[1])){
			$action = 'action_index';
			$is_id = $params[1];
		} else {
			$action = 'action_'. $params[1];
		}
	}
	else
		$action = 'action_index';

	if( isset( $params[2] ) && is_numeric($params[2]) ) {
		$is_id = $params[2];
	}

} else {
	$controller = 'Home';
	$action = 'action_index';
}

// Incluye el controlador

if( ! file_exists(CTSPATH.$controller.'.php') ) {
	$controller = 'Home';
	$action = 'action_error404';
}

define('BASEURL', $base_url);
define('UPLOADSDIR', URL.'uploads/');

require_once( COREPATH.'Base.php');
require_once( COREPATH.'db/DBConnector.php');
require_once( COREPATH.'Model.php');

load('template'); 
require_once( CTSPATH.$controller.'.php' );
define('CONTROLLER', strtolower( $controller ));
define('ACTION', strtolower( $action ));
// Inicia el controlador
$user = (isset($_SESSION['user']) && isset($_SESSION['user']['id']) ) ? $_SESSION['user']['id'] : false;
define('USER',  $user);

$_controller = new $controller;
if(!method_exists ($controller,$action)) {
	$controller = 'Home';
	$action = 'action_error404';
}

define('NPAGE', strtolower( $controller.'_'.$action ));

$_controller->$action($is_id);