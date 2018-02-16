<?php

class Alojamiento_estadisticas extends CI_Model
{

    const tabla = 'estadistica_alojar';
    const id_tabla = 'ID_Estadistica';

    /* ------------------------ INSERTAR EN LA BASE DE DATOS----------------------- */

    function insert($row = array())
    {
        $this->db->insert(self::tabla, $row);
        return $this->db->insert_id();
    }


    /* ------------------------ BUSCAR POR ID-------------------------------------- */

    function find($id)
    {
        $query = sprintf("select * from %s where %s=%s",self::tabla, self::id_tabla, $id);
        $row = $this->db->query($query);
        return $row;
    }

    
    /* ------------------------ LISTAR TODOS LOS ELEMENTOS------------------------ */

    function find_all()
    {

        $query =sprintf( "select * from %s",  self::tabla);
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
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

        $query = sprintf("delete from %s where %s=%s",self::tabla,  self::id_tabla, $id);
        $this->db->query($query);
    }
    
    function sum_estadisca ($tipo, $idalojar)
    {
     $estad_mes="";
     for ($i=1; $i <=12 ; $i++) { 
        $query =sprintf( "select COUNT(*) as totalrows from %s WHERE  MONTH(FechaClick)='%s' AND Year(FechaClick)=2014 AND TipoAccion='%s' AND ID_Alojamiento='%s'",  self::tabla, $i,$tipo, $idalojar);
        $rows = $this->db->query($query);
        $rows = $rows->row_array();
        $estad_mes[$i]=$rows['totalrows'] ;        
     }
       return $estad_mes;
    }  
     function tipoaccion ($idalojar)
    {
     
        $query =sprintf( "select TipoAccion from %s Where ID_Alojamiento='%s' GROUP BY TipoAccion ",  self::tabla,$idalojar);
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
             
   
       return $rows;
    }  
   
}
   
?>
