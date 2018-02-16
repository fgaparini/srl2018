<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tipoempresa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/tipoempresa_model');
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

        $data['tipoempresa_array'] = $this->tipoempresa_model->tipoempresa_list();
        $data['title']             = "Listado tipos empresas";
        $data['view']              = 'admin/tipoempresa/tipoempresa_list';
        $data['js'] = array('js/admin/tipoempresa_list');
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function form($id_tipoempresa = 0)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['ID_TipoEmpresa'] = & $ID_TipoEmpresa;
        $data['TipoEmpresa']    = & $TipoEmpresa;
        $data['TituloEmpresa']  = & $TituloEmpresa;
        $data['UrlEmpresa']     = & $UrlEmpresa;
        $data['DesEmpresa']     = & $DesEmpresa;
        $data['KeyEmpresa']     = & $KeyEmpresa;
        $data['ContEmpresa']    = & $ContEmpresa;

        $query_rows = $this->tipoempresa_model->tipoempresa_find($id_tipoempresa);
        $row        = $query_rows->row();

        if ($query_rows->num_rows() == 0)
        {
            $data['title']  = 'Crear tipo empresa';
            $data['accion'] = 'crear';
        }
        else
        {
            $data['title']  = 'Editar tipo empresa';
            $data['accion'] = 'editar';

            //Tabla agendas
            $ID_TipoEmpresa = $row->ID_TipoEmpresa;
            $TipoEmpresa    = $row->TipoEmpresa;
            $TituloEmpresa  = $row->TituloEmpresa;
            $DesEmpresa     = $row->DesEmpresa;
            $UrlEmpresa     = $row->UrlEmpresa;
            $KeyEmpresa     = $row->KeyEmpresa;
            $ContEmpresa    = $row->ContEmpresa;
        }
        $data['view']   = "admin/tipoempresa/tipoempresa_form";
        $data['js']     = array('js/ckeditor/ckeditor');
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function save()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $ID_TipoEmpresa = $this->input->post('ID_TipoEmpresa');
        $TipoEmpresa    = $this->input->post('TipoEmpresa');
        $TituloEmpresa  = $this->input->post('TituloEmpresa');
        $UrlEmpresa     = $this->input->post('UrlEmpresa');
        $KeyEmpresa     = $this->input->post('KeyEmpresa');
        $DesEmpresa     = $this->input->post('DesEmpresa');
        $ContEmpresa    = $this->input->post('ContEmpresa');
        $accion         = $this->input->post('accion');

        $tipoempresa_array = array(
            'TipoEmpresa'   => $TipoEmpresa,
            'TituloEmpresa' => $TituloEmpresa,
            'UrlEmpresa'    => $UrlEmpresa,
            'DesEmpresa'    => $DesEmpresa,
            'KeyEmpresa'    => $KeyEmpresa,
            'ContEmpresa'   => $ContEmpresa
        );

        if ($accion == 'crear')
        {
            $this->tipoempresa_model->insert('tipoempresa', $tipoempresa_array);
        }
        elseif ($accion == 'editar')
        {
            $this->tipoempresa_model->update($ID_TipoEmpresa, $tipoempresa_array);
        }

        redirect(base_url() . 'admin/tipoempresa/lists/', 'refresh');
    }

    function delete($id_tipoempresa = 0)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $this->tipoempresa_model->delete($id_tipoempresa);
        redirect(base_url() . 'admin/tipoempresa/lists/', 'refresh');
    }

}
?>