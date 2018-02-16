

<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
<p></p>
<?php if (isset($latitud) && $latitud!=""){ ?>
    <h1><?php echo $infoprop['Titulo'] ?> - #<?php echo $prop['ID_Propiedades'] ?> 

<?php } else { ?>
<h1>Ubicar Propiedad : Ultimo Paso! 
<?php } ?>
<?php if (isset($latitud) && $latitud!=""): ?>
  
   <div class="btn-group">
  <button type="button" class="btn btn-danger ">Editar</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="<?php echo base_url().'propiedadessrl/adminuser/formprop/'.$prop['ID_Propiedades']  ?>">Info</a></li>
    <li><a href="<?php echo base_url().'propiedadessrl/adminuser/listarfotos/'.$prop['ID_Propiedades']  ?>">Fotos</a></li>
    <li><a href="<?php echo base_url().'propiedadessrl/adminuser/map_prop/'.$prop['ID_Propiedades']  ?>">Coordendas</a></li>

  </ul>
</div>
<?php endif ?>
</h1>
<?php if (!isset($latitud) && $latitud==""): ?>
<div class="progress  progress-striped barrapasos " style="height:35px; margin:15 0;">
  <div class="progress-bar progress-bar-success" style="width: 34%; padding:8px;">
    <span class=""><b>Paso 1 : Carga Datos</b></span>
  </div>
  <div class="progress-bar progress-bar-success" style="width: 33%; background-color:#;padding:8px;">
    <span class=""><b>Paso 2: Carga de Fotos</b></span>
  </div>
  <div class="progress-bar progress-bar-warning" id ="ubicar" style="width: 33%;padding:8px;"
    <span class="">Paso 3: Carga Ubicacion</span>
  </div>
</div>
<?php endif ?>

<p><strong>Obtenga la ubicaión exacta de la Propiedad.</strong></p>
<p>El sistema reconoce la direccion que coloco en la carga de la propiedad. Y la ubica en el mapa Si esta es CORRECTA presione guardar. En caso contratio siga los siguientes pasos:
<br>
1 - Puede obtener la ubicacion exacta de su propiedad colocando la dirrecion en el campo "direccion" y presionar "obtener". O Puede navegar por el mapa y hacer click sobre la ubicacion de la propiedad .
<br>
2- Una vez ubicada correctamete la propiedad presione "Guardar"
</p>
  <div class="row" >
   
    <div class="col-lg-10" id="main">

    <form name="form_mapa" method="POST" class="" enctype="multipart/form-data">
       <div class="col-lg-5 bg-warning"> 
        <h4>Obtenemos cordenadas Propiedad</h4>
      <div  class= "form-group" >
        <label  for= "Titulo Propiedad"  class= "" > Direccion </label>
        <div  class= "" >
          <input  type= "text"  class= "form-control"  name="direccion" id="direccion" value="<?php echo $direccion;?>" >
          <br>
          <button id="Bdireccion" class="btn btn-primary" onclick="codeAddress()">Obtener</button>
      
        </div>
        </div>
       
    </div>
       <div class="col-lg-5">
      <h4>Coordenadas Obenidas </h4>
      <div class="row">
      <div class="col-lg-5">
      <div  class= "form-group" >
        <label  for= "Titulo Propiedad"  class= "" > Latitud </label>
        <div  class= "" >
          <input  type= "text"  class= "form-control" readonly  name="latitud" id="latitud" value="<?php echo $latitud;?>" >
        </div>
      </div>
    </div>
    <div class="col-lg-5">
         <div  class= "form-group" >
        <label  for= "Titulo Propiedad"  class= "" > longitud </label>
        <div  class= "" >
          <input  type= "text"  readonly class= "form-control"  name="longitud" id="longitud" value="<?php echo $longitud;?>" >
        </div>
      </div>
      <input type="hidden" id="id_infoprop" name="id_infoprop" value="<?php echo $infoprop['ID_InformacionProp'] ?>">
      <input type="hidden" id="id_prop" name="id_prop" value="<?php echo $prop['ID_Propiedades'] ?> ">

    </div>
    </div>
    </div>
      
    </form>

    <!-- MAPA  -->
</div>
<br><br>
<div class="col-lg-8" style="margin:30px 0 0 0">
    <div id="mapCanvas" ></div>
<!-- fichaaa -->
<p> </p>
<div class="btn btn-primary" id="addcoord2">Guardar</div>
</div>

</div>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
