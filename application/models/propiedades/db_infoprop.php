<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Db_infoprop extends CI_Model
{
 public function __construct()
    {
        parent::__construct();
         $this->db_prop = $this->load->database('propiedades', TRUE);
    }
    const tabla    = 'informacionprop';
    const id_tabla = 'ID_informacionProp';

    /* ------------------------ INSERTAR EN LA BASE DE DATOS----------------------- */

    function insert($row = array())
    {
        $this->db_prop->insert(self::tabla, $row);
        return $this->db_prop->insert_id();
    }

    /* ------------------------ BUSCAR POR ID-------------------------------------- */

    function find($id)
    {
        $query = sprintf("select * from %s where %s=%s", self::tabla, self::id_tabla, $id);
        $row   = $this->db_prop->query($query);
        $row   = $row->row_array();
        return $row;
    }

    /* ------------------------ LISTADO BASICO TODOS LOS ELEMENTOS------------------------ */

    function find_all()
    {
        $query = sprintf("select * from %s order by RAND()", self::tabla);
        $rows  = $this->db_prop->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    /* ------------------------ MODIFICAR UN REGISTRO----------------------------- */

    function update($id, $row = array())
    {
        $this->db_prop->where(self::id_tabla, $id);
        $this->db_prop->update(self::tabla, $row);
    }

    /* ------------------------ ELIMINAR UN REGISTRO------------------------------- */

    function delete($id)
    {
        $query = sprintf("delete from %s where %s=%s", self::tabla, self::id_tabla, $id);
        $this->db_prop->query($query);
    }

    /* ------------------------ CONTAR RESULTADOS TRAIDOS------------------------------- */

    function count_all()
    {
        $query = sprintf("select count(*) as cantidad from %s", self::tabla);
        $row   = $this->db_prop->query($query);
        $row   = $row->row_array();
        return $row['cantidad'];
    }


}
?>
