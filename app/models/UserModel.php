<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {
  public function __construct()
  {
    parent::__construct();
    $this->table = 'user';
    $this->id = $this->user ? $this->user->id_user : false;
  }

  public function ProcessLogin($x = false, $password = false)
  {  
    $sql = "select id_user from user where password = ? AND ";
    if(filter_var($x, FILTER_VALIDATE_EMAIL))
    {
      $sql .= "mail = ?";
    }
    else
    {
      $sql .= "name_public = ?";
    }
   	$r = $this->db->query($sql, [$password, $x])->row();

    return $r ? $r->id_user : false;

  }

  public function LoginUser($id_user)
  {  
    $user = $this->GetUser($id_user);

    if ($user) 
    {
      $this->session->set_userdata('id_user', $user->id_user);
    }

    return true;
  }

  public function UpdateLocation($id_user,$lat=false,$lng=false)
  {  
    $this->load->helper('cookie');
    $lat = $lat ? $lat : get_cookie('geo_lat');
    $lng = $lng ? $lng : get_cookie('geo_lng');

    if (!$lat || !$lng) return false;
    
    $location = [
      'lat'=>$lat,
      'lng'=>$lng,
    ];
    $location = $this->db->insert('location', $location);

    $this->db->where('id_user', $id_user );
    return $this->db->update( 'user', ['id_location'=>$this->db->insert_id()] );
  }

  public function GetUser($id = false, $mail = false)
  {

    $this->db->select("u.*");
    // $this->db->join('nz_file nz', 'nz.id_file = u.id_file', 'left');

    if( $id )
      $this->db->where("u.id_user = '{$id}'");
    if( $mail )  
      $this->db->where("u.mail = '{$mail}'");

    $this->db->select("l.lat, l.lng");
    $this->db->join('location l', 'l.id_location = u.id_location', 'left');

    $r = $this->db->get('user as u')->row();

    if ($r) {
      $r->first_name = htmlentities( $r->first_name );
      $r->last_name = htmlentities( $r->last_name );
      $r->user_name = $r->first_name . ' ' . $r->last_name[0];
      $r->phone = htmlentities( $r->phone );
      $r->public_data = explode(',',strip_tags( $r->public_data ));
      $r->lat = $r->lat ? $r->lat : -34.6104477;
      $r->lng = $r->lng ? $r->lng : -58.4104911;
    }

    return $r;
  }

  public function PublicDataUser($id) {
    $z = $this->GetUser($id);
    $r = New stdClass;

    $public_data = $z->public_data;

    foreach ($z as $key => $value) {
      if (in_array($key, $public_data)) {
        $r->$key = $value;
      }
    }

    return $r;
  }


  public function GetStats() {
    if(!$this->id) return;
    $this->db->select('SUM(t.points) as points');
    $this->db->select('SUM(t.wins) as wins');
    $this->db->select('SUM(t.loses) as loses');
    $this->db->select('SUM(t.draw) as draw');
    $this->db->select('SUM(t.goals_scored) as goals_scored');
    $this->db->select('SUM(t.goals_recieved) as goals_recieved');
    $this->db->select('SUM( wins + loses + draw ) as total_games');
    $this->db->select('SUM( goals_scored + goals_recieved ) as total_goals');
    $this->db->where('t.id_user', $this->id);
    $this->db->from('user_in_league t');

    $r = $this->db->get()->row();

    return $r;
  }
  
  public function UpdateActivity() {
    if(!$this->id) return;
    $this->db->where('t.id_user', $this->id);
    $this->db->update('user t', [ 'activity'=> now() ]);
  }
  

  public function ActivityStatus($last_connection) {
    if(!$last_connection) return 'danger';

    $last_connection = DateTime::createFromFormat('Y-m-d H:i:s', $last_connection)->getTimestamp();
    $now = DateTime::createFromFormat('Y-m-d H:i:s', now())->getTimestamp();
    $diff_min = ($now - $last_connection) / 60;

    if( $diff_min > 30 ) {
      return 'danger';
    } elseif( $diff_min > 10 ) {
      return 'warning';
    } else {
      return 'success';
    }
  }
  
  public function is_exist($user = false)
  {

    $this->db->select("u.*");
    $this->db->where("u.name_public = '{$user}'");
    $this->db->or_where("u.mail = '{$user}'");
    $r = $this->db->get('user as u')->row();

    return $r;
  }
  
  public function NewPasswd( $password, $uid ) {
    $this->DeletePasswrd($uid);
    $data = array(
        'password' => $password,
        'id_user' => $uid,
        'active' => 1,
    );
    $this->db->where('id_user', $uid);
    $r = $this->db->insert('user_account', $data); 
  }

  public function GetSubscriptions() {   
    $this->db->select("
      t.*
      ");
    $this->db->where("id_user = {$this->id}");

    $r = $this->db->get("plan_subcription as t")->result();
    return $r;
  }

  public function GetUsers($params = []) {   
    $this->db->select("
      t.id_user,
      t.name_public as name,
      t.activity,
      t.id_current_division,
      t.id_current_league,
      nz.file as file,
      d.division as division,
      l.league as league");
    $this->db->join('nz_file nz', 'nz.id_file = t.id_file', 'left');
    $this->db->join('division d', 'd.id_division = t.id_current_division', 'left');
    $this->db->join('league l', 'l.id_league = t.id_current_league', 'left');
    $this->db->from('user t');

    if (isset($params['search'])) {
      $this->db->where("t.name_public LIKE '%{$params['search']}%'");
    }

    $r = pagination_query( $this->db, $params );

    if ($r && $r['results']) {
      foreach ($r['results'] as $key => $value) {
        $r['results'][$key]->activity_state = $this->ActivityStatus($value->activity);
      }
    }
    return $r;
  }

  public function ShowInProfile( $field = false, $public_data=false ) { 
    $p = $public_data ? $public_data : $this->user->public_data;  
    return in_array($field, $p);
  }

  public function NotificationDb( $data = array(), $id_user = false )
  {
    $id_user = $id_user ? $id_user : $this->id;
    $notification = array(
      'id_user' => $id_user,
      'type' => isset($data['type']) ? $data['type'] : '',
      'icon' => isset($data['icon']) ? $data['icon'] : '',
      'data' => isset($data['data']) ? $data['data'] : '',
      'text' => isset($data['text']) ? $data['text'] : '',
      'link' => isset($data['link']) ? $data['link'] : false,
      'time' => time()
    );
    $sql = $this->db->insert_string("notification", $notification);
    
    $this->db->query($sql); 
  }
  public function NotificationMail( $data = array(), $id_user = false )
  {
    $id_user = $id_user ? $id_user : $this->id;

    $user = $this->GetUser($id_user);
    
    $this->load->model('Mailjetmodel','MJ');

    $this->MJ->PrepareMail( 'basic', [['Email' => $user->mail, 'Name' =>$user->name_public]], $data);
  }

  // public function check_plan ($plan,$permise) {
  //   if( !isset($plan->items->$permise) ) return false;
  //   if( isset($plan->items->$permise->value) ) return $plan->items->$permise->value;
  //   return false;
  // }


  public function GetPlans() {
    $this->db->select("
      t.*
      ");

    $this->db->where("active = 1");
    $this->db->where("id_plan != 1");

    $this->load->model('GameModel','GameM');

    $r = $this->db->get("plan as t")->result();

    foreach ($r as $key => $value) {
      $r[$key] = $this->parsePlan($value);
      if(!$r[$key]) unset($r[$key]);
    }

    // var_dump($r);
    return $r;
  }

  public function GetPlan($id_plan=false) {
    $this->db->select("
      t.*
      ");
    $this->db->where("id_plan = {$id_plan}");

    $r = $this->db->get("plan as t")->row();
    return $r ? $this->parsePlan($r) : false;
  }

  private function parsePlan($plan) {
    $now = DateTime::createFromFormat('Y-m-d H:i:s', now());
    $expiration = DateTime::createFromFormat('Y-m-d H:i:s', $this->user->payment_expiration );
    $expiration = ( $expiration->getTimestamp() > $now->getTimestamp() ) ? $expiration : $now;

    // forzar test fecha de expiracion de usuario
    // $expiration = DateTime::createFromFormat('Y-m-d H:i:s', '2018-12-22 00:00:00' );

    $this->load->model('GameModel','GameM');
    $dates_availables = $this->GameM->DatesAvailables( $expiration->format('Y-m-d H:i:s') );
    $dates_to_final = $this->GameM->DatesToFinal();
    $CurrentPhaseDate = $this->GameM->CurrentPhaseDate( $expiration->format('Y-m-d H:i:s') );

    $plan->plan_dates = $plan->months * 4;
    $plan->amount = $plan->id_plan==2 ? (int)$plan->amount/4 : (int)$plan->amount;
    $plan->plan_phases = $plan->months;
    $plan->incluid_dates = $dates_availables<=0 ? $plan->plan_dates + (4 - $CurrentPhaseDate ): $plan->plan_dates;
    if ($plan->incluid_dates<=0) {
      return false; //si no tiene fechas sacamos el plan
    }

    if ($plan->incluid_dates > $dates_to_final && $plan->id_plan!=5) {
      return false; // si el plan ya llega a la final no lo muestra a menos q sea hasta la final.
    } else if ($plan->id_plan==5 && $plan->incluid_dates >= $dates_to_final) {
      $plan->incluid_dates = $dates_to_final;
    }
    $plan->cost_for_date = $plan->amount&&$plan->plan_dates ? $plan->amount / $plan->plan_dates : $plan->amount;
    $plan->cost_for_finish_phase = $plan->id_plan==5 ? ($plan->incluid_dates - $plan->plan_dates + 4) * $plan->cost_for_date : ($plan->incluid_dates - $plan->plan_dates) * $plan->cost_for_date;  
    $plan->final_amount = $plan->id_plan==2 ? $plan->amount * $plan->incluid_dates : $plan->amount + $plan->cost_for_finish_phase;

    if ($plan->id_plan==5 && $plan->final_amount<189) {
      $plan->final_amount = 189;
    }
    
    return $plan;
  }



}
