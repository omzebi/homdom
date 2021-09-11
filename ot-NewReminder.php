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
	<div class="otreminder">

			<div class="calendar1">
				<div id="calendar" class="calendar">
					<h2>BEGIN REMINDER</h2>					
					<div id="otremindertitle"><input type="text" value="" placeholder="Title reminder" /></div>
					<div id="otreminderdesc"><textarea rows="5" placeholder="Description reminder"></textarea></div>
					<div id="ottypes">
						<?php
						$db->orderBy("type","asc");
						$db->where ("status","1");
						$data = $db->get('types');			
						$num = $db->count ;
						if($num > 0){
							echo "<select>";
								echo "<option value=''>Choice one type</option>";
							foreach($data as $item){
								echo "<option value='".$item['type']."'>".$item["type"]."</option>";
							}
							echo "</select>";
						}
						?>
					</div>
					<div id="otnext"><input type="button" value="NEXT" /></div>
				</div>	
				
			</div>
			
			<input type="hidden" value="<?php echo date('y-m-d');?>" id="fr1" /><input type="hidden" value="<?php echo date('y-12-31');?>" id="fr2" />
			
			<div class="calendar2">
				<div id="otreminderrepeat">
					<h2>Repeating reminder</h2>
					<label>Hour<br><input type="radio" value="otreminderhour"  name="otreminderrepeat" /></label>
					<label>Day<br><input type="radio" value="otreminderday"  name="otreminderrepeat" /></label>
					<label>Week<br><input type="radio" value="otreminderweek"  name="otreminderrepeat" /></label>
					<label>Month<br><input type="radio" value="otremindermonth"  name="otreminderrepeat" /></label>
					<label>Year<br><input type="radio" value="otreminderyear"  name="otreminderrepeat" /></label>
				</div>
				<div id="otreminderhour" class="otreminderAll">
					hhhh
				</div>
				<div id="otreminderday" class="otreminderAll">
					<div id="otrd"></div>
				</div>
				<div id="otreminderweek" class="otreminderAll">
					<label>Sun<br><input type="checkbox" name="otreminderweek" value="" /></label>
					<label>Mon<br><input type="checkbox" name="otreminderweek" value="" /></label>
					<label>Tue<br><input type="checkbox" name="otreminderweek" value="" /></label>
					<label>Wed<br><input type="checkbox" name="otreminderweek" value="" /></label>
					<label>Thu<br><input type="checkbox" name="otreminderweek" value="" /></label>
					<label>Fri<br><input type="checkbox" name="otreminderweek" value="" /></label>
					<label>Sat<br><input type="checkbox" name="otreminderweek" value="" /></label>
				</div>
				<div id="otremindermonth" class="otreminderAll">
					<div id="otrm"></div>
				</div>
				<div id="otreminderyear" class="otreminderAll">
					yyyy
				</div>		
			
					<div id="hour1"><input type="time" value=""  disabled="disabled" /></div>
				
			</div>
			<div id="otremindersave"><input type="button" value="SAVE" /></div>
	</div>
</div>
<script type="text/javascript">
	var firstdate = "";
	var lastdate = "";
	var nm = 0;
$(document).ready(function(){
	//var lang = $("#otlang").val();
	//load home in 1800000
	setInterval(function(){
		window.location.href = 'ot-home.php';
	},1800000);
	
	//$('#otrd').datepicker('option', $.datepicker.regionalOptions[$("#otlang").val()]); 
    //$.datepicker.setDefaults($.datepicker.regionalOptions[$("#otlang").val()]);
	//calendar1io
	$(function () {
	
		$("#otrd").datepicker({
			inline: true,
			firstDay: 1,
			showOtherMonths: true,
			selectMultiple:true,
			dateFormat: 'yy-mm-dd',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',	'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi?rcoles', 'Jueves', 'Viernes', 'S?bado'],
			dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mi?;', 'Juv', 'Vie', 'S?b'],
			dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'S?'],	
			minDate: "-0m",
			//maxDate: "+0m",       
			prevText: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
			nextText: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
		});
	
		
	});
	

	//when click next
	$(document).on("click", "#otnext input",function(){
		$("div.calendar1" ).hide( "slow", function() {
			$("div.calendar1").animate({ "opacity": "1" }, 500);
		});
		$("div.calendar2").show( "slow", function() {
			$("div.calendar2").animate({ "margin-top": "0px" }, 500);
		});
		
		$(this).hide();
		
		nm = numMonth($("#fr1").val(), $("#fr2").val());
		//alert(nm);
	//$('#otrd').datepicker('option', $.datepicker.regionalOptions[$("#otlang").val()]); 
    //$.datepicker.setDefaults($.datepicker.regionalOptions[$("#otlang").val()]);
		$("#otrm").datepicker({
			inline: true,
			firstDay: 1,
			showOtherMonths: false,
			selectOtherMonths: false,
			numberOfMonths: [12, 1], 
			hideIfNoPrevNext: true,
			selectMultiple:true,
			showButtonPanel: false,
			//showCurrentAtPos: 1,
			changeYear: false, 
			yearRange: "-0:+0", 
			stepYears: 0,
			dateFormat: 'yy-mm-dd',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',	'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi?rcoles', 'Jueves', 'Viernes', 'S?bado'],
			dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mi?;', 'Juv', 'Vie', 'S?b'],
			dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'S?'],	
			minDate: "-0m",
			maxDate: new Date("2018-12-31"),
			//maxDate: "+0m",       
			prevText: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
			nextText: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
		});			
		
		
	});	
	
	/* Nº month between two dates */			
	function numMonth(startDate, endDate) {
	  var start      = startDate.split('-');
	  var end        = endDate.split('-');
	  var startYear  = parseInt(start[0]);
	  var endYear    = parseInt(end[0]);
	  var dates      = [];

	  for(var i = startYear; i <= endYear; i++) {
		var endMonth = i != endYear ? 11 : parseInt(end[1]) - 1;
		var startMon = i === startYear ? parseInt(start[1])-1 : 0;
		for(var j = startMon; j <= endMonth; j = j > 12 ? j % 12 || 11 : j+1) {
		  var month = j+1;
		  var displayMonth = month < 10 ? '0'+month : month;
		  dates.push([i, displayMonth, '01'].join('-'));
		}
	  }
	  return dates.length;
	}				
		
	
	//when select hour,day,week,month,year
	$('input[name=otreminderrepeat]').on('change', function() {
		//alert($(this).parent().html());
		$("div.otreminderAll").hide();
		$("*").removeClass("otrepeating");
		$(this).parent().addClass("otrepeating");
		var repeat = $(this).val();
		$("#"+repeat).slideUp("slow", function() {
			$("#"+repeat).animate({ "margin-top": "0px" }, 500);
			$("#"+repeat).show();
		});
		$("#otremindersave").show();
		$("#hour1,#hour2").show();
	});
	
	$('input[type="checkbox"]').on('change',function(){
		$('input[type="checkbox"]').each(function(){
			$(this).prop('checked', false);
		});
		$(this).prop('checked', true);
	//alert($(this).val());
	});	

	
		
	
});
</script>
<?php
include('inc/ot-footer.php');
?>
