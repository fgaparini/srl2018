
$(document).ready(function() {
    
    crear_calendario();
    $('#ID_Habitacion').change(function(e){
        crear_calendario();
    });
    
    $('#mes').change(function(e){
        drawChart();
    });
    
});


//$('#chart_div').html('');

google.load("visualization", "1", {
    packages:["corechart"]
});
google.setOnLoadCallback(drawChart);

function drawChart() {
         
    base_url = $('#base_url').val();
    ID_Habitacion = $('#ID_Habitacion').val();
    ID_Alojamiento = $('#ID_Alojamiento').val();
    mes = $('#mes').val();
    ano = $('#ano').val();
    //AJAX
    $.ajax({
        url: base_url+"users_comision/dash_comision/ajax_diagrama/?ID_Alojamiento="+ID_Alojamiento+"&ID_Habitacion="+ID_Habitacion+"&mes="+mes+"&ano="+ano,
        type: 'GET',
        dataType: "json",
        success: function(msg) {            
                           
            ocu = parseInt(msg.ocupado);
            deso = parseInt(msg.libre);
                           
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Ocupacion mes actual'],
                ['ocupado', ocu],
                ['desocupado', deso],
                ]);

            var options = {
                title: 'Ocupacion de alojamientos',
                slices: [{
                    color:'#b6d163'
                },{
                    color:'#ccc'
                }]
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
                            
        }
    })		
               
}
        
    
function crear_calendario()
{
    $('#calendar').html('');
    
    ID_Habitacion = $('#ID_Habitacion').val();
    ID_Alojamiento = $('#ID_Alojamiento').val();
    var base_url = $('#base_url').val();
    
    $('#calendar').fullCalendar({
		
        editable: true,
			
        events: base_url+"users_comision/dash_comision/ajax_reservas_calendario/?ID_Alojamiento="+ID_Alojamiento+"&ID_Habitacion="+ID_Habitacion,
			
        eventDrop: function(event, delta) {
            alert(event.title + ' was moved ' + delta + ' days\n' +
                '(should probably update your database)');
        },
			
        loading: function(bool) {
            if (bool) $('#loading').show();
            else $('#loading').hide();
        },
        eventClick: function(calEvent, jsEvent, view) {
          
          alert(calEvent.id);
          
         $.colorbox({
               iframe:true, 
               width:"80%", 
               height:"80%",
               href: base_url+'/users_comision/dash_comision/fancy_dash_comision/?id_reserva='+calEvent.id
            
             
           });
        }
        
        
			
    });
}





