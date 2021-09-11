<?php
include('inc/ot-header.php');
include("inc/ot-admin.php");
include("inc/ot-language.php");
include("inc/ot-function.php");
include("inc/ot-ArtyomComands.php");
//echo hash('sha256', "KhoROMsi.biLahI_!TaY@nGAKham+nI--YallA@@BUUr###la%?¿&PSL".sha1("A123456a"));?>
<div id="ot-content">
	<div class="otcapa">
		<div class="otcapachild" id="otformlogin">
			<h1><?php echo $welcome;?></h1>
			<h2><?php echo $zone;?></h2>
			<div class="ot-error"></div>
			<p><input type="text" value="" id="otlogin" placeholder="write your username" /></p>
			<p><input type="password" value="" id="otpassword" placeholder="write your password" /></p>
			<p><input type="button" value="<?php echo $connect;?>" id="otconnect" autofocus= /></p>
			<p  id="otforget"><?php echo $forgetpass;?></p><br>
			<span  class="otinfos"><i class="fa fa-info-circle fa-2x" aria-hidden="true"></i><br><span><?php echo $helplogin;?></span></span>
		</div>
		<div class="otcapachild" id="otforgetpassword">
			<h2><?php echo $recovery;?></h2>
			<p><input type="text" value="" placeholder="write your address email" /></p>
			<p><input type="button" value="<?php echo $recuperar;?>" /></p>
			<p><?php echo $instructions;?></p><br>
			<p  id="otreload"><i class="fa fa-times fa-2x" aria-hidden="true"></i></p><br>
		</div>
	</div>
</div>	
<input type="hidden" id="langVoice" value="<?php echo $_COOKIE["lang"];?>" />
<script type="text/javascript">
$(document).ready(function(){
	//**************ajaxlogin*****************//

	$(document).on("click", "#otconnect",function(){
		var otconnect = $(this).val();
		var otlogin = $("#otlogin").val();
		var otpassword = $("#otpassword").val();
		$.ajax({
			url: "ajax/ajax_login.php",
			type: "post",
			data: "otconnect="+otconnect+"&otlogin="+otlogin+"&otpassword="+otpassword,
			success: function(data) {
				if(data == "ok"){
					//location.reload();
					window.location.href = 'ot-home.php?once=true';
					//alert(data);
					//
				}else{
					//alert(data);
					$(".ot-error").fadeIn(1000).html("<div>"+data+"<div>");
				}
			}
		});
		//return false;
	});
	//hide login
	$('#otforget').on("click", function(){
		$("#otformlogin").animate({ "marginTop" : "-2000px" }, "slow").fadeOut('slow');
		$("#otforgetpassword").slideDown("slow").animate({ "marginTop" : "0px" }, "slow");
	});
	//show login
	$('#otreload').on("click", function(){
		$("#otforgetpassword").animate({ "marginTop" : "-2000px" }, "slow").fadeOut('slow');
		$("#otformlogin").slideDown("slow").animate({ "marginTop" : "0px" }, 'slow');
	});
	
	//face Detection
    $('#picture').faceDetection({
        complete: function (faces) {
            console.log(faces);
			alert(faces);
        }
    });	


});
</script>
<?php
include('inc/ot-footer.php');
?>