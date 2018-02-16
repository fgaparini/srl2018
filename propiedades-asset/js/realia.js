$(document).ready(function() {
	var baseurl= $('#baseurl').val();
    $(".property-filter input#buscar").click(function() {
        /* Act on the event */
    zona=0
    tipo=0;
    precio1=0;
    precio2=0;
    operacion=0;
    zona=$("select#zona").val();
    tipo=$("select#tipo").val();
    precio1=$("input#preciodesde").val();
    precio2=$("input#preciohasta").val();
    base_url=$('input#base_url').val();
    zona1=zona.replace(" ","-")
    operacion=$(".property-filter input[type='checkbox']:checked").val();
    if (operacion==undefined) {operacion=0};
if (precio1==null || precio1== 0 ) {precio1=0};
if (precio2==null || precio2== 0) {precio2=0};
window.location=base_url+"propiedadessrl/buscador/"+tipo+"/"+zona1+"/"+operacion+"/"+precio1+"/"+precio2;
    });

       $('select#order').change(function () {
            $('form.form-sort').submit();
        });

        $('select#filter').change(function () {
            $('form.form-sort').submit();
        });
$("#contactoprop").click(function() {

    a=$("input#baseurl").val(); 

    $("#contactoprop").ajaxStart(function() {
        $(this).html('<img src="'+a+'iconos/ajax-loader.gif" ><b> Enviando..</b>')
    }).ajaxStop(function() {
        $(this).html("Enviado");
    }
    );
    var b=$("input#nombre").val();
    if(""==b)return $("input#nombre").addClass("error"), $("input#nombre").val("Falta su Nombre"), $("input#nombre").focus(), !1;
   
    var e=$("input#email").val();
    if(""==e)return $("input#email").addClass("error"), $("input#email").val("Falta su Email"), $("input#email").focus(), !1;
  
    var f=$("textarea#consulta").val();
     if(""==e)return $("textarea#consulta").addClass("error"), $("textarea#consulta").val("Falta la consulta"), $("textarea#consulta").focus(), !1;
        var c=$("input#telefono").val();
    if(""==c)return $("input#telefono").addClass("error"), $("input#telefono").val("Falta su Telefono"), $("input#telefono").focus(), !1;
     var c=$("input#usuario").val();

     var g=$("input#emailprop").val();
     var idp=$("input#id_prop").val();

    var h= {
        nombre:b , email:e, telefono:c, emailprop:g,idprop:idp, consulta:f
    }
    ;
    $.ajax( {
        type:"POST", 
        url:a+"propiedadessrl/home/consultaprop", 
        data:h, 
        success:function() {
          $("#contactoprop").after('<p class="alert alert-success">Su consulta fue enviada. </p>')
    }

});
});





$("#registrarse").click(function() {

    a=$("input#baseurl").val(); 

    $("#registrarse").ajaxStart(function() {
        $(this).html('<img src="'+a+'iconos/ajax-loader.gif" ><b> registrando..</b>')
    }).ajaxStop(function() {
        $(this).html("");
    }
    );
    var b=$("input#nombre").val();
    if(""==b)return $("input#nombre").addClass("error"), $("input#nombre").val("Falta su Nombre"), $("input#nombre").focus(), !1;
   
    var e=$("input#email").val();
    if(""==e)return $("input#email").addClass("error"), $("input#email").val("Falta su Email"), $("input#email").focus(), !1;
    var f=$("input#telefono").val();
    if(""==f)return $("input#telefono").addClass("error"), $("input#telefono").val("Falta su Telefono"), $("input#telefono").focus(), !1;
     var c=$("input#usuario").val();
    if(""==c)return $("input#usuario").addClass("error"), $("input#usuario").val("Falta dia Llegada"), $("input#usuario").focus(), !1;
    var d=$("input#pass").val();
    if(""==d)return $("input#pass").addClass("error"), $("input#pass").val("Falta dia Salida"), $("input#pass").focus(), !1;
    var pl=$("input#plan").val();
   var r=$("input#web").val();
var s=$("input#dirrecion").val();
var t=$("input#particular").val();
  
    
    var h= {
        nombre:b , email:e, telefono:f, usuario:c, pass:d, plan:pl, web:r, direccion:s,particular:t
    }
    ;
    $.ajax( {
        type:"POST", 
        url:a+"propiedadessrl/home/registronew", 
        data:h, 
        success:function() {
          $("#registrofrom ").html('<h4 clas="bg-succes">Registro Completo</h4><p>Gracias por registrarse!.<br><br>Ingrese al panel de control para cargar sus propiedades.</p><a href="'+a+'propiedadessrl/login_user" class="btn btn-success">Loguearse</a>')
    }
    
});
});
	InitCarousel();
    InitPropertyCarousel();
	InitOffCanvasNavigation();

	InitChosen();
	InitEzmark();
	InitPriceSlider();
	InitImageSlider();
	InitAccordion();
	InitTabs();
    InitPalette();
        InitMap(baseurl);

});

function InitPalette() {
    console.log($.cookie('palette'));
    if ($.cookie('palette') == 'true') {
        $('.palette').addClass('open');
    }

    $('.palette .toggle a').on({
        click: function(e) {
            e.preventDefault();
            var palette = $(this).closest('.palette');

            if (palette.hasClass('open')) {
                palette.animate({'left': '-195'}, 500, function() {
                    palette.removeClass('open');
                });
                $.cookie('palette', false)
            } else {
                palette.animate({'left': '0'}, 500, function() {
                    palette.addClass('open');
                    $.cookie('palette', true);
                });
            }
        }
    });

    if ($.cookie('color-variant')) {
        var link = $('.palette').find('a.'+ $.cookie('color-variant'));
        var file = link.attr('href');
        var klass = link.attr('class');

        $('#color-variant').attr('href', file);
        $('body').addClass(klass);
    }

    if ($.cookie('pattern')) {
        $('body').addClass($.cookie('pattern'));
    }

    if ($.cookie('header')) {
        $('body').addClass($.cookie('header'));
    }

    $('.palette a').on({
        click: function(e) {
            e.preventDefault();

            // Colors
            if ($(this).closest('div').hasClass('colors')) {
                var file = $(this).attr('href');
                var klass = $(this).attr('class');
                $('#color-variant').attr('href', file);

                if (!$('body').hasClass(klass)) {
                    $('body').removeClass($.cookie('color-variant'));
                    $('body').addClass(klass);
                }
                $.cookie('color-variant', klass)
            }
            // Patterns
            else if ($(this).closest('div').hasClass('patterns')) {
                var klass = $(this).attr('class');

                if (!$('body').hasClass(klass)) {
                    $('body').removeClass($.cookie('pattern'));
                    $('body').addClass(klass);
                    $.cookie('pattern', klass);
                }
            }
            // Headers
            else if ($(this).closest('div').hasClass('headers')) {
                var klass = $(this).attr('class');

                if (!$('body').hasClass(klass)) {
                    $('body').removeClass($.cookie('header'));
                    $('body').addClass(klass);
                    $.cookie('header', klass);
                }
            }
        }
    });
    $('.palette .reset').on({
        click: function() {
            $('body').removeClass($.cookie('color-variant'));
            $('#color-variant').attr('href', null);
            $.removeCookie('color-variant');

            $('body').removeClass($.cookie('pattern'));
            $.removeCookie('pattern');

            $('body').removeClass($.cookie('header'));
            $.removeCookie('header');
        }
    })
}

function InitPropertyCarousel() {
    $('.carousel.property .content li img').on({
        click: function(e) {
            var src = $(this).attr('src');
            var img = $(this).closest('.carousel.property').find('.preview img');
            img.attr('src', src);
            $('.carousel.property .content li').each(function() {
                $(this).removeClass('active');
            });
            $(this).closest('li').addClass('active');
        }
    })
}

function InitTabs() {
	$('.tabs a').click(function (e) {
  		e.preventDefault();
  		$(this).tab('show');
	});
}

function InitImageSlider() {
	$('.iosSlider').iosSlider({
		desktopClickDrag: true,
		snapToChildren: true,
		infiniteSlider: true,
		navSlideSelector: '.slider .navigation li',
		onSlideComplete: function(args) {
			if(!args.slideChanged) return false;

			$(args.sliderObject).find('.slider-info').attr('style', '');

			$(args.currentSlideObject).find('.slider-info').animate({
				left: '15px',
				opacity: '.9'
			}, 'easeOutQuint');
		},
		onSliderLoaded: function(args) {
			$(args.sliderObject).find('.slider-info').attr('style', '');

			$(args.currentSlideObject).find('.slider-info').animate({
				left: '15px',
				opacity: '.9'
			}, 'easeOutQuint');
		},
		onSlideChange: function(args) {
			$('.slider .navigation li').removeClass('active');
			$('.slider .navigation li:eq(' + (args.currentSlideNumber - 1) + ')').addClass('active');
		},
		autoSlide: true,
		scrollbar: true,
		scrollbarContainer: '.sliderContainer .scrollbarContainer',
		scrollbarMargin: '0',
		scrollbarBorderRadius: '0',
		keyboardControls: true
	});
}

function InitAccordion() {
    $('.accordion').on('show', function (e) {
        $(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
    });

    $('.accordion').on('hide', function (e) {
        $(this).find('.accordion-toggle').not($(e.target)).removeClass('active');
    });
}

function InitPriceSlider() {
    $('.price-value .from').text(1000);
    jQuery('.price-value .from').currency({ region: 'ARS', thousands: ' ', decimal: ',', decimals: 0 });

    jQuery('.price-value .to').text(5000000);
    jQuery('.price-value .to').currency({ region: 'ARS', thousands: ' ', decimal: ',', decimals: 0 });

    $('.property-filter .price-slider').slider({
        range: true,
        min: 1000,
        max: 5000000,
        values: [1000, 5000000],
        slide: function(event, ui) {
            jQuery('.property-filter .price-from input').attr('value', ui.values[0]);
            jQuery('.property-filter .price-to input').attr('value', ui.values[1]);

            jQuery('.price-value .from').text(ui.values[0]);
            jQuery('.price-value .from').currency({ region: 'ARS', thousands: ' ', decimal: ',', decimals: 0 });

            jQuery('.price-value .to').text(ui.values[1]);
            jQuery('.price-value .to').currency({ region: 'ARS', thousands: ' ', decimal: ',', decimals: 0 });
        }
    });
}

function InitEzmark() {
	$('input[type="checkbox"]').ezMark();
	$('input[type="radio"]').ezMark();
}

function InitChosen() {
	$('select').chosen({
		disable_search_threshold: 10
	});
}

function InitOffCanvasNavigation() {
	$('#btn-nav').on({
		click: function() {
			$('body').toggleClass('nav-open');
		}
	})
}

function InitCarousel() {
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

	$('.carousel-wrapper .content ul').carouFredSel({
		scroll: {
			items: 1
		},
		auto: false,
		next: {
    		button: '.carousel-wrapper .carousel-next',
    		key: 'right'
		},
		prev: {
    		button: '.carousel-wrapper .carousel-prev',
    		key: 'left'
		}
	});
}

function LoadMapProperty(baseurl) {
    var locations = new Array(
        [34.01312,-118.496808]
    );
    var markers = new Array();
    var mapOptions = {
        center: new google.maps.LatLng(34.012044, -118.494458),
        zoom: 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
    };

    var map = new google.maps.Map(document.getElementById('property-map'), mapOptions);

    $.each(locations, function(index, location) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(location[0], location[1]),
            map: map,
            icon: baseurl+'/propiedades-asset/img/marker-transparent.png'
        });

        var myOptions = {
            content: '<div class="infobox"><div class="image"><img src="'+baseurl+'propiedades-asset/img/tmp/property-tiny-1.png" alt=""></div><div class="title"><a href="detail.html">1041 Fife Ave</a></div><div class="area"><span class="key">Area:</span><span class="value">200m<sup>2</sup></span></div><div class="price">â‚¬450 000.00</div><div class="link"><a href="detail.html">View more</a></div></div>',
            disableAutoPan: false,
            maxWidth: 0,
            pixelOffset: new google.maps.Size(-146, -190),
            zIndex: null,
            closeBoxURL: "",
            infoBoxClearance: new google.maps.Size(1, 1),
            position: new google.maps.LatLng(location[0], location[1]),
            isHidden: false,
            pane: "floatPane",
            enableEventPropagation: false
        };
        marker.infobox = new InfoBox(myOptions);
        marker.infobox.isOpen = false;

        var myOptions = {
            draggable: true,
            content: '<div class="marker"><div class="marker-inner"></div></div>',
            disableAutoPan: true,
            pixelOffset: new google.maps.Size(-21, -58),
            position: new google.maps.LatLng(location[0], location[1]),
            closeBoxURL: "",
            isHidden: false,
            // pane: "mapPane",
            enableEventPropagation: true
        };
        marker.marker = new InfoBox(myOptions);
        marker.marker.open(map, marker);
        markers.push(marker);

        google.maps.event.addListener(marker, "click", function (e) {
            var curMarker = this;

            $.each(markers, function (index, marker) {
                // if marker is not the clicked marker, close the marker
                if (marker !== curMarker) {
                    marker.infobox.close();
                    marker.infobox.isOpen = false;
                }
            });


            if(curMarker.infobox.isOpen === false) {
                curMarker.infobox.open(map, this);
                curMarker.infobox.isOpen = true;
                map.panTo(curMarker.getPosition());
            } else {
                curMarker.infobox.close();
                curMarker.infobox.isOpen = false;
            }

        });
    });
}

function ajaxlocation (baseurl)
{
    $.ajax({
                  type: 'POST',
                 
                  url: baseurl + 'propiedadessrl/home/propmap',
                 // beforeSend: function(x) {
                 //         if(x && x.overrideMimeType) {
                 //          x.overrideMimeType("application/json;charset=UTF-8");
                 //        }},
                  success: function(data){

                   var json2 = jQuery.parseJSON(data);
                   
         
                      
                         var locationsss = new Array(
        [34.01843,-118.491046], [34.006673,-118.486562]
    );
                      var location_json= [];

                      $.each(json2, function(index, val) {
                        location_json.push(val);
                                        });
                   
           

                       LoadMap(baseurl,location_json);
             }
                  
                  });

}

function LoadMap(baseurl,locationJS) {
	

	var locations = locationJS;
    var coord3 = locations[1]['Coordenadas'].split(",");
        

	var markers = new Array();
	var mapOptions = {
		center: new google.maps.LatLng(coord3[0],coord3[1]),
		zoom: 14,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false
    };

    var map = new google.maps.Map(document.getElementById('map'), mapOptions);

    $.each(locations, function(index, location) {
      
        coord = location['Coordenadas'].split(",");
        urlprop = location['Titulo'].replace(/\s/g,'-')+'.html';
        if (location['Moneda']==="pesos") {
            moneda="$";
        }else{moneda="U$S"};
         
   
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(coord[0],coord[1]),
            map: map,
            icon: baseurl+'propiedades-asset/img/marker-transparent.png'
        });

	    var myOptions = {
	        content: '<div class="infobox"><div class="image"><img src="'+baseurl+'upload/propiedades/thumb/'+location['ID_Propiedades']+'_1.jpg" alt=""></div><div class="title"><a href="'+baseurl+'propiedadessrl/propiedad/'+urlprop+'">'+location['Direccion']+'</a></div><div class="area"><span class="key">Area:</span><span class="value">'+location['Superficie']+'<sup>2</sup></span></div><div class="price">'+moneda+' '+location['Precio']+'</div><div class="link"><a href="'+baseurl+'propiedadessrl/propiedad/'+urlprop+'">Ampliar</a></div></div>',
	        disableAutoPan: false,
	        maxWidth: 0,
	        pixelOffset: new google.maps.Size(-146, -190),
	        zIndex: null,
	        closeBoxURL: "",
	        infoBoxClearance: new google.maps.Size(1, 1),
	        position: new google.maps.LatLng('"'+location+'"'),
	        isHidden: false,
	        pane: "floatPane",
	        enableEventPropagation: false
	    };
	    marker.infobox = new InfoBox(myOptions);
		marker.infobox.isOpen = false;

	    var myOptions = {
	        draggable: true,
			content: '<div class="marker"><div class="marker-inner"></div></div>',
			disableAutoPan: true,
			pixelOffset: new google.maps.Size(-21, -58),
			position: new google.maps.LatLng('"'+location+'"'),
			closeBoxURL: "",
			isHidden: false,
			// pane: "mapPane",
			enableEventPropagation: true
	    };
	    marker.marker = new InfoBox(myOptions);
		marker.marker.open(map, marker);
		markers.push(marker);

        google.maps.event.addListener(marker, "click", function (e) {
            var curMarker = this;

            $.each(markers, function (index, marker) {
                // if marker is not the clicked marker, close the marker
                if (marker !== curMarker) {
                    marker.infobox.close();
                    marker.infobox.isOpen = false;
                }
            });


            if(curMarker.infobox.isOpen === false) {
                curMarker.infobox.open(map, this);
                curMarker.infobox.isOpen = true;
                map.panTo(curMarker.getPosition());
            } else {
                curMarker.infobox.close();
                curMarker.infobox.isOpen = false;
            }

        });
    });
}

function InitMap(baseurl) {
       page= $('input#page').val();
    if (page==="home") {
	google.maps.event.addDomListener(window, 'load', ajaxlocation(baseurl));
 };
}