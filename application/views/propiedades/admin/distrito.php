<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1>Plan Usuarios</h1>
  <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-users"></i>Distritos</li>
            </ol>
<p>
<a href="<?php echo base_url().'propiedadessrl/adminroot/distritos/'?>" class="btn btn-success btn-lg ">Agregar Distrito</a></p>
        <div class="row">
                    <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter" id="usuarios">
                <thead>
                  <tr>
                    <th>ID <i class="fa fa-sort"></i></th>
                    <th>Distrito<i class="fa fa-sort"></i></th>
                    <th>Codigo Depto  <i class="fa fa-sort"></i></th>
                  
                    <th>Action</th>
                  
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($distritos as $var): ?>
                    
            
                  <tr>
                    <td><?php echo $var['ID_Distritos'] ?></td>
                    <td><?php echo $var['Distrito'] ?></td>
                    <td><?php echo $var['Cod_ciudad'] ?></td>
                    <td> <ul class="list-inline">
              <li><a href="<?php echo base_url().'propiedadessrl/adminroot/distritos/'.$var['ID_Distritos'] ?>"><i class="fa fa-edit"></i> Editar</a></li>
              <li class=""><a href="#" id="eliminar" rel="<?php echo $var['ID_Distritos']?>" role="usuarios" ><i class="fa fa-times"></i> Eliminar</a></li>
            </ul></td>
                   
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
       
        </div><!-- /.row -->
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
