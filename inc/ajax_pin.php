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
	
	if(isset($_POST['idplace']) && isset($_POST['pin'])){
		$id 	= $_POST["idplace"];
		$pin 	= $_POST["pin"];
		$page 	= $_POST["page"];
		if($page == "otpassplace"){
			$db->where('id', $id);
			$db->where('pass', $pin);
			$db->getOne('places');
			if($db->count > 0){
				echo "ok1";
			}else{
				echo "ko";
			}
		}else{
			$db->where('idplace', $id);
			$db->where('pass', $pin);
			$db->getOne('devices');
			if($db->count > 0){
				echo "ok2";
			}else{
				echo "ko";
			}
		}
	}
}
?>