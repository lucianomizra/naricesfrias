<?php defined('PATH') OR exit('Error 1');

class Template extends Model {

	public function template_init ( $params = array(), $theme = 'default' ) {

		$user_data = $this->data_user();

		$title = ( isset($user_data['first_name'] )) ? 'Bienvenido '.html_print($user_data['first_name']).' |' : 'Bienvenido a ';

		switch ($theme) {
			case 'default':
				$this->view('main/html', array('title'=>$title) );
				$this->view('main/head', array('user_name'=>$user_data['first_name']));
			break;
			// case 'modal':
			// 	$this->view('modal/header');
			// break;
		}

	}
	public function template_end ( $theme = 'default' ) {
		switch ($theme) {
			case 'default':
				$this->view('main/footer');
			break;
			// case 'modal':
			// 	$this->view('modal/footer');
			// break;
		}
	}

	protected function view($view,$params=array()){
		$params['this'] = $this;

		if(is_array($params)) {
			foreach ($params as $key => $value) {
				$$key = $value;
			}
		}

		include VWSPATH.$view.'.php';
	}

	public function requiere_login() {
		if(USER) { 
			return true;
		} else {
			$this->view('user/requiere_login');

			return false;
		}
	}

	public function action_error404 ()
	{
		if(!AJAX) $this->template_init();

		$this->view('error404');

		if(!AJAX) $this->template_end();
	}
}