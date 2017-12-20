<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class EncryptionX {

  public 
    $skey = "05ed9b807c5329f90a9af231877fe18a";

  public function safe_b64encode($string)
  {  
    $data = base64_encode($string);
    $data = str_replace(array('+','/','='),array('-','_',''),$data);
    return $data;
  }

  public function safe_b64decode($string) 
  {
    $data = str_replace(array('-','_'),array('+','/'),$string);
    $mod4 = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }
    return base64_decode($data);
  }
  
  public function convert($str = '', $ky = ''){ 
    if($ky == '')
      return $str; 
    $ky = str_replace(chr(32),'', $ky); 
    $kl = strlen($ky)<32?strlen($ky):32; 
    $k = array();
    for($i=0;$i<$kl;$i++) 
      $k[$i]=ord($ky{$i})&0x1F;
    $j=0;for($i=0;$i<strlen($str);$i++)
    { 
      $e=ord($str{$i}); 
      $str{$i}=$e&0xE0?chr($e^$k[$j]):chr($e); 
      $j++;$j=$j==$kl?0:$j;
    }
    return $str; 
  } 
  
  public  function encode($value)
  {
    return $this->safe_b64encode($this->convert($value, $this->skey));
  }
  
  public function key($key)
  {
    $this->skey = $key;
  }
  
  public function decode($value)
  {
    return $this->convert($this->safe_b64decode($value), $this->skey);
  }
  
}