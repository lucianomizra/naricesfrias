<?php

class ComponentUpdated{
    
  public static function removeChars( $str = '' )
  {
    $str = str_replace( array('_','-'), ' ', $str );
    $str = str_replace( array('"',"'"), '', $str );
    return $str;
  }
  
  public function update( $opts = array(), $init = false )
  {

    foreach($this as $key => $value)
    {
      if( isset($opts[$key]) && !is_array($value))
        $this->$key = $this->removeChars($opts[$key]);
      elseif( is_array($value) )
        foreach($this->$key as $k => $v)
          if( isset( $opts[$key][$k] ) )
            $this->{$key}[$k] = $opts[$key][$k];
          else
            $this->{$key}[$k] = ( $init ) ? $this->{$key}[$k] : 0;
      elseif( is_string($value))
        $this->{$key} = ( $init ) ? $this->{$key} : '';
      else
        $this->{$key} = ( $init ) ? $this->{$key} : 0;
            
    }
  }
  
  public static function exists( $filter )
  {
    return isset( $this->$filter );
  }
  
}

class Filter extends ComponentUpdated{

  public
    $text = '',    
    $collection = 0,
    $reductions = false,
    $category = 0,
    $sub = 0,
    $sub2 = 0,
    $age = 0,
    $color = 0,    
    $size = '',    
    $cost1 = 0,   
    $cost2 = 0,   
    $soft = 0,    
    $model = '',       
    $wedding = '',    
    $init = 0,    
    $order = 1,    
    $show = 6,    
    $list = 2;
    
}

class Quest {
  
  public  
    $token = '',
    $modelo = null,
    $filter = null;
    
  
	function __construct()
	{
		$this->filter = new Filter();
	}
  
  function decode( $str = '')
  {
    $ret = array();
    $str = str_replace("'","",$str);
    $str = str_replace('"',"",$str);
    //$str = urldecode($str);
    $datos = explode('_', $str );
    if( !count($datos) )
      return array();
    foreach($datos as $v)
    {
      $arr = explode(':',$v);
      if( count($arr) == 2 )
      {
        $arr[0] = str_replace('-','_',$arr[0]);
        $ret[$arr[0]] = isset($arr[1]) ? ComponentUpdated::removeChars(urldecode($arr[1])) : "";
      }elseif( count($arr) > 2)
      {
        $v = str_replace( array($arr[0].':','~'),'',$v);
        $arr[0] = str_replace('-','_',$arr[0]);
        $exp = explode('-',$v);
        foreach($exp as $t)
        {
          $arr2 = explode(':',$t);
          $ret[$arr[0]][$arr2[0]] = isset($arr2[1]) ? ComponentUpdated::removeChars(urldecode($arr2[1])) : "";
        }
      }
    }
    return $ret;
  }
  
  function loadURI( $f = '' )
  {
    $filter = $this->decode($f);
    $this->updateFilters($filter, true);    
  }
  
  function generateURINP()
  {
    $ff = $this->filter;
    unset($this->filter->init);
    unset($this->filter->show);
    $uri = $this->generateURI();
    $this->filter = $ff;
    return $uri;
  }
  
  function generateURI()
  {
    $fBase = new Filter();
    $str = "";
    
    foreach($this->filter as $key => $value )
    {
      if( $value && $value != $fBase->$key )
      {
        if( is_array( $value ) )
        {
          if( count($value) )
          {
          
            $str .= "$key:";
            
            foreach( $value as $k => $v )
            {
              $str .= $k . ":" .  $v . "-";
            }
            if( substr($str,strlen($str)-1) ==  "-")
              $str = substr($str,0,strlen($str)-1) . "_";
          }
        }
        else
          $str .= $key . ":" .  $value . "_";
      }
    }
    
    if( substr($str,strlen($str)-1) ==  "_")
      $str = substr($str,0,strlen($str)-1);
    return $str;    
  }
  
  function updateFilters( $options = array(), $init = false )
  {
    $this->filter->update( $options, $init );
  }

  /*function getDetailsActive()
  {
    
    $CI =& get_instance();
    $token = $CI->session->userdata('QuestActive'); 
    
    $quest = $this->modelo->getQuest($token); 
    
    if( !$quest )
      return false;

    return unserialize($quest)->details;
    
  }*/
  
}

?>