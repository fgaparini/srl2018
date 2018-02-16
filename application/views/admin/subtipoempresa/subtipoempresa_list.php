<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h4>Listado subtipo empresas</h4>
            <hr>
            <a href="<?php echo base_url() . 'admin/subtipoempresa/form' ?>" class="btn btn-primary">Crear subtipo empresa</a>
            <br>
            <br>
            <table class="table">
                <tr><th>ID</th><th>Tipo Empresa</th><th>Subtipo Empresa</th><th>Acción</th></tr>
                <?php foreach ($subtipoempresa_array as $var): ?>
                    <tr id="<?php echo "cat_" . $var['ID_SubtipoEmpresa'] ?>">
                        <td><?php echo $var['ID_SubtipoEmpresa'] ?></td>
                        <td><?php echo $var['TipoEmpresa'] ?></td>
                        <td><?php echo $var['SubtipoEmpresa'] ?></td>
                        <td>
                            <a href="<?php echo base_url() . "admin/subtipoempresa/form/" . $var['ID_SubtipoEmpresa'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                            <a  href= "#" onclick="eliminar(<?php echo $var['ID_SubtipoEmpresa'] ?>)" ><i class="icon-remove"></i></a>&nbsp;&nbsp;
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
            <input type="hidden" name="accion" value="guardar">
        </div>
