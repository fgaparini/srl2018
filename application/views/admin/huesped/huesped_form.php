<div class="container-fluid">
    <div class="row-fluid">
        <!---------------------------FORMULARIOS--------------------------------------->
        <!---------------------------TITULO-------------------------------------------->
        <div class="page-header"> 
            <h1><?php echo "$title" ?></h1>
        </div>
        <!---------------------------CONTENIDO----------------------------------------->
        <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/huesped/save/">
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <label class="control-label" >Nombre:</label>
                        <div class="controls">
                            <input type="text" name="NombreHuesped" value="<?php echo $NombreHuesped ?>">
                            <?php echo form_error('NombreHuesped'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Apellido:</label>
                        <div class="controls">
                            <input type="text" name="ApellidoHuesped" value="<?php echo $ApellidoHuesped ?>">
                            <?php echo form_error('ApellidoHuesped'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Email:</label>
                        <div class="controls">
                            <?php if($ID_Huesped==''): ?>
                             <?php $EmailHuesped="@" ?>
                            <?php endif ?>
                            <input type="text" name="EmailHuesped" value="<?php echo $EmailHuesped ?>">
                            <?php echo form_error('EmailHuesped'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Fijo:</label>
                        <div class="controls">
                            <input type="text" name="TelefonoFijo" value="<?php echo $TelefonoFijo ?>">
                            <?php echo form_error('TelefonoFijo'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Celular:</label>
                        <div class="controls">
                            <input type="text" name="TelefonoCelular" value="<?php echo $TelefonoCelular ?>">
                            <?php echo form_error('TelefonoCelular'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Fechas:</label>
                        <div class="controls">
                            <input type="text" class="input-small datepicker" name="FechaDesde" value="<?php echo $FechaDesde ?>">
                            <input type="text" class="input-small datepicker" name="FechaHasta" value="<?php echo $FechaHasta ?>">
                        </div>
                    </div>
                </div>

                <div class="span6">
                    <div class="control-group">
                        <label class="control-label" >Ciudad:</label>
                        <div class="controls">
                            <input type="text" name="Ciudad" value="<?php echo $Ciudad ?>">
                            <?php echo form_error('Ciudad'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Provincia:</label>
                        <div class="controls">
                            <input type="text" name="Provincia" value="<?php echo $Provincia ?>">
                            <?php echo form_error('Provincia'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Estado:</label>
                        <div class="controls">
                            <select name="EstadoHuesped">
                                <option <?php echo $this->gf->comparar_general('consulta', $EstadoHuesped, 'selected') ?> value="consulta">Consulto</option>
                                <option <?php echo $this->gf->comparar_general('respondido', $EstadoHuesped, 'selected') ?> value="respondido">Se le envio mail</option>
                                <option <?php echo $this->gf->comparar_general('reserva', $EstadoHuesped, 'selected') ?> value="reserva">Reservo</option>
                            </select>
                            <?php echo form_error('EstadoHuesped'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group">
                    <label class="control-label" >Notas:</label>
                    <div class="controls">
                        <textarea class="ckeditor" name="NotasHuesped" ><?php echo $NotasHuesped ?></textarea>
                        <?php echo form_error('NotasHuesped'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;
                        <a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/huesped/lists" ?>">Volver</a>
                    </div>
                </div>

            </div>

            <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
            <input type="hidden" name="ID_Huesped" value="<?php echo $ID_Huesped ?>">
        </form>
    </div>