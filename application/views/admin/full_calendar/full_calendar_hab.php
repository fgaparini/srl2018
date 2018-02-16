<!DOCTYPE html>
<html>
    <head>
        <script>

            $(document).ready(function() {
	
                base_url = $('#base_url').val();
                //Cuando cambia de habitacion 
                $('#hab_id').change(function(){
                    window.location.href=base_url+"admin/full_calendar/fullcalendar_hab/?ID_Alojamiento=<?php echo $ID_Alojamiento ?>&ID_Habitacion="+this.value ;
                });
        
        
                $('#calendar').fullCalendar({
		
                    editable: true,
			
                    events: "<?php echo base_url() ?>admin/full_calendar/json_hab/?ID_Alojamiento=<?php echo $ID_Alojamiento ?>&ID_Habitacion=<?php echo $ID_Habitacion ?>",
			
                    eventDrop: function(event, delta) {
                        alert(event.title + ' was moved ' + delta + ' days\n' +
                            '(should probably update your database)');
                    },
			
                    loading: function(bool) {
                        if (bool) $('#loading').show();
                        else $('#loading').hide();
                    }
			
                });
		
            });

        </script>
        <style>

            body {
                margin-top: 40px;
                text-align: center;
                font-size: 14px;
                font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            }

            #calendar {
                width: 900px;
                margin: 0 auto;
            }

        </style>
    </head>
    <body>
        <p>Habitaciones:</p>
        <select id="hab_id">
            <option <?php echo $this->gf->comparar_general("",$ID_Habitacion,'selected') ?> value="0">Seleccione...</option>
            <?php foreach ($hab_array as $var): ?>
                <option <?php echo $this->gf->comparar_general($var['ID_Habitacion'],$ID_Habitacion,'selected') ?> value="<?php echo $var['ID_Habitacion'] ?>"><?php echo $var['NombreHab'] . " (" . $var['TipoHabitacion'] . ")" ?></option>
            <?php endforeach; ?>
        </select>
        <div id='calendar'></div>
        <input type="hidden" value="<?php echo base_url() ?>" id="base_url">
    </body>
</html>
