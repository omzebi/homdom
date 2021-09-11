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

if($_SESSION["otlogin"] && $_GET["once"]==true){
?>
	<input type="hidden" value="conected" id="vconnected" />
<?php
}else{
?>
	<input type="hidden" value="" id="vconnected" />
<?php
}
?>
<div class="otcapa">

	<div class="othome">
		<div id="otcontent">
			<div>
				<?php
				$db->where ("position",'l');
				$db->where ("outstanding",'1');
				$data = $db->get('devices',6);
				$num = $db->count ;
				if($num > 0){
					?>
					<!--<h1>GROUND FLOOR</h1>-->
					<?php
					foreach($data as $item){
						if($item['type'] == "L"){
						?>
						<div>
							<!--<i class="fa fa-<?php echo $item['icon'];?>" aria-hidden="true" id="i<?php echo $item['idport'].''.$item['pinInput'];?>"></i><br>-->
							<p class="toggleWrapper" id="i<?php echo $item['idport'].''.$item['pinInput'];?>">.</p><br>
							<label><?php echo $item['name'];?></label><br>
							<input type="button" value="ON"  class="otbuttons otactive"  onclick="toggleLed(this,'<?php echo $item['nickname'];?>',<?php echo $item['pinInput'];?>,'<?php echo $item['idport'];?>');" />
							<input type="button" value="OFF" class="otbuttons"  onclick="toggleLed(this,'<?php echo $item['nickname'];?>',<?php echo $item['pinInput'];?>,'<?php echo $item['idport'];?>');" />
							<input type="range" name="range" class="range" id="<?php echo $item['idport'].''.$item['pinInput'];?>" min=0 max=255 step=5 value=122.5 onchange="brightnessLed(this,'brith<?php echo $item['idport'];?>',<?php echo $item['pinInput'];?>,'<?php echo $item['idport'];?>')"; />
						</div>
						<?php
						}else{
						?>
							<div>
								<span><i class="fa fa-<?php echo $item['icon'];?>" aria-hidden="true"></i></span><br><label><?php echo $item['name'];?></label>
							</div>
						<?php
						}
					}
				}
				?>
			</div>
			
			<div class="otclimate">
				<span class="othum"><label>HUMIDITY</label><br><i class="fa fa-snowflake-o" aria-hidden="true"><br>43%</i></span><br>
				<span class="ottemp"><label>TEMPERATURE</label><br>
				<i class="fa fa-plus" aria-hidden="true"></i>
				<label><b id="ottemp">0</b> ºC</label>
				<i class="fa fa-minus" aria-hidden="true"></i><br>
				</span>
				<br>
				<span id="ottime">
				<?php
					//setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
					$search = array("é","è","ê","á");
					$replace = array("e","e","e","a");

					$fecha = date("Y-m-d H:m:s");
					echo "<span>".str_replace($search, $replace,strftime("%a %d de %b de %Y",strtotime($fecha)))."</span>";
					echo "<span id='liveclock'></span>";
				?>					
				</span>
				<p class="micro"><i class="fa fa-microphone-slash fa-4x" aria-hidden="true"></i></p>
				<div class="equalizer">
				  <i></i>
				  <i></i>
				  <i></i>
				  <i></i>
				  <i></i>
				  <i></i>
				  <i></i>
				  <i></i>
				  <i></i>
				  <i></i>
				  <i></i>
				  <i></i>
				</div>
				<input type="hidden" value="" id="inputVoz" />
				<span id="txtVoz"></span>
			</div>
			
			
			<div>
				<?php
				$db->where ("position",'r');
				$db->where ("outstanding",'1');
				$data = $db->get('devices',6);
				$num = $db->count ;
				if($num > 0){
					?>
					<!--<h1>FIRST FLOOR</h1>-->
					<?php
					foreach($data as $item){
						if($item['type'] == "L"){
						?>
						<div>
							<!--<i class="fa fa-<?php echo $item['icon'];?>" aria-hidden="true" id="i<?php echo $item['idport'].''.$item['pinInput'];?>" ></i><br>-->
							<p class="toggleWrapper" id="i<?php echo $item['idport'].''.$item['pinInput'];?>">.</p><br>
							<label><?php echo $item['name'];?></label><br>
							<input type="button" value="ON"  class="otbuttons otactive"  onclick="toggleLed(this,'<?php echo $item['nickname'];?>',<?php echo $item['pinInput'];?>,'<?php echo $item['idport'];?>');" />
							<input type="button" value="OFF" class="otbuttons"  onclick="toggleLed(this,'<?php echo $item['nickname'];?>',<?php echo $item['pinInput'];?>,'<?php echo $item['idport'];?>');" />
							<input type="range" name="range" class="range" id="<?php echo $item['idport'].''.$item['pinInput'];?>" min="0" max="255" step="5" value="122.5" onchange="brightnessLed(this,'brith<?php echo $item['idport'];?>',<?php echo $item['pinInput'];?>,'<?php echo $item['idport'];?>')"; />
						</div>
						<?php
						}else{
						?>
							<div>
								<span><i class="fa fa-<?php echo $item['icon'];?>" aria-hidden="true"></i></span><br><label><?php echo $item['name'];?></label>
							</div>
						<?php
						}
					}
				}
				?>
			</div>		
		</div>
	</div>
</div>
			
<script type="text/javascript">
//firebase data change event

ardx.on('value', function(snapshot){
	var value = snapshot.val(); // is on or off
	
	//ledA
	if(value.ledA == 0){
		document.getElementById("iA13").classList.remove("ledon");
		document.getElementById("A13").value = 0;
		document.getElementById("A13").style.visibility = "hidden";
	}else{
		document.getElementById("iA13").classList.add("ledon");
		document.getElementById("A13").style.visibility = "visible";
		document.getElementById("A13").value = value.brithA;
	}
	//ledB
	if(value.ledB == 0){
		document.getElementById("iB13").classList.remove("ledon");
		document.getElementById("B13").value = 0;
		document.getElementById("B13").style.visibility = "hidden";
	}else{
		document.getElementById("iB13").classList.add("ledon");
		document.getElementById("B13").style.visibility = "visible";
		document.getElementById("B13").value = value.brithB;
	}

	//TEMPERATURE
	if(value.tempA != document.getElementById("ottemp").innerHTML){
		var t = parseFloat(document.getElementById("ottemp").innerHTML)
		//ardx.update({'tempA':t });
		document.getElementById("ottemp").innerHTML  = value.tempA;
	}
});
$(document).ready(function(){
	
	//Digital watch
	window.onload=show5();
});


/* Digital watch */
function show5(){
	if (!document.layers&&!document.all&&!document.getElementById)
	return

	var Digital=new Date()
	var hours=Digital.getHours()
	var minutes=Digital.getMinutes()
	var seconds=Digital.getSeconds()

	var dn="PM"
	if (hours<24)
	dn="AM"
	if (hours>24)
	hours=hours-24
	if (hours==0)
	hours=24

	 if (minutes<=9)
	 minutes="0"+minutes
	 if (seconds<=9)
	 seconds="0"+seconds
	//change font size here to your desire
	//myclock="<span>"+hours+":"+minutes+":"+seconds+" "+dn
	myclock= hours+":"+minutes+":"+seconds
	if (document.layers){
		document.layers.liveclock.document.write(myclock)
		document.layers.liveclock.document.close()
	}else if (document.all)
	liveclock.innerHTML=myclock
	else if (document.getElementById)
	document.getElementById("liveclock").innerHTML=myclock
	setTimeout("show5()",1000)
}
</script>

<?php
include('inc/ot-footer.php');
?>