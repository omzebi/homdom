<?php
$valido=0;
$error="";

$numeros = '/^[0-9]{9,20}$/';
$letras = '/^[A-ZüÜáéíóúÁÉÍÓÚñÑ ]{1,50}$/i';
 
echo "<div class='ot-mens'>";

foreach($_POST as $campos => $valor)
{
	switch($campos)
	{
		case	"ot-nombre":
			if(empty($valor) || strlen($valor) < 3 || strlen($valor) > 50){  
				$valido=1;
				$error.= "<p style='text-align:left'>.".$campos .' incorrecto</p>'; 
			}else if(! preg_match($letras,$valor)){
				$valido=1;
				$error.= "<p style='text-align:left'>.".$campos .' no es valido</p>'; 
			}
		break;
		case	"ot-email":
			if(empty($valor) || strlen($valor) < 3 || strlen($valor) > 100){ 
				$valido=1;
				$error.= "<p style='text-align:left'>.".$campos .' incorrecto</p>'; 
			}else if (!filter_var($valor, FILTER_VALIDATE_EMAIL)){
				$valido=1;
				$error.= "<p style='text-align:left'>.".$campos .' no es valido</p>';		
			}
		break;
		case	"ot-telefono":
			if(empty($valor)){
				$valido=1;
				$error.= "<p style='text-align:left'>.".$campos .' incorrecto</p>'; 
			}elseif (! preg_match($numeros,$valor)){
				$valido=1;
				$error.= "<p style='text-align:left'>.".$campos .' no es valido</p>'; 
			}
		break;	
		case	"ot-asunto":
			if(empty($valor) || strlen($valor) < 3 || strlen($valor) > 50){  
				$valido=1;
				$error.= "<p style='text-align:left'>.".$campos .' incorrecto</p>'; 
			}		
		break;	
		case	"ot-mensaje":
			if(empty($valor) || strlen($valor) < 3 || strlen($valor) > 300){  
				$valido=1;
				$error.= "<p style='text-align:left'>.".$campos .' incorrecto</p>'; 
			}		
		break;
		default:
		break;
	}
}

echo "</div>";
?>