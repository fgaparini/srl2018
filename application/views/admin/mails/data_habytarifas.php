<!-- LOCALIZADOR -->

<!-- DATAOS HUESPED -->
 <table width='100%' border='0' cellpadding='0' cellspacing='0' style='' >
  	<thead style="background-color: #D6DDAC">
		<tr style="color:#000; font-size:14px;">
			<th style="width:50%; padding: 2px 0 2px 10px;" colspan="2" align="left">
				<span> Resumen de Tarifas y Costos</span>
			</th>
		</tr>
			
  	</thead>
  	<tbody>
		<tr>
            <td height='' valign='top' bgcolor='' style='padding-left:10px;font-size:12px'>
				<table style="width:100%" align="left"><!-- foreach -->
                    <tr align="left">
                    	<th>Tipo Hab.</th>
                        <th>Tarifas x Noche</th>
                        <th>Subtotal Hab</th>
                    </tr>
                    <?php $total_final = 0; ?>
                    <?php for ($i = 1; $i <= $cantidad_habitaciones; $i++): ?>
                    	<?php for ($y = 1; $y <= $cant_por_hab[$i]; $y++): ?>
                            <tr>
                                <td><?php echo $unidad_alojativa[$i] ?> <?php echo $nombre_hab[$i] ?> (<?php echo $Tipo_hab[$i] ?>) </td>
                                <td align="left">
									<?php
                                    $tarifa = 0;
                                    $subtotal = 0;
                                    ?>
                                    <?php for ($z = 1; $z <= $cantidad_dias; $z++): ?>
                                    <!-- Para poder colorear cuando es tarifa o oferta (por eso esta dos veces) -->
                                    	<?php if ($tarifa_oferta[$i][$z] != 0): ?>
                                        	<?php $tarifa = $tarifa_oferta[$i][$z] ?>
                                        	<div style="display: inline; vertical-align: top;height:20px;;margin: 1px 4px; font-size: 11px; color: #222; padding: 4px;"><?php echo $fe_array[$z];?><br /> <span style='color:#9EAD47'>$<?php echo $tarifa_oferta[$i][$z] ?></span></div>
                                    	<?php else: ?>
                                        	<?php $tarifa = $tarifa_normal[$i][$z] ?>
                                        	<div style="display: inline-block;margin: 0 4px; font-size: 10px; color: #222; padding: 4px; "><?php echo $fe_array[$z];?><br />$<?php echo $tarifa_normal[$i][$z] ?></div>
                                    	<?php endif; ?>
                                    <?php $subtotal = $tarifa + $subtotal; ?>
                              		<?php endfor; ?>
								</td>
								<td align="middle">$<?php echo $subtotal ?></td>
                                <?php $total_final = $subtotal + $total_final ?>
                            </tr>
                        <?php endfor; ?>
					<?php endfor; ?>
					<?php if ($enviar_descuento=='si') { ?>
                    		<tr >
                                <td colspan="2" style="padding: 5px;"><b>Sub Total</b></td>
                                <td align="middle" style="padding: 5px;"><b>$<?php echo $total_final ?></b></td>
                                
                            </tr>
                            <tr style="background-color:#fff;">
                                <?php $des_p = ($descuento * $total_final) / 100 ?>
                                <td colspan="2" style="padding: 5px;"><b>Descuento (% <?php echo $descuento ?> )</b></td>
                                <td align="middle" style="color:red;padding: 5px;"><b>-$<?php echo $des_p ?></b></td>
                              
                            </tr>
                            <tr style="background-color: #666; color:#fff; font-size:14px;padding: 5px;">
                                <td colspan="2" style="padding: 5px;"><b>SubTotal Estadia </b></td>
                                <?php $total_descuento = $total_final - (($descuento * $total_final) / 100) ?>
                                <?php //$total_descuento=$descuento-$total_final ?>
                                <td align="middle" style="padding: 5px;"><b>$<?php echo $total_descuento ?></b></td>
                            
                             
                            </tr>
                    <?php } else { ?>
                     <?php if ($enviar_tipo=="alojamiento"): ?>
                        
                
					       <tr style="background-color: #666; color:#fff; font-size:14px;padding: 5px;">
                                <td colspan="2" style="padding: 5px;"><b>Sub Total</b></td>
                                <td align="middle" style="padding: 5px;"><b>$<?php echo $total_final ?></b></td>
                                
                            </tr>
                        <?php else: ?>
                        <tr >
                                <td colspan="2" style="padding: 5px;"><b>Sub Total</b></td>
                                <td align="middle" style="padding: 5px;"><b>$<?php echo $total_final ?></b></td>
                                
                            </tr>
                            <tr style="background-color:#fff;">
                                <?php $des_p = ($descuento * $total_final) / 100 ?>
                                <td colspan="2" style="padding: 5px;"><b>Descuento (% <?php echo $descuento ?> )</b></td>
                                <td align="middle" style="color:red;padding: 5px;"><b>-$<?php echo $des_p ?></b></td>
                              
                            </tr>
                            <tr style="background-color: #666; color:#fff; font-size:14px;padding: 5px;">
                                <td colspan="2" style="padding: 5px;"><b>SubTotal a pagar ( total - descuento )</b></td>
                                <?php $total_descuento = $total_final - (($descuento * $total_final) / 100) ?>
                                <?php //$total_descuento=$descuento-$total_final ?>
                                <td align="middle" style="padding: 5px;"><b>$<?php echo $total_descuento ?></b></td>
                            
                             
                            </tr>
                         <?php endif ?>
                    <?php } ?>

                </table>
            </td>
        </tr>
	</tbody>
</table>