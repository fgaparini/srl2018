<div style="background-color: #D6DDAC;color:#000; font-size:14px;padding: 2px 0 2px 10px;font-weight: bold;"> Confirmación Reserva : Método y Tipo de Pago</div>
<p syle="">Ud eligio el siguiente Tipo y método de Pago/confirmación de la reserva:</p>
<!-- IPO SEÑA -->

<?php if ($metodo_pago == 'S'): ?>
    <?php $total_senia                  = ($senia * $total_estadia) / 100; ?>
    <?php $resto_senia                  = $total_estadia - $total_senia; ?>
    <p>
        <span style="color:#9EAD47;font-size:14px">
            <b>Pago Fraccionado (Seña + resto al llegar)</b>
        </span>
    </p>
    <p>
        Para confirmar la reserva debe realizar un pago de un <?php echo $senia ?> % del total de la reserva, mediante el <b>método de pago </b> elegido (si desea cambiar método de pago, envie un email a contacto@sanrafaellate.com solicitandolo).
    </p>
    <table width="60%">
        <tr><td style="font-size:14px;"><b>Liquidación Reserva</b></td></tr>
        <tr style="background-color: #fff;color:#000; padding:8px 5px;font-weight: bold;"><td>Total Estadía</td><td> $ <?php echo $total_estadia ?></td></tr>
        <tr style="background-color: #666;color:#fff; font-weight: bold;"><td style="padding:8px 5px;">Total Seña ( <?php echo $senia ?>% ) </td><td style="padding:8px 5px;">$ <?php echo $total_senia; ?></td></tr>
        <tr style="background-color: #fff;color:#000; padding: 10px 5px;"><td>Resto a pagar en alojamiento</td><td>$ <?php echo $resto_senia; ?></td></tr>
    </table>
    <?php $total_estadia_pagar          = $total_senia;
    $dataT['total_estadia_pagar'] = $total_estadia_pagar;
    ?>
    <?php if ($tipo_pago == 'B'): ?>
        <?php $this->load->view('admin/mails/datos_banco'); ?>
    <?php elseif ($tipo_pago == 'T'): ?>
        <?php $this->load->view('admin/mails/pago_tarjeta', $dataT); ?>
    <?php elseif ($tipo_pago == 'A'): ?>
        <?php $this->load->view('admin/mails/datos_banco'); ?>
        <?php $this->load->view('admin/mails/pago_tarjeta', $dataT); ?>
    <?php endif ?>
    <?php //TIPO ANTICIPADO ?>                 
<?php elseif ($metodo_pago == 'A'): ?>

    <p>
        <span style="color:#9EAD47;font-size:14px">
            <b>Pago Anticipado (Pago total de la Estadía)</b>
        </span>
    </p>
    <p>
        Para confirmar la reserva debe realizar un pago de un 100%  del total de la reserva, mediante el <b>método de pago </b> elegido (si desea cambiar método de pago, envie un email a contacto@sanrafaellate.com solicitandolo).
    </p>
    <table width="60%">
        <tr><td style="font-size:14px;"><b>Liquidacion Reserva</b></td></tr>
        <tr style="background-color: #666;color:#fff; padding:8px 5px;font-weight: bold;"><td>Total a Pagar</td><td> $ <?php echo $total_estadia ?></td></tr>
    </table>
    <?php $total_estadia_pagar          = $total_estadia;
    $dataT['total_estadia_pagar'] = $total_estadia_pagar;
    ?>
    <?php if ($tipo_pago == 'B'): ?>
        <?php $this->load->view('admin/mails/datos_banco'); ?>
    <?php elseif ($tipo_pago == 'T'): ?>
        <?php $this->load->view('admin/mails/pago_tarjeta', $dataT); ?>
    <?php elseif ($tipo_pago == 'A'): ?>
        <?php $this->load->view('admin/mails/datos_banco'); ?>
        <?php $this->load->view('admin/mails/pago_tarjeta', $dataT); ?>
    <?php endif ?>
<?php elseif ($metodo_pago == 'G'): ?>

    <p>
        <span style="color:#9EAD47;font-size:14px">
            <b>Pago en Hotel (Garantía con Tarjeta de Crédito)</b>
        </span>
    </p>
    <p>Usted selecciono "Pago en Hotel" mediente este método tomamos como garantía su tarjeta de crédito, de la cual no se inputara ningún gasto anticipado a su tarjeta,
        , ud pagara el total al presentarse en el alojamiento. </p>
    <p>En caso de no-show (no pesentarse en hotel) o cancelación fuera de término se le imputara a su tarjeta los costos de cancelación segun politicas del alojamiento</p>
    <table width="60%">
        <tr><td style="font-size:14px;"><b>Liquidación Reserva</b></td></tr>
        <tr style="background-color: #666;color:#fff; padding:8px 5px;font-weight: bold;"><td>Total a Pagar</td><td> $ <?php echo $total_estadia ?></td></tr>
    </table>

    <?php
 endif ?>