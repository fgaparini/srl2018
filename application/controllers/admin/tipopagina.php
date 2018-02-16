<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tipopagina extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/tipopagina_model');
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
        
        $data['tipopagina_array'] = $this->tipopagina_model->tipopagina_list();
        $data['title'] = "Listado tipos paginas";
        $data['view'] = 'admin/tipopagina/tipopagina_list';
        $data['js'] = array('js/admin/tipopagina_list');
        $this->load->view('admin/templates/temp_menu', $data);
    }
    
    function form($id_tipopagina = 0)
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['ID_TipoPagina'] = & $ID_TipoPagina;
        $data['TipoPagina'] = & $TipoPagina;
        $data['TituloPagina'] = & $TituloPagina;
        $data['UrlPagina'] = & $UrlPagina;
        $data['KeyPagina'] = & $KeyPagina;
        $data['DesPagina'] = & $DesPagina;
       
        $query_rows = $this->tipopagina_model->tipopagina_find($id_tipopagina);
        $row = $query_rows->row();

        if ($query_rows->num_rows() == 0)
        {
            $data['title'] = 'Crear tipo página';
            $data['accion'] = 'crear';
        }
        else
        {
            $data['title'] = 'Editar tipo página';
            $data['accion'] = 'editar';

            //Tabla agendas
            $ID_TipoPagina = $row->ID_TipoPagina;
            $TipoPagina = $row->TipoPagina;
            $TituloPagina = $row->TituloPagina;
            $KeyPagina = $row->KeyPagina;
            $UrlPagina = $row->UrlPagina;
            $DesPagina = $row->DesPagina;
           
           
        }
        $data['view'] = "admin/tipopagina/tipopagina_form";
        $this->load->view('admin/templates/temp_menu', $data);
    }
    
    
    function save()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $ID_TipoPagina = $this->input->post('ID_TipoPagina');
        $TipoPagina = $this->input->post('TipoPagina');
        $TituloPagina = $this->input->post('TituloPagina');
        $UrlPagina = $this->input->post('UrlPagina');
        $KeyPagina = $this->input->post('UrlPagina');
        $DesPagina = $this->input->post('DesPagina');
        $accion =$this->input->post('accion');
        
        
        $tipopagina_array = array(
            'ID_TipoPagina' => $ID_TipoPagina,
            'TipoPagina' => $TipoPagina,
            'TituloPagina' => $TituloPagina,
            'UrlPagina' => $UrlPagina,
            'KeyPagina' => $KeyPagina,
            'DesPagina' => $DesPagina
        );

        if ($accion == 'crear')
        {
            $this->tipopagina_model->insert('tipopagina', $tipopagina_array);
        }
        elseif ($accion == 'editar')
        {
            $this->tipopagina_model->update($ID_TipoPagina,$tipopagina_array);
        }

        redirect(base_url() . 'admin/tipopagina/lists/', 'refresh');
    }
    
    function delete($id_tipopagina=0)
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $this->tipopagina_model->delete($id_tipopagina);
        redirect(base_url() . 'admin/tipopagina/lists/', 'refresh');
    }
}
?>