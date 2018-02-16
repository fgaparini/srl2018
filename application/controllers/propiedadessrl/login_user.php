<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('gf');
        $this->load->library('sf');
        $this->load->library('user_agent');
        $this->load->model('propiedades/db_users');     
        
    }

    function index()
    {
        $a = $this->session->userdata('logged_user');
        if ($a == '')
        {
            $this->login();
        }
        else
        {
            redirect(base_url() . 'propiedadessrl/adminuser/', 'refresh');
        }
    }

    function login()
    {

        $data['titlepage'] = 'Loguearse';
        //$data['view'] = 'users_comision/dash_main_comision';
      
        $this->load->view('propiedades/user/login_user',$data);   
         }

    function verificar()
    {
        //This method will have the credentials validation

        $this->form_validation->set_rules('Email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('Clave', 'Clave', 'trim|required|xss_clean|callback_verificar_bd');
        if ($this->form_validation->run() == FALSE)
        {
            //Field validation failed.&nbsp; User redirected to login page
            $data['errorlogin'] = "1";
            $data['titlepage']  = 'Loguearse';
                $data['body']           ="login";
        $this->load->view('propiedades/user/login_user',$data); 
        }
        else
        {
                  //Go to private area
          redirect(base_url() . 'propiedadessrl/adminuser/', 'refresh');
        }
    }

     function verificar_bd($Clave)
    {
        $Usuario = $this->input->post('Email');

        //query the database
        $row = $this->db_users->login($Usuario, $Clave);

        if ($row)
        {
            $sess_array = array(
                'ID_Usuarios'           => $row->ID_Usuarios,
                'Usuario'               => $row->Usuario,
                'Email'                 => $row->Email,
                'Vendedor'              => $row->Vendedor,
                'Telefono'              => $row->Telefono,
                'Direccion'             => $row->Direccion,
                'Particular'            => $row->Particular,
                'PlanUsuarios_ID_PlanU' => $row->PlanUsuarios_ID_PlanU
            );

            $this->session->set_userdata('logged_user', $sess_array);

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
        $this->session->unset_userdata('logged_user');
        redirect(base_url() . "propiedadessrl/login_user", 'refresh');
    }

   

}

