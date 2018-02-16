<?php 
function limpia_espacios($cadena1)
{
    $cadena = str_replace(' ','-',$cadena1);
    return $cadena;
} 
?>

      <!-- CONTENT -->
            <div id="content"><div class="container">
    <div id="main">
        <div class="row">
            <div class="span9"><div class="pull-right" style="margin: 30px 40px 0 0"><div class="btn btn-success ">    <?php if ($Prop['Moneda']=="pesos"){echo "$";}else{echo 'U$D';} ?><?php echo $Prop['Precio'] ?></div></div>
            <div style="font-size:11px">
                <a href="<?php echo base_url().'propiedadessrl/home'?>">Propiedades San Rafael Late</a> > 
                <a href="<?php echo base_url().'propiedadessrl/listado/'.$Prop['Operacion'] ?>"><?php echo $Prop['Operacion'] ?></a>>
                <a href="<?php echo base_url().'propiedadessrl/buscador/0/'.limpia_espacios($DistritoP['Distrito']).'/'.$Prop['Operacion'] .'/0/0' ?>"><?php echo $DistritoP['Distrito'] ?></a>
            </div>
                <h1 class="page-header" style="margin-bottom:0px;max-width:400px"><?php echo ucfirst($Prop['Titulo']) ?></h1>
                   <span> <?php echo $TipoP['TipoPropiedades']." en ".$Prop['Operacion']." en ".$DistritoP['Distrito'] ." - San Rafael Mendoza "; ?></span>
                    <br><span class="label label-default" ><?php echo $Prop['Operacion'] ?> </span> <span class="label label-default" ><?php echo $TipoP['TipoPropiedades'] ?></span>
<div class="clear" style="margin-bottom:20px;"></div>
<?php if ($cant_fotos>0): ?>
    

                <div class="carousel property" align="center">
                    <div class="preview">
                        <img src="<?php echo base_url()."upload/propiedades/".$Prop['ID_Propiedades']."_1.jpg" ?>" alt="">
                    </div><!-- /.preview -->

                    <div class="content">

                        <a class="carousel-prev" href="#">Previous</a>
                        <a class="carousel-next" href="#">Next</a>
                        <ul align="left">
                        <?php for ($i=1; $i <=$cant_fotos ; $i++) { ?>
                              <li <?php if ($i==1){echo 'class="active"';} ?>>
                                <img src="<?php echo base_url()."upload/propiedades/".$Prop['ID_Propiedades']."_".$i.".jpg" ?>" alt="">
                            </li>
                        <?php } ?>

                        </ul>
                    </div>
                    <!-- /.content -->
                </div>
                <!-- /.carousel -->
<?php endif ?>
                <div class="property-detail">
                    <div class="pull-left overview">
                        <div class="row">
                            <div class="span3">
                                <h2>Información</h2>
    
                                <table>
                                    <tr>
                                        <th>Precio:</th>
                                        <td><?php echo $Prop['Precio'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Operacion:</th>
                                        <td><?php echo $Prop['Operacion'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tipo Propiedad:</th>
                                        <td><?php echo $TipoP['TipoPropiedades'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Ubicacion:</th>
                                        <td><?php echo $Prop['Direccion'] ?></td>
                                    </tr>
                                    
                                </table>
                            </div>
                            <!-- /.span2 -->
                        </div>
                        <!-- /.row -->
                    </div>

                    <div style="min-height:200px"><p><?php echo $Prop['Descripcion'] ?></p></div>

                    <h2>Caracteristicas</h2>
             <div class="table-resposive">
                                <table class="table table-bordered table-hover tablesorter">
                                    <tr>
                                        <th>Precio</th>
                                        <th>Superficie(m<sup>2</sup>)</th>
                                        <th>Sup Cubierta(m<sup>2</sup>)</th> 
                                        <th>Habitaciones</th>
                                        <th>Antiguedad</th>
                                        <th>Hectareas(ha)</th>
                                      
                                       


                                    
                                    <tr>
                                        <td><span style="color:#4F9FDB"><strong>
                                          <?php if ($Prop['Moneda']=="pesos"){echo "$";}else{echo 'U$D';} ?><?php echo $Prop['Precio'] ?></strong></span></td>+
                                        <td><?php echo $Prop['Superficie'] ?></td>
                                        <td><?php echo $Prop['SuperficieCub'] ?></td>
                                        <td><?php echo $Prop['Habitaciones'] ?></td>
                                        <td><?php echo $Prop['Antiguedad'] ?></td>
                                        <td><?php echo $Prop['Hectareas'] ?></td>
                                       

                                    </tr>
                                   
                                </table>
                                </div>
          <div class="table-resposive">
                                <table class="table table-bordered table-hover tablesorter">
                                    <tr>
                                        <th>Garage:</th>
                                        <th>electricidad:</th> 
                                        <th>Gas:</th>
                                        <th>Cloacas:</th>
                                       


                                    
                                    <tr>
                                        <td><?php if ($Prop['Garage']==1) {
                                          echo '<ul><li class="checked"></li></ul>';
                                        } else { echo '<ul><li class="plain"></li></ul>';} ?></td>
                                        <td><?php if ($Prop['Electricidad']==1) {
                                          echo '<ul><li class="checked"></li></ul>';
                                        } else { echo '<ul><li class="plain"></li></ul>';} ?></td>
                                         <td><?php if ($Prop['Gas']==1) {
                                          echo '<ul><li class="checked"></li></ul>';
                                        } else { echo '<ul><li class="plain"></li></ul>';} ?></td>
                                         <td><?php if ($Prop['Cloacas']==1) {
                                          echo '<ul><li class="checked"></li></ul>';
                                        } else { echo '<ul><li class="plain"></li></ul>';} ?></td>

                                    </tr>
                                   
                                </table>
                                </div>

                    <h2>Ubicación</h2>

                    <div id="property-map"><?php echo $map['html']; ?></div><!-- /#property-map -->
                </div>

            </div>
             <div class="sidebar span3">
                <div class="widget our-agents">
    <div class="title">
        <h2>Datos Vendedor</h2>
    </div><!-- /.title -->

    <div class="content">
        <div class="agent">
            <div class="image">
                <img src="<?php echo base_url() ?>propiedades-asset/img/photos/emma-small.png" alt="">
            </div><!-- /.image -->
            <div class="name"><?php if ($user['Vendedor']==""){ echo $user['Usuario'];} else {echo $user['Vendedor'];} ?></div><!-- /.name -->
            <div class="phone"><?php if ($user['Telefono']!="" AND $user['Telefono']!="--" AND $user['Telefono']!="-") { echo $user['Telefono'];} ?></div><!-- /.phone -->
            <div class="direction"><?php if ($user['Direccion']!="" AND $user['Direccion']!="--" AND $user['Direccion']!="-") { echo $user['Direccion'];} ?></div>
             <div class="email"><a href="#"><?php echo $user['Email']; ?></a></div><!-- /.email -->
        </div><!-- /.agent -->

   
    </div><!-- /.content -->
</div><!-- /.our-agents -->
                <div class="widget contact">
    <div class="title">
        <h2 class="block-title">Consulte</h2>
    </div><!-- /.title -->
    <div class="content">
            <div class="control-group">
                <label class="control-label" fAND="nombre">
                    Nombre
                    <span class="form-required" title="This field is required.">*</span>
                </label>
                <div class="controls">
                    <input type="text" id="nombre">
                </div><!-- /.controls -->
            </div><!-- /.control-group -->

            <div class="control-group">
                <label class="control-label" for="Email">
                    Email
                    <span class="form-required" title="This field is required.">*</span>
                </label>
                <div class="controls">
                    <input type="text" id="email">
                </div><!-- /.controls -->
            </div><!-- /.control-group -->

            <div class="control-group">
                <label class="control-label" for="telefono">
                    Telefono
                    <span class="form-required" title="This field is required.">*</span>
                </label>
                <div class="controls">
                    <input type="text" id="telefono">
                </div><!-- /.controls -->
            </div><!-- /.control-group -->

            <div class="control-group">
                <label class="control-label" for="consulta">
                    Consulta
                    <span class="form-required" title="This field is required.">*</span>
                </label>

                <div class="controls">
                    <textarea id="consulta"></textarea>
                </div><!-- /.controls -->
            </div><!-- /.control-group -->

            <div class="">
                <input type="submit" class="btn btn-primary arrow-right" id="contactoprop" value="Consultar">
                <input type="hidden" id="baseurl" value="<?php echo base_url() ?>">
                <input type="hidden" id="emailprop" value="<?php echo $user['Email']; ?>">
                <input type="hidden" id="id_prop" value="<?php echo $Prop['ID_Propiedades']; ?>">

                

            </div><!-- /.form-actions -->
    </div><!-- /.content -->
</div><!-- /.widget -->
                <div class="widget properties last">
    <div class="title">
        <h2>Propiedades Similares</h2>
    </div><!-- /.title -->



    <div class="content">

        <?php foreach ($PropSimi as $var): ?>

    <?php $url=limpia_espacios($var['Titulo']);

    if($var["Moneda"]=="pesos"){
$moneda="$";
} else {$moneda='U$S';} ?>
  
  
        <div class="property">
            <div class="image">
                <a href="<?php echo base_url()."propiedadessrl/propiedad/".$TipoP['TipoPropiedades']."/".$var['ID_Propiedades']."/".$url.".html" ?>"></a>
                <img src="<?php echo base_url()."upload/propiedades/thumb/".$var['ID_Propiedades']."_1.jpg" ?>" alt="">
            </div><!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3>
                        <a href="<?php echo base_url()."propiedadessrl/propiedad/".$TipoP['TipoPropiedades']."/".$var['ID_Propiedades']."/".$url.".html" ?>" title="<?php echo $var['Titulo'] ?>"><?php echo $var['Direccion'] ?></a>
                    </h3>
                </div><!-- /.title -->
                <div class="location"><?php echo $DistritoP['Distrito'] ?></div><!-- /.location -->
                <div class="price"><?php echo $moneda." ".$var['Precio'] ?></div><!-- /.price -->
            </div><!-- /.wrapper -->
        </div><!-- /.property -->
  <?php endforeach ?>


  

    </div><!-- /.content -->
</div><!-- /.properties -->
<br>
<br>
<div align="center">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- PropSRL120x600 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-7664603918719179"
     data-ad-slot="4090841461"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<br><br>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- PropSRL300x250 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7664603918719179"
     data-ad-slot="3951240669"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>
            </div>
        </div>
    </div>
</div>
    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->
