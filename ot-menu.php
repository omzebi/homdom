<?php
include_once("inc/ot-session.php");
sec_session_start();
include('inc/ot-empty_session.php');
include('inc/ot-header.php');
include("inc/ot-connection.php");
include("inc/ot-admin.php");
include("inc/ot-language.php");
include("inc/ot-function.php");
include("inc/ot-ArtyomComands.php");

?>
<div class="otcapa">
	<div class="otcapachild">
		<h2><?php echo $menu;?></h2>
		<?php
		$db->where ("status", 1);
		$data = $db->get('usermenu');
		$num = $db->count ;
		if($num > 0){
			foreach($data as $item){
			?>
				<p><input type="button" value="<?php echo $item['menu'];?>" id="<?php echo $item['url'];?>" class="ot-load" /></p>
			<?php
			}
		}
		?>
		<!--<p><input type="button" value="HELP" /></p>-->
	</div>
</div>

<img id="picture" src="images/face.jpg">
<script type="text/javascript">
$(document).ready(function(){	

});
</script>
<?php
include('inc/ot-footer.php');
?>