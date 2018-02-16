<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h2><?php echo $title ?></h2>
            <br>
            <table class="table table-bordered table-condensed table-hover table-striped">
                <th>Alojamiento</th>
                <th>Fecha</th>
                <th>Ip</th>
                <th>Navegador</th>
                <th>Tipo Dash</th>
                <?php foreach ($rows as $var): ?>
                    <tr>
                        <td><?php echo $var['Nombre'] ?></td>
                        <td><?php echo $var['FechaIngreso'] ?></td>
                        <td><?php echo $var['IP'] ?></td>
                        <td><?php echo $var['Navegador'] ?></td>
                        <td><?php echo $var['TipoDash'] ?></td>
                    </tr>
                <?php endforeach; ?>

            </table> 
        </div>



