<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Propabm_model extends CI_Model
{
 public function __construct()
    {
        parent::__construct();
         $this->db_prop = $this->load->database('propiedades', TRUE);
    }


   function buscador ($distrito,$tipo,$operacion,$precio1,$precio2)
   {
        if($distrito!="0")
        {
            $Bdistrito ="p.Distrito_ID_Distrito=".$distrito;
        } else {$Bdistrito=""}

        if($tipo!="0")
        {
            $Btipo ="AND p.TipoPropiedades_ID_Tipo=".$distrito;
        } else {$Bdistrito=""}

        if($Btipo!="0")
        {
            $Boperacion ="AND p.Operacion=".$operacion;
        } else {$Boperacion=""}

        if($precio1 >"1000" OR $precio2<"5.000.000")
        {
            $Bprecio="AND p.Precio Between". $precio1." AND". $precio2;
        } else {$Bprecio=""}

   

    $query = sprintf("select propiedades p, informacionprop ip, from  Where %s %s %s %s AND p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp  order by RAND()",$Bdistrito,$Btipo,$Boperacion,$Bprecio);
        $rows  = $this->db_prop->query($query);
        $rows  = $rows->result_array();
        return $rows;
   }
   
   function find_all()
    {
        $query = sprintf("select * from %s order by RAND()", self::tabla);
        $rows  = $this->db_prop->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }


}
?>
