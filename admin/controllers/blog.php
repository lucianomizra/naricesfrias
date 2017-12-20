<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class blog extends AppController {

  public 
    $cfg = array();

  public function __construct()
  {
    parent::__construct();
    $this->cfg['title'] = $this->lang->line('Blog');
  }

  public function article()
  {
    $this->cfg['subtitle'] = $this->lang->line('Articulos');
    $this->cfg['folder'] = 14;
    $this->load->library("abm", $this->cfg);
  }

}