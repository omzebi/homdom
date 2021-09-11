<?php
	header("content-type:text/css");
	include("../inc/ot-connection.php");
	$data = $db->get("colors");
	
	foreach($data as $c){
		$color1 = $c["color1"];
		$color2 = $c["color2"];
		$color3 = $c["color3"];
		$color4 = $c["color4"];
		$color5 = $c["color5"];
	}
?>
body {
	font-family: "PT Sans",Verdana, Geneva, sans-serif;
	font-weight: normal;
	padding:0;
	margin:0;
	font-size: 17px;
	background:#262729;
	/*background:rgba(39,39,41,0.9);*/
	line-height: 1.42857143;
	letter-spacing: 0.005em;
	color:#fff;
}
/* scroll */
::-webkit-scrollbar {
  width: 0.5em;
  height: 0.5em;
}

::-webkit-scrollbar-thumb {
  background: slategray;
}

::-webkit-scrollbar-track {
  background: #b8c0c8;
}
/* scroll */
#ot_header{height:50px;padding:20px;border-bottom:1px solid #fff;}

div.ot-error span,div.otErrorReminder,.ot-error{color:#f00;display:block;}
/*
 * propiedades de las cajas (arrastrables)
 */
.ot-plan > div:nth-of-type(1),
.ot-plan > div:nth-of-type(2),
.ot-plan > div:nth-of-type(3){
	display:inline-block;
	vertical-align: middle;
}
.ot-plan > div:nth-of-type(2) span input{width:80%;}
.otcapa > .ot-blocks:nth-of-type(1) .clone{display:inline-block;}
.ot-plan,.ot-blocks{
	text-align:center;
}
.ot-blocks{
	width:auto;
}
.ot-plan input[type=button]{
    margin: 10px;
    padding: 10px 20px;
    width: 200px;
}
#ot-planes,#ot-planes2{
	width:50%;
	height:25em;
	background:#fff;
	left:0;
	right:0;
	margin:auto;
	padding:5px;
	color:#000;
}
.clone{
	width:80px;
	height:60px;
	background:#ddd;
	color:#000;
	display:block;
	text-align:center;
	margin:5px 0;
	padding:5px;
	font-size:0.6em;
	cursor:crosshair;
}
#ot-planes .clone{margin:5px 1px;cursor:move;}
#ot-planes2 .clone{border:1px solid #fff;cursor:default !important;}
#otflag{margin:auto;color: #000;text-align: center;display:block;z-index:9999999;}
div.ot_options{position:fixed;bottom:0;margin-bottom:-670px;background:#fff;padding:50px 20px;width:100%;min-height:200px;display:none;text-align:center;z-index:9999999;}
div.ot_options span{padding: 10px;color:#000;}
div.ot_options > div > div{margin: 20px 0;}
#otlock,i.fa-ellipsis-h,#ottimer,#otcountdown{display:none;}


/*
div.ledcal > div {display:inline-block;width:450px;height: 350px;vertical-align: text-top;text-align:center;padding-bottom: 20px;}
div.ledcal > div:nth-of-type(1) {background: <?=$color1?>;}
div.ledcal > div:nth-of-type(1) span{color: <?=$color2?>;display:block;}
div.ledcal > div:nth-of-type(2) {background: #eee;}
*/
div.ledcal #cal {width:auto;margin: auto;position:relative;text-align:center;}
.perfect-datetimepicker{background:<?=$color1?> !important;border:1px solid transparent !important;}
.perfect-datetimepicker tbody td.selected {color: <?=$color2?> !important;border: 1px solid <?=$color1?> !important;background-color: <?=$color1?> !important;
}

span.otdays{width:50px;height:50px;border-radius:50%;background:#ddd;display:inline-block;text-align:center;font-size: 0.7em;position:relative;}
span.otdays input[type=checkbox]{
	-ms-transform: scale(4); /* IE */
	-moz-transform: scale(4); /* FF */
	-webkit-transform: scale(4); /* Safari and Chrome */
	-o-transform: scale(4); /* Opera */
    margin: 10px auto;
    position: absolute;
    left: 0;
    right: 0;
	opacity:0;
 }
span.otdays label{margin: auto;position: absolute;bottom: 35%;left: 0;right: 0;}
span.selected {background: <?=$color1?>;color: <?=$color2?> !important;}
#otflag img:hover{cursor:pointer;}
#otflag i,div.ot_options i{color:#000;cursor:pointer;display:inline-block;}
div.ot_options:hover div{margin-bottom:0px !important;}
div.ot_options label input,#otreminderrepeat input {position: absolute;opacity: 0;}
div.ot_options label {position: relative;}
div.ot_options label span:last-child {margin-left: 20px;}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
div.ot_options:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
div.ot_options input:checked ~ .checkmark {
  background-color: <?=$color1?>;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
div.ot_options input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
div.ot_options .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}

/*****************slides***************/
div.otcapa{
	width:100%;
	height:100%;
	background:rgba(0,0,0,0.6);
	z-index:999;
	position:absolute;
	color:#fff;
	text-align:center;
	padding-top:80px;
}
/*div.otcapa div:nth-of-type(1){margin-top:50px;}*/
div.otcapa input[type=text],
div.otcapa input[type=button],
div.otcapa input[type=password],
div.otcapa input[type=email],
div.otcapa input[type=file],
div.otcapa select{
    padding: 15px 10px;
    width: 300px;
    margin: 10px;
}
div.otcapa input[type=button]{
    background:<?=$color1?>;
	color:#fff;
}
div.otcapa input[type=button]:hover{
    background:<?=$color2?>;
	color:<?=$color3?>;
}
div.otcapa div.otcapachild{
    margin: 5em auto;
    border: 50px solid #fff;
    padding: 30px 20px;
    border-radius: 10px;
    width: 50%;
}
div.otcapa div.otcapachild h1{
    color: #fff;
}
div.otcapa h1{
    font-size: 2em;
    font-weight: 700;
	color:<?=$color1?>;
    text-transform: uppercase;
}
div.otcapa h2{
    font-size: 1em;
	color:#fff;
    font-weight: 500;
	padding-bottom: 5px;
    text-transform: uppercase;
}
.rslides {
  position: absolute;
  list-style: none;
  overflow: hidden;
  width: 100%;
  height:100%;
  padding: 0;
  margin: 0;
  }
  .rslides ul{
  position: absolute;
  list-style: none;
  overflow: hidden;
  width: 100%;
  padding: 0;
  margin: 0;
  }

.rslides ul li {
  -webkit-backface-visibility: hidden;
  position: absolute;
  display: none;
  width: 100%;
  left: 0;
  top: 0;
  }

.rslides ul li:first-child {
  position: relative;
  display: block;
  float: left;
  }

.rslides ul img {
  display: block;
  float: left;
  width: 100%;
  height: 100vh;
  border: 0;
}
#otlogo{
    /*height: 34vh;*/
    margin: 10px;
}  
#otlogo span{
    width: 150px;
    height: 150px;
	padding:0;
    border-radius: 50%;
	background:<?=$color1?>;
	border:1px solid <?=$color1?>;
} 
#otlogo span h1{
    color: #fff;
	line-height:130px;
	font-size:3em;
} 
div.otsettings > div {
	width: 30%;
	display:inline-block;
}
div.otsettings div span{
	width: 80px;
    height: 80px;
    border-radius: 0%;
    padding: 15px 10px;
    border: 1px solid #fff;
    display: inline-block;
    margin: 5px 1px;
    vertical-align: top;
}
div.otsettings div span i{
	font-size:1.5em;
}
div.otsettings div span label{
    font-size: 0.5em;
    display: block;
}

div.otscenes > div,div.otusers > div{display:inline-block;}
div.otsettings div span:hover,
div.otscenes a span:hover{
	border: 1px solid <?=$color1?>;
	background:<?=$color1?>;
	cursor:pointer;
}
div.otscenes a span:hover label,
div.otscenes a span:hover i{
	color:<?=$color2?>;
	cursor:pointer;
}
div.otscenes span{
    width: 200px;
    /*height: 50px;*/
    border-radius: 5px;
    padding: 10px;
	text-align:left;
	float:left;
	background:#fff;
    border: 1px solid #fff;
    display: inline-block;
    margin: 5px 0px 5px 45px;
    vertical-align: top;
}
div.otscenes span label{
    margin-left: 5px;
}
div.otscenes span label,
div.otitems span label{
	color:#000;
	font-size:12px;
}

div.otusers > div > div{position:relative;display:inline-block;background:#eee;color:#000;padding:10px;vertical-align:top;margin:20px;width:200px;height:200px;}
div.otusers > div > div i#ot-newuser{line-height:180px;}
div.otusers div.otdeluser img{width: 100px; height: 100px;border-radius: 50%;}
div.otdeluser p:last-child{position: absolute;top: 0;margin: auto;left: 0;right: 0;background: rgba(0,0,0,.5);}
div.otdeluser p:last-child i.otuser{display:block;width:100%;font-size:2em;margin: 30px auto;width:40px;color:#fff;padding:10px;}
div.otdeluser p:last-child i.otuser:hover{color:<?=$color1?>;cursor:pointer;}
div.otdeluser p:last-child{display:none;}
div.otdeluser:hover p:last-child{display:block;}
#otrm > div{ 
  position: relative;
  width: 99%;
  margin: 2px auto;
  text-align: left;
  vertical-align:middle;
 }
 
#otrm .datepick-month{margin:10px !important;}
#otrm .datepick-multi{width:100% !important;}
#otrm .datepick-month-row,#otrd .datepick-month-row{
	display: flex !important;
	white-space: nowrap;
	justify-content: baseline !important;
	align-items: flex-start !important;
	overflow-x: auto;
	overflow-y: hidden;
}
#otrm > div .ui-datepicker-group{width:350px;margin: 0 10px;display:inline-block;position:relative;}
#otrm table tr td,#otrd table tr td {padding:0 !important;font-size:1em !important;}
#otrm .ui-datepicker-title,#otrd .ui-datepicker-title{font-size:1.2em !important;}

#otmenuvert{
    width: 100%;
	height:100vh;
	top:0;
	padding-top:50px;
    position: absolute;
    margin-left: -1000px;
    border-right: 1px solid #fff;
	background:#fff;
    text-align: center;
	display:none;
    z-index:9999999999;
}
#otmenuvert span{
	margin: 5px;
    padding: 10px 20px;
    color: #000;
    display: inline-block;
    width: 125px;
    height: 100px;
    background: #eee;
    font-size: 0.8em;
    vertical-align: text-top;
}
#otmenuvert > span:hover{
    color: <?=$color2?>;
    background: <?=$color1?>;
	cursor:pointer;
}
#otmenuvert span:nth-last-child(2){
	border:0 !important;
}
#otshowconfig,#otshowmuser{position:absolute;cursor:pointer;margin:auto;left:0;right:0;width:100px;text-align:center;z-index: 999999;}
#otshowmuser{bottom:-5px;}
#otshowconfig{top:0;}
div.otconfig{display:none;position:absolute;width:auto;height:100vh;padding:20px 0;margin-top:-50px;background:#fff;z-index: 99999999;}
div.otconfig span:hover i{color:<?=$color1?>;}
div.otconfig span{
	top:0;
	margin:5px 20px;
	border:1px solid transparent;
	color:#000;
	cursor:pointer;
	padding:10px;
	display:block;
	z-index:99999;
}
div.otconfig span i{vertical-align:middle;margin-right:10px;width: 30px;}
div.otconfig a {color:#fff;}
div.othome > div:nth-of-type(1){
	width:100%;
}
div.othome > div:nth-of-type(1) > div{
	width: 30%;
    display: inline-block;
	vertical-align: top;
	height:80vh;
}
div.othome > div:nth-of-type(2) > div > div{
    display: inline-block;
}
div.othome > div:nth-of-type(2) > div > div i{
	width: 50px;
    height: 50px;
    border-radius: 50%;
    padding: 15px 10px;
    border: 1px solid #fff;
    display: inline-block;
	font-size:1.3em;
    margin: 10px;
    vertical-align: top;
    background: #fff;
    color: #000;
}
div.othome > div:nth-of-type(1) > div > div i:hover{
	cursor:pointer;
}
div.othome label{
	font-size:0.8em;
}
div.othome > div:nth-of-type(1) div span.ottemp label{
	margin:0 30px;
}
div.othome > div:nth-of-type(1) div span.ottemp label:nth-of-type(2){font-size:2em;vertical-align:middle;}
div.othome > div div.otclimate span{margin: 0;display:block;}
div.othome > div div.otclimate i{
	font-size:1.2em;
	border-radius: 5px;
	margin:10px;
	padding:10px;
}
#otcontent div:nth-of-type(1) > div,#otcontent div:nth-of-type(3) > div{display:inline-block;height:120px;width: 45%;margin: 20px 0;vertical-align: top;}
div.othome div i{font-size:3em;}

p.micro i{font-size:5em !important;}
p.micro i.fa-microphone,p.micro i.fa-volume-up{color:#f00;}

#otcontent div h1{
	color:#fff;
	font-size:1.2em;
}
#otcontent div.oticon:hover i{
	color:<?=$color1?>;
}
#ottime > span:nth-of-type(2){
	font-size:4em;
	font-family:sans-serif;
	display:block;
}
div.otcamera{
	background:#000;
	width:100%;
	height:250px;
	border-radius:5px;
    margin-top: 20px;
}
input.otbuttons{
	background:#333 !important;
	width: 40px !important;
	padding:5px !important;
    margin: 10px 1px !important;
}
.otbuttons.otactive,.otactive{background:<?=$color1?> !important;color:#fff !important;}
div.otscenes span i,div.otitems span i{color: #000;}
/*div.otitems div:nth-of-type(1){text-align:right;margin-right: 30px;}*/
div.otitems span i,.ot-loaditem  i {font-size: 2em;}
div.otitems span{
    width: 300px;
    height: 150px;
    border-radius: 5px;
    padding: 10px 20px;
	text-align:center;
	background:#fff;
    border: 2px solid #fff;
    display: inline-block;
    margin: 3px 0;
    vertical-align: top;
}
div.otitems span h2{font-size:2em;line-height:100px;}
div.otitems span:nth-of-type(1){
	background:<?=$color1?>;
	color:#fff;
	border:2px solid <?=$color1?>;
	text-align:center;
}
.range{visibility:hidden;}
.fa-info-circle:hover{
	color:<?=$color1?>;
}

div#otpin{
	display:none;
	width:100%;
	padding-bottom:30px;
	background:#fff;
	text-align:center;
	left:0;
	right:0;
	margin:auto;
	position:absolute;
	bottom:0;
	color:#000;
	z-index:99999999999;
}
div#otpin span{
    font-size: 1em;
    cursor: pointer;
    height: 50px;
    width: 50px;
    padding-top: 10px;
    margin: 2px;
    border-radius: 50%;
    background: #ddd;
    vertical-align: middle;
	text-align: center;
	display:inline-block;
}
div#otpin h2{padding-top:20px;text-align:center;}
div#otpin i{margin-top:5px;}
#pass{text-align:center;font-size:1.5em;background:transparent;width:50%;}

#file-upload {display: none !important;}
.ot-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
	margin: 5px;
    width: 300px;
    cursor: pointer;
}
/**************button ON OFF****************/
#otformuser{position:relative;}
#otstatus {width: 300px;height: 40px;margin: 5px auto;}
#otstatus .front{background:#eee;color:#000;padding-top: 8px;}
#otstatus .back{background:<?=$color1?>;color:<?=$color2?>;padding-top: 8px;}



.otinfos:hover > span{
	display:block;
}
.otinfos > span{
    position: absolute;
    left: 0;
    right: 0;
    margin: auto;
    width: 50%;
    padding: 10px;
	color:#000;
    background: #fff;
	display:none;
}
#otforgetpassword{
	display:none;
	margin-top:-2000px;
}
#otforget:hover,#otreload,#ot-newuser{
	cursor:pointer;
}
#fullscreen{
	position:absolute;
	bottom:0;
	right:0;
	cursor:pointer;
	background:transparent;
	padding:5px;
	color:rgba(0,0,0,0.1);
	z-index:9999;
}
#fullscreen:hover{color:#fff;}
div.otreminder{width:100%;text-align:center;margin:0 auto 0;}
div.otreminder div.otreminders{
    width: 350px;
    height: 270px;
	background:rgba(0,0,0,.5);
	position:relative;
	vertical-align:top;
    padding: 20px;
    margin: 10px;
    font-size: 0.9em;
    border-radius: 5px;
    display: inline-block;
}
div.otreminder div.otreminders p.othourreminder{display:inline-block;margin: 0 10px;}
div.otreminder div.otreminders p:nth-of-type(2) span{display:block;font-size:1.2em;margin-bottom:10px;}
div.otreminder div.otreminders p:last-child > span{
	width:90%;
	background:<?=$color1?>;
	margin:auto;
    padding: 5px 0;
	font-size:0.9em;
	position:absolute;
	bottom:10px;
	left:0;
	right:0;
}
div.otreminder div.otreminders p{margin:10px 0;color:darkgray;}
div.otreminder div.otreminders p:last-child span span{padding:5px 0;}
div.otreminder div.otnow{width:50% !important;height:500px !important;}
div.otreminder div.otnow p.otdnow{font-size:1.5em;margin:20px 50px;display:inline-block;}
div.otreminder div.otreminders div.otdelreminder{
	right:5px;
	position: absolute;
    top: 5px;
    opacity: 0.5;
}
div.otreminder div.otreminders div.otdelreminder:hover {opacity:1;cursor:pointer;}
div#otreminderplus i{line-height:250px;cursor:pointer;color:darkgray}
div.otreminder div.otreminders p.otflash{font-size:0.8em;}

/* calendar */

div.calendar1,div.calendar2,#otnext,#otremindersave{margin:5px auto;text-align:center;}
div.calendar2{display:none;margin-top:-1000px;}
#otremindersave,#otreminderweek,#otreminderday,#otreminderhour,#otremindermonth,#otreminderyear{display:none;margin-top:20px !important;}
#otrd{display:inline-block;}
#calendar{width:100%;vertical-align: top;margin:auto;padding:20px;display:inline-block;position:relative;}

#calendar > .datepick{width: 100% !important;}

#hour1,#hour2{position: relative;display:none;width:28%;background:rgba(0,0,0,.5);margin:5px auto;left:0;right:0;}
#hour1 input,#hour2 input{background:transparent;padding:10px;color:#fff;}
#otreminderdesc textarea,#otremindertitle input,#otnext input,#otremindersave input,#ottypes select{width:60%;padding:15px 10px;font-family: inherit;}
#otreminderrepeat label,#otreminderweek label{display: inline-block;}
#otreminderrepeat label{
    background: #fff;
    padding: 5px 10px;
    border-radius: 4px;
    width: 11.5%;
    vertical-align: text-top;
    height: 50px;
    color: #000;
}
#otreminderweek label{color: #fff;padding: 5px;width: 8%;}
#otreminderrepeat {padding-top:10px;}
label.otrepeating{background:<?=$color1?> !important;color:<?=$color2?> !important;}

div.calendar table{width:100%;display: inline-table;}
.ui-widget-content{background:transparent !important;}
#otrd table {width: 100% !important;}
#otrm table {width: 90% !important;}

.datepick-month td .datepick-today {background: <?=$color1?> !important;color:<?=$color2?> !important;}
.datepick-month{border:none !important;margin:0;}
.datepick-month td .datepick-other-month{background:none !important;}
.datepick-month span,.datepick-month a{padding:15px !important;}
img.mylang{
	-webkit-filter: grayscale(80%);
	-moz-filter: grayscale(80%);
	-ms-filter: grayscale(80%);
	-o-filter: grayscale(80%);
	filter: grayscale(80%);	
	width:20px;
}
img.mylang:hover{
	-webkit-filter: grayscale(0%);
	-moz-filter: grayscale(0%);
	-ms-filter: grayscale(0%);
	-o-filter: grayscale(0%);
	filter: grayscale(0%);
	transition-property: filter;
	transition-duration: 1s;	
}

/* The switch - the box around the slider */
/*.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}*/

/* Hide default HTML checkbox */
//.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: <?=$color1?>;
}
input:checked + .slider span{
	content: "ON";
    float: left;
    line-height: 34px;
    margin-left: 10px;
	color:#000;
}
input + .slider span{
	content: "OFF";
    float: right;
    line-height: 34px;
    margin-right: 10px;
	color:#000;
}
input:focus + .slider {
  box-shadow: 0 0 1px <?=$color1?>;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}


/* equalizer */
.equalizer {
  font-size: 0;
  display:none;
}
.equalizer i {
  background-color: #fff;
  padding:initial !important;
  content: '';
  display: inline-block;
  height: 30px;
  width: 3px;
  margin: 0 3px !important;
  -webkit-animation: move-up-and-down .3s infinite alternate;
          animation: move-up-and-down .3s infinite alternate;
  -webkit-transform-origin: bottom left;
          transform-origin: bottom left;
}

i:nth-of-type(1) {
  -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s;
}

i:nth-of-type(2) {
  -webkit-animation-delay: 0.1s;
          animation-delay: 0.1s;
}

i:nth-of-type(3) {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
}

i:nth-of-type(4) {
  -webkit-animation-delay: 0.1s;
          animation-delay: 0.1s;
}

i:nth-of-type(5) {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
}

i:nth-of-type(6) {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
}

i:nth-of-type(7) {
  -webkit-animation-delay: 0.1s;
          animation-delay: 0.1s;
}

i:nth-of-type(8) {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
}

i:nth-of-type(9) {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
}

i:nth-of-type(10) {
  -webkit-animation-delay: 0.1s;
          animation-delay: 0.1s;
}

i:nth-of-type(11) {
  -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s;
}

i:nth-of-type(12) {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
}

@-webkit-keyframes move-up-and-down {
  0% {
    opacity: .3;
    -webkit-transform: scaleY(0.05);
            transform: scaleY(0.05);
  }
  100% {
    opacity: 1;
    -webkit-transform: scaleY(1);
            transform: scaleY(1);
  }
}

@keyframes move-up-and-down {
  0% {
    opacity: .3;
    -webkit-transform: scaleY(0.05);
            transform: scaleY(0.05);
  }
  100% {
    opacity: 1;
    -webkit-transform: scaleY(1);
            transform: scaleY(1);
  }
}


div.otled{width: 50%;display: block;margin: auto;}
div.otled div:nth-of-type(2) span{display: inline-block;width:150px;padding:20px;background:rgba(0,0,0,.3);border-radius: 5px;margin: 20px;cursor:pointer;}
div.otled div:nth-of-type(2) span:hover{background:rgba(0,0,0,.7);}
p.toggleWrapper{width: auto;height: 50px;background-position:center center;color: transparent;}
.toggleWrapper{background:url('../images/ledoff.png') no-repeat; background-size:30px 50px;}
div.toggleWrapper{margin: 20px;text-align: left;background-position:right center;}

span.toggleWrapper{height: 150px;background-size:90px 150px;display: inline-block;width: 90px;color: transparent;}
.ledon{background:url('../images/ledon.png') no-repeat right center;background-size:30px 50px;}
.toggleWrapper input[type=checkbox]{position: absolute;left: -99em;}
.toggle{
	cursor: pointer;
	display: inline-block;
	position: relative;
	width: 120px;    
	text-align: initial;
	background: #ddd;
	border-radius: 5px;
	-webkit-transition: all 200ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
	transition: all 200ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
}
.toggle:before, .toggle:after{
	position: absolute;
	line-height: 50px;
	font-size: 14px;
	z-index: 2;
	-webkit-transition: all 200ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
	transition: all 200ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
}
.toggle:before{
	content: "OFF";
	left: 20px;
	color: #ddd;
}
.toggle:after{
	content: "ON";
	right: 20px;
	color: #fff;
}
.toggle__handler{
	display: inline-block;
	position: relative;
	z-index: 1;
	background: #fff;
	width: 65px;
	height: 44px;
	border-radius: 3px;
	top: 3px;
	left: 3px;
	-webkit-transition: all 200ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
	transition: all 200ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
	-webkit-transform: translateX(0px);
	transform: translateX(0px);
}
.toggleWrapper label i{cursor:pointer;}
.toggleWrapper label{display: inline-block;vertical-align: middle;}
.toggleWrapper label:nth-of-type(1){height: 50px;}
input:checked + .toggle{background: <?=$color1?>;}
input:checked + .toggle:before{color: #fff;}
input:checked + .toggle:after{color: <?=$color1?>;}
input:checked + .toggle .toggle__handler{
	width: 54px;
	-webkit-transform: translateX(60px);
	transform: translateX(60px);
	border-color: #fff;
}
.toggleWrapper input[type=range]{width: 50%;margin-right: 50px;margin-top:20px;float: right;}
/***************btn switch light***************/
/* DEMO 4 */
*,
*:after,
*:before {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}

.switch {
  margin: 50px auto;
  position: relative;
}

.switch label {
  width: 100%;
  height: 100%;
  position: relative;
  display: block;
}

.switch input {
  top: 0; 
  right: 0; 
  bottom: 0; 
  left: 0;
  opacity: 0;
  z-index: 100;
  position: absolute;
  width: 100% !important;
  margin: auto !important;
  cursor: pointer;
}
.switch.demo4 {
  width: 100px;
  height: 100px;
}

.switch.demo4 label {
  border-radius: 50%;
  background: #b2ac9e;
  background: -moz-linear-gradient(#f7f2f6, #b2ac9e);
  background: -ms-linear-gradient(#f7f2f6, #b2ac9e);
  background: -o-linear-gradient(#f7f2f6, #b2ac9e);
  background: -webkit-gradient(linear, 0 0, 0 100%, from(#f7f2f6), to(#b2ac9e));
  background: -webkit-linear-gradient(#f7f2f6, #b2ac9e);
  background: linear-gradient(#f7f2f6, #b2ac9e);
  position: relative;
  color: #a5a39d;
  font-size: 50px;
  text-align: center;
  line-height: 100px;

  -webkit-transition: all 0.3s ease-out;
  -moz-transition: all 0.3s ease-out;
  -ms-transition: all 0.3s ease-out;
  -o-transition: all 0.3s ease-out;
  transition: all 0.3s ease-out;

  text-shadow: 0 2px 1px rgba(0,0,0,0.25);

  box-shadow:
    inset 0 2px 3px rgba(255,255,255,0.13),
    0 5px 8px rgba(0,0,0,0.3),
    0 10px 10px 4px rgba(0,0,0,0.3);
  z-index: -1;
}

.switch.demo4 label:after {
  content: ""; 
  position: absolute;
  left: -20px;
  right: -20px;
  top: -20px;
  bottom: -20px;
  z-index: -2;
  border-radius: inherit;
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.1),
    0 1px 2px rgba(0,0,0,0.3),
    0 0 10px rgba(0,0,0,0.15);
  
}

.switch.demo4 label:before {
  content: ""; 
  position: absolute;
  left: -10px;
  right: -10px;
  top: -10px;
  bottom: -10px;
  z-index: -1;
  border-radius: inherit;
  box-shadow: inset 0 10px 10px rgba(0,0,0,0.13); 
  -webkit-filter:blur(1px);
  -moz-filter:blur(1px);
  -ms-filter:blur(1px);
  -o-filter:blur(1px);
  filter: blur(1px); 
}

.switch.demo4 input[value^="OFF"] ~ label {
  box-shadow:inset 0 2px 3px rgba(255,255,255,0.13),0 5px 8px rgba(0,0,0,0.35),0 3px 10px 4px rgba(0,0,0,0.2);
  color: #fff;
  background: <?=$color1?>;
} 

.switch.demo4 .icon-off:after {
  content: "";
  display: block;
  position: absolute;
  width: 70%;
  height: 70%;
  left: 50%;
  top: 50%;
  z-index: -1;
  margin: -35% 0 0 -35%;
  border-radius: 50%;
  background: transparent !important;
  background: #d2cbc3;
  background: -moz-linear-gradient(#cbc7bc, #d2cbc3);
  background: -ms-linear-gradient(#cbc7bc, #d2cbc3);
  background: -o-linear-gradient(#cbc7bc, #d2cbc3);
  background: -webkit-gradient(linear, 0 0, 0 100%, from(#cbc7bc), to(#d2cbc3));
  background: -webkit-linear-gradient(#cbc7bc, #d2cbc3);
  background: linear-gradient(#cbc7bc, #d2cbc3);
  box-shadow:
    0 -2px 5px rgba(255,255,255,0.05),
    0 2px 5px rgba(255,255,255,0.1);
}





/************range*****************/
input[type="range"]{
	-moz-apperance: none;  
	-webkit-appearance: none;
  width: 100%;
  margin: 10px 0;
    height: 6px;
    /*background-image: -webkit-gradient(
        linear,
        left top,
        right top,
        color-stop(0.50, #205BAD),
        color-stop(0.50, #C5C5C5)
    );*/
}



input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #ddd;
  border-radius: 0px;
  border: 0.2px solid transparent;
}
input[type=range]::-webkit-slider-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #ddd;
  border: 1px solid transparent;
  height: 20px;
  width: 16px;
  border-radius: 0px;
  background: #ffffff;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -8px;
}

input[type=range]::-moz-range-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #ddd;
  background: #ddd;
  border-radius: 0px;
  border: 0.2px solid transparent;
}
input[type=range]::-moz-range-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #ddd;
  border: 1px solid transparent;
  height: 20px;
  width: 16px;
  border-radius: 0px;
  background: #ffffff;
  cursor: pointer;
}
input[type=range]::-ms-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  background: transparent;
  border-color: transparent;
  color: transparent;
}
input[type=range]::-ms-fill-lower {
  background: #2a6495;
  border: 0.2px solid transparent;
  border-radius: 0px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #ddd;
}
input[type=range]::-ms-fill-upper {
  background: #ddd;
  border: 0.2px solid transparent;
  border-radius: 0px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #ddd;
}
input[type=range]::-ms-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #ddd;
  border: 1px solid transparent;
  height: 20px;
  width: 16px;
  border-radius: 0px;
  background: #ffffff;
  cursor: pointer;
  height: 5px;
}
input[type=range]:focus::-ms-fill-lower {
  background: #ddd;
}
input[type=range]:focus::-ms-fill-upper {
  background: #367ebd;
}



.cursorily{ cursor: pointer;}
.hov:hover{ color: #000;}
.ico-size{font-size: 16px;}
.ico-size-month{font-size: 26px!important; line-height: 26px!important;}
.ico-size-large{ font-size: 40px!important; line-height: 30px;}
.dtp_main{ border: solid 1px #eee; border-radius: 3px; background-color: #fff; padding: 8px 0 8px 8px;}
.dtp_main span, .dtp_main i{ display: inline-block; padding-right: 8px;}
.dtp_modal-win{position: fixed;left: 0; top: 0; width: 100%; height: 100%; z-index: 999; background-color: rgba(0,0,0,.7); opacity: 0.6;}
.dtp_modal-content{ 
	background-color: #fff; 
	border-radius: 10px; 
	width: 624px; 
	position: absolute; 
	top: 20% !important; 
	left: 0px !important;    
	right: 0px !important;
    margin: auto; 
	font-size: 16px;
	font-weight: normal;
	z-index:999999999;
}
.dtp_modal-content-no-time{ background-color: #fff; border-radius: 10px; width: 312px;
    position: absolute; z-index: 1000; top: 100px; left: 100px; font-size: 16px;font-weight: normal;}
.dtp_modal-title{ border-bottom: solid 3px <?=$color1?>; padding: 16px 36px; margin-bottom: 16px;  font-size: 22px; }
.dtp_modal-cell-date{ width: 312px;  float: right; margin-bottom: 22px; margin-top: 6px;}
.dtp_modal-cell-time{width: 311px; float: left; direction: ltr; border-right: solid 1px #000;}
.dtp_modal-months{ color: #7d7d7d; text-align: center; font-size: 20px; padding: 0 20px;}
.dtp_modal-months span{ display: inline-block; padding: 10px 20px; width: 182px;}
.dtp_modal-calendar{ width: 266px; margin-left: 22px; }
.dtp_modal-calendar-cell{ width: 38px; padding: 7px 0; display: inline-block; text-align: center;color: #000;}
.dtp_modal-colored{ color: <?=$color1?>; }
.dtp_modal-grey{ color: #7d7d7d; }
.dtp_modal-cell-selected{ background-color: <?=$color1?>; border-radius: 48%;  transition: background-color 1s ease-out;color:<?=$color2?>}
.dtp_modal-time-block{ height: 212px; width: 310px; }
.dpt_modal-button{ 
	background-color: <?=$color1?>; 
	color: #fff; 
	font-size: 14px; 
	padding: 8px 40px; 
	left:0;
	right:0;
    text-align: center; 
	width: 200px; 
	margin: auto; 
	cursor: pointer; 
	border: solid 1px #fff;
	border-radius: 3px;  
	//box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.dtp_modal-time-line{ text-align: center; color: #7d7d7d; font-size: 20px; padding-top: 15px;  }
.dtp_modal-time-mechanic{ padding-top: 16px;}
.dtp_modal-append{ color: #7d7d7d; padding-left: 108px; font-weight: normal; }
.dtp_modal-midle{ display: inline-block; width: 40px; }
.dtp_modal-midle-dig{display: inline-block; width: 16px; text-align: center; }
.dtp_modal-digits{ font-size: 40px; padding-left: 96px;color:#000;}
.dtp_modal-digit{  }
