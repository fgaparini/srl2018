<div id="contenedorInt">
    <div id="cont_int">
        <div id="fichasD">
            <div id="toplinks" align="left">
               <a href="<?php echo base_url() ?>"><< Ir al Home</a>
            </div>
       <!-- TITULO FICHAS & SOCIAL MEDIA -->
            <div class="tituloSocial" align="left">
                <!-- TITULO  -->
                <div>
                    <h1 align="left">
                       Gracias por su Reserva!
                    </h1>
                </div>
                <?php $direccion = "http://".$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']; ?>
                <div id="fb-root"></div>
                
        <!--SOCIAL MEDIA -->
                <div align="rigth">
                    <div id="share" align="rigth">
                        <!-- TWITTER -->
                        <div></div><!-- FACEBOOK -->
                        <div></div><!--GOOGLE PLUS-->
                        <div></div>
                    </div>
                </div>
            </div>
 
  <!-- FICHAS INFORMARIVAS -->
  <div id="ficha_info" align="left">
    <p>Estimado <b> <?php echo $ApellidoHuesped.", ".$NombreHuesped; ?> </b> su reserva será supervisada y procesada por un operador en menos de 24hs. Si la reserva no presenta inconvenientes le llegará a su email (<?php echo $EmailHuesped ?>) con los datos para proceder a confrimar su reserva. </p>
    <p>En caso contrario sera avisado del inconveniente en su reserva via email. </p>
    <p>Para cualquier duda o consulta escríbanos a reservas@sanraafellate.com.ar o llámenos al <b>>0800 122 5588 </b>nuestro télefono de atención al cliente</p>
  </div>
  <!-- FICHAS DATOS -->
  <div id="ficha_datos">
    <p></p>
<img src="<?php echo base_url()."imagenes/mercadopago.jpg" ?>" alt=" Pague en Hasta 12 Cuotas sin Interes! - San Rafael Late">
</div>
    </div>
  </div>
</div>
  <!-- <script type="text/javascript" async="async" defer="defer" src="https://dattachat.com/chat/cargar/wid/51b78919535a2659791174"></script>
<a href="javascript:;" onclick="dcJs.startSend()"><img style="border:0px;" id="dc_ImgStatus" src="https://dattachat.com/chat/img/wid/51b78919535a2659791174" /></a>  -->