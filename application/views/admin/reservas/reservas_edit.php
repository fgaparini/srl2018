<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/reservas/update/">
                <div class="span12">
                    <h4>Modificar reserva</h4>
                    <hr>
                    <div class="control-group">
                        <label class="control-label">Monto Pago</label>
                        <div class="controls">
                            <input type="text"  name="monto_pago" value="<?php echo $monto_pago ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Fecha Pago</label>
                        <div class="controls">
                            <input type="text" id="datepicker"  name="fecha_pago" value="<?php echo $fecha_pago ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tipo Pago</label>
                        <div class="controls">
                            <select name="tipo_pago">
                                <option <?php echo $this->gf->comparar_general($tipo_pago, 'A', "selected") ?> value="A">Ninguno</option>
                                <option <?php echo $this->gf->comparar_general($tipo_pago, 'B', "selected") ?> value="B">Banco</option>
                                <option <?php echo $this->gf->comparar_general($tipo_pago, 'T', "selected") ?> value="T">Tarjeta</option> 
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Método Pago</label>
                        <div class="controls">
                            <select name="metodo_pago">
                                <option <?php echo $this->gf->comparar_general($metodo_pago, 'A', "selected") ?> value="A">Anticipado</option>
                                <option <?php echo $this->gf->comparar_general($metodo_pago, 'S', "selected") ?> value="S">Seña</option>
                                <option <?php echo $this->gf->comparar_general($metodo_pago, 'G', "selected") ?> value="G">Garantía</option> 
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="offset5"><button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;<a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/reservas/lists" ?>">Volver</a></div>
                </div>
                <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                <input type="hidden" name="accion" value="<?php echo $accion ?>">
                <input type="hidden" name="reservas_id" value="<?php echo $reservas_id ?>">
            </form>
        </div>