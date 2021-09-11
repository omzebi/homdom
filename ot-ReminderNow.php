<?php
include('inc/ot-header.php');
include("inc/ot-connection.php");
include("inc/ot-admin.php");
include("inc/ot-language.php");
include("inc/ot-function.php");
include("inc/ot-ArtyomComands.php");

$db->where ("status","1");
$db->where('remember', Array (date("y-m-d H:i:s", strtotime("-5 minute")), date("y-m-d H:i:s", strtotime("+5 minute"))), 'BETWEEN');
$data = $db->getOne('reminders');
$num = $db->count ;

if($num > 0){
	?>
	<div class="otcapa">
		<div class="otreminder">
			<div class="otreminders otnow">
				<p><i class="fa fa-bell fa-5x" aria-hidden="true"></i></p>
				<p><span><?php echo $data['title'];?></label></p>
				<p><span><?php echo $data['description'];?></label></p>
				<?php
				if($data['frequency'] == ""){
				?>
					<p class="otdnow"><span><?php echo $data['bdate'];?></label><br><span><?php echo $data['btime'];?></label></p>
				<?php
				}else{
				?>
					<p class="otdnow"><span><?php echo $data['bdate'];?></label><br><span><?php echo $data['btime'];?></label></p>
					<p class="otdnow"><span><?php echo $data['edate'];?></label><br><span><?php echo $data['etime'];?></label></p>
				<?php						
				}
				?>
				
				<p>
				<?php
				$db->where ("status","1");
				$db->where ("id",$data['type']);
				$type = $db->getOne('types');	
				echo $type["icon"];
				?>
				</p>
				
				<p><span>
				<?php 
				if($data['frequency'] == "H"){
					echo "<span><i class='fa fa-clock-o' aria-hidden='true'></i> HOURLY</span>";
				}else if($data['frequency'] == "D"){
					echo "<span><i class='fa fa-clock-o' aria-hidden='true'></i> DAILY</span>";
				}else if($data['frequency'] == "W"){
					echo "<span><i class='fa fa-clock-o' aria-hidden='true'></i> WEEKLY</span>";
				}else if($data['frequency'] == "M"){
					echo "<span><i class='fa fa-clock-o' aria-hidden='true'></i> MONTHLY</span>";
				}else if($data['frequency'] == "Y"){
					echo "<span><i class='fa fa-clock-o' aria-hidden='true'></i> YEARLY</span>";
				}else{
					echo "<span><i class='fa fa-clock-o' aria-hidden='true'></i> ONCE TIME</span>";
				}
				?>
				</label></p>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function(){
		//shake bell
		setInterval(function(){
			$("i.fa-bell").effect( "shake", {}, "fast" ).css("color","#f00");
		},500);
	});
	</script>
<?php
}else{
	echo "ko";
}
include('inc/ot-footer.php');
?>