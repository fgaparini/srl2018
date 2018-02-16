$(function() {
    $( ".datepicker" ).datepicker({
        dateFormat: "dd-mm-yy"
    });
    
    //fancy box
    $(".update_calendar").fancybox({
        'width'		        : '60%',
        'height'	        : '50%',
        'autoScale'     	: true,
        'transitionIn'		: 'none',
        'transitionOut'		: 'none',
        'type'			: 'iframe'
    });
    
});

function load_rango(rango)
{
    base_url = $('#base_url').val();
    operacion = $('#operacion').val();
    cant = $('#cant').val();
    fecha = $('#fecha').val();
    id_habitacion = $('#id_habitacion').val();
    
    window.location = base_url+"admin/calendar/?operacion="+operacion+"&cant="+cant+"&rango="+rango+"&fecha="+fecha+"&id_habitacion="+id_habitacion;
}

