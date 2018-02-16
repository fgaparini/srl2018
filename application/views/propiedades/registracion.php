                
    <div class="container">
        <h1>Registración</h1>
        <br>
        <div class="row">
            

            
            <div id="main" class="span12">
                    <div class="login-register" id="registro" >
        <div class="row" >
            <div class="span4" style="background-color:#fff;min-height:300px">

      <div  style="background-color:#fff; padding:10px;" id="registrofrom">        
<h4>Completar Registro</h4>
                        <div class="control-group">
                            <label class="control-label" for="nombre">
                                Nombre y Apellido 
                                <span class="form-required" title="Campo Requerido.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" id="nombre">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                   
                        <div class="control-group">
                            <label class="control-label" for="email">
                                E-mail
                                <span class="form-required" title="Campo Requerido.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" id="email">
                            </div>
                            <!-- /.controls -->
                        </div>
                              <!-- /.control-group -->
                             <div class="control-group">
                            <label class="control-label" for="telefono">
                                Teléfono 
                                <span class="form-required" title="Campo Requerido.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" id="telefono">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->
                             <div class="control-group">
                            <label class="control-label" for="usuario">
                                Usuario
                                <span class="form-required" title="Campo Requerido.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" id="usuario">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->
                        <div class="control-group">
                            <label class="control-label" for="pass">
                                Contraseña
                                <span class="form-required" title="Campo Requerido.">*</span>
                            </label>
                            <input type="hidden" value="<?php echo base_url() ?>" id="baseurl">
                                 <input type="hidden" value="1" id="particular">
                       
                                
                            <?php if ($plan=="free") {$planU=1;} else {$planU=1;}?>
                                
                            
                            <input type="hidden" value="<?php echo $planU ?>" id="plan">
                            <div class="controls">
                                <input type="password"  id="pass">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                  
                        <!-- /.control-group -->

                      <br>
                            <input type="submit" value="Registrate" id="registrarse" class="btn btn-primary btn-large arrow-right">
                       
                        <!-- /.form-actions -->
                    </div>
            </div><!-- /.span4-->

            <div class="span8">
                                
        <article id="post-119" class="post-119 page type-page status-publish hentry">
        <header class="entry-header">

        
                          <h2 class="page-header">Porque Registrarse?</h2>
        
                    </header><!-- .entry-header -->

                <div class="entry-content">
            <div class="images row">
<div class="item span2"><img src="<?php echo base_url().'propiedades-asset' ?>/img/icons/circle-dollar.png" alt=""><br />

   <?php switch ($plan) {
       case 'free':
            $precio=" Publica GRATIS !!!";
            break;
       case 'standart':
            $precio=" Económico <br><small>($10/año x Propiedad)</small>";
           break;
       case 'full':
            $precio="Super Económico <br>";
           break;
     
   } ?>
<h3><?php echo $precio ?> </h3>
</div>
<!-- <div class="item span2"><img src="<?php echo base_url().'propiedades' ?>/img/icons/circle-search.png" alt=""><br />
<h3>Facil</h3>
</div> -->
<div class="item span2"><img src="<?php echo base_url().'propiedades-asset' ?>/img/icons/circle-global.png" alt=""><br />
<h3>Globaliza tus Propiedades</h3>
</div>
<!-- <div class="item span2"><img src="<?php echo base_url().'propiedades' ?>/img/icons/circle-package.png" alt=""><br />
<h3>All in one package</h3>
</div> -->
</div>
<hr class="dotted">
<p>Registrate en <strong>Propiedades SRL</strong> y pública tus propiedades de manera gratuita y llega a miles de pontenciales clientes. <br> Publica propiedaes con fotos, decripcion, precio, etc.  </p>
<div align="center">
<h2>ADAPTADA A TODOS LOS DISPOSITIVOS</h2>

<img src="<?php echo base_url() ?>propiedades-asset/img/features-fully-responsive.png" alt="">
</div>
<!-- <ul class="unstyled dotted">
<li><span class="inner"><strong>Lorem ipsum dolor sit amet</strong><br />Consectetur adipiscing elit. Proin aliquam lorem sed urna viverra accumsan. Aliquam sit amet dui et diam rutrum aliquet. Sed vulputate, arcu vitae aliquet facilisis, ligula sem posuere nisl, sit amet pretium ligula dolor</span></li>
<li><span class="inner"><strong>Lorem ipsum dolor sit amet</strong><br />Consectetur adipiscing elit. Proin aliquam lorem sed urna viverra accumsan. Aliquam sit amet dui et diam rutrum aliquet. Sed vulputate, arcu vitae aliquet facilisis, ligula sem posuere nisl, sit amet pretium ligula dolor</span></li>
<li><span class="inner"><strong>Lorem ipsum dolor sit amet</strong><br />Consectetur adipiscing elit. Proin aliquam lorem sed urna viverra accumsan. Aliquam sit amet dui et diam rutrum aliquet. Sed vulputate, arcu vitae aliquet facilisis, ligula sem posuere nisl, sit amet pretium ligula dolor</span></li>
</ul> -->

            
        </div><!-- .entry-content -->
    </article><!-- /#post -->

        
    
            </div>
        </div><!-- /.row -->
    </div><!-- /.login-register -->
            </div><!-- /#main -->
        </div><!-- /.row -->

                    <div class="content-bottom-wrapper">
    <div class="content-bottom">
        <div class="content-bottom-inner">
                    </div><!-- /.content-bottom-inner -->
    </div><!-- /.content-bottom -->
</div><!-- /.content-bottom-wrapper -->
            </div><!-- /.container -->
</div>