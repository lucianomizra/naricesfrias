<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends APP_Controller {
	public function __construct()
	{
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$method = $_SERVER['REQUEST_METHOD'];
		ini_set('allow_url_fopen', 1);
		ini_set('allow_url_include', 1);
		if($method == "OPTIONS") {
		  die();
		}

		parent::__construct();
	}
	public function notification_mail() {
		// $_POST = [
  //   	  'id_user'=>2,
	 //      'subject'=>'subject',
	 //      'title'=>'title',
	 //      'text'=>'text',
	 //      'button'=>'button',
	 //      'url'=>'https://google.com/',
		// ];

		if ($this->input->post('id_user') && $this->admin) {
		    $data = [
		      'subject'=> $this->input->post('subject'),
		      'title'=>   $this->input->post('title'),
		      'text'=>    $this->input->post('text'),
		      'button'=>  $this->input->post('button'),
		      'url'=>     $this->input->post('url'),
		    ];

			$this->UserM->NotificationMail($data,$this->input->post('id_user'));

			echo 1;
		}
	}
	public function notification_db() {
		// $_POST = [
  //   	'id_user'=>2,
  //     	'type'=>'success',
  //     	'icon'=>'exclamation',
  //     	'text'=>'text',
  //     	'data'=> json_encode([]),
  //     	'link'=>'link',
		// ];

		if ($this->input->post('id_user') && $this->admin) {
		    $data = [
		      'type'  => $this->input->post('type'),
		      'icon'  => $this->input->post('icon'),
		      'data'  => $this->input->post('data'),
		      'text'  => $this->input->post('text'),
		      'link'  => $this->input->post('link'),
		    ];

			$this->UserM->NotificationDb($data,$this->input->post('id_user'));

			echo 1;
		}
	}
}

