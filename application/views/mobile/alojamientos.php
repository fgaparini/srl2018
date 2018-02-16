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
 
  
  <!-- jQuery and jQuery Mobile -->
  <script src="<?php echo base_url() ?>js/jquery-ui/js/jquery-1.9.1.min.js"></script>
  <script src="<?php echo base_url() ?>mob-asset/jquery.mobile-1.3.2.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url() ?>mob-asset/estilomobile.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>css/cssmbile.css">
  
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
   <div data-role="header" style="padding: 0px">
     <a href="#" data-icon="back" data-rel="back">Volver</a>
    <h1>   <?php echo $titulo_p; ?>
    
</h1>   <a href="#mypanel" data-icon="bars">Menu</a>
     </div>
  <div data-role="content" style="padding: 0px">
    
    
    <!-- ACORDION HOME -->
    <ul data-role="listview" data-inset="false" data-theme="e" id="destaalojar">
          <?php foreach ($rowD as $var): ?>
          <li><a href="<?php echo base_url().'m/alojamiento/'.$var['Url'] ?>" > 
            <img src="<?php echo base_url() . "upload/alojamientos/thumb/" . $var['ID_Alojamiento'] . "_1.jpg"; ?>" alt="<?php echo $titulo_p; ?> en SAn Rafael">
            <h2><?php echo $var['Nombre'] ?></h2>
            <p><?php echo  acortar($var['Descripcion'],100); ?> ...</p>
            </a>
          </li>     
          <?php endforeach ?>
        </ul>
        <ul data-role="listview" data-inset="false" id="listadoalojar">
          <?php foreach ($rowL as $var): ?>
          <li><?php if ($var['Basico']=="0"): ?>
            <a href="<?php echo base_url().'m/alojamiento/'.$var['Url'] ?>" >
             <img src="<?php echo base_url() . "upload/alojamientos/thumb/" . $var['ID_Alojamiento'] . "_1.jpg"; ?>" alt="<?php echo $titulo_p; ?> en SAn Rafael">
          <?php endif ?>
            
            <h2><?php echo $var['Nombre'] ?></h2>
            <p><?php echo  acortar($var['Descripcion'],100); ?> ...</p>
            </a>
          </li>     
          <?php endforeach ?>
        </ul>
     
    
  </div>
   <?php $this->load->view("mobile/footer") ?>
</div>  
   
</body>
</html>
