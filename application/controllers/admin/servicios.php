<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Servicios extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/servicios_model');
        $this->load->library('gf');
    }
    
    function index()
    {
        $this->lists();
    }


    function lists()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $data['servicios_array'] = $this->servicios_model->servicios_list();
        $data['title'] = "Listado Servicios";
        $data['view'] = 'admin/servicios/servicios_list';
        $data['js'] = array('js/admin/servicios_list');
        $this->load->view('admin/templates/temp_menu', $data);
    }
    
    function form($id_servicio = 0)
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['ID_Servicio'] = & $ID_Servicio;
        $data['Servicio'] = & $Servicio;
       
        $query_rows = $this->servicios_model->servicios_find($id_servicio);
        $row = $query_rows->row();

        if ($query_rows->num_rows() == 0)
        {
            $data['title'] = 'Crear servicio';
            $data['accion'] = 'crear';
        }
        else
        {
            $data['title'] = 'Editar Servicio';
            $data['accion'] = 'editar';

            //Tabla agendas
            $ID_Servicio = $row->ID_Servicio;
            $Servicio = $row->Servicio;
           
           
        }
        $data['view'] = "admin/servicios/servicios_form";
        $this->load->view('admin/templates/temp_menu', $data);
    }
    
    
    function save()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $post_array = $this->input->post();
        
        $categorias_array = array(
            'ID_Servicio' => $post_array['ID_Servicio'],
            'Servicio' => $post_array['Servicio']
        );

        if ($post_array['accion'] == 'crear')
        {
            $this->servicios_model->insert('servicios', $categorias_array);
        }
        elseif ($post_array['accion'] == 'editar')
        {
            $this->servicios_model->update($post_array['ID_Servicio'],$categorias_array);
        }

        redirect(base_url() . 'admin/servicios/lists/', 'refresh');
    }
    
    function delete($id_agenda=0)
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $this->servicios_model->delete($id_agenda);
        redirect(base_url() . 'admin/servicios/lists/', 'refresh');
    }
}
?>