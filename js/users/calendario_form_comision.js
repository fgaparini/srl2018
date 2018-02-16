 
$(function() {
    //Calendario
    $( "#fecha_desde" ).datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
        monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
        onClose: function( selectedDate ) {
            $( "#fecha_salida" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    
    //Calendario
    $( "#fecha_hasta" ).datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
        monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
        onClose: function( selectedDate ) {
            $( "#fecha_ingreso" ).datepicker( "option", "maxDate", selectedDate );
        }
    });
   

    $('#ID_Habitacion').change(function(e){
        crear_calendario();
    });
    
    crear_calendario();
       
});


function crear_calendario()
{
    $('#calendar').html('');
    
    ID_Habitacion = $('#ID_Habitacion').val();
    ID_Alojamiento = $('#ID_Alojamiento').val();
    base_url = $('#base_url').val();

    $('#calendar').fullCalendar({
		
        editable: true,
			
        events: base_url+"users_comision/dash_calendario/ajax_calendario/?ID_Alojamiento="+ID_Alojamiento+"&ID_Habitacion="+ID_Habitacion	
    
    });
}

