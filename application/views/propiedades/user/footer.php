
<input type="hidden" id="baseurl" value="<?php echo base_url() ?>">
    <!-- JavaScript -->
    <script src="<?php echo base_url() ?>propiedades-asset/admin/js/jquery-1.10.2.js"></script>
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

 
 
  <?php if (isset($addfoto) OR  $body=="listar_fotos"  )  {      ?>

    <!-- DROPZONE AGREGAR FOTOS -->
   
      <!-- 2 -->
      <script src="<?php echo base_url() ?>propiedades-asset/dropzone/dropzone.min.js"></script>
      <script>
 // var maxfotos=document.getElementById('plan').value;
$(document).ready( function()
{
       //  var cantfotos =<?php echo $cantifotos; ?>;
       //  var idprop= <?php echo $id_prop; ?>;
       //  var baseurl = "<?php echo base_url() ?>";
       //     for (var i = 1; i <= 4; i++) {
           
       //    var mockFile = Array();
                 
       //           mockFile[i]= { name: idprop+"_"+i+".jpg", size: 12345 };
       //          var mydropzone = new Dropzone("#dropzone2");

       //        mydropzone.options.addedfile.call(mydropzone, mockFile[i]);
 
       //          mydropzone.options.thumbnail.call(mydropzone, mockFile[i], baseurl+"upload/propiedades/"+idprop+"_"+i+".jpg");
                 
       // }

  
                // var mockFile = { name: "1_2.jpg", size: 12345 };
                //  var mydropzone = new Dropzone("#dropzone2");
                // mydropzone.options.addedfile.call(mydropzone, mockFile);
 
                // mydropzone.options.thumbnail.call(mydropzone, mockFile, "http://localhost/late/upload/propiedades/1_2.jpg");
                //    var mockFile2 = { name: "1_3.jpg", size: 12345 };
                //  var mydropzone = new Dropzone("#dropzone2");
                // mydropzone.options.addedfile.call(mydropzone, mockFile2);
 
                // mydropzone.options.thumbnail.call(mydropzone, mockFile2, "http://localhost/late/upload/propiedades/1_3.jpg");


                 



 var maxfotos=20;


  Dropzone.options.dropzone2 = {
  maxFiles: maxfotos,
   maxFilesize: 6, // MB
  accept: function(file, done) {
    done();
  }, 
  addRemoveLinks:true,
  dictRemoveFile:"Borrar",
  dictRemoveFileConfirmation :"Seguro que desea Eliminar la Imagen?",
  init: function() {
    
    this.on("maxfilesexceeded", function(file){
        alert("A exedido su Cantidad de Fotos Permitidas!");
    });
     this.on("success", function(file, responseText) {
      // Handle the responseText here. For example, add the text to the preview element:
      $("#buttonlisto").show();
    
  
    });
     

         var cantfotos =<?php echo $cantifotos; ?>;
        var idprop= <?php echo $id_prop; ?>;
        var baseurl = "<?php echo base_url() ?>";
           for (var i = 1; i <= 4; i++) {
           
          var mockFile = Array();
                 
                 mockFile[i]= { name: idprop+"_"+i+".jpg", size: 12345 };
                // var mydropzone = new Dropzone("#dropzone2");

              this.options.addedfile.call(this, mockFile[i]);
 
                this.options.thumbnail.call(this, mockFile[i], baseurl+"upload/propiedades/"+idprop+"_"+i+".jpg");
                 
       }
       // $("a.dz-remove").html("Borrar").css('cursor', 'pointer');

      this.on("removedfile", function(file) {
        
      
    });

  }
};
            
});


</script>

  <?php    } ?>
      <script src="<?php echo base_url() ?>propiedades-asset/admin/js/adminroot.js"></script>
       <?php if (isset($addfoto) OR  $body=="listar_fotos"  )  {      ?>

       <?php } ?>
  </body>
</html>
