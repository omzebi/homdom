<?php
//$host= $_SERVER["HTTP_HOST"];
//$uri= $_SERVER["REQUEST_URI"];
//$url = "http://" . $host . $uri;

if(empty($_SESSION['otlogin'])){
	header("Location:http://192.168.1.36/domhom/index.php");
}
?>