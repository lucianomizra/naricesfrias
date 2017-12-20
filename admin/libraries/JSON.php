<?php

class JSON {

	public $folder = FCPATH.'data/';

	public function read($file = '')
  {
    $file = $this->folder.rtrim($file, '.json').'.json';
    if ( ! file_exists($file))
    {
      return (object) array();
    }

    $string = file_get_contents($file);
    if ( ! $string)
    {
      return (object) array();
    }

    return json_decode($string);
  }

	function write($file = '', $data = array())
  {
    $file = $this->folder.$file.'.json';
    $fp = fopen($file, 'w');
    fwrite($fp, json_encode($data));
    fclose($fp);
    return true;
  }

	function append($file = '', $data = array())
  {
  	$json = $this->read($file);
  	if(!$json)
  	{
  		$json = array();
  	}
  	if(!is_array($json))
  	{
  		$json = (array) $json;
  	}
  	$data = array_merge($json, $data);
    $file = $this->folder.$file.'.json';
    $fp = fopen($file, 'w');
    fwrite($fp, json_encode($data));
    fclose($fp);
    return true;
  }

};
