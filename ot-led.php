<?php
include_once("inc/ot-session.php");
sec_session_start();
include('inc/ot-empty_session.php');
include('inc/ot-header.php');
include("inc/ot-connection.php");
include("inc/ot-admin.php");
include("inc/ot-language.php");
include("inc/ot-function.php");
include("inc/ot-ArtyomComands.php");

$db->where ("id",$_GET["led"]);
$db->where ("type","L");
$data = $db->getOne("devices");
?>
<div class="otcapa">	
	<div class="otled">
		<h2><?php echo $data['name'];?></h2>
		<span class="toggleWrapper" id="i<?php echo $data['idport'].''.$data['pinInput'];?>">.</span>

		<div class="switch demo4">
			<input type="button" value="ON" id="leds" onclick="toggleLed(this,'<?php echo $data['nickname'];?>',<?php echo $data['pinInput'];?>,'<?php echo $data['idport'];?>');" />
			<label><i class="icon-off"></i></label>
		</div> 		
		<input type="range" name="range" class="range" id="<?php echo $data['idport'].''.$data['pinInput'];?>" min="0" max="255" step="5" value="122.5" onchange="brightnessLed(this,'brith<?php echo $data['idport'];?>',<?php echo $data['pinInput'];?>,'<?php echo $data['idport'];?>')"; />
		<input type="hidden" value="led<?php echo $data['idport'];?>" id="led" />
	
		<div>
			<i class="fa fa-ellipsis-h fa-2x ot-loaditem" aria-hidden="true" id="<?php echo $data['idplace'];?>" ></i>
			<input type="hidden" value="<?php echo $data['pass'];?>" id="otpassled" />
			<div id="otlock">
				<span id="ot-timer" class="otshowoption"><i class="fa fa-clock-o fa-2x" aria-hidden="true" ></i><br>Timer</span>
				<span id="ot-countdown" class="otshowoption"><i class="fa fa-clock-o fa-2x" aria-hidden="true" ></i><br>Countdown</span>
			</div>
		</div>
	</div>
</div>
<div class="ot_options">
	<div id="ottimer">
		<div>
			<span> 
				<label><input type="radio" name="otdays" value="O" class="otdays" /><span class="checkmark"></span><span>Once</span></label>
				<label><input type="radio" name="otdays" value="R" class="otdays" /><span class="checkmark"></span><span>Repeat</span></label>
			</span>
		</div>
	
		<div class="otrepeat">
			<span>
			<?php
			$days = [
				'Sun',
				'Mon',
				'Tue',
				'Wed',
				'Thu',
				'Fri',
				'Sat',
			];
			for ($i = 0; $i < 7; $i++) {
			?>
				<span class="otdays">
					<label>
						<input type="checkbox" name="days" value="" id="<?php echo $i;?>" /><br>
						<?php echo  $days[$i];?>
					</label>
				</span>
			<?php
			}
			?>
			</span>
		</div>
		
		<div>
			<span> 
				<label><input type="radio" name="otonoff" value="ON" /><span class="checkmark"></span><span>ON</span></label>
				<label><input type="radio" name="otonoff" value="OFF" /><span class="checkmark"></span><span>OFF</span></label>
			</span><br>
		</div>
		
		<div>
			<div class="ledcal">
				<div>
					<div id="cal"> </div>
					<input type="hidden" id="result" value="" />
				</div>
			</div>		
		</div>
	</div>
	<div id="otcountdown">
		<div>
			<span><label>Turn:</label> 
				<label><input type="radio" name="otonoff" value="ON" /><span class="checkmark"></span><span>ON</span></label>
				<label><input type="radio" name="otonoff" value="OFF" /><span class="checkmark"></span><span>OFF</span></label>
			</span><br>
		</div>
	</div>
</div>		
<script type="text/javascript">
$(document).ready(function(){

	//days selected
	$(document).on("change", "span.otdays input",function(){
		if($(this).is(':checked')){
			$(this).closest("span.otdays").addClass("selected");
		}else{
			$(this).closest("span.otdays").removeClass("selected");
		}
	});	
	//select option
	$("span.otdays").css("pointer-events", "none");
	$(document).on("change", "input.otdays",function(){
		if($(this).val() == "O"){
			$("span.otdays input:checkbox").prop("checked", false);
			$("span.otdays").removeClass("selected");
			$("span.otdays").css("pointer-events", "none");
			//$("div.otrepeat").hide();
		}else{
			$("span.otdays").css("pointer-events", "auto");
			//$("div.otrepeat").show();
		}
	});	

	//show - hide
	if($("#otpassled").val() == ""){
		$("i.fa-ellipsis-h").hide();
		$("#otlock").show();
	}else{
		$("i.fa-ellipsis-h").show();
		$("#otlock").hide();
	}
	
	$('#cal').dateTimePicker({
		dateFormat: "YYYY/MM/DD HH:mm",
		locale: 'es',
		selectData: "now",
		positionShift: { top: 20, left: 0},
		title: "Select Date and Time",
		buttonTitle: "Select"
	});	

});



var str = document.querySelector('.toggleWrapper').id;
var letra 	= str.slice(1,2);
var port 	= str.slice(2, 4);

//firebase data change event
ardx.on('value', function(snapshot){
	var value = snapshot.val(); // is on or off
		//alert(Object.keys(value)[1]);
	//var elem = Object.keys(value);
	/*for(var i = 0; i < elem.length; i++) {
	   if(elem[i] == 'ledB') {
		 var aa = elem[i];
	   }
	}*/
	switch(document.getElementById('led').value){
		case "ledA":
			led = value.ledA;
		break;
		case "ledB":
			led = value.ledB;
		break;
		default:
		break;
	}
	//ledB
	if(led == 0){
		document.getElementById(str).classList.remove("ledon");
		document.getElementById(letra+port).value = 0;
		document.getElementById(letra+port).style.visibility = "hidden";
		document.getElementById("leds").value = 'ON';
	}else{
		document.getElementById(str).classList.add("ledon");
		document.getElementById(letra+port).style.visibility = "visible";
		document.getElementById("leds").value = 'OFF';
		document.getElementById(letra+port).value = value.brithB;
	}

});


</script>

<?php
include('inc/ot-footer.php');
?>