<?php

class DBConnector extends Base
{
   private $dbServer;
   private $dbPort;
   private $dbUser;
   private $dbPassword;
   private $dbName;
   private $dbLink;

   public function get_dbLink()
   {
      return $this->dbLink;
   }

   public function set_dbLink($oDB = true)
   {
      if (! is_object($oDB)) {
         if (is_bool($oDB)) {
            $_db_config = file_get_contents(COREPATH . 'protected/db.config');
            $_db = unserialize(base64_decode(str_rot13($_db_config)));

            $this->dbServer = $_db->DB_HOST;
            $this->dbPort = $_db->DB_PORT;
            $this->dbUser = $_db->DB_USERNAME;
            $this->dbPassword= $_db->DB_PASSWORD;
            $this->dbName = $_db->DB_DATABASE;
         }

         $dsn = 'mysql:host=' . $this->dbServer . ';'
               . 'port=' . $this->dbPort . ';'
               . 'dbname=' . $this->dbName;

         try {
            @$this->dbLink = new PDO($dsn, $this->dbUser, $this->dbPassword);
         } catch (PDOException $e) {
            printf("Connect failed: %s\n", $e->getMessage());
            exit();
         }
      } else {
         $this->dbLink = $oDB;
      }
   }

   public function __construct($_xxx= '', $server = '', $port = '', $user = '', $password = '', $database = '')
   {
      if (strlen($server) > 0) $this->dbServer = $server;
      if (strlen($port) > 0) $this->dbPort = $port;
      if (strlen($user) > 0) $this->dbUser = $user;
      if (strlen($password) > 0) $this->dbPassword = $password;
      if (strlen($database) > 0) $this->dbName = $database;

      $this->set_dbLink();
   }

   public function query($sql, $values = array())
   {
      $_result = false;

      if (($_stmt = $this->dbLink->prepare($sql))) {
         if (preg_match_all('/(:\w+)/', $sql, $_named, PREG_PATTERN_ORDER)) {
            $_named = array_pop($_named);
            
            foreach ($_named as $_param) {
               $_stmt->bindValue($_param, $values[substr($_param, 1)]);
            };
         };

         try {
            if (! $_stmt->execute()) {
               $_result = $_stmt->errorInfo();
			   //$_result = false;
            }else{
				$_result = $_stmt->fetchAll(PDO::FETCH_ASSOC);
			};
            $_stmt->closeCursor();
         } catch(PDOException $e){
           echo "Excepcion atrapada";
                $_result = $e->getMessage();
				//$_result = false;
         };
      };
      
      return $_result;
   }
   
   public function query_insert($sql, $values = array())
   {
      $_result = false;

      if (($_stmt = $this->dbLink->prepare($sql))) {
         if (preg_match_all('/(:\w+)/', $sql, $_named, PREG_PATTERN_ORDER)) {
            $_named = array_pop($_named);
            
            foreach ($_named as $_param) {
               $_stmt->bindValue($_param, $values[substr($_param, 1)]);
            };
         };

         try {
            if (!$_stmt->execute()) {
               $_result = $_stmt->errorInfo();
			   // $_result = false;
            }else{
				$_result = true;
			};
            $_stmt->closeCursor();
         } catch(PDOException $e){
           echo "Excepcion atrapada";
                $_result = $e->getMessage();
				// $_result = false;
         };
      };
      
      return $_result;
   }
   
   public function query_update($sql, $values = array(),$rowcont = false)
   {
      $_result = false;

      if (($_stmt = $this->dbLink->prepare($sql))) {
         if (preg_match_all('/(:\w+)/', $sql, $_named, PREG_PATTERN_ORDER)) {
            $_named = array_pop($_named);
            
            foreach ($_named as $_param) {
               $_stmt->bindValue($_param, $values[substr($_param, 1)]);
            };
         };

         try {
            if (!$_stmt->execute()) {
               $_result = $_stmt->errorInfo();
			   // $_result = false;
            }else{
				$_result = true;
				if(($rowcont)) {
					$_result = $_stmt->rowCount();
				}
			};
            $_stmt->closeCursor();
         } catch(PDOException $e){
           echo "Excepcion atrapada";
                $_result = $e->getMessage();
				// $_stmt->execute = false;
         };
      };
      
      return $_result;
   }
   
   public function query_delete($sql, $values = array())
   {
      $_result = false;

      if (($_stmt = $this->dbLink->prepare($sql))) {
         if (preg_match_all('/(:\w+)/', $sql, $_named, PREG_PATTERN_ORDER)) {
            $_named = array_pop($_named);
            
            foreach ($_named as $_param) {
               $_stmt->bindValue($_param, $values[substr($_param, 1)]);
            };
         };

         try {
            if (!$_stmt->execute()) {
               //$_result = $_stmt->errorInfo();
			   $_result = false;
            }else{
				$_result = true;
			};
            $_stmt->closeCursor();
         } catch(PDOException $e){
           // echo "Excepcion atrapada";
                //$_result = $e->getMessage();
				$_result = false;
         };
      };
      
      return $_result;
   }
   
   public function query_insert_return_id($sql, $values = array())
   {
      $_result = false;

      if (($_stmt = $this->dbLink->prepare($sql))) {
         if (preg_match_all('/(:\w+)/', $sql, $_named, PREG_PATTERN_ORDER)) {
            $_named = array_pop($_named);
            
            foreach ($_named as $_param) {
               $_stmt->bindValue($_param, $values[substr($_param, 1)]);
            };
         };

         try {
            if (!$_stmt->execute()) {
               $_result = $_stmt->errorInfo();
			   // $_result = false;
            }else{
				$_result = $this->dbLink->lastInsertId();
			};
            $_stmt->closeCursor();
         } catch(PDOException $e){
           // echo "Excepcion atrapada";
               $_result = $e->getMessage();
			   // $_result = false;
         };
      };
      
      return $_result;
   }

   public function insert_array($table , $data){
      foreach ($data as $field=>$value) {
         $fields[] = '`' . $field . '`';
         $valuesData[] = ":" . $field;
      };
      $field_list = implode(',', $fields);
      $value_list = implode(', ', $valuesData);
      
      $sql = "INSERT INTO `" . $table . "` (" . $field_list . ") VALUES (" . $value_list . ")";
      $values = $data;

      $res = $this->query_insert_return_id($sql, $values);

      return $res;
   }

   // public function executeSP($spName, $values = array())
   // {
   //    $_rs = $this->query('CALL ' . $spName, $values);

   //    return $_rs;
   // }

   public function update_array( $table , $data){
      $string = '';

      foreach ($data as $key => $value) {
         if(isset($value) /*&& $value */&& $value != 'id') {
            $string .= '`'. $key . '` = :'.$key.', ';
         }
      };
            
      $sql = "UPDATE $table SET ".trim($string,', ')." WHERE `id` = \"{$data['id']}\"";
      $values = $data;


      $res = $this->query_update($sql, $values);

      return $res;
   }

}

?>