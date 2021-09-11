<?php
include_once("inc/ot-session.php");
sec_session_start();

unset($_SESSION["otlogin"]);

$_SESSION=array();
session_destroy(); 
//session_unregister("usuario");

foreach (@$_COOKIE as $key => $value){
	@$_COOKIE[$key] = '';
	unset($_COOKIE[$key]);
}
header("Location:http://192.168.1.36/domhom/index.php");
?>