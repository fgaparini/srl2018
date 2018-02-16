<?php require_once('../Connections/clasificados.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$colname_Recordset4 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset4 = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset4 = sprintf("SELECT * FROM usuarios WHERE usuario = '%s'", $colname_Recordset4);
$Recordset4 = mysql_query($query_Recordset4, $clasificados) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);
?><?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['contrasena'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "sistema/index.php";
  $MM_redirectLoginFailed = "registro.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_clasificados, $clasificados);
  
  $LoginRS__query=sprintf("SELECT usuario, contrasena FROM usuarios WHERE usuario='%s' AND contrasena='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $clasificados) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<link href="clasificados.css" rel="stylesheet" type="text/css" /><style type="text/css">
<!--
body {
	margin-left: 5px;
	margin-top: 0px;
	margin-right: 0px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.Estilo4 {color: #FFFFFF; font-size: 14; }
.Estilo6 {font-size: 16px}
.Estilo1 {color: #FFFFFF}
.style1 {font-size: 14px}
-->
</style></head>

<body>
<table width="859" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="100" valign="middle">
          <div><a href="http://srlclasificados.com.ar"><img src="imagenes/cabecera2.jpg" alt="SRL CLASIFICADOS :: Clasificados en San Rafael :: " width="350" height="78" border="0" align="middle" /><br />
          </a>
            <div>
              <div align="center"><a href="http://srlclasificados.com.ar"><span class="texto_negro"><strong>www.</strong></span><span class="titulo_anuncios style1"><strong>srl</strong></span><span class="texto_negro"><strong>clasificados.com.ar</strong></span></a></div>
            </div>
            <a href="http://srlclasificados.com.ar">            </a>
        </div></td>
        <td><div align="center">
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="400" height="80" title="San Rafael Hoteles">
            <param name="movie" value="publicidad/home-top.swf" />
            <param name="quality" value="high" />
            <embed src="publicidad/home-top.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="400" height="80"></embed>
          </object>
        </div></td>
      </tr>
    </table>      
    <a href="http://clasificados.sanrafaellate.com.ar"></a></td>
  </tr>
  <tr>
    <td bgcolor="#F90000"><table width="86%" height="15" border="0" cellpadding="0" cellspacing="0" class="menu_superior">
      <tr>
        <td width="15%"><div align="center"> <a href="http://clasificados.sanrafaellate.com.ar">Inicio</a> </div></td>
        <td width="28%"><div align="center"><a href="registro.php">Registrate GRATIS!!</a> </div></td>
        <td width="26%"><div align="center"><?php 	if (isset( $_SESSION['MM_Username'])) { ?><a href="../clasificados/sistema/">Mi Cuenta</a>  <?php } else { ?><a href="../clasificados/publique_anuncio.php">Publique Anuncio</a><?php } ?></div></td>
        <td width="16%"><div align="center"><a href="../clasificados/ayuda.php"></a><a href="publicidad.php">Publicidad</a></div></td>
        <td width="15%"><div align="center"><a href="ayuda.php">Ayuda</a></div></td>
      </tr>
    </table></td>
    <td height="24" bgcolor="#F90000" class="fecha"><div align="center" class="titulos_fecha">
               <font color="#FFFFFF">
        <script>
	var mydate=new Date();
	var year=mydate.getYear();
	if (year < 1000)
		year+=1900;
	var day=mydate.getDay();
	var month=mydate.getMonth();
	var daym=mydate.getDate();
	if (daym<10)
		daym="0"+daym;

	var dayarray=new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S&aacute;bado");
	var montharray=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	document.write("<small><font color='000000' face='Arial'><b>"+ dayarray[day] + " " + daym + " de " + montharray[month] + " de " + year + "</b></font></small>");

          </script></font>
       San Rafael Mendoza 
    </div></td>
  </tr>
  <tr bgcolor="#EC7058">
    <td width="549" height="3" bgcolor="#666666"></td>
    <td width="310" height="3" bgcolor="#666666"></td>
  </tr>
  <tr>
    <td valign="top"><table width="550" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="285" height="129" valign="top" class="contenedor_bordes"><div class="contenedor_opciones" >
          <div ><a href="propiedades_san_rafael/inmuebles_san_rafael.php"><img src="imagenes/inmuebles.jpg" alt="Inmuebles" border="0" height="29" width="142" /></a></div>
                   <div class="texto_opciones" align="left"><a href="propiedades_san_rafael/inmuebles_san_rafael.php">Encontr&aacute; la casa <br />
            o la propiedad <br />
            que deseas y busc&aacute;s.</a></div>
        </div>
          <div class="imagenes"><img src="imagenes/fd_inmuebles.gif" alt="Inmubeles y propiedades en san rafael" width="110" height="108" /></div></td>
        <td width="285" height="129" valign="top" class="contenedor_bordes"><div class="contenedor_opciones">
          <div><a href="autos_san_rafael/autos_san_rafael.php"><img src="imagenes/autos.jpg" alt="Autos en San Rafael Mendoza" border="0" height="30" width="150" /></a></div>
          <div class="texto_opciones">
            <span><strong><span><strong><span><strong><span><strong><span><strong><strong><strong><strong><strong><img src="imagenes/fd_autos.gif" alt="Autos en san rafael" width="131" height="53" align="right" /></strong></strong></strong></strong></strong></span></strong></span></strong></span></strong></span><a href="autos_san_rafael/autos_san_rafael.php">Autos nuevos, </a></strong><a href="autos_san_rafael/autos_san_rafael.php"><strong>usados</strong>,
              motos, kombis,encontra toda la oferta de automotores de san rafael... </a></span>          </div>
        </div></td>
      </tr>
      <tr>
        <td width="285" height="113" valign="top" class="contenedor_bordes"><div class="contenedor_opciones" >
          <div ><a href="empleos/empleos.php"><img src="imagenes/empleos2.jpg" alt="Inmuebles" border="0" height="30" width="150" /></a></div>
         
          <div class="texto_opciones" align="left"><a href="empleos/empleos.php">Toda la oferta laboral<br />
            del Sur de Mendoza.<br />
            Est&aacute;s a un click de<br />
            conseguir tu <br />
            <strong>pr&oacute;ximo trabajo.</strong></a><strong></strong> </div>
        </div>
          <div class="imagenes">
            <p><img src="imagenes/fd_empleos.gif" alt="Inmubeles y propiedades en san rafael" width="100" height="96" /></p>
          </div></td>
        <td width="285" height="113" valign="top" class="contenedor_bordes"><div class="contenedor_opciones">
          <div><a href="profesionales/profesionales.php"><img src="imagenes/profesionales2.jpg" alt="" name="ARTICULOS" width="238" height="30" border="0" id="ARTICULOS" style="background-color: #0033CC" /></a><span><span><strong><span><strong><strong><strong><strong><strong><img src="imagenes/profe.jpg" alt="Autos en san rafael" width="90" height="84" hspace="2" align="right" class="texto_opciones" /></strong></strong></strong></strong></strong></span></strong></span></span></div>
          <div class="texto_opciones"> 
            <div align="left"><span><a href="profesionales/profesionales.php">Encontra al profesional que buscas, medicos, abogados, ingenieros, etc </a></span> </div>
          </div>
        </div></td>
      </tr>
      <tr>
        <td width="285" height="113" valign="top" class="contenedor_bordes"><div class="contenedor_opciones" >
          <div ><a href="legales/legales.php"><img src="imagenes/legales.jpg" alt="Inmuebles" border="0" height="29" width="142" /></a></div>
          <div class="texto_opciones" align="left">
            <a href="legales/legales.php">Judiciales, reditos, <br /> 
              remates, citaciones,<br />  
              mensuras </a>
            </div>
        </div>
          <div class="imagenes">
            <p><img src="imagenes/judiciales.logo.jpg" alt="Inmubeles y propiedades en san rafael" width="104" height="89" /></p>
          </div></td>
        <td width="285" height="113" valign="top" class="contenedor_bordes"><div class="contenedor_opciones">
          <div><a href="educacionales/educacionales.php"><img src="imagenes/educacionales2.jpg" alt="Autos en San Rafael Mendoza" border="0" height="30" width="200" /></a><span class="texto_opciones"><span><strong><span><strong><strong><strong><strong><strong><img src="imagenes/educaionales.jpg" alt="Autos en san rafael" width="66" height="61" align="right" /></strong></strong></strong></strong></strong></span></strong></span></span></div>
          <div class="texto_opciones"> <span><a href="educacionales/educacionales.php">Comunicados, cursos, nivel EGB1, EGB2, EGB3, univercitario .... </a></span></div>
        </div></td>
      </tr>
      <tr>
        <td width="285" height="113" valign="top" class="contenedor_bordes"><div class="contenedor_opciones" width="143px">
            <div ><a href="articulos/articulos.php"><img src="imagenes/articulos-tex.jpg" alt="" name="ARTICULOS" width="150" height="30" border="0" id="ARTICULOS" style="background-color: #0033CC" /></a></div>
          <div class="texto_opciones" align="left" > 	<a href="articulos/articulos.php">Compra, venta,animales<br />
            audio, video, 
            muebles, <br />
            informática, etc. </a></div>
        </div>
            <div class="imagenes" width="70px">
          <img src="imagenes/productos.logo.jpg" alt="Inmubeles y propiedades en san rafael" width="104" height="93" />            </div></td>
        <td width="285" height="113" valign="top" class="contenedor_bordes"><div class="contenedor_opciones" width="143px">
            <div ><a href="articulos/articulos.php"><img src="imagenes/servicios-tex.jpg" alt="" name="ARTICULOS" width="150" height="30" border="0" id="ARTICULOS" style="background-color: #0033CC" /></a></div>
          <div class="texto_opciones" align="left" > <a href="articulos/articulos.php">Necesitas un servicio <br/>este es el lugar para<br/> encontrarlo Estéticos, <br/>Hogar, Salud, Fiestas, <br/>Diversos</a></div>
        </div>
            <div class="imagenes" width="70px"><img src="imagenes/servicios.logo.jpg" alt="Servicios en San Rafael" width="104" height="94" /> </div></td>
      </tr>
      <tr>
        <td height="130" colspan="2" class="contenedor_bordes"><div align="center"><img src="" alt="" name="" width="468" height="80" class="contenedor_anuncios" style="background-color: #FF00FF" /></div></td>
        </tr>
      
      <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="285">&nbsp;</td>
      </tr>
    </table>
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
    <td width="300" valign="top" class="bordes_lateral_guias"><div class="guias_contenedor">
      <!-- titulo -->
      <div >
        <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="100%" valign="top"><?php 	if (isset( $_SESSION['MM_Username'])) { ?>
              <div align="left" class="texto_opciones">
                <table width="303" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="27" colspan="4" valign="middle" bgcolor="#FFFFFF"><span class="textoguias">Bienvenido </span><span class="texto_negro Estilo6"><strong><?php echo ucfirst($row_Recordset4['nombre_usuario']); ?> </strong></span><span class="textoguias"> a SRL Clasificados</span> </td>
                    </tr>
                  <tr>
                    <td width="50" height="25"><img src="../clasificados/iconos/panel_control.jpg" alt="Ir a Panel Control Clasificados San Rafael Late" width="50" height="50" /></td>
                    <td colspan="3"><a href="../clasificados/sistema/index.php">Ir a Panel de Control </a></td>
                  </tr>
                  <tr>
                    <td><img src="../clasificados/iconos/panel_escribir.jpg" alt="Escribi tu anuncio en Clasificados San Rafael Late" width="50" height="50" /></td>
                    <td width="133"><a href="publique_anuncio.php">Publicar Anuncio </a></td>
                    <td width="51"><img src="../clasificados/iconos/ayuda-C.jpg" alt="Ayuda del sistema clasificados San Rafael Late" width="50" height="50" /></td>
                    <td width="69">Ayuda</td>
                  </tr>
                  <tr>
                    <td><img src="../clasificados/iconos/salir-c.jpg" alt="Salir - Desconetar Usuario" width="50" height="50" /></td>
                    <td colspan="3"><a href="<?php echo $logoutAction ?>" class="titulo_anuncios">Desconectar</a></td>
                  </tr>
                </table>
              </div>
              <?php } else { ?>
              <br/>
              <form id="form2" name="form2" method="post" action="../clasificados/login.php">
                <table width="97%" height="113" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="27" colspan="3" align="center" valign="middle" class="rubros_articulos_seleccionado"><div align="left">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="19%"><img src="../propiedades/imagenes/usuario.gif" alt="usuario de san rafael late" width="39" height="34" /></td>
                            <td width="81%">Mi cuenta </td>
                          </tr>
                        </table>
                    </div></td>
                  </tr>
                  <tr>
                    <td width="33%" height="29" bgcolor="#FFFFFF" class="menu_superior"><div align="left"><span class="rubros_articulos">Nombre:</span>:</div></td>
                    <td width="25" height="29" bgcolor="#FFFFFF" class="menu_superior"><input name="usuario" type="text" class="texto_opciones" id="usuario" size="15" /></td>
                    <td height="30" rowspan="2" align="right" valign="middle" bgcolor="#FFFFFF" class="menu_superior"><label></label>
                        <div align="center">
                          <label>
                          <input name="Submit2" type="submit" class="rubros" value="entrar" />
                          </label>
                      </div></td>
                  </tr>
                  <tr>
                    <td width="33%" height="25" valign="top" bgcolor="#FFFFFF" class="menu_superior"><div align="right" class="rubros_articulos">
                        <div align="left">contrase&ntilde;a:</span></div>
                    </div></td>
                    <td width="25" height="25" valign="top" bgcolor="#FFFFFF" class="menu_superior"><input name="contrasena" type="password" class="texto_opciones" id="contrasena" size="15" /></td>
                  </tr>
                  <tr>
                    <td height="19" colspan="3" valign="top" bgcolor="#FFFFFF" class="texto_anuncio"><span class="texto_link_chico"><a href="olvide_contrase&ntilde;a.php">olvidaste tu contrase&ntilde;a ?</a> -<a href="../clasificados/registro.php"> Registrate Aqui &gt;&gt;</a><a href="#"></a></span> </td>
                  </tr>
                </table>
              </form>
              <?php } ?></td>
            </tr>
          <tr>
            <td><table width="97%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="27" colspan="3" align="center" valign="middle" class="rubros_articulos_seleccionado"><div align="left" class="sos_nuevo">Sos Nuevo en SRL Clasificados ?  </div></td>
              </tr>
              <tr>
                <td width="20" height="29" bgcolor="#FFFFFF" class="texto_rubros">&nbsp;</td>
                <td width="218" height="29" bgcolor="#FFFFFF" class="texto_rubros"><img src="imagenes/bullet_fcha.gif" /> <span class="rubros"><a href="registro.php">REGISTRATE GRATIS !! </a><br/>
                    <img src="imagenes/bullet_fcha.gif" /> Como Publicar un Aviso <br/>
                    <img src="imagenes/bullet_fcha.gif" /> Como Buscar ..</span> </td>
                <td width="29" height="5" align="right" valign="middle" bgcolor="#FFFFFF" class="menu_superior"><label></label></td>
              </tr>

              <tr>
                <td height="5" colspan="3" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                <td height="5" colspan="3" valign="top" bgcolor="#FFFFFF" class="contenedor_anuncios">&nbsp;</td>
              </tr>
            </table></td>
            </tr>
        </table>
        <p>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="300" height="120" title="Propiedades en San Rafael">
            <param name="movie" value="publicidad/home-lateral-1.swf" />
            <param name="quality" value="high" />
            <embed src="publicidad/home-lateral-1.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="300" height="120"></embed>
          </object>
          <img src="" alt="" name="publicidad" width="300" height="100" id="publicidad" style="background-color: #00CCFF" /></p>
        <p><img src="tt_guias.gif" alt="" border="0" height="56" width="130" /><br clear="all" />
          <!-- viajes -->
      </p>
      </div>
      <div >
        <div >
          <div class="contenedor_opciones"><img src="imagenes/ic-Guia-Viajes-g.gif" alt="" border="0" height="32" width="29" /></div>
          <div class="sep5"></div>
          <div class="contenedor_opciones">
            <h2 class="textoguias"><b><a href="http://sanrafaellate.com.ar">TURISMO</a></b></h2>
          </div>
          <div class="sep15"></div>
          <div class="chamullo_guias"><span class="tit_guias"><b>Est&aacute;s pensando en viajar?</b><br />
Gu&iacute;a SRL tiene lo que<br />
est&aacute;s buscando. </span>CLICK AQUI </div>
         
          <span class="sep"><br />
          </span>
          <div class="br_guia"></div>
        </div>
        <div >
          <div class="contenedor_opciones"><img src="iconos/hoteles.png" alt="" border="0" height="32" width="29" /></div>
          <div class="sep5"></div>
          <div class="contenedor_opciones"><h2 class="textoguias"><b><a href="http://www.sanrafaellate.com.ar/alojamiento/Alojamientos.HTM">HOTELES</a></b></h2>
          </div>
          
          <div class="chamullo_guias"><span class="tit_guias"><b>Donde Dormir  ?</b><br />
            Gu&iacute;a Alojamiento SRL para<br />
            para que elijas la mejor opcion<br />
            en San Rafael.  <strong>ENTRAR</strong> </span></div>
          <span class="sep">          </span>
          <div class="br_guia"></div>
        </div>
        <span class="sep"><br />
        </span>
        <div >
          <div class="contenedor_opciones"></div>
          <div class="sep5"></div>
         
          
          
         
          </span> </div>
        </div>
        </div>
    </div>    </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FF0000"><div align="center">
      <table width="86%" height="15" border="0" cellpadding="0" cellspacing="0" class="menu_superior">
        <tr>
          <td width="15%"><div align="center"> <a href="http://clasificados.sanrafaellate.com.ar">Inicio</a> </div></td>
          <td width="28%"><div align="center"><a href="registro.php">Registrate GRATIS!!</a> </div></td>
          <td width="26%" height="25"><div align="center"><a href="../clasificados/publicidad.php"></a><a href="../clasificados/publique_anuncio.php">Publique un Anuncio</a></div></td>
          <td width="16%"><div align="center"><a href="../clasificados/ayuda.php"></a><a href="../clasificados/publicidad.php">Publicidad</a></div></td>
          <td width="15%"><div align="center"><a href="../clasificados/ayuda.php">Ayuda</a></div></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
        <p align="center" class="texto_negro">&copy;<strong><span lang="es-mx" xml:lang="es-mx"> sanrafaellate.com.ar</span></strong> &bull; Todos los Derechos Reservados &bull; 200<span lang="es" xml:lang="es">5</span></p>
    </div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center" class="rubros_articulos">SRL CLASIFICADOS <span class="rubros_articulos">&bull;</span>Anuncios Clasificados de San Rafael </div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center" class="rubros_articulos_seleccionado">&bull; <a href="http://www.sanrafaellate.com.ar" class="rubros_articulos_seleccionado">San Rafael</a> &bull; Mendoza &bull; Argentina &bull;</div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="130" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="130">&nbsp;</td>
  </tr>
  <tr>
    <td width="130"><img src="imagenes/bodegas_excusiones.png" width="130" height="200" /></td>
  </tr>
  <tr>
    <td width="130">&nbsp;</td>
  </tr>
  <tr>
    <td width="130">&nbsp;</td>
  </tr>
  <tr>
    <td width="130">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset4);
?>
