<? defined('PATH') OR exit('Error 1');

class Home extends Template {

	public function action_index ($filters = false)
	{

		$this->template_init(array());

		$this->load_model( 'Pet' );
		$pets_model = new Pet_Model();

		if(is_array($filters)) $pets = $pets_model->search($filters);
		else $pets = $pets_model->home_pets();

		$this->view('widgets/map-home');
		$this->view('widgets/slide_pets', array('pets'=>$pets));
		$this->view('widgets/create_pets_buttons');

		$this->template_end();
	}
	public function action_search ()
	{

		$filters['status_id'] = post('status_id');
		$filters['races_id'] = post('races_id');
		$filters['name'] = post('name');

		$this->action_index($filters);
	}
}