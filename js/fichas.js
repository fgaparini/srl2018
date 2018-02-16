 $(function() {

//TABS ---------------------------------------------->
 $(  "#ficha-tabs"  ).tabs();
 $(  "#ficha-tabs2"  ).tabs();

//LLAMAR A MAPA

 //<![CDATA[

  // Inicialización de variables.
    var map      = null;
    var coord    = String($("input#cordeMap").val());
    var coord2 =coord.split(',');
    function initialize() {  
   
  var map;  
  

  var myOptions = {
      zoom: 13,
  
    center: new google.maps.LatLng(coord2[0],coord2[1]),
      mapTypeId: google.maps.MapTypeId.HYBRID,
      mapTypeControl: true,
         mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    },
    zoomControl: true,
    zoomControlOptions: {
      style: google.maps.ZoomControlStyle.SMALL
    },
      scaleControl: true
    
    }
    var map = new google.maps.Map(document.getElementById("map"),
                                  myOptions);
                  
  
  var image = 'http://sanrafaellate.com.ar/iconos/hotel_map.png';
  var myLatLng = new google.maps.LatLng(coord2[0],coord2[1]);
  var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: image
  });
  
  }
$('#mapaAlojar').click(function()
{
	
	initialize();
});


 });
 
