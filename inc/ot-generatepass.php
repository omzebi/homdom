<?php
function generatePass(){
	$longitud=8;

	$vo 		= 'aeiouyAEUY';
	$cons 		= 'bcdfghjklmnpqrstvwxzBDGHJLMNPQRSTVWXZ';

	$khoromsi 	.= '23456789';
	$cons 		.= $khoromsi;
	$vo 		.= $khoromsi;

	$password = '';
	$alt = time() % 2;
	for ($i = 0; $i < $longitud; $i++){
		if ($alt == 1){
			$password .= $cons[(rand() % strlen($cons))];
			$alt = 0;
		}else{
			$password .= $vo[(rand() % strlen($vo))];
			$alt = 1;
		}
	}
	return $password;
}
?>