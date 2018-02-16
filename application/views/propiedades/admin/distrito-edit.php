<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1>Editar Distrito</h1>
  <ol class="breadcrumb">
              <li><a href="<?php echo base_url() ?>propiedadessrl/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-users"></i> Editar Distrito</li>
            </ol>
            <div class="col-lg-7">
<form action="<?php echo base_url() ?>propiedadessrl/adminroot/abm_distrito/<?php echo $distrito['ID_Distritos'] ?>" method="post">
        <div class="form-group">
          <label  for= "usuario"  class= "" > Distrito </label>
          <div  class= "input-group margin-bottom-sm" >
            <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i></span>

            <input  type= "text"  class= "form-control"  id= "distrito"  name="distrito" value="<?php echo $distrito["Distrito"] ?>" >
          </div>
        </div>
    <div class="form-group">
          <label  for= "usuario"  class= "" > Codigo Depto </label>
          <div  class= "input-group margin-bottom-sm" >
            <span class="input-group-addon"><i class="fa fa-barcode fa-fw"></i></span>

            <input  type= "text"  class= "form-control"  id= "codigo"  name="codigo" value="<?php echo $distrito["Cod_ciudad"] ?>" >
          </div>
        </div>
    
    
       <div class="form-group">
        <p></p><br>
       <button class="btn btn-primary rigth" tyoe="submit" id="edit">Editar</button>
        <input type="hidden" id="baseurl" value="<?php echo base_url() ?>">
        <input type="hidden" id="accion" name="accion" value="edit">
      </div>
</form>
</div>
</div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
