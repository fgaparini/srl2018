<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
  <h1><span class="fa fa-plus fa-1x"></span> Nueva Propiedad</h1>
  <div class="progress  progress-striped barrapasos " style="height:35px; margin:15 0;">
  <div class="progress-bar progress-bar-success" style="width: 34%; padding:8px; ">
    <span class=""><b>Paso 1 : Carga Datos</b></span>
  </div>
  <div class="progress-bar progress-striped active" style="width: 33%; background-color:#979A9F;padding:8px">
    <span class="">Paso 2: Carga de Fotos</span>
  </div>
  <div class="progress-bar progress-bar-danger" style="width: 33%; background-color:#979A9F;padding:8px; "
    <span class="">Paso 3: Carga Ubicacion</span>
  </div>
</div>

  <div class="row"> <form  class= "form-horizontal"  role= "form" action="<?php echo base_url() ?>propiedadessrl/adminuser/save" method="post" >
    <div class="col-lg-5">
       <h3 style="color:">Informacion Propiedad  <hr></h3>
     
      <div  class= "form-group" >
        <label  for= "Titulo Propiedad"  class= "" > Titulo <small style="color:#C4C6BB">(Nombre  a publicar)</small> </label>
        <div  class= "" >
          <input  type= "text"  class= "form-control"  id= "titulo" name="titulo" placeholder= "titulo" >
        </div>
      </div>
      <div  class= "form-group" >
        <label  for= "Descripcion"  class= "" > Descripcion <small style="color:#C4C6BB">(Describa la Propiedad y Entorno)</small></label>
        <div  class= "" >
          <textarea    class= "form-control"  id= "descripcion" name="descripcion"   rows="5" placeholder= "Descripcion" >
          </textarea>
        </div>
      </div>
      <div  class= "form-group" >
        <label  for= "direccion"  class= "" > Direccion <small>(sin abreviar Nombres)</small></label>
        <div  class= "" >
          <input  type= "text"  class= "form-control"  id= "direccion" name="direccion"  placeholder= "Direccion" >
        </div>
      </div>
      <div  class= "form-group" >
        <label  for= "telefono"  class= "" > Telefono <small style="color:#C4C6BB">(Donde lo contactarán)</small></label>
        <div  class= "" >
          <input  type= "text"  class= "form-control"  id= "telefono"  name="telefono" placeholder= "telefono" >
        </div>
      </div>
      <hr>
      <div  class= "form-group" >
        <div class="col-lg-6">
          <label  for= "tipoprop"  class= "" > Tipo Propiedad </label>
          <div  class= "" >
            <select name="tipoprop" id="tipoprop" class="form-control">
              <?php foreach ($TipoProp as $var): ?>
              <option value="<?php echo $var['ID_Tipo'] ?>"> <?php echo $var['TipoPropiedades'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
      </div>
      <hr>    <h3 >Operación</h3>
       <div  class= "form-group" >
  
      <div class="checkbox-inline">
        <label>
          <input type="radio" id="operacion" name="operacion" value="venta"> Venta
        </label>
      </div>
      <div class="checkbox-inline">
        <label>
          <input type="radio" id="operacion" name="operacion" value="alquiler"> Alquiler
        </label>
      </div>
      <div class="checkbox-inline">
        <label>
          <input type="radio" id="operacion" name="operacion" value="alquiler temporario"> Alquiler Temporario
        </label>
      </div>
    </div>
      <hr>
   
      
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-5">
      <h3>Caracteristicas Propiedad <hr></h3>
      <div  class= "form-group" >
        <div class="col-lg-6">
          <label  for= "superficie"  class= "" > Superficie m2</label>
          <div  class= "" >
            <input  type= "text"  class= "form-control" name="superficie" id= "superficie"  placeholder= "Superficie Total" >
          </div>
        </div>
        <div class="col-lg-6">
          <label  for= "superficiecub"  class= "" > Superficie Cubierta m2</label>
          <div  class= "" >
            <input  type= "text"  class=" small form-control"  id="superficiecub"  name="superficiecub" placeholder= "Superficie cubierta" >
          </div>
        </div>
      </div>
            <div  class= "form-group" >

      <div class="checkbox-inline">
        <label>
          <input type="checkbox" id="Garage" name="Garage" value="1"> Garage
        </label>
      </div>
      <div class="checkbox-inline">
        <label>
          <input type="checkbox" id="electricidad" name="electricidad"  value="1"> Electricidad
        </label>
      </div>
      <div class="checkbox-inline">
        <label>
          <input type="checkbox" id="cloacas" name="gas"  value="1"> Gas
        </label>
      </div>
      <div class="checkbox-inline">
        <label>
          <input type="checkbox" id="clocas" name="cloacas"  value="1"> Cloacas
        </label>
      </div>
      </div>
      <div  class= "form-group" >
        <div class="col-lg-4">
          <label  for= "Habitaciones"  class= "" > Habitaciones </label>
          <div  class= "" >
            <select name="habitaciones" id="habitaciones" class="form-control">
              <?php for ($i=0; $i <= 10 ; $i++) {
              echo ' <option value="'.$i.'">'.$i.'</option>';
              } ?>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <label  for= "banos"  class= "" > Baños </label>
          <div  class= "" >
            <select name="banos" id="banos" class="form-control">
              <?php for ($i=0; $i <= 10 ; $i++) {
              echo ' <option value="'.$i.'">'.$i.'</option>';
              } ?>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <label  for= "ambientes"  class= "" > Ambientes </label>
          <div  class= "" >
            <select name="ambientes" id="ambientes" class="form-control">
              <?php for ($i=0; $i <= 10 ; $i++) {
              echo ' <option value="'.$i.'">'.$i.'</option>';
              } ?>
            </select>
          </div>
        </div>
      </div>
      <div  class= "form-group" >
        <div class="col-lg-6">
          <label  for= "hectareas"  class= "" > Hectareas ha <small style="color:#C4C6BB">(solo para fincas,  etc)</small></label>
          <div  class= "" >
            <input  type= "text"  class= "form-control"  id= "hectarea" name="hectareas" placeholder= "Hectareas" >
          </div>
        </div>
        <div class="col-lg-6">
          <label  for= "ambientes"  class= "" >Antiguedad </label>
          <div  class= "" >
            <select name="antiguedad" id="Antiguedad" class="form-control">
              <?php for ($i=0; $i <= 10 ; $i++) {
              $e=$i*5;
              if($e<50){
              if ($e==0){
              echo ' <option value="'.$e.'">a Estrenar</option>';
              } else {
              echo ' <option value="'.$e.'">'.$e.' años</option>';
              }
              } else { echo ' <option value="'.$e.'"> > '.$e.' años</option>';}
              } ?>
            </select>
          </div>
        </div>
      </div>
      <div  class= "form-group" >
        <div class="col-lg-6">
          <label  for= "distrito"  class= "" >Ciudad/Distrito </label>
          <div  class= "" >
            <select name="distrito" id="distrito" class="form-control">
              <?php foreach ($Distrito as $var): ?>
              <option value="<?php echo $var['ID_Distritos'] ?>"> <?php echo $var['Distrito'] ?> - San Rafael</option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-lg-6">
          
        </div>
      </div>
        
      <div  class= "form-group bg-success" style="padding:3px 5px 15px 5px; " >
         <h3 >Valor Propiedad </h3>
        <div class="col-lg-6">
          <label  for= "precio"  class= "" > Precio</label>
          <div  class= "" >
            <input  type= "text"  class= "form-control" name="precio" id= "precio"  placeholder= "EJ: 1000" >
          </div>
        </div>
        <div class="col-lg-6">
          <label  for= "ambientes"  class= "" >Moneda </label>
          <div  class= "" >
            <select name="moneda" id="modenda" class="form-control">
              <option value="pesos">Peso</option>
              <option value="dolar">Dolar</option>
            </select>
          </div>
        </div>
      </div>
      <div  class= "form-group" style="margin-top:50px;" >
        <?php 
        if ($PlanUser['CantidadProp']<=$TotalProp) {
          $disable='disabled="disabled"';
        } else 
        {
          $disable="";
        }

         ?>
        <button class="btn btn-primary btn-lg  pull-rigth " <?php echo $disable ?> tyoe="submit" id="newprop">Crear Propiedad!</button>
        <input type="hidden" id="baseurl" value="<?php echo base_url() ?>">
        <input type="hidden" id="accion" name="accion" value="new">
        <input type="hidden" name="searchusuario" value="1">
        <input type="hidden" name="iduser" value="<?php echo $user['ID_Usuarios'] ?>">
        <br><p></p>
       <?php   if ($PlanUser['CantidadProp']<=$TotalProp) { ?>
       <div class="alert alert-danger">Ud llego al limite de propiedades de su Plan. ¿Quiere agregar Mas Propiedades?.<b> <a href="#" class="alert-link">Cambie de Plan >></a></b></div>
       <?php }   ?>

      </div>
    </div>
  </form>
</div>
  </div><!-- /.row -->
  </div><!-- /#page-wrapper -->