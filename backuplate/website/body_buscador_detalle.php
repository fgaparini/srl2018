<div id="contenedorInt">
    <div id="cont_int">
        <div id="fichasD">
            <div id="toplinks" align="left">
               <a href="<?php echo $urlback ?>"><< Volver a la Busqueda</a>
            </div>
       <!-- TITULO FICHAS & SOCIAL MEDIA -->
            <div class="tituloSocial" align="left">
                <!-- TITULO  -->
                <div>
                    <h1 align="left">
                        <?php echo $row_Al['TipoAlojamiento']; ?> <?php echo $row_Al['Nombre']; ?> (paso 2/3)
                    </h1>
                </div>
                <?php $direccion = "http://".$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']; ?>
                <div id="fb-root"></div>
                
        <!--SOCIAL MEDIA -->
                <div align="rigth">
                    <div id="share" align="rigth">
                        <!-- TWITTER -->
                        <div>
                           </div><!-- FACEBOOK -->
                        <div>
                        </div><!--GOOGLE PLUS-->
                        <div>
                           
                        </div>
                    </div>
                </div>
            </div>
 
  <!-- FICHAS INFORMARIVAS -->
   <div id="ficha_info" align="left">
  <div id="data_estadia" align="left"><b>Datos Estadia:</b> Desde <input type="text" class="fechass" value="<?php echo $fromEs; ?>" id="from"> hasta <input type="text" value="<?php echo $toEs; ?>" id="to"> <button id="cambiar_estadia">Cambiar</button> </div>
<h2>Seleccione Habitacion/Cabaña</h2>
<br>
<span>Ahora puedes realizar un reserva online. Seleccione la opcion y presione reservar.</span>
    <br><div id="habtable">
        <table class="habit">
            <tr class="cabecera">
                <td class="">
                    Tipo Habitacion
                </td>
                <td>
                    Condiciones
                </td>
                <td>
                    Cant.<br>
                    Habitaciones
                </td>
                <td>
                    Precio x<br>
                    <?php echo $cant_dias; ?> Noches
                </td>
                
                <td >
                    Total Reserva
                </td>
                
            </tr>
            <!-- obtengo cantidad de habitaciones -->
            <?php $cantidad_hab=count($habitaD); $x=0;?>
            <input type="hidden" id="cantidad_hab" value="<?php echo $cantidad_hab; ?>">
            <!-- Fecha de estadia -->
            <input type="hidden" id="fromes" value="<?php echo $fromEs; ?>">
            <input type="hidden" id="toes" value="<?php echo $toEs; ?>">
            <!-- Id alojamiento -->
            <input type="hidden" id="idalojar" value="<?php echo $row_Al['ID_Alojamiento'];?>">
            <!-- base url -->
            <input type="hidden" id="baseurl" value="<?php echo base_url(); ?>" >
           <!--  listo habitaciones del alojamiento  -->
          <?php if ($cantidad_hab>0) { ?>
            
          
            <?php foreach ($habitaD as $var) {
            $imghab= $this->dbbuscador->imagenHab($var['ID_Habitacion']);// obtengo imagenes habitaciones
            $cantimg=count($imghab);
            ?>
            <tr>
              <!-- Nombre de la habitacion -->
                <td class="namehab">
                    <?php if($cantimg>0){ ?><img src="<?php echo base_url().'upload/habitaciones/thumb/'.$var['ID_Habitacion'].'_1.jpg'; ?>" style="vertical-align:middle"><?php } ?> <span><b><?php echo $var['TipoHabitacion'].' '.$var['NombreHab'] ?></b></span>
                </td>
                <!-- Condiciones -->
                <td><ul>
                  <li><?php if ($var['Desayuno']!="Sin desayuno" ) {echo "c/ Desayuno ". ucwords($var['Desayuno']);} else {echo "Sin Desayuno";} ?></li>
                 <?php if($var['totalM']<$var['totalN']){

                       $descuento[$var['ID_Habitacion']]=round((1-$var['totalM']/$var['totalN'])*100);
                       echo "<li class='descuentohab'>".$descuento[$var['ID_Habitacion']]."% OFF</li>";
                    }  ?>
                    <li>Impuesto Incluidos</li>
                </ul>
                 
                   <!-- cantidad de Habitacion  -->
                   
                </td>
                <td>
                    <?php echo '<select name="cant_hab" style="padding: 6px 4px; width:50px; " id="cant_hab_'.$x.'" class="calcularhab" rel="'.$var['ID_Habitacion'].'">';
                                            for ($i=0; $i <=$var[ 'minD']; $i++) { 
                                              echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                          echo '</select><br>'; ?>
                </td>
                <!-- tarifa x habitacion por la cantidad de dias  -->
                <td class="tarifa">
                    <?php if($var['totalM']<$var['totalN']){echo "<span class='oferta'>$".$var['totalN']."</span><br>";echo "<b>$".$var['totalM']."</b>"; echo '<input type="hidden" id="tarifa_hab_'.$x.'" value="'.$var['totalM'].'">';} else {echo "<b>$".$var['totalN']."</b>";echo '<input type="hidden" id="tarifa_hab_'.$x.'" value="'.$var['totalN'].'">';} ?>
                    <input type="hidden" id="idhab_<?php echo $x;?>" value="">
                </td>
                <!-- total de la reserva y botones para reservar -->
                <?php if($x==0) { ?>
                <td rowspan="<?php echo $cantidad_hab; ?>" id="totalreserva" >
                    <input type="hidden" id="totalreseva" value="0">
                    <div id="totalhab" style="display:none">$0</div><br>
                    <div id="reservarB" style="display:none"><button id="reservarhab" onclick="_gaq.push(['_trackEvent','Reserva1','reservar','<?php $row_Al['Nombre']; ?>']);">Reservar >></button></div>
                    <div id="selecthab" style="color:red; font-size:11px;font-weight:normal">Selecione cantidad de habitaciones</div>
                    <div id="promosbanco" style="color:#666; font-size:11px;font-weight:normal;display:none">Pague con deposito o con tarjeta en hasta 12 cuotas sin interes </div>
                </td>
                <?php } $x++; ?>

            </tr><?php } ?>

            <?php } else {echo "<tr><td colspan='5'>El alojamiento no cuenta con Tarifas Actualizadas.</td></tr>";} ?>
        </table>
    </div>

  <h2>Información Alojamiento</h2>
                
<div id="ficha-tabs2" align="center">
    <ul>
        <li id="fotosAlojar">
            <a href="#tabs-11">Fotos</a>
        </li>
        <li id="tabDescrip">
            <a href="#tabs-12">Descripcion</a>
        </li>
        <li id="tabServ">
            <a href="#tabs-22">Servicios</a>
        </li>
        <li id="mapaAlojar">
            <a href="#tabs-31">Ubicacion</a>
        </li>
       
    </ul>
    <div id="tabs-11" align="center">
        <!-- GALERIA FOOTOS -->
        <div id="gallery" class="ad-gallery" align="center">
            <div class="ad-image-wrapper"></div>
            <div class="ad-nav">
                <div class="ad-thumbs">
                    <ul class="ad-thumb-list">
                      <?php $i=0; foreach ($row_FA as $var) { ?>
                        <li>
                          <a href="<?php echo base_url()."upload/alojamientos/".$var['ID_Alojamiento']."_".$var['NombreImagen'].".jpg" ?>">
                            <img src="<?php echo base_url()."upload/alojamientos/thumb/".$var['ID_Alojamiento']."_".$var['NombreImagen'].".jpg" ?>" <?php if ($i==0) { ?>class="image0"<?php } ?> alt="<?php echo $var['ImagenDescripcion']; ?>"> 
                          </a>
                        </li>
                      <?php  $i++;} ?>
                    </ul>
                </div>
            </div>
        </div>
        <div id="descriptions"></div>
    </div><!-- FIN GALERIA -->
    <div id="tabs-12">
        <div id="descripcion" align="left">
            <?php echo $row_Al['Descripcion'] ?>
        </div>
    </div>
   <div id="tabs-22"> 
      <div id="servicios" align="left">
        <div id="servicios">
        <ul>
          <?php foreach ($row_S as $var) { ?>
                  <li>
                    <img src="<?php echo  base_url()."iconos/yes.png" ?>" alt=" Servicios <?php echo $row_Al['Nombre'] ." - ".$var['Servicio'] ;?>"><?php echo $var['Servicio'] ?>
                  </li>
          <?php } ?> 
        </ul>
      </div>
    </div>
  </div>
   
    <div id="tabs-31">
        <input type="hidden" id="cordeMap" value="<?php echo $row_Al['Coordenadas']; ?>">
        <div id="map">
          
        </div>
    </div>
</div>
</div>
  <!-- FICHAS DATOS -->
  <div id="ficha_datos">

<script type="text/javascript" async="async" defer="defer" src="https://dattachat.com/chat/cargar/wid/528f68be2fa8e460042716"></script>
<a href="javascript:;" onclick="dcJs.startSend()"><img style="border:0px;" id="dc_ImgStatus" src="https://dattachat.com/chat/img/wid/528f68be2fa8e460042716" /></a>
 <div id="res0800" align="center">
        <span class="reservar">Reservas al</span><br>
        <span class="r0800">0800 122 5588</span><br>
        <span class="infohora">Lun. a Sab.  de 9h a 22h <br></span>
      </div>
      <div><span><b>Paga en Cuotas</b></span><br><br><a href="www.mercadolibre.com.ar/promociones-bancos" title="Promociones de Pago con tarjeta Sin Interes"><img src="<?php echo base_url()."imagenes/mercadopago.jpg" ?>" alt=" Pague en Hasta 12 Cuotas sin Interes! - San Rafael Late"></a>
</div>

  
</div>
    </div>
  </div>
</div>
  <!-- <script type="text/javascript" async="async" defer="defer" src="https://dattachat.com/chat/cargar/wid/51b78919535a2659791174"></script>
<a href="javascript:;" onclick="dcJs.startSend()"><img style="border:0px;" id="dc_ImgStatus" src="https://dattachat.com/chat/img/wid/51b78919535a2659791174" /></a>  -->