<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PetModel extends CI_Model
{
  public $id = 0;

  public function __construct()
  {
    $this->load->helper('text');

		parent::__construct();
  }

  public function GetPet($id_pet=false) {
    $this->db->select("
      t.id_pet,
      t.id_user,
      t.name,
      t.id_gallery as gallery,
      t.description,
      t.gender,
      t.created_at,
      t.updated_at,
    ");

    $this->db->select("l.lat, l.lng, l.keyword as location_keyoword");
    $this->db->join('location l', 'l.id_location = t.id_location', 'left');

    $this->db->select("ps.status, ps.title as status_title, ps.details as status_details, ps.id_status");
    $this->db->join('pet_status ps', 'ps.id_status = t.id_status', 'left');

    $this->db->select("pt.type, pt.id_type");
    $this->db->join('pet_type pt', 'pt.id_type = t.id_type', 'left');

    $this->db->select("pr.race, pr.id_race");
    $this->db->join('pet_race pr', 'pr.id_race = t.id_race', 'left');

    $this->db->where('t.active',1);
    $this->db->where('t.id_pet',$id_pet);
    $this->db->from('pet t');
    $r = $this->db->get()->row();

    if ($r) {
      $r->gallery = $this->Data->Gallery($r->gallery);
      $r->file = count($r->gallery) ? $r->gallery[0]->file : false;
      $r->description = strip_tags($r->description);
      $r->name = $r->name ? strip_tags($r->name) : $r->race . ' N/N';
      $r->gender = $r->gender == 'm' ? 'Macho' : 'Hembra';
    }

    return $r;

  }
  public function GetPets($params = []) {

    $order_by = isset($params['order_by']) ? $params['order_by'] : false;
    $where = isset($params['where']) ? $params['where'] : false;
    $limit = isset($params['limit']) ? $params['limit'] : 1000;
    $page = isset($params['page']) ? $params['page'] : 1;
    $start = ($page - 1) * $limit;
    $page_info = isset($params['page_info']) ? $params['page_info'] : false;

    $this->db->select("
      t.id_pet,
      t.name,
      t.id_gallery as gallery,
      t.description,
      t.id_user,
    ");

    $this->db->select("l.lat, l.lng");
    $this->db->join('location l', 'l.id_location = t.id_location', 'left');

    $this->db->select("ps.status, ps.title as status_title, ps.details as status_details");
    $this->db->join('pet_status ps', 'ps.id_status = t.id_status', 'left');

    $this->db->select("pr.race");
    $this->db->join('pet_race pr', 'pr.id_race = t.id_race', 'left');

    $this->db->where('t.active',1);
    $this->db->order_by('t.created_at','DESC');
    if ($where) {
      if(is_string($where)) $where = [ $where ];

      foreach ($where as $key => $w) {
        switch ($w) {
          case 'my_pets':
            $this->db->where("(t.id_user = {$this->user->id_user})");
            break;
          default:
            $this->db->where($w);
            break;
        }
      }
    }

    if(!$page_info) {
      $this->db->limit($limit,$start);
    }
    $this->db->from("pet t");

    if($page_info) {
      $r= array();

      $tempdb = clone $this->db;
      $count = $tempdb->get()->num_rows();

      $more = $count - $start - $limit;

      $this->db->limit($limit,$start);
      $r  = $this->db->get()->result();

    } else {
      $r = $this->db->get()->result();
    }

    if ($r) {
      foreach ($r as $key => $value) {
        $r[$key]->gallery = $this->Data->Gallery($value->gallery);
        $r[$key]->file = count($r[$key]->gallery) ? $r[$key]->gallery[0]->file : false;
        $r[$key]->description = character_limiter(strip_tags($value->description), 100, '...');
        $r[$key]->name = $value->name ? strip_tags($value->name) : $value->race.' N/N';
        $r[$key]->full_link = base_url('pet/details/'.$value->id_pet);
        $r[$key]->canonical_link = base_url('pet/details/'.$value->id_pet);
      }
    }

    return $r;
  }

  public function GetMapPets($params=[]) {
    $r = $this->GetPets($params);

    foreach ($r as $key => $value) {
      $r[$key]->file = $this->Thumb($value->file,80,80);
    }
    return $r;
  }

  public function Thumb($file,$w=500,$h=500,$c=true) {
    return $file ? thumb($file,$w,$h,$c) : layout('imgs/default-dog.jpg');
  }

  public function GetStatues() {
    $this->db->select("t.*");
    $this->db->from("pet_status t");
    $r = $this->db->get()->result();
    return $r;
  }

  public function GetTypes() {
    $this->db->select("t.*");
    $this->db->from("pet_type t");
    $r = $this->db->get()->result();
    return $r;
  }

  public function GetRaces() {
    $this->db->select("t.*");
    $this->db->from("pet_race t");
    $r = $this->db->get()->result();
    return $r;
  }


 
}
