<?php
    class Alojamientos_model extends CI_Controller
    {
        function find_nombre_tipo_senia($ID_Alojamiento)
        {
            $query=sprintf("select 
                                i.Nombre, ta.TipoAlojamiento, mp.Senia
                            from
                                alojamientos a
                                    inner join
                                informaciongeneral i ON a.ID_InformacionGeneral = i.ID_InformacionGeneral
                                    inner join
                                metododepago mp ON a.ID_MP = mp.ID_MP
                                    inner join
                                tipoalojamiento ta ON a.ID_TipoAlojamiento = ta.ID_TipoAlojamiento
                            where
                                a.ID_Alojamiento = %s;",$ID_Alojamiento);
            $row = $this->db->query($query);
            $row = $row->row_array();
            return $row;
        }
    }
?>
