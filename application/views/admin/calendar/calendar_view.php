<div class="container-fluid">
    <h2><a class="btn btn-info" href="<?php echo base_url() . "admin/alojamientos/form_view/" . $id_alojamiento . "/?pestania=habitaciones" ?>"> <<< </a>  Calendario <?php echo $NombreHab ?></h2>
    <div class="row-fluid">
        <form method="post" action="<?php echo base_url() . "admin/calendar/save/" ?>">
            <div class="span2">
                <div class="control-group">
                    <label>Fecha desde</label>
                    <input type="text" name="fecha_desde"  class="input-small datepicker" placeholder="Fecha desde">
                </div>
                <div class="control-group">
                    <label>Fecha hasta</label>
                    <input type="text" name="fecha_hasta"  class="input-small datepicker" placeholder="Fecha hasta">
                </div>
            </div>
            <div class="span2">
                <div class="control-group">
                    <label>Asignadas</label>
                    <input type="text" name="asignada" class="input-mini" placeholder="Asignada">
                </div>
                <div class="control-group">
                    <label>Mínima</label>
                    <input type="text" name="minima" class="input-mini" placeholder="Minima">
                </div>
            </div>
            <div class="span2">
                <div class="control-group">
                    <label>Normal</label>
                    <input type="text" name="normal" class="input-mini" placeholder="Normal">
                </div>
                <div class="control-group">
                    <label>Oferta</label>
                    <input type="text" name="oferta" class="input-mini" placeholder="Oferta">
                </div>
            </div>
            <div class="span2">
                <div class="control-group">
                    <label>Bloquear</label>
                    <input type="checkbox" value="C" name="bloqueo">
                    Bloqueo
                </div>
                <div class="control-group">
                    <label>&nbsp;</label>
                    <button class="btn btn-primary btn-large">Guardar</button>
                </div>

            </div>
            <input type="hidden" name="id_habitacion" value="<?php echo $id_habitacion ?>">
            <input type="hidden" name="id_alojamiento"  value="<?php echo $id_alojamiento ?>" >
            <input name="operacion" id="operacion" value="<?php echo $operacion ?>" type="hidden">
            <input name="fecha" id="fecha" value="<?php echo $fecha ?>" type="hidden">
            <input name="cant" id="cant" value="<?php echo $cant ?>" type="hidden">
            <input name="rango" value="<?php echo $rango ?>" type="hidden">
        </form>
    </div>
    <div class="row-fluid">
        <div class="span4">
            <label class="checkbox inline">
                <input onclick="load_rango(30)" <?php echo $this->gf->comparar_general('30', $rango, 'checked') ?> type="radio" name="rango" value="option1">Mes
            </label>
            <label class="checkbox inline">
                <input onclick="load_rango(7)" <?php echo $this->gf->comparar_general('7', $rango, 'checked') ?> type="radio" name="rango"   value="option2">1 Sem.
            </label>
            <label class="checkbox inline">
                <input onclick="load_rango(15)" <?php echo $this->gf->comparar_general('15', $rango, 'checked') ?> type="radio" name="rango" value="option3">2 Sem.
            </label>
        </div>
        <div class="span2">
            <a  href="<?php echo $siguiente ?>"><<< Anterior </a>
        </div>
        <div class="span2">
            <a href="<?php echo $anterior ?>">Siguiente >>></a>
        </div>
    </div>
    <br>
    <div class="row-fluid">
        <div class="span12">
            <table class="table table-bordered table-striped table-hover table-condensed">
                <tr>
                    <th>Fecha</th>
                    <th>Asignadas</th>
                    <th>Reservadas</th>
                    <th>Disponibles</th>
                    <th>Minimo</th>
                    <th>Normal</th>
                    <th>Oferta</th>
                    <th>Bloqueo</th>
                    <th>Editar</th>
                </tr>
                <?php foreach ($fechas as $var): ?>
                    <tr>
                        <?php $row = $this->calendar_model->dia_tarifa($var['fecha'], $id_habitacion) ?>

                        <td><?php echo $var['fecha'] ?></td>
                        <?php if (isset($row['cant_asignada'])): ?>
                            <td><?php echo $row['cant_asignada'] ?></td>
                        <?php else: ?>
                            <td >0</td>
                        <?php endif; ?>

                        <?php if (isset($row['cant_reservada'])): ?>
                            <td ><?php echo $row['cant_reservada'] ?></td>
                        <?php else: ?>
                            <td >0</td>
                        <?php endif; ?>

                        <?php if (isset($row['cant_disponible'])): ?>
                            <td ><?php echo $row['cant_disponible'] ?></td>
                        <?php else: ?>
                            <td >0</td>
                        <?php endif; ?>

                        <?php if (isset($row['estancia_minima'])): ?>
                            <td ><?php echo $row['estancia_minima'] ?></td>
                        <?php else: ?>
                            <td >0</td>
                        <?php endif; ?>

                        <?php if (isset($row['tarifa_normal'])): ?>
                            <td ><?php echo $row['tarifa_normal'] ?></td>
                        <?php else: ?>
                            <td >0</td>
                        <?php endif; ?>

                        <?php if (isset($row['tarifa_oferta'])): ?>
                            <td ><?php echo $row['tarifa_oferta'] ?></td>
                        <?php else: ?>
                            <td >0</td>
                        <?php endif; ?>

                        <?php if (isset($row['estado_bloqueo'])): ?>
                            <td><?php echo $row['estado_bloqueo'] ?></td>
                        <?php else: ?>
                            <td >0</td>
                        <?php endif; ?>
                        <td>
                            <a  class="update_calendar" href="<?php echo base_url() . "admin/calendar/fancy_form/?&id_habitacion=" . $id_habitacion . "&fecha=" . $var['fecha'] . "&rango=" . $rango . "&fecha_fin=" . $fecha . "&operacion=" . $operacion . "&cant=" . $cant ?>">
                                <i class="icon-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
            <input type="hidden" name="accion" value="guardar">
        </div>
        <input id="base_url" value="<?php echo base_url() ?>" type="hidden">
        <input id="id_habitacion" value="<?php echo $id_habitacion ?>" type="hidden">
        




















