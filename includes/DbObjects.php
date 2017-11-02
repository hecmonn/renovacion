<?php
require_once("functions.php");
class DbObjects{
	public function create($tempting_att){
		$new_user=$this->set_attributes($tempting_att);
		$attributes = self::get_attributes();
		$sql ="INSERT INTO ".static::$table." (";
		$sql .= join(",", array_keys($new_user)) .") VALUES ('";
		$sql .= join("','", array_values($new_user))."')";
		$res_sql=exec_query($sql);
		return $res_sql;
	}
	public function update(){
		$attributes = self::get_attributes();
		$attributes_kv = [];
		foreach($attributes as $key => $value){
			$attributes_kv[] = $key."='".$value."'";
		}
		$sql = "UPDATE ".self::table_name." SET ";
		$sql .= join (", ", $attributes_kv) . " WHERE $id = ";
		$sql .=  mysql_prep($po_number);
		exec_query($sql);
	}

	private function has_attributes($attribute){
		$object_vars = get_object_vars($this);
		$att_tested=array_key_exists($attribute, $object_vars);
		if($att_tested){
			return $attribute;
		}
	}

	protected function get_attributes(){
		$attributes = get_object_vars($this);
		$clean_attributes =[];
		foreach($attributes as $key => $value){
			$clean_attributes[$key] = mysql_prep($value);
		}
		return $clean_attributes;
	}

	private function debug_attributes($attributes){
		$db_attributes=[];
		foreach($attributes as $key=>$att){
			$cleaning_att=self::has_attributes($key);
			if($cleaning_att===NULL){
				unset($cleaning_att);
			}else{
				$db_attributes[$key]=$att;
			}
		}
		return $db_attributes;
	}


	public function set_attributes($att){
		$attributes=$this->debug_attributes($att);
		foreach($attributes as $key=>$value){
			$new_user[$key]=mysql_prep($value);
		}
		return $new_user;
	}
	public function instantiate($db_entry){
		$object = new self();
		foreach($db_entry as $key=>$value){
			$object->$key=$value;
		}
		return $object;
	}
	public function find_by_id($id){
		$sql="SELECT * FROM ".static::$table." WHERE id_user={$id}";
		$res_sql=exec_query($sql);
		return $res_sql;
	}
}

?>
