
<script src='<?php echo base_url() . "js/full_calendar-1.6.1/jquery/jquery-1.9.1.min.js" ?>'></script>
<script src='<?php echo base_url() . "js/full_calendar-1.6.1/jquery/jquery-ui-1.10.2.custom.min.js" ?>'></script>

<style>

    #calendar {
        width: 600px;
        margin: 0 auto;
    }

</style>

<!-- Content -->
<article class="container_12">
    <section class="grid_12">
        <div class="block-border">
            <div class="block-content">
                <!-- We could put the menu inside a H1, but to get valid syntax we'll use a wrapper -->
                <div class="h1 with-menu">
                    <h1>Nueva reserva</h1>
                </div> 
                <form method="post" id="form_reservas" class="form" action="<?php echo base_url() ?>users_comision/dash_calendario/calendario_save/">
                    <p>
                        <label class="control-label">Habitación:</label>
                        <select id="ID_Habitacion" name="ID_Habitacion" >
                            <?php foreach ($hab_rows as $var): ?>
                                <option value="<?php echo $var['ID_Habitacion'] ?>" ><?php echo $var['NombreHab'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </p> 
                    
                    <section class="grid_5">
                        <fieldset class=" inline-small-label ">
                            <legend>Cargar tarifas</legend>
                            <div class="grid_11">

                                <p>
                                    <label class="control-label" >Desde:</label>
                                    <input  type="text" id="fecha_desde" name="fecha_desde" value="" >
                                    <img src="../../users/images/icons/fugue/calendar-month.png">
                                </p>
                                <p>
                                    <label class="control-label" >Hasta:</label>
                                    <input type="text" id="fecha_hasta" name="fecha_hasta" value="" >
                                     <img src="../../users/images/icons/fugue/calendar-month.png">
                                </p>
                                <p>
                                    <label class="control-label" >Precio Normal:</label>
                                    <input type="text"  name="precio_normal" value="" >
                                </p>
                                <p>
                                    <label class="control-label" >Precio Oferta:</label>
                                    <input type="text" name="precio_oferta" value="" >
                                </p>
                                <p> 
                            <button id="guardar" type="submit" >Guardar</button>
                        </p>
                            </div>
                        </fieldset>
                        <div class="clearfix"></div>
                    </section>

                    <section aling="left" class="grid_7 ">
                        <h2 style="font-size: 18px; padding: 0 0 0 20px">Calendario de tarifas</h2>
                            <!-- We could put the menu inside a H1, but to get valid syntax we'll use a wrapper -->
                            <div  id='calendar'></div>
                        
                        <br>
                        
                        <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                        <input type="hidden" id="ID_Alojamiento" name="ID_Alojamiento" value="<?php echo $ID_Alojamiento ?>" >
                    </section>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
    <div class="clear"></div>
</article>