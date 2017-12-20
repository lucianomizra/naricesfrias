<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends AppController {

  public 
    $cfg = array();

  public function __construct()
  {
    parent::__construct();
    $this->cfg['title'] = $this->lang->line('Configuración');
  }

  public function country()
  {
    $this->cfg['subtitle'] = $this->lang->line('Países');
    $this->cfg['folder'] = 36;
    $this->load->library("abm", $this->cfg);
  }

  public function division()
  {
    $this->cfg['subtitle'] = $this->lang->line('Divisiones de liga');
    $this->cfg['folder'] = 37;
    $this->load->library("abm", $this->cfg);
  }

  public function phase()
  {
    $this->cfg['subtitle'] = $this->lang->line('Fases de torneos');
    $this->cfg['folder'] = 38;
    $this->load->library("abm", $this->cfg);
  }

  public function payment()
  {
    $this->cfg['subtitle'] = $this->lang->line('Tipos de suscripciones');
    $this->cfg['folder'] = 39;
    $this->load->library("abm", $this->cfg);
  }

  public function request()
  {
    $this->cfg['subtitle'] = $this->lang->line('Tipos de solicitudes');
    $this->cfg['folder'] = 40;
    $this->load->library("abm", $this->cfg);
  }

}