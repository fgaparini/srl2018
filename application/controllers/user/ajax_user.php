<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    //Funcion para borrar imagen
    function alojamientos_imagenes_delete()
    {
        $a              = $this->session->userdata('logged_user_in');
        $this->gf->comp_sesion($a, base_url());
        
        $nombre_imagen = $this->input->post('NombreImagen');
        $id_alojamiento = $this->input->post('ID_Alojamiento');
        $query = sprintf("delete from alojamientos_imagenes where ID_Alojamiento=%s and NombreImagen=%s", $id_alojamiento, $nombre_imagen);
        $this->db->query($query);
    }

    //Funcion para borrar imagen
    function habitaciones_imagenes_delete()
    {
        $a              = $this->session->userdata('logged_user_in');
        $this->gf->comp_sesion($a, base_url());
        
        $nombre_imagen = $this->input->post('NombreImagenHab');
        $id_habitacion = $this->input->post('ID_Habitacion');
        $query = sprintf("delete from habitaciones_imagenes where ID_Habitacion=%s and NombreImagenHab=%s", $id_habitacion, $nombre_imagen);
        $this->db->query($query);
    }

    
    function alojamientos_imagenes_descripcion()
    {
        $a              = $this->session->userdata('logged_user_in');
        $this->gf->comp_sesion($a, base_url());
        
        $id_alojamiento = $this->input->post('ID_Alojamiento');
        $nombreimagen = $this->input->post('NombreImagen');
        $imagendescripcion = $this->input->post('ImagenDescripcion');
        $query = sprintf('update alojamientos_imagenes set ImagenDescripcion="%s" where ID_Alojamiento=%s and NombreImagen=%s', $imagendescripcion, $id_alojamiento, $nombreimagen);
        $this->db->query($query);
        echo $query;
    }
}
?>
