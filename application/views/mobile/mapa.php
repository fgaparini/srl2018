<html lang="es-ES">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta http-equiv="X-UA-Compatible" content="IE=9" >

  <title><?php echo $title ?></title>
  <meta name="description" content="<?php echo $descripcion ?>">
  
  
  <link rel="stylesheet" href="<?php echo base_url() ?>mob-asset/jquery.mobile-1.3.2.min.css">
 
  <script src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>
  <!-- jQuery and jQuery Mobile -->
  <script src="<?php echo base_url() ?>js/jquery-ui/js/jquery-1.9.1.min.js"></script>
  <script src="<?php echo base_url() ?>mob-asset/jquery.mobile-1.3.2.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url() ?>mob-asset/estilomobile.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>css/cssmbile.css">
          <script src="<?php echo base_url() ?>js/mobilejs.js"></script>
</head>
<body >
<?php
// funcion acotar palabras
function acortar($texto,$maxword) {
$acortada= substr(strip_tags($texto),0,strrpos(substr(strip_tags($texto),0,$maxword)," "));
return $acortada;
}
?>
  <!-- PAGINA HOME -->
<div data-role="page" data-control-title="" class="" id="" >
   <?php $this->load->view('mobile/panel'); ?>
  <!-- /panel -->
   <div data-role="header" style="padding: 0px">
     <a href="#" data-icon="back" data-rel="back">Volver</a>
    <h1>   Mapa
    
</h1>   <a href="#mypanel" data-icon="bars">Menu</a>
     </div>
  <div data-role="content" style="padding: 5px">
    <div id="content_map">
      <input type="text" Placeholder="Ej:, Bar, gomeria, etc" id="buscarmapa"><button id="mapabuton">Mostrar</button>
          <!-- // PAGINAS  -->
      <p id="status">Buscando su localización...</p>  
      <div id="map"></div>
  </div>  
  </div>

  <?php $this->load->view("mobile/footer") ?>
</div>  
   
</body>
</html>
