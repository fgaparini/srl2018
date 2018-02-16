
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>user/alojamientos_user/save/">
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
                        <label class="control-label" >Responsable:</label>
                        <div class="controls">
                            <input type="text" name="Responsable" value="<?php echo $Responsable ?>">
                        </div>
                        <br>
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
                        <!-------------------------------------------------- ################## Metodos de Pago ############################################ ----->
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
                    </div>
                    <div class="clear"></div>
                    <div class="offset6">
                        <button class="btn btn-large btn-primary" type="submit" class="btn">Guardar</button>
                        <a class="btn btn-large btn-primary"  href="<?php echo base_url() . "user/alojamientos_user/" ?>">Volver</a>
                    </div>
                </div>
                <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                <input type="hidden" name="accion" value="<?php echo $accion ?>">
                <input type="hidden" name="ID_Alojamiento" value="<?php echo $ID_Alojamiento ?>">
                <input type="hidden" name="ID_MP" value="<?php echo $ID_MP ?>">
                <input type="hidden" name="ID_InformacionGeneral" value="<?php echo $ID_InformacionGeneral ?>">
            </form>
        </div>
