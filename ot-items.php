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

$idplace = $_GET["idplace"];
$db->where ("id",$idplace);
$pos = $db->getOne("places");
?>
<div class="otcapa">
	<div class="otitems">
			<?php
			$db->where ("d.idplace",$idplace);
			$db->join("places p", "d.idplace=p.id", "LEFT");
			$data = $db->get("devices d", null, "d.name,d.nickname,d.icon,d.idport,d.pinInput");
			$num = $db->count ;
			if($num > 0){
				?>
				<div>
					<span><h2><?php echo $pos["name"];?></h2></span>
					<?php
					foreach($data as $item){
					?>
					<span>
						<!--<i class="fa fa-<?php echo $item['icon'];?>" aria-hidden="true" id="i<?php echo $item['idport'].''.$item['pinInput'];?>"></i><br>-->
						<p class="toggleWrapper" id="i<?php echo $item['idport'].''.$item['pinInput'];?>">.</p>
						<label><?php echo $item['name'];?></label><br>
						<input type="button" value="ON"  class="otbuttons otactive"  onclick="toggleLed(this,'<?php echo $item['nickname'];?>',<?php echo $item['pinInput'];?>,'<?php echo $item['idport'];?>');" />
						<input type="button" value="OFF" class="otbuttons"  onclick="toggleLed(this,'<?php echo $item['nickname'];?>',<?php echo $item['pinInput'];?>,'<?php echo $item['idport'];?>');" />
						<input type="range" name="range" class="range" id="<?php echo $item['idport'].''.$item['pinInput'];?>" min="0" max="255" step="5" value="122.5" onchange="brightnessLed(this,'brith<?php echo $item['idport'];?>',<?php echo $item['pinInput'];?>,'<?php echo $item['idport'];?>')"; />
					</span>
					<?php
					}
					?>
				</div> 
			<?php
			}else{
				echo "EMPTY PANEL";
			}
			?>	 				
	</div>      
</div>
<p><i class="fa fa-chevron-up fa-2x otshowoption" aria-hidden="true" id="otshowmuser"></i></p>
<div class="ot_options">
	<div>
		<span><i class="fa fa-id-badge fa-2x" aria-hidden="true"></i></span>
		<span><i class="fa fa-address-book-o fa-2x" aria-hidden="true"></i></span>
		<span>aaa</span>
		<span>aaa</span>
		<span>aaa</span>
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
});
</script>
<?php
include('inc/ot-footer.php');
?>