

<div id="footer-wrapper">
    <div id="footer-top">
        <div id="" class="container">
            <div class="row">
                <div class="widget  span5">
                    <div class="title">
                        <h2>Accesos Rapidos</h2>
                    </div><!-- /.title -->

                    <div class="content">    
                        <ul class="nav">
                        <?php foreach ($TipoProp as $var): ?>

                         <li style="display:inline-block; margin:5px;background-image:none;list-style:disc;list-style-position:inside;">+ <a href="<?php echo base_url()."propiedadessrl/buscador/".$var['TipoPropiedades']."/0/venta/0/0" ?>" title="<?php echo $var['TipoPropiedades']  ?> en Venta en San Rafael">Venta de <?php echo $var['TipoPropiedades']  ?></a></li>  
                         <!-- SI SE PUEDE ALQUILAR -->
                          <?php if ($var['TipoPropiedades']=="casa" or $var['TipoPropiedades']=="Departamento"): ?>
                           <li style="display:inline-block; margin:5px;background-image:none;list-style:disc;list-style-position:inside;"><a href="<?php echo base_url()."propiedadessrl/buscador/".$var['TipoPropiedades']."/0/alquiler/0/0" ?>" title="<?php echo $var['TipoPropiedades']  ?> en Alquiler en San Rafael">Alquiler de <?php echo $var['TipoPropiedades']  ?></a></li>  
                            <?php endif ?>  
                        <?php endforeach ?>
                    </ul>
                    </div><!-- /.content -->
                </div><!-- /.properties-small -->


                <div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Menu</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <ul class="menu nav">
                            <li class="first leaf"><a href="<?php echo base_url()."/propiedadessrl/home" ?>">Home</a></li>
                            <li class="leaf"><a href="<?php echo base_url()."/propiedadessrl/listado/venta" ?>">Propiedades en Venta </a></li>
                            <li class="leaf"><a href="<?php echo base_url()."/propiedadessrl/listado/alquiler" ?>">Propiedades en Alquiler </a></li>
                            <li class="leaf"><a href="<?php echo base_url()."/propiedadessrl/publica" ?>">Publicar Porpiedad!</a></li>
                            <li class="leaf"><a href="<?php echo base_url()."/propiedadessrl/contacto" ?>">Contacto</a></li>
                        
                        </ul>
                    </div><!-- /.content -->
                </div><!-- /.widget -->

                <div class="widget span3" align="center">
                  
                    <div class="content">
                        <div class="widget span3">
                            <div class="logo" align="center">
                                                <a href="<?php echo base_url()."propiedadessrl/home" ?>" title="Home">
                                                    <img src="<?php echo base_url() ?>propiedades-asset/img/logo.png" alt="Home">
                                                </a>   
                                                <div class="site-name" style="color:#fff; font-size:20px;">
                                               <strong>Propiedades SRL</strong>   
                                            </div>

                                            <div class="" style="color:#C5D1E0;font-size:12px;margin-top:2px;">
                                               Una Casa..Una Vida
                                            </div>
                                            </div>

                        </div>
                        <div class="content" align="center">
                            Un desarrollo de <br>
                            <a href="http://dbgcreative.com.ar">
                              <img src="<?php echo base_url() ?>propiedades-asset/img/logo-dbg.png" style="width:150px;height:auto;" alt="Diseño web | Marketing Online | Software Factory">
                            </a>
                        </div>
                        <br>
                         <div class="content" align="center">
                             <a href="http://sanrafaellate.com.ar">
                            <img src="<?php echo base_url() ?>/logo_nuevo2.png" style="width:150px;height:auto;" alt="Portal de Turismo den San Rafael">
                            <p>Turismo en San Rafael</p>
                            </a>
                         </div>
                    </div><!-- /.content -->
                </div><!-- /.widget -->
            </div><!-- /.row -->
        </div><!-- /#footer-top-inner -->
    </div><!-- /#footer-top -->

    <div id="footer" class="footer container">
        <div id="footer-inner">
            <div class="row">
                <div class="span6 copyright">
                    <p>© Copyright 2014 by <a href="http://sanrafaellate.com.ar">SAN RAFAEL LATE</a>. All rights reserved.</p>
                </div><!-- /.copyright -->

                <div class="span6 share">
                    <div class="content">
                        <!-- <ul class="menu nav">
                            <li class="first leaf"><a href="http://www.facebook.com" class="facebook">Facebook</a></li>
                            <li class="leaf"><a href="http://flickr.net" class="flickr">Flickr</a></li>
                            <li class="leaf"><a href="http://plus.google.com" class="google">Google+</a></li>
                            <li class="leaf"><a href="http://www.linkedin.com" class="linkedin">LinkedIn</a></li>
                            <li class="leaf"><a href="http://www.twitter.com" class="twitter">Twitter</a></li>
                            <li class="last leaf"><a href="http://www.vimeo.com" class="vimeo">Vimeo</a></li>
                        </ul> -->
                    </div><!-- /.content -->
                </div><!-- /.span6 -->
            </div><!-- /.row -->
        </div><!-- /#footer-inner -->
    </div><!-- /#footer -->
</div><!-- /#footer-wrapper -->
</div><!-- /#wrapper -->
</div><!-- /#wrapper-outer -->



<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true"></script>
<script type="text/javascript" src="<?php echo base_url() ?>propiedades-asset/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>propiedades-asset/js/jquery.ezmark.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>propiedades-asset/js/jquery.currency.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>propiedades-asset/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>propiedades-asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>propiedades-asset/js/carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>propiedades-asset/js/gmap3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>propiedades-asset/js/gmap3.infobox.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>propiedades-asset/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>propiedades-asset/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>propiedades-asset/js/jquery.iosslider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>propiedades-asset/js/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>propiedades-asset/js/realia.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40414414-1', 'byaviators.com');
  ga('send', 'pageview');

</script>
</body>
</html>
