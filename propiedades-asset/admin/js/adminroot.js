$(document).ready( function()
{

     
                // var mockFile = { name: "1_2.jpg", size: 12345 };
                //  var mydropzone = new Dropzone("#dropzone2");
                // mydropzone.options.addedfile.call(mydropzone, mockFile);
 
                // mydropzone.options.thumbnail.call(mydropzone, mockFile, "http://localhost/late/upload/propiedades/1_2.jpg");
                 


var baseurl=$('#baseurl').val();
$("table").tablesorter();//orden de tablas
$('#usuario').hide();
$('#buscaruser').hide();
//OCULTAR Y MOSTRAR BUSCAR USUARIOS
$('#searchusuario').click( function() 
{
$('#buscaruser').toggle();

});
// MOSTRAR Y OCULTAR AGREGAR USUARIO
$('#ADDusuario').click( function() 
{
$('#usuario').toggle();
});
//OCULTAR  DIV FORMULARIO PROPIEDAD
$('#addcoord').click(function() {
     /* Act on the event */
// base_url = $('#base_url').val();
rel=$(this).attr('rel')
$('#addcoord').ajaxStart(function() {
                      $(this).html('<span class="fa fa-refresh fa-spin"></span> enviando ');
                    }).ajaxStop(function() {
                      // $(this).html('Enviar');
                    });

latitud= $('#latitud').val();
longitud= $('#longitud').val();
coordenadas = latitud+","+longitud;
id_infoprop = $('#id_infoprop').val();
id_prop = $('#id_prop').val();
                  $.ajax({
                  type: 'POST',
                  url: baseurl + 'propiedadessrl/adminroot/map_guardar',
                  data: "coordenadas="+coordenadas+"&id_infoprop="+id_infoprop,
                  success: function(data)
                  {
window.location=baseurl+"propiedadessrl/adminroot/propiedad/"+id_prop;
             
                  }
                  
                  });

   });




// OBTENCION DE COORDENADAS DE USUARIO--------------------------------------------------------------------->>>>>>>>>
$('#addcoord2').click(function() {
     /* Act on the event */
// base_url = $('#base_url').val();
$('#addcoord2').ajaxStart(function() {
                      $(this).html('<span class="fa fa-refresh fa-spin"></span> enviando ');
                    }).ajaxStop(function() {
                      // $(this).html('Enviar');
                    });

latitud= $('#latitud').val();
longitud= $('#longitud').val();
coordenadas = latitud+","+longitud;
id_infoprop = $('#id_infoprop').val();
id_prop = $('#id_prop').val();
                  $.ajax({
                  type: 'POST',
                  url: baseurl + 'propiedadessrl/adminroot/map_guardar',
                  data: "coordenadas="+coordenadas+"&id_infoprop="+id_infoprop,
                  success: function(data)
                  {

$('#page-wrapper .row').append('<div class="col-lg-8"><a href="'+baseurl + 'propiedadessrl/adminroot/propiedad/'+id_prop+'" class="btn btn-success">Terminar Carga</a></div>')  ;              
$(".progress div#ubicar").removeClass('progress-bar-warning');
$(".progress div#ubicar").addClass('progress-bar-success');

window.location=baseurl+"propiedadessrl/adminuser/propiedad/"+id_prop;
                                                  
                  }
                  
                  });

   });
//CAMBIAR ESTADO PROPIEDAD 

$('.delprop').on('click',function(event) {
   // Act on the event 
   id_prop = $(this).attr("data-id");
   page =  $(this).attr("data-page");
  confirm("Desea Eliminar Propiedad?-"+id_prop);


   $.ajax({
                  type: 'POST',
                  url: baseurl + 'propiedadessrl/adminroot/activar_desactivar_prop',
                  data: "idprop:"+id_prop,
                  success: function(data)
                  {
// window.location=baseurl+"propiedadessrl/adminuser/"+page;
             
                  }
                  
                  });
                  
                
});
$('a#eliminar').click(function(event){
  var id=$(this).attr('rel');
  var db = $(this).attr('role');
  if(db==="tipoprop")
  {
    urlajax=baseurl+'propiedadessrl/adminroot/abm_tipoprop/'+id;
    textdialogo = '<div id="dialog" title="Eliminar Tipo Prop"><h3>Confirmar Eliminar propiedad</h3><div>Tipo de Propiedad : '+id+'</div></div>';
  }
  if(db==="usuarios")
  {
    urlajax=baseurl+'propiedadessrl/adminroot/abm_usuarios/'+id;
    textdialogo = '<div id="dialog" title="Eliminar Usuarios"><h3>Confirmar Eliminar Usuario</h3><div>Usuario ID: '+id+'</div></div>';
  }

if(db==="fotos")
  {
    urlajax=baseurl+'propiedadessrl/adminroot/abm_usuarios/'+id;
    textdialogo = '<div id="dialog" title="Eliminar Fotos"><h3>Quiere eliminar esta Foto?</h3><div>Foto Num: '+id+'</div></div>';
  }



 $(textdialogo).appendTo('body');     
  event.preventDefault();

    $("#dialog").dialog({         
      // width: 600,
      modal: true,

      buttons : {
     
        "Confirm" : function() {
                        $.ajax({
                        type: "POST",
                        
                        url:urlajax,
                        data: 'accion=delete',
                        success: function(data) {
                        
                        window.location.reload(true);
                        }
                        });       
        },
        "Cancel" : function() {
          $(this).dialog("close");
        }
      }
      });
    }); //close click

 
        
// BUSCADOR DE USUARIOS
$("#busquedauser").autocomplete({
	
        source: baseurl+"propiedadessrl/adminroot/ajaxuser",
        minLength: 2,

        focus: function( event, ui ) {
          $('#busquedauser').val(ui.item.Usuario);
        return false;
      },
        select: function(event, ui) {
          $('#iduser').val(ui.item.ID_Usuarios);
          $('#busquedauser').val(ui.item.Usuario);
          return false;
        }
    }).data("ui-autocomplete")._renderItem=function(ul,item) {
      return $("<li>").append("<a>" + item.Usuario + "</a>").appendTo(ul);
    };
});