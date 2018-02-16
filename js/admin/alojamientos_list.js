function eliminar(id)
{
    base_url = $('#base_url').val();
    var retVal = confirm("¿Esta seguro de eliminar el Alojamiento?");
    if( retVal == true ){
        window.location.href = base_url+"admin/alojamientos/delete/"+id;
        return true;
    }else{
        return false;
    }
}

function estado_alojamiento(id)
{
    base_url = $('#base_url').val();
    get = $('#get').val();
    datos={
        ID_Alojamiento:id
    }
    //AJAX
    $.ajax({
        url: base_url+"admin/ajax/estado_alojamiento/",
        type: 'POST',
        data: datos,
        success: function(msg) {
            if(msg=='si')
            {
                 alert('Alojamiento activado');
                 window.location.href=get;
            }
            else if(msg=='no')
            {
                alert('Alojamiento desactivado')
                window.location.href=get;
            }
            else{
                alert('Error!')
            }
        }
    })
}


