<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1>Tipo Propiedades</h1>
  <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Tipo Propiedades</li>
            </ol>
<p>
<a href="<?php echo base_url().'propiedadessrl/adminroot/tipoprop/'?>" class="btn btn-success btn-lg ">Agregar Tipo</a></p>
        <div class="row">
                    <div class="col-lg-9">
            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter" id="tipoprop">
                <thead>
                  <tr>
                    <th>ID <i class="fa fa-sort"></i></th>
                    <th>Nombre Tipo <i class="fa fa-sort"></i></th>
                    <th>Action</th>
                  
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($TipoProp as $var): ?>
                    
            
                  <tr>
                    <td><?php echo $var['ID_Tipo'] ?></td>
                    <td><?php echo $var['TipoPropiedades'] ?></td>
                    <td> <ul class="list-inline">
              <li><a href="<?php echo base_url().'propiedadessrl/adminroot/tipoprop/'.$var['ID_Tipo']?>"><i class="fa fa-edit"></i> Editar</a></li>
              <li class=""><a href="#" id="eliminar" rel="<?php echo $var['ID_Tipo']?>" role="tipoprop"  ><i class="fa fa-times"></i> Eliminar</a></li>
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
