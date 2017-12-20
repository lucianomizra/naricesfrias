<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DataModel extends CI_Model
{


  public function SelectLocation( $where = '', $all = '' )
  {
    if( $where ) 
      $where = 'where '. $where;
    return create_select_options($this->db->query("SELECT id_location as id, keyword as el FROM location $where order by el"), $all);
  }

  public function SelectUser( $where = '', $all = '' )
  {
    if( $where ) 
      $where = 'where '. $where;
    return create_select_options($this->db->query("SELECT id_user as id, mail as el FROM user $where order by el"), $all);
  }

  public function SelectPetStatus( $where = '', $all = '' )
  {
    if( $where ) 
      $where = 'where '. $where;
    return create_select_options($this->db->query("SELECT id_status as id, title as el FROM pet_status $where order by el"), $all);
  }

  public function SelectPetRace( $where = '', $all = '' )
  {
    if( $where ) 
      $where = 'where '. $where;
    return create_select_options($this->db->query("SELECT id_race as id, race as el FROM pet_race $where order by el"), $all);
  }

  public function SelectPetType( $where = '', $all = '' )
  {
    if( $where ) 
      $where = 'where '. $where;
    return create_select_options($this->db->query("SELECT id_type as id, type as el FROM pet_type $where order by el"), $all);
  }

}