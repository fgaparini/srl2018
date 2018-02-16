

<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
<p></p>
  <h1><?php echo $infoprop['Titulo'] ?> - <?php echo $prop['ID_Propiedades'] ?> 
<?php if (isset($latitud)): ?>
  
   <div class="btn-group">
  <button type="button" class="btn btn-danger">Editar</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="<?php echo base_url().'propiedadessrl/adminroot/formprop/'.$prop['ID_Propiedades']  ?>">Info</a></li>
    <li><a href="<?php echo base_url().'propiedadessrl/adminroot/listarfotos/'.$prop['ID_Propiedades']  ?>">Fotos</a></li>
    <li><a href="<?php echo base_url().'propiedadessrl/adminroot/map_prop/'.$prop['ID_Propiedades']  ?>">Coordendas</a></li>

  </ul>
</div>
<?php endif ?>
</h1>
  <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-users"></i>Propiedad</li>
            </ol>
<p>
  <div class="row" >
   
    <div class="col-lg-10" id="main">

    <form name="form_mapa" method="POST" class="" enctype="multipart/form-data">
       <div class="col-lg-5"> 
        <h4>Obtenemos cordenadas Propiedad</h4>
      <div  class= "form-group" >
        <label  for= "Titulo Propiedad"  class= "" > Direccion </label>
        <div  class= "" >
          <input  type= "text"  class= "form-control"  name="direccion" id="direccion" value="<?php echo $direccion;?>" >
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
      <input type="text" id="id_infoprop" name="id_infoprop" value="<?php echo $infoprop['ID_InformacionProp'] ?>">
      <input type="text" id="id_prop" name="id_prop" value="<?php echo $prop['ID_Propiedades'] ?> ">

    </div>
    </div>
    </div>
      
    </form>

    <!-- MAPA  -->
</div>
<div class="col-lg-8">
    <div id="mapCanvas"></div>
<!-- fichaaa -->
<p> </p>
<div class="btn btn-primary" id="addcoord">Guardar</div>
</div>

</div>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
