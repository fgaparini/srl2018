<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/tipoempresa/save/">
                <div class="span12">
                    <h4>Crear tipo empresa</h4>
                    <hr>
                    <div class="control-group">
                        <label class="control-label" >Tipo:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="TipoEmpresa" value="<?php echo $TipoEmpresa ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Título:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="TituloEmpresa" value="<?php echo $TituloEmpresa ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >URL:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="UrlEmpresa" value="<?php echo $UrlEmpresa ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Keywords:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="KeyEmpresa" value="<?php echo $KeyEmpresa ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Descripción:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="DesEmpresa" value="<?php echo $DesEmpresa ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Contenido:</label>
                        <div class="controls">
                            <textarea class="ckeditor" name="ContEmpresa"><?php echo $ContEmpresa ?></textarea>
                        </div>
                    </div>
                    <div class="offset8"><button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;<a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/tipoempresa/lists" ?>">Volver</a></div>
                </div>
                <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                <input type="hidden" name="accion" value="<?php echo $accion ?>">
                <input type="hidden" name="ID_TipoEmpresa" value="<?php echo $ID_TipoEmpresa ?>">
            </form>
        </div>
