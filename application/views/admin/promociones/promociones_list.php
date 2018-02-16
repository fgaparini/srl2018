<div class="container-fluid">
    <div class="row-fluid">
        <!---------------------------FORMULARIOS--------------------------------------->
        <!---------------------------TITULO-------------------------------------------->
        <h2><?php echo "$title" ?></h2>
        <!---------------------------CONTENIDO----------------------------------------->
        <a href="<?php echo base_url() . 'admin/promociones/form/?ID_Alojamiento=' . $ID_Alojamiento ?>" class="btn btn-success">
            Nueva promoción
        </a>
        <br>
        <br>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Alojamiento</th>
                <th>Acción</th>
            </tr>
            <?php foreach ($datos_array as $var): ?>
                <tr>
                    <td><?php echo $var['ID_Promocion'] ?></td>
                    <td><?php echo $var['NombrePromo'] ?></td>
                    <td><?php echo $this->gf->html_mysql($var['DesdePromo']) ?></td>
                    <td><?php echo $this->gf->html_mysql($var['HastaPromo']) ?></td>
                    <td><?php echo $var['NombreAlojamiento'] ?></td>
                    <td>
                        <a href="<?php echo base_url() . "admin/promociones/form/" . $var['ID_Promocion'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                        <a href="<?php echo base_url() . "admin/promociones/delete/" . $var['ID_Promocion']."/?ID_Alojamiento=".$ID_Alojamiento ?>"><i class="icon-remove"></i></a>&nbsp;&nbsp;
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
        <input type="hidden" name="accion" value="guardar">