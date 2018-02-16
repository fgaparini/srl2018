
<!-- Content -->
<article class="container_12">
    <section class="saa">
        <div class="block-border">
            <div class="block-content">
                <!-- We could put the menu inside a H1, but to get valid syntax we'll use a wrapper -->
                <h1>Editar <?php echo $edito ?></h1>
                <?php if ($edito == "Servicios"): ?>
                    <p class="message">Si desea agregar un servicio que no esta en la lista por favor contáctenos a nuestro email.</p>

                    <p>Edite los servicios de su alojamiento haciendo  click 
                        para activar (<input   value="" checked name="" type="checkbox" class="mini-switch">) o desactivar(<input   value=""  name="" type="checkbox" class="mini-switch">) servicio .</p>

                    <form action="<?php echo base_url() ?>users/dash/servicios_user_save" method="post">
                        <div class="">
                            <div class="">
                                <ul>
                                    <?php foreach ($servicios_array as $var): ?>
                                        <li style="display: inline-block;width: 25%;padding:10px;">

                                            <input <?php echo $var['checked'] ?>  value="<?php echo $var['ID_Servicio'] ?>" name="<?php echo $var['ID_Servicio'] ?>" type="checkbox" class="mini-switch">
                                            <label class="">  <?php echo $var['Servicio'] ?></label>

                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>      
                        </div>
                        <br>
                        <div class="">
                            <input type="submit" class="big-button" value="Guardar">
                        </div>
                        <input type="hidden" value="<?php echo $ID_Alojamiento ?>" name="ID_Alojamiento">
                    </form>
                <?php endif ?>
                <?php if ($edito == "Fotos"): ?>
                    <p>Edite las fotografias de su alojamiento. <br>Edite una a una o agregue mas fotografias mediante el campo "Agregar mas Fotos" hasta un maximo de fotos 20 (si ya tiene 20 no se seguiran agregando)</p>
                    <div class="row-fluid">
                        <div class="span5">
                            <h4>Agregar más fotos (se agregaran debajo de las ya listadas hasta un maximo de 20 fotos) </h4><br>
                            <form action="<?php echo base_url() ?>users/dash/alojamientos_imagenes_save/" method="post" class="form" enctype="multipart/form-data">
                                <input type="file" name="filesToUpload[]" id="filesToUpload" class="input-xlarge" multiple="" onchange="makeFileList();" value="Agregar Foto">
                                <input type="submit" value="subir" class="big-button"/>
                                <input name="ID_Alojamiento" value="<?php echo $ID_Alojamiento ?>" type="hidden">
                                <input name="tipo" value="foto_mas" type="hidden">
                            </form>
                        </div>
                    </div>

                    <br>
                    <div class="">
                        <table class="table" width="90%">
                            <thead>  <tr><th>Nombre Foto</th><th>Imagen</th><th>Agregar</th><th>Descripción</th><th>Borrar</th></tr>  </thead>

                            <tbody> <?php $i = 0; ?>
                                <?php foreach ($fotos_array as $var): ?>
                                    <tr id="i_<?php echo $var['NombreImagen'] ?>">
                                        <td><?php echo "Imagen  " . $var['NombreImagen'] ?></td>
                                        <td>
                                            <a rel="example_group" href="<?php echo base_url() . "upload/alojamientos/" . $var['ID_Alojamiento'] . "_" . $var['NombreImagen'] . ".jpg" ?>"><img  class="last" width="50px" src="<?php echo base_url() . "upload/alojamientos/" . $var['ID_Alojamiento'] . "_" . $var['NombreImagen'] . ".jpg" ?>"></a>
                                        </td>
                                        <td>
                                            <form action="<?php echo base_url() ?>users/dash/alojamientos_imagenes_save/" method="post" enctype="multipart/form-data" class="form">
                                                <p><input type="file" name="filesToUpload[]" id="filesToUpload" multiple="" onchange="makeFileList();" value="Agregar Foto" class="button">
                                                    <input type="submit" value="subir" class=" big-button"/>
                                                    <input name="ID_Alojamiento" value="<?php echo $var['ID_Alojamiento'] ?>" type="hidden">
                                                    <input name="tipo" value="foto_comun" type="hidden">
                                                    <input name="foto_numero" value="<?php echo $var['NombreImagen'] ?>" type="hidden" /></p>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="<?php echo $var['NombreImagen'] ?>"  class="form-inline descripcion_form">
                                                <input type="text"  class="input-xlarge" value="<?php echo $var['ImagenDescripcion'] ?>" name="descripcion" id="descrip_<?php echo $var['NombreImagen'] ?>">&nbsp;&nbsp;
                                                <a href="#" id="ok_button" class="button blue" rel="<?php echo $var['NombreImagen'] ?>">Ok</a>
                                                <input type="hidden" id="ID_Alojamiento_<?php echo $var['NombreImagen'] ?>" value="<?php echo $var['ID_Alojamiento'] ?>">
                                            </form>
                                        </td>
                                        <td align="center">
                                            <?php if ($i > 0) : ?>
                                                <a href= "#deleteimg-<?php echo $i; ?>" class="deletet" ><i> <img src="<?php echo base_url(); ?>users/images/icons/fugue/cross-circle.png" alt=""></i></a>
                                                <div style="display:none;"><div id="deleteimg-<?php echo $i; ?>" >
                                                        <h2>Eliminar Imangen</h2>
                                                        <p>Para Eliminar presione "Eliminar", caso contrario Cancele</p>
                                                        <button class="red eliminarimg"  rel="<?php echo $i ?>">Eliminar</button>
                                                        <button class="cancelarimg" >Cancelar</button>
                                                        <div id="<?php echo $i ?>">
                                                            <input type="hidden"  value="<?php echo $var['ID_Alojamiento'] ?>" id="id_alojar-<?php echo $i ?>">
                                                            <input type="hidden"  value="<?php echo $var['NombreImagen'] ?>" id="name_img-<?php echo $i ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- fin div imagenes -->
                <?php endif ?>
                <!-- Comienza div promociones -->
                <?php if ($edito == 'Promociones'): ?>
                    <p>Agregue o modifique promociones de su alojamiento.</p>
                    <div class="row-fluid">
                        <div class="span5">
                            <p class="message">Estas promociones seran mostradas en la ficha del alojamiento, según la fecha de vigencia.</p>
                        </div>
                    </div>
                    <br>
                    <a href="<?php echo base_url() . "users/dash/edit_promocion/" ?>" class="big-button" >Nueva promoción</a>
                    <br>
                    <br>
                    <table class="table" width="90%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Desde</th>
                                <th>Hasta</th>
                                <th>Alojamiento</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <?php foreach ($datos_array as $var): ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $var['ID_Promocion'] ?></td>
                                    <td><?php echo $var['NombrePromo'] ?></td>
                                    <td><?php echo $this->gf->html_mysql($var['DesdePromo']) ?></td>
                                    <td><?php echo $this->gf->html_mysql($var['HastaPromo']) ?></td>
                                    <td><?php echo $var['NombreAlojamiento'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url() . "users/dash/edit_promocion/" . $var['ID_Promocion'] ?>">Editar</a>&nbsp;&nbsp;
                                        <a href="<?php echo base_url() . "users/dash/delete_promocion/" . $var['ID_Promocion'] ?>">Eliminar</a>&nbsp;&nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
                <p></p>
            </div>
        </div>
    </section>

    <div class="clear"></div>

</article>

<!-- End content -->
