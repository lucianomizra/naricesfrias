<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SocialModel extends CI_Model
{

  private
    $debug = true,
    $result = false,
    $type = '',
    $facebook_config = array(
      'app_id' => '193079904604336',
      'appId' => '193079904604336',
      'app_secret' => 'd7cc906208ec8fa00b29b674ef903aee',
      'secret' => 'd7cc906208ec8fa00b29b674ef903aee',
      'persistent_data_handler' => 'session'
    );

  public function FacebookData($access_token = false)
  {
    require_once(APPPATH. "third_party/facebook/facebook.php");
    $facebook = new Facebook($this->facebook_config);
    $facebook->setAccessToken($access_token);  
    if($facebook->getUser()) 
    {
      try {
        $data = $facebook->api("/me", array('fields' => 'email, picture, name, last_name, first_name'));

        return $data;
      } catch (FacebookApiException $e) {
        $this->result = $this->type . print_r($e, true);
      }
    }
    else
    {        
      $this->result = $this->type . "access_token inválido";
    }
  }


}