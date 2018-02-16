<?php

class Alojamientos_servicios_user_model extends CI_Model
{

    const tabla    = 'alojamientos_servicios';
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

    function find_id_alojamiento_inner_servicios($id_alojamientos)
    {
        $query = sprintf("
        select 
        servicios.ID_Servicio,
        Servicio 
        from servicios 
        inner join 
        alojamientos_servicios 
        on 
        servicios.ID_Servicio = alojamientos_servicios.ID_Servicio 
        where 
        ID_Alojamiento =%s", $id_alojamientos);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    function insert_alojamientos_servicios($id_alojamientos, $id_servicios)
    {
        $query = sprintf("insert 
                          into 
                          alojamientos_servicios 
                          (ID_Alojamiento, ID_Servicio) 
                          values 
                          (%s,%s)", $id_alojamientos, $id_servicios);
        $this->db->query($query);
    }

    function delete_alojamientos_servicios($id_alojamiento)
    {
        $query = sprintf("delete from alojamientos_servicios where ID_Alojamiento=%s", $id_alojamiento);
        $this->db->query($query);
    }

}

?>
