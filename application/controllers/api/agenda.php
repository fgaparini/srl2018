<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Agenda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/agendas_model');
        $this->load->config('avanbook_config');
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
        
        $agenda= $this->agendas_model->agendas_list();
        echo json_encode($agenda);
    }
}
?>