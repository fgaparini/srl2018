<!-- Content -->
<article class="container_12">
    <div class="block-border">
        <div class="block-content">
            <!-- We could put the menu inside a H1, but to get valid syntax we'll use a wrapper -->
            <h1><?php echo $title ?></h1>

            <form method="post" class="form" action="<?php echo base_url() ?>users/dash/save_promocion/">
                <section class="grid_5">
                    <fieldset class=" inline-small-label ">
                        <legend>Datos del promoción</legend>
                        <div class="grid_11">
                            <p> 
                                <label class="control-label" >Nombre:</label>
                                <input type="text" name="NombrePromo" class="full-width"  value="<?php echo $NombrePromo ?>">
                                <?php echo form_error('NombrePromo'); ?>
                            </p>
                            <p> 
                                <label class="control-label" >Desde:</label>
                                <input type="text" id="from"  name="DesdePromo" class="full-width"  value="<?php echo $DesdePromo ?>">
                                <?php echo form_error('DesdePromo'); ?>
                            </p>
                            <p> 
                                <label class="control-label" >Hasta:</label>
                                <input type="text" id="to"  name="HastaPromo" class="full-width"  value="<?php echo $HastaPromo ?>">
                                <?php echo form_error('HastaPromo'); ?>
                            </p>                            
                        </div>
                    </fieldset>
                    <div class="clearfix"></div>
                </section>
                <section class="grid_6 ">
                    <fieldset class="grey-bg ">
                        <legend>Descripción</legend>
                        <textarea  id="Descripcion" rows="10" name="DetallePromo"><?php echo $DetallePromo ?></textarea>
                        <?php echo form_error('DetallePromo'); ?>
                    </fieldset>
                    <p> 
                        <button  type="submit" >Guardar</button>
                        <a class="big-button" href="<?php echo base_url()."users/dash/editar/promociones/" ?>">Volver</a>
                    </p>

                    <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                    <input type="hidden" name="ID_Promocion" value="<?php echo $ID_Promocion ?>">
                    <input type="hidden" name="ID_Alojamiento" value="<?php echo $ID_Alojamiento ?>">
                </section> 
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
</article>
<!-- End content -->