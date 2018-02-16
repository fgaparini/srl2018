 <div id="content">    
    <div class="container">
        <div id="main">
            <div class="row">
                <div class="span9">
                    <h1 class="page-header">Contáctenos</h1>
                        <iframe class="map" width="425" height="350" src="https://maps.google.com/maps?q=37.440587,-122.139816&amp;num=1&amp;ie=UTF8&amp;ll=37.435681,-122.135696&amp;spn=0.041038,0.077162&amp;t=m&amp;z=14&amp;output=embed"></iframe>

                        <p>
                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
                        </p>

                        <div class="row">
                            <div class="span3">
                                <h3 class="address">Dirrecion</h3>
                                <p class="content-icon-spacing">
                                   Coronel Plaza 390<br>
                                    San Rafael, Mendoza
                                </p>
                            </div>
                            <div class="span3">
                                <h3 class="call-us">Llámenos</h3>
                                <p class="content-icon-spacing">
                                    0800 222 5588<br>
                                    0260 4540127
                                </p>
                            </div>
                            <div class="span3">
                                <h3 class="email">Email</h3>
                                <p class="content-icon-spacing">
                                    <a href="mailto:contacto@sanrafaellate.com.ar">Contacto General</a><br>
                                    <a href="mailto:propiedades@sanrafaellate.com.ar">Soporte usuarios</a>
                                </p>
                            </div>
                        </div>

                        <h2>Escríbanos</h2>

                        <form method="post" class="contact-form" action="?">
                            <div class="name control-group">
                                <label class="control-label" for="inputContactName">
                                    Nombre
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" id="inputContactName">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="email control-group">
                                <label class="control-label" for="inputContactEmail">
                                    Email
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" id="inputContactEmail">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="control-group">
                                <label class="control-label" for="inputContactMessage">
                                    Consulta o Sugerencia
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>

                                <div class="controls">
                                    <textarea id="inputContactMessage"></textarea>
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="form-actions">
                                <input type="submit" class="btn btn-primary arrow-right" value="Enviar Consulta">
                            </div><!-- /.form-actions -->
                        </form>
                </div>

                <div class="sidebar span3">
                    <div class="widget properties last">
    <div class="title">
        <h2>Buscar Propiedad</h2>
    </div><!-- /.title -->
<div class="property-filter widget">
    <h2>Buscar Propiedades</h2>

    <div class="content">
                                <div class="location control-group">
                                    <label class="control-label" for="inputLocation">
                                        Zona
                                    </label>
                                    <div class="controls">
                                        <select id="zona">
                                          <option value="0" selected=selected>Indistinto</option>

                                          <?php foreach ($Distrito as $var): ?>
                                              <option value="<?php echo $var['Distrito'] ?>"><?php echo $var['Distrito'] ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="type control-group">
                                    <label class="control-label" for="tipo">
                                        Tipo Propiedad
                                    </label>
                                    <div class="controls">
                                        <select id="tipo">
                                            <option value="0" selected=selected>Indistinto</option>
                                         <?php foreach ($TipoProp as $var): ?>
                                              <option value="<?php echo $var['TipoPropiedades'] ?>"><?php echo $var['TipoPropiedades'] ?></option>
                                          <?php endforeach ?> 
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                        

                                <div class="rent control-group">
                                    <div class="controls">
                                        <label class="checkbox" for="venta">
                                            <input type="checkbox" id="venta" value="venta"> Comprar
                                        </label>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="sale control-group">
                                    <div class="controls">
                                        <label class="checkbox" for="alquiler">
                                            <input type="checkbox" id="alquiler" value="alquilar"> Alquilar
                                        </label>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-from control-group">
                                    <label class="control-label" for="inputPriceFrom">
                                        Precio desde
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="preciodesde" name="inputPriceFrom">
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-to control-group">
                                    <label class="control-label" for="inputPriceTo">
                                      Precio Hasta
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="preciohasta" name="inputPriceTo">
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-value">
                                    <span class="from"></span><!-- /.from -->
                                    -
                                    <span class="to"></span><!-- /.to -->
                                </div><!-- /.price-value -->

                                <div class="price-slider">
                                </div><!-- /.price-slider -->

                                <div class="form-actions">
                                    <input type="submit" value="Busca Ya!"  id="buscar" class="btn btn-primary btn-large">
                                </div><!-- /.form-actions -->
                                <input type="hidden" value="<?php echo base_url() ?>" id="base_url">
                            
    </div><!-- /.content -->
</div><!-- /.property-filter -->

</div><!-- /.properties -->

                </div>
            </div>
        </div>
    </div>
    </div><!-- /#content -->
</div>