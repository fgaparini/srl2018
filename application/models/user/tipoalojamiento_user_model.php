<?php

class Tipoalojamiento_user_model extends CI_Model
{

    const tabla    = 'tipoalojamiento';
    const id_tabla = 'ID_TipoAlojamiento';

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

    //---------------------------------------- SE UTILIZA PARA GUARDAR LAS CORDENADAS EN INFORMACION GENERL 
    function alojamiento_ubicacion_update($id_alojamiento, $coordenadas)
    {
        $query = sprintf("select ID_InformacionGeneral from alojamientos where ID_Alojamiento=%s", $id_alojamiento);
        $row   = $this->db->query($query);
        $row   = $row->row();


        $query = sprintf('update informaciongeneral set Coordenadas="%s" where ID_InformacionGeneral=%s', $coordenadas, $id_alojamiento);

        $this->db->query($query);
    }

}

?>
