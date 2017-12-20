<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends APP_Controller {

  public function __construct () {
    parent::__construct();

    $this->namespace = 'auth';
  }

	public function register()
	{
    if($this->user) {
      redirect(base_url('home'));
    } elseif($this->input->post()) {
      $this->load->library('form_validation');

      $this->form_validation->set_rules('name', 'nombre', 'trim|required',
        array(
          'required'=>'Nombre es un campo obligatorio.',
          ));
      $this->form_validation->set_rules('lastname', 'apellido', 'trim|required',
        array(
          'required'=>'Apellido es un campo obligatorio.',
          ));
      $this->form_validation->set_rules('mail', 'mail', 'trim|required|valid_email|is_unique[user.mail]',
        array(
          'valid_email'=>'El Email es invalido.',
          'required'=>'Email campo obligatorio.',
          'is_unique'=>'El email ya se encuentra.',
          ));
      $this->form_validation->set_rules('password', 'contraseña', 'trim|required|min_length[3]',
        array(
          'required'=>'Contraseña es un campo obligatorio.',
          'min_length'=>'La contraseña debe tener un minimo de 3 caracteres.',
          ));
      // $this->form_validation->set_rules('repeat_password', 'contraseña', 'required|matches[password]',
      //   array(
      //     'required'=>'Contraseña es un campo obligatorio.',
      //     'min_length'=>'La contraseña debe tener un minimo de 3 caracteres.',
      //     'matches'=>'La confimación de contraseña no coincide.',
      //     ));
      $this->form_validation->set_rules('terms', 'terms', 'numeric|required',
        array(
          'numeric'=>'Acepte los terminos',
          'required'=>'Acepte los terminos',
          ));

      if ($this->form_validation->run() == FALSE)
      {
        $data['error'] = 1;
        $data['inputErrors'] = $this->form_validation->error_array();
        return $this->json($data);

      } else {

        $next_thursday = DateTime::createFromFormat('Y-m-d H:i:s', now() );
        $next_thursday->modify('next sunday');
        $next_thursday->modify('+7 day');
        $next_thursday->modify('-1 second');

        $user = array(
          'created_at'=> now(),
          'activity'=> now(),
          'mail'=>$this->input->post('mail'),
          'first_name'=>$this->input->post('name'),
          'last_name'=>$this->input->post('lastname'),
          'password'=>$this->input->post('password'),
          'public_data'=>'first_name,last_name,phone,mail',
          );

        $r = $this->db->insert('user', $user);

        if($r) {
          $this->UserM->LoginUser( $this->db->insert_id() );
          $this->UserM->UpdateLocation( $this->db->insert_id() );

          // $this->load->library('email');
          // $arr = array(
          //   'link'=> 'http://guiainfolew.com/',
          //   'name'=> $this->input->post('first_name') . ' ' . $this->input->post('last_name'),
          // );
          // $html = $this->load->view("mail/welcome", array('data'=>$arr), true);

          // $this->email->from($this->config->item('client-mail', 'app'), 'Infolew');
          // $this->email->to( $this->input->post('mail') );
          // $this->email->subject('Bienvenidos a Guía Infolew');
          // $this->email->set_mailtype('html');
          // $this->email->message($html);

          // $this->email->send();

          return $this->json(array( 'error'=>0, 'callback'=> 'reload' ));
        }

      }
    }

		$this->view = 'user/auth/register';

    $this->data['headers'] = $this->Data->GetHeader([
      'title'=> 'Registrate',
    ]);

		$this->main('register');
	}
	public function login()
	{
    if($this->user) {
      redirect(base_url('home'));
    } elseif($this->input->post()) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('mail', 'nombre', 'trim|required',
			array(
			    'required'=>false,
			));
			$this->form_validation->set_rules('password', 'nombre', 'trim|required',
			array(
			    'required'=>false,
			));

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = 1;
				$data['inputErrors'] = $this->form_validation->error_array();
				return $this->json($data);
			} else {

				$id_user = $this->UserM->ProcessLogin($this->input->post('mail'), $this->input->post('password'));

				if($id_user)
				{
				  $this->UserM->LoginUser($id_user);
				  return $this->json(array( 'error'=>0, 'callback'=> 'reload' ));
				} else {
				  $data['error'] = 1;
				  $data['inputErrors'] = array('password'=>'');
				  return $this->json($data);
				}
			}
	  }

		$this->view = 'user/auth/login';

    $this->data['headers'] = $this->Data->GetHeader([
      'title'=> 'Ingresar',
    ]);

		$this->main('login');
	}

  public function forgot($id_user=0,$token=0)
  {
    $url_forgot = current_url();
    $this->data['url_forgot'] = $url_forgot;
    $hash = 'N%2\2p;DdF^[Hew=';

    if ($id_user && $token && md5($hash.$id_user) == $token ) {
      $this->data['ruser'] = $this->UserM->GetUser( $id_user );
      $this->data['token'] = $token;
    } else {
      $this->data['token'] = '';
      $this->data['ruser'] = false;
    }

    if($this->input->post())
    {
      $this->load->library('form_validation');

      if ($this->data['ruser']) {


        $this->form_validation->set_rules('password', 'contraseña', 'trim|required|min_length[3]',
        array(
          'required'=>'Contraseña es un campo obligatorio.',
          'min_length'=>'La contraseña debe tener un minimo de 3 caracteres.',
          ));
        $this->form_validation->set_rules('repeat_password', 'contraseña', 'required|matches[password]',
        array(
          'required'=>'Contraseña es un campo obligatorio.',
          'min_length'=>'La contraseña debe tener un minimo de 3 caracteres.',
          'matches'=>'La confimación de contraseña no coincide.',
          ));
        if ($this->form_validation->run() == FALSE)
        {
          $data['error'] = 1;
          $data['inputErrors'] = $this->form_validation->error_array();
          return $this->json($data);

        } else {

          $data = array(
            'password'=>$this->input->post('password')
          );

          $this->db->where('id_user', $this->data['ruser']->id_user);
          $r = $this->db->update('user', $data);

          return $this->json(array( 'error'=>0, 'callback'=> 'success-go-dashboard' ));
        }

      }

      function is_exist($user) {
        $CI =& get_instance();
        $r = $CI->UserM->is_exist($user);
        return (isset($r->id_user));
      }

      $this->form_validation->set_rules('user', 'nombre', 'trim|required|is_exist',
        array(
            'required'=>'Complete Usuario.',
            'is_exist'=>'El Email o Usuario PSN no se encuentran registrados.',
        ));

      if ($this->form_validation->run() == FALSE)
      {
        $data['error'] = 1;
        $data['inputErrors'] = $this->form_validation->error_array();
        return $this->json($data);

      } else {

        $user = $this->UserM->is_exist($this->input->post('user'));

        $link = base_url() . 'forgot/' . $user->id_user . '/' . md5($hash.$user->id_user);

        $this->load->model('Mailjetmodel','MJ');

        $data = $this->MJ->PrepareMail( 'basic',
            [['Email' => $user->mail, 'Name' =>$user->name_public]],
            [
              'subject'=> 'Recuperar Contraseña - DQSS',
              'title'=>   'Recuperar Contraseña',
              'text'=>    "<p>Alguien solicitó recuperar contraseña con tu cuenta <b>{$user->name_public}</b>, si fuiste vos podes terminar el proceso en el siguiente enlace:</p>

                <a href=\"{$link}\">{$link}</a>
                ",
              'button'=>  'Cambiar contraseña',
              'url'=>     $link,
            ] );

        return $this->json(array('error'=>0,'callback'=>'success-forgot'));
      }
    }

    $this->view = 'user/auth/forgot';

    $this->data['headers'] = $this->Data->GetHeader([
      'title'=> 'Recuperar contraseña',
    ]);


    $this->main('forgot');
  }

  public function facebook_login()
  {

    if($this->input->post())
    {
      $authResponse = $this->input->post('authResponse');
      $userID = $authResponse['userID'];
      $accessToken = $authResponse['accessToken'];

      $this->load->model('SocialModel', 'SModel');

      $data = $this->SModel->FacebookData($accessToken);

      if($data) {

        $exist = $this->UserM->GetUser( false, $data['email'] );

        if($exist) {
          // $data = array(
          //   'data_fb'=>json_encode($data)
          // );

          $uid = $exist->id_user;
          // $this->db->where('id_user', $uid);
          $r = $exist;
          // $r = $this->db->update('user', $data);

        } else {
          $data = array(
            'created_at'=> date("Y-m-d H:i:s"),
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'mail'=>$data['email'],
            'fb_data'=>json_encode($data)
          );

          $r = $this->db->insert('user', $data);
          $uid = $this->db->insert_id();
        }

        if($r) {

          $this->UserM->LoginUser( $uid );
          echo json_encode(array( 'error'=>0, 'callback'=>'reload' ));
        }
      }
    }
    
  } 

	public function logout()
	{
    if(!$this->user) return redirect(base_url('.'));

    $user_data = $this->session->get_userdata();

    foreach ($user_data as $key => $value) {
        if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
            $this->session->unset_userdata($key);
        }
    }

    return redirect(base_url('.'));
	}


}
