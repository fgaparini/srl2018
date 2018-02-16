<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calendar_model extends CI_Model
{

    function fecha_rango($fecha_desde, $fecha_hasta)
    {
        $query =sprintf("select * from cal_fecha where fecha>='%s' and fecha<='%s'",$fecha_desde,$fecha_hasta);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }
    
    function dia_tarifa($fecha, $id_habitacion)
    {
        $query=sprintf("select * from cal_calendario where fecha='%s' and id_habitacion=%s",$fecha,$id_habitacion);
        $row = $this->db->query($query);
        $row = $row->row_array();
        return $row;
    }
    
    function dia_count($fecha,$id_habitacion)
    {
        $query=sprintf("select count(*) as cantidad from cal_calendario where fecha='%s' and id_habitacion=%s",$fecha,$id_habitacion);
        $row = $this->db->query($query);
        $row = $row->row_array();
        
        if($row['cantidad']>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function update_query($id_habitacion,$fecha,$asignada,$minima,$normal,$oferta,$bloqueo,$disponible)
    {
       
       if($asignada!='' || $minima!='' || $normal!='' || $oferta!='')
       {
           $query=sprintf("update cal_calendario set estado_bloqueo='%s', cant_disponible='%s' ",$bloqueo,$disponible);
           
           if($asignada!='')
           {
               $query =$query.sprintf(", cant_asignada='%s'",$asignada);
           }
           if($minima!='')
           {
               $query =$query.sprintf(", estancia_minima='%s'",$minima);
           }
           if($normal!='')
           {
               $query =$query.sprintf(", tarifa_normal='%s'",$normal);
           }
           if($oferta!='')
           {
               $query =$query.sprintf(", tarifa_oferta='%s'",$oferta);
           }
           
           $query=$query.sprintf(" where fecha='%s' and id_habitacion=%s",$fecha,$id_habitacion);
           $this->db->query($query);
           return true;
       }
       else
       {
           return false;
       }
    }
    
    function insert($row = array())
    {
        $this->db->insert("cal_calendario", $row);
        return $this->db->insert_id();
    }

}

?>
