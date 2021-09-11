<?php	
//include_once("ot-session.php");
//sec_session_start();
include("../inc/ot-connection.php");
include("../inc/ot-language.php");
//ajax file must allow access only in ajax request with this code.
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!IS_AJAX) {
	die('exit');
}else{
	$pos = strpos($_SERVER['HTTP_REFERER'],getenv('HTTP_HOST'));
	if($pos===false){
		die('exit');
	}

	if(isset($_POST["btnplan"])){
		if(isset($_POST["htmlplan"]) && $_POST["htmlplan"] != ""){
			if($_POST["btnplan"] == "del_plan"){
				$db->where('status',1);
				$rst = $db->delete('htmlplan');
				if($rst){
					echo "Se ha borrado el plan";
				}else{
					echo "No se ha podido borrar el plan";	
				}
			}else{
				$htmlplan		=	$_POST["htmlplan"];
				$datosplan 		= 	array(
					'plan' 		=>	$htmlplan,
					'status' 	=>	1,
				);
				$rst = $db->insert('htmlplan', $datosplan);
				
				if($rst){
					echo "Se ha creado el plan";
				}else{
					echo "No se ha podido crear el plan";	
				}
			}
		}
	}else{
		header("Location:http://192.168.1.36/domhom/ot-plan.php");
	}
}
?>
