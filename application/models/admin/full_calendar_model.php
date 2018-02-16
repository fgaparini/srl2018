<?php

class Full_calendar_model extends CI_Model
{

    function habitaciones_alojamientos($ID_Alojamiento)
    {
        $query = sprintf("select 
                        *
                    from
                        alojamientos_habitaciones ah
                            inner join
                        habitaciones h ON ah.ID_Habitacion = h.ID_Habitacion
                            inner join
                        tipo_habitaciones th on h.ID_TipoHabitacion = th.ID_TipoHabitacion
                        where ah.ID_Alojamiento=%s", $ID_Alojamiento);

        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    function cal_calendario_data($ID_Alojamiento,$ID_Habitacion,$fecha_get)
    {
        $query = sprintf("select 
                            *
                        from
                            cal_calendario cc
                                inner join
                            alojamientos_habitaciones ah ON cc.id_habitacion = ah.ID_Habitacion
                        where
                            ah.ID_Alojamiento = %s and ah.ID_Habitacion=%s and cc.cant_disponible>0 and tarifa_normal>0  and cc.fecha>='%s';", $ID_Alojamiento, $ID_Habitacion, $fecha_get);

        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    function habitacion_find($ID_Alojamiento,$ID_Habitacion)
    {
        $query = sprintf("select * from alojamientos_habitaciones where ID_Alojamiento=%s AND ID_Habitacion=%s", $ID_Alojamiento, $ID_Habitacion);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

}

?>
