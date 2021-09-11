<?php
include_once("ot-session.php");
sec_session_start();
if(isset($_COOKIE["lang"])){

	switch($_COOKIE["lang"]){
		case "es":
			include("ot-es.php");
		break;
		case "en":
			include("ot-en.php");
		break;
		case "fr":
			include("ot-fr.php");
		break;
		case "de":
			include("ot-de.php");
		break;
		case "it":
			include("ot-it.php");
		break;
		default:
			include("ot-it.php");
		break;
	}
}else{
	setcookie(lang, "es");
	include("ot-es.php");
}
?>