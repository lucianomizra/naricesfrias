<?php
class User_Model extends Model {

	public $table 	= 'users';

	// function __construct ($con = null ) {
	// 	$this->table	= $table;
	// }

	protected $_fields = array(
		'email',
		'password',
		'first_name',
		'last_name',
		'fb_name',
		'birthday',
	);

}

?>