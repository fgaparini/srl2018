<article class="container_12">
    <div class="block-content no-title">
    <form>
        <p>
            <label>Costo:</label>
            <input type="text" value="<?php echo $monto_pago ?>" name="monto_pago" id="monto_pago">
            <a href="#" class="button" id="guardar_pago">Guardar</a>
            <input type="hidden" id="id_reserva" value="<?php echo $id_reserva ?>" >
            <input type="hidden" id="base_url" value="<?php echo base_url() ?>" >
        </p>
    </form>
</div>
</article>