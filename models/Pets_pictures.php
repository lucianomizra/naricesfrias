<?php
class Pets_pictures_Model extends Model {

	public $table 	= 'pets_pictures';
		
	protected $_fields = array(
		'pets_id',
		'img',
		'title',
	);

}

?>