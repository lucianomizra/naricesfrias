<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends APP_Controller {
  public function __construct () {
    parent::__construct();

    if(!$this->user) return redirect(base_url('login'));
    
    $this->view = 'user/account/main';
    $this->namespace = 'application';
  }

  public function publicdata()
  {
    if ( $this->input->post() ) {
      $this->ajaxForm_publicData();
    } else {
      $this->subview = 'publicdata';

      $this->data['breadcrumb'] = [
        ['title'=>'Cuenta','href'=>base_url('user/account')],
        ['title'=>'Datos personales'],
      ];

      $this->data['headers'] = $this->Data->GetHeader([
        'title'=> 'Datos personales',
      ]);


      $this->main();
    }
  }


  private function ajaxForm_publicData() {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('first_name', 'nombre', 'trim|required',
      array(
          'required'=>'Nombre es un campo obligatorio.',
      ));
    $this->form_validation->set_rules('last_name', 'apellido', 'trim|required',
      array(
          'required'=>'Apellido es un campo obligatorio.',
      ));

    if ($this->form_validation->run() == FALSE)
    {
      $data['error'] = 1;
      $data['inputErrors'] = $this->form_validation->error_array();
      return $this->json($data);
    } else {
    	$public_data = "";
    	if($this->input->post('public_data') && count($this->input->post('public_data')))
    	{
    		$public_data = implode(',', $this->input->post('public_data'));
    	}    		
      $user = array(
        'first_name'=>$this->input->post('first_name'),
        'last_name'=>$this->input->post('last_name'),
        'gender'=>$this->input->post('gender'),
        'birthday'=> change_format( $this->input->post('birthday'), 'd/m/Y', 'Y-m-d' ),
        'phone'=>$this->input->post('phone'),
        'public_data'=>$public_data,
      );

      // if( $file = $this->input->post('file') ) {
      //   $this->load->model('FileManagerModel', 'filemodel');
      //   $user['id_file'] = $this->filemodel->NewFileFromDataURI( $file );
      // }
      
      $this->db->where('id_user', $this->user->id_user);
      $r = $this->db->update('user', $user);

      return $this->json(array( 'error'=>0, 'callback'=> 'notify', 'title'=> 'Datos guardados correctamente.' ));
    }
  }

  public function change_password()
  {

    if($this->input->post()) {
      $this->load->library('form_validation');


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

      $this->form_validation->set_rules('current_password', 'mail', 'trim|required|callback__validate_password',
        array(
          'required'=>'Contraseña actual es un campo obligatorio.',
          '_validate_password'=>'Contraseña actual incorrecta',
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

        $this->db->where('id_user', $this->user->id_user);
        $r = $this->db->update('user', $data);

        return $this->json(array( 'error'=>0, 'callback'=> 'toast', 'toast_subtitle'=> 'Nueva contraseña guardada.' ));
      }

    }

    $this->data['headers'] = $this->Data->GetHeader([
      'title'=> 'Cambiar contraseña',
    ]);
    $this->data['breadcrumb'] = [
      ['title'=>'Cuenta','href'=>base_url('user/account')],
      ['title'=>'Cambiar contraseña'],
    ];

    $this->subview = 'change_password';

    $this->main();
  }

  public function my_pets()
  {

    $this->load->model('PetModel', 'PetM');
    $this->data['headers'] = $this->Data->GetHeader([
      'title'=> 'Mascotas publicadas',
    ]);
    $this->data['breadcrumb'] = [
      ['title'=>'Cuenta','href'=>base_url('user/account')],
      ['title'=>'Mascotas publicadas'],
    ];

    $this->data['pets'] = $this->PetM->GetPets(['where'=>'my_pets']);

    $this->subview = 'my-pets';

    $this->main();
  }

  public function _validate_age($date)
  {
    return validate_age( change_format( $date, 'd/m/Y', 'Y-m-d' ), 18 );
  }
  public function _validate_password($str)
  {
    return $this->UserM->ProcessLogin( $this->user->mail, $str );
  }

}
