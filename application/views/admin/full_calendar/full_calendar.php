<!DOCTYPE html>
<html>
<head>
<link href='<?php echo base_url()."js/full_calendar-1.6.1/fullcalendar/fullcalendar.css" ?>' rel='stylesheet' /> 
<link href='<?php echo base_url()."js/full_calendar-1.6.1/fullcalendar/fullcalendar.print.css" ?>' rel='stylesheet' media='print' /> 
<script src='<?php echo base_url()."js/full_calendar-1.6.1/jquery/jquery-1.9.1.min.js" ?>'></script>
<script src='<?php echo base_url()."js/full_calendar-1.6.1/jquery/jquery-ui-1.10.2.custom.min.js" ?>'></script>
<script src='<?php echo base_url()."js/full_calendar-1.6.1/fullcalendar/fullcalendar.min.js" ?>'></script>
<script>

	$(document).ready(function() {
	
		$('#calendar').fullCalendar({
		
			editable: true,
			
			events: "<?php echo base_url() ?>admin/full_calendar/json/<?php echo $ID_Alojamiento?>",
			
			eventDrop: function(event, delta) {
				alert(event.title + ' was moved ' + delta + ' days\n' +
					'(should probably update your database)');
			},
			
			loading: function(bool) {
				if (bool) $('#loading').show();
				else $('#loading').hide();
			}
			
		});
		
	});

</script>
<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	#calendar {
		width: 900px;
		margin: 0 auto;
		}

</style>
</head>
<body>
    <div id='calendar'></div>
</body>
</html>
