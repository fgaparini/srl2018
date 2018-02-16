<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1>Agregar Fotos</h1>
<?php if (!isset($masfoto)): ?>
    
 
   <div class="progress  progress-striped barrapasos " style="height:35px; margin:15 0;">
  <div class="progress-bar progress-bar-success" style="width: 34%; padding:8px;">
    <span class=""><b>Paso 1 : Carga Datos</b></span>
  </div>
  <div class="progress-bar progress-bar-warning" style="width: 33%; background-color:#;padding:8px;">
    <span class=""><b>Paso 2: Carga de Fotos</b></span>
  </div>
  <div class="progress-bar progress-bar-danger" style="width: 33%; background-color:#979A9F;padding:8px;" class="">Paso 3: Carga Ubicacion</span>
  </div>
</div>
 <?php endif ?>
  <div class="row">
   
   <?php if (isset($masfoto)){ ?><p> Agregue mas fotos a su propiedad , Arraste sus fotos hasta esta región marcada o Clikee en la misma para buscar las fotos a agregar.</p>  <?php } else { ?>
    <p>Arraste sus fotos hasta esta región o Clikee en la misma para buscar fotos.</p>
<p>Puede Omitir este paso presionando <b>"Siguiente Paso"</b> al final de la pagina.</p> 
    <?php }?>
    <div class="col-lg-10">

<?php if (isset($cant_fotos) && $cant_fotos>0) {

    if ($user['PlanUsuarios_ID_PlanU']==1 ) {

    $cantF=8-$cant_fotos;
  }else {$cantF=20-$cant_fotos;}
   echo '  <input type="hidden" id="plan" value="'. $cantF.'">';
  # code...
} else {
  if ($user['PlanUsuarios_ID_PlanU']==1 ) {

    $cantF=8;
  }else {$cantF=20;}
  echo '  <input type="hidden" id="plan" value="'. $cantF.'">';
} 


?>

    
<form action="<?php echo base_url().'propiedadessrl/adminuser/dz_upload/'.$idprop.'?plan='.$user['PlanUsuarios_ID_PlanU'] ?>" class="dropzone" id="dropzone">
</form>
</div>
<p></p>
<div class="col-lg-10" style="margin:30px 0 0 0" id="">
  <?php if (isset($nuevoprop)): ?>  
      <a href="<?php echo  base_url().'propiedadessrl/adminuser/map_prop/'.$idprop ?>" class="btn btn-success" style="display:none" id="buttonlisto">Siguiente Paso <span class="fa fa-chevron-right"></span></a>
  <?php endif ?>
  <?php if (isset($masfoto)): ?>
          <a href="<?php echo  base_url().'propiedadessrl/adminuser/listarfotos/'.$idprop ?>" class="btn btn-success " style="display:none" id="buttonlisto"><span class="fa fa-check"></span> Listo (volver)</a>

  <?php endif ?>
</div>
</div>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
<script>
 var maxfotos=document.getElementById('plan').value;


  Dropzone.options.dropzone = {
  maxFiles: maxfotos,
   maxFilesize: 6, // MB
  accept: function(file, done) {
    done();
  },
  init: function() {
    this.on("maxfilesexceeded", function(file){
        alert("A exedido su Cantidad de Fotos Permitidas!");
    });
     this.on("success", function(file, responseText) {
      // Handle the responseText here. For example, add the text to the preview element:
      $("#buttonlisto").show();
    });
  }
};
</script>

