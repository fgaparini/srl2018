<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1><span class="fa fa-archive fa-1x"></span> Mis Propiedades <small>(<?php echo $TotalProp ?> / <?php echo $PlanUser['CantidadProp'] ?> Propiedades )</small> </h1>
  <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Mis Propiedades</li>
            </ol>


        <div class="row"> 
          <div class="col-lg-12">
          <div class="col-lg-12 " style="margin: 0 0 10px 0;">
          <?php if ($TotalProp>=$PlanUser['CantidadProp']){ ?>
        <a href="<?php echo base_url().'propiedadessrl/adminuser/formprop/'?>"  disabled="disabled" class="btn btn-success btn-lg   ">Nueva Propiedad</a>
        <p></p>
        <div class="alert alert-danger">Ud llego al limite de propiedades de su Plan. ¿Quiere agregar Mas Propiedades?.<b> <a href="#" class="alert-link">Cambie de Plan</a></b></div>
          <?php } else { ?>
        <a href="<?php echo base_url().'propiedadessrl/adminuser/formprop/'?>" class="btn btn-success btn-lg   ">Nueva Propiedad</a>
      <?php } ?>
      </div>
                    <div class="col-lg-12">
               <?php foreach ($PropList as $var): ?>
                <?php if ($var['estado']=="D"){ 
                $class='desactivo';
              }else {$class="";}
            ?>
              <div class="col-lg-4 list-prop ">
                <div class="panel panel-default <?php echo $class ?>">
                  <?php if ($var['estado']=="D")
                     { 
                      echo '<div class="divdesac"><b>Bloqueado</b> (no se Mostrara)</div>';               
                      }
            ?>
                  <div class="panel-body">
                    <img src="<?php echo base_url().'upload/propiedades/thumbG/'.$var['ID_Propiedades'].'_1_g.jpg' ?>"  alt="">
                    <div class="titleprop"><h3><a href="<?php echo base_url().'propiedadessrl/adminuser/propiedad/'.$var['ID_Propiedades'] ;?>"><?php echo $var['Titulo'] ?>-<?php echo $var['estado'] ?> </a></h3></div>
                  </div>
                  <div class="bg-success panel-footer ">
                    <div class="row ">
                       <a href="<?php echo base_url().'propiedadessrl/adminuser/propiedad/'.$var['ID_Propiedades'] ;?>"><div class="col-xs-4"><span class="fa fa-home"></span> Ficha</div></a>
                      <a href="<?php echo base_url().'propiedadessrl/adminuser/formprop/'.$var['ID_Propiedades']?>"><div class="col-xs-4 "><span class="fa fa-edit"></span> Editar</div></a>
                      <a href="#"   class="delprop" data-id="<?php echo $var['ID_Propiedades'] ?>" data-page="propiedades"><div class="col-xs-4 "><span class="fa fa-times"></span> Bloquear</div></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?> 
          </div>
       </div>
        </div><!-- /.row -->
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
