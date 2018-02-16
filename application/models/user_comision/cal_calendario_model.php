<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cal_Calendario_model extends CI_Model
{

    const tabla    = 'cal_calendario';
    const id_tabla = 'fecha';

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
        $query = sprintf("select * from %s", self::tabla);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    /* ------------------------ MODIFICAR UN REGISTRO----------------------------- */

    function update($id, $row = array())
    {
        $this->db->where(self::id_tabla, $id);
        $this->db->update(self::tabla, $row);
    }

    /* ------------------------ ELIMINAR UN REGISTRO------------------------------- */

    function delete($id)
    {
        $query = sprintf("delete from %s where %s=%s", self::tabla, self::id_tabla, $id);
        $this->db->query($query);
    }

    /* ------------------------ CONTAR RESULTADOS TRAIDOS------------------------------- */

    function count_all()
    {
        $query = sprintf("select count(*) as cantidad from %s", self::tabla);
        $row   = $this->db->query($query);
        $row   = $row->row_array();
        return $row['cantidad'];
    }

    /* ------------------------ CONTAR RESULTADOS TRAIDOS POR ID------------------------------- */

    function count_id($id)
    {
        $query = sprintf("select count(*) as cantidad from %s where %s=%s", self::tabla, self::id_tabla, $id);
        $row   = $this->db->query($query);
        $row   = $row->row_array();
        return $row['cantidad'];
    }

    function sum_total_diponibilidad($fecha_ingreso, $fecha_salida, $ID_Habitacion)
    {
        $query = sprintf("select 
                    sum(if(tarifa_oferta,
                        tarifa_oferta,
                        tarifa_normal)) as suma, 
                        min(cant_disponible) as cantidad
                from
                    cal_calendario
                where
                    fecha >= '%s'
                        and fecha < '%s'
                        and id_habitacion = %s;", $fecha_ingreso, $fecha_salida, $ID_Habitacion);


        $rows = $this->db->query($query);
        $rows = $rows->row_array();

        return $rows;
    }

    function list_fechas($fecha_ingreso, $fecha_salida,$id_habitacion)
    {
        $query = sprintf("select fecha,tarifa_normal,tarifa_oferta from cal_calendario where fecha>='%s' and fecha<'%s' and id_habitacion='%s'", $fecha_ingreso, $fecha_salida,$id_habitacion);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();

        return $rows;
    }

    function update_disponibilidad($fecha, $id_habitacion)
    {
        $query = sprintf("update cal_calendario set cant_disponible=0, cant_reservada=1 where fecha='%s' and id_habitacion=%s", $fecha, $id_habitacion);
        $this->db->query($query);
    }

    function fecha_rango($fecha_desde, $fecha_hasta)
    {
        $query = sprintf("select * from cal_fecha where fecha>='%s' and fecha<='%s'", $fecha_desde, $fecha_hasta);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    function dia_tarifa($fecha, $id_habitacion)
    {
        $query = sprintf("select * from cal_calendario where fecha='%s' and id_habitacion=%s", $fecha, $id_habitacion);
        $row   = $this->db->query($query);
        $row   = $row->row_array();
        return $row;
    }

    function dia_count($fecha, $id_habitacion)
    {
        $query = sprintf("select count(*) as cantidad from cal_calendario where fecha='%s' and id_habitacion=%s", $fecha, $id_habitacion);
        $row   = $this->db->query($query);
        $row   = $row->row_array();

        if ($row['cantidad'] > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function update_query($id_habitacion, $fecha, $normal, $oferta, $disponible)
    {

        if ($normal != '' || $oferta != '')
        {
                $query = "update cal_calendario set estado_bloqueo='A'";
          
            if($disponible!='')
            {
                 $query = $query . sprintf(", cant_disponible='%s'", $disponible);
            }

            if ($normal != '')
            {
                $query = $query . sprintf(", tarifa_normal='%s'", $normal);
            }
            if ($oferta != '')
            {
                $query = $query . sprintf(", tarifa_oferta='%s'", $oferta);
            }

            $query = $query . sprintf(" where fecha='%s' and id_habitacion=%s", $fecha, $id_habitacion);
            $this->db->query($query);
            return true;
        }
        else
        {
            return false;
        }
    }

    function cal_calendario_data($ID_Alojamiento, $ID_Habitacion, $fecha_get)
    {
        $query = sprintf("select 
                            *
                        from
                            cal_calendario cc
                                inner join
                            alojamientos_habitaciones ah ON cc.id_habitacion = ah.ID_Habitacion
                        where
                            ah.ID_Alojamiento = %s and ah.ID_Habitacion=%s and tarifa_normal>0  and cc.fecha>='%s';", $ID_Alojamiento, $ID_Habitacion, $fecha_get);

        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }

}

?>
