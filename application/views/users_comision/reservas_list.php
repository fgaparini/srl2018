<style>
    .button-pendiente {
        background: #ff9900;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        color: #ffffff;
        padding: 8px 15px;
        background: -moz-linear-gradient(
            top,
            #ff9900 0%,
            #ff3c00);
        background: -webkit-gradient(
            linear, left top, left bottom, 
            from(#ff9900),
            to(#ff3c00));
        -moz-border-radius: 12px;
        -webkit-border-radius: 12px;
        border-radius: 12px;
        border: 1px solid #ff3c00;
        -moz-box-shadow:
            0px 1px 3px rgba(000,000,000,0.5),
            inset 0px 0px 2px rgba(255,255,255,0.7);
        -webkit-box-shadow:
            0px 1px 3px rgba(000,000,000,0.5),
            inset 0px 0px 2px rgba(255,255,255,0.7);
        box-shadow:
            0px 1px 3px rgba(000,000,000,0.5),
            inset 0px 0px 2px rgba(255,255,255,0.7);
        text-shadow:
            0px -1px 0px rgba(000,000,000,0.4),
            0px 1px 0px rgba(255,255,255,0.3);


    }
    .button-pendiente:hover {background:#ff9900;border: 1px solid #ff3c00;}

    .button-checkin {
        background: #bcd11b;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        color: #ffffff;
        padding: 8px 15px;
        background: -moz-linear-gradient(
            top,
            #bcd11b 0%,
            #818f1a);
        background: -webkit-gradient(
            linear, left top, left bottom, 
            from(#bcd11b),
            to(#818f1a));
        -moz-border-radius: 12px;
        -webkit-border-radius: 12px;
        border-radius: 12px;
        border: 1px solid #818f1a;
        -moz-box-shadow:
            0px 1px 3px rgba(000,000,000,0.5),
            inset 0px 0px 2px rgba(255,255,255,0.7);
        -webkit-box-shadow:
            0px 1px 3px rgba(000,000,000,0.5),
            inset 0px 0px 2px rgba(255,255,255,0.7);
        box-shadow:
            0px 1px 3px rgba(000,000,000,0.5),
            inset 0px 0px 2px rgba(255,255,255,0.7);
        text-shadow:
            0px -1px 0px rgba(000,000,000,0.4),
            0px 1px 0px rgba(255,255,255,0.3);


    }
    .button-checkin:hover {background:#bcd11b;border: 1px solid #818f1a;}
    .button-confirmado {
        background: #3399cc;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        color: #ffffff;
        padding: 8px 15px;
        background: -moz-linear-gradient(
            top,
            #3399cc 0%,
            #21688c);
        background: -webkit-gradient(
            linear, left top, left bottom, 
            from(#3399cc),
            to(#21688c));
        -moz-border-radius: 12px;
        -webkit-border-radius: 12px;
        border-radius: 12px;
        border: 1px solid #21688c;
        -moz-box-shadow:
            0px 1px 3px rgba(000,000,000,0.5),
            inset 0px 0px 2px rgba(255,255,255,0.7);
        -webkit-box-shadow:
            0px 1px 3px rgba(000,000,000,0.5),
            inset 0px 0px 2px rgba(255,255,255,0.7);
        box-shadow:
            0px 1px 3px rgba(000,000,000,0.5),
            inset 0px 0px 2px rgba(255,255,255,0.7);
        text-shadow:
            0px -1px 0px rgba(000,000,000,0.4),
            0px 1px 0px rgba(255,255,255,0.3);
    }
    .button-confirmado:hover {background:#3399cc;border: 1px solid #21688c;}

</style>

<!-- Content -->
<article class="container_12">
    <section class="grid_12" >
        <div class="block-border">
            <div class="block-content">
                <!-- We could put the menu inside a H1, but to get valid syntax we'll use a wrapper -->
                <div class="h1 with-menu">
                    <h1>Reservas</h1>
                </div>
                <table class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Huesped</th>
                            <th scope="col">Desde</th>
                            <th scope="col">Hasta</th>
                            <th scope="col">Total</th>
                            <th scope="col">Pago</th>
                            <th scope="col">Faltan</th>
                            <th scope="col">Hecho por</th>
                            <th scope="col">Estado</th>
                            <th scope="col" >Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservas as $var): ?>
                            <tr>
                                <?php $falta = $var['costo_total'] - $var['monto_pago'] ?>
                                <td><?php echo $var['ApellidoHuesped'] . ", " . $var['NombreHuesped'] ?></td>
                                <td><?php echo $this->gf->html_mysql($var['fecha_ingreso']) ?></td>
                                <td><?php echo $this->gf->html_mysql($var['fecha_salida']) ?></td>
                                <td>$<?php echo $var['costo_total'] ?></td>
                                <td>$<?php echo $var['monto_pago'] ?></td>
                                <td><?php echo ($falta == 0) ? "<span style='color:green'><b>PAGADO</b></span>": "<span style='color:red'>$" . $falta . "</span>" ?></td>

                                    <td><?php echo $var['web_reserva'] ?> </td>
                                <td>
                                    <ul class="keywords">
                                        <?php if ($var['estado_reserva'] == 'P'): ?>
                                            <li style="background-color: #FF9900" >  <a class='inline with-tip' href="#" rel="<?php echo $var['Localizador'] ?>" title="Cambiar estado Reserva" >PENDIENTE</a></li>
                                        <?php elseif ($var['estado_reserva'] == 'R'): ?>
                                            <li  style="background-color: #3399CC"  ><a class='inline with-tip' href="#" rel="<?php echo $var['Localizador'] ?>" title="Cambiar estado Reserva" >CONFIRMADO</a></li>
                                        <?php elseif ($var['estado_reserva'] == 'C'): ?>
                                            <li class="" style="background-color:red">CANCELADO</li>
                                        <?php elseif ($var['estado_reserva'] == 'CH'): ?>
                                            <li style="background-color: #98ab1a "><a class='inline with-tip' href="#" rel="<?php echo $var['Localizador'] ?>" title="Cambiar estado Reserva" >CHECK IN</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </td>
                                <!-- The class table-actions is designed for action icons -->
                                <td class="table-actions " >
                                    &nbsp;&nbsp;
                                    <a  class="iframe_pago" href="<?php echo base_url() . "users_comision/dash_reservas/fancy_reservas_pago/?id_reserva=" . $var['Localizador'] ?>" title="Agregar seña reserva" ><img src="<?php echo base_url() ?>users/images/icons/fugue/application-export.png" width="16" height="16"></a>
                                    &nbsp;&nbsp;
                                    <a class="eliminar_reserva" href="#" rel="<?php echo $var['Localizador'] ?>" title="Eliminar" ><img src="<?php echo base_url() ?>users/images/icons/fugue/cross-circle.png" width="16" height="16"></a>
                                     &nbsp;&nbsp;
                                    <a href="#" class="voucher2" rel="<?php echo $var['Localizador'] ?>" title="voucher" ><img src="<?php echo base_url() ?>users/images/icons/fugue/magnifier.png" width="16" height="16"></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="clear"></div>
                
                <?php echo $links   ?>


                <!--<div class="block-controls">
                    <ul class="controls-buttons">
                        <li><a href="#" title="Previous">Prev</a></li>
                        <li><a href="#" title="Page 1" class="current"><b>1</b></a></li>
                        <li><a href="#" title="Page 2"><b>2</b></a></li>
                        <li><a href="#" title="Page 3"><b>3</b></a></li>
                        <li><a href="#" title="Next">Next</a></li>
                    </ul>
                </div> -->
            </div>
            
        </div>
    </section>
    <div class="clear"></div>
</article>


<div style='display:none'>
    <div id='inline_content' style='padding:10px; background:#fff;'>
        <h2>Modifique el Estado de la Reserva</h2>
        <button id="pendiente"  class="button-pendiente" type="button">Pendiente</button>
        <button id="reservado" class="button-confirmado" type="button">Confirmado</button>
        <button id="checkin"  class="button-checkin" type="button">Check-In</button> 

        <h2 style="color:#222; font-size: 14px; padding: 0px; margin: 20px 0 5px 0 ">Leyenda</h2>
        <ul class="keywords">

            <li style="background-color: #FF9900;width:" > PENDIENTE : reserva pendiente de seña </li>

            <li  style="background-color: #3399CC"  >CONFIRMADO: Reserva con seña</li>

            <li style="background-color: #98ab1a ">CEHCK IN : Huesped en Alojamiento, pago total de la estadia</li>

        </ul>
    </div>
</div>

<!--
<div style='display:none'>
    <div id='inline_content' style='padding:10px; background:#fff;'>
        <button id="pendiente" style="color: #FF9900" class="grey" type="button">Pendiente</button>
        <button id="reservado" style="color: #98ab1a" class="grey" type="button">Confirmado</button>
        <button id="checkin" style="color: #3399CC" class="grey" type="button">Check-In</button> 
    </div>
</div>

-->
<input type="hidden" id="ID_Alojamiento" value="<?php echo $ID_Alojamiento ?>">
<input type="hiden" value="<?php echo base_url() ?>" id="base_url" >