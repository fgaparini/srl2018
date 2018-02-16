function update_hab()
{
    base_url = $('#base_url').val();
    ID_Alojamiento = $('#ID_Alojamiento').val();
    ID_Habitacion = $('#hab_id').val();
    fecha_desde = $('#fecha_desde').val();
    //Cuando cambia de habitacion 
    window.location.href=base_url+"admin/full_calendar/fullcalendar_hab/?ID_Alojamiento="+ID_Alojamiento+"&ID_Habitacion="+ID_Habitacion+"&fecha_desde="+fecha_desde ;
        
        
                
}
            
$(document).ready(function() {
    
    base_url = $('#base_url').val();
    ID_Alojamiento = $('#ID_Alojamiento').val();
    ID_Habitacion = $('#hab_id').val();
    fecha_desde = $('#fecha_desde').val();
	
    //Calendario
    $( "#fecha_desde" ).datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
        monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ]

    });
        
        
    $('#calendar').fullCalendar({
		
        editable: true,
			
        events: base_url+"admin/full_calendar/json_hab/?ID_Alojamiento="+ID_Alojamiento+"&ID_Habitacion="+ID_Habitacion+"&fecha_desde="+fecha_desde,
			
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