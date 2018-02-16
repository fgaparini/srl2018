<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Publicidad_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    
    function publicidad_list_fecha($fechain,$fechaout)
    {

        $query=sprintf("select 
                p.*,ig.Nombre,a.ID_alojamiento, a.Activo as alo_ac
                from
                alojamientos a,
                informaciongeneral ig,
                publicidad p,
                alojamientos_publicidad ap
                Where 
                month(p.FechaPublicidad) between month('%s') AND month('%s') AND
                ap.ID_Publicidad = p.ID_Publicidad AND
                a.ID_Alojamiento = ap.ID_Alojamiento AND
                ig.ID_InformacionGeneral = a.ID_InformacionGeneral",$fechain,$fechaout);
        
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
 
    
}
?>
