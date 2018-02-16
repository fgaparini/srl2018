<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promociones_model extends CI_Model
{

    const tabla    = 'promociones';
    const id_tabla = 'ID_Promocion';

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
    
    //--------------------------- Listar promociones inner alojamientos y informaciongeneral
    
    function list_inner_alojamiento($ID_Alojamiento)
    {
        $query=sprintf("select 
                p.ID_Promocion, p.NombrePromo, p.DetallePromo, p.DesdePromo, p.HastaPromo, i.Nombre as NombreAlojamiento
            from
                promociones p
                    inner join
                alojamientos a ON p.ID_Alojamiento = a.ID_Alojamiento
                            inner join
                    informaciongeneral i on a.ID_InformacionGeneral = i.ID_InformacionGeneral where a.ID_Alojamiento=%s;",$ID_Alojamiento);
        
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }


}

?>
