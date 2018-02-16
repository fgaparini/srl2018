<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <form method="post" action="<?php echo base_url() . "admin/pagoalojar/reservas_save/" ?>">
                <div class="row-fluid">
                    <div class="span12">
                        <h4>Elegir reservas</h4>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label" >Monto</label>
                            <div class="controls">
                                <input name="Monto" type="text" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" >Fecha Pago</label>
                            <div class="controls">
                                <input name="FechaPago" type="text" id="datepicker" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" >Concepto</label>
                            <div class="controls">
                                <textarea rows="4" name="Concepto"  class="input-large" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="span7">
                        <table class="table">
                            <tr><th>Localizador</th><th>Nombre</th><th>Seleccionar</th></tr>
                            <?php $count = 0; ?>
                            <?php foreach ($reservas_array as $var): ?>
                                <?php $count++; ?>
                                <tr>
                                    <td><?php echo $var['Localizador'] ?></td>
                                    <td><?php echo $var['ApellidoHuesped'] . ", " . $var['NombreHuesped'] ?></td>
                                    <td>
                                        <input type="checkbox" name="reservas_id_<?php echo $count ?>" value="<?php echo $var['reservas_id'] ?>">
                                        <input type="hidden" name="localizador_<?php echo $count ?>" value="<?php echo $var['Localizador'] ?>">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>

                </div>
                <div class="row-fluid">
                    <div class="offset8 span4">
                        <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                        <input type="hidden" value="<?php echo $count ?>" name="cantidad_reservas">
                        <input type="hidden" value="<?php echo $id_alojamiento ?>" name="id_alojamiento">
                        <input type="submit" value="Siguiente" class="btn btn-large btn-primary">
                    </div>
                </div>
            </form>
        </div>
