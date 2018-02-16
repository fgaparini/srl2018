<div class="container-fluid">
    
    <div class="row-fluid">
        <form class="form-inline" method="get" id="form_buscar" action="<?php echo base_url() ?>admin/reservas/buscar_disponibilidad_nueva/">
            <div class="row-fluid">
                <div class="span12">
                    <h2>Buscar Alojamiento</h2>
                    <div class="row-fluid">
                        <h4>Fechas</h4>
                        <div class="row-fluid">
                            <div class="span3">
                                <input id="from" name="fecha_desde" type="text" placeholder="Desde" >
                            </div>
                            <div class="span3">
                                <input type="text" id="to" name="fecha_hasta" value="" placeholder="Hasta" />
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="row-fluid">
                            <h4>Cantidad Personas</h4>
                            <div class="row-fluid">
                                <div class="span3">
                                    <select name="PaxMax">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="row-fluid">
                        <div class="span2">
                            <h4>Buscar por</h4>
                        </div>
                        <div class="span6">
                            <select name="campo" id="campo" onchange="mostrar_div()">
                                <option value="lugar" selected="selected">Lugar Alojamiento</option>
                                <option value="nombre">Nombre Alojamiento</option>
                            </select>
                        </div>
                    </div>
                    <div id="nombre_alojamiento" style="display: none" class="row-fluid">
                        <div class="span6 offset2">
                            <h4>Nombre Alojamiento</h4>
                            <div class="row-fluid">
                                <input type="text" name="nombre_alojamiento" id="alojamientos" value="" />
                            </div>
                        </div>
                    </div>
                    <div id="lugar_alojamiento" class="row-fluid">
                        <div class="span9 offset2">
                            <h4>Lugar Alojamiento</h4>
                            <div class="row-fluid">
                                <span class="span3">
                                    <label class="input-large"><h5>Localidad</h5></label>
                                </span>
                            </div>
                            <div class="row-fluid">
                                <input type="hidden" value="AR" name="Pais">
                                <input type="hidden" value="MZA" name="Provincia">
                                <input type="hidden" value="AFA" name="Ciudad">
                                <div class="span3">
                                    <select name="Localidad" >
                                        <option value="null">Seleccione...</option>
                                         <?php foreach ($localidades_array as $var): ?>
                                            <option  value="<?php echo $var['ID_Localidades'] ?>" ><?php echo $var['Localidad'] ?></option>
                                         <?php endforeach ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row-fluid">
                        <div class="offset10">
                            <a class="btn btn-large btn-primary" href="#" onclick="buscar()">Buscar</a> 
                        </div>
                    </div>

                    <input type="hidden" value="<?php echo base_url() ?>" id="base_url">
                </div>
                <br>
                <br>
                <br>
                <br>
            </div>

        </form>

