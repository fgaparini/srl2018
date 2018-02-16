<!doctype html>
    <head>
        <meta charset="UTF-8">
        <style>
                table td {height: 24px; padding:4px;vertical-align: "center"}
                .title_H{padding: 10px; border-bottom:1px solid #222;}
        </style>
    </head>

    <body>

        <table width="100%">
            <tr><td colspan="4" align="center">  <h1>  VOUCHER RESERVA </h1>  </td></tr>
            <tr><td colspan="4">    </td></tr>
            <tr>
                <td><h3>Reserva Nº <?php echo $id_reserva ?></h3>
                </td><td>&nbsp;</td>
                <?php if ($reserva['estado_reserva'] == 'P'): ?>
                    <td><h3>Estado Reserva: PENDIENTE</h3></td>
                <?php elseif ($reserva['estado_reserva'] == 'R'): ?>
                    <td><h3>Estado Reserva: CONFIRMADO</h3></td>
                <?php elseif ($reserva['estado_reserva'] == 'C'): ?>
                    <td><h3>Estado Reserva: CANCELADO</h3></td>
                <?php elseif ($reserva['estado_reserva'] == 'CH'): ?>
                    <td><h3>Estado Reserva: CHECK-IN</h3></td>
                <?php endif; ?>    
                <td>&nbsp;</td>
            </tr>
            <tr><td colspan="4">    </td></tr>
            <tr ><td colspan="4" class="title_H" valign="center"><h2 style="margin:10px">Datos Huesped</h2></td></tr>
            <tr><td colspan="4">    </td></tr>
            <tr><td>Nombre:</td><td><?php echo $reserva['ApellidoHuesped'] . ", " . $reserva['NombreHuesped'] ?></td><td>Fijo:</td><td><?php echo $reserva['TelefonoFijo'] ?></td></tr>
            <tr><td>Email:</td><td><?php echo $reserva['EmailHuesped'] ?></td><td>Celular</td><td><?php echo $reserva['TelefonoCelular'] ?></td></tr>
            <tr><td colspan="4" class="title_H"><h2>Datos Estadía</h2></td></tr>
            <tr><td colspan="4">    </td></tr>
            <tr><td>Total reserva:</td><td>$<?php echo $reserva['costo_total'] ?></td><td>Ingreso:</td><td><?php echo $this->gf->html_mysql($reserva['fecha_ingreso']) ?></td></tr>
            <tr><td>Cantidad dias:</td><td><?php echo $reserva['cant_dias'] ?></td><td>Salida:</td><td><?php echo $this->gf->html_mysql($reserva['fecha_salida']) ?></td></tr>
            <tr>
                <td>Reservo:</td>
                <td>
                    <?php foreach ($rows_hab as $var): ?>
                        <?php echo $var['NombreHab'] . ", " ?>
                    <?php endforeach; ?>
                </td>
                <td>Fecha reserva:</td>
                <td><?php echo $this->gf->html_mysql($reserva['fecha_reserva']) ?></td>
            </tr>
            <tr>
                <td>Pago seña:</td>
                <td><?php echo ($reserva['deposito'] == "") ? "Falta desposito" : "$" . $reserva['deposito'] ?></td>
                <td>Falta pagar:</td>
                <td>$<?php echo $reserva['costo_total'] - $reserva['deposito'] ?></td>
            </tr>
            <tr><td>Cantidad personas:</td><td><?php echo $reserva['cant_pasajeros'] ?></td><td></td><td></td></tr>
            <?php if ( $reserva['observaciones']!="" AND $reserva['observaciones']!=0  ): ?>
            <tr><td>Observaciones:</td><td colspan="3"><?php echo strip_tags($reserva['observaciones']) ?></td></tr>    
        <?php endif ?>
      
            <tr><td colspan="4"><strong>   <?php if ($reserva['web_reserva'] == 'SRL'): ?>
                <p  style="color:#222">Reservado por sanrafaellate.com.ar </p>
            <?php else: ?>
                <p  style="color:#222">Reservado por <?php echo $reserva['web_reserva'] ?></p>
            <?php endif ?> </strong></td></tr>
            <tr><td colspan="4">Sistema de Gestión de Alojamientos <strong>AVANBOOK.com</strong> adaptado para San Rafael Late</td></tr>
            <tr><td colspan="4" class="title_H"></td></tr>
            <tr><td colspan="4">www.avanbook.com | Gestion facil e inteligente</td></tr>
        </table>
    </body>
</html>