$(function() {
    var f = $("input#baseurl").val();
    $("#from").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: !0,
        numberOfMonths: 1,
        onClose: function(b) {
            $("#to").datepicker("option", "minDate", b), $("#to").focus();
        }
    });
    $("#to").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: !0,
        numberOfMonths: 1,
        onClose: function(b) {
            $("#from").datepicker("option", "maxDate", b);
        }
    });
    $("#frombook").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: !0,
        numberOfMonths: 1,
        onClose: function(b) {
            $("#tobook").datepicker("option", "minDate", b), $("#tobook").focus();
        }
    });
    $("#tobook").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: !0,
        numberOfMonths: 1,
        onClose: function(b) {
            $("#frombook").datepicker("option", "maxDate", b);
        }
    });
    $("#fromEM").datepicker({
        dateFormat: "dd/mm/yy",
        monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        dayNames: ["Domingo", "Lunes", "Martes", "Mi\xe9rcoles", "Jueves", "Viernes", "S\xe1bado"],
        dayNamesShort: ["Dom", "Lun", "Mar", "Mi\xe9", "Juv", "Vie", "S\xe1b"],
        dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "S\xe1"],
        changeMonth: !0,
        numberOfMonths: 1,
        onClose: function(b) {
            $("#toEM").datepicker("option", "minDate", b);
        }
    }), $("#toEM").datepicker({
        dateFormat: "dd/mm/yy",
        monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        dayNames: ["Domingo", "Lunes", "Martes", "Mi\xe9rcoles", "Jueves", "Viernes", "S\xe1bado"],
        dayNamesShort: ["Dom", "Lun", "Mar", "Mi\xe9", "Juv", "Vie", "S\xe1b"],
        dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "S\xe1"],
        changeMonth: !0,
        numberOfMonths: 1,
        onClose: function(b) {
            $("#fromEM").datepicker("option", "maxDate", b);
        }
    }), $("a.tooltip").click(function(b) {
        b.preventDefault();
    });
    var e = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "diciembre"],
        h = ["domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
        g = new Date;
    g.setDate(g.getDate()), $("#Date").html(h[g.getDay()] + " " + g.getDate() + " " + e[g.getMonth()] + " " + g.getFullYear()), setInterval(function() {
        var b = (new Date).getSeconds();
        $("#sec").html((10 > b ? "0" : "") + b);
    }, 1000), setInterval(function() {
        var b = (new Date).getMinutes();
        $("#min").html((10 > b ? "0" : "") + b);
    }, 1000), setInterval(function() {
        var b = (new Date).getHours();
        $("#hours").html((10 > b ? "0" : "") + b);
    }, 1000),

     $(".submenu").css({
        display: "none"
    }),
     $("#menu2 li:has(div.submenu)").hover(function() {
        $(this).find("div").show();
    }, function() {
        $(this).find("div").hide();
    }), $(window).scroll(function() {
        $(this).scrollTop() >= 80 ? $("#menu2").addClass("fixed") : $("#menu2").removeClass("fixed");
    }), $(".imagico").click(function() {
        var b = $(this).attr("rel");
        window.open("http://" + b, "_blank");
    }), $("#enviar").click(function() {
        f = $("input#baseurl").val(), $("#enviar").ajaxStart(function() {
            $(this).html('<img src="' + f + 'iconos/ajax-loader.gif" ><b> Enviando..</b>');
        }).ajaxStop(function() {
            $(this).html("Enviar");
        });
        var a = $("input#name").val();
        if ("" == a) {
            return $("input#name").addClass("error"), $("input#name").val("Falta su Nombre"), $("input#name").focus(), !1;
        }
        var n = $("input#from").val();
        if ("" == n) {
            return $("input#from").addClass("error"), $("input#from").val("Falta dia Llegada"), $("input#from").focus(), !1;
        }
        var m = $("input#to").val();
        if ("" == m) {
            return $("input#to").addClass("error"), $("input#to").val("Falta dia Salida"), $("input#to").focus(), !1;
        }
        var l = $("input#email").val();
        if ("" == l) {
            return $("input#email").addClass("error"), $("input#email").val("Falta su Email"), $("input#email").focus(), !1;
        }
        var k = $("input#telefono").val();
        if ("" == k) {
            return $("input#telefono").addClass("error"), $("input#telefono").val("Falta su Telefono"), $("input#telefono").focus(), !1;
        }
        var j = $("textarea#consulta").val();
        if ("" == j) {
            return $("textarea#consulta").addClass("error"), $("textarea#consulta").focus(), !1;
        }
        ides = $("input#id").val(), email_A = $("input#email_A").val(), tipo_ae = $("input#tipo_ae").val(), name_ae = $("input#name_ae").val();
        var i = {
            name: a,
            from: n,
            to: m,
            email: l,
            telefono: k,
            consulta: j,
            id: ides,
            email_A: email_A,
            tipo_ae: tipo_ae,
            name_ae: name_ae
        };
        $.ajax({
            type: "POST",
            url: f + "website/ajaxs/envioemail/",
            data: i,
            success: function() {
                $("#consultaF").append('<div id="enviado" class="border-Corner" aling="center"><div class="text"><p class="exito"><b>Su Consulta fue enviada con Exito!!</b></p><p>Gracias por contactarnos. En breve nos comunicaremos con Ud.</p></dvi><div></div class="buttonreset"><button type="button" id="reset">Nueva Consulta</button></div></div>');
            }
        });
    }), $("input#Place").click(function() {
        $(this).is(":checked") ? $(".placediv").show() : $(".placediv").hide();
    }), $("#reset").live("click", function() {
        $("#enviado").hide(), $("#enviado").html(), $("form#formA").each(function() {
            this.reset();
        });
    }), $(".videoheader").click(function() {
        return $.fancybox({
            padding: 0,
            autoScale: !1,
            transitionIn: "none",
            transitionOut: "none",
            title: this.title,
            width: 680,
            height: 495,
            href: this.href.replace(new RegExp("watch\\?v=", "i"), "v/"),
            type: "swf",
            swf: {
                wmode: "transparent",
                allowfullscreen: "true"
            }
        }), !1;
    }), $(".femail").fancybox({
        maxWidth: 500,
        maxHeight: 600,
        fitToView: !1,
        width: "50%",
        height: "50%",
        autoSize: !1,
        closeClick: !1,
        openEffect: "none",
        closeEffect: "none"
    }), $(".urllink").click(function() {
        url = $(this).attr("href"), window.open(url, "_blank");
    }), $("#bookingcom1 button,#bookingcom2 button").click(function(a) {
        baseurl = $("#base_url").val();
        idAlojar = $("#id").val();
        from = $("#frombook").val();
        to = $("#tobook").val();
        if (from == "" || from == "Falta Fecha") {
            return ($("#frombook").val("Falta Fecha"), $("#frombook").addClass("errorbook"));
        }
        url_booking = $("#UrlBooking").val();
        window.open(url_booking + "&checkin=" + from + "&checkout=" + to + "&do_availability_check=on", "_blank");
    });
    $("")
});