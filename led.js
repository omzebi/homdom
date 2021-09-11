/****** EL SERVIDOR *******/
var	http = require('http'),
	express = require('express');
    PORT = 8081,
    HOST = "192.168.1.40";

http.createServer(requestListener).listen(PORT,HOST,function(){
//server = http.createServer(function(req,res){
	// Set CORS headers
	console.log("Server en linea -> http://localhost" + ":" + PORT);
});

function requestListener(request, response){
	//acept the request
	response.setHeader('Access-Control-Allow-Origin', '*');
	response.setHeader('Access-Control-Request-Method', '*');
	response.setHeader('Access-Control-Allow-Methods', 'OPTIONS, GET');
	response.setHeader('Access-Control-Allow-Headers', '*');
 /*
        Obtenemos un arreglo con la informacion contenida en la peticion.
        	Si en al final de la peticion escribimos /led/13/on
        	obtendremos el arreglo ["led", "13", "on"]
    */
    console.log(request.url.slice(1));
    var info = request.url.slice(1).split("/");
    
    if( info[0] === "digitalwrite" && info[1] > 0 && info[1] <= 13 && (info[2]=="1" || info[2]=="0")){
        var led = parseInt(info[1]);
        var state = info[2] == "1" ? true : false;
		//DEVICE
		var dev = info[3];
		var bri = info[4];
        response.end(state ? "ON" : "OFF");
        // la funcion cambia el estado del led
        toggleLed(led,state,dev);
        // la funcion cambia el brightness del led
		if(bri != ""){
			brightnessLed(led,state,dev,bri);
		}
		
		console.log(led,state,dev,bri);
    }else{
        response.end("invalid request");
    }

}


// Includes
var five = require('johnny-five');

var ports = [
  { id: "A", port: "COM4" },	// this[0]
  { id: "B", port: "COM6" } 	// this[1]
];

boardReady = false;
new five.Boards(ports).on("ready", function(){
	boardReady = true;
    this.each(function(board) {
		switch(board.id){
			case "A":
				id1 	= board;
				port1 	= board.id
			break;
			case "B":
				id2 	= board;
				port2 	= board.id
			break;
			
		}
    });
	
});

function toggleLed(led,on,dev){
    if(boardReady){
		if(dev == "A"){
			var led1 = new five.Led({
				pin: led,
				board: id1
			});
			if(on){
				led1.on();
			}else{
				led1.off();
			}
		}
		if(dev == "B"){
			var led2 = new five.Led({
				pin: led,
				board: id2
			});
			if(on){
				led2.on();
			}else{
				led2.off();
			}
		}
		if(dev == "ALL"){
			var led1 = new five.Led({
				pin: led,
				board: id1
			});
			if(on){
				led1.on();
			}else{
				led1.off();
			}
			var led2 = new five.Led({
				pin: led,
				board: id2
			});
			if(on){
				led2.on();
			}else{
				led2.off();
			}
		}	
    }else{
		console.log( "NOT READY" );
	}
}

function brightnessLed(led,on,dev,bri){
	if(boardReady){
		if(dev == "A"){
			var led1 = new five.Led({
				pin: led,
				board: id1
			});
			led1.brightness(bri);
		}
		if(dev == "B"){
			var led2 = new five.Led({
				pin: led,
				board: id2
			});
			led2.brightness(bri);
		}
		if(dev == "ALL"){
			var led1 = new five.Led({
				pin: led,
				board: id1
			});
			led1.brightness(bri);
			
			var led2 = new five.Led({
				pin: led,
				board: id2
			});
			led2.brightness(bri);
		}
		console.log( "dddd",bri );
	}else{
		console.log( "NOT READY" );
	}
}
