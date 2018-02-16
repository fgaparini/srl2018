<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class alojamientos_habitaciones_model extends CI_Model
{

    const tabla    = 'alojamientos_habitaciones';
    const id_tabla = 'ID_Alojamiento';

    /* ------------------------ INSERTAR EN LA BASE DE DATOS----------------------- */

    function insert($row = array())
    {
        $this->db->insert(self::tabla, $row);
        return $this->db->insert_id();
    }

    /* ------------------------ BUSCAR POR ID-------------------------------------- */

    function find($id)
    {
        $query = sprintf("select * from %s where %s=%s", self::tabla, self::id_tabla, $id);
        $row   = $this->db->query($query);
        $row   = $row->row_array();
        return $row;
    }

    /* ------------------------ LISTAR TODOS LOS ELEMENTOS------------------------ */

    function find_all()
    {
        $query = sprintf("select * from %s ", self::tabla);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    /*-----------------------------LISTAR LAS HABITACIONES DE UN ALOJAMIENTO UNIDO CON HABITACIONES PARA EXTRAER DATOS------ */
    
    function habitaciones_alojamiento($ID_Alojamiento)
    {
        $query=sprintf("select 
                        h.ID_Habitacion,
                            h.NombreHab
                    from
                        alojamientos_habitaciones ah
                            inner join
                        habitaciones h ON ah.ID_Habitacion = h.ID_Habitacion where ah.ID_Alojamiento=%s;",$ID_Alojamiento);
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }

}

?>
