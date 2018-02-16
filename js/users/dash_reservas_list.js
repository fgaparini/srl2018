$(function() {
     var base_url = $('#base_url').val();
   $(".iframe_pago").colorbox({iframe:true, width:"40%", height:"60%"});
   
    var id=0;
   
    $('.inline').click(function(){
        id = $(this).attr('rel');
           
        $(".inline").colorbox({
            inline:true, 
            width:"600px",
            maxWidth: "800px",
            height:"auto", 
            href:"#inline_content"
        });
    });
   
    $('#pendiente').click(function(){
        estado_ajax(id,'pendiente')
    })
    
    $('#reservado').click(function(){
        estado_ajax(id,'reservado')
    })
    
    $('#checkin').click(function(){
        estado_ajax(id,'checkin')
    })
    
    $('#crear_pago').click(function(){
        crear_pago(id);
    })
    
    $('.eliminar_reserva').click(function(){
         id = $(this).attr('rel');
         
        var r = confirm("¿Esta seguro que desea eliminar la reserva?");
        
        if (r==true)
        {
            eliminar(id)
        }
    })
    
    $('#guardar_pago').click(function(){
        
    })
   $(".voucher2").click(function(){
    // e.preventDefault();
    ids = $(this).attr("rel");

          $.colorbox({
               iframe:true, 
               width:"80%", 
               height:"80%",
               href: base_url+'/users_comision/dash_comision/fancy_dash_comision/?id_reserva='+ids
           });
        });
});


function estado_ajax(id,estado)
{
    //Url base cuando se mueve el proyecto el script siga funcionando
   
   
    var datos={
        Localizador:id,
        estado_reserva:estado
    }
    //AJAX
    $.ajax({
        url: base_url+"users_comision/dash_reservas/reservas_estado_ajax/",
        type: 'POST',
        data: datos,
        success: function(msg) {
           
            if(msg=='ok')
            {
                window.location.href=base_url+"users_comision/dash_reservas/lists"; 
                $.colorbox.close()
            } 
            else
            {
                alert("Error") ;
            }

        }
        
    })
}


function eliminar(Localizador,id_habitacion)
{
    //Url base cuando se mueve el proyecto el script siga funcionando
    var base_url = $('#base_url').val();
   
    var datos={
        Localizador:Localizador,
        id_habitacion:id_habitacion
    }
    //AJAX
    $.ajax({
        url: base_url+"users_comision/dash_reservas/reservas_eliminar_ajax/",
        type: 'POST',
        data: datos,
        success: function(msg) {
           
            if(msg=='ok')
            {
                
                window.location.href=base_url+"users_comision/dash_reservas/lists"; 
            } 
            else
            {
                alert("Error") ;
            }

        }
        
    })
}
