<?php

class Alojamientos_imagenes_user_model extends CI_Model
{

    const tabla    = 'alojamientos_imagenes';
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

    function find_from_id_alo($id_alojamiento)
    {
        $query = sprintf("select * from alojamientos_imagenes where ID_Alojamiento=%s", $id_alojamiento);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }
    
        function images_save($id_alojamiento, $nombre_imagen)
    {
        $query = sprintf("insert into alojamientos_imagenes (ID_Alojamiento,NombreImagen) values (%s,%s)", $id_alojamiento, $nombre_imagen);
        $this->db->query($query);
    }

    function images_delete($id_alojamiento)
    {
        $query = sprintf("delete from alojamientos_imagenes where ID_Alojamiento=%s", $id_alojamiento);
        $this->db->query($query);
    }

    function images_delete_nombre_imagen($id_alojamiento, $nombre_foto)
    {
        $query = sprintf("delete from alojamientos_imagenes where ID_Alojamiento=%s and NombreImagen=%s", $id_alojamiento, $nombre_foto);
        $this->db->query($query);
    }

    function images_count($id_alojamiento)
    {
        $query = sprintf("select MAX(NombreImagen) as count from alojamientos_imagenes where ID_Alojamiento=%s", $id_alojamiento);
        $rows  = $this->db->query($query);
        $rows  = $rows->row();
        return $rows->count;
    }

}

?>
