<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <!---------------------------FORMULARIOS--------------------------------------->
            <!---------------------------TITULO-------------------------------------------->
            <div class="page-header">
                <h1><?php echo "$title" ?></h1>
            </div>
            <!---------------------------CONTENIDO----------------------------------------->
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/videos/save/">
                <div class="control-group">
                    <label class="control-label" >Nombre:</label>
                    <div class="controls">
                        <input type="text" name="NombreVideo" value="<?php echo $NombreVideo ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" >Descripción:</label>
                    <div class="controls">
                        <textarea name="DesVideo"><?php echo $DesVideo ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" >Url:</label>
                    <div class="controls">
                        <input type="text" name="UrlVideo" value="<?php echo $UrlVideo ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" >Thumb Video:</label>
                    <div class="controls">
                        <input type="text" name="thumbVideo" value="<?php echo $thumbVideo ?>">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;
                        <a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/videos/lists" ?>">Volver</a>
                    </div>
                </div>

                <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                <input type="hidden" name="accion" value="<?php echo $accion ?>">
                <input type="hidden" name="ID_Video" value="<?php echo $ID_Video ?>">
            </form>