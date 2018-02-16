<!-- Content -->
<article class="container_12">
    <section class="grid_4" >
        <!--<div class="block-border"><div class="block-content">-->
        <h1>Menu Alojamiento</h1>
        <ul class="favorites no-margin with-tip" title="Menu del Alojamiento">
            <li>
                <img src="<?php echo base_url(); ?>users/images/icons/web-app/48/edit_home.png" width="48" height="48">
                <a href="<?php echo base_url() . "users/dash/edit_info"; ?>">Informacion Alojamiento<br></br>
                    <small>Edite la informacion de su alojamiento. Como descripcion, Direccion, telefono , etc.</small></a>
            </li>

            <li>
                <img src="<?php echo base_url(); ?>users/images/icons/web-app/48/photos_home.png" width="48" height="48">
                <a href="<?php echo base_url() . "users/dash/editar/fotos/"; ?>">Fotos Alojamiento<br></br>
                    <small>Agregue, Modifique o Elimine las fotografias de su Alojamiento</small></a>
            </li>
            <li>
                <img src="<?php echo base_url(); ?>users/images/icons/web-app/48/service_home.png" width="48" height="48">
                <a href="<?php echo base_url() . "users/dash/editar/servicios/"; ?>">Servicios <br></br>
                    <small>Agregue, Modifique o Elimine los servicios de su Alojamiento</small></a>
            </li>
            <li>
                <img src="<?php echo base_url(); ?>users/images/icons/web-app/48/promo_home.png" width="48" height="48">
                <a href="<?php echo base_url() . "users/dash/editar/promociones/"; ?>">Promociones <br></br>
                    <small>Agregue, Modifique o Elimine los promociones de su Alojamiento</small></a>
            </li>
            <?php if ($hab > 0): ?>
                <li>
                    <img src="<?php echo base_url(); ?>users/images/icons/web-app/48/calendario.png" width="48" height="48">
                    <a href="<?php echo base_url() . "users/dash/edit_calendar"; ?>">Calendario
                        <br></br>
                        <small>Agregue, Modifique o Elimine tarifas y disponibilidad de su Alojamiento</small></a>

                </li>
            <?php endif; ?>
        </ul>

        <!--</div></div>-->
    </section>

    <section class="grid_8">
        <div class="block-border"><div class="block-content">
                <!-- We could put the menu inside a H1, but to get valid syntax we'll use a wrapper -->
                <div class="h1 with-menu">
                    <h1>Info</h1>
                    
                </div>

                <div class="block-controls">

                    <ul class="controls-tabs js-tabs same-height with-children-tip">
                        <li><a href="#tab-stats" title="Estadisticas"><img src="<?php echo base_url(); ?>users/images/icons/web-app/24/Bar-Chart.png" width="24" height="24"></a></li>
                        <li><a href="#tab-info" title="Informacion Alojaiento"><img src="<?php echo base_url(); ?>users/images/icons/web-app/24/edit_home.png" width="24" height="24"></a></li>
                        <li><a href="#tab-photos" title="Fotos Alojamiento"><img src="<?php echo base_url(); ?>users/images/icons/web-app/24/photos_home.png" width="24" height="24"></a></li>
                        <li><a href="#tab-services" title="Servicios Alojamiento"><img src="<?php echo base_url(); ?>users/images/icons/web-app/24/service_home.png" width="24" height="24"></a></li>
                        
                    </ul>

                </div>

                <!-- 	<form class="form" id="tab-stats" method="post" action="">
                
                        <fieldset class="grey-bg">
                                <legend><a href="#">Options</a></legend>
                                
                                <div class="float-left gutter-right">
                                        <label for="stats-period">Desde</label>
                                        <span class="input-type-text"><input type="text" name="stats-period" id="stats-period" value=""><img src="images/icons/fugue/calendar-month.png" width="16" height="16"></span>

                                                                </div>
                                <div class="float-left gutter-right">
                                        <label for="stats-period">Hasta</label>
                                        <span class="input-type-text"><input type="text" name="stats-period" id="stats-period" value=""><img src="images/icons/fugue/calendar-month.png" width="16" height="16"></span>
                                </div>
                                                                        
                                <div class="float-left">
                                        <span class="label">Mode</span>
                                        <select name="stats-sites" id="stats-sites-0">
                                                <option value="0">Bars</option>
                                                <option value="0">Lines</option>
                                        </select>
                                </div>
                        </fieldset></form> -->
                <div id="tab-stats" style="height:450px"  >
                   <div style="height:400px"> <p class="message danger">Estamos actualizando nuestro visualizador de Estadisticas . </p> </div>

                    <!-- <div id="chart_div" style="height:330px; width:100%" class="no-margin"></div> -->
                </div>
                <div id="tab-info" class="with-margin">
                    <h2>Informacion del Alojamiento</h2>
                    <div class="columns">
                        <div class="colx3-left">
                            <?php if (count($fotos_array) > 0): ?>
                                <img width="100%" src="<?php echo base_url() . "upload/alojamientos/" . $fotos_array[0]['ID_Alojamiento'] . "_" . $fotos_array[0]['NombreImagen'] . ".jpg" ?>" ><br><br><a href="<?php echo base_url() . "users/dash/edit_info"; ?>" class="button blue" id="edit_info">Editar >></a>
                            <?php else: ?>
                                <img width="100%" class="img-polaroid" src="<?php echo base_url() . "img/no_disponible.jpg" ?>"><br><br><a href="<?php echo base_url() . "users/dash/edit_info"; ?>" class="button blue" id="edit-info">Editar >></a>
                            <?php endif; ?>
                        </div>
                        <!-- Left column -->
                        <div class="colx3-right-double">
                            <div class="float-left with-padding"><b>Nombre:&nbsp;</b><?php echo $info_array->Nombre ?></div>
                            <div class="float-left with-padding"><b>Teléfono:&nbsp;</b><?php echo $info_array->Telefono ?></div>
                            <div class="float-left with-padding"><b>Responsable:&nbsp;</b><?php echo $info_array->Responsable ?></div>
                            <div class="float-left with-padding"><b>Email:&nbsp;</b><?php echo $info_array->Email ?></div>
                            <div class="float-left with-padding"><b>Checkin:&nbsp;</b><?php echo $info_array->Checkin ?></div>
                            <div class="float-left with-padding"><b>Checkout:&nbsp;</b><?php echo $info_array->Checkout ?></div>
                            <div class='clearfix'></div>
                            <div class="with-padding"><p><b>Descripción:</b></p>
                                <p><?php echo $info_array->Descripcion ?></p></div>
                        </div>

                        <!-- Right column -->

                    </div>		
                </div>

                <div id="tab-photos" class="with-margin">
                    <?php foreach ($fotos_array as $var): ?>
                        <img  class="last" width="170px" height="auto" src="<?php echo base_url() . "upload/alojamientos/" . $var['ID_Alojamiento'] . "_" . $var['NombreImagen'] . ".jpg" ?>">
                    <?php endforeach; ?>
                    <p>
                        <a href="<?php echo base_url() . "users/dash/editar/fotos/"; ?>" class="button blue" id="edit-photos">Editar >></a>
                    </p>
                </div>

                <div id="tab-services" class="with-margin">
                    <h2>Servicios del Alojamiento</h2>	<ul class="tags">
                        <?php foreach ($servicios as $var): ?>
                            <li class="icon_search"><span class="icon_search"></span><?php echo $var['Servicio']; ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="<?php echo base_url() . "users/dash/editar/servicios/"; ?>" class="button blue" id="edit-service">Editar >></a>
                </div>
            </div>
        </div>
    </section>
    <div class="clear"></div>
</article>

<!-- End content -->
