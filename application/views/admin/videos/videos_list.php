<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">

            <!---------------------------FORMULARIOS--------------------------------------->
            <!---------------------------TITULO-------------------------------------------->
            <div class="page-header">
                <h1><?php echo "$title" ?></h1>
            </div>
            <!---------------------------CONTENIDO----------------------------------------->
            <a href="<?php echo base_url() . 'admin/videos/form' ?>" class="btn btn-success">
                Nuevo Video
            </a>
            <br>
            <br>
            <table class="table">
                <tr><th>ID</th><th>Nombre</th><th>Url</th><th>Acción</th></tr>
                <?php foreach ($datos_array as $var): ?>
                    <tr>
                        <td><?php echo $var['ID_Video'] ?></td>
                        <td><?php echo $var['NombreVideo'] ?></td>
                        <td><?php echo $var['UrlVideo'] ?></td>
                        <td>
                            <a href="<?php echo base_url() . "admin/videos/form/" . $var['ID_Video'] ?>">
                                <i class="icon-edit"></i>
                            </a>&nbsp;&nbsp;
                            <a href="<?php echo base_url() . "admin/videos/delete/" . $var['ID_Video'] ?>">
                                <i class="icon-remove"></i>
                            </a>&nbsp;&nbsp;
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
            <input type="hidden" name="accion" value="guardar">
        </div>