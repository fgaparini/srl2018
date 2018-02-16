<!-- LOCALIZADOR -->
<p style="color:#666; font-family: tahoma; font-size:16px;"> Localizador / Número de Reserva :	<span style="color:#9EAD47; font-family: tahoma; font-size:16px;"><b><?php echo $localizador ?></b></span>	 </p>
<!-- DATAOS ESTADIA -->
<table style="width:100%">
    <thead style="background-color: #D6DDAC">
        <tr style="color:#000; font-size:14px;">
            <th style="width:50%; padding: 2px 0 2px 10px;" colspan="2" align="left"><span> Datos de estadia</span></th>

    </thead>
    <tbody>
        <tr>
            <td style="width:40%; padding: 10px;">
                <span style='color:#666666'>
                    <b>Llegada</b>: <?php echo $fecha1 ?><br />

                    <b>Salida:</b> <?php echo $fecha2 ?><br />

                    <b>Dias de Estadia:</b> <?php echo $cant_dias ?> <br />


                </span>
            </td > 
            <td style="width:60%; padding: 10px;"> 
                <span style='color:#666666'>
                    <b>Cantidad de Pasajeros:</b> <?php echo $cant_paxs ?><br />
                    <b>Forma de Pago Seleccionada :</b> <?php echo $pago3 ?><br />
                    <span style='color:#000; font-size:16px; background-color: #fff;'>
                        <b>Total Estadía: $<?php echo $total_estadia ?> </b>
                    </span>


            </td>
        </tr>
        <!-- OBS CLIENTE	 -->
        <tr><td colspan="2" style="padding: 10px;"><b>Observación Cliente:</b></td></tr>
        <tr><td colspan="2" style="padding: 0 10px;"><?php echo $consulta ?></td></tr>
    </tbody>

</table><br/>
<!-- DATAOS HUESPED -->
<table style="width:100%">
    <thead style="background-color: #D6DDAC">
        <tr style="color:#000; font-size:14px;">
            <th style="width:50%; padding: 2px 0 2px 10px;" colspan="2" align="left"><span> Datos de Huesped</span></th>

    </thead>
    <tbody>
        <tr>
            <td style="width:40%; padding: 10px;">
                <span style='color:#666666'>
                    <b>Nombre</b>: <?php echo $nombre; ?> <br />
                    <b>Tel. Fijo</b>: <?php echo $telefono; ?><br />
                    <b>Tel. Celular</b>: <?php echo $telefono_celular; ?><br />
                    <?php if (isset($ciudad)): ?>
                        <b>Ciudad</b>: <?php echo $ciudad; ?><br />
                    <?php endif ?>                                 

                </span>
            </td > 
            <td style="width:60%; padding: 10px;"> 
                <span style='color:#666666'>
                    <b>Apellido</b>: <?php echo $apellido; ?><br />
                    <b>Email</b>: <?php echo $email; ?><br />
                    <?php if (isset($provincia)): ?>
                        <b>Ciudad</b>: <?php echo $provincia; ?><br />
                    <?php else: ?>
                        <b>&nbsp</b>;
                    <?php endif ?>
                    <b>&nbsp;</b>
            </td>
        </tr>

    </tbody>
</table>