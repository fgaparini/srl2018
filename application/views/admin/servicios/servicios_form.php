<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/servicios/save/">
                <div class="span12">
                    <h4>Crear Servicio</h4>
                    <hr>
                    <div class="control-group">
                        <label class="control-label" >Servicio:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="Servicio" value="<?php echo $Servicio ?>">
                        </div>
                        <br>
                        <div class="offset8"><button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;<a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/servicios/lists" ?>">Volver</a></div>
                    </div>
                </div>
                <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                <input type="hidden" name="accion" value="<?php echo $accion ?>">
                <input type="hidden" name="ID_Servicio" value="<?php echo $ID_Servicio ?>">
            </form>
        </div>
