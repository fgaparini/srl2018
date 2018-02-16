 
$(function() {
    //Calendario
    $( "#fecha_ingreso" ).datepicker({
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
    $( "#fecha_salida" ).datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
        monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
        onClose: function( selectedDate ) {
            $( "#fecha_ingreso" ).datepicker( "option", "maxDate", selectedDate );
        }
    });
    

    CKEDITOR.replace( 'Descripcion', {
        uiColor: '#F0AD64',
        toolbar: [
        {
            name: 'basicstyles', 
            items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript' ]
        },
        {
            name: 'paragraph', 
            items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote',
            '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ]
        },
        {
            name: 'links', 
            items : [ 'Link','Unlink' ]
        },
        '/',
        {
            name: 'styles', 
            items : [ 'Styles','Format','Font','FontSize' ]
        },
        {
            name: 'colors', 
            items : [ 'TextColor','BGColor' ]
        },
        ]
    });
        
        
    $('#fecha_ingreso').change(function(){
       fecha_ingreso =  $(this).val();
        fecha_salida =  $('#fecha_salida').val();
       
        if(fecha_ingreso==fecha_salida)
        {
            alert('no pueden ser iguales las fechas');
                
            $(this).val(' ');
                
        }
        else
        {
            calcular_precio(); 
        }
    })
    
    $('#fecha_salida').change(function(){
        fecha_salida =  $(this).val();
        fecha_ingreso =  $('#fecha_ingreso').val();
       
        if(fecha_ingreso==fecha_salida)
        {
            alert('no pueden ser iguales las fechas');
                
            $(this).val(' ');
                
        }
        else
        {
            calcular_precio(); 
        }
        
        
        
    })
        
        
    
});

function calcular_precio()
{
    
    base_url = $('#base_url').val();
    
    fecha_ingreso = $('#fecha_ingreso').val();
    fecha_salida = $('#fecha_salida').val();
    ID_Habitacion = $('#ID_Habitacion').val();
    
    var datos={
        fecha_ingreso:fecha_ingreso,
        fecha_salida: fecha_salida,
        ID_Habitacion:ID_Habitacion
        
    }
    //AJAX
    $.ajax({
        url: base_url+"users_comision/dash_reservas/ajax_precio_habitacion/",
        type: 'POST',
        data: datos,
        dataType:"json",
        success: function(msg) {
            
          
            if(msg.cantidad=='0')
            {
                alert('La unidad alojativa no tiene disponibilidad, los dias ingresados ya estan reservados');
                $('#form_reservas button#guardar').attr('disabled','disabled')
            }
            else
            {
                $('#form_reservas button#guardar').removeAttr('disabled');     
            }
            
            $('#total').text('$ '+ msg.suma) ;
            $('#costo_total').val(msg.suma) ;
            
           
        }
    })
}
