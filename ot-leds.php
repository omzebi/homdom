<?php
include_once("inc/ot-session.php");
sec_session_start();
include('inc/ot-empty_session.php');
include('inc/ot-header.php');
include("inc/ot-admin.php");
include("inc/ot-language.php");
include("inc/ot-function.php");
include("inc/ot-connection.php");
include("inc/ot-ArtyomComands.php");
?>
<div class="otcapa">
	<div class="otleds">
		<h2>aaaa</h2>
		<?php
		$db->where ("type","L");
		$data = $db->get("devices");
		$num = $db->count ;
		if($num > 0){
			foreach($data as $item){
			?>
				<div class="toggleWrapper" id="i<?php echo $item['idport'].''.$item['pinInput'];?>">
					<input type="checkbox" value="ON" id="dn<?php echo $item['idport'];?>" onclick="toggleLed(this,'<?php echo $item['nickname'];?>',<?php echo $item['pinInput'];?>,'<?php echo $item['idport'];?>');" />
					<label for="dn<?php echo $item['idport'];?>" class="toggle" ><span class="toggle__handler"></span></label>
					<label><i class="fa fa-eye ot-led" aria-hidden="true" id="<?php echo $item['id'];?>"></i> <?php echo $item['name'];?></label>	
					<input type="range" name="range" class="range" id="<?php echo $item['idport'].''.$item['pinInput'];?>" min="0" max="255" step="5" value="122.5" onchange="brightnessLed(this,'brith<?php echo $item['idport'];?>',<?php echo $item['pinInput'];?>,'<?php echo $item['idport'];?>')"; />
				</div>

			<?php
			}
		}
		?>
	</div>
	
<div class="switch demo4">
    <input type="button" value="ON" id="leds" onclick="toggleLed(this,'Leds',99,'Z');">
    <label><i class="icon-off"></i></label>
</div> 	
	
</div>


<script type="text/javascript">
$(document).ready(function(){
	
	/*
	$(document).on("click", "#otshowmuser",function(){
		$("#otmenu").fadeIn("fast").animate({ "marginBottom" : "0px" }, "fast");
		setTimeout(function() {
		  $("#otmenu").fadeOut("fast").animate({ "marginBottom" : "-50px" }, "fast");
		}, 10000);
	});	*/
	
	$(document).on("click", ".ot-led",function(){
		var led = $(this).attr("id");
		window.location.href = "ot-led.php?led="+led;
	});

});
//firebase data change event
ardx.on('value', function(snapshot){
	var value = snapshot.val(); // is on or off
	
	//ledA
	if(value.ledA == 0){
		document.getElementById("iA13").classList.remove("ledon");
		document.getElementById("A13").value = 0;
		document.getElementById("A13").style.visibility = "hidden";
		document.getElementById("dnA").checked  = false;
	}else{
		document.getElementById("iA13").classList.add("ledon");
		document.getElementById("A13").style.visibility = "visible";
		document.getElementById("A13").value = value.brithA;
		document.getElementById("dnA").checked  = true;
	}
	//ledB
	if(value.ledB == 0){
		document.getElementById("iB13").classList.remove("ledon");
		document.getElementById("B13").value = 0;
		document.getElementById("B13").style.visibility = "hidden";
		document.getElementById("dnB").checked  = false;
	}else{
		document.getElementById("iB13").classList.add("ledon");
		document.getElementById("B13").style.visibility = "visible";
		document.getElementById("B13").value = value.brithB;
		document.getElementById("dnB").checked  = true;
	}
	//All leds	
	if(value.leds == 0){
		document.getElementById("leds").value = 'ON';
	}else{
		document.getElementById("leds").value = 'OFF';
	}
});
</script>
<?php
include('inc/ot-footer.php');
?>