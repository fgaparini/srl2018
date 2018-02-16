<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1><span class="fa fa-user fa-1x"></span> Soporte / Contacto</h1>
  <ol class="breadcrumb">
              <li><a href="<?php echo base_url() ?>propiedadessrl/adminuser"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-user"></i> Soporte Tecnico/ Contacto</li>
            </ol>
            <div class="col-lg-7">

        <div class="form-group">
          <label  for= "usuario"  class= "" > Asunto </label>
          <div  class= "input-group margin-bottom-sm" >
            <span class="input-group-addon"><i class="fa fa-info fa-fw"></i></span>

            <input  type= "text"  class= "form-control"  id= "username"  name="username" value="<?php echo $usuarios['Usuario'] ?>" >
          </div>
       
        



   
    
        <div class="form-group">
          <label  for= "uservendedor"  class= "" > Vendedor </label>
             <div  class= "input-group margin-bottom-sm" >
                        <span class="input-group-addon"><i class="fa fa-star fa-fw"></i></span>
            <input  type= "text"  class= "form-control"  id= "uservendedor" name="uservendedor" value="<?php echo $usuarios['Vendedor'] ?>" >
          </div>
        </div>
        
        
        <p></p><br>
        
       <div class="form-group">
        <p></p><br>
       <button class="btn btn-primary btn-lg pull-right" tyoe="submit" id="new">Enviar</button>
        <input type="hidden" id="baseurl" value="<?php echo base_url() ?>">
        <input type="hidden" id="accion" name="accion" value="<?php echo $user["ID_Usuario"] ?>">
      </div>
      <div class="clearfix"></div>
</form>
</div>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
