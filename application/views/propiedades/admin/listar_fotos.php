<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1>Fotos Propiedad - <?php echo $id_prop ?>
<!-- MENU DE EDICION PROPIEDAD -->
    <div class="btn-group">
  <button type="button" class="btn btn-danger">Editar</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="<?php echo base_url().'propiedadessrl/adminroot/formprop/'.$prop['ID_Propiedades']  ?>">Info</a></li>
    <li><a href="<?php echo base_url().'propiedadessrl/adminroot/listarfotos/'.$prop['ID_Propiedades']  ?>">Fotos</a></li>
    <li><a href="<?php echo base_url().'propiedadessrl/adminroot/map_prop/'.$prop['ID_Propiedades']  ?>">Coordendas</a></li>

  </ul>
</div>

  </h1>
  <ol class="breadcrumb">
              <li><a href="<?php echo base_url().'/propiedadessrl/adminroot' ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-users"></i>Listar Fotos</li>
            </ol>
<p>
  <a href="<?php echo base_url().'/propiedadessrl/adminroot/propiedad/'.$id_prop ?>" class="btn btn-primary">Volver a Propiedad</a>
  <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter" id="usuarios">
                <thead>
                  <tr>
                    <th>Foto ID <i class="fa fa-sort"></i></th>
                    <th>Imagen</i></th>
                    <th>Modificar  <i class="fa fa-sort"></i></th>
                  
                    <th>Action</th>
                  
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($fotos as $var): ?>
                    
            
                  <tr>
                    <td><?php echo $var['name'] ?></td>
                    <td><img src="<?php echo base_url().'upload/propiedades/thumb/'.$id_prop.'_'.$var['name'].'.jpg' ?>" alt=""></td>
                    <td>
                      <form action="<?php echo base_url().'/propiedadessrl/adminroot/dz_upload/'.$id_prop ?>" method="POST" enctype="multipart/form-data" id="<?php echo $var['name']; ?>" >
                        <input type="file" name="file" >
                        <input type="text" name="id_foto" value="<?php echo $var['name']; ?>">
                        <button>Modificar</button>
                      </form>
                    </td>
                    <td> <ul class="list-inline">
              <li class=""><a href="#" id="eliminar" rel="<?php echo $var['ID_Fotos']?>" role="usuarios" ><i class="fa fa-times"></i> Eliminar</a></li>
            </ul></td>
                   
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
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
