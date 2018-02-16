<div class="container-fluid">
    <div class="row-fluid">
        <!---------------------------FORMULARIOS--------------------------------------->
        <!---------------------------TITULO-------------------------------------------->
        <div class="page-header">
            <h1><?php echo "$title" ?></h1>
        </div>
        <!---------------------------CONTENIDO----------------------------------------->
        <a href="<?php echo base_url() . 'admin/imagenes_tipo/form' ?>" class="btn btn-primary">
            Crear imagen tipo
        </a>
        <br>
        <br>
        <table class="table">
            <tr><th>ID</th><th>Nombre</th><th>Acción</th></tr>
            <?php foreach ($datos_array as $var): ?>
                <tr>
                    <td><?php echo $var['it_id_imagen_tipo'] ?></td>
                    <td><?php echo $var['it_nombre'] ?></td>
                    <td>
                        <a href="<?php echo base_url() . "admin/imagenes_tipo/form/" . $var['it_id_imagen_tipo'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                        <a href="<?php echo base_url() . "admin/imagenes_tipo/delete/" . $var['it_id_imagen_tipo'] ?>"><i class="icon-remove"></i></a>&nbsp;&nbsp;
                        <a href="<?php echo base_url() . "admin/imagenes/lists/" . $var['it_id_imagen_tipo'] ?>"><i class="icon-picture"></i></a>&nbsp;&nbsp;
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
        <input type="hidden" name="accion" value="guardar">
    </div>