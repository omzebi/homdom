<?php

?>
<script type="text/javascript">
$(document).ready(function(){
	// With ES6,TypeScript etc
	//import Artyom from './artyom.js';
	
	// Create a variable that stores your instance
	var artyom = new Artyom(); // Or 'new window.Artyom()' if you are using it in the browser.

	
	//alert(voice);
	// Verify if artyom is supported
	window.onload = function(){
		if(artyom.Device.isChrome){
			if(!artyom.Device.isMobile){
				//alert("Artyom can talk and obey commands in this browser, however the voice will be the default voice of the device. Cannot force language here.");
				/*artyom.fatality().then(() => {
					console.log("Artyom succesfully stopped !");
				});*/
			}else{
				// Everything okay ! , use artyom normally here !
				console.log(artyom.getProperties());
			}
		}else{
			alert("Artyom only works with The Google Chrome Browser !");
		}
	};	
	
	// Detener cualquier instancia previa
	artyom.fatality();
	
	
	// Change voice order:
	if($("#langVoice").val() == "en"){
		artyom.ArtyomVoicesIdentifiers["en-GB"] = ["Google UK English Female","Google UK English Male","en-GB","en_GB"];
		var voice = "en-GB";
	}else if($("#langVoice").val() == "de"){
		artyom.ArtyomVoicesIdentifiers["de-DE"] = ["Google DE Deutsch","de-DE","de_DE"];
		var voice = "de-DE";
	}else if($("#langVoice").val() == "fr"){
		artyom.ArtyomVoicesIdentifiers["fr-FR"] = ["Google FR français","fr-FR","fr_FR"];
		var voice = "fr-FR";
	}else if($("#langVoice").val() == "it"){
		artyom.ArtyomVoicesIdentifiers["it-IT"] = ["Google IT italiano","it-IT","it_IT"];
		var voice = "it-IT";
	}	else if($("#langVoice").val() == "es"){
		artyom.ArtyomVoicesIdentifiers["es-ES"] = ["Google ES español","es-ES","es_ES"];
		var voice = "es-ES";
	}	
	
    setTimeout(function(){// Esperar 250ms para inicializar
		// Start the commands !
		artyom.initialize({
			lang: voice, 						// Set the default language of artyom with this property (string)
			continuous: true, 					// Choose if you want Google Now mode (false) that only listen 1 command and then stops, or a Jarvis (true), that will listen forever (Recognizing all the commands that you give) (boolean)
			soundex: true,						// Use the soundex algorithm to increase accuracy
			debug: true, 						// This property allows the developer to be aware of what happens with the recognition of Artyom. Displays all the grammars recognized in the console (boolean)
			executionKeyword: "oiga",			// Set a keyword that allows your command to be executed immediately when you say this word (Useful in noisy environments)String	null
			obeyKeyword: "empezar de nuevo",	// Set a keyword that allows to enable the command recognition automatically if this word (or words) is recognized while artyom is paused by artyom.dontObey. String	null
			soundex: true,						// Enable the soundex algorithm for the command recognition. Sometimes the speech recognition is not 100% accurate, therefore you may want to enable to match a command even when the speech recognition API recognizes something wrong.
			listen: true, 						// if listen is equal to true the voice recognition will be started otherwise this property can be ignored. (boolean)!
			speed:0.9, 							// moderates the speed with which Artyom talks (0 ~ 1)
			mode:"normal", 						// This parameter is not required as it will be normal by default (normal,quick,remote)
			volume: 1, 							// Adjust the volume of the voice of artyom (float 1)
			name: ""							// Provide a name to your assistant. In this way, the assistant will reacts to the commands only when you start a phrase with this name e.g "Jarvis Good Morning". (string)
			 
		}).then(() => {
			console.log("Artyom has been succesfully initialized");
		}).catch((err) => {
			console.error("Artyom couldn't be initialized: ", err);
		});
    },3000);
	
	//Clear all the available commands of artyom
	artyom.emptyCommands();
	
	//keep the voice in input o DB
	artyom.redirectRecognizedTextOutput((recognized,isFinal) => {
		if(isFinal){
			// Nothing
		}else{
			$("#inputVoz").val(recognized);
			$("#txtVoz").text(recognized);	
			setInterval(function() {
				$("#txtVoz").text("");
			},3000);
		}
	});

	//say hello only once time
	var vconnected = $("#vconnected").val();
	//alert(vconnected);
	if(vconnected == "conected"){
		//To speech text
		artyom.say(".",{
			onStart: () => {
				artyom.dontObey();
				if(artyom.recognizingSupported()){
				   // Artyom can process commands
				   console.log(artyom.getVersion());
				}else{
				   // This browser doesn't support webkitSpeechRecognition
				}
			},
			onEnd: () => {
				console.log("No more text to talk");
				// Force the language of a single speechSynthesis
				artyom.say("<?php echo $hi;?>", {
					lang:voice
				});
				artyom.say("<?php echo $assistant;?>", {
					lang:voice
				});
				setTimeout(function(){
					// Allow to process commands again
					artyom.obey();
				},2000);// wait 2 seconds
			},    
			onResult:function(text){
				// Show the Recognized text in the console
				console.log("Recognized text: ", text);
				//$("#txtVoz").text(text);	
			}
		});	
		
	}
	// or add some commandsDemostrations in the normal way 
	var commands = [
		{
			smart:false,
			description:"Reiniciar artyom",
			indexes: ["maria contesta"],
			action: function(){
				artyom.restart();
			}
		},
		{
			smart:false,
			description:"Asistente",
			indexes: ["maria"],
			action: function(){
				artyom.sayRandom([
					"Hola omar",
					"Dime jefe",
					"Buenos dias, como estás",
					"Hola, quieres algo."
				]);
			}
		},
		{
			smart:false,
			description:"Dejar de hablar",
			indexes: ["oye"],
			action: function(){
				console.log("Artyom isn't obeying anymore");
				artyom.shutUp();
				//artyom.dontObey();
			}
		},
		{
			smart:false,
			description:"Says hello to the user",
			indexes: ["Hola maria que tal"],
			action: function(){
				artyom.say("Hola omar, como estás");
			}
		},
		{
			smart:false,
			description:"Says hello to the user",
			indexes: ["bien"],
			action: function(){
				artyom.say("me alegro que haya vuelto");
				artyom.say("que quieres que haga");
			}
		},
		{
			smart:false,
			description:"Says hello to the user",
			indexes: ["nada"],
			action: function(){
				artyom.say("vale y gracias");
			}
		},
		{
			smart:false,
			description:"Says hello to the user",
			indexes: ["gracias"],
			action: function(){
				artyom.say("de nada");
			}
		},
		{
			smart:true,
			indexes: ['repite conmigo *'],
			action: (i,wildcard) => {
				artyom.say("has dicho : "+ wildcard);
			}
		},
		{
			smart:false,
			description:"Says hello to the user",
			indexes: ["escribir"],
			action: function(){
				UserDictation.start();
			}
		},
		{
			smart:false,
			description:"Says hello to the user",
			indexes: ["no escribir"],
			action: function(){
				UserDictation.stop();
			}
		},
		{
			indexes:['me voy','chau'],
			action: function(){
				artyom.sayRandom([
					"Hasta pronto",
					"hasta luego",
					"vale, nos vemos luego",
					"Adios omar, estoy te quiero muchisimo y lo sabes perfectamente....ciao"
				]);				
			}
		},
		{
			indexes:['abrir google','abrir facebook', 'abrir youtube'],
			action: function(i){
				if (i==0) {
					artyom.say("Abriendo google");
					window.open("http://www.google.com",'_blank');
				}
				if (i==1) {
					artyom.say("Abriendo facebook");
					window.open("http://www.facebook.com/intecsolt/",'_blank');
				}
				if (i==2) {
					artyom.say("Abriendo youtube");
					window.open("https://www.youtube.com/channel/UCF721oswf7EUSsQbuGFoMZQ",'_blank');
				}
			}
		},
		{
			indexes:['salir', 'menu', 'derecha', 'izquierda', 'inicio'],
			action: function(i){
				if (i==0) {
					artyom.say("Saliendo de la aplicación......hummmmm....Hasta luego");
					$("#vexit")[0].click();
				}
				if (i==1) {
					artyom.say("Abriendo menu principal");
					location.reload();
				}
				if (i==2) {
					artyom.say("Abriendo menu derecha");
					window.location.href = 'ot-login.php';
				}
				if (i==3) {
					artyom.say("Abriendo menu izquierda");					
					$("#otshowmenu").click();
				}
				if (i==4) {
					artyom.say("yendo al inicio");		
					$("#ot-home").click();
				}
			}
		},
		// The smart commands support regular expressions
		{
			indexes: [/blablabla/i],
			smart:true,
			action: (i,wildcard) => {
				artyom.say("You've said : "+ wildcard);
			}
		},
		{
			indexes: ['apagar'],
			action: (i,wildcard) => {
				artyom.say("Hasta la proxima");
				artyom.fatality().then(() => {
					console.log("Artyom succesfully stopped");
				});
			}
		},
		{
				description:"Si mi base de datos contiene alguno del nombre dicho, hacer algo",
				smart:true, // Activar comando como un comando smart para poder usar comodines
				indexes:["Sabes quien es *","No se quien  *","Es * una buena persona"],
				// Ejecutar acción
				// i continene el indice que coincide con lo dicho en el array
				action:function(i,wildcard){
					var database = ["lola","may","andrea","luis","pedro","maria jose","reyes"];

					//Si lo dicho, coincide con la tercera propiedad de los indices
					//es decir, "Es xxx una buena persona", haga X, de lo contrario Y
					if(i == 1){
						if(database.indexOf(wildcard.trim())){
							artyom.say("Soy una máquina, nisiquiera se que es un sentimiento.");
						}else{
							artyom.say("No se quien es " + wildcard + " y no se como demonios podría decir si es una buena persona o no.");
						}
					}else{
						if(database.indexOf(wildcard.trim())){
							artyom.say("Por supuesto que se quien es "+ wildcard + ". Una muy buena persona a mi parecer.");
						}else{
							artyom.say("Mi base de datos no es lo suficientemente amplia, no se quien es " + wildcard);
						}
					}
				}
		},
		{
			indexes:["<?php echo $hora;?>","<?php echo $fecha;?>"],
			action:function(i){
				if(i == 0){
					//UnaFuncionQueDiceElTiempo(new Date());
					//artyom.say(new Date());
					var dt = new Date();
					var hh = dt.getHours();
					var mm = dt.getMinutes();
					var ss = dt.getSeconds();
					artyom.say(" <?php echo $esla;?> " + hh + " <?php echo $horas;?> " + mm + " <?php echo $minutos;?> " + ss + " <?php echo $segundos;?>");
				}else if(i == 1){
					var dt = new Date();
					// day  name
					var weekday = new Array(7);
					weekday[0] = "domingo";
					weekday[1] = "lunes";
					weekday[2] = "martes";
					weekday[3] = "miercoles";
					weekday[4] = "jueves";
					weekday[5] = "viernes";
					weekday[6] = "sábado";
					//month name
					var month = new Array(12);
					month[0] = "enero";
					month[1] = "febrero";
					month[2] = "marzo";
					month[3] = "abril";
					month[4] = "mayo";
					month[5] = "junio";
					month[6] = "julio";
					month[7] = "agosto";
					month[8] = "septiembre";
					month[9] = "octubre";
					month[10] = "noviembre";
					month[11] = "diciembre";

					var month = month[dt.getMonth()];	
					var day = weekday[dt.getDay()];						
					var dd = dt.getDate();
					//var mm = dt.getMonth()+1;
					var yy = dt.getFullYear();
					artyom.say(" Hoy es" + day + "" + dd + " de " + month + " del " + yy );
				}
			}
		},
		{
			indexes: ['lampara ON'],
			action: (i,wildcard) => {
				artyom.say("Hasta la proxima");
				toggleLed(this,'ledA',13,'A');
			}
		},
		
	];
	
	// write some text in field
	var UserDictation = artyom.newDictation({
		continuous:false, // Activar modo continuous if HTTPS connection
		onResult:function(text){
			// Mostrar texto en consola
			console.log(text);
		},
		onStart:function(){
			console.log("Dictado iniciado");
		},
		onEnd:function(){
			alert("Dictado detenido por el usuario");
		}
	});

	// Deten el dictado cuando quieras usando:
	// UserDictation.stop();

	// tell me the hour
	setInterval(function(){
	var dt = new Date();
	var hh = dt.getHours();
	var mm = dt.getMinutes();
	var ss = dt.getSeconds();
	//alert(mm);
		if(mm == "00" && ss < 3){
			//alert(mm);
			artyom.say(" <?php echo $esla;?> " + hh + " <?php echo $horas;?> " + mm + " <?php echo $minutos;?> " + ss + " <?php echo $segundos;?>");
		}
	},3000);

	// Alert Reminder
	setInterval(function(){
		$.ajax({
			type:"post",
			url:"ot-ReminderNow.php",
			success:function(data)
			{
				//alert(data);
				if(data == "ko"){	
					window.location.href = 'ot-home.php';			
				}else{
					artyom.say("you have a remember");
					window.location.href = 'ot-ReminderNow.php';
					setTimeout(function(){
						window.location.href = 'ot-home.php';
					}, 60000);	
				}
			}
		});
	}, 300000);//time in millisecond
	
	// Global event triggered when artyom.say starts to speak some text.
	artyom.when("SPEECH_SYNTHESIS_START",function(status){
		$(".micro").html("<i class='fa fa-volume-up fa-4x' aria-hidden='true'></i>");
		$("div.equalizer").show();
	});	
	
	// Global event triggered when artyom.say finishes to read some text.
	artyom.when("SPEECH_SYNTHESIS_END",function(status){
		$(".micro").html("<i class='fa fa-microphone fa-4x' aria-hidden='true'></i>");
		$("div.equalizer").hide();
	});	

	// Global event triggered when the user speaks to the microphone and some text is recognized.
	artyom.when("TEXT_RECOGNIZED",function(status){
		artyom.obey();
	});
	
	// Global event triggered when artyom starts to listening to your commands.
	artyom.when("COMMAND_RECOGNITION_START",function(status){
		artyom.addCommands(commands);
	});
	
	// Global event triggered when artyom doesn't listen anymore to your commands.
	artyom.when("COMMAND_RECOGNITION_END",function(status){
		if(status.code == "continuous_mode_enabled"){
			console.log("You're using continuous mode, therefore this callbacks is more likely to don't be used");
			artyom.restart();
			artyom.obey();
		}else if(status.code == "continuous_mode_disabled"){
			console.log("The continuous mode is disabled. Artyom will not listen anymore till the next initialization");
		}
	});	
	
	// Global event triggered when one of the provided commands matches with your voice. (A commands has been found)
	artyom.when("COMMAND_MATCHED",function(status){
		//artyom.addCommands(commands);
	});	
	
	// Global event triggered when the text spoken by the user does not match any of the loaded commands.
	artyom.when("NOT_COMMAND_MATCHED",function(status){		
		artyom.sayRandom([
					"<?php echo $message1;?>",
					"<?php echo $message2;?>",
					"<?php echo $message3;?>",
					"<?php echo $message4;?>"
				]);
	});	
	
	// Catches all the events identified with the code "error" and have subobjects. The objects have the following codes:		
	// All catchable artyom errors will be catched with this
	artyom.when("ERROR",function(error){

		if(error.code == "network"){
			console.log("An error ocurred, artyom cannot work without internet connection !");
		}

		if(error.code == "audio-capture"){
			console.log("An error ocurred, artyom cannot work without a microphone");
		}

		if(error.code == "not-allowed"){
			console.log("An error ocurred, it seems the access to your microphone is denied");
		}
		console.log(error.message);
		/*
		setTimeout(function(){
			artyom.fatality().then(() => {
				console.log("Artyom succesfully stopped !");
				console.log(error.message);
			});
		}, 5000);
		*/
		
	});	
	
	
	if(artyom.isSpeaking()){
		console.log("Artyom is speaking something");
	}else{
		console.log("Artyom is not speaking anything");
	}
	if(artyom.isRecognizing()){
		console.log("Artyom is listening to your commands");
	}else{
		console.log("Artyom is no listening to your commands");
	}
	
	// Simular comando que reacciona a hola
	//artyom.simulateInstruction("Hola");
	
	//artyom.ArtyomWebkitSpeechRecognition.abort();
	
	//The clearGarbageCollection method will clear even the non-spoken Utterance objects, so be sure to execute this method after all the artyom.say functions has been executed.
	artyom.clearGarbageCollection();
	
	
	
	
	
});
</script>
<?php
?>