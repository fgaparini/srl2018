<?php
class Alojamientos_model extends CI_Controller
{
    function nombre_alojamiento($ID_Alojamiento)
    {
      $query=sprintf('select 
                        Nombre
                    from
                        alojamientos a
                            inner join
                        informaciongeneral i ON a.ID_InformacionGeneral = i.ID_InformacionGeneral
                    where
                        ID_Alojamiento = 110;',$ID_Alojamiento);
      $row = $this->db->query($query);
      $row = $row->row_array();
      return $row['Nombre'];
    }
}
?>
