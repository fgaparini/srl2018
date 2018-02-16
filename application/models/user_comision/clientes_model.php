<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Clientes_model extends CI_Model
{
    
    const tabla = 'clientes';
    const id_tabla = 'ID_Cliente';

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
        $row = $row->row_array();
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
    
    /*-----------------------------ENCONTRAR SI EXISTE UN NICK REPETIDO(VALIDAR CON AJAX)---------------*/
    
    function find_nick($Usuario,$ID_Cliente)
    {
        $query = sprintf("select * from clientes where Usuario='%s' and ID_Cliente<>%s", $Usuario,$ID_Cliente);
        $row = $this->db->query($query);
        return $row;
        
    }
    
    function login($Usuario, $Clave)
    {
        
        $query=sprintf("select  c.*,ac. ID_Alojamiento  from clientes c, alojamientos_clientes ac where c.Usuario='%s' and c.Clave='%s' and c.Rol='gestion' and ac.ID_Cliente=c.ID_Cliente GROUP BY ac.ID_Alojamiento ",$Usuario,$Clave);
     
        $row = $this->db->query($query);
        
        if($row->num_rows()==0)
        {
            return false;  
        }
        else
        {
          return $row->row();
        }

    }

    function find_pass($emailuser)
    {
        $query = sprintf("select * from clientes where EmailCliente='%s' ", $emailuser);
       
        $row = $this->db->query($query);
         $row = $row->row_array();
        return $row;
        
    }
}
?>
