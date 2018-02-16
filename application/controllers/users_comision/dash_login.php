<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dash_login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('gf');
        $this->load->library('sf');
        $this->load->library('user_agent');
        $this->load->model('user_comision/estadisticas_dash_model');
        $this->load->model('user_comision/clientes_model');
        
    }

    function index()
    {
        $a = $this->session->userdata('users_comision_in');
        if ($a == '')
        {
            $this->login();
        }
        else
        {
            redirect(base_url() . 'users_comision/dash_comision/main/', 'refresh');
        }
    }

    function login()
    {

        $data['titlepage'] = 'Loguearse';
        $data['view']      = 'users_comision/dash_login_login';
        //$data['view'] = 'users_comision/dash_main_comision';
        $this->load->view('users_comision/templates/temp_simple', $data);
    }

    function verificar()
    {
        //This method will have the credentials validation

        $this->form_validation->set_rules('Usuario', 'Usuario', 'trim|required|xss_clean');
        $this->form_validation->set_rules('Clave', 'Clave', 'trim|required|xss_clean|callback_verificar_bd');
        if ($this->form_validation->run() == FALSE)
        {
            //Field validation failed.&nbsp; User redirected to login page
            $data['errorlogin'] = "1";
            $data['titlepage']  = 'Loguearse';
            $data['view']       = 'users_comision/dash_login_login';
            $this->load->view('users_comision/templates/temp_simple', $data);
        }
        else
        {
            $this->estadistica_dash();
            
            //Go to private area
            redirect(base_url() . 'users_comision/dash_comision/main/', 'refresh');
        }
    }

    function verificar_bd($Clave)
    {
        $Usuario = $this->input->post('Usuario');
        //query the database
        $row     = $this->clientes_model->login($Usuario, $Clave);

        if ($row)
        {
            $sess_array = array(
                'ID_Cliente'      => $row->ID_Cliente,
                'ID_Alojamiento'  => $row->ID_Alojamiento,
                'Usuario'         => $row->Usuario,
                'NombreCliente'   => $row->NombreCliente,
                'ApellidoCliente' => $row->ApellidoCliente,
                'EmailCliente'    => $row->EmailCliente,
                'Cargo'           => $row->Cargo,
                'Rol'             => $row->Rol
            );
            $this->session->set_userdata('users_comision_in', $sess_array);

            return TRUE;
        }
        else
        {

            $this->form_validation->set_message('verificar_bd', 'Usuario o clave incorrecta');
            return false;
        }
    }

    function salir()
    {
        $this->session->unset_userdata('users_comision_in');
        redirect(base_url() . "users_comision/dash_login/login/", 'refresh');
    }

    function estadistica_dash()
    {
        $a = $this->session->userdata('users_comision_in');

        $ID_Alojamiento = $a['ID_Alojamiento'];
        $FechaIngreso   = date('Y-m-d');
        $TipoDash       = "comision";
        $Ip             = $this->input->ip_address();
        $Navegador      = $this->agent->agent_string();

        $array = array(
            'ID_Alojamiento' => $ID_Alojamiento,
            'FechaIngreso'   => $FechaIngreso,
            'TipoDash'       => $TipoDash,
            'Ip'             => $Ip,
            'Navegador'      => $Navegador
        );

        $this->estadisticas_dash_model->insert($array);
    }

}

