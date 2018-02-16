<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Huesped_model extends CI_Model
{

    const tabla    = 'huesped';
    const id_tabla = 'ID_Huesped';

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
        $query = sprintf("select * from %s order by ID_Huesped desc", self::tabla);
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

    function mail_huesped($id_huesped)
    {
        $query = sprintf("select EmailHuesped, ApellidoHuesped, NombreHuesped from huesped where ID_Huesped=%s", $id_huesped);
        $row   = $this->db->query($query);
        $row   = $row->row_array();
        return $row;
    }

    function update_estado($EstadoHuesped, $ID_Huesped)
    {
        $query = sprintf("update huesped set EstadoHuesped='%s' where ID_Huesped=%s", $EstadoHuesped, $ID_Huesped);
        $this->db->query($query);
        return true;
    }

    function huesped_filtro($NombreHuesped, $ApellidoHuesped, $start, $end)
    {
        $where = "";

        $select_count = " select 
                        count(h.ID_Huesped) as cantidad         
                        from 
                        huesped as h
                    ";

        $select = "select
                    *
                   from
                   huesped
                ";

        //Si no viene nada no pongo where
        if ($NombreHuesped == "" && $ApellidoHuesped == "")
            $where = "";
        else
            $where = " where";

        $arg = "";

        if ($NombreHuesped != "")
        {
            $arg = " NombreHuesped like '%" . $NombreHuesped . "%'";
        }
        if ($ApellidoHuesped != "")
        {
            if ($arg != "")
                $arg = $arg . " and ApellidoHuesped like '%" . $ApellidoHuesped . "%'";
            else
                $arg = " ApellidoHuesped like '%" . $ApellidoHuesped . "%'";
        }


        $order = " order by ID_Huesped desc";
        $litmit = " limit " . $start . "," . $end . "";


        $query_final       = $select . $where . $arg . $order . $litmit;
        $query_final_count = $select_count . $where . $arg;

        $row_count   = $this->db->query($query_final_count);
        $row_count   = $row_count->row();
        $total_count = $row_count->cantidad;

        $rows = $this->db->query($query_final);
        $rows = $rows->result_array();

        $array_return = array(
            'total_count' => $total_count,
            'rows'        => $rows
        );

        return $array_return;
    }

    function huesped_filtro_fancy($NombreHuesped, $ApellidoHuesped)
    {
        $where  = "";
        $select = "select
                    *
                   from
                   huesped
                ";

        //Si no viene nada no pongo where
        if ($NombreHuesped == "" && $ApellidoHuesped == "")
            $where = "";
        else
            $where = " where";

        $arg = "";

        if ($NombreHuesped != "")
        {
            $arg = " NombreHuesped like '%" . $NombreHuesped . "%'";
        }
        if ($ApellidoHuesped != "")
        {
            if ($arg != "")
                $arg = $arg . " and ApellidoHuesped like '%" . $ApellidoHuesped . "%'";
            else
                $arg = " ApellidoHuesped like '%" . $ApellidoHuesped . "%'";
        }

        $order       = " order by ID_Huesped desc";
        $query_final = $select . $where . $arg . $order;
        $rows        = $this->db->query($query_final);
        $rows        = $rows->result_array();

        return $rows;
    }

}

?>
