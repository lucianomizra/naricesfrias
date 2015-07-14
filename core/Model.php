<?php
class Model extends DBConnector {

	public $db;
	public $id;

	public function get ($id) {

		if( is_numeric($id) ) {

			if (isset( $this->_has_one )) {
				foreach ($this->_has_one as $table => $values) {
					$name_id = isset($values['name_id']) ? $values['name_id'] : "{$table}_id";
					$this->_fields[] = $name_id;
				}
			}

			if (isset( $this->_fields )) {
				$_fields = '';
				$_fields .= "`{$this->table}`."."`id`".', ';
				foreach ($this->_fields as $v) {
					$_fields .= "`{$this->table}`."."`".$v."`".', ';
				}
				$_fields = substr($_fields,0,-2);
			} else {
				$_fields = '*';
			}


			$sql = "SELECT {$_fields} FROM `{$this->table}` WHERE `{$this->table}`.`id` = {$id}";

			$r = $this->query($sql);

			if( !isset($r[0]) or !isset($r[0]['id']) ) return array();


			$this->values( $r[0] );		

			if (isset( $this->_has_many )) {
				foreach ($this->_has_many as $table => $_fields) {

					$name_model = ucwords($table).'_Model';
					
					$this->load_model( ucwords($table) );
					$Model = New $name_model();
					
					$manyr = $Model->find(array($this->table.'_id'=>array('c'=>'=','d'=>$id)));
					
					$this->$table = $manyr;
				}
			}

			if (isset( $this->_has_one )) {
				foreach ($this->_has_one as $table => $values) {

					$name_id = isset($values['name_id']) ? $values['name_id'] : "{$table}_id";
					$name_model = ucwords($table).'_Model';
					
					$_id = $r[0][$name_id];

					$this->load_model( ucwords($table) );
					$Model = New $name_model;


					$result = $Model->get($_id);

					$this->$table = isset( $result[0] ) ? $result[0] : array();					
				}
			}

			return $r;
		} else return false;
	}


	public function connect() {
		$this->db = new DBConnector();		
	}

	public function values ( $values = array() ) {

		foreach ($values as $key => $value) {
			$this->$key = $value;
		}

	}

	public function save() {
		$data = array();
		$data["created_at"] = $this->get_date();

		if (isset( $this->_has_one )) {
			foreach ($this->_has_one as $table => $values) {
				$name_id = isset($values['name_id']) ? $values['name_id'] : "{$table}_id";
				$this->_fields[] = $name_id;
			}
		}


		foreach ($this->_fields as $fields) {
			if(isset($this->$fields)) $data[$fields] = $this->$fields;
		}

		return $this->insert_array($this->table , $data);
	}

	public function update() {
		$data = array();
		$data['id'] = $this->id;
		$data["updated_at"] = $this->get_date();

		if (isset( $this->_has_one )) {
			foreach ($this->_has_one as $table => $values) {
				$name_id = isset($values['name_id']) ? $values['name_id'] : "{$table}_id";
				$this->_fields[] = $name_id;
			}
		}

		foreach ($this->_fields as $fields) {
			$data[$fields] = $this->$fields;
		}

		return $this->update_array( $this->table , $data);
	}

	public function delete() {
		// aca tenemos que ahcer un update status
		// $sql = "UPDATE FROM `$this->table` WHERE `id` = :id ";
		// $values = array(
		//  'id'=>$this->id
		// );

		// return $this->query_delete($sql , $values);
	}

	public function find($filters = array()) {

		if (isset( $this->_fields )) {
			$_fields = '';
			$_fields .= "`{$this->table}`."."`id`".', ';
			foreach ($this->_fields as $v) {
				$_fields .= "`{$this->table}`."."`".$v."`".', ';
			}
			$_fields = substr($_fields,0,-2);
		} else {
			$_fields = '*';
		}
      
		if (count( $filters )) {
			$_filters = '';
			$index = 0;
			foreach ($filters as $i => $v) {
				if($index==0) $_filters .= " WHERE ";
				else $_filters .= " AND ";
				$_filters .= $i.' '.$v['c'].' '.$v['d'];
				$index++;
			}
		} else {
			$_filters = '';
		}
      
      	
      	$sql = "SELECT {$_fields} FROM " . $this->table . ' '. $_filters;

   		return $this->query($sql);

	}
}

?>