<?php

class Ciudades_user_model extends CI_Model
{

    const tabla = 'ciudades';
    const id_tabla = 'Location';

    /* ------------------------ INSERTAR EN LA BASE DE DATOS----------------------- */

    function insert($row = array())
    {
        $this->db->insert(self::tabla, $row);
        return $this->db->insert_id();
    }


    /* ------------------------ BUSCAR POR ID-------------------------------------- */

    function find($id)
    {
        $query = sprintf("select * from %s where %s=%s",self::tabla, self::id_tabla, $id);
        $row = $this->db->query($query);
        return $row;
    }

    
    /* ------------------------ LISTAR TODOS LOS ELEMENTOS------------------------ */

    function find_all()
    {

        $query =sprintf( "select * from %s",  self::tabla);
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
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

        $query = sprintf("delete from %s where %s=%s",self::tabla,  self::id_tabla, $id);
        $this->db->query($query);
    }
    
    //-------------------- ENCONTRAR POR PAIS Y PROVINCIA-------------------/
    function find_form_pais_provincia($pais, $provincia)
    {
        $query = sprintf("select * from ciudades where Country='%s' and Subdivision='%s'", $pais, $provincia);
        $array = $this->db->query($query);
        $array = $array->result_array();
        return $array;
    }
    
    
    
}

?>
