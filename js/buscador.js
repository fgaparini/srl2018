  $(function() 
{
   $(".oculto").hide();
      var fechaIng=$('#Busca-Busca  input#from').val();
      var fechaSal=$('#Busca-Busca  input#to').val();
      var baseurl=$('#Busca-Busca  input#baseurl').val();

    $('#Busca-Busca .buttondiv button').click( function()
    {
       var Url=$('#Busca-Busca  select#tipo').val();
      var fechaIng2=$('#Busca-Busca  input#from').val();
      var fechaSal2=$('#Busca-Busca  input#to').val();
         window.location=baseurl+'buscar/'+Url+'?from='+fechaIng2+'&to='+fechaSal2;

    });

    $('.list_B').click(function() 
    {
        tipoA=$(this).attr('rel');
        if (tipoA=="reserva") 
        {
          ID_A=$(this).attr('id');
          window.location=baseurl+'buscar/detalle/'+ID_A+'/'+fechaIng+'/'+fechaSal;
        } else 
        {
          ID_A=$(this).attr('id');
          window.location=baseurl+'alojamiento/'+ID_A;
        }

    });
    $("#filtrob").change(function() 
    {
     
      idr=$(this).val();
      if (idr==="reserva") {
      $("#buscaRight").find('.list_B[rel=reserva]').hide();
       $("#buscaRight").find('.list_B[rel=comun]').show();
      }
      if (idr==="comun") {
       $("#buscaRight").find('.list_B[rel=reserva]').show();
       $("#buscaRight").find('.list_B[rel=comun]').hide();
      }
      if (idr==="todos") {
         $("#buscaRight").find('.list_B[rel=reserva]').show();
       $("#buscaRight").find('.list_B[rel=comun]').show();
      };
    });

 $('.list_B price button.selectA').click(function() 
    {
        
          ID_A=$(this).attr('id');
          window.location=baseurl+'buscar/detalle/'+ID_A+'/'+fechaIng+'/'+fechaSal;
        

    });
 $('.list_B price button.consulta').click(function() 
    {
        
         ID_A=$(this).attr('id');
          window.location=baseurl+'alojamiento/'+ID_A;
        

    });
 

 $(".calcularhab").change(function () 
 {      total=0;
      num_hab=$('#cantidad_hab').val();
  for (var i = 0; i < num_hab; i++) 
   {

     total=$('#tarifa_hab_'+i).val()*$('#cant_hab_'+i).val()+total;

        idhab= $('#cant_hab_'+i).attr('rel');
        //determono que habitaciones estan seleccionadas
        if ($('#cant_hab_'+i).val()>0) 
          {
            $('#idhab_'+i).val(idhab);
          } else 
          {
            $('#idhab_'+idhab).val("");
          }

        //Muestro Total reserva y botones
        if (i==num_hab-1)
          {
            $('#totalhab').html("$"+total);
            $('#totalreseva').val(total);
            if(total>0)
            {
                $('#reservarB').show();
                  $('#totalhab').show();
                $('#selecthab').hide();
            } else
            { 
                $('#reservarB').hide();
                   $('#totalhab').hide();
                $('#selecthab').show();
            }
          }
   };
         
 });
  // CAMBIAR ESTADIA
  $('#cambiar_estadia').click(function ()
  {
      baseurl=$('#baseurl').val();
      fromes=$('#from').val();// fecha ingreso 
      toes=$('#to').val();// fecha salida
      idalojar=$('#idalojar').val();//id alojar
      window.location=baseurl+'buscar/detalle/'+idalojar+'/'+fromes+'/'+toes;

  })

    $('#reservarhab').click(function()
    {
        //numero de habitacion
        num_hab2=$('#cantidad_hab').val();
        idalojar=$('#idalojar').val();//id alojar
        fromes=$('#fromes').val();// fecha ingreso 
        toes=$('#toes').val();// fecha salida
        baseurl=$('#baseurl').val();
        totalreservar=$('#totalreseva').val();
        // defino arrays
          var tarifahabs= new Array();
          var canthabs= new Array();
          var idshabs= new Array();
    for (var i = 0; i < num_hab2; i++) 
   {
        // cargo datos en arrays
        tarifahabs.push($('#tarifa_hab_'+i).val());
        canthabs.push($('#cant_hab_'+i).val());
        idshabs.push($('#idhab_'+i).val());

   }
   //convierto Arrays en cadena con ,
   tarifahabs_c=tarifahabs.join(',');
   canthabs_c=canthabs.join(',');
   idshabs_c=idshabs.join(',');

 window.location=baseurl+'buscar/reservar/?idalojar='+idalojar+'&from='+fromes+'&to='+toes+'&tarifashab='+tarifahabs_c+'&cant_hab='+canthabs_c+'&idhabs='+idshabs_c+'&totalreserva='+totalreservar;
        

    });

  $('#fromapago').change(function ()
  {
        id=$(this).val();
       
        $('.visible').hide().removeClass("visible");
        $('#'+id).show().addClass("visible");
        
  })
});

  