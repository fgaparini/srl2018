<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clientes_model extends CI_Model
{

    const tabla    = 'clientes';
    const id_tabla = 'ID_Cliente';

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

    //--------------------------- ENCONTRAR EL MAIL DEL CLIENTE-------------------------------------*/
    
    function mail_cliente_alojamiento($ID_Alojamiento)
    {
        $query=  sprintf("select 
                            NombreCliente, ApellidoCliente, EmailCliente
                        from
                            alojamientos_clientes ac
                                inner join
                            clientes c ON ac.ID_Cliente = c.ID_Cliente where ID_Alojamiento=%s;",$ID_Alojamiento);
        //Va a retornar una lista pero el ultimo del resultado sera el row que encuentre
        
        $row = $this->db->query($query);
        $row = $row->row_array();
        return $row;
        
    }

}

?>
