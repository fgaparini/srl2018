<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1>Usuarios</h1>
  <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-users"></i> Usuarios</li>
            </ol>
<form action="">
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
       <button class="btn btn-primary rigth" tyoe="submit" id="new">Agregar</button>
        <input type="hidden" id="baseurl" value="<?php echo base_url() ?>">
        <input type="hidden" id="accion" name="accion" value="new">
</form>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
