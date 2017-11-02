<?php
require_once("Database.php");
function mysql_prep($string){
	global $Database;
	$encoded_string = utf8_decode($string);
	return mysqli_real_escape_string($Database->con, $encoded_string);
}
function exec_query($sql){
	global $Database;
	$result_set= mysqli_query($Database->con, $sql);
	if(!$result_set){
		die("Query failed: ".mysqli_error($Database->con));
	}
	return $result_set;
}
function last_insert(){
	global $Database;
	return mysqli_insert_id($Database->con);
}
function rows($res){
	return mysqli_num_rows($res);
}
function fetch($res){
	return mysqli_fetch_assoc($res);
}
function redirect_to($location){
	header("Location: ".$location);
	exit;
}
function html_prep($string){
	return nl2br(html_entity_decode(ucfirst(($string))));
}
function money($number){
	return money_format('%.2n',$number);
}
function session_message() {
	if(isset($_SESSION["message"])){
		$output = "<div class=\"session_message\" style=\"width:100%; border:1px solid rgba(0,0,0,.5)\"><h4 class=\"text-center\">";
		$output .= htmlentities($_SESSION["message"]);
		$output .= "</h4></div>";

		$_SESSION["message"] = null;
		return $output;
	}
}
function find_username($user){
	$sql="SELECT * FROM usuarios WHERE usuario='{$user}'";
	$res=exec_query($sql);
	if($user=fetch($res))
		return $user;
	else
		return false;
}
function password_check($tempt_password,$real_password){
	if(password_verify($tempt_password,$real_password))
		return true;
	else
		return false;
}

function nombre($row){
	return html_prep($row["nombre"])." ".html_prep($row["apellido"]);
}
function pretty_date($fecha){
	return date('j M y',strtotime($fecha));
}
?>
