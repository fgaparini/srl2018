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
            <div id="content"><div class="map-wrapper">
    <div class="map">
        <div id="map" class="map-inner"></div><!-- /.map-inner -->

        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="property-filter pull-right">
<h2>Buscar Propiedades</h2>
                        <div class="content">
                                <div class="location control-group">
                                    <label class="control-label" for="zona">
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
                                            <input type="checkbox" id="venta" value="venta">Comprar
                                        </label>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="sale control-group">
                                    <div class="controls">
                                        <label class="checkbox" for="alquiler">
                                            <input type="checkbox" id="alquiler" value="alquilar">Alquilar
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
                </div><!-- /.span3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.map -->
</div><!-- /.map-wrapper -->
<div class="container">
    <div id="main">
        <div class="row">
            <div class="span9">
                <h1 class="page-header">Ultimas Propiedades</h1>
                <div class="properties-grid">
<?php foreach ($PropList as $var):?>
    <?php 
$tipo=obtener_tipo($var["TipoPropiedades_ID_Tipo"],$TipoProp);
$url=limpia_espacios($var['Titulo']);
$ditrito=obt_distrito($var['Distritos_ID_Distritos'],$Distrito);

if($var["Moneda"]=="pesos"){
$moneda="$";
} else {$moneda='U$S';}

$fotos=$this->propabm_model->images_count ($var['ID_Propiedades']);


 ?>

  <div class="property span3">
            <div class="image">
                <div class="content">
                  
                        

                    <a href="<?php echo base_url()."propiedadessrl/propiedad/".$tipo."/".$var['ID_Propiedades']."/".$url.".html" ?>"></a>
                      <?php if ($fotos>0){ ?>
                      <img src="<?php echo base_url().'upload/propiedades/thumbG/'.$var['ID_Propiedades'].'_1_g.jpg'?>" alt=""> 
                       <?php } else {?>
                      <img src="<?php echo base_url().'propiedades-asset/img/no_foto.jpg'?>" alt=""> 

                       <?php } ?>
                </div><!-- /.content -->

                <div class="price"><?php echo $moneda." ".$var['Precio'] ?></div><!-- /.price -->
                <div class="reduced"><?php echo $var['Operacion'] ?> </div>
                <!-- /.reduced --> 
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="<?php echo base_url()."propiedadessrl/propiedad/".$tipo."/".$var['ID_Propiedades']."/".$url.".html" ?>" title="<?php echo $var['Titulo'] ?>"><?php echo $var['Direccion'] ?></a></h2>
            </div><!-- /.title -->

            <div class="location"><?php echo $ditrito ?></div><!-- /.location -->
            <div class="area">
                <span class="key">Area:</span><!-- /.key -->
                <span class="value"><?php echo $var['Superficie'] ?></span><!-- /.value -->
            </div><!-- /.area -->
            <div class="area" >
             <span class="key">Tipo:</span>
            <span class=""><a href="" title=""><?php echo $tipo ?></a></span><!-- /.key -->
                
            </div>
        </div><!-- /.property -->

<?php endforeach ?>

      

        
  
</div><!-- /.properties-grid -->
            </div>
            <div class="sidebar span3" align="center">
                <br> <br>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- PropSRL120x600 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-7664603918719179"
     data-ad-slot="4090841461"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                <<!-- div class="hidden-tablet">
                    <div class="widget properties last">
    <div class="title">
        <h2>Latest Properties</h2>
    </div>


    <div class="content">
         -->
      <!--   <div class="property">
            <div class="image">
                <a href="detail.html"></a>
                <img src="<?php echo base_url() ?>propiedades/img/tmp/property-small-4.png" alt="">
            </div>

            <div class="wrapper">
                <div class="title">
                    <h3>
                        <a href="detail.html">27523 Pacific Coast</a>
                    </h3>
                </div>
                <div class="location">Palo Alto CA</div>
                <div class="price">€2 300 000</div>
            </div>
        </div> -->

        

      


<!--     </div>
</div>
                </div> -->
            </div>
            <!-- este -->
        </div>
     </div>
     <div><br><br></div>
</div>

<div class="bottom-wrapper">
    <div class="bottom container">
        <h1>Beneficio para Usuarios</h1>
        <div class="bottom-inner row">
            <div class="item span4">
                <div class="address decoration"></div>
                <h2><a>Puntos de Interes</a></h2>
                <p>Además de mostrar donde están las propiedades, Nuestro Portal suma puntos de interés de la zona de busqueda como comisarías, bibliotecas, instituciones educativas, transporte público, entre otros puntos de interés.</p>
                
            </div><!-- /.item -->

            <div class="item span4">
                <div class="gps decoration"></div>
                <h2><a>Estadísticas Zona</a></h2>
                <p>Precios promedios por zona y comparación entre distritos del costo por m2 son algunas de las estadísticas que ofrecemos del mercado inmobiliario para que le resulte mucho más fácil al usuario tomar decisiones sobre la propiedad ideal.</p>
           
            </div><!-- /.item -->

            <div class="item span4">
                <div class="key decoration"></div>
                <h2><a>Heramientas</a></h2>
                <p>Si te registras en nuestro portal, accedes a un set de herramientas que le permiten realizar seguimientos de precios, actualización de propiedades,  agregar propiedades favoritas, y suscribirse de manera inteligente cada vez que aparezca una propiedad con las características que él busca.</p>
            </div><!-- /.item -->
        </div><!-- /.bottom-inner -->
    </div><!-- /.bottom -->
</div><!-- /.bottom-wrapper -->    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->
<input type="hidden" id="page" value="home">