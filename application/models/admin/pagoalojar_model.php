<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pagoalojar_model extends CI_Model
{

    const tabla    = "pagoalojar";
    const id_tabla = "ID_PagoAlojar";

    function insert($row = array())
    {
        $this->db->insert(self::tabla, $row);
        return $this->db->insert_id();
    }

    function update($id, $row = array())
    {
        $this->db->where(self::id_tabla, $id);
        $this->db->update(self::tabla, $row);
    }

    function find($id)
    {
        $this->db->where(self::id_tabla, $id);
        $rows = $this->db->get(self::tabla);
        return $rows;
    }

    function delete($id)
    {
        $this->db->where(self::id_tabla, $id);
        $this->db->delete(self::tabla);
    }
    
    function pagos_alojamientos($id_alojamiento)
    {
        $query=sprintf("select * from pagoalojar where ID_Alojamiento=%s",$id_alojamiento);
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }

}

?>
