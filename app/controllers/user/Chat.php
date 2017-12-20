<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends APP_Controller {

  public function __construct () {
    parent::__construct();

    $this->load->model('ChatModel','ChatM');
  }

  public function index ( $id_chat = 0 ) {

    if(!$id_chat) return;

    $this->namespace = 'dashboard';
    $this->view = 'user/chat';


    if ($this->admin) {
      $this->namespace = 'admin';
      $this->data['header'] = false;
      $this->data['footer'] = false;
    } elseif(!$this->user) return;

    $this->ChatM->id = $id_chat;
    $this->data['chat'] = $this->ChatM->GetChat();

    if(! $this->data['chat'] ) return;

    if($this->input->post()) {
      // Envio de form
      if ( $this->input->post('disabled')!==null ) {
        $this->disabled_message();
      } else if ( $this->input->post('message') ) {
        $this->send_message();
      }

      $this->data['chat'] = $this->ChatM->GetChat();
      $this->load->view('section/user/chat',$this->data);

    } else if( !$this->input->is_ajax_request() || isset($this->input->request_headers('X-Pager-Header')['X-Pager-Header']) ) {
      // Vista maximizada
      $this->data['breadcrumb'] = [];
      if(!$this->admin)
        $this->data['breadcrumb'][] = ['title'=>'Tablero','href'=>base_url('dashboard')];


      if($this->data['chat']->id_league) {
        $this->load->model('GameModel','GameM');
        $this->data['league'] = $this->GameM->GetLeague($this->data['chat']->id_league);

        $this->data['breadcrumb'][] = ['title'=>'Liga','href'=>base_url('groups')];
        $this->data['breadcrumb'][] = ['title'=>'División '. $this->data['league']->division, 'href'=>base_url('division/'.$this->data['league']->id_division ) ];
        $this->data['breadcrumb'][] = ['title'=>'Grupo '.$this->data['league']->league, 'href'=>base_url('group/'.$this->data['league']->id_league) ];

      } elseif( $this->data['chat']->id_knockout_round ) {
        $this->load->model('GameModel','GameM');

        $this->data['knockout'] = $this->GameM->GetKnockout($this->data['chat']->id_knockout_round);

        $this->data['league'] = $this->GameM->GetLeague($this->data['knockout']->id_league);

        $this->data['breadcrumb'][] = ['title'=>'Liga','href'=>base_url('groups')];
        $this->data['breadcrumb'][] = ['title'=>'División '. $this->data['league']->division, 'href'=>base_url('division/'.$this->data['league']->id_division ) ];
        $this->data['breadcrumb'][] = ['title'=>'Grupo '.$this->data['league']->league, 'href'=>base_url('group/'.$this->data['league']->id_league) ];
        $this->data['breadcrumb'][] = ['title'=>'Cuadrangular', 'href'=>base_url('knockout/'.$this->data['knockout']->id_knockout) ];

      } elseif ( $this->data['chat']->id_tournament_round ) {

      }

      $this->data['breadcrumb'][] = ['title'=>'Chat'];

      return $this->main();
    } else {
      // Widget
      $this->data['header'] = false;
      $this->data['footer'] = false;
      $this->load->view('section/user/chat',$this->data);
    }
  }

  private function send_message() {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('message', 'nombre', 'trim|required',
    array(
      'required'=>'Mensaje vacio.',
    ));

    if ($this->form_validation->run() == FALSE) {
      // $data['error'] = 1;
      // $data['inputErrors'] = $this->form_validation->error_array();
      // return $this->json($data);
    } else {

      $m = [
        'message'=>$this->input->post('message'),
        'date_message'=>now(),
        'id_user'=>$this->user->id_user,
        'id_chat'=>$this->ChatM->id,
        'active'=> 1
      ];

      $this->db->insert('message', $m);

    }

  }

  private function disabled_message() {

    if ($this->admin) {
      $m = [
        'active'=>!$this->input->post('disabled')
      ];

      $this->db->where('id_message', $this->input->post('id_message'));
      $this->db->update('message', $m);
    }

  }
	

}