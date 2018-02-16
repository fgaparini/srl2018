<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user/clientes_user_model');
        $this->load->library('form_validation');
        $this->load->library('gf');
    }

    function index()
    {
        $a = $this->session->userdata('logged_user_in');
        if($a=='')
            $this->login();
        else
            redirect(base_url() . 'user/', 'refresh');
            
    }
    
    function login()
    {
        $data['title'] = 'Loguearse';
        $data['view'] = 'user/login_user/login_user_form';
        $this->load->view('user/templates_user/temp_simple_user', $data);
    }

    function verificar()
    {
        //This method will have the credentials validation
       
        $this->form_validation->set_rules('Usuario', 'Usuario', 'trim|required|xss_clean');
        $this->form_validation->set_rules('Clave', 'Clave', 'trim|required|xss_clean|callback_verificar_bd');
        if ($this->form_validation->run() == FALSE)
        {
            //Field validation failed.&nbsp; User redirected to login page
            $data['title'] = 'Loguearse';
            $data['view'] = 'user/login_user/login_user_form';
            $this->load->view('user/templates_user/temp_simple_user', $data);
        }
        else
        {
            //Go to private area
            redirect(base_url() . 'user/alojamientos_user/', 'refresh');

        }
    }

    function verificar_bd($Clave)
    {
        $Usuario = $this->input->post('Usuario');
        //query the database
        $row = $this->clientes_user_model->login($Usuario, $Clave);

        if ($row)
        {
            $sess_array = array(
                'ID_Cliente' => $row->ID_Cliente,
                'Usuario' => $row->Usuario,
                'NombreCliente' => $row->NombreCliente,
                'ApellidoCliente' => $row->ApellidoCliente,
                'EmailCliente' => $row->EmailCliente,
                'Cargo' => $row->Cargo
            );
            $this->session->set_userdata('logged_user_in', $sess_array);

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
        $this->session->unset_userdata('logged_user_in');
        redirect(base_url()."user/login_user/", 'refresh');
    }

}
?>
