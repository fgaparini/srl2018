<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1>Plan Usuarios</h1>
  <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-users"></i> Plan Usuarios</li>
            </ol>
<p>
<a href="<?php echo base_url().'propiedadessrl/adminroot/planu/'?>" class="btn btn-success btn-lg ">Agregar Plan</a></p>
        <div class="row">
                    <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter" id="usuarios">
                <thead>
                  <tr>
                    <th>ID <i class="fa fa-sort"></i></th>
                    <th>Nombre Plan <i class="fa fa-sort"></i></th>
                    <th>Cantidad de Prop  <i class="fa fa-sort"></i></th>
                    <th>Agentes  <i class="fa fa-sort"></i></th>
                    <th>Action</th>
                  
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($planu as $var): ?>
                    
            
                  <tr>
                    <td><?php echo $var['ID_PlanU'] ?></td>
                    <td><?php echo $var['NombrePlan'] ?></td>
                    <td><?php echo $var['CantidadProp'] ?></td>
                    <td><?php echo $var['Agentes'] ?></td>
                    <td> <ul class="list-inline">
              <li><a href="<?php echo base_url().'propiedadessrl/adminroot/planu/'.$var['ID_PlanU'] ?>"><i class="fa fa-edit"></i> Editar</a></li>
              <li class=""><a href="#" id="eliminar" rel="<?php echo $var['ID_PlanU']?>" role="usuarios" ><i class="fa fa-times"></i> Eliminar</a></li>
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
