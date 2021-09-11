<?php
try {
	require_once ('MySQL.php');
	$host		=	"127.0.0.1";

	$base		=	"mbarka";
	$username	=	"root";
	$password	=	"";

	$db = new oMySQL (Array (
		'host' 		=> $host,
		'username' 	=> $username, 
		'password' 	=> $password,
		'db'		=> $base,
		'port' 		=> 3306,
		'prefix' 	=> 'ot_',
		'charset' 	=> 'utf8')
	);

} catch (PDOException $e) {
    //print "¡Error!: " . $e->getMessage() . "<br/>";
    echo "<p style='text-align:center'>Database error<br><img src='images/connection.jpg' width='25%'/></p>"; 
	echo '<script language="javascript">alert("juas");</script>'; 
}
?>