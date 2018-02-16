 $(function() {


var galleries = $(".ad-gallery").adGallery({
  loader_image: "http://sanrafaellate.com/js/AD-Gallery/loader.gif",
  // Width of the image, set to false and it will 
  // read the CSS width
  width: 550, 
  // Height of the image, set to false and it 
  // will read the CSS height
  height: 410, 
  // Opacity that the thumbs fades to/from, (1 removes fade effect)
  // Note that this effect combined with other effects might be 
  // resource intensive and make animations lag
update_window_hash: false,
start_at_index: 0, 


  slideshow: {
    enable: true,
    autostart: false,
    speed: 5000,
    
  },
  effect: 'fade',
  callbacks: {
init: function() {
this.preloadAll(); //PRELOAD DE TODAS LAS IMAGENES
}
}


  


 });
var apis = $('#sliderPage').revolution({
    delay:5000,
    // startwidth:1224,
    startheight:400,
    maxheight:420,
    hideThumbs:10,

    // navigationType:"bullet",      // bullet, thumb, none
    // navigationArrows:"solo",      // nexttobullets, solo (old name verticalcentered), none
    // // navigationStyle:"round-old",    // round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom
    // navigationHAlign:"center",      // Vertical Align top,center,bottom
    // navigationVAlign:"bottom",      // Horizontal Align left,center,right
    // touchenabled:"on",          // Enable Swipe Function : on/off
    // onHoverStop:"off",          // Stop Banner Timet at Hover on Slide on/off
  
    // shadow:0,
     fullWidth:"on",
     forceFullWidth:"on",
    // fullScreenAlignForce:"on"
    // fullScreenOffsetContainer: "on"
  });
/*
var galleries = $(".ad-gallery").adGallery({
  loader_image: "http://sanrafaellate.com/js/AD-Gallery/loader.gif",
  // Width of the image, set to false and it will 
  // read the CSS width
  width: false, 
  // Height of the image, set to false and it 
  // will read the CSS height
  height: false, 
  // Opacity that the thumbs fades to/from, (1 removes fade effect)
  // Note that this effect combined with other effects might be 
  // resource intensive and make animations lag

  update_window_hash: false,
start_at_index: 0, 


  slideshow: {
    enable: true,
    autostart: false,
    speed: 5000,
    
  },
  effect: 'fade'


  
});
*/

 });