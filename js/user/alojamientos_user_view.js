
    $("a[rel=example_group]").fancybox({
        'transitionIn'		: 'none',
        'transitionOut'		: 'none',
        'titlePosition' 	: 'over',
        'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
            return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
    });
    

    //Guardar descripcion...........
    $('.descripcion_form a' ).click(function(){

      
        var ids=$( this).attr('rel');
        var descrip =$('form#'+ids).children('input#descrip_'+ids).val();
        var id_emp =$('form#'+ids).children('input#ID_Alojamiento_'+ids).val();
        base_url = $('#base_url').val();   
        
        $.blockUI({
            message: '<img src="'+base_url+'img/ajax-loader.gif" />'
        });
        
        datos={
            ID_Alojamiento:id_emp,
            NombreImagen:ids,
            ImagenDescripcion:descrip
        }
        //AJAX
        $.ajax({
            url: base_url+"users/ajax_user/alojamientos_imagenes_descripcion/",
            type: 'POST',
            data: datos,
            success: function(msg) {
                $.unblockUI();     
            }
        })
    });
    
    
    
           



$(".deletet").fancybox({
        maxWidth    : 800,
        maxHeight   : 600,
        fitToView   : false,
        width       : '70%',
        height      : '70%',
        autoSize    : false,
        closeClick  : false,
        openEffect  : 'none',
        closeEffect : 'none',
        
    });

//$('.deletet').click(function(){alert('hola');});
    $(".cancelarimg").click(function(){
        $.fancybox.close();
    });
    $('.eliminarimg').click(function(){
        id=$(this).attr('rel');
        base_url=$('#base_url').val();
        id_alojar =$("#"+id+" input#id_alojar-"+id+"").val();
        name_img =$("#"+id+"  input#name_img-"+id+"").val();
        datos={
            ID_Alojamiento:id_alojar,
            NombreImagen:name_img
        };
        //AJAX
        $.ajax({
            url: base_url+"users/ajax_user/alojamientos_imagenes_delete/",
            type: 'POST',
            data: datos,
            success: function(msg) {
             $.fancybox('<img src="'+base_url+'/users/images/icons/fugue/tick-circle.png" alt="" /> Imagen elimnada <br> <br><a href="#" class="cancelarimg button red with-margin">Cerrar</a>');
                $("#i_"+name_img).hide();
            }
        });
        
    });




//<![CDATA[

// Inicialización de variables.
var map      = null;
var geocoder = null;

function load() {                                      // Abre LLAVE 1.
    if (GBrowserIsCompatible()) {						   // Abre LLAVE 2.
        map = new GMap2(document.getElementById("map"));
        Size = new google.maps.Size(600,450);
        map.setCenter(new GLatLng(-35.675147,-64.965822), 4);
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());

        geocoder = new GClientGeocoder();


        //---------------------------------//
        //   MARCADOR AL HACER CLICK
        //---------------------------------//
        GEvent.addListener(map, "click",
            function(marker, point) {
                if (marker) {
                    null;
                } else {
                    map.clearOverlays();
                    var marcador = new GMarker(point);
                    map.addOverlay(marcador);
                    //marcador.openInfoWindowHtml("<b><br>Coordenadas:<br></b>Latitud : "+point.y+"<br>Longitud : "+point.x+"<a href=http://www.mundivideo.com/fotos_pano.htm?lat="+point.y+"&lon="+point.x+"&mapa=3 TARGET=fijo><br><br>Fotografias</a>");
                    //marcador.openInfoWindowHtml("<b>Coordenadas:</b> "+point.y+","+point.x);
                    document.getElementById('Coordenadas').value = point.y+","+point.x;
                }
            }
            );
    //---------------------------------//
    //   FIN MARCADOR AL HACER CLICK
    //---------------------------------//

    } // Cierra LLAVE 1.
}   // Cierra LLAVE 2.

//---------------------------------//
//           GEOCODER
//---------------------------------//
function showAddress(address, zoom) {
    if (geocoder) {
        geocoder.getLatLng(address,
            function(point) {
                if (!point) {
                    alert(address + " not found");
                } else {
                    map.setCenter(point, zoom);
                    var marker = new GMarker(point);
                    map.addOverlay(marker);
                    //marker.openInfoWindowHtml("<b>"+address+"</b><br>Coordenadas:<br>Latitud : "+point.y+"<br>Longitud : "+point.x+"<a href=http://www.mundivideo.com/fotos_pano.htm?lat="+point.y+"&lon="+point.x+"&mapa=3 TARGET=fijo><br><br>Fotografias</a>");
                    // marker.openInfoWindowHtml("<b>Coordenadas:</b> "+point.y+","+point.x);
                   
                    document.getElementById('Coordenadas').value = point.y+","+point.x;
                //document.form1.coordenadas.value = 
                }
            }
            );
    }
}
//---------------------------------//
//     FIN DE GEOCODER
//---------------------------------//

//]]>
   
   if ($('#ubicacion').is (':visible')) {
       
      load();
       
   };
    



function posicion()
{
    direccion = $('#Direccion').val()
    showAddress(direccion, 15);
}

       
