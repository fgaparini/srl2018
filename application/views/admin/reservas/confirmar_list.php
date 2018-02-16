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
                    <th>Localizador</th>
                    <th>CheckIn</th>
                    <th>CheckOut</th>
                    <th>Nombre</th>
                    <th>Alojamiento</th>
                    <th>Total Reserva</th>
                    <th>Met. Pago</th>
                    <th>Acción</th>
                </tr>
                <?php foreach ($rows as $var): ?>
                    <tr>

                        <td><?php echo $var['Localizador'] ?></td>
                        <td><?php echo $var['fecha_ingreso'] ?></td>
                        <td><?php echo $var['fecha_salida'] ?></td>
                        <td><?php echo $var['NombreHuesped'] . ", " . $var['ApellidoHuesped'] ?></td>
                        <td><?php echo $var['Nombre'] ?></td>
                        <td><?php echo $var['costo_total'] ?></td>
                        <?php if($var['metodo_pago']=='A'): ?>
                        <td>Anticipado</td>
                        <?php elseif($var['metodo_pago']=='S'): ?>
                        <td>Senia</td>
                        <?php elseif($var['metodo_pago']=='G'): ?>
                        <td>Garantia</td>
                        <?php else: ?>
                        <td>No especificado</td>
                        <?php endif; ?>
                        <td>
                            <a href="<?php echo base_url() . "admin/reservas/edit/" . $var['reservas_id'] ?>" title="Agregar pago Huesped">
                                <i class="icon-star"></i>
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo base_url() . "admin/reservas/delete/" . $var['reservas_id'] ?>" title="Eliminar Reserva">
                                <i class="icon-remove"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <table>
                <tr><td><?php echo $this->pagination->create_links(); ?></td></tr>
            </table>
        </div>
