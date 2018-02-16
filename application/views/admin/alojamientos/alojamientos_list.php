<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                <h2>Buscar Alojamiento</h2>
                <hr>
            </div>
            <div class="row-fluid">
                <form class="form-inline" action="<?php echo base_url() ?>admin/alojamientos/lists/">
                    <input name="NombreAlojamiento" type="text" class="input-medium" placeholder="Nombre Alojamiento">
                    <select class="input-medium" name="TipoAlojamiento">
                        <option value="">Tipo Alojamiento</option>
                        <?php foreach ($tipoalojamientos_array as $var): ?>
                            <option class="" value="<?php echo $var['ID_TipoAlojamiento'] ?>"><?php echo $var['TipoAlojamiento'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="TipoAcuerdo">
                        <option <?php echo $this->gf->comparar_general($TipoAcuerdo,'0','selected') ?> value="0" >Tipo Acuerdo</option>
                        <option <?php echo $this->gf->comparar_general($TipoAcuerdo,'P','selected') ?> value="P" >Publicidad</option>
                        <option <?php echo $this->gf->comparar_general($TipoAcuerdo,'C','selected') ?> value="C" >Comision</option>
                    </select>
                    <button type="submit" class="btn">Buscar</button>
                </form>
            </div>
            <div class="row-fluid">
                <form method="get" action="<?php echo base_url() ?>admin/alojamientos/form">
                    <input type="submit" class="btn btn-primary " value="Agregar Alojamiento" />
                </form>
            </div>     
            <table class="table">
                <tr>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Localidad</th>
                    <th>Responsable</th>
                    <th>Email</th>
                    <th>Imagen</th>
                    <th>Acción</th>
                </tr>
                <?php foreach ($alojamientos_array as $var): ?>
                <?php $class = ($var['Activo']=='A') ? 'success' : 'error' ?>
                    <tr class="<?php echo $class ?>" >
                        <td><?php echo $var['Nombre'] ?></td>
                        <td><?php echo $var['Telefono'] ?></td>
                        <td><?php echo $var['Localidad'] ?></td>
                        <td><?php echo $var['Responsable'] ?></td>
                        <td><?php echo $var['Email'] ?></td>
                        <td> <img width="100px" height="100px" src="<?php echo base_url() . "upload/alojamientos/thumb/" . $var['ID_Alojamiento'] . "_1.jpg" ?>" /></td>
                        <td>
                            <a title="modificar" href="<?php echo base_url() . "admin/alojamientos/form/" . $var['ID_Alojamiento'] ?>">
                                <i class="icon-edit"></i>
                            </a>&nbsp;&nbsp;
                            <a title="detalle alojamiento" href="<?php echo base_url() . "admin/alojamientos/form_view/" . $var['ID_Alojamiento'] ?>/?pestania=info">
                                <i class="icon-align-justify"></i>
                            </a>&nbsp;&nbsp;
                            <a title="eliminar" onclick="eliminar(<?php echo $var['ID_Alojamiento'] ?>)" href="#">
                                <i class="icon-remove"></i>
                            </a>&nbsp;&nbsp;
                             <a title="activar-desactivar"  href="#" onclick="estado_alojamiento(<?php echo $var['ID_Alojamiento'] ?>)">
                                    <i class="icon-time" title="activar-desactivar"></i>
                            </a>&nbsp;&nbsp;
                            <?php if ($this->gf->pago_alojar($var['ID_Alojamiento'])): ?>
                                <a title="pagos" href="<?php echo base_url() . "admin/pagoalojar/reservas_alojamientos/" . $var['ID_Alojamiento'] ?>">
                                    <i class="icon-shopping-cart" title="pagos"></i>
                                </a>&nbsp;&nbsp;
                            <?php endif ?>
                            <a title="liquidacion"  href="<?php echo base_url() . "admin/reservas/liquidacion/" . $var['ID_Alojamiento'] ?>">
                                <i class="icon-tags"></i>
                            </a>&nbsp;&nbsp;
                            <a title="calendario" href="<?php echo base_url() . "admin/full_calendar/fullcalendar_hab/?ID_Alojamiento=" . $var['ID_Alojamiento'] ?>">
                                <i class="icon-calendar"></i>
                            </a>&nbsp;&nbsp;
                            <a title="promociones" href="<?php echo base_url() . "admin/promociones/lists/". $var['ID_Alojamiento'] ?>">
                                <i  class="icon-gift"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <input type="hidden" id="base_url" value="<?php echo base_url() ?>" />
                <input type="hidden" id="get" value="<?php echo $get ?>" />
            </table>     
            <table>
                <tr><td><?php echo $this->pagination->create_links(); ?></td></tr>
            </table>
        </div>
