<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends APP_Controller {
  public function __construct () {
    parent::__construct();
    if($this->pre) return redirect(base_url('dashboard'));
    
    $this->namespace = 'dashboard';
  }

  public function details($id_user=0)
  {

    if ($this->admin) {
      $this->namespace = 'admin';
      $this->data['header'] = false;
        $this->data['footer'] = false;
    } elseif(!$this->user) return redirect(base_url('login'));

    if(!$id_user) return $this->main('404');

    $this->load->model('UserModel','ProfileM');
    $this->ProfileM->id = $id_user;

    $this->data['user'] = $this->ProfileM->GetUser($id_user);
    if(!$this->data['user']) return $this->main('404');

    $this->view = 'user/profile/details';

    $this->data['breadcrumb'] = [
        ['title'=>'Usuarios', 'href'=>base_url('users') ],
        ['title'=> $this->data['user']->name_public ],
      ];

    $this->data['user']->activity_state = $this->ProfileM->ActivityStatus( $this->data['user']->activity );

    $this->load->model('GameModel','GameM');
    $this->data['user_games'] = $this->GameM->GetGames( [
        'where'=> [ " (t.id_user_1 = {$id_user} OR t.id_user_2 = {$id_user}) " ],
        'order_by' => [ ["date_deadline", "ASC"], ['id_game', 'ASC'] ],
        'limit' => 20
      ] );

    $this->data['stats'] = $this->ProfileM->GetStats();

    $this->main();
  }
  public function users($page = 1)
  {

    if ($this->admin) {
      $this->namespace = 'admin';
      $this->data['header'] = false;
        $this->data['footer'] = false;
    } elseif(!$this->user) return redirect(base_url('login'));
    
    $page = ((int)$page<=0) ? 1 : (int)$page;

    $this->view = 'user/profile/users';

    $this->data['breadcrumb'] = [
        ['title'=>'Usuarios' ],
      ];

    $params = ['limit'=>15, 'page'=>$page];
    if ($search = $this->input->get('s')) {
      $params['search'] = $search;
    }
    $this->data['users'] = $this->UserM->GetUsers($params);
    $this->data['search'] = ['action'=>base_url('users')];

    $this->main();
  }
}