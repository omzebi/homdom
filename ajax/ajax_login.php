<?php
include_once("../inc/ot-session.php");
sec_session_start();

$ref = getenv('HTTP_REFERER');   

if (!strpos($ref,'index') !== false){
    // show error 
	echo "What's happens";
}else{
	include ("../inc/ot-connection.php");
	include ("../inc/ot-admin.php");

	//get address ip visitor
	function getRealIP(){
		if (!empty($_SERVER['HTTP_CLIENT_IP']))
			return $_SERVER['HTTP_CLIENT_IP'];
		   
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
	   
		return $_SERVER['REMOTE_ADDR'];
	}

	//click button otlogin
	if(isset($_POST["otconnect"])){
		if(!empty($_POST["otconnect"])){
			
			//clean variables
			$otlogin=$_POST['otlogin'];
			$otpassword=$_POST['otpassword'];
			
			//if field empty
			if($otlogin == "" || $otpassword == ""){
				exit('<p>RELLENE TODOS LOS CAMPOS, POR FAVOR<br></p>');
			}
			//num of attempts
			$db->where('login',$otlogin);
			$data = $db->get('attempts');
			$attempts=$db->count;
			
			if($attempts > 5){
				//bloc compte
				if($attempts > 5 && $attempts <= 8){
					$data = $db->insert('attempts', array('login' => $otlogin,'date' => date('Y-m-d H:i:s')));
					exit('<p>Su cuenta ha sido bloqueada...<br>Contacte con el Administrador</p>');			
				}else if($attempts > 8 && $attempts <= 10){
					$data = $db->insert('attempts', array('login' => $otlogin,'date' => date('Y-m-d H:i:s')));
					exit('<p>Estamos investigando su direcci&oacute;n IP:<b>'.getRealIP().'...</b><br>Al seguir intentando acceder a nuestra plataforma,<br> puede considerarse como <b>delitos inform&aacute;ticos</b>.</p>');	
				}else{
					exit('<p>QUE CO&Ntilde;O EST&Aacute;S HACIENDO<br></p>');	
				}
			}else{
				$coduser = hash('sha512', $salt.sha1($otpassword));
				$codadmin 	= hash('sha512', $salt.sha1($otpassword));
				
				//if admin
				if($codadmin == $passadmin && $otlogin == "omzebi"){
					$_SESSION['otlogin']="omzebi";
					$_SESSION['name']="Oumar Toure";
					$_SESSION['profil']=12345;
					
					//del attempts
					$db->where('login',$otlogin);
					$data = $db->delete('attempts');
					
					echo "ok";
				}else{
					//buscamos el user en la BD
					$db->where('login', $otlogin);
					$db->where('password', $coduser);
					$data = $db->getOne('users');
					//si existe el usuario
					if ($db->count > 0){
						//check user status
						if($datos["status"] == "1"){
							//si, el otlogin existe
							$_SESSION["drid"] 		= $data["id"];
							$_SESSION["otlogin"] 	= $data["otlogin"];
							$_SESSION["name"] 		= $data["name"];
							$_SESSION["surname"] 	= $data["surname"];
							//setcookie(otlogin, $fila["otlogin"]);
							
							//creamos las sesiones de perfiles
							$db->where('idusu',$datos['id']);
							$profiles = $db->get('usersprofiles');
							$_SESSION['profil']="";
							foreach($profiles as $item){
							$_SESSION['profil'].=$item['idprofiles'];
							}
							
							//incrementar Num de acceso
							$num = array(
							'veces' => $db->inc(),
							);
							$db->where('id',$datos['id']);
							$db->update('users', $num);
							
							//eliminar los attempts
							$db->where('login',$otlogin);
							$data = $db->delete('attempts');
							
							
							echo "ok";
						}else{
							echo "<span>Usuario deshabilitado</span><br>Contacte con el administrador";
						}
					}else{
						//si, el otlogin no existe
						$data = $db->insert('attempts', array('login' => $otlogin,'date' => date('Y-m-d H:i:s')));
						echo "<span>Lo siento, este usuario no existe...</span><br>";
						##echo "<span><a href='forgetpass.php'>Pulse aqu&iacute; para restablecer su contrase&ntilde;a</a></span><br>";
					}
				}
			}
		}
	}
}
?>