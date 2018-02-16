jQuery(document).ready(function($) {
var baseurl= $('#baseurl').val();
  $.backstretch([
      baseurl+"propiedades-asset/img/bg1.png", 
      baseurl+"propiedades-asset/img/bg2.png"
    ], {duration: 3000, fade: 750});
    
});

