<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1>Editar Plan Usuarios</h1>
  <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-users"></i> Editar Plan</li>
            </ol>
            <div class="col-lg-7">
<form action="<?php echo base_url() ?>propiedadessrl/adminroot/abm_planU/<?php echo $planu['ID_PlanU'] ?>" method="post">
        <div class="form-group">
          <label  for= "usuario"  class= "" > Nombre Plan </label>
          <div  class= "input-group margin-bottom-sm" >
            <span class="input-group-addon"><i class="fa fa-trophy fa-fw"></i></span>

            <input  type= "text"  class= "form-control"  id= "nombreplan"  name="nombreplan" value="<?php echo $planu["NombrePlan"] ?>" >
          </div>
        </div>
        <div class="form-group">
          <label  for= "pass"  class= "" > Cantidad Prop </label>

    <div  class= "input-group margin-bottom-sm" >
                        <span class="input-group-addon"><i class="fa fa-bars fa-fw"></i></span>

            <select name="cantidadprop" id="cantidadprop" class="form-control">
              <?php for ($i=0; $i <= 45; $i++) {
              echo ' <option value="'.$i.'" ';if($planu['CantidadProp']== $i){echo 'selected="seleted"';} echo ' >'.$i.'</option>';
              } ?>
            </select>
            
          </div>

      
        </div>
        <div class="form-group">
          <label  for= "useremail"  class= "" > Agentes </label>
          <div  class= "input-group margin-bottom-sm" >
              <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>

 <select name="agentes" id="agentes" class="form-control">
              <?php for ($i=0; $i <= 10 ; $i++) {
              echo ' <option value="'.$i.'" '; if($planu['Agentes']== $i){echo 'selected="seleted"';} echo '>'.$i.'</option>';
              } ?>
            </select>          </div>




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
