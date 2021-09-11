<?php
include('inc/ot-header.php');
include("inc/ot-connection.php");
include("inc/ot-admin.php");
include("inc/ot-language.php");
include("inc/ot-function.php");
include("inc/ot-ArtyomComands.php");
?>
<div class="otcapa">

	<?php
	$db->where ("status", 1);
	$datosplan = $db->getOne('htmlplan');
	$num = $db->count ;
	if($num > 0){
	?>
		<div class="ot-plan">
			<div id="ot-plan2"><?php echo $datosplan["plan"];?></div>		
		</div>
		<input type="button" value="Erase plan" id="ot-plan" class="btnplan ot-load" />
		<input type="hidden" value="del_plan" id="del_plan" />
	<?php
	}else{
	?>	
		<div class="ot-blocks">
			<span class="clone">Room</span>
			<span class="clone">Chicken</span>
			<span class="clone">Bathrroom</span>
			<span class="clone">Hall</span>
		</div>
		
		<div class="ot-plan">
			<div class="ot-blocks">
				<span class="clone">Room</span>
				<span class="clone">Chicken</span>
				<span class="clone">Bathrroom</span>
				<span class="clone">Hall</span>
			</div>		
			
			<div id="ot-planes"></div>
			
			<div class="ot-blocks">
				<span class="clone">Room</span>
				<span class="clone">Chicken</span>
				<span class="clone">Bathrroom</span>
				<span class="clone">Hall</span>
			</div>			
		</div>
		<input type="button" value="Save plan" id="ot-plan" class="btnplan ot-load" />
		<input type="hidden" value="del_plan" id="save_plan" />	
	<?php
	}
	?>
</div>
<script type="text/javascript">
var regex = /^(.+?)(\d+)$/i;
var cloneIndex = $(".clonedInput").length;
function clone(){
    $(this).clone()
        .appendTo("#ot-planes")
        .attr("id", "clonedInput" +  cloneIndex)
        .find("*")
        .each(function() {
            var id = this.id || "";
            var match = id.match(regex) || [];
            if (match.length == 3) {
                this.id = match[1] + (cloneIndex);
            }
        });
        //.on('click', 'button.clone', clone)
        //.on('click', 'button.remove', remove);
    cloneIndex++;

	$("#ot-planes > .clone").on("dblclick", remove);
	
	$('#ot-planes > .clone').on("contextmenu", function(){
		$(this).html("<input type='text' value='' /><input type='button' value='Save' class='otlabel' />");
		$('.otlabel').on("click", function(){
			var ottext = $(this).prev("input").val();
			$(this).closest("span").html(ottext);
		});
	});
	$("#ot-planes > .clone").resizable({
	  resize: function( event, ui ) {}
	});
    $("#ot-planes > .clone").draggable({
        start: handleDragStart,
        cursor: 'move',
        revert: "invalid",
		//appendTo: "body",
		cursor: "move",
		//helper: "clone",
    });
    $("#ot-planes").droppable({
        drop: handleDropEvent,
		accept: ".clone",
		activeClass: "ui-state-highlight",
        tolerance: "touch",              
    });
	function handleDragStart (event, ui) {}       
	function handleDropEvent (event, ui) {}
}
function remove(){
    $(this).remove();
}
	

$(document).ready(function(){
	$(".ot-blocks > .clone").on("click", clone);
	
	$('.btnplan').on("click", function(){
		var btnplan		= $(this).next("input").attr("id");
		var htmlplan 	= $("div#ot-planes").html();
		$.ajax({
			type: "POST",
			url: "inc/ot-ajaxplan.php",
			data: "htmlplan="+htmlplan+"&btnplan="+btnplan,			
			beforeSend: function(){
				$('body').append = "<i class='fa fa-circle-o-notch fa-spin fa-5x fa-fw'></i>";
			},
			success: function(data){
				window.location.href = $(this).attr("id")+".php";
			},
			error: function(){
				alert("error");
			}
		});	
	});	
});	
</script>
<?php
include('inc/ot-footer.php');
?>