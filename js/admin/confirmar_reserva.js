$(function() {
    
    $('#confirmar').click(function(){
        
        confirmar_reserva();
    })


    
})

function confirmar_reserva()
{
    var base_url = $('#base_url').val();
    var mail_alojamiento;
    var mail_sanrafaellate;
    var mail_huesped;
    var reservas_id = $('#reservas_id').val();
       
    if($("#mail_alojamiento").is(':checked')) {  
        mail_alojamiento="1"
    }
    else
    {
        mail_alojamiento="";
    }
    
    if($("#mail_sanrafaellate").is(':checked')) {  
        mail_sanrafaellate="1"
    }
    else
    {
        mail_sanrafaellate="";
    }
    
    if($("#mail_huesped").is(':checked')) {  
        mail_huesped="1"
    }
    else
    {
        mail_huesped="";
    }
       
    $.blockUI({
        message: '<h3><img src="'+base_url+'img/ajax-loader.gif">Espere un momento</h3>'
    });
        
    var datos={
        mail_alojamiento:mail_alojamiento,
        mail_sanrafaellate:mail_sanrafaellate,
        mail_huesped:mail_huesped,
        reservas_id:reservas_id
    }
        
    //AJAX
    $.ajax({
        url: base_url+"admin/reservas/confirmar_reserva_ajax/",
        type: 'POST',
        data: datos,
        success: function(msg){
           
            if(msg=='ok')
                window.location.href=base_url+"admin/reservas/"
            else
                alert('Error del sistema');
        }
       
    
    })
    
    
}