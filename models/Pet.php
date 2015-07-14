<?php
class Pet_Model extends Model {

	public $table 	= 'pets';
		
	protected $_fields = array(
		'name',
		'description',
	);

	protected $_has_many = array(
        'pets_pictures' => array(),
        // 'type' => array(),
    );

    protected $_has_one = array(
        'pets_races' => array(),
        'pets_status' => array(),
        'user' => array('name_id'=>'users_id'),
    );

	public function my_pets () {
		$sql = "SELECT `{$this->table}`.name, `{$this->table}`.id, `{$this->table}`.description, `{$this->table}_pictures`.img, `{$this->table}_status`.status as status FROM `{$this->table}`
				LEFT JOIN `{$this->table}_pictures` ON `{$this->table}_pictures`.pets_id = `{$this->table}`.`id`
				LEFT JOIN `{$this->table}_status` ON `{$this->table}_status`.id = `{$this->table}`.pets_status_id
				WHERE `users_id` = ".USER.
				" GROUP BY `{$this->table}`.`id`
				ORDER BY `{$this->table}`.`created_at` DESC";

		return $this->query($sql);
	}

	public function home_pets () {
		$sql = "SELECT `{$this->table}`.name, `{$this->table}`.id, `{$this->table}`.description, `{$this->table}_pictures`.img, `{$this->table}_status`.status as status FROM `{$this->table}`
				LEFT JOIN `{$this->table}_pictures` ON `{$this->table}_pictures`.pets_id = `{$this->table}`.`id`
				LEFT JOIN `{$this->table}_status` ON `{$this->table}_status`.id = `{$this->table}`.pets_status_id
				WHERE `{$this->table}_pictures`.img IS NOT NULL
				GROUP BY `{$this->table}`.`id`
				ORDER BY `{$this->table}`.`created_at` DESC
				LIMIT 30";

		return $this->query($sql);
	}

	public function search ($f) {

		$_wheres = '';
		if(isset($f['status_id']) && $f['status_id']) $_wheres .= " AND pets_status_id = '{$f['status_id']}'";
		if(isset($f['races_id']) && $f['races_id']) $_wheres .= " AND pets_races_id = '{$f['races_id']}'";
		if(isset($f['name']) && $f['name']) $_wheres .= " AND name LIKE '{$f['name']}'";

		$sql = "SELECT `{$this->table}`.name, `{$this->table}`.id, `{$this->table}`.description, `{$this->table}_pictures`.img, `{$this->table}_status`.status as status FROM `{$this->table}`
				LEFT JOIN `{$this->table}_pictures` ON `{$this->table}_pictures`.pets_id = `{$this->table}`.`id`
				LEFT JOIN `{$this->table}_status` ON `{$this->table}_status`.id = `{$this->table}`.pets_status_id
				WHERE `{$this->table}_pictures`.img IS NOT NULL
				{$_wheres}
				GROUP BY `{$this->table}`.`id`
				ORDER BY `{$this->table}`.`created_at` DESC
				LIMIT 30";


		return $this->query($sql);
	}

	public function delete_pictures () {

		if( is_numeric( $this->id ) ) {

			$sql = "DELETE FROM `pets_pictures` WHERE `pets_pictures`.`pets_id` = {$this->id}";
			// $sql = "UPDATE `nf`.`pets_pictures` SET status = 'deleted' WHERE `pets_pictures`.`pets_id` = {$this->id}";

			// Aca borramos los archivos

			$r = $this->query($sql);

			return $r;
		}
	}

}

?>