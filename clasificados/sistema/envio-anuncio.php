<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="../clasificados.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <p>
   <?php
    $titulo = $_POST['titulo'];
	$categoria = $_POST['categoria'];
    $rubro = $_POST['rubro'];
    $email = $_POST['email'];
	$email2 = $_POST['email2'];
    $anuncio = $_POST['anuncio'];
	$nombre = $_POST['nombre'];
	if (isset ($_POST['precio']) ) {
	$precio = "Precio :$_POST['precio']";}
	$link = "http://www.sanrafaellate.com.ar";
	$asunto = $_POST['asunto'];
	$mailsrl = "clasificados@sanrafaellate.com.ar";
	?><?php
	 $message = '
	  
<div style="font-size:18px" align="center">  <b> SRL CLASIFICADOS<b></div><br />	  <br />
<b align="center">Anuncio Clasificados  de San Rafael Mendoza<b><br />

<b>Datos del Anuncio:</b> <br />

      <b>Titulo:</b> $titulo <br />
	  
	  <b>Categoria:</b> $categoria <br />
	  
	  <b>Rubro:</b> $rubro <br />
	  
	  <b>Anuncio:</b> <br /> $anuncio <br />
         <b>$precio</b>
	   
      	  <b>E-Mail Remitente:</b> $email2 <br />
	  <b>NombreRemitente :</b> $nombre <br />
<br /><br />
      SRL CLASIFICADOS || Portal de Clasificados de San rafael ||<br /> Power By San Rafael Late www.sanrafeallate.com.ar
	  Automotores :: Inmubles :: Empleos :: Educacionales :: Legales :: Profesionales <br /> Articulos Varios :: Serivios
	   :: www.srlclasificados.com.ar :: clasificados.sanrafaellate.com.ar ::

  ';
         require "../includes/class.phpmailer.php";
  $mail = new PHPMailer();
  $mail->SetLanguage("es","../includes/language/");
 
$mail->IsSMTP();      
$mail->Host = "mail.sanrafaellate.com.ar:25";
$mail->PluginDir = "../includes/";
$mail->IsHTML(true); 
$mail->FromName = $nombre;
$mail->From = $email2;
$mail->AddReplyTo ($email2);
$mail->Subject = $asunto;
$mail->AddAddress($email);
$mail->AddBCC("$mailsrl");



//si tu servidor requiere autenticacion, tambien lo siguiente:
$mail->SMTPAuth = true;
$mail->Username = "sanrafae";
$mail->Password = "frangas.333";  
$mail->Encoding = "quoted-printable";

$mail->Body = $message; 

$error = "El siguiente email $email es incorrecto, por favor vuelva a intentar";
$result = $mail->Send();
if (! $result) 
   print $error;  

    ?>
</p>
 <table width="350" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <td colspan="2" class="texto_negro"><p>Se ha enviado el mail Correctamente al email del destinatario <?php echo $email ; ?> .<br/>
     Si quiere seguir navegando en la <span class="textoguias">WEB SRL CLASIFICADOS</span> cierre esta ventana 
     .</p></td>
   </tr>
   <tr>
     <td height="31" class="texto_negro">&nbsp;</td>
     <td class="texto_negro"><div align="right">Esperamos serle Util </div></td>
   </tr>
   <tr>
     <td height="48" class="texto_negro">&nbsp;</td>
     <td class="texto_negro"><div align="right"><strong>SRL CLASIFICADOS <br/>
     www.srlclasificados.com.ar </strong></div></td>
   </tr>
 </table>
 <p>&nbsp; </p>
</body>
</html>
