<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/subtipoempresa/save/">
                <div class="span12">
                    <h4>Subtipo empresa</h4>
                    <hr>
                    <div class="control-group">
                        <label class="control-label" >Subtipo Empresa:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="SubtipoEmpresa" value="<?php echo $SubtipoEmpresa ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Título:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="TituloSubEmpresa" value="<?php echo $TituloSubEmpresa ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Url:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="UrlSubEmpresa" value="<?php echo $UrlSubEmpresa ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Keywords:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="KeySubEmpresa" value="<?php echo $KeySubEmpresa ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Descripción:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="DesSubEmpresa" value="<?php echo $DesSubEmpresa ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Tipo Empresa:</label>
                        <div class="controls">
                            <select name="ID_TipoEmpresa">
                                <?php foreach ($tipoempresa_array as $var): ?>
                                    <option <?php echo $this->gf->comparar_general($var['ID_TipoEmpresa'], $ID_TipoEmpresa, "selected='selected'") ?> value="<?php echo $var['ID_TipoEmpresa'] ?>"><?php echo $var['TipoEmpresa'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="offset8"><button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;<a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/subtipoempresa/lists" ?>">Volver</a></div>

                </div>
                <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                <input type="hidden" name="accion" value="<?php echo $accion ?>">
                <input type="hidden" name="ID_SubtipoEmpresa" value="<?php echo $ID_SubtipoEmpresa ?>">
            </form>
        </div>
