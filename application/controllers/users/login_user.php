<?php

class Login_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user/clientes_user_model');
        $this->load->model('user/estadisticas_dash_user_model');
        $this->load->library('form_validation');
        $this->load->library('user_agent');
        $this->load->library('gf');
    }

    function index()
    {
        $a = $this->session->userdata('logged_in');
        if ($a == '')
            $this->login();
        else
            redirect(base_url() . 'users/login_user/login', 'refresh');
    }

    function login()
    {
        $data['title'] = 'Loguearse';
        $this->load->view('users/login', $data);
    }

    function adjuntars()
    {
        $data['title'] = 'Loguearse';
        $this->load->view('users/adjunto', $data);
    }

    function verificar()
    {
        //This method will have the credentials validation

        $this->form_validation->set_rules('Usuario', 'Usuario', 'trim|required|xss_clean');
        $this->form_validation->set_rules('Clave', 'Clave', 'trim|required|xss_clean|callback_verificar_bd');
        if ($this->form_validation->run() == FALSE)
        {
            //Field validation failed.&nbsp; User redirected to login page
            $data['title']      = 'Loguearse';
            $data['errorlogin'] = "error";
            $this->load->view('users/login', $data);
        }
        else
        {
            $this->estadistica_dash();
            redirect(base_url() . 'users/dash/', 'refresh');
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
                'ID_Cliente'      => $row->ID_Cliente,
                'Usuario'         => $row->Usuario,
                'NombreCliente'   => $row->NombreCliente,
                'ApellidoCliente' => $row->ApellidoCliente,
                'EmailCliente'    => $row->EmailCliente,
                'Cargo'           => $row->Cargo,
                'ID_Alojamiento'  => $row->ID_Alojamiento
            );
            $this->session->set_userdata('logged_in', $sess_array);

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
        $this->session->unset_userdata('logged_in');
        redirect(base_url() . "users/login_user", 'refresh');
    }

    function estadistica_dash()
    {
        $a = $this->session->userdata('logged_in');

        $ID_Alojamiento = $a['ID_Alojamiento'];
        $FechaIngreso   = date('Y-m-d');
        $TipoDash       = "publicidad";
        $Ip             = "";$this->input->ip_address();
        $Navegador      = $this->agent->agent_string();

        $array = array(
            'ID_Alojamiento' => $ID_Alojamiento,
            'FechaIngreso'   => $FechaIngreso,
            'TipoDash'       => $TipoDash,
            'Ip'             => $Ip,
            'Navegador'      => $Navegador
        );

        $this->estadisticas_dash_user_model->insert($array);
    }

    function recuperarpass()
    {
        $emailuser = $this->input->post('recuperarpass');

        $row = $this->clientes_user_model->find_pass($emailuser);
        if (!isset($row['NombreCliente']))
        {
            $data['texterror'] = "No exite ese email en nuestra base de datos, verifiquelo e intente de nuevo.";
            $data['title']     = 'Loguearse';
            $this->load->view('users/login', $data);
        }
        else
        {

            $messages =
                    "
            <div style='background-color: #eee; padding: 15px; width:100%;' aling='center'>
    <div style='background-color: #fff; border-radius:7px; boder:1px #666 solid; padding: 10px 10px; width:90%;' align='left'>
          <div style='width:100%' align='left' > <img src='http://sanrafaellate.com.ar/logo_nuevo2.png' alt='' width='225' height='95'></div><br><br>
            <div style='font-family: arial;font-size:12px;color:#222;padding: 15px'>
        <span style='font-size:15px; font-weight: bold; '> Recuperacion Contraseña Admin San Rafael Late</span><br>
            <hr><br>
            <span>Estimado " . $row['NombreCliente'] . " a continuacion detallamos su usuario y contraseña para nuestro sistema de adminitracion de Alojamientos</span><br><br>
        <span><b>Usuario:</b> " . $row['Usuario'] . "</span><br><br>
        <span><b>Contraseña:</b> " . $row['Clave'] . "</span>
        <br><br>
        <div style='background-color: #BBC888; border-radius: 10px; padding: 10px; display:inline;'><a href='" . base_url() . "clientes' style='text-decoraion:none; color:#fff; font-size:14px;font-weight: bold;'>Acceda a su Cuenta </a></div>
        
        </div>
    </div>
    </div>

</div>
            ";



            $this->load->library('email');

            $this->email->from('clientes@sanrafaellate.com.ar', 'San Rafael Late - Clientes');
            $this->email->to($emailuser, $row['NombreCliente']);


            $this->email->subject('Recuperacion Contraseña - San Rafael Late');
            $this->email->message($messages);

            $this->email->send();

            $data['title']  = 'Recuperar Contraseña';
            $data['textok'] = ' Hemos enviado sus datos de ingreso a ' . $emailuser . '. <br> Ingrese a su casilla de correo y verifiquelo. Gracias. ';
            $this->load->view('users/recuperar', $data);
        }
    }

}

?>
