<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h1>Reservas</h1>
            <table class="table">
                <tr>
                    <th>Localizador</th>
                    <th>Fecha Reserva</th>
                    <th>Monto</th>
                    <th>Comision</th>
                    <th>Pago Huesped</th>
                    <th>Forma Pago</th>
                    <th>Debito</th>
                    <th>Credito</th>
                    <th>Saldo</th>
                </tr>
                <?php
                $i    = 1;
                $saldo;
                $Pago = "";
                ?>
                <?php foreach ($li_array as $var): ?>
                    <?php
                    $localizador[$i]   = $var['Localizador'];
                    $fecha_reserva[$i] = $var['fecha_reserva'];
                    $costo_total[$i]   = $var['costo_total'];
                    $monto_pago[$i]    = $var['monto_pago'];
                    $metodo_pago[$i]   = $var['metodo_pago'];

                    //Calculo comision
                    $comision[$i] = $var['comision'] * $var['costo_total'] / 100;
                    if ($var['metodo_pago'] == 'G'):
                        $debito[$i]  = 0;
                        $credito[$i] = $comision[$i];
                    endif;
                    if ($var['metodo_pago'] == 'A' || $var['metodo_pago'] == 'S'):
                        $credito[$i] = 0;
                        $debito[$i]  = $var['monto_pago'] - $comision[$i];
                    endif;
                    $Pago[$i]    = 0;

                    foreach ($pagoalojar_array as $var1):
                        $pagoalojar_reservas_array = $this->pagoalojar_reservas_model->pagos_reservas($var1['ID_PagoAlojar']);
                        foreach ($pagoalojar_reservas_array as $var0):
                            if ($var0['Localizador'] == $localizador[$i]):
                                $Pago[$i] = $var1['Monto'];
                            endif;
                        endforeach;
                    endforeach;
                    if ($i > 1):
                        $saldo[$i] = $saldo[$i - 1] + $credito[$i] - $debito[$i] + $Pago[$i];
                    else:
                        $saldo[$i] = $credito[$i] - $debito[$i] + $Pago[$i];
                    endif;
                    ++$i;
                endforeach;
                ?>
                <?php
                for ($j = count($localizador); $j >= 1; --$j):
                    $localizador_r = "";
                    $Monto         = "";
                    $FechaPago     = "";
                    $Concepto      = "";
                    foreach ($pagoalojar_array as $var):
                        $pagoalojar_reservas_array = $this->pagoalojar_reservas_model->pagos_reservas($var['ID_PagoAlojar']);
                        $localizadores             = "";
                        foreach ($pagoalojar_reservas_array as $var0):
                            $localizadores = $var0['Localizador'] . "," . $localizadores;
                            $localizador_r = $var0['Localizador'];
                        endforeach;
                        $Monto         = $var['Monto'];
                        $FechaPago     = $var['FechaPago'];
                        $Concepto      = $var['Concepto'];
                        if ($localizador_r == $localizador[$j]):
                            ?>
                            <tr class='warning'>
                                <td colspan='7'>fecha: <?php echo $FechaPago ?> ,  <?php echo $Concepto ?>, <?php echo $localizadores ?></td>
                                <td>$<?php echo $Pago[$j] ?></td>
                                <?php if ($saldo[$j] > 0): ?>
                                    <td style="color: green">$<?php echo $saldo[$j] ?></td>
                                <?php else: ?>
                                    <td style="color: red">$<?php echo $saldo[$j] ?></td>
                                <?php endif ?>
                            </tr>
                            <?php
                        endif;
                    endforeach;
                    ?>
                    <tr >
                        <td><?php echo $localizador[$j] ?></td>
                        <td><?php echo $fecha_reserva[$j] ?></td>
                        <td>$<?php echo $costo_total[$j] ?></td>
                        <td>$<?php echo $comision[$j] ?></td>
                        <td>$<?php echo $monto_pago[$j] ?></td>
                        <td><?php echo $metodo_pago[$j] ?></td>
                        <td>$<?php echo $debito[$j] ?></td>
                        <td>$<?php echo $credito[$j] ?></td>
                        <?php if (($saldo[$j] - $Pago[$j]) > 0): ?>
                            <td style="color: green">$<?php echo $saldo[$j] - $Pago[$j] ?></td>
                        <?php else: ?>
                            <td style="color: red">$<?php echo $saldo[$j] - $Pago[$j] ?></td>
                        <?php endif ?>
                    </tr>
                <?php endfor; ?>
            </table>
            <table>
                <tr><td><?php echo $this->pagination->create_links(); ?></td></tr>
            </table>
        </div>
