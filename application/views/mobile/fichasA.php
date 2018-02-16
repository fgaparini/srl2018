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
    <link type="text/css" href="<?php echo base_url() ?>css/datepikcerjqm.css" rel="stylesheet" />
    
    <!-- jQuery and jQuery Mobile -->
    <script src="<?php echo base_url() ?>js/jquery-ui/js/jquery-1.9.1.min.js"></script>
    
    <script src="<?php echo base_url() ?>mob-asset/jquery.mobile-1.3.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>mob-asset/jqm-datebox.core.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>mob-asset/jqm-datebox.mode.calbox.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>mob-asset/estilomobile.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/cssmbile.css">
        <script src="<?php echo base_url() ?>js/mobilejs.js"></script>

    <script>
    // $(document).ready(function() {
    //    var prevSelection = "tab1";
    //       $("#navbar ul li").on("click",function(){
    
    //           var newSelection = $(this).children("a").attr("data-tab-class");
    //           $("."+prevSelection).addClass("ui-screen-hidden");
    //           $("."+newSelection).removeClass("ui-screen-hidden");
    //           prevSelection = newSelection;
    //       });
    // });
    
    //   </script>
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
        <h1>   <?php echo ucwords($row_Al['TipoAlojamiento']." ".$row_Al['Nombre']) ?>
        
        </h1>   <a href="#mypanel" data-icon="bars">Menu</a>
      </div>
      <div data-role="content" style="padding: 0px" id="fichas">
        <!-- // PAGINAS  -->
        <h2><?php echo $row_Al['TipoAlojamiento']; ?> <?php echo $row_Al['Nombre']; ?></h2>
        <img src="<?php echo base_url() . "upload/alojamientos/thumb/" . $row_Al['ID_Alojamiento'] . "_1_p.jpg"; ?>" alt="<?php echo $row_Al['TipoAlojamiento']; ?> <?php echo $row_Al['Nombre']; ?> en SAn Rafael">
        <div data-role="collapsible-set" data-theme="b" data-content-theme="b"  data-corners="false" style="">
         
        <div data-role="collapsible" >
            <h3>Contactenos</h3>
          <form id="fromA">
            <h3>Enviar Consulta</h3>
            <label for="text-basic">Nombre y Apellido:</label>
            <input type="text" name="name" id="name" value="">
            <label for="llegada">Llegada:</label><input type="date" name="from" id="from" class="" placeholder="Ej: 10/01/2014" data-role="datebox"  data-options='{"mode": "calbox"}'/> 
            <label for="Salida">salida:</label><input type="date" name="to" id="to" data-role="datebox" placeholder="Ej: 17/01/2014"  data-options='{"mode": "calbox"}'/> 
            <label for="email">Email:</label><input type="email" name="email" placeholder="Su email Aqui" id="email" /> 
            <label for="telefono">Telefono:</label><input type="text" name="telefono" id="telefono" placeholder="Su telefono Aqui"/> 
            <label for="consulta">Consulta:</label><textarea name="consulta" id="consulta" cols="20" rows="6" id="consulta" placeholder="Agregue su consulta"></textarea>
            <button id="enviar">Enviar!</button>
            <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url() ?>"/> 
          </form>
        </div>
      </div>
       
        <div data-role="collapsible-set" data-theme="c" data-content-theme="d" data-mini="true" data-corners="false" style="margin:10px 5px;">
          <div data-role="collapsible" data-collapsed="false">
            <h3>Descripción</h3>
            <p><?php echo $row_Al['Descripcion'] ?></p>
          </div>
          <div data-role="collapsible">
            <h3>Servicios</h3>
            <p><?php foreach ($row_S as $var) { ?>
            <img src="<?php echo  base_url()."iconos/yes.png" ?>" style="padding:5px " alt=" Servicios <?php echo $row_Al['Nombre'] ." - ".$var['Servicio'] ;?>"><?php echo $var['Servicio'] ?>
            <?php } ?></p>
          </div>
          <div data-role="collapsible">
            <h3>Ubicación</h3>
            <p><img src="http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $row_Al['Coordenadas']; ?>&zoom=12&&markers=color:blue%7Clabel:S%7C<?php echo $row_Al['Coordenadas']; ?>&size=270x200&scale=1&sensor=false" alt="">
            </p>
          </div>
        </div>
        
        <!-- <div data-role="navbar" id="navbar" style="margin:15px 0 0 0;">
          <ul>
            <li><a href="#" class="ui-btn-active" data-tab-class="tab1">Descripcion</a></li>
            <li><a href="#" data-tab-class="tab2">Serivicios</a></li>
            
          </ul>
        </div>
        <div class="tab-content">
          <div class="tab1">
            Tab1
          </div>
          <div class="tab2 ui-screen-hidden">
            Tab2
          </div>
          
        </div>
        -->
      </div>
      <?php $this->load->view("mobile/footer") ?>
    </div>
    
  </body>
</html>