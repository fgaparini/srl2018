function alojamientos_imagenes_delete(id_alojamiento,nombre_imagen)
{
    $('myModal').modal('show');
    $('#eliminar').click(function(){
        base_url = $('#base_url').val();   
        datos={
            ID_Alojamiento:id_alojamiento,
            NombreImagen:nombre_imagen
        }
        //AJAX
        $.ajax({
            url: base_url+"users/ajax_user/alojamientos_imagenes_delete/",
            type: 'POST',
            data: datos,
            success: function(msg) {
                $('#i_'+nombre_imagen).hide();
                $('#myModal').modal('hide');
            }
        })
        
    });
}