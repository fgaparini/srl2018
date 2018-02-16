// Funciones Generales -->
$(function() {
   $('#formulario').hide();
  $('#openform').on("click", function()
  {
    $('#formulario').toggle();
  });

$("#enviar").on ("click", function () 
{
    base_url = $("input#baseurl").val();
    $('#enviar').ajaxStart(function() {
      $.mobile.showPageLoadingMsg(true);
    }).ajaxStop(function() {
      $.mobile.hidePageLoadingMsg(); 

    });

    // NOMBRE
    var name = $("input#name").val();
    if (name == "") {
      $("input#name").addClass("error");
      $("input#name").val("Falta su Nombre");
      $("input#name").focus();
      return false;
    }
    // FROM
    var from = $("input#from").val();
    if (from == "") {
      $("input#from").addClass("error");
      $("input#from").val("Falta dia Llegada");
      $("input#from").focus();
      return false;
    }
    // to
    var to = $("input#to").val();
    if (to == "") {
      $("input#to").addClass("error");
      $("input#to").val("Falta dia Salida");
      $("input#to").focus();
      return false;
    }
    // email
    var email = $("input#email").val();
    if (email == "") {
      $("input#email").addClass("error");
      $("input#email").val("Falta su Email");
      $("input#email").focus();
      return false;
    }
    // telefono
    var phone = $("input#telefono").val();
    if (phone == "") {
      $("input#telefono").addClass("error");
      $("input#telefono").val("Falta su Telefono");
      $("input#telefono").focus();
      return false;
    }
    // consulta
    var txt = $("textarea#consulta").val();
    if (txt == "") {
      $("textarea#consulta").addClass("error");
      $("textarea#consulta").focus();
      return false;
    }

    ides = $("input#id").val(); //ID EMPRESA O ALOJAMIENTO
    email_A = $("input#email_A").val(); // EMAIL EMPRESA ALOJAMIENTO
    tipo_ae = $("input#tipo_ae").val();
    name_ae = $("input#name_ae").val();


    var dataString = {
      name: name,
      from: from,
      to: to,
      email: email,
      telefono: phone,
      consulta: txt,
      id: ides,
      email_A: email_A,
      tipo_ae: tipo_ae,
      name_ae: name_ae
    };
    //alert (dataString);return false;

    $.ajax({
      type: "POST",
      url: base_url + 'website/ajaxs/envioemail/',
      data: dataString,
      success: function() {
        //       $('#form').hide();
        $('#formulario').html('<h2>Consulta Enviada</h2>');



      }
    });
  });

    $('#mapabuton').on("click",function() {
      
     
      if (navigator.geolocation) {  
 navigator.geolocation.getCurrentPosition(success, error,{maximumAge:60000, timeout: 4000});  
} else {  
 error('Su navegador no tiene soporte para su geolocalización');  
}  
    });
  });
var map;
var service;
var infowindow=new google.maps.InfoWindow();

var tipoicon="";
function success(position) {  
 // var status = document.querySelector('#status');  
 // status.innerHTML = "¡Le encontramos!";  
  

  


 var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);  
 var myOptions = {  
 zoom: 15,  
 center: latlng,  
 mapTypeControl: false,  
 navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},  
 mapTypeId: google.maps.MapTypeId.ROADMAP,

 };  
  map = new google.maps.Map(document.getElementById('map'), myOptions);  
  
 var marker = new google.maps.Marker({  
 position: latlng,  
 map: map,  
 icon: 'http://sanrafaellate.com.ar/iconos/estas-aqui.png',
 title:"Usted está aquí."  
 });  
var keymapa=$('#buscarmapa').val();
 var request = {
     location: latlng,
     radius: '50000',
     keyword: keymapa
  };

 if(keymapa!=""){
  service = new google.maps.places.PlacesService(map);
  service.search(request, callback);
  } else {}
}  
function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      var place = results[i];
      createMarker(results[i]);
    }
  }
}

function createMarker(place) {
  var placeLoc = place.geometry.location;
keymapa=$('#buscarmapa').val();
  switch (keymapa) {
    case 'bar': 
        tipoicon= 'http://sanrafaellate.com.ar/iconos/bar.png';
        break 
    case 'restaurant': 
        tipoicon= 'http://sanrafaellate.com.ar/iconos/restaurant.png';
        break 
    case 'hotel': 
        tipoicon= 'http://sanrafaellate.com.ar/iconos/hotel_map.png';
        break 
    case 'excursiones': 
         tipoicon= 'http://sanrafaellate.com.ar/iconos/excusion.png';
        break 
    case 'aventura': 
           tipoicon= 'http://sanrafaellate.com.ar/iconos/excusion.png';
                 break 
    case '':
        tipoicon="";
        break;
  }
    


  var marker = new google.maps.Marker({
    map: map,
    icon:tipoicon,
    position: place.geometry.location
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name+'<br>'+place.vicinity);
    infowindow.open(map, this);
  });

}

function error(msg) {  
 var status = document.getElementById('status');  
 status.innerHTML= "Error [" + error.code + "]: " + error.message;   
}  
  
if (navigator.geolocation) {
// keybusqueda="";  
 navigator.geolocation.getCurrentPosition(success, error,{maximumAge:60000, timeout: 4000});  
} else {  
 error('Su navegador no tiene soporte para su geolocalización');  
}  
