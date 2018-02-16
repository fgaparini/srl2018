function eliminar(id)
{
    base_url = $('#base_url').val();
    if (confirm("¿Esta seguro que desea borrar?")) {
        window.location.href=base_url+"admin/tipopagina/delete/"+id;
    }
}