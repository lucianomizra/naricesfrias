<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChatModel extends CI_Model
{
  public $id = 0;

  public function __construct()
  {
		parent::__construct();
  }

  public function GetChat($id_chat = 0) {
    $id_chat = $id_chat ? $id_chat : $this->id;
    $this->db->select("
      t.*
    ");

    if (!$this->admin) {
      $this->db->where('uic.id_chat', $id_chat);
      $this->db->where('uic.id_user', $this->user->id_user);
      $this->db->join("chat t", "uic.id_chat = t.id_chat", "right");

      $this->db->from("user_in_chat uic");
    } else {
      $this->db->where('t.id_chat', $id_chat);
      $this->db->from("chat t");
    }

    $r = $this->db->get()->row();


    if($r) {
      $r->messages = $this->GetMessages( $id_chat );
    }

    return $r;
  }
  public function GetMessages($id_chat = 0) {
    $id_chat = $id_chat ? $id_chat : $this->id;
    $this->db->select("
      t.*
    ");
    
    $this->db->select("
      u.name_public as user_name_public,
      uf.file as user_picture
    ");
    $this->db->join("user u", "u.id_user = t.id_user", "left");
    $this->db->join("nz_file uf", "uf.id_file = u.id_file", "left");

    $this->db->where('t.id_chat', $id_chat);
    $this->db->order_by('id_message','DESC');
    $this->db->from("message t");

    if (!$this->admin) {
      $this->db->limit(400);
    }

    $r = $this->db->get()->result();

    return array_reverse($r);
  }


 
}
