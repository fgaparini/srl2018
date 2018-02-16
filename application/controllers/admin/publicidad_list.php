<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Publicidad_list extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/publicidad_model');
       
        $this->load->library('gf');
    }
    function index() {
        echo "hola";
    }
 function listar_publicidad() 
 {
  
        $a= $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
  
        $fechain = $this->input->get('fecha_desde');
        $fechaout = $this->input->get('fecha_hasta');
    if ($fechain=="") {

        $data['fechas']="none";
                    $data['css'] = array('js/jquery-ui/development-bundle/themes/base/jquery.ui.all');

        $data['title']         = "Listado Publicidades";
        $data['js']            = array(  'js/jquery-ui/development-bundle/ui/jquery.ui.core',
                'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker','js/admin/publicidad_form');
        $data['view'] = 'admin/alojamientos/publicidades_list';
        $this->load->view('admin/templates/temp_menu', $data);
    } else {

         $data['fechas']="ok";
        $data['publi_array'] = $this->publicidad_model->publicidad_list_fecha($fechain,$fechaout);
        $data['title']         = "Listado Páginas";
        $data['css'] = array('js/jquery-ui/development-bundle/themes/base/jquery.ui.all');

        $data['js']            = array(  'js/jquery-ui/development-bundle/ui/jquery.ui.core',
                'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker','js/admin/publicidad_form');
        $data['view'] = 'admin/alojamientos/publicidades_list';
        $this->load->view('admin/templates/temp_menu', $data);

    }

 }
  
}

?>
