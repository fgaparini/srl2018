<!-- BEGUIN FOTTER-->


<!-- =================| SCRIPTS |============== -->
<!-- jQuery JS -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script><!-- jQuery JS ONLINE 
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/scroll-infinite/jquery.infinitescroll.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/fancybox/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript">




$(document).ready(function() {
  $( '#dir_' ).infinitescroll({
 
  navSelector  : "div#paginacion",            
                 // selector for the paged navigation (it will be hidden)
 
  nextSelector : ".nextR a:first",    
                 // selector for the NEXT link (to page 2)
 
  itemSelector :  ".items" ,          
                 // selector for all items you'll retrieve
 
  debug        : true,                        
                 // enable debug messaging ( to console.log )
 
  loadingImg   : "../../../js/infinite-scroll/images/loading.gif",          
                 // loading image.
                 // default: "http://www.infinite-scroll.com/loading.gif"
 
  loadingText  : "Cargando Alojamientos...",      
                 // text accompanying loading image
                 // default: "<em>Loading the next set of posts...</em>"
 
  animate      : true
                 // boolean, if the page will do an animated scroll when new content loads
                 // default: false
 

    });
});
</script>
<?php if (isset($script)): ?>
        <?php foreach ($script as $var): ?>
         <?php echo $var; ?>
        <?php endforeach; ?>
    <?php endif; ?>

   <?php if (isset($js)): ?>
        <?php foreach ($js as $var): ?>
            <script type="text/javascript" src="<?php echo base_url() . $var ?>.js"></script>
        <?php endforeach; ?>
    <?php endif; ?>


<!-- GOOGLE ANALYTICS -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-768650-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">

</body>
</html>