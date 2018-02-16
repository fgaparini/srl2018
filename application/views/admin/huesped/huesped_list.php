<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h4>Listado de huesped</h4>
            <hr>
            <form class="form-inline" method="get" action="<?php echo base_url() . "admin/huesped/lists/" ?>">
                <input type="text" name="NombreHuesped" class="input-medium" placeholder="Nombre">
                <input type="text" name="ApellidoHuesped" class="input-medium" placeholder="Apellido">
                <button type="submit" class="btn">Buscar</button>
            </form>
            <a href="<?php echo base_url() . 'admin/huesped/form' ?>" class="btn btn-primary">Nuevo Huesped</a>
            <br>
            <br>
            <table class="table table-bordered table-condensed table-condensed table-striped table-hover">
                <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Fijo</th><th>Celular</th><th>Estado</th><th>Acción</th></tr>
                <?php foreach ($rows as $var): ?>
                    <?php if ($var['EstadoHuesped'] == 'consulta'): ?>
                        <tr class="warning" >
                        <?php elseif ($var['EstadoHuesped'] == 'respondido'): ?>
                        <tr  class="info">
                        <?php elseif ($var['EstadoHuesped'] == 'reserva'): ?>
                        <tr class="success">
                        <?php endif; ?>

                        <td><?php echo $var['ID_Huesped'] ?></td>
                        <td><?php echo $var['NombreHuesped'] . ", " . $var['ApellidoHuesped'] ?></td>
                        <td><?php echo $var['EmailHuesped'] ?></td>
                        <td><?php echo $var['TelefonoFijo'] ?></td>
                        <td><?php echo $var['TelefonoCelular'] ?></td>
                        <td><?php echo $var['EstadoHuesped'] ?></td>
                        <td>
                            <a title="enviar mail" href="<?php echo base_url() . "admin/huesped/mail_huesped/" . $var['ID_Huesped'] ?>"><i class="icon-envelope"></i></a>&nbsp;&nbsp;
                            <a title="reenviar" href="<?php echo base_url() . "admin/huesped_mail/huesped_mail_list/" . $var['ID_Huesped'] ?>"><i class="icon-share"></i></a>&nbsp;&nbsp;
                            <a title="modificar" href="<?php echo base_url() . "admin/huesped/form/" . $var['ID_Huesped'] ?>"><i class="icon-edit" ></i></a>&nbsp;&nbsp;
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
            <input type="hidden" name="accion" value="guardar">
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="pagination">
                    <?php echo $links; ?>
                </div>
            </div>
        </div>
