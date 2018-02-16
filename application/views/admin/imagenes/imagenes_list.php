<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h2><?php echo $title ?> </h2>
            <div class="row-fluid">
                <div class="span9">
                    <div class="row-fluid">
                        <h3>Agregar Imagen</h3>
                        <br>
                    </div>
                    <div class="row-fluid">
                        <div class="row-fluid">
                            <h4>Agregar mas fotos</h4>
                        </div>
                        <div class="span5">
                            <form action="<?php echo base_url() ?>admin/imagenes/save/" method="post" enctype="multipart/form-data">
                                <input type="file" name="filesToUpload[]" id="filesToUpload" multiple="" value="Agregar Foto">
                                <input type="submit" value="subir" class="btn btn-primary"/>
                                <input name="im_id_imagen_tipo" value="<?php echo $im_id_imagen_tipo ?>" type="hidden" />
                                <input name="tipo" value="foto_mas" type="hidden">
                            </form>
                        </div>
                        <table class="table">
                            <tr><th>Nombre Foto</th><th>Imagen</th><th>Agregar</th><th>Borrar</th></tr>
                            <?php foreach ($datos_array as $var): ?>
                                <tr id="<?php echo "ah_" . $var['im_id_imagen'] ?>">
                                    <td><?php echo $var['im_id_imagen'] . "jpg" ?></td>
                                    <?php if ($it_con_thumb == 'si'): ?>
                                        <td><a rel="example_group" href="<?php echo base_url() . $it_gral_upload . $var['im_id_imagen'] . ".jpg" ?>"><img class="last"  width="50px" src="<?php echo base_url() . $it_thumb_upload . $var['im_id_imagen'] . ".jpg" ?>"></a></td>
                                    <?php else: ?>
                                        <td><a rel="example_group" href="<?php echo base_url() . $it_gral_upload . $var['im_id_imagen'] . ".jpg" ?>"><img class="last"  width="50px" src="<?php echo base_url() . $it_gral_upload . $var['im_id_imagen'] . ".jpg" ?>"></a></td>
                                    <?php endif ?>
                                    <td>
                                        <form action="<?php echo base_url() ?>admin/imagenes/save/" method="post" enctype="multipart/form-data">
                                            <input type="file" name="filesToUpload[]" id="filesToUpload" multiple="" value="Agregar Foto">
                                            <input type="submit" value="subir" class="btn btn-primary"/>
                                            <input name="im_id_imagen" value="<?php echo $var['im_id_imagen'] ?>" type="hidden">
                                            <input name="im_id_imagen_tipo" value="<?php echo $var['im_id_imagen_tipo'] ?>" type="hidden">
                                            <input name="tipo" value="foto_comun" type="hidden">
                                        </form>
                                    </td>
                                    <td>
                                        <input type="text" id="des_<?php echo $var['im_id_imagen'] . "_" . $var['im_id_imagen_tipo'] ?>" value="<?php echo $var['im_descripcion'] ?>" />
                                        <button onclick="guardar_des('<?php echo $var['im_id_imagen'] ?>','<?php echo $var['im_id_imagen_tipo'] ?>')" class="btn btn-primary btn-mini">OK</button>
                                    </td>
                                    <td>
                                        <a href= "<?php echo base_url() . "admin/imagenes/delete/" . $var['im_id_imagen'] . "/?im_id_imagen_tipo=" . $var['im_id_imagen_tipo'] ?>" ><i class="icon-remove"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                <input  type="hidden" id="base_url" value="<?php echo base_url() ?>">
            </div>
        </div>