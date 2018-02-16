<div class="container-fluid">
    <div class="row-fluid">
        <form method="post" action="<?php echo base_url() ?>admin/huesped/mail_huesped_save/">
            <div class="row-fluid">
                <div class="span2">
                    <table class="table table-bordered table-condensed table-hover table-striped">
                        <?php $count = 0; ?>
                        <?php foreach ($folders as $var): ?>
                            <tr><td colspan="2"><a href="#" onclick="folder_change('<?php echo $var ?>')"><?php echo strtoupper($var) ?></a></td></tr>
                            <?php $folder_files = get_filenames($pdf_path . $var . "/"); ?>
                            <?php foreach ($folder_files as $var2): ?>
                                <?php $count++ ?>
                                <tr class="<?php echo $var ?> tr_todos">
                                    <td><input type="checkbox" value="<?php echo $var . "/" . $var2 ?>" name="alo_<?php echo $count ?>"></td>
                                    <td><?php echo $var2 ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </table>
                    <?php if ($FechaDesde != "" && $FechaHasta != "") : ?>
                        <div class="control-group">
                            <label>Fechas Consultadas:</label>
                            <div class="controls">
                                Desde:&nbsp; <?php echo $this->gf->html_mysql($FechaHasta) ?>
                                <br>
                                Hasta:&nbsp; <?php echo $this->gf->html_mysql($FechaDesde) ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="control-group">
                        <label>Observaciones:</label>
                        <div class="controls">
                            <?php echo $NotasHuesped ?>
                        </div>
                    </div>
                </div>
                <div class="span10">
                    <div class="row-fluid">
                        <div class="control-group">
                            <label>Asunto:</label>
                            <div class="controls">
                                <input class="span12" name="mail_asunto" value="" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="controls">
                        <textarea class="ckeditor" name="mail_html" ><?php echo $mail_html ?></textarea>
                    </div>
                    <br>
                    <div class="row-fluid">
                        <div class="control-group">
                            <div class="controls">
                                <button class="btn btn-large btn-primary" type="submit" >Enviar</button>&nbsp;&nbsp;
                                <a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/huesped/lists" ?>">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="<?php echo $count ?>" name="alo_total">
            <input type="hidden" value="<?php echo $ID_Huesped ?>" name="ID_Huesped" >
        </form>

