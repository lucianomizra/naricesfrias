<?php
class FileManagerModel extends CI_Model
{

  public
    $fglobal = false;

  public function getFolder()
  {
    if(!$this->fglobal)
      return $this->config->item('uploads', 'app');
    return $this->config->item('uploads-global', 'app');
  }

  public function makeFileName( $fname = '', $ext = '' )
  {
    $name =  "{$fname}.{$ext}";
    $date = date('Y') . '/' . date('m') . '/';
    $this->checkDir($date);
    $newfile =  $this->getFolder() . $date . $name;
    $i = 1;
    while( file_exists($newfile) )
    {
      $name = "{$fname}-{$i}.{$ext}";
      $newfile =  $this->getFolder() . $date . $name;
      $i++;
    }
    return $date . $name;
  }

  public function FileType($ext = '')
  {
    $row = $this->db->query("select id_type as id from {$this->dbglobal}file_extension WHERE extension = '{$ext}'")->row();
    if( $row )
      return $row->id;
    return 0;
  }

  public function checkDir( $dir = '' )
  {
    $basic = $this->getFolder() . $dir;
    if( !is_dir($basic) )
    {
			$oldumask = umask(0);
      mkdir($basic, 0777, TRUE);
      umask($oldumask);
      $this->chmod($basic, 0777);
      #$this->chown($basic, 'nobody', 'nobody');
    }
  }

	public function chown($mypath, $uid, $gid)
	{
		chown($mypath, $uid);
    chgrp($mypath, $gid);
    $d = opendir ($mypath) ;
    while(($file = readdir($d)) !== false) {
      if ($file != "." && $file != "..") {
        $typepath = $mypath . "/" . $file ;
        if (filetype ($typepath) == 'dir') {
          recurse_chown_chgrp ($typepath, $uid, $gid);
        }
        chown($typepath, $uid);
        chgrp($typepath, $gid);
      }
    }
	}

  public function chmod($path, $filemode) {
    if (!is_dir($path)) return chmod($path, $filemode);
    $dh = opendir($path);
    while (($file = readdir($dh)) !== false) {
      if($file != '.' && $file != '..') {
        $fullpath = $path.'/'.$file;
        if(is_link($fullpath))
          return FALSE;
        elseif(!is_dir($fullpath))
          if (!chmod($fullpath, $filemode))
                return FALSE;
        elseif(!chmod_R($fullpath, $filemode))
          return FALSE;
      }
    }
    closedir($dh);
    if(chmod($path, $filemode))
      return TRUE;
    else
      return FALSE;
	}

  public function uploadFile( $file = null )
  {
    $exp = explode('.', $file['name']);    
    if(count($exp) < 2) return false;
    $ext = strtolower($exp[count($exp)-1]);
    if( !$ext || !$exp[0] || !$file['tmp_name'] || !file_exists($file['tmp_name']) )
      return false;
    $data = array();
    $data['name'] = substr($file['name'], 0, strlen($file['name']) - strlen($ext)- 1);
    $fname = prep_word_url($data['name']);
    $data['name'] = $file['name'];
    $name = $this->makeFileName($fname, $ext);
    $newfile = $this->getFolder() . $name;
    copy($file['tmp_name'], $newfile );
    unset($data['action']);
    $data['id_type'] = $this->FileType($ext);
    $data['id_folder'] = 0;
    $data['id_user'] = false;
    $data['file'] = $name;
    $id = $this->SaveNewFile($data);
    $data['id'] = $id;
    // if($data['id_type'] == 1)
    //   $data['thumb'] = thumb_url($id, $this->fglobal);
    $data['url'] = upload($name, $this->fglobal);
    $this->ActionsFileAdded($data);
    return $data;  
  }

  function SaveNewFile( $data = array() )
  {
    $sql = $this->db->insert_string("nz_file",$data);
    $this->db->query($sql);
    return $this->db->insert_id();
  }

  public function checkThumbsDir()
  {
    $thumbs = $this->getFolder() . "thumbs";
    if( is_dir($thumbs) )
      return;
    mkdir($thumbs, 0777, TRUE);
  }

  public function generateThumb( $image = '', $name = '', $width = 0, $height = 0 )
  {
    $this->checkThumbsDir();
    if( !isset($this->image)) $this->load->library('image');
    $this
      ->image
      ->load($image)
      ->resize($width,$height)
      ->save($this->getFolder() . "thumbs/" . $name)
      ->clear();
  }

  public function ActionsFileAdded( $data = false )
  {
    if( !$data || $data['id_type'] != 1 ) return;
  }


  function DeletedFiles()
  {
    $idu = $this->session->userdata('idUser');
    return $this->db->query("select f.*, t.type
    from {$this->dbfiles}nz_file f
    left join {$this->dbglobal}file_type t on t.id_type = f.id_type
    left join {$this->dbfiles}nz_folder ff on ff.id_folder = f.id_folder
    WHERE f.deleted = '1' AND (ff.id_user is null OR ff.id_user = '{$idu}') order by num")->result();
  }

  function SearchFiles( $file = '' )
  {
    $idu = $this->session->userdata('idUser');
    return $this->db->query("select f.*, t.type
    from {$this->dbfiles}nz_file f
    left join {$this->dbglobal}file_type t on t.id_type = f.id_type
    left join {$this->dbfiles}nz_folder ff on ff.id_folder = f.id_folder
    WHERE (ff.id_user is null OR ff.id_user = '{$idu}') AND ( ff.deleted = '0' OR f.id_folder = '0' ) AND f.deleted = '0' and (f.alt like '%{$file}%' OR f.file like '%{$file}%') order by f.id_folder, num")->result();
  }

  function Files( $folder = 0, $element = 0 )
  {
    if( $folder && $element )
      return $this->db->query("select f.*, t.type
      from {$this->dbfiles}nz_file f
      left join {$this->dbglobal}file_type t on t.id_type = f.id_type
      WHERE f.id_folder = '{$folder}' AND f.id_element = '{$element}' order by num")->result();
    if( $folder )
      return $this->db->query("select f.*, t.type
      from {$this->dbfiles}nz_file f
      left join {$this->dbglobal}file_type t on t.id_type = f.id_type
      WHERE f.id_folder = '{$folder}' and f.deleted = '0' order by f.file, f.id_element, num")->result();
    return $this->db->query("select f.*, t.type
    from {$this->dbfiles}nz_file f
    left join {$this->dbglobal}file_type t on t.id_type = f.id_type
    WHERE f.id_folder = 0 and f.deleted = '0' order by num")->result();
  }

  function LastFile( $folder = 0, $element = 0 )
  {
    if( $folder && $element )
      return $this->db->query("select f.*, t.type from {$this->dbfiles}nz_file f
      left join {$this->dbglobal}file_type t on t.id_type = f.id_type
      WHERE f.id_folder = '{$folder}' AND f.id_element = '{$element}' order by num desc LIMIT 0,1")->row();
    if( $folder )
      return $this->db->query("select f.*, t.type from {$this->dbfiles}nz_file f
      left join {$this->dbglobal}file_type t on t.id_type = f.id_type
      WHERE f.id_folder = '{$folder}' and f.deleted = '0' order by num desc LIMIT 0,1")->row();
    return $this->db->query("select f.*, t.type from {$this->dbfiles}nz_file f
    left join {$this->dbglobal}file_type t on t.id_type = f.id_type
    WHERE f.id_folder = 0 and f.deleted = '0' order by num desc LIMIT 0,1")->row();
  }

  function Folders( $parent = 0 )
  {
    return $this->db->query("select * FROM {$this->dbfiles}nz_folder WHERE id_parent = '{$parent}' and id_type IN (1,2) and deleted = 0 order by name")->result();
  }

  function DeletedFolders()
  {
    $idu = $this->session->userdata('idUser');
    return $this->db->query("select * FROM {$this->dbfiles}nz_folder WHERE deleted = 1 AND (id_user is null OR id_user = {$idu}) order by name")->result();
  }

  public function TableDataFolders()
  {
    return $this->db->query("SELECT * FROM {$this->dbfiles}nz_folder WHERE deleted = 0 and id_type IN (1,2) order by id_parent, name")->result();
  }

  public function FileOnDeletedFolder( $id = 0 )
  {
    while($id)
    {
      $row = $this->db->query("SELECT id_folder as id, id_parent as iparent, deleted FROM {$this->dbfiles}nz_folder WHERE id_folder = '{$id}'")->row();
      if( $row->deleted )
        return true;
      if( $row->iparent )
        $id = $row->iparent;
    }
    return false;
  }

  public function TopFolder( $id = 0 )
  {
    while($id)
    {
      $row = $this->db->query("SELECT id_folder as id, id_parent as iparent FROM {$this->dbfiles}nz_folder WHERE id_folder = '{$id}'")->row();
      if( $row->iparent )
        $id = $row->iparent;
      else
        return $id;
    }
    return 0;
  }

  public function LinkFolder( $id = 0 )
  {
    $array = array();
    while($id)
    {
      $row = $this->db->query("SELECT id_folder as id, name, id_parent as iparent FROM {$this->dbfiles}nz_folder WHERE id_folder = '{$id}' and deleted = 0")->row();
      if(!$row)
        return $array;
      $array[$row->id] = $row->name;
      $id = $row->iparent;
    }
    ksort($array);
    return $array;
  }

  function DeleteAllFolder( $folder = 0 )
  {
    /// ELIMINAR FILES Y CHILDREN
    $this->db->query("update {$this->dbfiles}nz_file set deleted = '1' WHERE id_folder = '{$folder}'");
    return $this->db->query("update {$this->dbfiles}nz_folder set deleted = '1' WHERE id_type = 2 AND id_parent = '{$folder}'");
  }

  function DeleteAllGallery( $folder = 0, $element = 0 )
  {
    return $this->db->query("delete from {$this->dbfiles}nz_file WHERE id_folder = '{$folder}' AND id_element = '{$element}'");
  }

  function DeleteFileGallery( $id = 0 )
  {
    return $this->db->query("delete FROM {$this->dbfiles}nz_file WHERE id_file = '{$id}'");
  }

  function DeleteFolder( $id = 0 )
  {
    /// ELIMINAR FILES Y CHILDREN
    return $this->db->query("delete FROM {$this->dbfiles}nz_folder WHERE id_folder = '{$id}'");
  }

  function Folder( $id = 0 )
  {
    return $this->db->query("select * FROM {$this->dbfiles}nz_folder f WHERE f.id_folder = '{$id}'")->row();
  }

  function FileGallery( $id = 0 )
  {
    return $this->db->query("select f.*, t.type from {$this->dbfiles}nz_file f
    left join {$this->dbglobal}file_type t on t.id_type = f.id_type
    WHERE f.id_file = '{$id}'")->row();
  }

  function NewFolder( $data = array() )
  {
    if( !isset($data['id_parent']) )
      $data['id_parent'] = 0;
    if( $this->UserProtection($data['id_parent']) )
      $data['id_user'] = $this->session->userdata('idUser');
    $sql = $this->db->insert_string("{$this->dbfiles}nz_folder",$data);
    $this->db->query($sql);
    return $this->db->insert_id();
  }

  function CheckFolder($id = 0)
  {
    $sql = "select id_folder as id FROM {$this->dbfiles}nz_folder WHERE id_folder = '{$id}'";
    $row = $this->db->query($sql)->row();
    return $row ? true : false ;
  }

  function FolderUser()
  {
    $sql = "select id_folder as id
    FROM {$this->dbfiles}nz_folder
    WHERE id_parent = '0' and id_type = '3' and id_user = '". $this->session->userdata('idUser') ."'";
    $row = $this->db->query($sql)->row();
    return $row ? $row->id : $this->NewFolder( array('name'=> 'User #' . $this->session->userdata('idUser') . ' Folder','id_user'=> $this->session->userdata('idUser'), 'id_parent'=> 0, 'id_type'=> 3 ) ) ;
  }

  function FolderExists($name = '', $parent = 0)
  {
    $sql = "select id_folder as id FROM {$this->dbfiles}nz_folder WHERE id_parent = '{$parent}' and name = '{$name}'";
    $row = $this->db->query($sql)->row();
    return $row ? $row->id : $this->NewFolder( array('name'=> $name, 'id_parent'=> $parent, 'id_type'=> 1 ) ) ;
  }

  function SaveExcelExport( $data = array(), $config = array() )
  {
    $data['id_folder'] = 3;
    $data['id_element'] = 0;
    $sec = explode("<span class='arrow'> | </span>", $config['moduleTitle']);
    $folder = isset($sec[0]) ? trim($sec[0]) : ucfirst($config['controller']);
    $data['id_location'] = $this->FolderExists($folder,3);
    $alt = isset($sec[1]) ? trim($sec[1]) : ucfirst($config['function']);
    $data['alt'] = $alt . ' ' . date('d-m-Y H:i');
    $sql = $this->db->insert_string("{$this->dbfiles}nz_file",$data);
    return $this->db->query($sql);
  }

  function UserProtection( $location = 0 )
  {
    if( !$location )
      return false;
    $df = $this->Folder($location);
    if($df->id_type == 3)
      return true;
    return $this->UserProtection($df->id_parent);
  }

  function Order( $serial = '' )
  {
    $exp = explode('|',$serial);
    foreach($exp as $order)
    {
      $data = explode('=',$order);
      $sql = $this->db->update_string("{$this->dbfiles}nz_file",array(
        'num' => $data[1]
      ),"id_file='{$data[0]}'");
      $this->db->query($sql);
    }
    return true;
  }

  function UpdateFolder( $id = 0, $data = array() )
  {
    $sql = $this->db->update_string("{$this->dbfiles}nz_folder",$data,"id_folder='{$id}'");
    return $this->db->query($sql);
  }

  function UpdateFile( $id = 0, $data = array() )
  {
    $sql = $this->db->update_string("{$this->dbfiles}nz_file",$data,"id_file='{$id}'");
    return $this->db->query($sql);
  }

  function NewFileFromFile( $id = 0, $nfile = '' )
  {
    if(!$id || !$nfile) return false;
    $sql = "select * from {$this->dbfiles}nz_file where id_file='{$id}'";
    $row = $this->db->query($sql)->row_array();
    if(!$row) return false;
    unset($row['id_file']);
    $row['date'] = date('d-m-Y H:i');
    $fc = str_replace('/admin/','/', str_replace('\\','/', FCPATH)) . 'files/';
    $nfile = str_replace($fc,'',$nfile);
    $info = pathinfo($nfile);
    $row['file'] = $nfile;
    $row['name'] = $info['basename'];
    $sql = $this->db->insert_string("{$this->dbfiles}nz_file", $row);
    $this->db->query($sql);
    $row['id'] = $this->db->insert_id();
    if($row['id_type'] == 1)
      $row['thumb'] = thumb_url($row['id'], $this->fglobal);
    $row['url'] = upload($row['file'], $this->fglobal);
    return $row;
  }

  function NewFileFromDataURI( $file = '' )
  {

    $tempFile = $this->config->item('uploads', 'app').time().'.png';
    $ext = 'png';

    $img = str_replace('data:image/png;base64,', '', $file);
    $name = $this->makeFileName(uniqid(), $ext);
    $newfile = $this->getFolder() . $name;
    file_put_contents($newfile, base64_decode($img));
    //copy($tempFile, $newfile );
    $this->chmod($newfile, 0755);

    $data = array();

    $data['name'] = $name;
    $data['file'] = $file;
    $data['id_type'] = 1;
    $data['id_user'] = 1;
    $data['id_folder'] = 2;
    $data['file'] = $name;
    // $id = $this->SaveNewFile($data);

    // $sql = $this->db->insert_string("nz_file", $data);
    $insert = $this->db->insert('nz_file',$data);
    // $this->db->query($sql);
    $id = $this->db->insert_id();

    return $id;
  }

  function ClearRecycle()
  {
    $result = $this->db->query("select f.*, t.type
    from {$this->dbfiles}nz_file f
    left join {$this->dbglobal}file_type t on t.id_type = f.id_type
    left join {$this->dbfiles}nz_folder ff on ff.id_folder = f.id_location
    WHERE f.deleted = '1'")->result();
    $f1 =  $this->getFolder();
    $f2 =  $f1 . 'thumbs/';
    foreach($result as $row)
    {
      @unlink($f1 . $row->file);
      @unlink($f2 . $row->file);
    }

    $this->db->query("delete from {$this->dbfiles}nz_file WHERE deleted = '1'");

  }

}
