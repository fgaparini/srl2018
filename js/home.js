  $(function() {

  
    var baseurl=$('input#baseurl').val();
 $('#buscaralojar').click(function(){

      var Url=$('#buscadorC select#tipo').val();
      var fechaIng2=$('#buscadorC  input#from').val();
      var fechaSal2=$('#buscadorC  input#to').val();

      if ( fechaIng2=="" || fechaIng2=="fecha Llegada")
        {alert("falta fecha ingreso");
      return false;
       }

      if ( fechaSal2=="" || fechaSal2=="Fecha Salida" )
        {alert("falta fecha salida");
      return false;
       }
         window.location=baseurl+'/buscar/'+Url+'?from='+fechaIng2+'&to='+fechaSal2;

  });
//revolution SLIDER -------------------

var api = $('#home-slider').revolution({
    delay:8000,
    startwidth:1230,
    
    startheight:580,
    maxheight:580,
    navigationType:"bullet",      // bullet, thumb, none
    navigationArrows:"solo",      // nexttobullets, solo (old name verticalcentered), none
    navigationStyle:"round-old",    // round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom
    navigationHAlign:"center",      // Vertical Align top,center,bottom
    navigationVAlign:"bottom",      // Horizontal Align left,center,right
    touchenabled:"on",          // Enable Swipe Function : on/off
    onHoverStop:"off",          // Stop Banner Timet at Hover on Slide on/off
  
    shadow:0,
    fullScreen:"on",
    fullWidth:"off",
    // fullScreenAlignForce:"on"
    fullScreenOffsetContainer: ""
  });

// ----------------------------------------
  $('#buscardespegar').click(function(){

      var fechaIng22=$('#buscadorC  input#from').val();
      var fechaSal22=$('#buscadorC  input#to').val();
      var personas=$('#buscadorC  #personas').val();
      
      if ( fechaIng22=="")
        {alert("falta fecha ingreso");
      return false;0
      2
       }

      if ( fechaSal22=="")
        {alert("falta fecha salida");
      return false;
       }
       fsp=fechaIng22.split('-');
      fechaing3= fsp[2]+'-'+fsp[1]+'-'+fsp[0];
     
      fsp2=fechaSal22.split('-');
      fechaing4= fsp2[2]+'-'+fsp2[1]+'-'+fsp2[0];
         // window.location=baseurl+'/buscar/'+Url+'?from='+fechaIng2+'&to='+fechaSal2;
         window.location='http://www.e-agencias.com.ar/reservasonline/search/hotel/AFA/'+fechaing3+'/'+fechaing4+'/'+personas;

  });
//TABS ---------------------------------------------->
 $(  "#tabs"  ).tabs();


//MOSANARY 

var $container = $('#cont_alojar').isotope({
  // main isotope options
  itemSelector: '.item-alojar',
  layoutMode: 'masonry',
  // options for cellsByRow layout mode
  cellsByRow: {
    columnWidth: 250,
    rowHeight: 200
  },
  // options for masonry layout mode
  masonry: {
    columnWidth: 2
  }
});
$("#btn-filtros button").on('click', function(){

      var filterValue = $( this ).attr('data-filter');
   
    $container.isotope({ filter: filterValue });
});
//CARUSELL AGENDA 
   $("#carusel").smoothDivScroll({ 
            mousewheelScrolling: "allDirections",
            manualContinuousScrolling: false,
            autoScrollingMode: "",
            visibleHotSpotBackgrounds: "always"
        });

   //CARUSEL CIRCUITOS
   $("#caruselcirc").smoothDivScroll({ 
            mousewheelScrolling: "allDirections",
            manualContinuousScrolling: true,
            autoScrollingMode:  "onStart",
            visibleHotSpotBackgrounds: "always"
        });

base_url = $("input#baseurl").val();
 
var flashvars = {};
       var params = {};
        var params2 = {};
       var attributes = {};
       params.wmode = "opaque";
 params2.wmode = "opaque";
 swfobject.embedSWF(base_url+"swf/saint-bernard.swf", "saintbernard", "140", "240", "9.0.0","expressInstall.swf", flashvars,params,attributes);
 // swfobject.embedSWF(base_url+"swf/demartis.swf", "demartis", "140", "240", "9.0.0","expressInstall.swf", flashvars,params,attributes);
 // swfobject.embedSWF(base_url+"swf/solypaz.swf", "solypaz", "140", "240", "9.0.0","expressInstall.swf", flashvars,params2,attributes);
 

  swfobject.embedSWF(base_url+"swf/hnm.swf", "hnm", "250", "250", "9.0.0","expressInstall.swf", flashvars,params,attributes);

});

  