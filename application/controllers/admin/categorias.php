<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categorias extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/categorias_model');
        $this->load->library('gf');
    }

    function index()
    {
        $this->lists();
    }

    function lists()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $data['categorias_array'] = $this->categorias_model->categorias_list();
        $data['title']            = "Listado Categorias";
        $data['view']             = 'admin/categorias/categorias_list';
        $data['js'] = array('js/admin/categorias_list');
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function form($id_categoria = 0)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['ID_Categorias'] = & $ID_Categorias;
        $data['Categoria']     = & $Categoria;

        $query_rows = $this->categorias_model->categorias_find($id_categoria);
        $row        = $query_rows->row();

        if ($query_rows->num_rows() == 0)
        {
            $data['title']  = 'Crear Categoria';
            $data['accion'] = 'crear';
        }
        else
        {
            $data['title']  = 'Editar Categoria';
            $data['accion'] = 'editar';

            //Tabla agendas
            $ID_Categorias = $row->ID_Categorias;
            $Categoria     = $row->Categoria;
        }
        $data['view'] = "admin/categorias/categorias_form";
        $this->load->view('admin/templates/temp_menu', $data);
        ;
    }

    function save()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $post_array = $this->input->post();

        $categorias_array = array(
            'ID_Categorias' => $post_array['ID_Categorias'],
            'Categoria'     => $post_array['Categoria']
        );

        if ($post_array['accion'] == 'crear')
        {
            $this->categorias_model->insert('categorias', $categorias_array);
        }
        elseif ($post_array['accion'] == 'editar')
        {
            $this->categorias_model->update($post_array['ID_Categorias'], $categorias_array);
        }

        redirect(base_url() . 'admin/categorias/lists/', 'refresh');
    }

    function delete($id_agenda = 0)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $this->categorias_model->delete($id_agenda);
        redirect(base_url() . 'admin/categorias/lists/', 'refresh');
    }

}

?>