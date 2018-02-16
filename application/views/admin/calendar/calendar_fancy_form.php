
<h2>Calendario</h2>
<form>
    <div class="span2">
        <div class="control-group">
            <label>Asignadas</label>
            <input type="text" value="<?php echo $asignada ?>" id="asignada" name="asignada" class="input-mini" placeholder="Asignada">
        </div>
        <div class="control-group">
            <label>Mínima</label>
            <input type="text" value="<?php echo $minima ?>" id="minima" name="minima" class="input-mini" placeholder="Minima">
        </div>
    </div>
    <div class="span2">
        <div class="control-group">
            <label>Normal</label>
            <input type="text" value="<?php echo $normal ?>" id="normal" name="normal" class="input-mini" placeholder="Normal">
        </div>
        <div class="control-group">
            <label>Oferta</label>
            <input type="text" value="<?php echo $oferta ?>" id="oferta" name="oferta" class="input-mini" placeholder="Oferta">
        </div>
    </div>
    <div class="span2">
        <div class="control-group">
            <label>Bloquear</label>
            <input type="checkbox" <?php echo $this->gf->comparar_general('C', $bloqueo, 'checked') ?> id="bloqueo" value="C" name="bloqueo">
            Bloqueo
        </div>
        <div class="control-group">
            <label>&nbsp;</label>
            <a href="#" onclick="guardar_fancy()" class="btn btn-primary btn-large">Guardar</a>
        </div>
    </div>
    <input id="base_url" value="<?php echo base_url() ?>" type="hidden">
    <input id="id_habitacion" value="<?php echo $id_habitacion ?>" type="hidden">
    <input id="fecha" value="<?php echo $fecha ?>" type="hidden">
    
    <input id="rango" value="<?php echo $rango ?>" type="hidden">
    <input id="fecha_fin" value="<?php echo $fecha_fin ?>" type="hidden">
    <input id="cant" value="<?php echo $cant ?>" type="hidden">
    <input id="operacion" value="<?php echo $operacion ?>" type="hidden">
    
</form>






















