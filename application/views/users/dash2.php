

<!-- Content -->
<article class="container_12">

    <section class="grid_4">
        <!--<div class="block-border"><div class="block-content">-->
        <h1>Menu Alojamiento</h1>

        <ul class="favorites no-margin with-tip" title="Menu del Alojamiento">

            <li>
                <img src="images/icons/web-app/48/edit_home.png" width="48" height="48">
                <a href="#">Informacion Alojamiento<br></br>
                    <small>Edite la informacion de su alojamiento. Como descripcion, Direccion, telefono , etc.</small></a>
            </li>
            <li>
                <img src="images/icons/web-app/48/photos_home.png" width="48" height="48">
                <a href="#">Fotos Alojamiento<br></br>
                    <small>Agregue, Modifique o Elimine las fotografias de su Alojamiento</small></a>
            </li>

            <li>
                <img src="images/icons/web-app/48/service_home.png" width="48" height="48">
                <a href="#">Servicios <br></br>
                    <small>Agregue, Modifique o Elimine los servicios de su Alojamiento</small></a>
            </li>
            
            <li>
                <img src="images/icons/web-app/48/calendario.png" width="48" height="48">
                <a href="#">Calendario
                    <br></br>
                    <small>Agregue, Modifique o Elimine tarifas y disponibilidad de su Alojamiento</small></a>
            </li>
        </ul>

        <!--</div></div>-->
    </section>
    <section class="grid_8">
        <div class="block-border"><div class="block-content">
                <!-- We could put the menu inside a H1, but to get valid syntax we'll use a wrapper -->
                <div class="h1 with-menu">
                    <h1>Web stats</h1>
                    <div class="menu">
                        <img src="images/menu-open-arrow.png" width="16" height="16">
                        <ul>

                            <li class="icon_export"><a href="#">Export</a>
                                <ul>
                                    <li class="icon_doc_excel"><a href="#">Excel</a></li>
                                    <li class="icon_doc_csv"><a href="#">CSV</a></li>
                                    <li class="icon_doc_pdf"><a href="#">PDF</a></li>
                                    <li class="icon_doc_image"><a href="#">Image</a></li>
                                    <li class="icon_doc_web"><a href="#">Html</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="block-controls">

                    <ul class="controls-tabs js-tabs same-height with-children-tip">
                        <li><a href="#tab-stats" title="Estadisticas"><img src="images/icons/web-app/24/Bar-Chart.png" width="24" height="24"></a></li>
                        <li><a href="#tab-info" title="Informacion Alojaiento"><img src="images/icons/web-app/24/edit_home.png" width="24" height="24"></a></li>
                        <li><a href="#tab-photos" title="Fotos Alojamiento"><img src="images/icons/web-app/24/photos_home.png" width="24" height="24"></a></li>
                        <li><a href="#tab-services" title="Servicios Alojamiento"><img src="images/icons/web-app/24/service_home.png" width="24" height="24"></a></li>
                    </ul>
                </div>

                <form class="form" id="tab-stats" method="post" action="">
                    <!-- 		
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
                    <div id="tab-stats" class="" style="width:100%;	">
                        <p class="message"><span class="close-bt"></span>Datos Obtenidos a partir del <b>30/05/2013</b>. Solicitenos datos estadisticos anteriores a esta fecha a nuestro email de contacto</p>

                        <div id="chart_div" style="height:330px;"></div>
                    </div>

                    <div id="tab-info" class="with-margin">
                        <p>hola</p>				</div>

                    <div id="tab-photos" class="with-margin">
                        <p>Medias</p>
                    </div>

                    <div id="tab-services" class="with-margin">
                        <ul class="simple-list with-icon">
                            <?php foreach ($servicios as $var): ?>
                                <li class="icon-info float-left"><?php echo $var['Servicio']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
            </div>
        </div>
    </section>

    <div class="clear"></div>
</article>

<!-- End content -->
