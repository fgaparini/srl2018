<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1>Agregar Fotos</h1>
  <ol class="breadcrumb">
              <li><a href="<?php echo base_url() ?>propiedadessrl/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-users"></i>Distritos</li>
            </ol>
<p>
  <div class="row">
    <div class="col-lg-10">
<form action="<?php echo base_url().'propiedadessrl/adminroot/dz_upload/'.$idprop ?>" class="dropzone">
</form>
</div>
<div>
  <?php if (isset($nuevoprop)): ?>
      <a href="<?php echo  base_url().'propiedadessrl/adminroot/map_prop/'.$idprop ?>" class="btn btn-success">Siguiente Paso <span class="fa fa-chevron-right"></span></a>
  <?php endif ?>
  <?php if (isset($masfotos)): ?>
          <a href="<?php echo  base_url().'propiedadessrl/adminroot/propiedad/'.$idprop ?>" class="btn btn-success"><span class="fa fa-check"></span> Listo</a>

  <?php endif ?>
</div>
</div>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
