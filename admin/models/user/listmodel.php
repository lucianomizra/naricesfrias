<?php

class ListModel extends AppModel {

  function __construct()
  {
    parent::__construct();
    $this->table = "user";    
  }
  
  public function ListItems()
  {
    $where = $this->ListWhere(true);
    $init = $this->input->post('iDisplayStart') ? $this->input->post('iDisplayStart') : 0;
    $perpage = $this->input->post('iDisplayLength') ? $this->input->post('iDisplayLength') : 10;
    $orderby = $this->input->post('filter-sort-column') ? $this->input->post('filter-sort-column') : $this->mconfig['order-column'];
    $ascdesc = $this->input->post('filter-sort-type') ? $this->input->post('filter-sort-type') : $this->mconfig['order-type'];
    $sql = "SELECT t.id_user as id, t.*,
    lj0.keyword as location    
    FROM {$this->table} as t    
    LEFT JOIN location lj0 on t.id_location = lj0.id_location      
    WHERE $where 
    ORDER BY `{$orderby}` {$ascdesc} LIMIT {$init}, {$perpage}";
    return $this->db->query($sql)->result();
  }  
  
  public function ListTotal($filter = false)
  {
    $where = $this->ListWhere($filter);
    $sql = "SELECT count(*) as total 
    FROM {$this->table} as t    
    LEFT JOIN location lj0 on t.id_location = lj0.id_location 
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
    if($this->input->post('filter-id_location'))
      $sql .= " AND t.id_location = '". $this->input->post('filter-id_location') ."'";
    if($this->input->post('filter-active'))
      $sql .= " AND t.active = '1'";
    if($text)
      $sql .= " AND ( t.mail like '%{$text}%'  OR  t.password like '%{$text}%'  OR  t.first_name like '%{$text}%'  OR  t.last_name like '%{$text}%'  OR  t.gender like '%{$text}%'  OR  t.phone like '%{$text}%'  OR  t.fb_data like '%{$text}%'  OR  t.public_data like '%{$text}%'  OR t.id_user = '{$text}') ";   
    if($this->input->post('filter-id'))
      $sql .= " AND t.id_user = '". $this->input->post('filter-id') ."'";  
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
      'SelectLocation' => $this->Data->SelectLocation('', $this->lang->line('Selecciona una opción')),      
    );
  }
  
  public function ValidationRules()
  {
    return array(
      // array(
      //  'field'   => 'mail', 
      //  'label'   => $this->lang->line('Mail'), 
      //  'rules'   => 'trim'      
      // ),
      // array(
      //  'field'   => 'password', 
      //  'label'   => $this->lang->line('Password'), 
      //  'rules'   => 'trim'      
      // ),
      // array(
      //  'field'   => 'created_at', 
      //  'label'   => $this->lang->line('Created_at'), 
      //  'rules'   => 'trim'      
      // ),
      // array(
      //  'field'   => 'updated_at', 
      //  'label'   => $this->lang->line('Updated_at'), 
      //  'rules'   => 'trim'      
      // ),
      // array(
      //  'field'   => 'first_name', 
      //  'label'   => $this->lang->line('Nombre'), 
      //  'rules'   => 'trim'      
      // ),
      // array(
      //  'field'   => 'last_name', 
      //  'label'   => $this->lang->line('Apellido'), 
      //  'rules'   => 'trim'      
      // ),
      // array(
      //  'field'   => 'birthday', 
      //  'label'   => $this->lang->line('Nacimiento'), 
      //  'rules'   => 'trim'      
      // ),
      array(
       'field'   => 'gender', 
       'label'   => $this->lang->line('Genero'), 
       'rules'   => 'trim'      
      ),
      // array(
      //  'field'   => 'id_location', 
      //  'label'   => $this->lang->line('Location'), 
      //  'rules'   => 'trim|numeric'
      // ),
      // array(
      //  'field'   => 'phone', 
      //  'label'   => $this->lang->line('Teléfono'), 
      //  'rules'   => 'trim'      
      // ),
      // array(
      //  'field'   => 'activity', 
      //  'label'   => $this->lang->line('Activity'), 
      //  'rules'   => 'trim'      
      // ),			
      // array(
      //  'field'   => 'fb_data', 
      //  'label'   => $this->lang->line('Fb_data'), 
      //  'rules'   => 'trim'
      // ),			
      // array(
      //  'field'   => 'public_data', 
      //  'label'   => $this->lang->line('Public_data'), 
      //  'rules'   => 'trim'
      // ),
      // array(
      //  'field'   => 'active', 
      //  'label'   => $this->lang->line('Active'), 
      //  'rules'   => 'trim'
      // ),
    );
  }
  
  public function Name( $id = 0 )
  {
    $id = $id ? $id : $this->id;
    $sql = "SELECT mail as `name`
    FROM {$this->table}
    WHERE id_user = '{$id}'";
    $query = $this->db->query($sql);
    $row = $query->row();
    return clean_title($row->name);
  }
  
  public function Duplicate( $id = 0 )
  {    
    $sql = "select * from {$this->table} where id_user = '{$id}'";
    $row = $this->db->query($sql)->row_array();  
    if(!$row) return false;
    unset($row['id_user']);    
    
    $sql = $this->db->insert_string($this->table, $row );
    $this->db->query($sql); 
    $idn =  $this->db->insert_id();
    return $idn;
  }
  
  public function SavePost()
  {
    if(!$this->MApp->secure->edit) return;
    $data = array(
      'mail' => $this->input->post('mail'),
      // 'password' => $this->input->post('password'),
      // 'created_at' => $this->input->post('created_at'),
      // 'updated_at' => $this->input->post('updated_at'),
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'birthday' => $this->input->post('birthday'),
      'gender' => $this->input->post('gender'),
      // 'id_location' => $this->input->post('id_location'),
      'phone' => $this->input->post('phone'),
      // 'activity' => $this->input->post('activity'),
      // 'fb_data' => $this->input->post('fb_data'),
      // 'public_data' => $this->input->post('public_data'),
      'active' => $this->input->post('active') ? 1 : 0,
    );
    
    if( $this->id )
      $sql = $this->db->update_string($this->table, $data, "id_user = '{$this->id}'" );
    else
      $sql = $this->db->insert_string($this->table, $data );

     
  $this->db->query($sql);
    return $this->id ? $this->id : $this->db->insert_id();
  }
  
  public function Delete( $id = 0 )
  {
    if(!$this->MApp->secure->delete) return false;
    $sql = "DELETE FROM {$this->table}
    WHERE id_user = '{$id}'";
    $this->db->query($sql);
    return true;
  }
    
  public function DataElement( $id = 0, $null = false)
  {
    $ret = array();
    if($id)
    {
      $sql = "SELECT t.id_user as id, t.*,
      lj0.keyword as location      
      FROM {$this->table} as t      
      LEFT JOIN location lj0 on t.id_location = lj0.id_location       
      WHERE t.id_user = '{$id}' 
      LIMIT 0, 1";
      $ret = $this->db->query($sql)->row_array();
      if($ret) return $ret;
      if($null) return false;
    }    
    $ret['mail'] = $this->input->post() ? $this->input->post('mail') : '';
    // $ret['password'] = $this->input->post() ? $this->input->post('password') : '';
    // $ret['created_at'] = $this->input->post() ? $this->input->post('created_at') : '';
    // $ret['updated_at'] = $this->input->post() ? $this->input->post('updated_at') : '';
    $ret['first_name'] = $this->input->post() ? $this->input->post('first_name') : '';
    $ret['last_name'] = $this->input->post() ? $this->input->post('last_name') : '';
    $ret['birthday'] = $this->input->post() ? $this->input->post('birthday') : '';
    $ret['gender'] = $this->input->post() ? $this->input->post('gender') : '';
    // $ret['id_location'] = $this->input->post() ? $this->input->post('id_location') : '';
    $ret['phone'] = $this->input->post() ? $this->input->post('phone') : '';
    // $ret['activity'] = $this->input->post() ? $this->input->post('activity') : '';
    // $ret['fb_data'] = $this->input->post() ? $this->input->post('fb_data') : '';
    // $ret['public_data'] = $this->input->post() ? $this->input->post('public_data') : '';
    $ret['active'] = $this->input->post('active') ? 1 : 0;
    return $ret;
  }

}