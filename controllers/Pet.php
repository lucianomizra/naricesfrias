<? defined('PATH') OR exit('Error 1');

class Pet extends Template {

	function __construct () {
		$this->load_model( 'Pet' );
	}

    public function action_index($id) {
		$pet = New Pet_Model();

		$pet->get($id);

		if(!AJAX) $this->template_init();
		$this->view('pet/details',array('pet'=>$pet));
		if(!AJAX) $this->template_end();
    }

	public function action_new ($id = false)
	{
		$this->requiere_login();
		
		if(!AJAX) $this->template_init();

		if( is_numeric( $id ) ) {

			$pet = New Pet_Model();
			$pet->get($id);

			$pet_status = $pet->pets_status['status'];

		} else {
			$pet = array();
			$pet_status = get(0);
		}

		switch ($pet_status) {
			case 'adopted':
				$title = 'Ingresá los datos de la mascota para adoptar';
				$btn = (is_numeric($id)) ? '<i class="fa fa-pencil"></i> Editar mascota' : '<i class="fa fa-flag"></i> Publicar en adopción';
				$status_id = 1;
			break;
			case 'located':
				$title = 'Ingresá los datos de la mascota encontrada';
				$btn = (is_numeric($id)) ? '<i class="fa fa-pencil"></i> Editar mascota' : '<i class="fa fa-flag"></i> Publicar mascota';
				$status_id = 2;
			break;
			case 'lost':
				$title = 'Ingresá los datos de la mascota perdida';
				$btn = (is_numeric($id)) ? '<i class="fa fa-pencil"></i> Editar busqueda' : '<i class="fa fa-search"></i> Publicar busqueda';
				$status_id = 3;
			break;
		}

		$this->view('forms/new-pet',array('pet'=>$pet,'status_id'=>$status_id,'pet_status'=>$pet_status, 'title'=>$title, 'btn'=>$btn));

		if(!AJAX) $this->template_end();
	}

	public function action_edit ($id=false) {
		$this->action_new($id);
	}

	public function action_update ($id=false) {
		$this->action_create($id);
	}

	public function action_create ($id=false) {

		if(AJAX && USER) {

			$Validation = load('validation'); 

			$validations = array(
				'description' => array( 'type'=>'len', 'value' => post('description') ),
				'status_id' => array( 'type'=>'num', 'value' => post('status_id') ),
				'races_id' => array( 'type'=>'num', 'value' => post('races_id') ),
			);

			$pictures = post('pictures');

			$errors = $Validation->multi($validations);

			if( is_array($errors) ) {
				$response = array('success'=>false, 'errors'=>$errors);
			} else {

				$values = array(
					'name'=> post('name'), 
					'description'=> post('description'), 
					'pets_status_id'=> post('status_id'), 
					'pets_races_id'=> post('races_id'), 
				);

				$pet = New Pet_Model();

				if( !is_numeric($id) ) {
					$values['users_id'] = USER; 

					$method = 'save';
				} else {
					$pet->get($id);

					$method = 'update';
				}
				
				$pet->values( $values );

				if( $method == 'update' && $pet->users_id != USER ) { echo json_encode(array('success'=>false, 'msg'=>'Necesitas estar logeado' )); return false; }

				$insert = $pet->$method();

				if(is_numeric( $insert ) && $method == 'save') {

					if(is_array($pictures)) {
						foreach ($pictures as $i => $pic) {

							$pet->insert_array('pets_pictures', array(
								'pets_id'=>$insert,
								'position'=>$i,
								'img'=>$pic
							) );

						}
					}

					$values['id'] = $insert;

					$response = array('success'=>true);

				} else if($insert == true && $method == 'update') {
					
					$pet->delete_pictures();

					if(is_array($pictures)) {
						foreach ($pictures as $i => $pic) {

							$insert_pic = $pet->insert_array('pets_pictures', array(
								'pets_id'=>$pet->id,
								'position'=>$i,
								'img'=>$pic
							) );

						}
					}
					

					$response = array('success'=>true);
				} else {
					$response = array('success'=>false, 'msg'=>'Error al cargar', $insert );
				}
			}

			echo json_encode( $response );
		}
	}

	public function action_upload_pictures () {

		$uploader = load('Upload_picture');

		$name_file = random_id();

		$uploader->process ( 'pets', array('width'=> 64,'height'=> 64,'name'=> $name_file.'_xs', 'quality'=> 60) );
		$uploader->process ( 'pets', array('width'=> 128,'height'=> 128,'name'=> $name_file.'_md') );

		$original_imgs = $uploader->process ( 'pets', array('name'=> $name_file ) );
		
		echo $original_imgs;

	}

}