<?php

include_once '.config.php';

if (APP_MODULE == 'iframe')
{
	$assign_to_config['base_url'] 		= $base_sys.'iframe/';
	$assign_to_config['uri_protocol']	= 'PATH_INFO';
}

$assign_to_config['cheat-button'] = (APP_MODE != 'online');

if (APP_MODE == 'online')
{
	$assign_to_config['log_threshold']	= 2;
	define('ENVIRONMENT', 'production');
}

if (APP_MODE == 'test')
{
	$assign_to_config['log_threshold']	= 2;
	define('ENVIRONMENT', 'development');
}
