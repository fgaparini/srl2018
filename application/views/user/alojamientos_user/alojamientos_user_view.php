
<div class="container-fluid">
    <div class="row-fluid">
        <div class="row-fluid">
            <h2><?php echo $info_array->Nombre ?></h2>
            <hr>
        </div>    
        <div class="row-fluid">
            <div class="span12">
                <ul class="nav nav-tabs" id="myTab">
                    <li <?php echo $this->gf->comparar_general('info', $p_a, "class='active'") ?>><a href="#descripcion">Descripción</a></li>
                    <li <?php echo $this->gf->comparar_general('servicios', $p_a, "class='active'") ?>><a href="#servicios">Servicios</a></li>
                    <li <?php echo $this->gf->comparar_general('imagenes', $p_a, "class='active'") ?>><a href="#fotos" >Fotos</a></li>
                    <li <?php echo $this->gf->comparar_general('ubicacion', $p_a, "class='active'") ?>><a href="#ubicacion" >Ubicación</a></li>
                </ul>

                <div class="tab-content"><!-- Div Descripcion -->
                    <div class="tab-pane <?php echo $this->gf->comparar_general('info', $p_a, " active") ?>" id="descripcion">
                        <div class="row-fluid">
                            <div class="span9">
                                <h3><?php echo $info_array->Nombre ?></h3>
                                <hr>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">
                                <?php if (count($fotos_array) > 0): ?>
                                    <img width="400" src="<?php echo base_url() . "upload/alojamientos/" . $fotos_array[0]['ID_Alojamiento'] . "_" . $fotos_array[0]['NombreImagen'] . ".jpg" ?>" class="img-polaroid">
                                <?php else: ?>
                                    <img width="400" class="img-polaroid" src="<?php echo base_url() . "img/no_disponible.jpg" ?>">
                                <?php endif; ?>
                            </div>
                            <div class="span3">
                                <p><b>Nombre:&nbsp;</b><?php echo $info_array->Nombre ?></p>
                                <p><b>Teléfono:&nbsp;</b><?php echo $info_array->Telefono ?></p>
                                <p><b>Responsable:&nbsp;</b><?php echo $info_array->Responsable ?></p>
                                <p><b>Email:&nbsp;</b><?php echo $info_array->Email ?></p>
                                <p><b>Checkin:&nbsp;</b><?php echo $info_array->Checkin ?></p>
                                <p><b>Checkout:&nbsp;</b><?php echo $info_array->Checkout ?></p>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">
                                <p><b>Descripción:</b></p>
                                <p><?php echo $info_array->Descripcion ?></p>
                            </div>
                        </div>
                        <div class="offset8">
                            <a class="btn btn-large btn-primary" href="<?php echo base_url() . "user/alojamientos_user/form_user/" . $ID_Alojamiento ?>">Editar</a>
                        </div>
                    </div><!-- fin div descripcion -->
                    <!-- Div Servicios -->
                    <div class="tab-pane <?php echo $this->gf->comparar_general('servicios', $p_a, " active") ?>" id="servicios"><!-- Div Servicios -->

                        <div class="row-fluid">
                            <div class="span9">
                                <div class="row-fluid">
                                    <h3>Agregar Servicio</h3>
                                    <br>
                                </div>
                                <form action="<?php echo base_url() ?>user/alojamientos_user/servicios_user_save" method="post">
                                    <div class="row-fluid">
                                        <div class="offset1">
                                            <ol>
                                                <?php foreach ($servicios_array as $var): ?>
                                                    <li style="display: inline-block;width: 20%">
                                                        <label class="checkbox">
                                                            <input <?php echo $var['checked'] ?>  value="<?php echo $var['ID_Servicio'] ?>" name="<?php echo $var['ID_Servicio'] ?>" type="checkbox">
                                                            <?php echo $var['Servicio'] ?>
                                                        </label>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ol>
                                        </div>      
                                    </div>
                                    <br>
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <input type="submit" class="btn btn-large btn-primary" value="Guardar">
                                        </div>
                                    </div>
                                    <input type="hidden" value="<?php echo $ID_Alojamiento ?>" name="ID_Alojamiento">
                                </form>
                            </div>
                        </div>
                    </div> <!-- Fin DIV servicios -->

                    <!-- Div Imagenes -->
                    <div class="tab-pane <?php echo $this->gf->comparar_general('imagenes', $p_a, " active") ?>" id="fotos">
                        <div class="row-fluid">
                            <div class="span5">
                                <h4>Agregar más fotos</h4>
                                <form action="<?php echo base_url() ?>user/alojamientos_user/alojamientos_imagenes_save/" method="post" enctype="multipart/form-data">
                                    <input type="file" name="filesToUpload[]" id="filesToUpload" multiple="" onchange="makeFileList();" value="Agregar Foto">
                                    <input type="submit" value="subir" class="btn btn-primary"/>
                                    <input name="ID_Alojamiento" value="<?php echo $info_array->ID_Alojamiento ?>" type="hidden">
                                    <input name="tipo" value="foto_mas" type="hidden">
                                </form>
                            </div>
                        </div>

                        <br>
                        <div class="row-fluid">
                            <table class="table">
                                <tr><th>Nombre Foto</th><th>Imagen</th><th>Agregar</th><th>Descripción</th><th>Borrar</th></tr>
                                <?php foreach ($fotos_array as $var): ?>
                                    <tr id="i_<?php echo $var['NombreImagen'] ?>">
                                        <td><?php echo $var['ID_Alojamiento'] . "_" . $var['NombreImagen'] . ".jpg" ?></td>
                                        <td>
                                            <a rel="example_group" href="<?php echo base_url() . "upload/alojamientos/" . $var['ID_Alojamiento'] . "_" . $var['NombreImagen'] . ".jpg" ?>"><img  class="last" width="50px" src="<?php echo base_url() . "upload/alojamientos/" . $var['ID_Alojamiento'] . "_" . $var['NombreImagen'] . ".jpg" ?>"></a>
                                        </td>
                                        <td>
                                            <form action="<?php echo base_url() ?>user/alojamientos_user/alojamientos_imagenes_save/" method="post" enctype="multipart/form-data">
                                                <input type="file" name="filesToUpload[]" id="filesToUpload" multiple="" onchange="makeFileList();" value="Agregar Foto">
                                                <input type="submit" value="subir" class="btn btn-primary"/>
                                                <input name="ID_Alojamiento" value="<?php echo $var['ID_Alojamiento'] ?>" type="hidden">
                                                <input name="tipo" value="foto_comun" type="hidden">
                                                <input name="foto_numero" value="<?php echo $var['NombreImagen'] ?>" type="hidden" />
                                            </form>
                                        </td>
                                        <td>
                                            <form id="<?php echo $var['NombreImagen'] ?>"  class="form-inline descripcion_form">
                                                <input type="text"  class="input-xlarge" value="<?php echo $var['ImagenDescripcion'] ?>" name="descripcion" id="descrip_<?php echo $var['NombreImagen'] ?>">&nbsp;&nbsp;
                                                <a href="#" id="ok_button" class="btn-info btn" rel="<?php echo $var['NombreImagen'] ?>">Ok</a>
                                                <input type="hidden" id="ID_Alojamiento_<?php echo $var['NombreImagen'] ?>" value="<?php echo $var['ID_Alojamiento'] ?>">
                                            </form>
                                        </td>
                                        <td>
                                            <a href= "#myModal" onclick="alojamientos_imagenes_delete('<?php echo $var['ID_Alojamiento'] ?>','<?php echo $var['NombreImagen'] ?>')"  data-toggle="modal"><i class="icon-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div><!-- fin div imagenes -->
                    <!-- Ubicacion -->
                    <div class="tab-pane" id="ubicacion">
                        <div class="span9">
                            <div class="row-fluid">
                                <h3>Agregar Ubicación</h3>
                                <br>
                            </div>
                            <div class="row-fluid">
                                <form class="form-horizontal" method="post" action="<?php echo base_url() ?>user/alojamientos_user/alojamientos_ubicacion_save" enctype="multipart/form-data">
                                    <div class="control-group">
                                        <label class="control-label" >Dirección:</label>
                                        <div class="controls">
                                            <input type="text"  name="Direccion" id="Direccion" value="<?php echo $info_array->Direccion ?>" >
                                            <a href="#" onclick="posicion()" class="btn btn-success">Buscar</a>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >Coordenadas:</label>
                                        <div class="controls">
                                            <input type="text" name="Coordenadas" id="Coordenadas" value="<?php echo $info_array->Coordenadas ?>"  >
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="submit" class="btn btn-primary" value="Guardar"  >
                                        </div>
                                    </div>
                                    <input type="hidden" name="ID_Alojamiento" value="<?php echo $info_array->ID_Alojamiento ?>">
                                </form>
                            </div>
                            <div id="map" align="center" style="width: 600px; height: 450px; "></div>    
                        </div>
                        <!-- Fin ubicacion -->
                    </div>


                </div>
            </div>
            <!-- Modal -->
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Eliminar </h3>
                </div>
                <div class="modal-body">
                    <p>¿Esta seguro que desea eliminar?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                    <button id="eliminar" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
            <input id="base_url" value="<?php echo base_url() ?>" type="hidden">

            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
            <script>
                var coordenadas2 = "<?php echo $info_array->Coordenadas ?>";
            </script>

