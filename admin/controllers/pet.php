<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class pet extends AppController {

  public 
    $cfg = array();

  public function __construct()
  {
    parent::__construct();
    $this->cfg['title'] = $this->lang->line('Mascotas');
  }
  public function pets()
   {
    $this->cfg['subtitle'] = $this->lang->line('Mascotas');
    $this->cfg['folder'] = 9;
    $this->load->library("abm", $this->cfg);
  }

  public function type()
  {
    $this->cfg['subtitle'] = $this->lang->line('Especies');
    $this->cfg['folder'] = 10;
    $this->load->library("abm", $this->cfg);
  }

  public function races()
  {
    $this->cfg['subtitle'] = $this->lang->line('Razas');
    $this->cfg['folder'] = 11;
    $this->load->library("abm", $this->cfg);
  }

  public function status()
  {
    $this->cfg['subtitle'] = $this->lang->line('Estados');
    $this->cfg['folder'] = 12;
    $this->load->library("abm", $this->cfg);
  }

}