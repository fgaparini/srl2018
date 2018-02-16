<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
  <h1>NUEVA PROPIEDAD</h1>
  <div class="row"> <form  class= "form-horizontal"  role= "form" action="<?php echo base_url() ?>propiedadessrl/adminroot/save" method="post" >
    <div class="col-lg-5">
      
      <div  class= "form-group" >
        <label  for= "Titulo Propiedad"  class= "" > Titulo </label>
        <div  class= "" >
          <input  type= "text"  class= "form-control"  id= "titulo" name="titulo" placeholder= "titulo" >
        </div>
      </div>
      <div  class= "form-group" >
        <label  for= "Descripcion"  class= "" > Descripcion </label>
        <div  class= "" >
          <textarea    class= "form-control"  id= "descripcion" name="descripcion"   rows="5" placeholder= "Descripcion" >
          </textarea>
        </div>
      </div>
      <div  class= "form-group" >
        <label  for= "direccion"  class= "" > Direccion </label>
        <div  class= "" >
          <input  type= "text"  class= "form-control"  id= "direccion" name="direccion"  placeholder= "Direccion" >
        </div>
      </div>
      <div  class= "form-group" >
        <label  for= "telefono"  class= "" > Telefono </label>
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
      <hr>
      <h3 >Operación</h3>
      <div class="checkbox-inline">
        <label>
          <input type="radio" id="operacion" name="operacion" value="venta"> venta
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
      <hr>
      <h3 >Valor Propiedad </h3>
      <div  class= "form-group bg-success" >
        <div class="col-lg-6">
          <label  for= "hectareas"  class= "" > Precio</label>
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
      
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-5">
      <h3>Caracteristicas Propiedad</h3>
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
          <label  for= "hectareas"  class= "" > Hectareas ha (solo para fincas,  etc)</label>
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
      <hr>
      <h2>Usuario</h2>
      <div class="checkbox-inline">
        <label>
          <input type="checkbox" id="ADDusuario" name="ADDusuario"  value="1"> Agregar Usuario
        </label>
      </div>
      <Div id="usuario" class="row">
        <div class="form-group">
          <label  for= "usuario"  class= "" > Usuario </label>
          <div  class= "" >
            <input  type= "text"  class= "form-control"  id= "username"  name="username" placeholder= "Nombre Usuario" >
          </div>
        </div>
        <div class="form-group">
          <label  for= "pass"  class= "" > Password </label>
          <div  class= "" >
            <input  type= "password"  class= "form-control"  id= "pass" name="pass" placeholder= "password" >
          </div>
        </div>
        <div class="form-group">
          <label  for= "useremail"  class= "" > Email </label>
          <div  class= "" >
            <input  type= "email"  class= "form-control"  id= "useremail" name="useremail" placeholder= "Email" >
          </div>
        </div>
        <div class="form-group">
          <label  for= "usertelefono"  class= "" > Telefono </label>
          <div  class= "" >
            <input  type= "phone"  class= "form-control"  id= "usertelefono" name="usertelefono"  placeholder= "Telefono" >
          </div>
        </div>
        <div class="form-group">
          <label  for= "userdireccion"  class= "" > Direccion </label>
          <div  class= "" >
            <input  type= "text"  class= "form-control"  id= "userdireccion" name="userdireccion"  placeholder= "direccion" >
          </div>
        </div>
        <div class="form-group">
          <label  for= "uservendedor"  class= "" > Vendedor </label>
          <div  class= "" >
            <input  type= "text"  class= "form-control"  id= "uservendedor" name="uservendedor"  placeholder= "Nombre Vendedor" >
          </div>
        </div>
        
        <div class="form-group">
          <label  for= "distrito"  class= "" >Plan Usuario </label>
          <div  class= "" >
            <select name="planuser" id="planuser" class="form-control">
              <?php foreach ($PlanUser as $var): ?>
              <option value="<?php echo $var['ID_PlanU'] ?>"> <?php echo $var['NombrePlan'] ?> </option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
         <div class="checkbox-inline">
        <label>
          <input type="radio" id="particular" name="particular" value="1"> Particular
        </label>
      </div>
      <div class="checkbox-inline">
        <label>
          <input type="radio" id="particular" name="particular" value="0"> Agente
        </label>
      </div>
      </Div>
      <div class="checkbox-inline">
        <label>
          <input type="checkbox" id="searchusuario" name="searchusuario" name=""  value="1"> Buscar Usuario
        </label>
      </div>
      <div id="buscaruser">
        <div class="form-group">
          <label  for= "busquedause2r"  class= "" > buscar Usuario </label>
          <div  class= "" >
            <input  type= "text"  class= "form-control"  id="busquedauser"  >
            <input type="hidden" id="iduser" name="iduser" value="">
          </div>
        </div>
      </div>
      <div  class= "form-group" style="margin-top:50px;" >
        <button class="btn btn-primary rigth" tyoe="submit" id="newprop">Crear Propiedad!</button>
        <input type="hidden" id="baseurl" value="<?php echo base_url() ?>">
        <input type="hidden" id="accion" name="accion" value="new">
      </div>
    </div>
  </form>
</div>
  </div><!-- /.row -->
  </div><!-- /#page-wrapper -->