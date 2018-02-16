<!-- Content -->
<article class="container_12">
    <section class="grid_12">
        <div class="block-border">
            <div class="block-content">
                <!-- We could put the menu inside a H1, but to get valid syntax we'll use a wrapper -->
                <div class="h1 with-menu">
                    <h1>Nueva reserva</h1>
                </div> 
                <form method="post" id="form_reservas" class="form" action="<?php echo base_url() ?>users_comision/dash_reservas/reservas_save/">
                    <section class="grid_5">
                        <fieldset class=" inline-small-label ">
                            <legend>Datos Unidad Alojativa</legend>
                            <div class="grid_11">
                                <p>
                                    <label class="control-label">Habitación:</label>
                                    <select id="ID_Habitacion" name="ID_Habitacion" class="full-width">
                                        <?php foreach($hab_rows as $var): ?>
                                        <option value="<?php echo $var['ID_Habitacion'] ?>" ><?php echo $var['NombreHab'] ?></option>
                                        <?php endforeach; ?>
                                        
                                    </select>
                                </p>
                                <p>
                                    <label class="control-label" >Ingreso:</label>
                                    <input type="text" id="fecha_ingreso" name="fecha_ingreso" value="" class="full-width fecha">
                                </p>
                                <p>
                                    <label class="control-label" >Salida:</label>
                                    <input type="text" id="fecha_salida" name="fecha_salida" value="" class="full-width fecha" >
                                </p>
                                <p>
                                    <label class="control-label" >Cantidad Personas:</label>
                                    <select name="cant_pasajeros" class="full-width">
                                        <?php for($i=1 ; $i<15 ; $i++): ?>
                                            <option value="<?php echo $i ?>" ><?php echo $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </p>
                                <p>
                                    <label class="control-label" >Total:</label>
                                    <p><b id="total">$ 0</b></p>
                                </p>
                            </div>
                        </fieldset>
                        <fieldset class=" inline-small-label ">
                            <legend>Datos Huesped</legend>
                            <div class="grid11">
                                <p> 
                                    <label class="control-label" >Nombre:</label>
                                    <input type="text" name="NombreHuesped" class="full-width"  value="">
                                </p>
                                <p>
                                    <label class="control-label" >Apellido:</label>
                                    <input type="text" name="ApellidoHuesped" class="full-width"  value="">
                                </p>
                                <p>
                                    <label class="control-label" >Fijo:</label>
                                    <input type="text" name="TelefonoFijo" class="full-width"  value="">
                                </p>
                                <p>
                                    <label class="control-label" >Celular:</label>
                                    <input type="text" name="TelefonoCelular" class="full-width"  value="">
                                </p>
                                <p>
                                    <label class="control-label" >E-Mail:</label>
                                    <input type="text" name="EmailHuesped" value="" class="full-width">
                                </p>
                                
                            </div>
                        </fieldset>
                        <div class="clearfix"></div>
                    </section>

                    <section class="grid_6 ">
                        <fieldset class="grey-bg ">
                            <legend>Observaciones</legend>
                            <textarea class="ckeditor" id="Descripcion" rows="10" name="observaciones"></textarea>
                        </fieldset>

                        <p> 
                            <button id="guardar" type="submit" >Guardar</button>
                        </p>
                        <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                        <input type="hidden" id="costo_total" name="costo_total" value="" >
                        <input type="hidden" name="ID_Alojamiento" value="<?php echo $ID_Alojamiento ?>" >
                    </section>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
    <div class="clear"></div>
</article>