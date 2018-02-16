<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Im_model extends CI_Model
{

    const tabla    = 'imagenes';
    const id_tabla = 'im_id_imagen';

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

    /* ------------------------ LISTAR TODOS LOS ELEMENTOS POR TIPO IMAGEN------------------------ */

    function find_tipo($im_tipo)
    {

        $query = sprintf("select * from imagenes inner join imagenes_tipo on im_id_imagen_tipo=it_id_imagen_tipo where im_id_imagen_tipo='%s' order by im_id_imagen", $im_tipo);
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
    
    function delete_all_tipo($im_id_tipo_imagen)
    {
        $query=sprintf("delete from imagenes where im_id_imagen_tipo=%s",$im_id_tipo_imagen);
        $query = $this->db->query($query);
    }

    /* ------------------------ CONTAR RESULTADOS TRAIDOS------------------------------- */

    function count($id = -1)
    {
        if ($id == -1)
        {
            $query = sprintf("select count(*) as cantidad from %s", self::tabla);
        }
        else
        {
            $query = sprintf("select count(*) as cantidad from %s where %s=%s", self::tabla, self::id_tabla, $id);
        }

        $row = $this->db->query($query);
        $row = $row->row_array();
        return $row['cantidad'];
    }

    // ----------------------------------  CONTAR IMAGENES POR TIPO ------------------------------//

    function count_tipo($im_id_imagen_tipo)
    {
        $query = sprintf("select max(im_id_imagen) as cantidad from imagenes where im_id_imagen_tipo=%s", $im_id_imagen_tipo);
        $row   = $this->db->query($query);
        $row   = $row->row_array();
        return $row['cantidad'];
    }

    //Encontrar el nombre del tipo de imagen segun el id imagen
    function find_it_nombre($im_id_imagen)
    {
        $query = sprintf("select it_nombre,it_id_imagen_tipo from 
                          imagenes inner join imagenes_tipo 
                          on it_id_imagen_tipo = im_id_imagen_tipo 
                          where im_id_imagen=%s", $im_id_imagen);

        $row = $this->db->query($query);
        $row = $row->row_array();
        return $row;
    }

    //Actuaizar descripcion con ajax en el controlador imagenes
    function upload_des($im_id_imagen, $im_id_tipo_imagen, $im_descricpion)
    {
        $query  = sprintf("update imagenes set im_descripcion='%s' where im_id_imagen=%s and im_id_imagen_tipo=%s", $im_descricpion, $im_id_imagen, $im_id_tipo_imagen);
        $this->db->query($query);
        return 'ok';
    }

}

?>
