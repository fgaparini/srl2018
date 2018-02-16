<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/contenido_mail/save/">
                <div class="span12">
                    <h4>Crear mail</h4>
                    <hr>
                    <div class="control-group">
                        <label class="control-label" >Nombre:</label>
                        <div class="controls">
                            <input type="text" name="NombreMail" value="<?php echo $NombreMail ?>">
                        </div>
                        <br>
                        <label class="control-label" >Asunto:</label>
                        <div class="controls">
                            <input type="text" class="input-xxlarge" name="AsuntoMail" value="<?php echo $AsuntoMail ?>">
                        </div>
                        <br>
                         <label class="control-label" >Contenido:</label>
                        <div class="controls">
                            <textarea  class="ckeditor"  name="DetalleMail"><?php echo $DetalleMail ?></textarea>
                        </div>
                        <br>
                        <div class="offset2"><button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;<a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/contenido_mail/lists" ?>">Volver</a></div>
                    </div>
                </div>
                <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                <input type="hidden" name="accion" value="<?php echo $accion ?>">
                <input type="hidden" name="ID_ContenidoMail" value="<?php echo $ID_ContenidoMail ?>">
            </form>
        </div>
