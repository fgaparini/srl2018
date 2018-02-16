<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
<p></p>
  <h1><?php echo $infoprop['Titulo'] ?> - <?php echo $prop['ID_Propiedades'] ?> 

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
</div></h1>
  <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-users"></i>Propiedad</li>
            </ol>
<p>
  <div class="row" >
    <div class="col-lg-12" id="main">


<!-- fichaaa -->



                <div class="carousel property">
              
                    <div class="preview" align="center">
                        <img src="<?php echo base_url().'upload/propiedades/'.$prop['ID_Propiedades'].'_1.jpg'  ?>" alt="">
                    </div><!-- /.preview -->
                 
                    <div class="content">

                        <a class="carousel-prev" href="#">Previous</a>
                        <a class="carousel-next" href="#">Next</a>
                        <ul>
                         <?php 
                         for ($i=1; $i <=$cant_fotos ; $i++) { 
                           if ($i==1) {
                            echo '<li class="active">
                                  <img src="'.base_url().'upload/propiedades/'.$prop['ID_Propiedades'].'_'.$i.'.jpg" alt="">
                                    </li>';
                            } else {
                                  echo '<li class="">
                                  <img src="'.base_url().'upload/propiedades/'.$prop['ID_Propiedades'].'_'.$i.'.jpg"  alt="">
                                    </li>';

                            }
                          } ?>
                        </ul>
                    </div>
                    <!-- /.content -->
                </div>
                <!-- /.carousel -->

                        <div class="row">
                            <div class="col-lg-10">
                                <h2>Detalle </h2>
              <div class="table-resposive">
                                <table class="table table-bordered table-hover tablesorter">
                                    <tr>
                                        <th>Precio:</th>
                                        <th>Superficie:</th>
                                        <th>Sup Cubierta:</th> 
                                        <th>Habitaciones:</th>
                                        <th>Antiguedad:</th>
                                        <th>Hectareas:</th>
                                      
                                       


                                    
                                    <tr>
                                        <td><span style="color:#4F9FDB"><strong>
                                          <?php if ($infoprop['Moneda']=="pesos"){echo "$";}else{echo 'U$D';} ?><?php echo $infoprop['Precio'] ?></strong></span></td>+
                                        <td><?php echo $infoprop['Superficie'] ?></td>
                                        <td><?php echo $infoprop['SuperficieCub'] ?></td>
                                        <td><?php echo $infoprop['Habitaciones'] ?></td>
                                        <td><?php echo $infoprop['Antiguedad'] ?></td>
                                        <td><?php echo $infoprop['Hectareas'] ?></td>
                                       

                                    </tr>
                                   
                                </table>
                                </div>
                                  <div class="table-resposive">
                                <table class="table table-bordered table-hover tablesorter">
                                    <tr>
                                        <th>Garage:</th>
                                        <th>electricidad:</th> 
                                        <th>Gas:</th>
                                        <th>Cloacas:</th>
                                       


                                    
                                    <tr>
                                        <td><?php if ($infoprop['Garage']==1) {
                                          echo '<span class="fa fa-check fa-2x"></span>';
                                        } else { echo '<span class="fa fa-times fa-2x"></span>';} ?></td>
                                        <td><?php if ($infoprop['Electricidad']==1) {
                                          echo '<span class="fa fa-check fa-2x"></span>';
                                        } else { echo '<span class="fa fa-times fa-2x"></span>';} ?></td>
                                         <td><?php if ($infoprop['Gas']==1) {
                                          echo '<span class="fa fa-check fa-2x"></span>';
                                        } else { echo '<span class="fa fa-times fa-2x"></span>';} ?></td>
                                         <td><?php if ($infoprop['Cloacas']==1) {
                                          echo '<span class="fa fa-check fa-2x"></span>';
                                        } else { echo '<span class="fa fa-times fa-2x"></span>';} ?></td>

                                    </tr>
                                   
                                </table>
                                </div>
                            </div>
                            <!-- /.span2 -->
                  </div>
                    <div class="col-lg-10"><p><strong><?php echo $infoprop['Descripcion'] ?></p></div>
                

                

                    <h2>Map</h2>

                    <div class="col-lg-10">
                      <h4>Dirrecion:<?php echo $infoprop['Direccion'] ?></h4>
                      <?php echo $map['html']; ?></div><!-- /#property-map -->
                </div>

            

<!-- fin ficha -->


</div>
</div>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
