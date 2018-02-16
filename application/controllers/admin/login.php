<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('gf');
    }

    function index()
    {
        $a = $this->session->userdata('logged');
        
        if($a=='')
            $this->login();
        else
            redirect(base_url() . 'admin/alojamientos/', 'refresh');
            
    }
    
    function login()
    {
        $data['title'] = 'Loguearse';
        $data['view'] = 'admin/login/login_form';
        $this->load->view('admin/templates/temp_simple', $data);
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
            $data['view'] = 'admin/login/login_form';
            $this->load->view('admin/templates/temp_simple', $data);
        }
        else
        {
            
            //Go to private area
            redirect(base_url() . 'admin/alojamientos/', 'refresh');

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
        $this->session->unset_userdata('logged');
        redirect(base_url()."admin/login/", 'refresh');
    }

}
?>
