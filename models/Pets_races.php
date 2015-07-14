<?php
class Pets_races_Model extends Model {

	public $table 	= 'pets_races';
		
	protected $_fields = array(
		'race',
	);

	protected $_has_one = array(
		// 'pets_type',
	);

}

?>