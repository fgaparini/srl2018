<div class="container-fluid">
    <div class="row-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3>Habitaciones disponibles</h3>
                <hr>
                <div class="row-fluid">
                    <div class="spa12">
                        <button class="btn btn-large btn btn btn-inverse" type="button">Paso 1</button>
                        <button class="btn btn-large btn btn-warning disabled" type="button">Paso 2</button>
                        <button class="btn btn-large btn btn-warning disabled" type="button">Paso 3</button>
                    </div>
                </div>
                <!-- ###################################### foreach con informacion del alojamiento ################################# -->
                <?php foreach ($alojamientos_array as $info_alo): ?>
                    <form method="post" action="<?php echo base_url() . "admin/reservas/buscar_disponibilidad_ii/" ?>">
                        <div class="alojar"><div class="row-fluid ">
                                <div class="span1" >
                                    <img style="float: left" class="img-rounded" src="<?php echo base_url() . "upload/alojamientos/thumb/" . $info_alo['ID_Alojamiento'] . "_1_p.jpg" ?>" />
                                </div>
                                <div class="span11">
                                    <h2></h2>  
                                    <div class="row-fluid">
                                        <div class="span3">
                                            <span><b>Tipo:&nbsp;</b><?php echo $info_alo['TipoAlojamiento'] ?></span> 
                                        </div>
                                        <div class="span3">
                                            <span><b>Ubicación:&nbsp;</b><?php echo $info_alo['Localidad'] ?></span>  
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span11">
                                            <div class="row-fluid">
                                                <div class="span11">
                                                    <span><b>Descripción:&nbsp;</b></span>
                                                </div>
                                                <div class="row-fluid">
                                                    <div class="span11">
                                                        <?php echo substr($info_alo['Descripcion'], 0, 100) ?>...
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div><b>Opciones</b></div>
                                </div>
                            </div>
                            <!-- ###################################### foreach con informacion de  habitaciones ################################# -->
                            <?php
                            $count_habitaciones = 0;
                            $hab_rows           = $this->reservas_model->buscar_habitacion_nueva($info_alo['ID_Alojamiento']);
                            
                            ?>
                            <?php foreach ($hab_rows as $info_hab): ?>
                                <?php $count_habitaciones++; ?>
                                <div class="row-fluid">
                                    <div class="span11 offset1">
                                        <b><?php echo $info_hab['NombreHab'] ?> (<?php echo $info_hab['TipoHabitacion'] ?>)</b>
                                        <input type="hidden" name="<?php echo "id_habitacion" . "_" . $count_habitaciones ?>" value="<?php echo $info_hab['ID_Habitacion'] ?>">
                                        <input type="hidden" name="<?php echo "nombre_hab" . "_" . $count_habitaciones ?>" value="<?php echo $info_hab['NombreHab'] ?>">
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span11 offset1">
                                        <table class="table">
                                            <tr>
                                                <?php
                                                $precio_final = 0;
                                                $fecha_row    = $this->reservas_model->buscar_fecha_nueva($info_hab['ID_Habitacion'], $fecha_desde_c, $fecha_hasta_c);
                                                $min_dispo = 999; 
                                                ?>
                                                <!-- ###################################### foreach con informacion del calendario ################################# -->                                       
                                                <?php foreach ($fecha_row as $info_fe): ?>
                                                    <?php
                                                    $array_f     = explode('-', $info_fe['fecha']);
                                                    $fecha_chica = $array_f[2] . "/" . $array_f[1];

                                                    if ($min_dispo > $info_fe['cant_disponible'])
                                                        $min_dispo = $info_fe['cant_disponible'];
                                                    ?>
                                                    <td style="border: 1px #ccc solid;"><span><?php echo $fecha_chica ?></span></td>     
                                                <?php endforeach; ?>
                                                <td>
                                                    <b>Cant. Hab.</b>
                                                </td>
                                                <td>
                                                    <b>Precio</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <?php foreach ($fecha_row as $info_fe): ?>
                                                    <?php
                                                    if ($info_fe['tarifa_oferta'] > 0)
                                                    {
                                                        $precio_final = $info_fe['tarifa_oferta'] + $precio_final;
                                                        $precio       = $info_fe['tarifa_oferta'];
                                                        $style        = "background-color: #C6E746";
                                                    }
                                                    else
                                                    {
                                                        $precio_final = $info_fe['tarifa_normal'] + $precio_final;
                                                        $precio       = $info_fe['tarifa_normal'];
                                                        $style        = "background-color: #FFF";
                                                    }
                                                    ?>
                                                    <td  style="border: 1px #ccc solid; <?php echo $style ?>">
                                                        <span><?php echo $precio." | ".$info_fe['cant_disponible'] ?> </span>
                                                    </td>
                                                <?php endforeach; ?> 
                                                <td>
                                                    <select id="option_<?php echo $info_hab['ID_Habitacion'] ?>" onchange="multiplicar_precio('<?php echo $info_hab['ID_Habitacion'] ?>','<?php echo $precio_final ?>','<?php echo $info_alo['ID_Alojamiento'] ?>')" name="cantidad_por_habitacion_<?php echo $count_habitaciones ?>" class="input-mini" type="text">
                                                        <?php for ($i = 0; $i <= $min_dispo; $i++): ?>
                                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <b><label id="label_precio_<?php echo $info_hab['ID_Habitacion'] ?>"  >$<?php echo $precio_final ?></label></b>
                                                    <input type="hidden" value="<?php echo $precio_final ?>" name="precio_habitacion_<?php echo $count_habitaciones ?>">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="offset9">
                                <input class="btn-primary btn-large btn" disabled id="submit<?php echo $info_alo['ID_Alojamiento'] ?>" type="submit" value="Reservar">
                                <br>
                                <br>
                            </div>
                        </div>
                        <input type="hidden" name="cant_habitaciones" value="<?php echo $count_habitaciones ?>">
                        <input type="hidden" name="id_alojamiento" value="<?php echo $info_alo['ID_Alojamiento'] ?>">
                        <input type="hidden" name="nombre_alojamiento" value="<?php echo $info_alo['Nombre'] ?>">
                        <input type="hidden" name="direccion" value="<?php echo $info_alo['Direccion'] ?>">
                        <input type="hidden" name="checkin" value="<?php echo $fecha_desde_c ?>">
                        <input type="hidden" name="checkout" value="<?php echo $fecha_hasta_c ?>">
                        <input type="hidden" name="cant_dias" value="<?php echo count($fecha_row) ?>"> 
                        <input type="hidden" name="tipo_alojamiento" value="<?php echo $info_alo['TipoAlojamiento'] ?>" >
                        <input type="hidden" name="localidad" value="<?php echo $info_alo['Localidad'] ?>">
                    </form>
                <?php endforeach; ?>
                <table>
                    <tr><td><?php echo $this->pagination->create_links(); ?></td></tr>
                </table>
            </div>
        </div>