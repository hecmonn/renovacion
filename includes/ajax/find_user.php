<?php
require_once '../ini.php';
$tempt_user=isset($_GET["username"])?mysql_prep($_GET["username"]):false;
if($tempt_user){
    $user=find_username($tempt_user);
    if($user)
        echo "true";
    else
        echo "false";
}
?>
