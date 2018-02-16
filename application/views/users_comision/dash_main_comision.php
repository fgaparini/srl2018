
<script src='<?php echo base_url() . "js/full_calendar-1.6.1/jquery/jquery-1.9.1.min.js" ?>'></script>
<script src='<?php echo base_url() . "js/full_calendar-1.6.1/jquery/jquery-ui-1.10.2.custom.min.js" ?>'></script>

<style>

    .block-conten {
        margin-top: 40px;
        text-align: center;
        font-size: 14px;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    }

    #calendar {
        width: 600px;
        margin: 0 auto;
        height: auto;
    }

</style>
<!-- nueva reserva ! -->
<div id="control-bar" class="grey-bg clearfix">
    <div class="container_12">
        
        <div class="float-right">
            <a href="<?php echo base_url()."users_comision/dash_reservas/reservas_form/"?>"><button type="button"><img src="<?php echo base_url() ?>users/images/icons/fugue/tick-circle.png" width="16" height="16"> Nueva Reserva</button></a>
        </div>
        
    </div>
</div>

<!-- Content -->
<article class="container_12">
    <section class="grid_4" >
        <div class="block-border">
            <div class="block-content">
               <div class="h1 with-menu">
                    <h1>Ocupacion</h1>
                </div>
                 <div class="container_12">
                    <div  class="grid_4">
                        <label>Año:</label>
                        <select id="ano">
                            <option value="2015">2015</option>
                            <option value="2015">2016</option>
                            <option value="2015">2017</option>
                        </select>
                       </div>
                    <div  class="grid_7">
                        <label>Mes:</label>
                        <select id="mes">
                            <?php foreach ($meses as $var => $k): ?>
                                <option <?php echo $this->gf->comparar_general($mes_actual,$k,'selected') ?> value="<?php echo $k ?>"><?php echo $var ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div style="clear:both"></div>
                <div id="chart_div" style="width: 100%; height: 300px;"></div>
            </div>
        </div>
    </section>
    <section class="grid_8">
        <div class="block-border">
            <div class="block-content">
                <!-- We could put the menu inside a H1, but to get valid syntax we'll use a wrapper -->
                <div class="h1 with-menu">
                    <h1>Calendario</h1>
                </div>
                <select name="ID_Habitacion" id="ID_Habitacion">
                    <?php foreach ($hab_rows as $var): ?>
                        <option value="<?php echo $var['ID_Habitacion'] ?>"><?php echo $var['NombreHab'] ?></option>
                    <?php endforeach; ?>
                </select>

                <div id='calendar'></div>
            </div>
        </div>
    </section>
    <div class="clear"></div>
</article>
<input type="hidden" id="ID_Alojamiento" value="<?php echo $ID_Alojamiento ?>">
