<div class="container-fluid">
    <div class="row-fluid">

<!---------------------------FORMULARIOS--------------------------------------->
<!---------------------------TITULO-------------------------------------------->
<div class="page-header"> 
    <h1><?php echo "$title" ?></h1>
</div>
<!---------------------------CONTENIDO----------------------------------------->
<form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/promociones/save/">

    <div class="control-group">
        <label class="control-label" >Nombre:</label>
        <div class="controls">
            <input type="text" name="NombrePromo" value="<?php echo $NombrePromo ?>">
            <?php echo form_error('NombrePromo'); ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" >Desde:</label>
        <div class="controls">
            <input type="text" id="from"  class="datepicker" name="DesdePromo" value="<?php echo $DesdePromo ?>">
            <?php echo form_error('DesdePromo'); ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" >Hasta:</label>
        <div class="controls">
            <input type="text" id="to"  name="HastaPromo" value="<?php echo $HastaPromo ?>">
            <?php echo form_error('HastaPromo'); ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" >Detalle:</label>
        <div class="controls">
            <textarea class="ckeditor" name="DetallePromo"><?php echo $DetallePromo ?></textarea>
            <?php echo form_error('DetallePromo'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;
            <a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/promociones/lists/".$ID_Alojamiento ?>">Volver</a>
        </div>
    </div>
    <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
    <input type="hidden" name="ID_Promocion" value="<?php echo $ID_Promocion ?>">
    <input type="hidden" name="ID_Alojamiento" value="<?php echo $ID_Alojamiento ?>">
</form>
