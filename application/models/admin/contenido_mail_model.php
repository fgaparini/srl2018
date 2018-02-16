<?php

class Contenido_mail_model extends CI_Model
{

    const tabla    = 'contenido_mail';
    const id_tabla = 'ID_ContenidoMail';

    /* ------------------------ INSERTAR EN LA BASE DE DATOS----------------------- */

    function insert($row = array())
    {
        $this->db->insert(self::tabla, $row);
        return $this->db->insert_id();
    }

    /* ------------------------ BUSCAR POR ID-------------------------------------- */

    function find($id)
    {
        $query = sprintf("select * from %s where %s=%s", self::tabla, self::id_tabla, $id);
        $row   = $this->db->query($query);
        $row   = $row->row_array();
        return $row;
    }

    /* ------------------------ LISTAR TODOS LOS ELEMENTOS------------------------ */

    function find_all()
    {

        $query = sprintf("select * from %s", self::tabla);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
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

        $query = sprintf("delete from %s where %s=%s", self::tabla, self::id_tabla, $id);
        $this->db->query($query);
    }

   
    /* ------------------------ CONTAR RESULTADOS TRAIDOS------------------------------- */

    function count($id)
    {
        $query = sprintf("select count(*) as cantidad from %s where %s=%s", self::tabla, self::id_tabla, $id);

        $row = $this->db->query($query);
        $row = $row->row_array();
        return $row['cantidad'];
    }

   //--------------------------------- BUSCAR ALOJAMIENTOS INNER JOIN INFORMACION GENERAL --------------------------

    function find_alo_inner_infogral($ID_TipoAlojamiento,$TipoAcuerdo)
    {
        
        $query = "select * from alojamientos a inner join informaciongeneral i on i.ID_InformacionGeneral = a.ID_InformacionGeneral where a.ID_Alojamiento>0";
        $where1="";
        $where2="";
        
        if($ID_TipoAlojamiento!='0')
            $where1= sprintf(" and a.ID_TipoAlojamiento=%s ",$ID_TipoAlojamiento);
        
        if($TipoAcuerdo!='0')
            $where2= sprintf(" and a.TipoAcuerdo='%s'",$TipoAcuerdo);
        
        $query = $query . $where1 . $where2;
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }
    
    //----------------------------------BUSCAR LOS TIPOS ALOJAMIENTOS ---------------------------
    
    function find_tipos_alojamientos()
    {
        $query="select * from tipoalojamiento";
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    //------------------------------ BUSCAR LOS ALOJAMIENTOS CON PASANDO EL ARRAY CON COMAS ----------//////
    
    function find_in_alojamientos($comas)
    {
        $query=sprintf("select * from alojamientos a inner join informaciongeneral i on i.ID_InformacionGeneral = a.ID_InformacionGeneral where a.ID_Alojamiento in (%s)",$comas);
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    //---------------------------- Buscar datos para enviar al mail especial claves y demas ------- /////////
    
    function find_alojamiento_inner($ID_Alojamiento)
    {
        $query =sprintf('
                        select 
                            i.Nombre,
                                t.TituloAlojamiento,
                                c.NombreCliente,
                                c.ApellidoCliente,
                                c.EmailCliente,
                                c.Usuario,
                                c.Clave
                        from
                            alojamientos_clientes ac
                                inner join
                            alojamientos a ON a.ID_Alojamiento = ac.ID_Alojamiento
                                inner join
                                informaciongeneral i on a.ID_InformacionGeneral = i.ID_InformacionGeneral
                                inner join
                                tipoalojamiento t on a.ID_TipoAlojamiento = t.ID_TipoAlojamiento
                                inner join
                            clientes c ON c.ID_Cliente = ac.ID_Cliente
                        where
                            a.ID_Alojamiento=%s
                        group by a.ID_Alojamiento',$ID_Alojamiento);

        $row = $this->db->query($query);
        $row = $row->row_array();
        return $row;
    }

}

?>
