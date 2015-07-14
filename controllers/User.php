<? defined('PATH') OR exit('Error 1');

class User extends Template {

	function __construct () {
		$this->load_model( 'User' );
	}

	private $secret_key = '73jhx8dz';
	private $table = 'users';

	private function encript_passwd ($str) {
		return sha1($str.$this->secret_key);
	}

	public function action_logout () {
		session_destroy();

		redirect('');
	}
	public function action_sign_in () {
		if(AJAX) {

			$Validation = load('validation'); 

			$validations = array(
				'password' => array( 'type'=>'len', 'value' => post('password') ),
				'email' => array( 'type'=>'email', 'value' => post('email') ),
			);

			$errors = $Validation->multi($validations);

			if( ! is_array($errors) ) { 
				
				$this->connect();

				$sql = "SELECT id, email, first_name, last_name, birthday, gender, thumbnail, phone, locations_id
						FROM $this->table 
						WHERE email = :email AND password = :password";

				$values = array(
						'email'=> post('email'), 
						'password'=> $this->encript_passwd( post('password') )
					);

				$r = $this->db->query( $sql, $values );

				if( isset($r[0]) && $r[0] ) {
					$this->set_session('user',$r[0]);

					$response = array('success'=>true);

				} else {
					$response = array('success'=>false, 'errors'=> array('email','password') );
				}

			} else {
				$response = array('success'=>false, 'errors'=>$errors);
			}

			echo json_encode( $response );
		}
	}

	public function action_sign_up () {
		if(AJAX) {

			$Validation = load('validation'); 

			$terms = (post('terms') == 'on');

			$validations = array(
				'first_name' => array( 'type'=>'len', 'value' => post('first_name') ),
				'last_name' => array( 'type'=>'len', 'value' => post('last_name') ),
				'email' => array( 'type'=>'email', 'value' => post('email') ),
				'password' => array( 'type'=>'len', 'value' => post('password') ),
				'terms' => array( 'type'=>'true', 'value' => $terms ),
			);

			$errors = $Validation->multi($validations);

			if( is_array($errors) ) {
				$response = array('success'=>false, 'errors'=>$errors);
			} else {
				// valido bien, registramos

				$values = array(
					'email'=> post('email'), 
					'first_name'=> post('first_name'), 
					'last_name'=> post('last_name'), 
					'password'=> $this->encript_passwd( post('password') )
				);

				$user = New User_Model();
				$user->values( $values );

				$insert = $user->save();

				if(is_numeric( $insert )) {
					unset($values['password']);

					$values['id'] = $insert;

					$this->set_session('user',$values);

					$response = array('success'=>true);
				} else if ( is_array($insert) && isset($insert[2]) && strpos($insert[2], 'email') !== false ) {
					$response = array('success'=>false, 'errors'=>array('email') );
				} else {
					$response = array('success'=>false, 'msg'=>'Error al crear', $insert );
				}
			}

			echo json_encode( $response );

		}
	}

	public function action_account() {

		if(USER) {

			$this->template_init();

			$this->load_model( 'Pet' );

			$pet = New Pet_Model();

			$my_pets = $pet->my_pets();

			$this->view('user/account', array('pets'=>$my_pets) );

			$this->template_end();
		} else {
			$this->requiere_login();
		}

	}


}