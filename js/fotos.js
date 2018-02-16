 $(function() {

 //$('#galeria_light a').lightBox();

$("a.galerias").fancybox({
	// autoSize:true,
	// margin: [120, 0, 0, 0],
	'onComplete': function() {
      $("#fancybox-wrap").css({'top':'20px', 'z-index':'10000'});
   }	
	});


 });
 
