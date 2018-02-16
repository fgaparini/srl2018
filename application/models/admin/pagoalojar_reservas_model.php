<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pagoalojar_reservas_model extends CI_Model
{

    const tabla    = "pagoalojar_reservas";
    const id_tabla = "ID_PagoAlojar_Reserva";

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
    
    function pagos_reservas($id_pagoalojar)
    {
        $query=sprintf("select * from pagoalojar_reservas where ID_PagoAlojar=%s",$id_pagoalojar);
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }

}

?>
