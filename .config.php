<?php

if ( ! defined('APP_MODE'))
{
	define('APP_MODE', $_SERVER['APP_MODE'] ?? $_SERVER['REDIRECT_APP_MODE'] ?? 'dev');
}

if ( ! defined('APP_MODULE'))
{
	define('APP_MODULE', $_SERVER['APP_MODULE'] ?? $_SERVER['REDIRECT_APP_MODULE'] ?? 'front');
}

$ds 								= DIRECTORY_SEPARATOR;
$cdr 								= $_SERVER['CONTEXT_DOCUMENT_ROOT'] ?? false;
if ($cdr)
{
	$cdr = rtrim($cdr,'/').'/';
	$www = '/www/';
	if(strpos($cdr, $www) !== FALSE)
	{
		$tmp = explode($www, $cdr);
		$cdr = $tmp[0].$www;
	}
}
else
{
	$cdr = '../';
}
$ci2_path 					= $_SERVER['CI2_PATH'] ?? realpath($cdr.'_ci') ?: realpath('../.ci');
$ci3_path 					= $_SERVER['CI3_PATH'] ?? realpath($cdr.'_ci3') ?: realpath('../.ci3');
$nza_path 					= $_SERVER['NZA_PATH'] ?? realpath($cdr.'_nz/current') ?: realpath('../.nz');

$system_path	 			= $system_path ?? $ci3_path;
$application_folder = $application_folder ?? 'app';

if ( ! defined('CONFIGPATH'))
{
	define('CONFIGPATH', realpath(dirname(__FILE__)).$ds.$application_folder.$ds.'config'.$ds);
}

date_default_timezone_set('America/Argentina/Buenos_Aires');

$assign_to_config['language'] = 'spanish';

$base_sys = $base_sys ?? $_SERVER['MAIN_URL'] ?? $_SERVER['REDIRECT_MAIN_URL'] ?? '';
if ( ! $base_sys)
{
	$host					= $_SERVER['HTTP_HOST'] ?? 'localhost';
	$scheme				= ($_SERVER['REQUEST_SCHEME'] ?? 'http');
	if ($host == 'localhost')
	{
		$pattern 		= '/index.php';
		$path 			= $_SERVER['PHP_SELF'] ?? '';
		if ($path && strpos($path, $pattern) !== FALSE)
		{
			$uri 			= explode($pattern, $path);
			$base_sys = $scheme.'://'.$host.$uri[0].'/';
		}
	}
}

$assign_to_config['base_sys'] = $base_sys;
$assign_to_config['base_url'] = $base_sys;

if (APP_MODULE == 'admin')
{
	$system_path  										= $ci2_path;
	$application_folder 							= 'admin';
	$assign_to_config['base_url'] 		= $_SERVER['ADMIN_URL'] ?? $_SERVER['REDIRECT_ADMIN_URL'] ?? ($base_sys ? $base_sys.'admin/' : false);
	$assign_to_config['uri_protocol']	= 'PATH_INFO';
}


if ( ! function_exists('upload'))
{
  function upload( $file = '', $global = false )
  {
    $CI =& get_instance();
    $version = $CI->config->item('upload-version', 'app');
    $folder = $CI->config->item('uploads-global', 'app');
    if(!$global || !$folder)
      $folder = $CI->config->item('uploads', 'app');
    $folder = str_replace(FCPATH, '', $folder);
    $base_url = $CI->config->item('base_sys');
    return $base_url . $folder . $file . ($file ? $version : '');
  }
}
