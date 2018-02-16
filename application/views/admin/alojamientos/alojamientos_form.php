<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/alojamientos/save/">
                <div class="span6">
                    <h4>Información General</h4>
                    <hr>
                    <div class="control-group">
                        <label class="control-label" >Nombre:</label>
                        <div class="controls">
                            <input type="text" name="Nombre" value="<?php echo $Nombre ?>">
                        </div>
                        <br>
                        <label class="control-label" >Tipo Alojamiento:</label>
                        <div class="controls">
                            <select name="ID_TipoAlojamiento">
                                <?php foreach ($tipoalojamientos_array as $var): ?>
                                    <option value="<?php echo $var['ID_TipoAlojamiento'] ?>" <?php echo $this->gf->comparar_general($var['ID_TipoAlojamiento'], $ID_TipoAlojamiento, "selected='selected'") ?> ><?php echo $var['TipoAlojamiento'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Subtipo Alojamiento:</label>
                        <div class="controls">
                            <select name="ID_TipoAlojamientoSub">
                                <?php foreach ($tipoalojamientos_array as $var): ?>
                                    <option value="<?php echo $var['ID_TipoAlojamiento'] ?>" <?php echo $this->gf->comparar_general($var['ID_TipoAlojamiento'], $ID_TipoAlojamientoSub, "selected='selected'") ?> ><?php echo $var['TipoAlojamiento'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Categoría:</label>
                        <div class="controls">
                            <select name="ID_Categorias">
                                <?php foreach ($categorias_array as $var): ?>
                                    <option value="<?php echo $var['ID_Categorias'] ?>" <?php echo $this->gf->comparar_general($var['ID_Categorias'], $ID_Categorias, "selected='selected'") ?> ><?php echo $var['Categoria'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Dirección:</label>
                        <div class="controls">
                            <input type="text" name="Direccion" value="<?php echo $Direccion ?>">
                        </div>
                        <br>
                        <label class="control-label">Teléfono:</label>
                        <div class="controls">
                            <input type="text" name="Telefono" value="<?php echo $Telefono ?>">
                        </div>
                        <br>
                        <label class="control-label" >Email:</label>
                        <div class="controls">
                            <input type="text" name="Email" value="<?php echo $Email ?>">
                        </div>
                        <br>
                        <label class="control-label" >Website:</label>
                        <div class="controls">
                            <input type="text" name="WebSite" value="<?php echo $WebSite ?>">
                        </div>
                        <br>
                        <label class="control-label" >Facebook:</label>
                        <div class="controls">
                            <input type="text" name="Facebook" value="<?php echo $Facebook ?>">
                        </div>
                        <br>
                        <label class="control-label" >Twitter:</label>
                        <div class="controls">
                            <input type="text" name="Twitter" value="<?php echo $Twitter ?>">
                        </div>
                        <br>
                        <label class="control-label" >Pinterest:</label>
                        <div class="controls">
                            <input type="text" name="Pinterest" value="<?php echo $Pinterest ?>">
                        </div>
                        <br>
                        <label class="control-label" >Gplus:</label>
                        <div class="controls">
                            <input type="text" name="Gplus" value="<?php echo $Gplus ?>">
                        </div>
                        <br>
                        <label class="control-label" >Responsable:</label>
                        <div class="controls">
                            <input type="text" name="Responsable" value="<?php echo $Responsable ?>">
                        </div>
                        <br>
                        <label class="control-label" >Tipo acuerdo:</label>
                        <div class="controls">
                            <select name="TipoAcuerdo">
                                <option <?php echo $this->gf->comparar_general('P', $TipoAcuerdo, 'selected') ?> value="P">Publicidad</option>
                                <option <?php echo $this->gf->comparar_general('C', $TipoAcuerdo, 'selected') ?>  value="C">Comisión</option>
                                <option <?php echo $this->gf->comparar_general('A', $TipoAcuerdo, 'selected') ?>  value="A">Ambas</option>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Coordenadas:</label>
                        <div class="controls">
                            <input type="text" name="Coordenadas" value="<?php echo $Coordenadas ?>">
                        </div>
                        <br>
                        <label class="control-label" >País:</label>
                        <div class="controls">
                            <select name="Pais" id="pais">
                                <option value="AR" selected>Argentina<option>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Provincia:</label>
                        <div class="controls">
                            <select selected name="Provincia" id="provincia">
                                <option value="MZA" selected>Mendoza<option>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Ciudad:</label>
                        <div class="controls">   
                            <select selected name="Ciudad" id="ciudad" onchange="llenar('localidad')">

                                <?php foreach ($ciudades_array as $var): ?>
                                           <option value="<?php echo $var['Location'] ?>" <?php echo  $this->gf->comparar_general($var['Location'], $Ciudad, "selected='selected'")   ?>><?php echo $var['Name'] ?><option> 
                                <?php endforeach ?>
                        

                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Localidad:</label>
                        <div class="controls">
                            <select name="Localidad" id="localidad">
                                <?php foreach ($localidades_array as $var): ?>
                                <option <?php echo  $this->gf->comparar_general($var['ID_Localidades'], $Localidad, "selected='selected'")   ?> value="<?php echo $var['ID_Localidades']   ?>"><?php echo $var['Localidad']   ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <br>
                        <!-- 
                        <label class="control-label" >País:</label>
                        <div class="controls">
                            <select name="Pais" id="pais" onchange="llenar('provincia')">
                                <option value="AR" selected>Argentina<option>
                        <?php //foreach ($paises_array as $var): ?>
                                    <option <?php //echo $this->gf->comparar_general($var['CountryCode'], $Pais, 'selected="selected"')   ?> value="<?php //echo $var['CountryCode']   ?>"><?php //echo $var['CountryName']   ?></option>
                        <?php // endforeach ?>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Provincia:</label>
                        <div class="controls">
                            <select selected name="Provincia" id="provincia" onchange="llenar('ciudad')">
                                <option value="MZA" selected>Mendoza<option>
                        <?php //if ($accion == 'editar'): ?>
                        <?php //foreach ($provincias_array as $var): ?>
                                        <option <?php //echo $this->gf->comparar_general($var['SUCode'], $Provincia, "selected='selected'")   ?> value="<?php //echo $var['SUCode']   ?>"><?php //echo $var['SUName']   ?></option>
                        <?php //endforeach; ?>
                        <?php //else: ?>
                                    <option selected="selected" value="MZA">Mendoza</option>
                        <?php //endif ?>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Ciudad:</label>
                        <div class="controls">
                            <select selected name="Ciudad" id="ciudad" onchange="llenar('localidad')">
                                <option value="AFA" selected>San Rafael<option>
                        <?php //if ($accion == 'editar'): ?>
                        <?php //foreach ($ciudades_array as $var): ?>
                                        <option <?php //echo $this->gf->comparar_general($var['Location'], $Ciudad, "selected='selected'")   ?> value="<?php echo $var['Location'] ?>"><?php echo $var['Name'] ?></option>
                        <?php //endforeach; ?>
                        <?php //else: ?>
                                    <option selected="selected" value="AFA">San Rafael</option>
                        <?php //endif ?>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Localidad:</label>
                        <div class="controls">
                            <select name="Localidad" id="localidad">
                        <?php //if ($accion == 'editar'): ?>
                        <?php //foreach ($localidades_array as $var): ?>
                                        <option <?php //echo $this->gf->comparar_general($var['ID_Localidades'], $Localidad, "selected='selected'")   ?> value="<?php //echo $var['ID_Localidades']   ?>"><?php //echo $var['Localidad']   ?></option>
                        <?php //endforeach; ?>
                        <?php //else: ?>
                                    <option selected="selected" value="1" >Valle Grande</option>
                        <?php //endif ?>

                            </select>
                        </div>
                        <br>
                        -->
                        <label class="control-label" >Restaurant:</label>
                        <div class="controls">
                            <select name="Restaurant">
                                <option <?php echo $this->gf->comparar_general($Restaurant, 'si', 'selected="selected"') ?> value="si" >Si</option>
                                <option <?php echo $this->gf->comparar_general($Restaurant, 'no', 'selected="selected"') ?>  value="no" >No</option>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Información Restaurant:</label>
                        <div class="controls">
                            <textarea rows="3" name="InformacionRestaurant"><?php echo $InformacionRestaurant ?></textarea>
                        </div>
                        <br>
                        <label class="control-label" >Checkin:</label>
                        <div class="controls">
                            <input type="text" name="Checkin" value="<?php echo $Checkin ?>">
                        </div>
                        <br>
                        <label class="control-label" >Checkout:</label>
                        <div class="controls">
                            <input type="text" name="Checkout" value="<?php echo $Checkout ?>">
                        </div>
                        <br>
                        <label class="control-label" >Politica de Cancelación:</label>
                        <div class="controls">
                            <textarea rows="3" name="PoliticaCancelacion"><?php echo $PoliticaCancelacion ?></textarea>
                        </div>
                        <br>
                        <label class="control-label" >Días Política:</label>
                        <div class="controls">
                            <textarea rows="3" name="DiasPolitica"><?php echo $DiasPolitica ?></textarea>
                        </div>

                    </div>
                </div>
                <div class="span6">
                    <div class="row-fluid">
                        <label>Descripción:</label>
                    </div>
                    <div class="row-fluid">
                        <textarea class="ckeditor" rows="10" name="Descripcion"><?php echo $Descripcion ?></textarea>
                    </div>
                    <div class="control-group">
                        <!--################## Metodos de Pago ############################################ -->
                        <h4>Métodos de Pago</h4>
                        <hr>
                        <br>
                        <label class="control-label" >Acepta Seña:</label>
                        <div class="controls">
                            <input type="checkbox" name="AceptaSenia" value="1" <?php echo $this->gf->comparar_general($AceptaSenia, '1', 'checked="checked"') ?>>
                        </div>
                        <br>
                        <label class="control-label" >Seña:</label>
                        <div class="controls">
                            <input type="text" name="Senia" id="senia" value="<?php echo $Senia ?>">
                        </div>
                        <br>
                        <label class="control-label" >Comisión/Seña:</label>
                        <div class="controls">
                            <input type="checkbox" id="comision_senia"  name="ComisionSenia" value="1" <?php echo $this->gf->comparar_general($ComisionSenia, '1', 'checked="checked"') ?>>
                        </div>
                        <br>
                        <label class="control-label" >Comisión:</label>
                        <div class="controls">
                            <input type="text" id="comision" name="Comision" value="<?php echo $Comision ?>">
                        </div>
                        <br>
                        <label class="control-label">Anticipado:</label>
                        <div class="controls">
                            <input type="checkbox" name="Anticipado" value="1" <?php echo $this->gf->comparar_general($Anticipado, '1', 'checked="checked"') ?>> 
                        </div>
                        <br>
                        <!-- ################## Configuraciones ############################################ -->
                        <h4>Configuraciones</h4>
                        <hr>
                        <br>
                        <label class="control-label">ID Booking:</label>
                        <div class="controls">
                           
                            <input type="text" value="<?php echo $ID_Bookingcom ?>" name="ID_Bookingcom" >
                        </div>
                        <br>
                        <label class="control-label">Url Booking:</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $UrlBooking ?>" name="UrlBooking" >
                        </div>
                        <br>
                          <label class="control-label">Image Booking:</label>
                        <div class="controls">
                           
                            <input type="text" value="<?php echo $UrlImage_Booking ?>" name="UrlImage_Booking" >
                        </div>
                        <br>
                        <label class="control-label">URL:</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $Url ?>" name="Url" >
                        </div>
                        <br>
                        <label class="control-label">Desta Orden:</label>
                        <div class="controls">
                            <select name="DestaOrden">
                                <option value="0" <?php echo $this->gf->comparar_general('0', $DestaOrden, 'selected="selected"') ?>>No Destacado</option>
                                <option value="1" <?php echo $this->gf->comparar_general('1', $DestaOrden, 'selected="selected"') ?>>1</option>
                                <option value="2" <?php echo $this->gf->comparar_general('2', $DestaOrden, 'selected="selected"') ?>>2</option>
                                <option value="3" <?php echo $this->gf->comparar_general('3', $DestaOrden, 'selected="selected"') ?>>3</option>
                                <option value="4" <?php echo $this->gf->comparar_general('4', $DestaOrden, 'selected="selected"') ?>>4</option>
                            </select>
                        </div>
                        <br>
                        <label class="control-label">Básico:</label>
                        <div class="controls">
                            <select name="Basico">
                                <option value="destacado" <?php echo $this->gf->comparar_general("destacado", $Basico, 'selected="selected"') ?>>Destacado</option>
                                <option value="booking" <?php echo $this->gf->comparar_general("booking", $Basico, 'selected="selected"') ?>>Booking</option>
                                <option value="basico" <?php echo $this->gf->comparar_general("basico", $Basico, 'selected="selected"') ?>>Basico</option>
                            </select>
                        </div>
                        <br>
                        <label class="control-label">Desta Home:</label>
                        <div class="controls">
                            <input type="checkbox" name="DestaHome" value="1" <?php echo $this->gf->comparar_general($DestaHome, '1', 'checked="checked"') ?>> 
                        </div>
                        <br>
                        <label class="control-label">App:</label>
                        <div class="controls">
                            <select name="App_tipo">
                                <option value="0" <?php echo $this->gf->comparar_general(0, $App_tipo, 'selected="selected"') ?>>No Va</option>
                                <option value="1" <?php echo $this->gf->comparar_general(1, $App_tipo, 'selected="selected"') ?>>Basico</option>
                                <option value="2" <?php echo $this->gf->comparar_general(2, $App_tipo, 'selected="selected"') ?>>Destacado</option>
                                <option value="3" <?php echo $this->gf->comparar_general(3, $App_tipo, 'selected="selected"') ?>>Premium</option>
                            </select>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="offset6"><button class="btn btn-large btn-primary" type="submit" class="btn">Guardar</button></div>
                </div>
                <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                <input type="hidden" name="accion" value="<?php echo $accion ?>">
                <input type="hidden" name="ID_Alojamiento" value="<?php echo $ID_Alojamiento ?>">
                <input type="hidden" name="ID_MP" value="<?php echo $ID_MP ?>">
                <input type="hidden" name="ID_InformacionGeneral" value="<?php echo $ID_InformacionGeneral ?>">
                <input type="hidden" name="Activo" value="<?php echo $Activo ?>">
            </form>
        </div>
