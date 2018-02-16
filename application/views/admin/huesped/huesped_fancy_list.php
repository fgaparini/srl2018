<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <br>
            <form class="form-inline" method="get" action="<?php echo base_url() . "admin/huesped/huesped_fancy_list/" ?>">
                <input type="text" name="NombreHuesped" class="input-medium" placeholder="Nombre">
                <input type="text" name="ApellidoHuesped" class="input-medium" placeholder="Apellido">
                <button type="submit" class="btn">Buscar</button>
            </form>
            <table class="table table-bordered table-condensed table-condensed table-striped table-hover">
                <tr><th>Elegir</th><th>Nombre</th><th>Email</th><th>Fijo</th><th>Celular</th></tr>
                <?php foreach ($rows as $var): ?>
                    <tr>
                        <td><input value="<?php echo $var['ID_Huesped'] ?>" onclick="huesped_select(<?php echo $var['ID_Huesped'] ?>)" type="checkbox"></td>
                        <td id="na_<?php echo $var['ID_Huesped'] ?>"><?php echo $var['NombreHuesped'] . ", " . $var['ApellidoHuesped'] ?></td>
                        <td><?php echo $var['EmailHuesped'] ?></td>
                        <td><?php echo $var['TelefonoFijo'] ?></td>
                        <td><?php echo $var['TelefonoCelular'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
            <input type="hidden" name="accion" value="guardar">
        </div>
