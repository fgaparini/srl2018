<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/tipoalojamiento/save/">
                <div class="span12">
                    <h4>Crear tipo alojamiento</h4>
                    <hr>
                    <div class="control-group">
                        <label class="control-label" >Tipo:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="TipoAlojamiento" value="<?php echo $TipoAlojamiento ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Titulo:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="TituloAlojamiento" value="<?php echo $TituloAlojamiento ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Url:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="UrlAlojamiento" value="<?php echo $UrlAlojamiento ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Keywords:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="KeyAlojamiento" value="<?php echo $KeyAlojamiento ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Descripcion:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="DesAlojamiento" value="<?php echo $DesAlojamiento ?>">
                        </div>
                    </div>
                    <div class="offset8"><button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;<a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/tipoalojamiento/lists" ?>">Volver</a></div>
                </div>
                <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                <input type="hidden" name="accion" value="<?php echo $accion ?>">
                <input type="hidden" name="ID_TipoAlojamiento" value="<?php echo $ID_TipoAlojamiento ?>">
            </form>
        </div>