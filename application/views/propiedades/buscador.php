<?php 

function limpia_espacios($string)
{
    $string = str_replace(' ','-',$string);
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );

    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );

    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );

    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );

    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );

    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );

    //Esta parte se encarga de eliminar cualquier caracter extraño
    $string = str_replace(
        array("\\", "¨", "º", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "`", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             "."),
        '',
        $string
    );
    return $string;
} 
function obtener_tipo($id,$tipoprop){
foreach ($tipoprop as $var) {
if ($var["ID_Tipo"]==$id) 
    {
return $var['TipoPropiedades'];    
    }  
  }    
} 
function obt_distrito($id,$distrito){
foreach ($distrito as $var) {
if ($var["ID_Distritos"]==$id) 
    {
return $var['Distrito'];  
    }  
  }    
} 

?>
            <!-- CONTENT -->
 <div id="content">
<div class="container">
    <div id="main">
        <div class="row">
            <div class="span9">
                <h1 class="page-header"><?php echo $TituloPage ?></h1>
                <div class="properties-grid">
                    <div class="properties-rows">
<script type="text/javascript">

</script>

    <div class="filter">
        <form action="<?php echo $now_url ?>" method="get" class="form-sort form-horizontal">
                                                                                                                
            <div class="control-group">
                <label class="control-label" for="inputSortBy">
                    Filtar por
                </label>

                <div class="controls">
                    <select name="filter" id="filter">
                <option value="" <?php if ($filter==""){echo 'selected="selected"';} ?> >-</option>
                            <option value="precio" <?php if ($filter=="precio"){echo 'selected="selected"';} ?> >Precio</option>
                            <option value="fecha" <?php if ($filter=="fecha"){echo 'selected="selected"';} ?> >Fecha de Publicacion</option>
                            <option value="superficie" <?php if ($filter=="superficie"){echo 'selected="selected"';} ?> >superficie</option>

                          
                    </select>
                </div>
                <!-- /.controls -->
            </div>
            <!-- /.control-group -->

            <div class="control-group">
                <label class="control-label" for="inputOrder">
                    Ordenar 
                </label>

                <div class="controls">
                    <select id="order" name="order">
                         <option value="" <?php if ($order==""){echo 'selected="selected"';} ?> >-</option>
                        <option value="DESC" <?php if ($order=="DESC"){echo 'selected="selected"';} ?>>Desciendente</option>
                        <option value="ASC" <?php if ($order=="ASC"){echo 'selected="selected"';} ?>>Ascendiente</option>
                    </select>
                </div>
                <!-- /.controls -->
            </div>
            <!-- /.control-group -->
        </form>
    </div>
    <!-- /.filter -->
</div><!-- /.properties-rows -->    
    <div class="row" align="">
<?php 
if (isset($PropList) AND count($PropList)>0) {?>

<?php 
foreach ($PropList as $var):?>
<?php 
$tipo=obtener_tipo($var["TipoPropiedades_ID_Tipo"],$TipoProp);
$url=limpia_espacios($var['Titulo']);
$ditrito=obt_distrito($var['Distritos_ID_Distritos'],$Distrito);

if($var["Moneda"]=="pesos"){
$moneda="$";
} else {$moneda='U$S';}

$fotos=$this->propabm_model->images_count ($var['ID_Propiedades']);

 ?>

  <div class="property span3"> <!-- abro propiedad -->
            <div class="image"> <!-- abro imagen -->
                <div class="content"><!-- abro content -->
                    <a href="<?php echo base_url()."propiedadessrl/propiedad/".$tipo."/".$var['ID_Propiedades']."/".$url.".html" ?>"></a>
                     <?php if ($fotos>0){ ?>
                    <img src="<?php echo base_url().'upload/propiedades/thumbG/'.$var['ID_Propiedades'].'_1_g.jpg'?>" alt="<?php echo $var['Titulo'] ?>">

                       <?php } else {?>
                      <img src="<?php echo base_url().'propiedades-asset/img/no_foto.jpg'?>" alt=""> 

                       <?php } ?>
                </div><!-- /.content -->

                <div class="price"><?php echo $moneda." ".$var['Precio'] ?></div><!-- /.price -->
                <div class="reduced"><?php echo $var['Operacion'] ?> </div><!-- /.reduced --> 
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="<?php echo base_url()."propiedadessrl/propiedad/".$tipo."/".$var['ID_Propiedades']."/".$url.".html" ?>" title="<?php echo $var['Titulo'] ?>"><?php echo $var['Direccion'] ?></a></h2>
            </div><!-- /.title -->

            <div class="location"><?php echo $ditrito ?></div><!-- /.location -->
            <div class="area">
                <span class="key">Area:</span><!-- /.key -->
                <span class="value"><?php echo $var['Superficie'] ?> m<sup>2</sup></span><!-- /.value -->
            </div><!-- /.area -->
            <div class="area" >
             <span class="key">Tipo:</span>
            <span class=""><a href="<?php echo base_url().'propiedadessrl/listado/'.$tipo ?>" title=""><?php echo $tipo ?></a></span><!-- /.key -->
                
            </div>
           
        </div><!-- /.property -->

<?php endforeach ?>


<?php } else { echo "<h4> No hay propiedades con  las caracteristicas solicitadas</h4>";}
?>

      

        
    </div><!-- /.row -->
</div><!-- /.properties-grid -->
            </div>
            <div class="sidebar span3">
		
                <div class="hidden-tablet">
                    <div class="widget properties last">
    <div class="title">
    	<h2>Buscar Propiedad</h2>

<div class="property-filter widget">
    <h2>Buscar Propiedades</h2>

    <div class="content">
                                <div class="location control-group">
                                    <label class="control-label" for="inputLocation">
                                        Zona
                                    </label>
                                    <div class="controls">
                                        <select id="zona">
                                          <option value="0" selected=selected>Indistinto</option>

                                          <?php foreach ($Distrito as $var): ?>
                                              <option value="<?php echo $var['Distrito'] ?>"><?php echo $var['Distrito'] ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="type control-group">
                                    <label class="control-label" for="tipo">
                                        Tipo Propiedad
                                    </label>
                                    <div class="controls">
                                        <select id="tipo">
                                            <option value="0" selected=selected>Indistinto</option>
                                         <?php foreach ($TipoProp as $var): ?>
                                              <option value="<?php echo $var['TipoPropiedades'] ?>"><?php echo $var['TipoPropiedades'] ?></option>
                                          <?php endforeach ?> 
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                        

                                <div class="rent control-group">
                                    <div class="controls">
                                        <label class="checkbox" for="venta">
                                            <input type="checkbox" id="venta" value="venta"> Comprar
                                        </label>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="sale control-group">
                                    <div class="controls">
                                        <label class="checkbox" for="alquiler">
                                            <input type="checkbox" id="alquiler" value="alquilar"> Alquilar
                                        </label>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-from control-group">
                                    <label class="control-label" for="inputPriceFrom">
                                        Precio desde
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="preciodesde" name="inputPriceFrom">
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-to control-group">
                                    <label class="control-label" for="inputPriceTo">
                                      Precio Hasta
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="preciohasta" name="inputPriceTo">
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-value">
                                    <span class="from"></span><!-- /.from -->
                                    -
                                    <span class="to"></span><!-- /.to -->
                                </div><!-- /.price-value -->

                                <div class="price-slider">
                                </div><!-- /.price-slider -->

                                <div class="form-actions">
                                    <input type="submit" value="Busca Ya!"  id="buscar" class="btn btn-primary btn-large">
                                </div><!-- /.form-actions -->
                                <input type="hidden" value="<?php echo base_url() ?>" id="base_url">
                            
    </div><!-- /.content -->
</div><!-- /.property-filter -->
        <h2>Filtrar Por</h2>
    </div><!-- /.title -->

    <div class="content">
    	<?php if ($tipo!='0' AND $ope=='0'): ?>
    		
   
		        <div class="property">
		              <div class="wrapper" style="margin:5px 9px">
		              	<h4>Operacion</h4>
		                <div>
		                	       <a href="<?php echo base_url().'propiedadessrl/buscador/'.$tipo.'/0/venta/0/0' ?>"><?php echo ucfirst($tipo) ?> en Venta</a><br>
		                	       <?php if ($tipo!="terreno" && $tipo!="lote"): ?>
                                   
		                	         <a href="<?php echo base_url()."propiedadessrl/buscador/".$tipo."/0/alquiler/0/0" ?>"><?php echo ucfirst($tipo) ?> en Alquiler</a>	
		                	       <?php endif ?>
		              
		                </div>
		            </div><!-- /.wrapper -->
		        </div><!-- /.property -->
 	<?php endif ?>
	    	<?php if ($ope!='0' & $tipo2=='0'): ?>
    	
   
		        <div class="property">
		              <div class="wrapper" style="margin:5px 9px">
		              	<h4>Tipo Propiedad</h4>
		              	<?php foreach ($TipoProp as $var): ?>
                        <?php if ($ope!="venta") { ?>
                        <?php if ($var['TipoPropiedades']!="terreno" && $var['TipoPropiedades']!="lote" ): ?>
                         <div>
                             <a href="<?php echo base_url().'propiedadessrl/buscador/'.$var['TipoPropiedades'].'/0/'.$ope.'/0/0' ?>">
                                <?php echo $var['TipoPropiedades'] ?> en <?php echo $ope ?>
                            </a><br>
                        </div>
                         <?php endif ?>
                         <?php } else { ?>
                            
                          <div>
                             <a href="<?php echo base_url().'propiedadessrl/buscador/'.$var['TipoPropiedades'].'/0/'.$ope.'/0/0' ?>">
                                <?php echo $var['TipoPropiedades'] ?> en <?php echo $ope ?>
                            </a><br>
                        </div>
                         <?php } ?>
		          <?php endforeach ?>
		            </div><!-- /.wrapper -->
		        </div><!-- /.property -->
 	<?php endif ?>

<?php if ($zona=='0' && $tipo2!='0'): ?>
    

           <div class="property">
		              <div class="wrapper" style="margin:5px 9px">
		              	<h4>Zona</h4>
                        <?php echo $tipo ?>
		                <div>
		                <?php foreach ($Distrito as $var): ?>
                        
		                	<a href="<?php echo base_url()."propiedadessrl/listado/".$tipo."?distrito=".$var['Distrito']  ?>"><?php echo $tipo2 ?> en <?php echo $var['Distrito'] ?></a><br>
		                <?php endforeach ?>
		                </div>
		            </div><!-- /.wrapper -->
		        </div><!-- /.property -->
<?php endif ?>


    </div><!-- /.content -->
</div><!-- /.properties -->
                </div>
            </div>
        </div>
     </div>
     <div><br><br></div>
</div>
 
</div><!-- /#content -->
</div><!-- /#wrapper-inner -->