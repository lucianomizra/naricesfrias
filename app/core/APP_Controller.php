<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class APP_Controller extends CI_Controller
{

  public
    $data = array(),
    $namespace = 'main',
    $view = false,
    $logo = true,
    $user = false,
    $admin = false,
    $pre = false,
    $play = false,
    $routes = array(
      '404' => array('section'=> '404'),
      // 'landing' => array('section'=> 'landing', 'pager'=>'/'),
      // 'login' => array('section'=> 'login', 'pager'=>'login'),
      // 'forgot' => array('section'=> 'forgot', 'pager'=>'forgot'),
      // 'register' => array('section'=> 'register', 'pager'=>'register'),
      // 'dashboard' => array('section'=> 'dashboard', 'pager'=>'dashboard'),
      // 'reglamento' => array('section'=> 'reglamento', 'pager'=>'reglamento'),
      // 'contacto' => array('section'=> 'contacto', 'pager'=>'contacto'),
    );

  public function __construct()
  {

    parent::__construct();

    $this->load->config('app', TRUE);

    $this->load->library('EncryptionX', null, 'encryption');
    $this->encryption->key($this->config->item('encryption_key'));

    $this->load->library('Session');
    $this->load->helper('url');
    $this->load->helper('date');
    $this->lang->load('web');
    $this->load->model('DataModel','Data');
    $this->load->model('UserModel','UserM');
    
    if( $this->session->userdata('id_user') ) {
      $this->user = $this->UserM->GetUser($this->session->userdata('id_user'));
      if ($this->user) {
        $this->UserM->id = $this->user->id_user;
        $this->UserM->UpdateActivity();
      }
    }

    
    foreach ($this->router->routes as $key => $r) {
      $this->routes[$key] = ['section'=>$r, 'pager'=>$key];
    }

  }

  public function main( $route = 'landing' )
  {
    // if( !isset( $this->routes[$route] ) )
    //     return $this->error404();
    $data_section = $route;

    $this->data['section'] = $this->view ? $this->view : $route;

    $this->data['headers'] = isset($this->data['headers']) ? $this->data['headers'] : $this->Data->GetHeader();

    $this->load->view( "base", $this->data );
  }



  public function error404()
  {
    $this->namespace = 'landing';
    return $this->main('404');
  }

  public function json($json)
  {
    header('Content-Type: application/json');
    echo json_encode($json);
    return;
  }

}
