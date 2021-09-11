<?php
include('inc/ot-header.php');
include("inc/ot-connection.php");
include("inc/ot-admin.php");
include("inc/ot-language.php");
include("inc/ot-function.php");
include("inc/ot-ArtyomComands.php");
?>
<div class="otcapa">

	<div class="otscenes">
		<div>
		<?php
		//$db->where ("position",'l');
		$db->join("devices d", "s.iddevice=d.id", "LEFT");
		$data = $db->get("scenes s", null, "d.name,d.icon");
		$num = $db->count ;
		if($num > 0){
			foreach($data as $item){
			?>
				<span class="ot-load">
					<i class="fa fa-<?php echo $item['icon'];?>" aria-hidden="true"></i>
					<label><?php echo $item['name'];?></label>
				</span>
			<?php
			}
		}
		?>
		</div>
		<!--
		<span class="ot-load"><i class="fa fa-gears" aria-hidden="true"></i><label>SALON</label></span>
		<span class="ot-load"><i class="fa fa-microphone" aria-hidden="true"></i><label>MICRO</label></span>
		<span class="ot-load"><i class="fa fa-video-camera" aria-hidden="true"></i><label>CAMERA</label></span>
		<span class="ot-load"><i class="fa fa-calendar" aria-hidden="true"></i><label>CALENDAR</label></span>
		<span class="ot-load"><i class="fa fa-bell" aria-hidden="true"></i><label>ALARM</label></span>
		<span class="ot-load"><i class="fa fa-thermometer-empty" aria-hidden="true"></i><label>CLIMATE</label></span>
		<span class="ot-load"><i class="fa fa-video-camera" aria-hidden="true"></i><label>CAMERA</label></span>
		<span class="ot-load"><i class="fa fa-home" aria-hidden="true"></i><label>HOME</label></span>
		<span class="ot-load"><i class="fa fa-lightbulb-o" aria-hidden="true"></i><label>LIGHT</label></span>
		<span class="ot-load"><i class="fa fa-microphone" aria-hidden="true"></i><label>MICRO</label></span>
		<span class="ot-load"><i class="fa fa-video-camera" aria-hidden="true"></i><label>CAMERA</label></span>
		<span class="ot-load"><i class="fa fa-cogs" aria-hidden="true"></i><label>ROOMS</label></span>
		<span class="ot-load"><i class="fa fa-lightbulb-o" aria-hidden="true"></i><label>LIGHT</label></span>
		<span class="ot-load"><i class="fa fa-microphone" aria-hidden="true"></i><label>MICRO</label></span>
		<span class="ot-load"><i class="fa fa-video-camera" aria-hidden="true"></i><label>CAMERA</label></span>
		<span class="ot-load"><i class="fa fa-calendar" aria-hidden="true"></i><label>CALENDAR</label></span>
		<span class="ot-load"><i class="fa fa-bell" aria-hidden="true"></i><label>ALARM</label></span>
		<span class="ot-load"><i class="fa fa-thermometer-empty" aria-hidden="true"></i><label>CLIMATE</label></span>
		<span class="ot-load"><i class="fa fa-video-camera" aria-hidden="true"></i><label>CAMERA</label></span>
		<span class="ot-load"><i class="fa fa-home" aria-hidden="true"></i><label>HOME</label></span>
		<span class="ot-load"><i class="fa fa-lightbulb-o" aria-hidden="true"></i><label>LIGHT</label></span>
		<span class="ot-load"><i class="fa fa-microphone" aria-hidden="true"></i><label>MICRO</label></span>
		<span class="ot-load"><i class="fa fa-gears" aria-hidden="true"></i><label>SALON</label></span>
		<span class="ot-load"><i class="fa fa-lightbulb-o" aria-hidden="true"></i><label>LIGHT</label></span>
		-->
	</div>
</div>

<?php
include('inc/ot-footer.php');
?>