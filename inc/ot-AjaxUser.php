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
	include_once("ot-salt.php");

	if($_POST["action"] == "del" && $_POST["iduser"] != ""){
		$db->where('id', $_POST["iduser"]);
		$pic = $db->getOne('users');	
		$ruta = "../images/" . $pic["picture"];		
		if (file_exists($ruta)) {
			$del = unlink($ruta);
		}
		$db->where('id', $pic["id"]);
		$rst = $db->delete('users');
		echo "ok";
	}else{
		$error 	= true;
		$msg 	= "";
		
		################validar email##############
		function verificaremail($correo){
			if (!filter_var($correo, FILTER_VALIDATE_EMAIL) === false) {
				return true; 
			} else {
				return false; 
			}
		}
		if($_POST["login"] == "" || $_POST["email"] == ""){
			$error = false;
			$msg .= "<p><span class='otvacio'>Rellene los campos, por favor</span></p>";
		}
		if(!verificaremail($_POST['email'])){
			$error = false;
			$msg .= "<p><span class='otvacio'>El campo correo no es válido</p>"; 
		}
		
		if(!$error){
			echo $msg;
			exit();
		}
		$password="A123456a*";
		$password = hash('sha512', $salt.sha1($password));
		$datos = array(
			'login'			=> $_POST["login"],
			'password'		=> $password,
			'name'			=> $_POST["name"],
			'surname'		=> $_POST["surname"],
			'sex'			=> $_POST["sex"],
			'email'			=> $_POST["email"],
			'identification'=> '',
			'picture'		=> $_FILES['picture']['name'],
			'status'		=> $_POST["status"],
		);
		

		
		if($_POST["iduser"] != ""){
			$db->where('id', $_POST["iduser"]);
			$rst = $db->update('users', $datos);
		}else{
			$rst = $db->insert('users', $datos);
		}
		if ($rst > 0){
			$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			$limite_kb = 5000;
			if(! empty($_FILES['picture']['name'])){
				if (in_array($_FILES['picture']['type'], $permitidos) ){
					$ruta = "../images/" . $_FILES['picture']['name'];
					if (!file_exists($ruta)){
						@move_uploaded_file($_FILES["picture"]["tmp_name"], $ruta);
					}
				}
			}			
			echo "ok";			
		}else{
			echo "<p><span class='otvacio'>Hubo un problema, contacte con el administrador</span></p>";
			//var_dump($datos);
		}
	}
}
?>