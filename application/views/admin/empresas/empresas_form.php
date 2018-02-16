<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/empresas/save/" enctype="multipart/form-data">
                <div class="span12">
                    <h4>Empresas</h4>
                    <hr>
                    <div class="control-group">
                        <label class="control-label" >Empresa:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="Empresa" value="<?php echo $Empresa ?>">
                        </div>
                        <br>
                        <label class="control-label" >Dirección:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="Direccion" value="<?php echo $Direccion ?>">
                        </div>
                        <br>
                        <label class="control-label" >Url:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="Url" value="<?php echo $Url ?>">
                        </div>
                        <br>
                        <label class="control-label">Teléfono:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="Telefono" value="<?php echo $Telefono ?>">
                        </div>
                        <br>
                        <label class="control-label" >Mail:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="Mail" value="<?php echo $Mail ?>">
                        </div>
                        <br>
                        <label class="control-label" >Coordenadas:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="Coordenadas" value="<?php echo $Coordenadas ?>">
                        </div>
                        <br>
                        <label class="control-label" >Facebook:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="Facebook" value="<?php echo $Facebook ?>">
                        </div>
                        <br>
                        <label class="control-label" >Twitter:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="Twitter" value="<?php echo $Twitter ?>">
                        </div>
                        <br>
                        <label class="control-label" >Pinterest:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="Pinterest" value="<?php echo $Pinterest ?>">
                        </div>
                        <br>
                        <label class="control-label" >Gplus:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="Gplus" value="<?php echo $Gplus ?>">
                        </div>
                        <br>
                        <label class="control-label" >Web:</label>
                        <div class="controls">
                            <input type="text" class="span10"  name="Web" value="<?php echo $Web ?>">
                        </div>
                        <br>
                        <label class="control-label" >Descripción:</label>
                        <div class="controls">
                            <textarea class="ckeditor" rows="10" name="Descripcion"><?php echo $Descripcion ?></textarea>
                        </div>
                        <br>
                        <label class="control-label" >Descripción Detallada:</label>
                        <div class="controls">
                            <textarea class="ckeditor" rows="10" name="DescripcionDeta"><?php echo $DescripcionDeta ?></textarea>
                        </div>
                        <br>
                        <label  class="control-label" >Tipo Empresa:</label>
                        <div class="controls">
                            <select class="span10" name="ID_TipoEmpresa" id="ID_TipoEmpresa" onchange="llenar()">
                                <?php foreach ($tipo_empresas_array as $var): ?>
                                    <option <?php echo $this->gf->comparar_general($var['ID_TipoEmpresa'], $ID_TipoEmpresa, "selected='selected'") ?> value="<?php echo $var['ID_TipoEmpresa'] ?>"><?php echo $var['TipoEmpresa'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <br>
                        <label  class="control-label" >Subtipo Empresa:</label>
                        <div class="controls">
                            <select class="span10" name="ID_SubtipoEmpresa" id="ID_SubtipoEmpresa">
                                <option value="0">Seleccione...</option>
                                <?php foreach ($suptipo_empresa_array as $var): ?>
                                    <option <?php echo $this->gf->comparar_general($var['ID_SubtipoEmpresa'], $ID_SubtipoEmpresa, "selected='selected'") ?> value="<?php echo $var['ID_SubtipoEmpresa'] ?>"><?php echo $var['SubtipoEmpresa'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <br>
                        <div id="bodegas" style="background-color: #eee">
                            <input type="hidden" name="bodega_id"  id="bodega_id"  value="<?php echo $bodega_id;?>" >
                            <label  class="control-label" >Bodega de caminos del Vino:</label>
                             <div class="controls" >
                                 <input type="checkbox" id="circuitovino" name="circuitovino" <?php if($circuitovino==true) {echo "checked";} ?> value="true" >   
                             </div>
                            <br>
                            <div id="bodegadata" class="">
                                <div class="span12"><h3>Información Caminos del Vino</h3>
                                    <hr>
                               </div>
                                <div class="span12">
                                     <h5>
                                    Tipo Produccion 
                                </h5>
                                    <div class="span3">
                                        <label  class="control-label" >Vinos:</label>
                                        <div class="controls" >
                                         <input type="checkbox" <?php if($vino) {echo "checked";} ?>   name="vino"  value="1" >   
                                        </div>
                                    </div>
                                     <div class="span3">
                                        <label  class="control-label" >Espumante:</label>
                                        <div class="controls" >
                                         <input type="checkbox"  <?php if($espumante) {echo "checked";} ?>  name="espumante"  value="1" >   
                                        </div>
                                    </div>
                                     <div class="span3">
                                        <label  class="control-label"  >Organico/Artesanal:</label>
                                        <div class="controls" >
                                         <input type="checkbox"  <?php if($organicoartesanal) {echo "checked";} ?> name="organicoartesanal"  value="1" >   
                                        </div>
                                    </div>
                                </div>
                                 <div class="span12">
                                    <h5>Región</h5>
                                    <select id="region" name="region">
                                        <option <?php if($region=="s") {echo "selected";} ?>  value="s">Sur</option>
                                        <option <?php if($region=="e") {echo "selected";} ?> value="e">Este</option>
                                        <option <?php if($region=="o") {echo "selected";} ?> value="o">Oeste</option>
                                    </select>
                                 </div>
                                <div class="span12">
                                    <h5>Servicios</h5>
                                    <div>
                                        <div class="row-fluid">
                                            <div class="offset1">
                                                <ol>
                                                   
                                                    <li style="display: inline-block;width: 20%">
                                                        <label class="checkbox">
                                                            <input   value="1" <?php if($restaurant) {echo "checked";} ?>  name="restaurant" type="checkbox">
                                                            Restaurant
                                                        </label>
                                                    </li>
                                                    <li style="display: inline-block;width: 20%">
                                                        <label class="checkbox">
                                                            <input   value="1" <?php if($degustaciones) {echo "checked";} ?>  name="degustaciones" type="checkbox">
                                                            Degustaciones
                                                        </label>
                                                    </li>
                                                    <li style="display: inline-block;width: 20%">
                                                        <label class="checkbox">
                                                            <input   value="1" <?php if($paseos) {echo "checked";} ?>   name="paseos" type="checkbox">
                                                            Paseos
                                                        </label>
                                                    </li>
                                                      <li style="display: inline-block;width: 20%">
                                                        <label class="checkbox">
                                                            <input <?php if($shop) {echo "checked";} ?>   value="1" name="shop" type="checkbox">
                                                            shop
                                                        </label>
                                                    </li>
                                                     <li style="display: inline-block;width: 20%">
                                                        <label class="checkbox">
                                                            <input  <?php if($entretenimiento) {echo "checked";} ?>  value="1" name="entretenimiento" type="checkbox">
                                                            Entretenimiento
                                                        </label>
                                                    </li>
                                        
                                                </ol>
                                            </div>      
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <br>
                        <label  class="control-label" >Básico:</label>
                        <div class="controls">
                            <label  class="radio inline" >Basico:</label>
                            <input type="radio" value="1" name="Basico" <?php echo $this->gf->comparar_general($Basico,'1','checked') ?>>
                            <label  class="radio inline" >Destacado(debe tener toda la info):</label>
                            <input type="radio" value="0" name="Basico" <?php echo $this->gf->comparar_general($Basico,'0','checked') ?>>
                            <label  class="radio inline" >Solo App:</label>
                            <input type="radio" value="2" name="Basico" <?php echo $this->gf->comparar_general($Basico,'2','checked') ?>>
                        </div>
                        <br>
                        <label  class="control-label" >App Tipo:</label>
                        <div class="controls">
                            <select class="span10" name="App_tipo" id="App_tipo">
                                <option value="0" <?php echo $this->gf->comparar_general($App_tipo,'0','selected=selected=selected')?>>No va</option>
                                <option value="1" <?php echo $this->gf->comparar_general($App_tipo,'1','selected=selected=selected')?>>Basico</option>
                                <option value="2" <?php echo $this->gf->comparar_general($App_tipo,'2','selected=selected=selected')?>>Destacado</option>
                                <option value="3" <?php echo $this->gf->comparar_general($App_tipo,'3','selected=selected=selected')?>>Premium</option>
                            </select>
                        </div>
                        <br>
                        <div class="offset8"><button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;<a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/empresas/lists" ?>">Volver</a></div>
                    </div>
                </div>
                <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                <input type="hidden" name="accion" value="<?php echo $accion ?>">
                <input type="hidden" name="ID_Empresa" value="<?php echo $ID_Empresa ?>">
            </form>
        </div>
