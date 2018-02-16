
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="san rafael,">
        <meta name="author" content="">
    </head>
    <body>
        <!-- General  -->
        <div style="width:600px; font-family:Tahoma; font-size:12px;color:#000; padding: 8px;border:1px #DBE6C8 solid;">
            <!-- CABECERA -->
            <div style="">
                <p><img src="<?php echo base_url(); ?>logo_nuevo2.png" width="auto" height="80px"  style="vertical-align: middle;float: left" alt=""><div style="margin:10px 0 10px 40px;; font-size: 18px; font-weight: bold; color:#F58405;vertical-align: middle;float:right; width:200px;" ><span style="font-size:14px; color:#666;">Dudas o Consultas </span><br>0800 122 5588</div> <div style="clear: both;"></div></p>
                <h2 >Voucher de Reserva </h2>
                <?php if ($enviar_tipo == 'alojamiento'): ?>
                    <?php $this->load->view('admin/mails/cab_alojar'); ?>
                <?php elseif ($enviar_tipo == 'huesped'): ?>
                    <?php $this->load->view('admin/mails/cab_huesped'); ?>
                <?php else: ?>
                    <?php $this->load->view('admin/mails/cab_srl'); ?>
                <?php endif ?>
            </div>
            <!-- END CABECERA -->
            <!-- DATOS HUESPED Y RESERVA -->
            <?php $this->load->view('admin/mails/data_estadia'); ?>
            <!-- DATOS TARIFAS -->
            <?php $this->load->view('admin/mails/data_habytarifas'); ?>
            <!-- DATOS PAGO -->
            <?php if ($enviar_tipo == 'huesped'): ?>
                <br/> <?php $this->load->view('admin/mails/data_pago'); ?>  
            <?php endif ?>
            <p></p>
            <div style='width:575px; font-family:arial; font-size:12px; color:#666'>
                <p>
                    <span style='font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#009'><strong>Consultas o Sugerencias</strong></span>
                    <br />
                    Para consultas o dudas comuniquese con nosotros a reservas@sanrafaellate.com.ar o a nuestros teléfonos 0260 4540127 / 154575559 / 154004243 .
                </p>

            </div>
            <div style='width:100%;'>
                <hr></hr>
                <p></p>
                <table width="100%">
                    <tr>
                        <td> 
                            <b>

                                <img src='<?php echo base_url() ?>logo_nuevo2.png' width='auto' height='75' />
                            </b>
                            <p>
                    <spam style=' font-size: 10px; font: Arial; color:#666 '>
                        <b>Turismo En San Rafael </b>
                    </spam>
                    </p>
                    <p>Depto de Reservas Online</p>
                    </td>
                    <td style="padding: 10px;"> 
                        <p>
                    <spam style=' font-size: 10px; font: Arial;  '><br />
                        <strong>Producto de DESTINOS INTERACTIVOS</strong><br />
                        <b>Telefax</b>: 0260 - 4540127 (de 9 a 20 hs lunes a viernes)<br />
                        <b>Celulares:</b>0260 - 154595557( de 9 a 20 hs ).<br />
                        <strong>Oficinas Centrales  :</strong> Coronel Plaza 390<br />
                        <b>San Rafael &bull; Mendoza &bull; Argentina</b></spam>
                    <br />
                    <a href='http://www.sanrafaellate.com.ar'>www.sanrafaellate.com.ar</a><br />
                    <a href='http://www.destinosinteractivos.com'>www.destinosinteractivos.com</a><br />
                    </p>
                    </td>
                    </tr>
                </table>
            </div>
            <!-- PARA ELIMINAR FOOTER -->
        </div>
        <!-- END general -->
        <br/>
        <br/>
        <br/>

    </body>
</html>