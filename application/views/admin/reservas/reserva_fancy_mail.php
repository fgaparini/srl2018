<div class="row-fluid">
    <form method="get" action="<?php echo base_url() . "admin/reservas/reserva_fancy_enviar/" ?>">
        <div class="span1">
            <input type="checkbox" value="1" name="check_alojamiento">Alojamiento
        </div>
        <div class="span1">
            <input type="checkbox" value="1" name="check_huedped">Huesped
        </div>
        <div class="span1">
            <input type="checkbox" value="1" name="check_sanrafaellate">SRLate
        </div>

        <input type="hidden" value="<?php echo $alojamiento_id ?>" name="alojamiento_id">
        <input type="hidden" value="<?php echo $id_huesped ?>" name="id_huesped">
        <input type="hidden" value="<?php echo $reservas_id ?>" name="reservas_id">

        </div>
        <div class="span2">
            <input type="submit" value="enviar" class="btn btn-primary">
        </div>
    </form>
</div>

