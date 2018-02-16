<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1><span class="fa fa-dashboard fa-1x"></span> Dashboard <small>Panel de Control</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>
      <!-- <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Welcome to SB Admin by <a class="alert-link" href="http://startbootstrap.com">Start Bootstrap</a>! Feel free to use this template for your admin needs! We are using a few different plugins to handle the dynamic tables and charts, so make sure you check out the necessary documentation links provided.
      </div> -->
    </div>
    </div><!-- /.row -->
    <div class="row">
      <div class="col-lg-4">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-home fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"><?php echo $TotalProp ?>/<?php echo $PlanUser['CantidadProp'] ?></p>
                <p class="announcement-text">Propiedades</p>
              </div>
            </div>
          </div>
          <a href="<?php echo base_url().'propiedadessrl/adminuser/propiedades' ?>">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
                Ver Propiedades
              </div>
              <div class="col-xs-6 text-right">
                <i class="fa fa-arrow-circle-right"></i>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
      
      <div class="col-lg-4">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-tasks fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"><?php echo $TotalConsultas ?></p>
                <p class="announcement-text">Consulta Recibidas</p>
              </div>
            </div>
          </div>
          <a href="#">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
           
              </div>
              <div class="col-xs-6 text-right">
                <i class="fa fa-arrow-circle-right"></i>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
      <div class="col-lg-4  ">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-user fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"></p>
                <p class="announcement-text">Perfil</p>
              </div>
            </div>
          </div>
          <a href="<?php echo base_url() ?>propiedadessrl/adminuser/perfil">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
                Ver Perfil
              </div>
              <div class="col-xs-6 text-right">
                <i class="fa fa-arrow-circle-right"></i>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
      </div><!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-home"></i> Propiedades</h3>
            </div>
            <div class="panel-body">
            <?php foreach ($PropList as $var): ?>
            <?php if ($var['estado']=="D"){ 
                $class='desactivo';
              }else {$class="";}
            ?>
              <div class="col-lg-4 list-prop ">
                    
                <div class="panel panel-default <?php echo $class ?>" >
                   <?php if ($var['estado']=="D")
                     { 
                      echo '<div class="divdesac"><b>Bloqueado</b> (no se Mostrara)</div>';               
                      }
            ?>
                  <div class="panel-body">
                    <img src="<?php echo base_url().'upload/propiedades/thumbG/'.$var['ID_Propiedades'].'_1_g.jpg' ?>"  alt="">
                    <div class="titleprop"><h4><a href="<?php echo base_url().'propiedadessrl/adminuser/propiedad/'.$var['ID_Propiedades'] ;?>"><?php echo ucwords($var['Titulo']) ?></a><h4></div>
                  </div>
                  <div class="bg-success panel-footer ">
                    <div class="row ">
                      <a href="<?php echo base_url().'propiedadessrl/adminuser/propiedad/'.$var['ID_Propiedades'] ;?>"><div class="col-xs-4"><span class="fa fa-bars"></span> Ficha</div></a>
                      <a href="<?php echo base_url().'propiedadessrl/adminuser/formprop/'.$var['ID_Propiedades']?>"><div class="col-xs-4 " id=><span class="fa fa-edit"></span> Editar</div></a>
                       <a href="#"   class="delprop" data-id="<?php echo $var['ID_Propiedades'] ?>" data-page=""><div class="col-xs-4 "><span class="fa fa-times"></span> Bloquear</div></a>
                        
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?> 
            </div>
          </div>
        </div>
        </div><!-- /.row -->
    
          </div><!-- /#page-wrapper -->
          </div><!-- /#wrapper -->
