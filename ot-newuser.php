<?php
include('inc/ot-header.php');
include("inc/ot-connection.php");
include("inc/ot-admin.php");
include("inc/ot-language.php");
include("inc/ot-function.php");
include("inc/ot-ArtyomComands.php");

$db->where('id', $_GET["iduser"]);
$datos = $db->getOne("users");
?>
<div class="otcapa">

	<div class="otusers">
		<div>
			<form id="otformuser">
				<h2>New user</h2>
				<p><input type="text" name="login" value="<?php echo $datos['login'];?>" placeholder="Login" /></p>
				<p><input type="text" name="name" value="<?php echo $datos['name'];?>" placeholder="Name" /></p>
				<p><input type="text" name="surname" value="<?php echo $datos['surname'];?>" placeholder="Surname" /></p>
				<p><input type="email" name="email" value="<?php echo $datos['email'];?>" placeholder="Email" /></p>
				<select name="sex">
					<option value="M">M</option>
					<option value="W">W</option>
					<option value="O">Other</option>
				</select>

				<div id="otstatus"> 
				  <div class="front">Enable<input type="radio" name="status" value="1" /></div>
				  <div class="back">Disable<input type="radio" name="status" value="0" /></div>
				</div>			

				<p>
					<label for="file-upload" class="ot-file-upload">
						<i class="fa fa-cloud-upload"></i> Upload picture
					</label>
					<input id="file-upload" name="picture" type="file"/>
				</p>
				<p><input type="button" name="otnewuser" value="ADD USER" id="otnewuser" /></p>
			</form>
		</div>
	</div>
</div>
<script src="js/custom-file-input.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#otstatus").flip(); 
	//insert/update/del user
	$("#otnewuser").click(function () {
		var datos = new FormData($('#otformuser')[0]);		
		/*if(email.indexOf('@', 0) == -1 || email.indexOf('.', 0) == -1) {
			alert("El email no es correcto");
			return false;
		}*/
		
		$.ajax({
			url: "inc/ot-AjaxUser.php",
			contentType: 'multipart/form-data',
			processData: false, //Evitamos que JQuery procese los datos, daría error
			contentType: false, //No especificamos ningún tipo de dato
			data: datos,
			type: "POST",
			success: function(data)
			{
				if(data == "ok"){
					window.location.href = 'ot-users.php';
				}else{
					$("#otnewuser").after(data).next("span.otvacio").delay(2000).fadeOut('slow');
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
	});
});
</script>
<?php
include('inc/ot-footer.php');
?>