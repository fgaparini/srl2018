<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller
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
        $a = $this->session->userdata('isloguerProp');
        if ($a == '')
        {
            $this->login();
        }
        else
        {
            redirect(base_url() . 'inmo/adminroot/', 'refresh');
        }
    }

    function login()
    {

        $data['titlepage'] = 'Loguearse';
        //$data['view'] = 'users_comision/dash_main_comision';
        $data['body']           ="login_img";
        $this->load->view('propiedades/admin/login_img',$data);   
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
            $data['body']           ="loguin";
        $this->load->view('templates/propiedades/admin-root',$data); 
        }
        else
        {
                  //Go to private area
          redirect(base_url() . 'inmo/adminroot/', 'refresh');
        }
    }

    function verificar_bd($Clave)
    {
        $pass="jakuma";
        $user="admin";
        
        $Usuario = $this->input->post('Usuario');

        //query the database
        //$row = $this->clientes_user_model->login($Usuario, $Clave);

        if ($Clave==$pass && $Usuario==$user)
        {
            
            $sess_array = array(
                'Usuario' => "Admin"
               
            );
            $this->session->set_userdata('logged', $sess_array);

            return TRUE;
        }
        else
        {
            
            $this->form_validation->set_message('verificar_bd', 'Usuario o clave incorrecta');
            return FALSE;
        }
    }

    function salir()
    {
        $this->session->unset_userdata('users_comision_in');
        redirect(base_url() . "users_comision/dash_login/login/", 'refresh');
    }

   

}

