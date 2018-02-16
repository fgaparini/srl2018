
<input type="hidden" id="baseurl" value="<?php echo base_url() ?>">
    <!-- JavaScript -->
    <script src="<?php echo base_url() ?>js/jquery-ui/js/jquery-1.8.3.js"></script>
    <script src="<?php echo base_url() ?>propiedades-asset/admin/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>js/jquery-ui/development-bundle/ui/minified/jquery-ui.custom.min.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="<?php echo base_url() ?>propiedades-asset/admin/js/tablesorter/jquery.tablesorter.js"></script>
  
    <?php if (isset($propiedad)): ?>
        <script type="text/javascript" src="<?php echo base_url() ?>propiedades-asset/js/carousel.js"></script>
<script>
$(document).ready( function()
{
$('.carousel.property .content ul li img').on({
        click: function(e) {
            var src = $(this).attr('src');
            var img = $(this).closest('.carousel.property').find('.preview img');
            img.attr('src', src);
            $('.carousel.property .content li').each(function() {
                $(this).removeClass('active');
            });
            $(this).closest('li').addClass('active');
        }
    });
 $('#main .carousel .content ul').carouFredSel({
    scroll: {
      items: 1
    },
    auto: false,
    next: {
        button: '#main .carousel-next',
        key: 'right'
    },
    prev: {
        button: '#main .carousel-prev',
        key: 'left'
    }
  });
});
 </script>

    <?php endif ?>  

 <!-- si la pagina es de MAPA -->
    <?php if (isset($mapa_coord)): ?>

    <!-- SI EXISTEN COORDENADAS  -->
    <?php if ($infoprop['Coordenadas']!=NULL): ?>
    <?php 
 $coordenadas = explode(".", $infoprop['Coordenadas']);
 $latitud = $coordenadas[0];
 $longitud = $coordenadas[1];
 $direccion ="";
     ?>
 <script language="javascript">
window.onload = codeLatLon2('<?php  echo $coordenadas; ?>');
</script>
<?php endif ?>  
    <!-- SI NO EXISTEN COORDENADAS Y SI DIRECCION  -->
    <?php if ($infoprop['Coordenadas']==NULL && $infoprop['Direccion'] !=""): ?>

<?php  $direccion =$infoprop['Direccion'].", San Rafael, Mendoza";
 $coordenadas="";
  $latitud ="";
 $longitud = ""; ?>
 <script language="javascript">
 // window.onload = codeAddress('<?php  echo $direccion; ?>');

</script>
<?php endif ?> 

    <?php endif ?>  
 
      <script src="<?php echo base_url() ?>propiedades-asset/admin/js/adminroot.js"></script>
  </body>
</html>
