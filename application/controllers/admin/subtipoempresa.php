<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subtipoempresa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/subtipoempresa_model');
        $this->load->model('admin/tipoempresa_model');
        $this->load->model('admin/Tipoempresa_subtipoempresa_model');
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
        
        $data['subtipoempresa_array'] = $this->subtipoempresa_model->find_tipo_subtipo();
        $data['title']                = "Listado Subtipoempresas";
        $data['view']                 = 'admin/subtipoempresa/subtipoempresa_list';
        $data['js'] = array('js/admin/subtipoempresa_list');
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function form($id = 0)
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $cant = $this->subtipoempresa_model->count($id);

        $data['ID_TipoEmpresa']    = & $ID_TipoEmpresa;
        $data['ID_SubtipoEmpresa'] = & $ID_SubtipoEmpresa;
        $data['SubtipoEmpresa']    = & $SubtipoEmpresa;
        $data['TituloSubEmpresa']  = & $TituloSubEmpresa;
        $data['UrlSubEmpresa']     = & $UrlSubEmpresa;
        $data['KeySubEmpresa']     = & $KeySubEmpresa;
        $data['DesSubEmpresa']     = & $DesSubEmpresa;


        if ($cant > 0)
        {
            $row            = $this->subtipoempresa_model->find($id);
            $data['title']  = 'Editar tipo empresa';
            $data['accion'] = 'editar';

            //Tabla agendas
            $ID_TipoEmpresa    = $row['ID_TipoEmpresa'];
            $ID_SubtipoEmpresa = $row['ID_SubtipoEmpresa'];
            $SubtipoEmpresa    = $row['SubtipoEmpresa'];
            $TituloSubEmpresa  = $row['TituloSubEmpresa'];
            $UrlSubEmpresa     = $row['UrlSubEmpresa'];
            $KeySubEmpresa     = $row['KeySubEmpresa'];
            $DesSubEmpresa     = $row['DesSubEmpresa'];
        }
        else
        {
            $data['title']             = 'Crear subtipo empresa';
            $data['accion']            = 'crear';
        }
        $data['tipoempresa_array'] = $this->tipoempresa_model->tipoempresa_list();
        $data['view']              = "admin/subtipoempresa/subtipoempresa_form";
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function save()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $ID_TipoEmpresa    = $this->input->post('ID_TipoEmpresa');
        $ID_SubtipoEmpresa = $this->input->post('ID_SubtipoEmpresa');
        $SubtipoEmpresa    = $this->input->post('SubtipoEmpresa');
        $TituloSubEmpresa  = $this->input->post('TituloSubEmpresa');
        $UrlSubEmpresa     = $this->input->post('UrlSubEmpresa');
        $KeySubEmpresa     = $this->input->post('KeySubEmpresa');
        $DesSubEmpresa     = $this->input->post('DesSubEmpresa');

        $accion = $this->input->post('accion');

        $subtipoempresa_array = array(
            'ID_TipoEmpresa'   => $ID_TipoEmpresa,
            'SubtipoEmpresa'   => $SubtipoEmpresa,
            'TituloSubEmpresa' => $TituloSubEmpresa,
            'UrlSubEmpresa'    => $UrlSubEmpresa,
            'KeySubEmpresa'    => $KeySubEmpresa,
            'DesSubEmpresa'    => $DesSubEmpresa
        );

        if ($accion == 'crear')
        {

            $id_sub         = $this->subtipoempresa_model->insert($subtipoempresa_array);
            $sub_tipo_array = array(
                "ID_TipoEmpresa"    => $ID_TipoEmpresa,
                "ID_SubtipoEmpresa" => $id_sub,
            );
            $this->Tipoempresa_subtipoempresa_model->insert($sub_tipo_array);
        }
        elseif ($accion == 'editar')
        {
            $sub_tipo_array = array(
                "ID_TipoEmpresa" => $ID_TipoEmpresa
            );

            $this->subtipoempresa_model->update($ID_SubtipoEmpresa, $subtipoempresa_array);
            $this->Tipoempresa_subtipoempresa_model->update($ID_SubtipoEmpresa, $sub_tipo_array);
        }

        redirect(base_url() . 'admin/subtipoempresa/lists/', 'refresh');
    }

    function delete($id = 0)
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $this->subtipoempresa_model->delete($id);
        redirect(base_url() . 'admin/subtipoempresa/lists/', 'refresh');
    }

}
?>