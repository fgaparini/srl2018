<div id="contenedor2">
	<div id="cont_full" align="left">
		<!-- BEGUIN CONT FULL-->
		<div id="toplinks" align="left"><b>Estas en: </b><a href="http://sanrafaellate.com" title="Ir a home">Home</a> >> <a href="<?php echo base_url()."agenda/mes/0" ?>">Agenda</a> >> <?php echo "Eventos de ".$namemes ?></div>
		<div class="cont_margin" >
			<div class="tituloSocial" align="left">
				<div><h1><?php if (!isset($Todos) || $Todos==NULL || $Todos=='' ) {echo ' Eventos de '. $namemes. 'en San Rafael' ;} else {echo "Guia Eventos de San Rafael";} ?></h1> </div>
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
			<div id="listevent" align="left">
				<?php if (count($row_Ag)>0) {  ?>
				<?php foreach ($row_Ag as $var)
				{ ?>
				<?php
				//VERIFICO Y OBTENGO IMAGEN
						$ids=$var['ID_Agenda'];
						$query5= "Select *  FROM agendas_imagenesage WHERE ID_Agenda='$ids' ORDER BY ID_Agenda ASC";
						$rowsAi=$this->db->query($query5);
						$imgA =$rowsAi->row_array();
				//Muestro solo si Tiene IMAGEN
				if (count($imgA)>0)
				{  ?>
				<div>
					<div class="fecha"><?php echo $var['fechaA'] ?></div>
					<!-- /.fecha -->
					<div class="imag"><img src="<?php echo base_url() . "upload/agendas/thumb/".$var['ID_Agenda']."_".$imgA['ImagenAgenda']."_p.jpg" ?>" alt="<?php $var['Titulo']; ?>"></div>
					<!-- /.imag -->
					<div class="infoa">
						<h2><a href="<?php echo base_url(). "agenda/" . str_replace(" ","-",$var['Titulo'])."-".$var['ID_Agenda']; ?>" title="Ver info Evento en San Rafael"><?php echo $var['Titulo']; ?></a></h2>
						<p><?php echo substr(strip_tags($var['Descripcion']),0, 250)."...";?></p>
					</div>
					<!-- /.infoa -->
				</div>
				<?php
				} // end if
				} // end foreach
				} else { // si nop hay regiustro
				echo "<p> No contamos con eventos para este mes  ...a href='".$base_url."agenda/agenda-pasadas'> < </p>";
				}
				?>
			</div>
			<!-- /#listevent -->
		</div>
		<div id="adsC">
			<!-- PAGINAS RELACIONADAS INTERNAS -->
			<div id="relation">
				
				<div id="agendames">
					<h2>Eventos por Mes</h2>
					<div align="center" style="background-color:#666"><a href="<?php echo base_url() ?>agenda/agenda-san-rafael.html" title="Ver todos los eventos">Ver Todos</a></div>
					<?php
					$qmeses=12-$meshoy;
					for ($i=0; $i <=$qmeses; $i++) {
							$mesactual=$meshoy+$i;
							echo '<div align="center"><a href="'.base_url().'agenda/mes/'.$mesactual.'" title="Ver Eventos de '.$meses[$mesactual].'">'. $meses[$mesactual].'</a></div>';
					}
					?>
				</div>
				<!-- /#agendames -->
				
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