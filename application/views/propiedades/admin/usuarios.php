<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1>Usuarios</h1>
  <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-users"></i> Usuarios</li>
            </ol>
<p>
<a href="<?php echo base_url().'propiedadessrl/adminroot/usuarios/'?>" class="btn btn-success btn-lg ">Agregar usuario</a></p>
        <div class="row">
                    <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter" id="usuarios">
                <thead>
                  <tr>
                    <th>ID <i class="fa fa-sort"></i></th>
                    <th>Nombre  <i class="fa fa-sort"></i></th>
                    <th>Email  <i class="fa fa-sort"></i></th>
                    <th>Telefono  <i class="fa fa-sort"></i></th>
                    <th>Tipo  <i class="fa fa-sort"></i></th>
                     <th>vendedor  <i class="fa fa-sort"></i></th>
                    <th>Action</th>
                  
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($usuarios as $var): ?>
                    
            
                  <tr>
                    <td><?php echo $var['ID_Usuarios'] ?></td>
                    <td><?php echo $var['Usuario'] ?></td>
                    <td><?php echo $var['Email'] ?></td>
                    <td><?php echo $var['Telefono'] ?></td>
                    <td><?php if($var['Particular']==1){echo "particular";}else {echo "Agente";}?></td>
                     <td><?php echo $var['Vendedor'] ?></td>
                    <td> <ul class="list-inline">
              <li><a href="<?php echo base_url().'propiedadessrl/adminroot/usuarios/'.$var['ID_Usuarios'] ?>"><i class="fa fa-edit"></i> Editar</a></li>
              <li class=""><a href="#" id="eliminar" rel="<?php echo $var['ID_Usuarios']?>" role="usuarios" ><i class="fa fa-times"></i> Eliminar</a></li>
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
