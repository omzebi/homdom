<?php
include('inc/ot-header.php');
include("inc/ot-connection.php");
include("inc/ot-admin.php");
include("inc/ot-language.php");
include("inc/ot-function.php");
include("inc/ot-ArtyomComands.php");
?>
<div class="otcapa">

	<div class="otusers">
		<div>
		<?php
		$data = $db->get("users");
		if($db->count > 0){
			foreach($data as $item){
			?>
				<div class="otdeluser" id="<?php echo $item['id'];?>">
					<?php
					if($item['picture'] == ""){
					?>
						<p><i class="fa fa-user fa-5x" aria-hidden="true"></i></p>
					<?php
					}else{
					?>
						<p><img src="images/<?php echo $item['picture'];?>" width="50px" /></p>
					<?php
					}
					?>
					<p><?php echo $item['name'];?></p>
					<p><?php echo $item['surname'];?></p>
					<p>
						<i class="fa fa-trash otuser" aria-hidden="true" ></i>
						<input type="hidden" value="del" />
				
						<i class="fa fa-pencil otuser" aria-hidden="true" ></i>
						<input type="hidden" value="edit" />
					</p>
				</div>
			<?php
			}
		}
		?>	
			<div>
				<p><i class="fa fa-plus fa-3x ot-load" aria-hidden="true" id="ot-newuser"></i></p>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	//insert/update/del user
	$("i.otuser").click(function () {
		var iduser = $(this).closest("div.otdeluser").attr("id");
		var action = $(this).next("input").val();
		//alert(iduser);
		//alert(action);
		if(action == "edit"){
			window.location.href = 'ot-newuser.php?iduser='+iduser+'&action='+action;
		}else{
			$.ajax({
				url: "inc/ot-AjaxUser.php",
				type: "post",
				data: "action="+action+"&iduser="+iduser,
				success: function(data)
				{
					if(data == "ok"){
						$("#"+iduser).remove();
					}else{
						$("#otnewuser").after(data).next(".otvacio").delay(2000).fadeOut('slow');
					}
				},
				error: function(){
					//ShowStatus( "AJAX - error()" );
					alert("Recarga la pagina y intentelo de nuevo...");
				},
				complete: function(){
					//ShowStatus( "AJAX - complete()" );
					//$("div#loading").remove();
				}
			});	
		}
	});
});
</script>
<?php
include('inc/ot-footer.php');
?>