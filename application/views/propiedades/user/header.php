<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - SB Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>propiedades-asset/admin/css/bootstrap.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>propiedades-asset/admin/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?php echo base_url() ?>propiedades-asset/admin/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>propiedades-asset/admin/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>js/jquery-ui/development-bundle/themes/ui-lightness/jquery-ui.css">

    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

    <?php if (isset($addfoto) OR  $body=="listar_fotos"  )  {      ?>

    <!-- DROPZONE AGREGAR FOTOS -->
      <!-- 1 -->
      <link href="<?php echo base_url() ?>propiedades-asset/dropzone/css/dropzone.css" type="text/css" rel="stylesheet" />
       
      <!-- 2 -->
  <?php    } ?>

     <?php if (isset($mapa_coord)): ?>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  
    <script type="text/javascript">
    
// VARIABLES GLOBALES JAVASCRIPT
var geocoder;
var marker;
var latLng;
var latLng2;
var map;

// INICiALIZACION DE MAPA
function initialize() {
  geocoder = new google.maps.Geocoder();    
  latLng = new google.maps.LatLng(document.form_mapa.latitud.value ,document.form_mapa.longitud.value);
  map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom:17,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.HYBRID
  });


// CREACION DEL MARCADOR  
    marker = new google.maps.Marker({
    position: latLng,
    title: 'Arrastra el marcador si quieres moverlo',
    map: map,
    draggable: true
  });
 
 

 
// Escucho el CLICK sobre el mama y si se produce actualizo la posicion del marcador 
     google.maps.event.addListener(map, 'click', function(event) {
     updateMarker(event.latLng);
   });
  
  // Inicializo los datos del marcador
  //    updateMarkerPosition(latLng);
     
      geocodePosition(latLng);
 
  // Permito los eventos drag/drop sobre el marcador
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Arrastrando...');
  });
 
  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Arrastrando...');
    updateMarkerPosition(marker.getPosition());
  });
 
  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Arrastre finalizado');
    geocodePosition(marker.getPosition());
  });
  

 
}


// Permito la gesti¢n de los eventos DOM
google.maps.event.addDomListener(window, 'load', initialize);

// ESTA FUNCION OBTIENE LA DIRECCION A PARTIR DE LAS COORDENADAS POS
function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('No puedo encontrar esta direccion.');
    }
  });
}

// OBTIENE LA DIRECCION A PARTIR DEL LAT y LON DEL FORMULARIO
function codeLatLon() { 
      str= document.form_mapa.longitud.value+" , "+document.form_mapa.latitud.value;
      latLng2 = new google.maps.LatLng(document.form_mapa.latitud.value ,document.form_mapa.longitud.value);
      marker.setPosition(latLng2);
      map.setCenter(latLng2);
      geocodePosition (latLng2);
      // document.form_mapa.direccion.value = str+" OK";
}
function codeLatLon2(coordenadas) { 
      latLng2 = new google.maps.LatLng(coordenadas);
      marker.setPosition(latLng2);
      map.setCenter(latLng2);
      geocodePosition (latLng2);
      // document.form_mapa.direccion.value = str+" OK";
}

// OBTIENE LAS COORDENADAS DESDE lA DIRECCION EN LA CAJA DEL FORMULARIO
function codeAddress() {
        var address = document.form_mapa.direccion.value;
          geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
             updateMarkerPosition(results[0].geometry.location);
             marker.setPosition(results[0].geometry.location);
             map.setCenter(results[0].geometry.location);

           } else {
            alert('ERROR : ' + status);
          }
        });
      }

// OBTIENE LAS COORDENADAS DESDE lA DIRECCION EN LA CAJA DEL FORMULARIO
function codeAddress2 (address) {
          
          geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
             updateMarkerPosition(results[0].geometry.location);
             marker.setPosition(results[0].geometry.location);
             map.setCenter(results[0].geometry.location);
             document.form_mapa.direccion.value = address;
           
              document.form_mapa.latitud.value =results[0].geometry.location.lat();
              document.form_mapa.longitud.value= results[0].geometry.location.lng();
           } else {
            alert('ERROR : ' + status);
          }
        });
      }
function hola(srr) {
alert(srr);
}
function updateMarkerStatus(str) {
  document.form_mapa.direccion.value = str;
}

// RECUPERO LOS DATOS LON LAT Y DIRECCION Y LOS PONGO EN EL FORMULARIO
function updateMarkerPosition (latLng) {
  document.form_mapa.longitud.value =latLng.lng();
  document.form_mapa.latitud.value = latLng.lat();
}

function updateMarkerAddress(str) {
  document.form_mapa.direccion.value = str;
}

// ACTUALIZO LA POSICION DEL MARCADOR
function updateMarker(location) {
        marker.setPosition(location);
        updateMarkerPosition(location);
        geocodePosition(location);
      }




</script>
       <?php endif ?>   
       <?php if (isset($propiedad)): ?>
          <?php echo $map['js']; ?>
        <?php endif ?> 
  </head>

     <?php if (isset($mapa_coord)) { ?>
<body  <?php  if ($direccion != "" && $coordenadas == "") { ?>
 onload=" codeAddress2('<?php  echo $direccion; ?>')" 
 <?php  } ?>
  <?php  if ($coordenadas != "" && $direccion == "") { ?> 
  onload=" codeLatLon2(<?php  echo $coordenadas; ?>)" 
  <?php  } ?> 
  <?php  if ($coordenadas != "" && $direccion != "") { ?> 
  onload=" codeLatLon2(<?php  echo $coordenadas2; ?>) ?>')"
  <?php } ?>
  >
   <?php } else { ?>  
  <body>
     <?php } ?>
    <div id="wrapper">
      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url() ?>propiedadessrl/adminuser">                <span  class="fa fa-home fa-1x"></span> Prop SRL ADmin
</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <?php if (!isset($page) OR $page==""){$page="nada";}  ?>
       
            <li <?php if ($page=="home") { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>propiedadessrl/adminuser"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li <?php if ($page=="propiedades") { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>propiedadessrl/adminuser/propiedades"><i class="fa fa-home"></i> Mis Porpiedades</a></li>
            <li class="boton" <?php if ($page=="nueva_prop") { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>propiedadessrl/adminuser/formprop" Style="color:#6BC970"><i class="fa fa-plus"></i> <strong>Nueva Propiedad</strong></a></li>
           
          </ul>
          
          <ul class="nav navbar-nav navbar-right navbar-user">
                 <li >
           
            </li>
         
       
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i> <?php echo $user['Usuario'] ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>propiedadessrl/adminuser/perfil"><i class="fa fa-user"></i> Perfil</a></li>
                <!-- <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li> -->
                <li class="divider"></li>
                <li><a href="<?php echo base_url() ?>propiedadessrl/login_user/salir"><i class="fa fa-power-off"></i> Log Out</a></li>

              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>