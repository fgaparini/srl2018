<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h4>Listado Páginas</h4>
            <hr>
            <a href="<?php echo base_url() . 'admin/paginas/form' ?>" class="btn btn-primary">Crear página</a>
            <br>
            <br>
            <table class="table">
                <tr><th>ID</th><th>Título</th><th>Url</th><th>Keywords</th><th>TipoPagina</th><th>Acción</th></tr>
                <?php $internas_array = array(); ?>
                <?php foreach ($paginas_array as $var): ?>
                    <tr id="<?php echo "pa_" . $var['ID_Pagina'] ?>" class="interna" style="cursor:pointer">
                        <td><?php echo $var['ID_Pagina'] ?></td>
                        <td><?php echo $var['TituloContenido'] ?></td>
                        <td><?php echo $var['Url'] ?></td>
                        <td><?php echo $var['Keywords'] ?></td>
                        <td><?php echo $var['TipoPagina'] ?></td>
                        <td>
                            <a href="<?php echo base_url() . "admin/paginas/form/" . $var['ID_Pagina'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                            <a data-toggle="modal" href= "#myModal" onclick="paginas_delete('<?php echo $var['ID_Pagina'] ?>')"><i class="icon-remove"></i></a>&nbsp;&nbsp;
                            <a  href="<?php echo base_url() . "admin/paginas/paginas_imagenes_list/" . $var['ID_Pagina'] ?>" <i class="icon-picture"></i></a>&nbsp;&nbsp;
                            <a  href="<?php echo base_url() . "admin/paginas/paginas_imagenes_list_slider/" . $var['ID_Pagina'] ?>" <i class="icon-bell"></i></a>&nbsp;&nbsp;

                            <a  href="<?php echo base_url() . "admin/paginas/form_interna/?ID_Pagina=" . $var['ID_Pagina'] . "&ID_TipoPagina=" . $var['ID_TipoPagina'] ?>" <i class=" icon-arrow-down"></i></a>&nbsp;&nbsp;

                        </td>
                    </tr>
                    <?php $internas_array = $this->paginas_model->paginas_list_internas($var['ID_Pagina']) ?>
                    <?php foreach ($internas_array as $var0): ?>
                        <tr id="<?php echo "pa_" . $var0['ID_Pagina'] ?>" class="<?php echo "pa_" . $var['ID_Pagina'] ?>" >                    
                            <td style="border: none"><?php echo $var0['ID_Pagina'] ?></td>
                            <td style="border: none"><?php echo $var0['TituloContenido'] ?></td>
                            <td style="border: none"><?php echo $var0['Url'] ?></td>
                            <td style="border: none"><?php echo $var0['Keywords'] ?></td>
                            <td style="border: none"><?php echo $var0['TipoPagina'] ?></td>
                            <td  style="border: none">
                                <a href="<?php echo base_url() . "admin/paginas/form/" . $var0['ID_Pagina'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                                <a data-toggle="modal" href= "#myModal" onclick="paginas_delete('<?php echo $var0['ID_Pagina'] ?>')"><i class="icon-remove"></i></a>&nbsp;&nbsp;
                                <a  href="<?php echo base_url() . "admin/paginas/paginas_imagenes_list/" . $var0['ID_Pagina'] ?>" <i class="icon-picture"></i></a>&nbsp;&nbsp;
                                <a  href="<?php echo base_url() . "admin/paginas/paginas_imagenes_list_slider/" . $var0['ID_Pagina'] ?>" <i class="icon-bell"></i></a>&nbsp;&nbsp;
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </table>
            <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
            <input type="hidden" name="accion" value="guardar">
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
