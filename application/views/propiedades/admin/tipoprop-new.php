<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1>Tipo Propiedades</h1>
  <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Tipo Propiedades</li>
            </ol>


        <div class="row">
          <div class="col-lg-12">
            <form action="<?php echo base_url()."propiedadessrl/adminroot/abm_tipoprop/" ?>" method="post">

            <div  class= "form-group" >
            <label  for= "Titulo Propiedad"  class= "" > Nombre Tipo </label>
            <div  class= "" >
              <input  type= "text"  class= "form-control"  id= "tipoprop" name="tipoprop" value="">
            </div>
            <button class="btn btn-primary">Crear</button>
            <input type="hidden" name="accion" id="accion" value="new">
            </form>
            </div>
       
        </div><!-- /.row -->
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
