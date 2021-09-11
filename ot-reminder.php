<?php
include('inc/ot-header.php');
include("inc/ot-connection.php");
include("inc/ot-admin.php");
include("inc/ot-language.php");
include("inc/ot-function.php");
include("inc/ot-ArtyomComands.php");
?>

<div class="otcapa">
	<div class="otreminder">
		<h2>REMINDER CALENDAR</h2>
		<?php
		$db->orderBy("bdate","asc");
		$db->where ("status","1");
		$db->where ("bdate",date("y-m-d"), '>=');
		$data = $db->get('reminders',5);
		$num = $db->count ;
		if($num > 0){
			foreach($data as $item){
			?>
		
				<div class="otreminders">
					<p><i class="fa fa-bell fa-2x" aria-hidden="true"></i></p>
					<div id="<?php echo $item['id'];?>" class="otdelreminder"><i class='fa fa-trash-o' aria-hidden='true'></i></div>
					<p><span><?php echo $item['title'];?></span></p>
					<p><span><?php echo $item['description'];?></span></p>
					<?php
					if($item['frequency'] == ""){
					?>
						<p><span><?php echo $item['bdate'];?></span><br><span><?php echo $item['btime'];?></span></p>
					<?php
					}else{
					?>
						<p class="othourreminder"><span><?php echo $item['bdate'];?></span><br><span><?php echo $item['btime'];?></span></p>
						<p class="othourreminder"><span><?php echo $item['edate'];?></span><br><span><?php echo $item['etime'];?></span></p>
					<?php						
					}
					$f1 = new DateTime();
					$f2 = new DateTime($item['bdate']." ".$item['btime']);
					$diff = $f1->diff($f2);
					echo "<p class='otflash'>";
					if($diff->format('%y') > 0) 
					echo $diff->format('%y years ');
					if($diff->format('%m') > 0) 
					echo $diff->format('%m months ');
					if($diff->format('%a') > 0) 
					echo $diff->format('%a days ');
					if($diff->format('%h') > 0) 
					echo $diff->format('%h hours ');
					if($diff->format('%i') > 0) 
					echo $diff->format('%i minutes ');
					if($diff->format('%s') > 0) 
					echo $diff->format('%s seconds ');
					echo "</p>";					
					?>
					<p><span>
					<?php 
					if($item['frequency'] == "H"){
						echo "<span><i class='fa fa-repeat' aria-hidden='true'></i> HOURLY</span>";
					}else if($item['frequency'] == "D"){
						echo "<span><i class='fa fa-repeat' aria-hidden='true'></i> DAILY</span>";
					}else if($item['frequency'] == "W"){
						echo "<span><i class='fa fa-repeat' aria-hidden='true'></i> WEEKLY</span>";
					}else if($item['frequency'] == "M"){
						echo "<span><i class='fa fa-repeat' aria-hidden='true'></i> MONTHLY</span>";
					}else if($item['frequency'] == "Y"){
						echo "<span><i class='fa fa-repeat' aria-hidden='true'></i> YEARLY</span>";
					}else{
						echo "<span>ONCE TIME</span>";
					}
					?>
					</span></p>
				</div>
			<?php
			}
		}
		?>
		<div class="otreminders" id="otreminderplus"><i class="fa fa-plus-square-o fa-3x" aria-hidden="true"></i></div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
		
	$(document).on("click", "div.otdelreminder i",function(){
		var selected = $(this).closest("div.otdelreminder");
		var idreminder = selected.attr("id");
		//alert(idreminder);
		$.ajax({
			type:"post",
			data: "idreminder="+idreminder,
			url:"inc/ot-AjaxDelReminder.php",
			success:function(data)
			{
				//alert(data);
				if(data == "ok"){
					selected.closest("div.otreminders")
					.html("...deleting reminder...")
					.css("background","#000")
					.fadeOut("slow", function() { selected.closest("div.otreminders").remove();});
				}else{
					$("div.otreminder").prepend("<div class='otErrorReminder'>"+data+"</div>").next(".otErrorReminder").fadeOut(4000);
				}
			}
		});
	});
	
	//flash
	setInterval(function() { 
		$("p.otflash").hide(); 
		setTimeout(function() {     
		   $("p.otflash").show(); 
		},2000);
	},3000);

	//new reminder
	$(document).on("click", "div#otreminderplus i",function(){
		window.location.href = 'ot-NewReminder.php';
	});
	
});
</script>
<?php
include('inc/ot-footer.php');
?>