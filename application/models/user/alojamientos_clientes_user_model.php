<?php

class Alojamientos_clientes_user_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    const tabla    = 'clientes';
    const id_tabla = 'ID_Cliente';

    //Esto es para cuando te logias saber a que alojamientos pertenece ese Cliente
    function cliente_alojamiento($ID_Cliente)
    {
        $query = sprintf("select ID_Alojamiento from alojamientos_clientes where ID_Cliente=%s", $ID_Cliente);
        $row   = $this->db->query($query);
        if ($row->num_rows() > 0)
        {
            $row = $row->row_array();
            return $row['ID_Alojamiento'];
        }
        else
        {
            return false;
        }
    }

}

?>
