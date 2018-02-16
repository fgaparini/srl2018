<div class="container-fluid">
    <div class="row-fluid">
        <div class="row-fluid">
            <a href="<?php echo base_url() . "admin/reservas/" ?>" class="btn btn-primary">Volver</a>
            <br>
            <br>
        </div>
        <div class="row-fluid">
            <h2>Huesped</h2>
            <?php echo $mail_huesped ?>
        </div>
        <hr>
        <div class="row-fluid">
            <h2>Alojamiento</h2>
            <?php echo $mail_alojamiento ?>
        </div>
        <hr>
        <div class="row-fluid">
            <h2>San Rafael Late</h2>
            <?php echo $mail_sanrafaellate ?>
        </div>
        

        <div class="row-fluid">
            <label class="checkbox">
                <input id="mail_alojamiento" type="checkbox" >
                Enviar mail Alojamiento
            </label>
            <label class="checkbox">
                <input id="mail_sanrafaellate"  type="checkbox" >
                Enviar mail San Rafael Late
            </label>
            <label class="checkbox">
                <input id="mail_huesped" type="checkbox" >
                Enviar mail Huesped
            </label>
            <br>
            <br>
            <a id="confirmar" class="btn primary">Confirmar</a>
            <input  type="hidden" id="reservas_id" value="<?php echo $reservas_id ?>">
            <input  type="hidden" id="base_url"    value="<?php echo base_url(); ?>" >
        </div>


