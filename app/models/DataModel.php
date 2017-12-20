<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DataModel extends CI_Model
{
  public 
  	$pconfig = false;

  public function __construct()
  {
		parent::__construct();
		// $languages = array(
		// 	'spanish' => '_es',
		// 	'english' => '_en',
		// );
		// $this->langdb = $languages[$this->config->item('language')];

  //   $this->config = $this->Config();
  }



  public function Gallery( $id = 0 )
  {
    $sql = "SELECT f.file,f.id_file
            FROM nz_gallery_file s
            LEFT JOIN nz_file f on f.id_file = s.id_file
            WHERE s.id_gallery = '{$id}'
            ORDER BY s.num";
        return $this->db->query($sql)->result();
  }
  // public function GetStain($id)
  // {
  //   $this->db->where("id_stain = {$id}");
  //   $r = $this->db->get('product_stain');

  //   return $r->row();
  // }


  public function GetTimes() {
    $this->db->select("t.id_time, t.time");

    $this->db->where("active = 1");
    $this->db->order_by("num");

    $r = $this->db->get("time as t")->result();

    return $r;
  }

 public function GetHeader($params = array())
  {
    $this->load->config('header', TRUE);
    $id_header = isset($params['id_header']) ? $params['id_header'] : 0;

    $data = [];
    $r = false;
    $data['title'] = isset($params['title']) && $params['title'] ? htmlspecialchars($params['title']) : $this->config->item('title', 'header');
    $data['description'] = isset($params['description']) && $params['description'] ? htmlspecialchars($params['description']) : $this->config->item('description', 'header');
    $data['keywords'] = isset($params['keywords']) && $params['keywords'] ? htmlspecialchars($params['keywords']) : $this->config->item('keywords', 'header');
    $data['facebook_title'] = isset($params['facebook_title']) && $params['facebook_title'] ? htmlspecialchars($params['facebook_title']) : $this->config->item('facebook_title', 'header');
    $data['facebook_text'] = isset($params['facebook_text']) && $params['facebook_text'] ? htmlspecialchars($params['facebook_text']) : $this->config->item('facebook_text', 'header');
    $data['twitter_text'] = isset($params['twitter_text']) && $params['twitter_text'] ? htmlspecialchars($params['twitter_text']) : $this->config->item('twitter_text', 'header');
    $data['image'] = isset($params['image']) && $params['image'] ? $params['image'] : $this->config->item('image', 'header');
    $data['article'] = isset($params['article']) && $params['article'] ? $params['article'] : false;
    $data['canonical'] = isset($params['canonical']) && $params['canonical'] ? $params['canonical'] : false;

    // if($id_header) {
    //   $this->db->select("t.title");
    //   $this->db->select("t.keywords");
    //   $this->db->select("t.description");
    //   $this->db->select("t.facebook_title");
    //   $this->db->select("t.facebook_text");
    //   $this->db->select("t.twitter_text");
    //   $this->db->select("nz.file as image");
    //   $this->db->where("t.id_header = '{$id_header}'");
    //   $this->db->join('nz_file nz', 'nz.id_file = t.id_file', 'left');
    //   $this->db->from("header t");
    //   $r = $this->db->get()->row();

    //   if($r) {
    //     $r->title = $r->title ? $r->title : htmlspecialchars($data['title']);
    //     $r->description = $r->description ? $r->description : htmlspecialchars($data['description']);
    //     $r->keywords = $r->keywords ? $r->keywords : htmlspecialchars($data['keywords']);
    //     $r->facebook_title = $r->facebook_title ? $r->facebook_title : htmlspecialchars($data['facebook_title']);
    //     $r->facebook_text = $r->facebook_text ? $r->facebook_text : htmlspecialchars($data['facebook_text']);
    //     $r->twitter_text = $r->twitter_text ? $r->twitter_text : htmlspecialchars($data['twitter_text']);
    //     $r->image = $r->image ? thumb($r->image, 1200, 628) : htmlspecialchars($data['image']);
    //     $r->article = $data['article'];
    //     $r->canonical = $data['canonical'];
    //   }
    // }
    if( !$r ) {
      $r = (object)$data;
    }

    $aft = $this->config->item('after-title', 'header');
    if($aft && $aft != $r->title)
      $r->title .= ' - '.$aft;

    return $r;
  }
}