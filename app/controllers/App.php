<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends APP_Controller {
	public function index()
	{
	  $this->load->model('PetModel', 'PetM');

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
	  
	  $this->data['pets'] = $this->PetM->GetMapPets($params);
		$this->data['pet_statues'] = $this->PetM->GetStatues();
		$this->data['pet_types'] = $this->PetM->GetTypes();
		$this->data['pet_races'] = $this->PetM->GetRaces();

		$this->namespace = 'landing';
		$this->main('home');
	}
	public function contact()
	{
		if($this->input->post())
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name', 'nombre', 'trim|required',
			array(
			    'required'=>'Nombre es un campo obligatorio.',
			));

			$this->form_validation->set_rules('subject', 'nombre', 'trim|required',
			array(
			    'required'=>'Asunto obligatorio.',
			));

			$this->form_validation->set_rules('comments', 'Comentario', 'trim|required',
			array(
			    'required'=>'Mensaje es un campo obligatorio.',
			));

			$this->form_validation->set_rules('mail', 'Mail', 'trim|required|valid_email',
			array(
			    'required'=>'Mail es un campo obligatorio.',
			    'valid_email'=>'Mail invalido.',
			));
			if ($this->form_validation->run() == FALSE)
			{
			$data['error'] = 1;
			$data['inputErrors'] = $this->form_validation->error_array();
			return $this->json($data);

			} else {

				$this->load->model('Mailjetmodel','MJ');

				$data = $this->MJ->PrepareMail( 'contact-mail',
						[['Email' => $this->MJ->client_mail, 'Name' =>$this->MJ->client]],
						$this->input->post() );

				return $this->json(array('error'=>0,'callback'=>'success-contact'));

			}
		}

		$this->namespace = 'single';
		$this->view = 'contact';
		$this->logo = true;

		$this->data['headers'] = $this->Data->GetHeader([
	      'title'=> 'Contacto',
	      'description'=> 'Contacto',
	    ]);

		$this->main('contact');
	}
	public function reglamento()
	{
		$this->namespace = 'single';
		$this->view = 'reglamento';
		$this->logo = true;

		$this->data['headers'] = $this->Data->GetHeader([
	      'title'=> 'Reglamento',
	      'description'=> 'Reglamento',
	    ]);

		$this->main('contact');
	}
	public function legal()
	{
		$this->namespace = 'single';
		$this->view = 'legal';
		$this->logo = true;

		$this->data['headers'] = $this->Data->GetHeader([
	      'title'=> 'Bases y condiciones',
	      'description'=> 'Bases y condiciones',
	    ]);

		$this->main('contact');
	}
	public function faq()
	{
		$this->namespace = 'single';
		$this->view = 'faq';
		$this->logo = true;

		$this->data['headers'] = $this->Data->GetHeader([
	      'title'=> 'Preguntas frecuentes',
	      'description'=> 'Preguntas frecuentes',
	    ]);

		$this->main('contact');
	}
	public function upload() {
		if (!empty($_FILES)) {
		    $this->load->model('FileManagerModel', 'filemodel');

		    $file = $_FILES['file'];


		    $this->filemodel->fglobal = false;
		    $this->filemodel->dbglobal = $this->config->item('db-global', 'app');

		    $data = $this->filemodel->uploadFile($file,5);
		         
		    echo json_encode($data);
	    }
	}
}
