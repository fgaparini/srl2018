<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1>Agregar Usuarios</h1>
  <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-users"></i> Agregar Usuarios</li>
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
          <label  for= "distrito"  class= "" >Plan Usuario </label>
           <div  class= "input-group margin-bottom-sm" >
                        <span class="input-group-addon"><i class="fa fa-bars fa-fw"></i></span>

            <select name="planuser" id="planuser" class="form-control">
              <?php foreach ($PlanUser as $var): ?>
              <option value="<?php echo $var['ID_PlanU'] ?>" <?php if($var['ID_PlanU']== $usuarios['PlanUsuarios_ID_PlanU']){echo 'selected="seleted"';} ?> > <?php echo $var['NombrePlan'] ?> </option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <p></p><br>
         <div class="checkbox-inline">
        <label>
          <input type="radio" id="particular" name="particular" value="1" <?php if($usuarios['Particular']==1){echo 'selected="seleted"';} ?>> Particular
        </label>
      </div>
      <div class="checkbox-inline">
        <label>
          <input type="radio" id="particular" name="particular" value="0"> Agente
        </label>
      </div> 
       <div class="form-group">
        <p></p><br>
       <button class="btn btn-primary rigth" tyoe="submit" id="new">Agregar</button>
        <input type="hidden" id="baseurl" value="<?php echo base_url() ?>">
        <input type="hidden" id="accion" name="accion" value="new">
      </div>
</form>
</div>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
