<?php

class ListModel extends AppModel {

  function __construct()
  {
    parent::__construct();
    $this->table = "pet";    
  }
  
  public function ListItems()
  {
    $where = $this->ListWhere(true);
    $init = $this->input->post('iDisplayStart') ? $this->input->post('iDisplayStart') : 0;
    $perpage = $this->input->post('iDisplayLength') ? $this->input->post('iDisplayLength') : 10;
    $orderby = $this->input->post('filter-sort-column') ? $this->input->post('filter-sort-column') : $this->mconfig['order-column'];
    $ascdesc = $this->input->post('filter-sort-type') ? $this->input->post('filter-sort-type') : $this->mconfig['order-type'];
    $sql = "SELECT t.id_pet as id, t.*,
    lj0.mail as user,
    lj1.keyword as location,
    lj2.title as status,
    lj3.race as race, 
    (select count(*) as total from nz_gallery_file gf where gf.id_gallery  = t.id_gallery) as fmg1,
    lj4.type as type    
    FROM {$this->table} as t    
    LEFT JOIN user lj0 on t.id_user = lj0.id_user      
    LEFT JOIN location lj1 on t.id_location = lj1.id_location      
    LEFT JOIN pet_status lj2 on t.id_status = lj2.id_status      
    LEFT JOIN pet_race lj3 on t.id_race = lj3.id_race      
    LEFT JOIN pet_type lj4 on t.id_type = lj4.id_type      
    WHERE $where 
    ORDER BY `{$orderby}` {$ascdesc} LIMIT {$init}, {$perpage}";
    return $this->db->query($sql)->result();
  }  
  
  public function ListTotal($filter = false)
  {
    $where = $this->ListWhere($filter);
    $sql = "SELECT count(*) as total 
    FROM {$this->table} as t    
    LEFT JOIN user lj0 on t.id_user = lj0.id_user     
    LEFT JOIN location lj1 on t.id_location = lj1.id_location     
    LEFT JOIN pet_status lj2 on t.id_status = lj2.id_status     
    LEFT JOIN pet_race lj3 on t.id_race = lj3.id_race     
    LEFT JOIN pet_type lj4 on t.id_type = lj4.id_type 
    WHERE $where";
    return $this->db->query($sql)->row()->total;
  }
  
  private function ListWhere($filter = false)
  {
    $sql = "1";
    if(!$filter) 
      return $sql;  
    $text = $this->input->post('filter-text') ? $this->input->post('filter-text') : false;          
    if(!$text)      
      $text = $this->input->post('sSearch') ? $this->input->post('sSearch') : false;
    if($this->input->post('filter-id_user'))
      $sql .= " AND t.id_user = '". $this->input->post('filter-id_user') ."'";
    if($this->input->post('filter-id_location'))
      $sql .= " AND t.id_location = '". $this->input->post('filter-id_location') ."'";
    if($this->input->post('filter-id_status'))
      $sql .= " AND t.id_status = '". $this->input->post('filter-id_status') ."'";
    if($this->input->post('filter-id_race'))
      $sql .= " AND t.id_race = '". $this->input->post('filter-id_race') ."'";
    if($this->input->post('filter-id_gallery'))
      $sql .= " AND t.id_gallery = '". $this->input->post('filter-id_gallery') ."'";
    if($this->input->post('filter-id_type'))
      $sql .= " AND t.id_type = '". $this->input->post('filter-id_type') ."'";
    if($this->input->post('filter-active'))
      $sql .= " AND t.active = '1'";
    if($text)
      $sql .= " AND ( t.name like '%{$text}%'  OR  t.description like '%{$text}%'  OR t.id_pet = '{$text}') ";   
    if($this->input->post('filter-id'))
      $sql .= " AND t.id_pet = '". $this->input->post('filter-id') ."'";  
    return $sql;
  }  
  
  public function JSON()
  {
    $total = $this->ListTotal();
    $total2 = $this->ListTotal(true);
    $json = $this->ListItems();
    $sEcho = $this->input->post('sEcho');
    return '{"sEcho":' . $sEcho . ',"iTotalRecords": '. $total .',"iTotalDisplayRecords": '. $total2 .',"aaData":' . json_encode($json) . '}';
  }
  
  public function DataSelects()
  {
    return array(
      'SelectUser' => $this->Data->SelectUser('', $this->lang->line('Selecciona una opción')),
      'SelectLocation' => $this->Data->SelectLocation('', $this->lang->line('Selecciona una opción')),
      'SelectPetStatus' => $this->Data->SelectPetStatus('', $this->lang->line('Selecciona una opción')),
      'SelectPetRace' => $this->Data->SelectPetRace('', $this->lang->line('Selecciona una opción')),
      'SelectPetType' => $this->Data->SelectPetType('', $this->lang->line('Selecciona una opción')),      
    );
  }
  
  public function ValidationRules()
  {
    return array(
      array(
       'field'   => 'created_at', 
       'label'   => $this->lang->line('Creado'), 
       'rules'   => 'trim'      
      ),
      array(
       'field'   => 'updated_at', 
       'label'   => $this->lang->line('Editado'), 
       'rules'   => 'trim'      
      ),
      array(
       'field'   => 'id_user', 
       'label'   => $this->lang->line('Usuario'), 
       'rules'   => 'trim|numeric'
      ),
      array(
       'field'   => 'name', 
       'label'   => $this->lang->line('Nombre'), 
       'rules'   => 'trim'      
      ),
      array(
       'field'   => 'gender', 
       'label'   => $this->lang->line('Sexo'), 
       'rules'   => 'trim'      
      ),
      array(
       'field'   => 'id_location', 
       'label'   => $this->lang->line('Locacion'), 
       'rules'   => 'trim|numeric'
      ),			
      array(
       'field'   => 'description', 
       'label'   => $this->lang->line('Descripción'), 
       'rules'   => 'trim'
      ),
      array(
       'field'   => 'id_status', 
       'label'   => $this->lang->line('Estado'), 
       'rules'   => 'trim|numeric'
      ),
      array(
       'field'   => 'id_race', 
       'label'   => $this->lang->line('Raza'), 
       'rules'   => 'trim|numeric'
      ),			
      array(
       'field'   => 'id_gallery', 
       'label'   => $this->lang->line('Galería'), 
       'rules'   => 'trim'
      ),
      array(
       'field'   => 'id_type', 
       'label'   => $this->lang->line('Tipo'), 
       'rules'   => 'trim|numeric'
      ),
      array(
       'field'   => 'active', 
       'label'   => $this->lang->line('Active'), 
       'rules'   => 'trim'
      ),
    );
  }
  
  public function Name( $id = 0 )
  {
    $id = $id ? $id : $this->id;
    $sql = "SELECT name as `name`
    FROM {$this->table}
    WHERE id_pet = '{$id}'";
    $query = $this->db->query($sql);
    $row = $query->row();
    return clean_title($row->name);
  }
  
  public function Duplicate( $id = 0 )
  {    
    $sql = "select * from {$this->table} where id_pet = '{$id}'";
    $row = $this->db->query($sql)->row_array();  
    if(!$row) return false;
    unset($row['id_pet']);    
    if($row['id_gallery'])
    {
      $oldID = $row['id_gallery'];
      $row['id_gallery'] = $this->MApp->CreateGallery();
      $this->MApp->DuplicateGallery($oldID,$row['id_gallery']);
    }    
    $sql = $this->db->insert_string($this->table, $row );
    $this->db->query($sql); 
    $idn =  $this->db->insert_id();
    return $idn;
  }
  
  public function SavePost()
  {
    if(!$this->MApp->secure->edit) return;
    $data = array(
      // 'created_at' => $this->input->post('created_at'),
      // 'updated_at' => $this->input->post('updated_at'),
      'id_user' => $this->input->post('id_user'),
      'name' => $this->input->post('name'),
      'gender' => $this->input->post('gender'),
      // 'id_location' => $this->input->post('id_location'),
      'description' => $this->input->post('description'),
      'id_status' => $this->input->post('id_status'),
      'id_race' => $this->input->post('id_race'),
      'id_gallery' => $this->input->post('id_gallery'),
      'id_type' => $this->input->post('id_type'),
      'active' => $this->input->post('active') ? 1 : 0,
    );
        $gitems = explode(',', $this->input->post('id_gallery-items'));
    if($data['id_gallery'])
      $this->MApp->EmptyGallery($data['id_gallery']);
    if(count($gitems))
    {
      if(!$this->input->post('id_gallery'))
        $data['id_gallery'] = $this->MApp->CreateGallery();
      $this->MApp->AddGalleryItems($data['id_gallery'], $gitems);
    }    
    if( $this->id )
      $sql = $this->db->update_string($this->table, $data, "id_pet = '{$this->id}'" );
    else
      $sql = $this->db->insert_string($this->table, $data );
    $this->db->query($sql); 
    return $this->id ? $this->id : $this->db->insert_id();
  }
  
  public function Delete( $id = 0 )
  {
    if(!$this->MApp->secure->delete) return false;
    $sql = "DELETE FROM {$this->table}
    WHERE id_pet = '{$id}'";
    $this->db->query($sql);
    //$this->MApp->DeleteGallery($data['id_gallery']);
    return true;
  }
    
  public function DataElement( $id = 0, $null = false)
  {
    $ret = array();
    if($id)
    {
      $sql = "SELECT t.id_pet as id, t.*,
      lj0.mail as user,
      lj1.keyword as location,
      lj2.title as status,
      lj3.race as race,
      lj4.type as type      
      FROM {$this->table} as t      
      LEFT JOIN user lj0 on t.id_user = lj0.id_user       
      LEFT JOIN location lj1 on t.id_location = lj1.id_location       
      LEFT JOIN pet_status lj2 on t.id_status = lj2.id_status       
      LEFT JOIN pet_race lj3 on t.id_race = lj3.id_race       
      LEFT JOIN pet_type lj4 on t.id_type = lj4.id_type       
      WHERE t.id_pet = '{$id}' 
      LIMIT 0, 1";
      $ret = $this->db->query($sql)->row_array();
      if($ret) return $ret;
      if($null) return false;
    }    
    $ret['created_at'] = $this->input->post() ? $this->input->post('created_at') : '';
    $ret['updated_at'] = $this->input->post() ? $this->input->post('updated_at') : '';
    $ret['id_user'] = $this->input->post() ? $this->input->post('id_user') : '';
    $ret['name'] = $this->input->post() ? $this->input->post('name') : '';
    $ret['gender'] = $this->input->post() ? $this->input->post('gender') : '';
    $ret['id_location'] = $this->input->post() ? $this->input->post('id_location') : '';
    $ret['description'] = $this->input->post() ? $this->input->post('description') : '';
    $ret['id_status'] = $this->input->post() ? $this->input->post('id_status') : '';
    $ret['id_race'] = $this->input->post() ? $this->input->post('id_race') : '';
    $ret['id_gallery'] = $this->input->post() ? $this->input->post('id_gallery') : '';
    $ret['id_type'] = $this->input->post() ? $this->input->post('id_type') : '';
    $ret['active'] = $this->input->post('active') ? 1 : 0;
    return $ret;
  }

}