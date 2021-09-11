<?php
include_once("inc/ot-session.php");
sec_session_start();
include("inc/ot-display_error.php");
include("inc/ot-connection.php");
include("inc/ot-language.php");

header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies. 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
	<title>DOMHOM S.L.</title>
	<meta name="google-site-verification" content="" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--------css-------->
	<link type="text/css" rel="stylesheet" href="css/ot-reset.css">
	<link type="text/css" rel="stylesheet" href="css/ot-main.php">
	<link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/jquery-ui.min.css">
	
	<!--------css design response-------->
	<link type="text/css" rel="stylesheet" href="css/ot-smartphones.php" media="only screen and  (max-width : 321px)">	
	<link type="text/css" rel="stylesheet" href="css/ot-tablets.php" media="only screen and (max-width : 800px)">
	<link type="text/css" rel="stylesheet" href="css/ot-desktops-laptops.php" media="only screen and (min-width: 801px) and (max-width: 1199px)">
	<link type="text/css" rel="stylesheet" href="css/ot-pantallas-anchas.php" media="only screen and (min-width : 1824px)">	
	<!-----plugin jquery----->
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/moment-with-locales.min.js"></script>
	<script type="text/javascript" src="js/datetimepicker.js"></script>
	<script type="text/javascript" src="js/responsiveslides.min.js"></script>
	<script type="text/javascript" src="js/artyom.window.min.js"></script>	
	<script type="text/javascript" src="js/jquery.flip.min.js"></script>
    <script type="text/javascript" src="https://cdn.firebase.com/js/client/2.2.1/firebase.js"></script>
	
</head>
<body>

<input type="hidden" value="<?php echo $_COOKIE['lang'];?>" id="otlang" />
<noscript>
	<?php  
	//Creamos una función que detecte el lang del navegador del cliente. 
	 function getUserLanguage() {  
		$lang =substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2); 
		return $lang;  
	} 
	  
	//Almacenamos dicho lang en una variable 
	$user_language=getUserLanguage(); 
	   
	//De acuerdo al lang hacemos una o varias redirecciones. 
	if($user_language == 'es'){ 
	?>
		<h1>Comprobando si javascript está habilitado</h1>
		<div class="deshabilitado">
			<p><i class="fa  fa-spin fa-5x fa-fw">!</i></p><br>
			
			<div>
				Javascript está deshabilitado en su navegador web.<br>
				<p>Por favor, para ver correctamente este sitio, <b><i>habilite javascript</i></b>.</p>
				<p>Para ver las instrucciones para habilitar javascript en su navegador, haga click 
				<a href="http://www.enable-javascript.com/es/" target="_blank">aquí</a>.</p>
			</div>	
		</div>
	<?php
	} elseif($user_language == 'en'){
	?>
		<h1>Checking if javascript is enabled</h1>
		<div class="deshabilitado">
			<p><i class="fa  fa-spin fa-5x fa-fw">!</i></p><br>			
			<div>
				Javascript is disabled in your web browser.<br>
				<p>Please, to correctly view this website, <b><i>enable javascript</i></b>.</p>
				<p>To see the instructions to enable javascript in your browser, click 
				<a href="http://www.enable-javascript.com/en/" target="_blank">here</a>.</p>
			</div>			
		</div>
	<?php
	} elseif($user_language == 'de'){
	?>
		<h1>Checking if javascript is enabled</h1>
		<div class="deshabilitado">
			<p><i class="fa  fa-spin fa-5x fa-fw">!</i></p><br>			
			<div>
				Javascript is disabled in your web browser.<br>
				<p>Please, to correctly view this website, <b><i>enable javascript</i></b>.</p>
				<p>To see the instructions to enable javascript in your browser, click 
				<a href="http://www.enable-javascript.com/en/" target="_blank">here</a>.</p>
			</div>			
		</div>
	<?php
	}
	?>
	<p><img src="images/javascript.png" width="150px" alt="Javascript deshabilitado" /></p>
</noscript>
<!--<span id="fullscreen"><i class="fa fa-desktop" aria-hidden="true"></i></span>-->
<div>
	<div class="otconfig">
		<span class="ot-load" id="ot-home"><i class="fa fa-home fa-1x" aria-hidden="true"></i>Home</span>
		<span id="otshowmenu"><i class="fa fa-columns fa-1x" aria-hidden="true"></i>Panels</span>
		<span class="ot-load" id="ot-reminder"><i class="fa fa-braille fa-1x" aria-hidden="true"></i>Reminders</span>
		<span class="ot-load" id="ot-leds"><i class="fa fa-lightbulb-o fa-1x" aria-hidden="true"></i>All Leds</span>		
		<span class="ot-load" id="ot-menu"><i class="fa fa-tasks fa-1x" aria-hidden="true"></i>Menu</span>		
		<span class="ot-load" id="ot-menu"><i class="fa fa-coq fa-1x" aria-hidden="true"></i>Reset configuration</span>		
		<span class="ot-load" id="ot-menu"><i class="fa fa-download fa-1x" aria-hidden="true"></i>Backup configuration</span>		
		<span class="ot-load" id="ot-menu"><i class="fa fa-upload fa-1x" aria-hidden="true"></i>Restore configuration</span>
		<span class="ot-load" id="ot-exit"><i class="fa fa-sign-out fa-1x" aria-hidden="true"></i>Exit</span>
		<span id="otflag">
			<span>
				<img src="images/en.png" width="20px" class="mylang" id="en" />
				<img src="images/es.png" width="20px" class="mylang" id="es" />
				<img src="images/fr.png" width="20px" class="mylang" id="fr" />
				<img src="images/de.png" width="20px" class="mylang" id="de" />
				<img src="images/it.png" width="20px" class="mylang" id="it" />
			</span>
		</span>	
	</div>
	<?php
	if($_SESSION["otlogin"]){
	?>
	<i class="fa fa-bars fa-2x" aria-hidden="true" id="otshowconfig"></i>
	<?php
	}
	?>
</div>
<div id="otmenuvert">
	<?php
	$db->where ("status", 1);
	$data = $db->get('places');
	$num = $db->count ;
	if($num > 0){
		foreach($data as $item){
		?>
		<span class="ot-loaditem" id="<?php echo $item['id'];?>"><i class="fa fa-<?php echo $item['icon'];?>" aria-hidden="true"></i><br><label><?php echo $item["name"];?></label></span>
		<input type="hidden" value="<?php echo $item['pass'];?>" id="otpassplace" />
		
		<?php
		}
	}
	?>
</div>

	<div id="otpin">
		<div><h2>ACCESS CODE</h2></div>
		<input type="password" value="" id="pass" />
		<input type="hidden" value="" id="idplace" />
		<div><span>1</span><span>2</span><span>3</span><span>*</span></div>
		<div><span>4</span><span>5</span><span>6</span><span>!</span></div>
		<div><span>7</span><span>8</span><span>9</span><span>?</span></div>
		<div><span><i class="fa fa-long-arrow-left" aria-hidden="true" id="ot-borrar"></i></span><span>0</span><span>.</span><span>#</span></div>
	</div>
<div class="rslides">
<ul>
	<?php
	$db->where ("status", 1);
	$data = $db->get('background');
	$num = $db->count ;
	if($num > 0){
		foreach($data as $item){
		?>
			<li><img src="images/<?php echo $item["img"];?>" alt="<?php echo $item["title"];?>" title="<?php echo $item["title"];?>"></li>
		<?php
		}
	}
	?>
</ul>
</div>
<script>
    var ardx = new Firebase('https://node-ba82e.firebaseio.com/ardx/');
</script>
<script type="text/javascript">
var agentUrl = "http://192.168.1.34:8081/digitalwrite"
toggleLed = function(valor, led, pin, dev){
	//alert(estado);
	var estado = valor.value;
	valor.checked == true ? valor.value='OFF' : valor.value='ON';
	switch (led){
		case 'ledA':
			ardx.update({'ledA':estado=='ON'?1:0});
			ardx.update({'brithA':estado=='ON'?122.5:0});
			break;
		case 'ledB':
			ardx.update({'ledB':estado=='ON'?1:0});
			ardx.update({'brithB':estado=='ON'?122.5:0});
			break;
	}
	
	var url = agentUrl + "/" + pin  + "/" + dev + "/" + estado + "/";
	$.ajax({
		url: url,
		method: "GET",
		success: function(response) {
			console.log("success");
		},
		error: function (request, status, error) {
			console.log("Whoops! Something went horribly wrong: " + error);
		},    
		complete:function(){
		}
	});	
};
//Brightness LED
brightnessLed = function(valor, brith, pin, dev){
	switch (brith){
		case 'brithA':
			ardx.update({'brithA':valor.value});
			break;
		case 'brithB':
			ardx.update({'brithB':valor.value});
			break;
	}
};
/*
//firebase data change event
ardx.on('value', function(snapshot){
	var value = snapshot.val(); // is on or off
	
	//ledA
	if(value.ledA == 0){
		document.getElementById("iA13").classList.remove("ledon");
		document.getElementById("A13").value = 0;
		document.getElementById("A13").style.display = 'none';
		document.getElementById("dnA").checked  = false;
		alert("aaa");
	}else{
		document.getElementById("iA13").classList.add("ledon");
		document.getElementById("A13").style.display = 'block';
		document.getElementById("A13").value = value.brithA;
		document.getElementById("dnA").checked  = true;
	}
	//ledB
	if(value.ledB == 0){
		document.getElementById("iB13").classList.remove("ledon");
		document.getElementById("B13").value = 0;
		document.getElementById("B13").style.display = 'none';
		document.getElementById("dnB").checked  = false;
	}else{
		document.getElementById("iB13").classList.add("ledon");
		document.getElementById("B13").style.display = 'block';
		document.getElementById("B13").value = value.brithB;
		document.getElementById("dnB").checked  = true;
	}
	if(value.leds == 0){
		document.getElementById("leds").value = 'ON';
	}else{
		document.getElementById("leds").value = 'OFF';
	}
	//TEMPERATURE
	if(value.tempA != document.getElementById("ottemp").innerHTML){
		var t = parseFloat(document.getElementById("ottemp").innerHTML)
		//ardx.update({'tempA':t });
		document.getElementById("ottemp").innerHTML  = value.tempA;
	}
});
*/
$(document).ready(function(){
	//sliders background
	$(".rslides ul").responsiveSlides({
		auto: true,             // Boolean: Animate automatically, true or false
		speed: 500,            	// Integer: Speed of the transition, in milliseconds
		timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
		pager: false,           // Boolean: Show pager, true or false
		nav: false,             // Boolean: Show navigation, true or false
		random: false,          // Boolean: Randomize the order of the slides, true or false
		pause: false,           // Boolean: Pause on hover, true or false
		pauseControls: true,    // Boolean: Pause when hovering controls, true or false
		prevText: "Previous",   // String: Text for the "previous" button
		nextText: "Next",       // String: Text for the "next" button
		maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
		navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
		manualControls: "",     // Selector: Declare custom pager navigation
		namespace: "rslides",   // String: Change the default namespace used
		before: function(){},   // Function: Before callback
		after: function(){}     // Function: After callback
	});
		
	//load pager
	$(document).on("click", ".ot-load",function(){
		window.location.href = $(this).attr("id")+".php";
	});	
	//show menu top
	$(document).on("click", "#otshowconfig",function(){
		$("div.otconfig").fadeIn("fast").animate({ "marginTop" : "0px" }, "fast");
		setTimeout(function() {
			$("div.otconfig").fadeOut("fast").animate({ "marginTop" : "-50px" }, "fast");
		}, 100000);
	});	
	//close menu top
	$(document).on("click", "div.otconfig > span",function(){
		$("div.otconfig").fadeOut("fast").animate({ "marginTop" : "-50px" }, "fast");
	});	

	//pass
	
	$(document).on("click", "#ot-borrar",function(){
		$("#pass").val($("#pass").val().slice(0, -1));
	});
	$(document).on("click", ".ot-loaditem",function(){
		$("*").removeClass("otactive");
		$(this).addClass("otactive");
		$("#idplace").val($(this).attr("id"));
		var pass 	= $(this).next("input:hidden").val();
		var page 	= $(this).next("input:hidden").attr("id");
		$("#pass").val("");
		if(pass != ""){
			$("#otpin").slideUp( "slow", function() {
				$("#otpin").fadeIn('fast');
				$("#otpin span").click(function(event){
					//alert($(this).text());
					$("#pass").val($('#pass').val()+$(this).text());
					if($("#pass").val().length == 6){
						var pin = $("#pass").val();
						var idplace = $("#idplace").val();
						//alert(idplace);	
						//alert(pin);
						$.ajax({
							url: "inc/ajax_pin.php",
							type: "post",
							data: "idplace="+idplace+"&pin="+pin+"&page="+page,
							success: function(data) {
								if(data == "ok1"){
									$("#otpin").fadeOut('fast');
									$("#pass").val("");
									$("*").removeClass("otactive");
									$("#otmenuvert").animate({ "marginLeft" : "-1000px" }, "slow").fadeOut('slow');
									$("#otmenuvert").css({"width":"100%"});
									window.location.href = 'ot-items.php?idplace='+idplace;
								}else if(data == "ok2"){
									$("#otpin").fadeOut('fast');
									$("#pass").val("");
									$("i.fa-ellipsis-h").hide();
									$("#otlock").show();
								}else{
									$("#pass").val("");
									$("#pass").before("<p class='ot-error'>El PIN NO ES CORRECTO, INTENTELO DE NUEVO</p>").prev("p.ot-error").delay(1000).fadeOut('slow');;
								}
							}
						});						
					}
					e.PreventDefault();
				});
			});
		}else{
			$("#otpin").fadeOut('fast');
			$("#pass").val("");
			$("*").removeClass("otactive");
			$("#otmenuvert").animate({ "marginLeft" : "-1000px" }, "slow").fadeOut('slow');
			$("#otmenuvert").css({"width":"100%"});
			window.location.href = 'ot-items.php?idplace='+$(this).attr('id');
		}
		return false;
	});	
	
	//show menu
	$(document).on("click", "#otshowmenu",function(){
		if($("#otmenuvert:visible").length > 0){
			$("#otmenuvert").animate({ "marginLeft" : "-1000px" }, "slow").fadeOut('slow');
		}else{
			$("#otmenuvert").show('slide',{direction:'right'},1).animate({ "marginLeft" :"0" }, "slow");
		}
	});
	setInterval(function(){
		$("#otmenuvert").animate({ "marginLeft" : "-1000px" }, "slow").fadeOut('slow');
		$("#otmenuvert").css({"width":"100%"});
	}, 100000);	
	
	
	

	//range
	$('input[type="range"]').change(function () {
		var val = ($(this).val() - $(this).attr('min')) / ($(this).attr('max') - $(this).attr('min'));
		
		$(this).css('background-image',
					'-webkit-gradient(linear, left top, right top, '
					+ 'color-stop(' + val + ', #205BAD), '
					+ 'color-stop(' + val + ', #C5C5C5)'
					+ ')'
					);
	});

	
	//show menu top
	$(document).on("click", ".otshowoption",function(){
		//#ot-timer,#ot-countdown,#otshowmuser 
		var _this = $(this).attr("id");
		$( "div.ot_options" ).slideUp( "slow", function() {
			$("div.ot_options").fadeIn("slow").animate({ "marginBottom" : "0px" }, "fast");
			if(_this == "ot-countdown"){
				$("#otcountdown").show();
				$("#ottimer").hide();
			}else{
				$("#otcountdown").hide();
				$("#ottimer").show();
			}
		});
		setTimeout(function() {
			$( "div.ot_options" ).slideUp( "slow", function() {
				$("div.ot_options").fadeOut("slow").animate({ "marginBottom" : "-600px" }, "fast");
				$("div.dtp_modal-win").fadeOut();
				$("div.dtp_modal-content").fadeOut();
			});
		}, 100000);
	});
	
});

//full screen 
$('*aa').click(function() {
	//toggleFullScreen();
	if (document.documentElement.requestFullScreen) {
		document.documentElement.requestFullScreen();
	} else if (document.documentElement.mozRequestFullScreen) {
		document.documentElement.mozRequestFullScreen();
	} else if (document.documentElement.webkitRequestFullScreen) {
		document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
	}
});

</script>