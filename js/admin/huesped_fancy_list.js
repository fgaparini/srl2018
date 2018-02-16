function huesped_select(ID_Huesped)
{
   apellido_nombre = $('#na_'+ID_Huesped).text();
   $('#apellido_nombre',window.parent.document).text(apellido_nombre);
   $('#ID_Huesped',window.parent.document).val(ID_Huesped);
   parent.$.fancybox.close(); 
}

