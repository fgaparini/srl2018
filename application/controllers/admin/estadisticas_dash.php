<?php
    class Estadisticas_dash extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('admin/estadisticas_dash_model');
        }
        
        function index()
        {
            $this->lists();
        }
        
        function lists()
        {
            $data['rows'] = $this->estadisticas_dash_model->find_inner_alojamiento();
            $data['title'] = "Estadisticas Ingreso al sistema usuarios";
            $data['view'] = 'admin/estadisticas_dash/estadisticas_dash_list';
            $this->load->view('admin/templates/temp_menu', $data);
        }
    }
?>
