<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1>Agregar Fotos Propiedad</h1>
  <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Foto Propiedad</li>
            </ol>
<p>
<a href="<?php echo base_url().'propiedadessrl/adminroot/formprop/'?>" class="btn btn-success btn-lg ">Nueva Propiedades</a></p>
        <div class="row">
                    <div class="col-lg-10">
               <?php foreach ($PropList as $var): ?>
              <div class="col-lg-3 list-prop ">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <img src="<?php echo base_url().'upload/propiedades/thumbG/'.$var['ID_Propiedades'].'_1_g.jpg' ?>"  alt="">
                    <div class="titleprop"><h3><a href="<?php echo base_url().'propiedadessrl/adminroot/propiedad/'.$var['ID_Propiedades'] ;?>"><?php echo $var['Titulo'] ?></a></h3></div>
                  </div>
                  <div class="bg-success panel-footer ">
                    <div class="row ">
                      <a href=""><div class="col-xs-4"><span <?php if($var['estado']=="A"){ echo 'class="fa fa-eye-slash"';}else{echo 'class="fa fa-eye"';} ?>></span> <?php if($var['estado']=="A"){echo "Desac.";}else{echo "Activar";} ?></div></a>
                      <a href="<?php echo base_url().'propiedadessrl/adminroot/formprop/'.$var['ID_Propiedades']?>"><div class="col-xs-4 "><span class="fa fa-edit"></span> Editar</div></a>
                      <div class="col-xs-4 "><span class="fa fa-user"></span> usuario</div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?> 
          </div>
       
        </div><!-- /.row -->
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
