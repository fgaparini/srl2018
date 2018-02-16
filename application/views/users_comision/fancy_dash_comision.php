
<!-- Content -->
<style>
    h2 span {color:#222;}
    h2.titulos {color:#000; font-size: 18px; text-shadow: 1px 1px 2px #ccc; margin: 14px 0 5px 0; padding: 0px; }
</style>    

<article class="container_12">
    <div class="block-content no-title">
        <div class="grid_3">
            <h2>Reserva hola Nº <?php echo $id_reserva ?></h2>
        </div>
        <div class="grid_6">    <ul  class="keywords">
                <span>Estado Reserva: </span>
                <?php if ($reserva['estado_reserva'] == 'P'): ?>
                    <li class="orange-keyword">PENDIENTE</li>
                <?php elseif ($reserva['estado_reserva'] == 'R'): ?>
                    <li style="background-color:#9ad717">CONFIRMADO</li>
                <?php elseif ($reserva['estado_reserva'] == 'C'): ?>
                    <li class="" style="background-color:red">CANCELADO</li>
                <?php elseif ($reserva['estado_reserva'] == 'CH'): ?>
                    <li style="background-color: #9ad717 ">CHECK-IN</li>
                <?php endif; ?></ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="block-content no-title">
        <h2 class="titulos">  Datos Huesped </h2>
        <hr>
        <div class="grid_7">
            <h2>Nombre:<span class="margin-left"><?php echo $reserva['ApellidoHuesped'] . ", " . $reserva['NombreHuesped'] ?></span> </h2>
            <h2>Email:<span class="margin-left"><?php echo $reserva['EmailHuesped'] ?></span></h2>


        </div>
        <div class="grid_5">
            <h2>Teléfono Fijo:<span class="margin-left"><?php echo $reserva['TelefonoFijo'] ?></span> </h2>
            <h2>Teléfono Celular:<span class="margin-left"><?php echo $reserva['TelefonoCelular'] ?></span> </h2>
        </div>

        <div class="clear"></div>
        <p></p>
        <h2 class="titulos"> Datos Estadia </h2>
        <hr>

        <div class="grid_7">
            <h2>Total Reserva:<span class="margin-left">$<?php echo $reserva['costo_total'] ?></span></h2>
            <h2>Cantidad dias:<span class="margin-left"><?php echo $reserva['cant_dias'] ?></span></h2>
            <h2>Reservo:<span class="margin-left">
                    <?php foreach ($rows_hab as $var): ?>
                        <?php echo $var['NombreHab'] . ", " ?>
                    <?php endforeach; ?></span></h2>
        </div>
        <div class="grid_5">
            <h2>Ingreso:<span class="margin-left"><?php echo $this->gf->html_mysql($reserva['fecha_ingreso']) ?></span></h2>
            <h2>Salida:<span class="margin-left"><?php echo $this->gf->html_mysql($reserva['fecha_salida']) ?></span></h2>
            <h2>Fecha Reserva:<span class="margin-left"><?php echo $this->gf->html_mysql($reserva['fecha_reserva']) ?></span></h2>
        </div>

        <div class="clear"></div>

        <div style="background: #eee; padding: 12px 0; margin: 10px 0 5px 0">
            <div class="grid_7">
                <h2>Pago Seña:<span class="margin-left"><?php echo ($reserva['monto_pago'] == "") ? "Falta desposito" : "$" . $reserva['monto_pago'] ?></span></h2>
            </div>
            <div class="grid_5">
                <h2>Falta Pagar:<span class="margin-left">$<?php echo $reserva['costo_total'] - $reserva['monto_pago'] ?></span></h2>
            </div>

            <div class="clear"></div>
        </div>

        <div class="grid_7">
            <h2>Observaciones:<span class="margin-left" style="font-size: 12px; font-weight: normal;"><?php echo strip_tags($reserva['observaciones']) ?></span> </h2>
            
            
        </div>
        <div class="grid_5">
            <h2>Cantidad Personas:<span class="margin-left"><?php echo $reserva['cant_pasajeros'] ?></span> </h2>
                  
        </div>
        
        <div class="clear"></div>
        <hr>
        <div class="grid_7">
            <?php if ($reserva['web_reserva'] == 'SRL'): ?>
                <h2  style="color:#222">Reservado por sanrafaellate.com.ar </h2>
            <?php else: ?>
                <h2  style="color:#222">Reservado por <?php echo $reserva['web_reserva'] ?></h2>
            <?php endif ?>
        </div>
        <div class="grid_5">
            <a target="_blank" href="<?php echo base_url()."users_comision/dash_comision/dash_reservas_pdf/?id_reserva=".$id_reserva ?>" class="button">Imprimir PDF</a>
        </div>

        <div class="clear"></div>
    </div>

    <div style="background-color: #1eafdc; color: white; padding: 5px;">
        Sistema de Gestión de Alojamientos <b>AVANBOOK.com</b> adaptado para San Rafael Late</b>
        <br>
        <br>
        <hr style="background:#eee">
        Es un producto de <b style="color:#222">Avan</b><b>BOOK</b><b style="color:#222">.com</b>
    </div>


</article>