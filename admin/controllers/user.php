<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class user extends AppController {

  public 
    $cfg = array();

  public function __construct()
  {
    parent::__construct();
    $this->cfg['title'] = $this->lang->line('Usuarios');
  }



  public function lista()
  {
    $this->cfg['subtitle'] = $this->lang->line('Usuarios');
    $this->cfg['folder'] = 7;
    $this->load->library("abm", $this->cfg);
  }

}