<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// use \Mailjet\Resources;

class Mailjetmodel extends CI_Model { 

  private $mailjet = false;
  public $message, $recipients, $from_mail, $from_name, $subject, $client;

	public function __construct()
  {
    parent::__construct();

    require_once FCPATH . '/app/third_party/GuzzleHttp/functions_include.php';
    require_once FCPATH . '/app/third_party/GuzzleHttp/Psr7/functions_include.php';
    require_once FCPATH . '/app/third_party/GuzzleHttp/Promise/functions_include.php';
    require_once FCPATH . '/app/third_party/Psr/bootstrap.php';
    require_once FCPATH . '/app/third_party/GuzzleHttp/bootstrap.php';
    require_once FCPATH . '/app/third_party/Mailjet/bootstrap.php';


    $APIPublicKey = $this->config->item('mailjet-api-key', 'app');
    $APISecretKey = $this->config->item('mailjet-api-secret', 'app');

    $this->mailjet = new Mailjet\Client($APIPublicKey, $APISecretKey);
    
    $this->from_mail = $this->config->item('client-mail', 'app');
    $this->from_name = $this->config->item('client', 'app');
    $this->client = $this->config->item('client', 'app');
    $this->client_mail = $this->config->item('client-mail', 'app');
    $this->facebook = $this->config->item('facebook', 'app');
    $this->twitter = $this->config->item('twitter', 'app');
  }

  public function PrepareMail($action=false, $recipients=false, $data=[])
  {
    if(!$action || !$recipients) return;

    $data = $this->PrepareData($action, $data);

    
    $this->message = $this->PrepareHTML($data);
    $this->recipients = $recipients;
    $this->subject = $data['subject'];

    $r = $this->SendMail();

		return $r;
  }

  public function PrepareData($action=false, $data=[]) 
  {
    $data['action'] = $action;
    $data['client'] = $this->client;
    $data['client-mail'] = $this->client_mail;
    $data['facebook'] = $this->facebook;
    $data['twitter'] = $this->twitter;
    $data['url'] = $data['url'] ?? site_url();
    $data['view'] = $action;

    $get = urlencode(json_encode($data));
    $data['url-mail'] = site_url('mail') .'/?d=' . $get;

    return $data;
  }

  public function PrepareHTML($data=[]) {
    if(!$data) return;


    $html = $this->load->view('components/mail/'.$data['view'], array('data'=>$data), true);
    $html = $this->parseVars($html, $data);

    return $html;
  }

  public function SendMail() {
    if(!$this->message || !$this->recipients) return;

    $body = array(
      'FromEmail' => $this->from_mail,
      'FromName' => $this->from_name,
      'Subject' => $this->subject,
      'Text-part' => strip_tags($this->message),
      'Html-part' => $this->message,
      'Recipients' => $this->recipients
    );

    return $this->mailjet->post(Mailjet\Resources::$Email, ['body' => $body]);
  }

  public function parseVars($str='', $data=[]) {
    foreach ($data as $key => $value) {
      if(is_string($value))
        $str = str_replace('['.strtoupper($key).']', $value, $str);
    }
    return $str;
  }
}
