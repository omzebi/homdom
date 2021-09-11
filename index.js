/****** EL SERVIDOR *******/
//require('events').EventEmitter.defaultMaxListeners = 0;
//Import events module
var events = require('events');
const emitter = new events.EventEmitter()
//emitter.setMaxListeners(100)
// or 0 to turn off the limit
emitter.setMaxListeners(0)

var	http = require('http'),
	express = require('express');
    PORT = 8081,
    HOST = "192.168.1.40";

http.createServer(requestListener).listen(PORT,HOST,function(){
	console.log("Server en linea -> http://localhost" + ":" + PORT);
});

function requestListener(request, response){
	//acept the request
	response.setHeader('Access-Control-Allow-Origin', '*');
	response.setHeader('Access-Control-Request-Method', '*');
	response.setHeader('Access-Control-Allow-Methods', 'OPTIONS, GET');
	response.setHeader('Access-Control-Allow-Headers', '*');

    //console.log(request.url.slice(1));
    var info = request.url.slice(1).split("/");
    
    if( info[0] === "digitalwrite" && info[1] > 0 && info[1] <= 99 ){
        //pin
		var pin = parseInt(info[1]);
		//device
		var dev = info[2];
		var estado = info[3];
		
		console.log(pin + " - " + dev + " - " + estado);
		listenEvent(dev,pin,estado);
    }else{
        response.end("invalid request");
    }

}


// Includes
var moment 		= require('moment');
var five 		= require('johnny-five');
var firebase 	= require('firebase');
var EtherPort 	= require('etherport');
var ardxRef 	= firebase.initializeApp({
	databaseURL: "https://node-ba82e.firebaseio.com/"
});


var ledA, ledB, leds;
var brithA, brithB;
var tempA;
//Crear referencia
var dbRefObject = firebase.database().ref().child('ardx');
var dbRefledA 	= dbRefObject.child('ledA');
var dbRefledB 	= dbRefObject.child('ledB');
var dbRefledAll = dbRefObject.child('leds');
var dbRefLedC 	= dbRefObject.child('brithA');
var dbRefLedD 	= dbRefObject.child('brithB');
var dbRefLedE 	= dbRefObject.child('tempA');

// reset firebase data
ardxRef.database().ref('ardx').set({
	'ledA': 0,
	'ledB': 0,
	'leds': 0,
	'brithA': 122.5,
	'brithB': 122.5,
	'tempA': 0
});

boardReady = false;
var boardsConfig = [
   // { id: 'A', port: new EtherPort({host: '192.168.1.17',port: 3030}), repl: false, timeout: 30000 }, //WiFiFirmata
    { id: 'B', port: new EtherPort({host: '192.168.1.139',port: 3031}), repl: false, timeout: 30000 } //EthernetFirmata
];
var boards = new five.Boards(boardsConfig);
boards.on('ready', function() {
	boardReady = true;
    this.each(function(board) {
		switch(board.id){
			case "A":
				idA 	= board
			break;
			case "B":
				idB 	= board
			break;
			
		}
    });
	//TEMPERATURE
	/*
	var thermometer  = new five.Thermometer({
		controller: "DHT11",
		pin: "A0",
		board: idA,
		freq: 300000,
		toCelsius: function(raw) {
                return round(raw * 3300.0 / 1023.0 / 10.0, 1);
            }
	});
	thermometer .on("change", function() {
		console.log(Math.round(this.celsius));
		ardxRef.database().ref('ardx').update({'tempA':this.celsius });
	});
	
	setInterval(() => {
	  console.log(temperature.celsius + "°C", temperature.fahrenheit + "°F");
	}, 2000);
	*/	
	
	//MOTION
	/*
	setInterval(() => {
		var format = 'hh:mm:ss'
		var currentTime= moment();    // e.g. 11:00 pm
		var startTime = moment('19:30 pm', format);
		var endTime = moment('07:00 am', format);
		if (startTime.isAfter(endTime)){
		//if (startTime.hour() >=12 && endTime.hour() <=12 ){
			endTime.add(1, 'days');        
			if (currentTime.hour() <=12 )
			{
				currentTime.add(1, "days");       // handle spanning days currentTime
			}
		}
		var amIBetween = currentTime.isBetween(startTime , endTime);
		console.log(amIBetween);   //  returns false.  if date ignored I expect TRUE
		if(amIBetween){
			//MOTION LED
			var motion = new five.Motion({
				controller: "PIR",
				pin: 7,
				type: "digital",
				board: idB,
				freq: 250
				//calibrationDelay: 1000
			});

			this.repl.inject({
				motion: motion
			});
		  
			motion.on("calibrated", function() {
				console.log("calibrated");		
			});

			motion.on("motionstart", function() {
				console.log("motionstart");
				var ledB = new five.Led({
					pin: 13,
					board: idB
				});
				ledB.on();
				ardxRef.database().ref('ardx').update({'ledB':1 });	
				idB.wait(60000, function() {
					ledB.stop().off();
					ardxRef.database().ref('ardx').update({'ledB':0 });
				});
			});
				
			motion.on("motionend", function() {
				console.log("motionend");
			});

			motion.on("data", function(data) {
			  //console.log(data);
			});	
		}
	}, 180000);
	*/

	
	//SOUND
	/*
	var piezo = new five.Piezo(3);
	piezo.play({
		song: [
			["C5", 1],
			["B4", 3/4],
			["A4", 1/4],
			["G4", 3/2],
			["F4", 1/2],
			["E4", 1],
			["D4", 1],
			["C4", 1]
			[null, 1/2],
			["G4", 1/2],
			["A4", 3/2],
			["A4", 1/2],
			["B4", 3/2],
			["B4", 1/2],
			["C5", 1]
		],
		tempo: 100
	});
	*/
	
	
	//MIC
	/*
	var mic = new five.Sensor({
		pin: 2,
		type: "digital",
		threshold : 600
	});
	var ledB = new five.Led({
		pin: 13,
		board: idB
	});
	ardxRef.database().ref('ardx').update({'ledB':1 });	

	mic.on("data", function() {
		//ledB.on();
		//console.log("miccc");
		//ledB.brightness(this.value >> 2);
	});	
	*/
	
	//PHOTORESISTOR
	/*
	var photoresistor = new five.Sensor({
		pin: 2,
		type: "digital",
		freq: 250, 
		threshold: 5
	});

	this.repl.inject({
		pot: photoresistor
	});

	photoresistor.on("change", () => {	
		var ledB = new five.Led({
			pin: 13,
			board: idB
		});
		ardxRef.database().ref('ardx').update({'ledB':1 });
		ledB.on();
		console.log(photoresistor.value);
	});
	*/
  
});



/*boards.on("close", function() {
console.log('closed')
});*/			
var listenEvent = function (dev,pin,estado) {
	if(boardReady){
		
		switch (dev) {
			case "A":
				//led on/off
				var ledA = new five.Led({
					pin: pin,
					board: idA
				});
				ledA.stop().off();
				
				dbRefledA.on('value', function (snapshot) {
					changeLed(ledA,snapshot.val(),'ledA');
				});
				
				//brightness ledA
				/*var brithA = new five.Led({
					pin: pin,
					board: idA
				});				
				
				estado == 'ON' ? brithA.brightness(122.5) : brithA.brightness(0);

				dbRefLedC.on('value', function (snapshot) {
					changeLed(brithA,snapshot.val(),'brithA');
				});
				*/			
			break;
			case "B":
				//led on/off
				var ledB = new five.Led({
					pin: pin,
					board: idB
				});
				ledB.stop().off();
				
				dbRefledB.on('value', function (snapshot) {
					changeLed(ledB,snapshot.val(),'ledB');
				});
				//brightness ledB
				var brithB = new five.Led({
					pin: pin,
					board: idB
				});				
				estado == 'ON' ? brithB.brightness(122.5) : brithB.brightness(0);
				
				dbRefLedD.on('value', function (snapshot) {
					changeLed(brithB,snapshot.val(),'brithB');
				});
			break;
			default:
			//leds = new five.Leds([ledA, ledB]);
							
				var letter = [ 'A', 'B', 'C' ];
				for (var i = 0; i < letter.length; i++) {		
					var led = new five.Led({
						pin: i,
						board: idletter[i]
					});
						
					ledletter[i].stop().off();
					dbRefledletter[i].on('value', function (snapshot) {
						changeLed(ledletter[i],snapshot.val(),'ledletter[i]');
					});			
					if(estado == 'ON'){
						ardxRef.database().ref('ardx').update({'ledletter[i]':1 });
					}else{
						ardxRef.database().ref('ardx').update({'ledletter[i]':0 });
					}
				}
			
				/*var ledA = new five.Led({
					pin: 13,
					board: idA
				});
				var ledB = new five.Led({
					pin: 13,
					board: idB
				});*/

				/*dbRefledAll.on('value', function (snapshot) {
					changeLed(ledA,snapshot.val(),'ledA');
					changeLed(ledB,snapshot.val(),'ledB');
				});

				if(estado == 'ON'){
					ardxRef.database().ref('ardx').update({'ledA':1 });
					ardxRef.database().ref('ardx').update({'ledB':1 });
					ardxRef.database().ref('ardx').update({'leds':1 });
				}else{
					ardxRef.database().ref('ardx').update({'ledA':0 });
					ardxRef.database().ref('ardx').update({'ledB':0 });
					ardxRef.database().ref('ardx').update({'leds':0 });
				}
				*/
			break;
		}
	}else{
		console.log( "NOT READY" );
	}
};

var changeLed = function(led, value, tag){
    switch (value){
        case 0:
            led.stop().off();
            break;
        case 1:
            led.on();
            break;
        default :
            led.brightness(value);
        break;
    }
};

