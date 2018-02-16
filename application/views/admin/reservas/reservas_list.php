<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h1>Reservas</h1>
            <form method="get" action="<?php echo base_url() ?>admin/reservas/lists/">
                <div class="row-fluid">
                    <div class="span3">
                        Buscar por:
                    </div>
                    <div class="span3">
                        <select name="campo">
                            <option value="ninguno">ninguno</option>
                            <option value="NombreHuesped">nombre huesped</option>
                            <option value="Localizador">localizador</option>
                        </select>
                    </div>
                    <div class="span3">
                        <input type="text" name="valor" value="" />
                    </div>
                </div>
                <input type="submit" value="enviar" class="btn btn-success btn-primary" />
            </form>
            <table class="table">
                <tr>
                    <th><a href="<?php echo base_url() ?>admin/reservas/lists/?order=localizador">Localizador</a></th>
                    <th><a href="<?php echo base_url() ?>reservas/lists/?order=Checkin">CheckIn</a>-<a href="<?php echo base_url() ?>reservas/lists/?order=Checkout">CheckOut</a></th>
                    <th><a href="<?php echo base_url() ?>reservas/lists/?order=NombreHuesped">Nombre</a>-<a href="<?php echo base_url() ?>reservas/lists/?order=ApellidoHuesped">Apellido</a></th>
                    <th><a href="<?php echo base_url() ?>reservas/lists/?order=Nombre">Alojamiento</a></th><th>Total Reserva</th><th><a href="<?php echo base_url() ?>reservas/lists/?order=estado_pago">Estado Pago</a></th>
                    <th><a href="<?php echo base_url() ?>reservas/lists/?order=fecha_reserva_dat" >Venc. Pago</a></th>
                    <th><a href="<?php base_url() ?>reservas/lists/?order=metodo_pago">Met. Pago</a></th>
                    <th>Estado Reserva</th>
                    <th>Acción</th>
                </tr>
                <?php foreach ($reservas_array as $var): ?>
                    <?php if ($var['estado_reserva'] == 'C'): ?>
                        <tr class="error" >
                        <?php else: ?>
                            <?php if ($var['estado_pago'] == 'P'): ?>
                            <tr class="warning" >
                            <?php elseif($var['estado_pago'] == 'O'): ?>
                                <tr class="success" >
                            <?php endif ?>
                        <?php endif ?>

                        <td><?php echo $var['localizador'] ?></td>
                        <td><a href=""></a><?php echo $var['fecha_ingreso'] . " - " . $var['fecha_salida'] ?></td>
                        <td><?php echo $var['NombreHuesped'] . ", " . $var['ApellidoHuesped'] ?></td>
                        <td><?php echo $var['Nombre'] ?></td>
                        <td><?php echo $var['costo_total'] ?></td>
                        <?php if($var['estado_pago']=='P'): ?>
                        <td>Pendiente</td>
                        <?php elseif($var['estado_pago']=='O'): ?>
                        <td>OK</td>
                        <?php else: ?>
                        <td>No definido</td>
                        <?php endif?>
                        
                        <td><?php echo $var['fecha_reserva_dat'] ?></td>
                        <?php if($var['metodo_pago']=='A'): ?>
                        <td>Anticipado</td>
                        <?php elseif ($var['metodo_pago']=='S'): ?>
                        <td>Senia</td>
                        <?php elseif($var['metodo_pago']=='G'): ?>
                        <td>Garantia</td>
                        <?php else : ?>
                        <td>No definido</td>
                        <?php endif; ?>
                        
                        <?php if($var['estado_reserva']=='P'): ?>
                        <td>Pendiente</td>
                        <?php elseif ($var['estado_reserva']=='R'): ?>
                        <td>Reservado</td>
                        <?php elseif($var['estado_reserva']=='C'): ?>
                        <td>Cancelado</td>
                        <?php elseif ($var['estado_reserva']=='CH'): ?>
                        <td>CheckIn</td>
                        <?php else : ?>
                        <td>No definido</td>
                        <?php endif; ?>
                        <td>
                            <a href="<?php echo base_url() . "admin/reservas/edit/" . $var['reservas_id'] ?>" title="Agregar pago Huesped">
                                <i class="icon-star"></i>
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo base_url() . "admin/reservas/delete/" . $var['reservas_id'] ?>" title="Eliminar Reserva">
                                <i class="icon-remove"></i>
                            </a>&nbsp;&nbsp;&nbsp;
                            
                             <a href="<?php echo base_url()."admin/reservas/confirmar_reserva/".$var['reservas_id']."/" ?>"  title="Enviar mail y confirmar">
                                <i class="icon-check"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <table>
                <tr><td><?php echo $this->pagination->create_links(); ?></td></tr>
            </table>
        </div>
