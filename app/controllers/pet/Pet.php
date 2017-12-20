<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pet extends APP_Controller {
	public function __construct () {
	  parent::__construct();

	  $this->namespace = 'application';
	  $this->load->model('PetModel', 'PetM');
	}

	public function form($id=false)
	{
	  if(!$this->user) return redirect(base_url('login'));

		if ($id) {
			$this->data['pet'] = $this->PetM->GetPet($id);
			if( $this->data['pet']->id_user != $this->user->id_user ) return $this->error404();
		} else {
			$this->data['pet'] = false;
		}


		$this->view = 'pet/form';

		$title='Publicar';
		$this->data['breadcrumb'] = [
	      ['title'=>'Mascotas', 'href'=>base_url('pets')],
	      ['title'=>$title],
	    ];
		$this->data['headers'] = $this->Data->GetHeader([
		  'title'=>$title,
		]);

		$this->data['pet_statues'] = $this->PetM->GetStatues();
		$this->data['pet_types'] = $this->PetM->GetTypes();
		$this->data['pet_races'] = $this->PetM->GetRaces();

		return $this->main();
	}

	public function lista()
	{
		$this->view = 'pet/list';


	  $params = [];
	  if ($this->input->get()) {
	  	$params['where'] = [];
	  	if( $this->input->get('id_status') )
	  		$params['where'][] = ['t.id_status'=>$this->input->get('id_status')];
	  	if( $this->input->get('id_type') )
	  		$params['where'][] = ['t.id_type'=>$this->input->get('id_type')];
	  	if( $this->input->get('id_race') )
	  		$params['where'][] = ['t.id_race'=>$this->input->get('id_race')];
	  	if( $this->input->get('name') )
	  		$params['where'][] = ['t.name'=>$this->input->get('name')];
	  }

		$title='Listado';
		$this->data['breadcrumb'] = [
	      ['title'=>'Mascotas', 'href'=>base_url('pets')],
	      ['title'=>$title],
	    ];
		$this->data['headers'] = $this->Data->GetHeader([
		  'title'=>$title,
		]);

		$this->data['pet_statues'] = $this->PetM->GetStatues();
		$this->data['pet_types'] = $this->PetM->GetTypes();
		$this->data['pet_races'] = $this->PetM->GetRaces();
		$this->data['pets'] = $this->PetM->GetPets($params);

		return $this->main();
	}

	public function details($id=false)
	{
		$this->data['pet'] = $this->PetM->GetPet($id);
		if(!$this->data['pet']) return $this->error404();
		$this->data['user'] = $this->UserM->PublicDataUser( $this->data['pet']->id_user );
		$this->view = 'pet/details';

		$this->data['pet_statues'] = $this->PetM->GetStatues();
		$this->data['pet_types'] = $this->PetM->GetTypes();
		$this->data['pet_races'] = $this->PetM->GetRaces();

		$title = $this->data['pet']->name;
		$this->data['breadcrumb'] = [
	      ['title'=>'Mascotas', 'href'=>base_url('pets')],
	      ['title'=>$title],
	    ];
		$this->data['headers'] = $this->Data->GetHeader([
		  'title'=>$title,
		]);

		return $this->main();
	}

	public function post()
	{
		if($this->input->post() && $this->user)
    {
    	$edit = 0;
    	$id_pet = 0;
    	if ($this->input->post('id_pet')) {
	    	$this->db->where('id_pet',$this->input->post('id_pet'));
	    	$this->db->where('id_user',$this->user->id_user);
	    	$this->db->where('active',1);
	    	$this->db->select('id_pet');
	    	$this->db->from('pet');
	    	$r = $this->db->get()->row();
	    	if(!$r) return '???';
	    	$edit = 1;

	    	$id_pet = $this->input->post('id_pet');
    	}


  		$this->load->library('form_validation');

  	  $this->form_validation->set_rules('id_status', 'estado', 'trim|required',
      array(
        'required'=>'¡Estado es un campo obligatorio!',
      ));
  	  $this->form_validation->set_rules('id_type', 'Especie', 'trim|required',
      array(
        'required'=>'¡Especie es un campo obligatorio!',
      ));
  	  $this->form_validation->set_rules('gender', 'Especie', 'trim|required',
      array(
        'required'=>'¡Genero es un campo obligatorio!',
      ));
  	  // if ($this->input->post('id_type') == 1 || $this->input->post('id_type')==2) {
	  	 //  $this->form_validation->set_rules('id_race', 'Raza', 'trim|required',
     //    array(
     //      'required'=>'¡Raza es un campo obligatorio!',
     //    ));
  	  // }
  	  $this->form_validation->set_rules('description', 'Descripción', 'trim|required',
      array(
        'required'=>'¡Escribe una breve descripción!',
      ));

  		if ($this->form_validation->run() == FALSE) {
  			$data = [];
	      $data['error'] = 1;
	      $data['inputErrors'] = $this->form_validation->error_array();
	      echo json_encode($data);
	    } else {

	    	$element = [
	    		'created_at'=>now(),
	    		'id_user'=>$this->user->id_user,
	    		'active'=>1,
	    		'name'=>$this->input->post('name'),
	    		'description'=>$this->input->post('description'),
	    		'id_type'=>$this->input->post('id_type'),
	    		'id_race'=>$this->input->post('id_race'),
	    		'id_status'=>$this->input->post('id_status'),
	    		'gender'=>$this->input->post('gender'),
	    	];

	    	if ($id_pet) {
	    		$this->db->where('id_pet', $id_pet);
	    		$r = $this->db->update('pet', $element);
	    	} else {
	    		$r = $this->db->insert('pet', $element);
	    	}

	    	if ($r) {
	    		$id_pet = $this->db->insert_id();
	    		// Crea galeria
          $cg = $this->db->insert('nz_gallery', ['created'=> now()]);
          $id_gallery = $this->db->insert_id();
          // Crea items files
          $files = $this->input->post('id_file');
          if ($files && count($files)) {
            foreach ($files as $key => $id_file) {
              $this->db->insert('nz_gallery_file', [
              	'id_gallery'=> $id_gallery,
                'id_file'=>$id_file,
                'num'=>$key
              ]);
          	}
          }

          // crea locacion
          $this->db->insert('location', [
			      'lat'=>$this->input->post('lat'),
			      'lng'=>$this->input->post('lng'),
			      'keyword'=>$this->input->post('location_keyword'),
			    ]);
          $id_location = $this->db->insert_id();

          // agrega galeria y locacion
          $this->db->where('id_pet',$id_pet);
          $this->db->update('pet', ['id_gallery'=>$id_gallery, 'id_location'=>$id_location]);

          $this->json(['error'=>0,'callback'=>$edit?'pet-edit':'pet-publish']);
	    	}
	    }
    }
	}
}

