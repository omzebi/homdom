<?php
function sec_session_start() {
	if (!isset($_SESSION)){
		session_start();	
		session_regenerate_id(true);											//Regenera la sesi�n, borra la previa.
		//$_SESSION['usuario'] = true;
	}
	//$session_name = 'usuario';											//Configura un nombre de sesi�n personalizado
	//session_set_cookie_params(0,"/"); 
	ini_set('session.use_only_cookies', 1);									//Forza a las sesiones a s�lo utilizar cookies.
	//ini_set('session.use_trans_sid', 0 );
	ini_set('session.cookie_secure',0);										//Configura en verdadero (true) si utilizas https
	ini_set('session.cookie_httponly',1);									//Esto detiene que javascript sea capaz de accesar la identificaci�n de la sesi�n.
	//$cookieParams = session_get_cookie_params();							//Obt�n params de cookies actuales.
	//session_set_cookie_params($cookieParams[3600], $cookieParams["/"]);
	//session_name($session_name);											//Configura el nombre de sesi�n a el configurado arriba.
	//Inicia la sesi�n php
}
?>