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
          Último Paso : Confirme Ahora !
          </h1>
          <p style="padding:0 15px 0 30px"><b>Confirme su reserva ahora!</b>. Esta reserva sera supervisada por un operador en menos de 24hs.
          Una vez supervisada le llegará un email con el detalle de la misma y datos para confirmarla mediante el metodo de pago/seña seleccionado.</p>
        </div>
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
          
          
          <!-- RESERVAR ALOJAMIENTO -->
          <div id="ficha_info">
            <div class="div_reserva" align="left">
              <form action="<?php echo base_url()."website/reservar_fin/guardar_reserva" ?>" method="post" class="form_reserva">

                <!-- DATOS HUESPEDES -->
                <h3>Datos Huesped</h3>
                <hr>
                <div>
                  <div>
                    <label for="nombrehuesped">Nombre/s</label><br><input type="text" name="nombreH" Placeholder="Ej:Juan ">
                  </div>
                  <div>
                    <label for="apellidhuesped">Apellido/s</label><br><input type="text" name="apellidoH" Placeholder="Ej:Perez ">
                  </div>
                  
                  <div>
                    <label for="emailhuesped">Email</label><br><input type="email" name="emailH"  Placeholder="Ej:juanperez@gmail.com ">
                  </div>
                  <div>
                    <label for="telefonohuesped">Telefono</label><br><input type="text" name="telefonoH" Placeholder="Ej:01145456622 ">
                  </div>
                </div>

                <!-- METODOS DE PAGO  -->
                <h3>Metodo de Pago</h3>
                <hr>
                <div>
                  <p style="padding-left:10px;">Selecciona Metodo de Pago y/o Confirmacion Reserva.<br>
                  Para cualquier metodo puede pagar mediante Transferencia/deposito bancario o en hasta 12 cuotas sin interes con tarjeta de credito (<a href="http://www.mercadolibre.com.ar/promociones-bancos" target="_blank">ver Promociones >></a>).</p>
                 <!-- SELECCION METODO -->
                  <div>
                    
                    <label for="nombrehuesped">Metodo de Pago</label>
                    <select name="MP" id="fromapago">
                      <option value="sp" selected>Seleccione Metodo Pago..</option>
                      <?php if ($MP['Anticipado']==1): ?>
                      <option value="A">Pago Total Anticipado</option>
                      <?php endif ?>
                      <?php if ($MP['AceptaSenia']==1): ?>
                      <option value="S">Pago con Seña <?php echo $MP['Senia'] ; ?>% ( resto al Llegar) </option>
                      <?php endif ?>
                      <?php if ($MP['AceptaSenia']!=1 && $MP['Anticipado']!=1 ): ?>
                      <option value="G">Pago en <?php echo $row_Al['TipoAlojamiento']; ?></option>
                      <?php endif ?>
                    </select>
                  </div>
                  <!-- DESCRIPCION PAGO -->
                  <div class="descrip_MP">
                    <div id="sp" class="visible" >
                      <p>
                      <h3>Selecione Metodo de Pago</h3>
                      <hr>
                      <span>Debe Seleccionar un Metodo de pago y/o confirmacion de su Reserva. Se le detallara condiciones de pago y montos.</span><br>
                      
                      </p>
                    </div>
                    <?php if ($MP['Anticipado']==1){ ?>
                    <!-- Descripcion pago anticipado  -->
                    <div id="A" class="oculto" >
                      <p  >
                      <h3>Pago Anticipado</h3>
                      <hr>
                      <span>Pago el total de la reserva Anticapado.</span><br>
                      <span style="font-size:14px"><b>Total a pagar:</b> $<?php echo $total_reserva ?></span>
                      </p>
                    </div>
                    <?php }
                    if ($MP['AceptaSenia']==1) { ?>
                    <!-- Descripcion pago con seña -->
                    <div id="S" class="oculto" >
                      <p >
                      <h3>Pago Franccionado (Seña)</h3>
                      <hr>
                      <span>Paga <?php echo $MP['Senia'] ?>% de seña y el Resto al Llegar al Alojamiento.</span><br>
                      <span class="sena"><b>Total Seña: $<?php $total_senia=$total_reserva*$MP['Senia']/100; echo  $total_senia; ?></b></span><br>
                      <span class="llegar"><b>Total pago al Llegar:</b> $<?php echo $total_reserva-$total_senia ?></span>
                      </p>
                    </div>
                    <?php } ?>
                    <?php if ($MP['AceptaSenia']!=1 && $MP['Anticipado']!=1 ) { ?>
                    <!-- Descripcion pGarantia de Tarjeta-->
                    <div id="G" class="oculto" >
                    <h3>Pago en <?php echo $row_Al['TipoAlojamiento'] ?></h3>
                    <hr>
                    <span>Paga el total de la reserva al llegar al Alojamiento.</span><br>
                    <span>Como garantía de su llegada utilizaremos los datos de una <b>tarjeta de crédito</b>. <br>
                    <b>NO</b> se realizarán ningun tipo de cargo sobre ella. En caso que no presentarse se aplicarán cargos segun politicas de cancelación. <br> Estos datos se le solicitaran via telefónica.</span>
                    </div>
                    <?php } ?>
                </div>
               <!-- FIN DESCRIP PAGO -->
              </div>      
    <h3>Comentarios</h3>
                <hr>

                <div ><p style="padding:5px 10px;">Puede dejarnos algun comentario u observación de la reserva. </p>
                  <textarea name="comentarios" id="" cols=""  rows="5"></textarea>
                </div>
              
                 <button>Reservar!</button>
                 <input type="hidden" name="id_hab" value="<?php echo $id_habs; ?>" >
                 <input type="hidden" name="tarifas" value="<?php echo $tarifas; ?>" >
                 <input type="hidden" name="cant_hab" value="<?php echo $cant_habs; ?>" >
                 <input type="hidden" name="from" value="<?php echo $from ?>" >
                 <input type="hidden" name="to" value="<?php echo $to; ?>" >
                 <input type="hidden" name="id_alojar" value="<?php echo $row_Al['ID_Alojamiento']; ?>" >

              </form>
              
            </div>
          </div>
          <!-- FICHAS DATOS -->
          <div id="ficha_datos">
            
            <div class="cont_DR" align="left">
              <div class="titulo_DR"><span>Datos de la Reserva</span></div>
              <!-- contenedor tarifas estadia -->
              <div class="total-reservas" align="center">
                <h3>Total Reserva: <span class="moneda">ar$ </span><span class="monto-total"><?php echo $total_reserva ?></span></h3>
                <p>Total por <?php echo $cant_dias ?> noches c/ Impuestos Incluidos</p>
              </div>
              <!-- fin contenedor tarifas -->
              <?php
              $id_hab_count= count($id_hab);
              $cant_hab_count= count($cant_hab);
              $tarifas_arr_count= count($tarifas_arr);
              ?>
              <h3>Detalle Reserva</h3>
              
              <div class="datos-habitacion">
                <ul>
                  <li>
                    <div class="nombre-hab"><strong>Nombre Hab</strong></div>
                    <div class="cant-hab" align="center"><strong>Cantidad</strong></div>
                    <div class="tarifa-hab" align="center"><strong>Tarifa/ Noche</strong></div>
                  </li><hr>
                  <?php
                  for ($i=0; $i <$cant_hab_count ; $i++) {
                  
                  if ($id_hab[$i]>0 || $id_hab[$i]!=null )
                  {
                  $hab[$i]= $this->dbbuscador->detalleHab($id_hab[$i]);
                  ?>
                  <li>
                    <div class="nombre-hab"><?php echo ucwords($hab[$i]['TipoHabitacion']." ".$hab[$i]['NombreHab']) ?></div> <div class="cant-hab" align="center"><?php echo $cant_hab[$i] ?></div>  <div class='tarifa-hab' align="center">ar$ <?php echo $cant_hab[$i] * $tarifas_arr[$i]/$cant_dias ?> </div>
                  </li>
                  <?php
                  }
                  }
                  
                  ?>
                </ul>
              </div>
              <div class="datos-estadia">
                <div class="datos-alojar">
                  <img src="<?php echo base_url()."upload/alojamientos/thumb/".$row_Al['ID_Alojamiento']."_1.jpg"; ?>" alt="<?php echo $row_Al['TipoAlojamiento']." ".$row_Al['Nombre'] ;?>" >
                  <h3><?php echo $row_Al['TipoAlojamiento']." ".$row_Al['Nombre']; ?></h3>
                  <p><?php echo $row_Al['Direccion'] ?><br><br><strong>0800 122 5588</strong></p>
                </div>
                <div class="fechas">
                  <div>Llegada:<strong><?php echo $from ?></strong></div>
                  <div>Salida:<strong><?php echo $to ?></strong></div>
                </div>
              </div>


              
            </div>
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