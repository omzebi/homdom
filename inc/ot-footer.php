
<script type="text/javascript">
	//deshabilitar bóton derecho
	var btnderecho = false;
	if(btnderecho){
		document.oncontextmenu = function(){return false}
	}

$(document).ready(function(){

	//**************change language*****************//
		$(document).on("click", "img.mylang",function(){
		var lang = $(this).attr("id");
		//alert(lang);
		$.ajax({
			url: "ot-AjaxLanguage.php",
			type: "post",
			data: "lang="+lang,
			success: function(data) {
				//alert(data);
				location.reload();
			}
		});
		return false;
	});	
});	
</script>	
</body>
</html>