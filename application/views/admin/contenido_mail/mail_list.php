<div class="container-fluid">
    <div class="row-fluid">
        <h4><?php echo $title ?></h4>
        <br>
        <form  method="get" action="<?php echo base_url() . "admin/contenido_mail/mail_list/" ?>"> 
            <div class="row-fluid">
                <div class="span2">
                    <label>Tipo alojamiento</label>
                    <select name="ID_TipoAlojamiento">
                        <option <?php echo $this->gf->comparar_general('0', $ID_TipoAlojamiento, 'selected') ?> value="0">Todos</option>
                        <?php foreach ($tipo_alojamientos as $var): ?>
                            <option <?php echo $this->gf->comparar_general($var['ID_TipoAlojamiento'], $ID_TipoAlojamiento, 'selected') ?> value="<?php echo $var['ID_TipoAlojamiento'] ?>"><?php echo $var['TituloAlojamiento'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="span2">
                    <label>Tipo acuerdo</label>
                    <select name="TipoAcuerdo">
                        <option <?php echo $this->gf->comparar_general('0', $TipoAcuerdo, 'selected') ?> value="0">Todos</option>
                        <option <?php echo $this->gf->comparar_general('C', $TipoAcuerdo, 'selected') ?> value="C">Comisión</option>
                        <option <?php echo $this->gf->comparar_general('P', $TipoAcuerdo, 'selected') ?> value="P">Publicidad</option>
                    </select>
                </div>
            </div>
            <div class="row-fluid">
                <input type="submit" class="btn btn-primary" value="Filtrar">
            </div>

        </form>
        <table class="table table-bordered table-condensed table-hover table-striped">
            <tr>
                <th>Nombre</th>
                <th><input type="checkbox" id="head_check" onclick="select_todos()" />&nbsp;&nbsp; Seleccionar</th>
            </tr>
            <?php $count = 0; ?>
            <?php foreach ($alojamientos as $var): ?>
                <?php $count++ ?>
                <tr>
                    <td><?php echo $var['Nombre'] ?></td>
                    <td><input value="<?php echo $var['ID_Alojamiento'] ?>" id="<?php echo $count ?>" class="input_check" type="checkbox"></td>
                </tr>
            <?php endforeach; ?>
            <input type="hidden" id="base_url" value="<?php echo base_url() ?>" />
            <input type="hidden" id="total_count" value="<?php echo $count ?>">
        </table> 
        <form id="mail_list" method="post" action="<?php echo base_url()."admin/contenido_mail/mail_content"?>">
            <div class="row-fluid">
                <div class="span2">
                    <label>Tipo mail</label>
                    <select name="ID_ContenidoMail">
                        <?php foreach ($tipos_mails as $var): ?>
                            <option value="<?php echo $var['ID_ContenidoMail'] ?>"><?php echo $var['NombreMail'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
               
                <div class="span2">
                    <label>&nbsp;</label>
                    <a class="btn btn-primary" onclick="enviar()">Enviar</a>
                </div>
            </div>
            <input name="comas_input" type="hidden" value="" id="comas_input">
        </form>

