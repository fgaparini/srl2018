<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1><span class="fa fa-user fa-1x"></span> Mi Perfil</h1>
  <ol class="breadcrumb">
              <li><a href="<?php echo base_url() ?>propiedadessrl/adminuser"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-user"></i> Mi Perfil : <?php echo $user['Usuario'] ?></li>
            </ol>
            <div class="col-lg-7">
<form action="<?php echo base_url() ?>propiedadessrl/adminroot/abm_usuarios" method="post">
        <div class="form-group">
          <label  for= "usuario"  class= "" > Usuario </label>
          <div  class= "input-group margin-bottom-sm" >
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>

            <input  type= "text"  class= "form-control"  id= "username"  name="username" value="<?php echo $usuarios['Usuario'] ?>" >
          </div>
        </div>
        <div class="form-group">
          <label  for= "pass"  class= "" > Password </label>
          <div  class= "input-group margin-bottom-sm" >
                          <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>

            <input  type= "password"  class= "form-control"  id= "pass" name="pass" value="<?php echo $usuarios['Password'] ?>" >
          </div>
        </div>
        <div class="form-group">
          <label  for= "useremail"  class= "" > Email </label>
          <div  class= "input-group margin-bottom-sm" >
              <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>

            <input  type= "email"  class= "form-control"  id= "useremail" name="useremail" value="<?php echo $usuarios['Email'] ?>" >
          </div>




        </div>
        <div class="form-group">
          <label  for= "usertelefono"  class= "" > Telefono </label>
         <div  class= "input-group margin-bottom-sm" >
                        <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>

              <input  type= "phone"  class= "form-control"  id= "usertelefono" name="usertelefono"  value="<?php echo $usuarios['Telefono'] ?>" >
          </div>
        </div>
        <div class="form-group">
          <label  for= "userdireccion"  class= "" > Direccion </label>
               <div  class= "input-group margin-bottom-sm" >
                        <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
            <input  type= "text"  class= "form-control"  id= "userdireccion" name="userdireccion"  value="<?php echo $usuarios['Direccion'] ?>" >
          </div>
        </div>
        <div class="form-group">
          <label  for= "uservendedor"  class= "" > Vendedor </label>
             <div  class= "input-group margin-bottom-sm" >
                        <span class="input-group-addon"><i class="fa fa-star fa-fw"></i></span>
            <input  type= "text"  class= "form-control"  id= "uservendedor" name="uservendedor" value="<?php echo $usuarios['Vendedor'] ?>" >
          </div>
        </div>
        
        <div class="form-group">
          <label  for= "distrito"  class= "" >Tipo Usuario </label>
                    <div><h3><?php echo $PlanUser['NombrePlan'] ?> <small>(Maximo <?php echo $PlanUser['CantidadProp'] ?> Propiedades ) </small></h3>  <a href="#" class="btn btn-warning" onclick="alert('Proximamente..')"> <span class="fa fa-bars fa-fw"></span> Cambiar Plan</a></div>

        </div>
        <p></p><br>
        
       <div class="form-group">
        <p></p><br>
       <button class="btn btn-primary btn-lg pull-right" tyoe="submit" id="new">Actualizar</button>
        <input type="hidden" id="baseurl" value="<?php echo base_url() ?>">
        <input type="hidden" id="accion" name="accion" value="new">
      </div>
      <div class="clearfix"></div>
</form>
</div>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
