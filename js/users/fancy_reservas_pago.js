$(function() {
    $('#guardar_pago').click(function(){
        
        monto_pago = $('#monto_pago').val();
        id_reserva = $('#id_reserva').val();
        
        base_url = $('#base_url').val();
        
        var datos={
            monto_pago:monto_pago,
            Localizador:id_reserva
        }
        //AJAX
        $.ajax({
            url: base_url+"users_comision/dash_reservas/fancy_reserva_pago_save_ajax/",
            type: 'POST',
            data: datos,
            success: function(msg) {
           
                if(msg=='ok')
                {
                   // parent.window.location.href=base_url+"users_comision/dash_reservas/lists"; 
                    //$.parent.colorbox.close()
                    parent.$.fn.colorbox.close();
                    $(window.parent.location.href=base_url+"users_comision/dash_reservas/lists");
                    
                } 
                else
                {
                    alert("Error") ;
                }

            }
        
        })
        
    })

});

