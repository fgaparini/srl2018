<?php 
// funcion acotar palabras

function acortar($texto,$maxword) {

$acortada= substr(strip_tags($texto),0,strrpos(substr(strip_tags($texto),0,$maxword)," "));
return $acortada;
}
 ?>
 <div id="contenedor2">

 <div id="cont_full" align="left">
   <!-- BEGUIN CONT FULL-->
       <div id="toplinks" align="left"><b>Estas en: </b><a href="http://sanrafaellate.com.ar" title="Ir a home">Home</a> >> Noticias</div>
<div class="cont_margin" >
    <div class="tituloSocial" align="left">
<div><h1>Noticias de San Rafael</h1> </div>  

<!-- DIV SOCIALES --> 
<?php $direccion = "http://".$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']; ?>
<!-- FACEBOOK SCRIPT --> 
					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=129728918042";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
					</script>
<!--END FACEBOOK -->

<div align="rigth">
<div id="share" align="rigth" >
  <!-- TWITTER -->
<div><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script><a href="https://twitter.com/share" class="twitter-share-button" data-via="sanrafaellate" data-lang="es" data-size="" data-dnt="true"  data-count="vertical">Twittear</a>
</div>
<!-- FACEBOOK -->
<div><div class="fb-like" data-href="<?php echo $direccion; ?>" data-send="false" data-layout="box_count" data-width="110" data-show-faces="true"></div></div>
<!--GOOGLE PLUS-->
<div><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><g:plusone size="tall"></g:plusone>
</div>
</div></div>
</div>


<div id="contenido">
<div id="listpag" align="left">
	<?php if (count($rowDe)>0) {  ?>
<?php foreach ($rowDe as $var)
{ ?>
<?php 
//VERIFICO Y OBTENGO IMAGEN 

		$ids=$var['ID_Pagina'];
		$query5= "Select *  FROM paginas_imagenespag WHERE ID_Pagina='$ids' ORDER BY ID_Pagina DESC";
		$rowsAi=$this->db->query($query5);
		$imgA =$rowsAi->row_array();

//Muestro solo si Tiene IMAGEN
if (count($imgA)>0)
	{  ?>
	<div>
		<div class="imag"><img src="<?php echo base_url() . "upload/paginas/thumb/".$var['ID_Pagina']."_1_p.jpg" ?>" alt="<?php $var['TituloContenido']; ?>"></div>
		<!-- /.imag -->
		<div class="infoa">
	 		<h2><a href="<?php echo base_url().$var['TipoPagina']."/" .$var['Url'] ; ?>" title=" Ampliar Imformacion "><?php echo $var['TituloContenido']; ?></a></h2>
			<?php if ( $var['Subtitulo']!=""): ?>
				<p><b> <?php echo $var['Subtitulo'] ?></b></p>
			<?php endif ?>
			<p><?php echo acortar($var['Contenido'], 270)." ...";?></p>
		</div>
		<!-- /.infoa -->
	</div>
<?php
    } // end if fotos
} // end foreach
}//End if
?>

</div>
<div><?php  echo $paginacion; ?></div>
<!-- /#listevent -->


</div>
<div id="adsC"> 
<!-- DESTACADOS X CATEGORIA -->
	<div id="relation">
 	
 <!-- /.relactionItem -->
<div id="buscadorC" align="left"> 
    <form action="">
      <h2>Buscador de Alojamientos</h2>
      <div class=""><label for="in">Llegada</label><br><input type="text" class="fechass" value="fecha Llegada" id="from"></div>
      <div class=""><label for="out">Salida</label><br><input type="text" value="Fecha Salida" id="to"></div>
      <div class="select"><label for="tipo">Tipo alojamiento</label>
      <select name="tipo" id="tipo">
          <?php foreach ($Tipo_A as $var) { ?>
          <option value="<?php echo $var['ID_TipoAlojamiento'] ;?>"><?php echo $var['TituloAlojamiento'];  ?></option>
          <?php } ?>

      </select> 
      </div>
      <div align="right" class="buttondiv"><button>Buscar..</button> </div>
    </form>
</div>


 <div align="center"><script type="text/javascript"><!--
google_ad_client = "ca-pub-7664603918719179";
/* 250x250 */
google_ad_slot = "4817257829";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div></div>
</div>

</div>
</div>

</div>

