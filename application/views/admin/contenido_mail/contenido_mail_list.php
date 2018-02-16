
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h4>Listado mails</h4>
            <hr>
            <a href="<?php echo base_url() . 'admin/contenido_mail/form' ?>" class="btn btn-primary">Crear mail</a>
            <br>
            <br>
            <table class="table">
                <tr><th>ID</th><th>Nombre</th><th>Asunto</th><th>Acción</th></tr>
                <?php foreach ($list_array as $var): ?>
                    <tr>
                        <td><?php echo $var['ID_ContenidoMail'] ?></td>
                        <td><?php echo $var['NombreMail'] ?></td>
                        <td><?php echo $var['AsuntoMail'] ?></td>
                        <td>
                            <a href="<?php echo base_url() . "admin/contenido_mail/form/" . $var['ID_ContenidoMail'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                            <a href="<?php echo base_url()."admin/contenido_mail/delete/". $var['ID_ContenidoMail'] ?>" ><i class="icon-remove"></i></a>&nbsp;&nbsp;
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
        </div>
