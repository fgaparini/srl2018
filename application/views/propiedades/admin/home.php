<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Dashboard <small>Panel de Control</small></h1>
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
      <div class="col-lg-3">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-home fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"><?php echo $TotalProp ?></p>
                <p class="announcement-text">Propiedades</p>
              </div>
            </div>
          </div>
          <a href="<?php echo base_url().'propiedadessrl/adminroot/propiedades' ?>">
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
      <div class="col-lg-3">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-users fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"><?php echo $TotalUsers ?></p>
                <p class="announcement-text">Usuarios</p>
              </div>
            </div>
          </div>
          <a href="#">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
                Ver Usuarios
              </div>
              <div class="col-xs-6 text-right">
                <i class="fa fa-arrow-circle-right"></i>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-tasks fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"><?php echo $TotalConsultas ?></p>
                <p class="announcement-text">Consultas</p>
              </div>
            </div>
          </div>
          <a href="#">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
                Ver Consultas
              </div>
              <div class="col-xs-6 text-right">
                <i class="fa fa-arrow-circle-right"></i>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="panel panel-success">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-comments fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"><?php echo $TotalConsultas ?></p>
                <p class="announcement-text">Consultas</p>
              </div>
            </div>
          </div>
          <a href="#">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
                Ver Consultas
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
              <div class="col-lg-3 list-prop ">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <img src="<?php echo base_url().'upload/propiedades/thumbG/'.$var['ID_Propiedades'].'_1_g.jpg' ?>"  alt="">
                    <div class="titleprop"><h3><?php echo $var['Titulo'] ?></h3></div>
                  </div>
                  <div class="bg-success panel-footer ">
                    <div class="row ">
                      <a href="<?php echo base_url().'propiedadessrl/adminroot/propiedad/'.$var['ID_Propiedades'] ;?>"><div class="col-xs-4"><span class="fa fa-home"></span> Ficha</div></a>
                      <a href="<?php echo base_url().'propiedadessrl/adminroot/formprop/'.$var['ID_Propiedades']?>"><div class="col-xs-4 "><span class="fa fa-edit"></span> Editar</div></a>
                      <div class="col-xs-4 "><span class="fa fa-user"></span> usuario</div>
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