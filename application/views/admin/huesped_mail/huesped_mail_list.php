<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h4>Huesped mails</h4>
            <table class="table table-bordered table-condensed table-hover table-striped">
                <tr><th>ID</th><th>Asunto</th><th>Email</th><th>Archivos</th><th>Acción</th></tr>
                <?php foreach ($rows as $var): ?>
                    <tr>
                        <td><?php echo $var['ID_HuespedMail'] ?></td>
                        <td><?php echo $var['AsuntoMail'] ?></td>
                        <td><?php echo $var['DireMail'] ?></td>
                        <td><?php echo $var['ArchivosMail'] ?></td>
                        <td>
                            <a title="reenviar mail" href="<?php echo base_url()."admin/huesped_mail/reenviar_mail/".$var['ID_HuespedMail'] ?>"><i class="icon-share"></i></a>&nbsp;&nbsp;
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
            <input type="hidden" name="accion" value="guardar">
        </div>
        <div class="row-fluid">
            <a href="<?php echo base_url()."admin/huesped/lists" ?>" class="btn btn-primary btn-large"  >Volver</a>
        </div>
