<?php
include_once("ot-session.php");
sec_session_start();
//ajax file must allow access only in ajax request with this code.
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!IS_AJAX) {
	die('exit');
}else{
	$pos = strpos($_SERVER['HTTP_REFERER'],getenv('HTTP_HOST'));
	if($pos===false){
		die('exit');
	}
	include("ot-connection.php");
	include("ot-language.php");
	
	if(isset($_POST['idreminder'])){
		$id = (int)$_POST["idreminder"];

		$db->where('id', $id);
		$db->getOne('reminders');

		if($db->count > 0){
			$db->where('id', $id);
			$rst=$db->delete('reminders');
			echo "ok";
		}else{
			echo "No se puede eliminar este recordatorio...";
		}
	}
}
?>