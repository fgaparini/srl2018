<?php

class Contenido_mail extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/contenido_mail_model');
        $this->load->library('gf');
    }

    function index()
    {
        $this->lists();
    }

    function lists()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $data['list_array'] = $this->contenido_mail_model->find_all();
        $data['title']      = "Listado Categorias";
        $data['view']       = 'admin/contenido_mail/contenido_mail_list';
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function form($id = 0)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['ID_ContenidoMail'] = & $ID_ContenidoMail;
        $data['NombreMail']       = & $NombreMail;
        $data['AsuntoMail']       = & $AsuntoMail;
        $data['DetalleMail']      = & $DetalleMail;

        $count = $this->contenido_mail_model->count($id);

        if ($count == 0)
        {
            $data['title']  = 'Crear Mail';
            $data['accion'] = 'crear';
        }
        else
        {
            $row = $this->contenido_mail_model->find($id);

            $data['title']  = 'Editar Mail';
            $data['accion'] = 'editar';

            //Tabla agendas
            $ID_ContenidoMail = $row['ID_ContenidoMail'];
            $NombreMail       = $row['NombreMail'];
            $DetalleMail      = $row['DetalleMail'];
            $AsuntoMail       = $row['AsuntoMail'];
        }
        $data['view']     = "admin/contenido_mail/contenido_mail_form";
        $data['js']       = array('js/ckeditor/ckeditor');
        $this->load->view('admin/templates/temp_menu', $data);
        ;
    }

    function save()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $ID_ContenidoMail = $this->input->post('ID_ContenidoMail');
        $NombreMail       = $this->input->post('NombreMail');
        $DetalleMail      = $this->input->post('DetalleMail');
        $AsuntoMail       = $this->input->post('AsuntoMail');
        $accion           = $this->input->post('accion');

        $array = array(
            'NombreMail'  => $NombreMail,
            'DetalleMail' => $DetalleMail,
            'AsuntoMail'  => $AsuntoMail
        );

        if ($accion == 'crear')
        {
            $this->contenido_mail_model->insert($array);
        }
        elseif ($accion == 'editar')
        {
            $this->contenido_mail_model->update($ID_ContenidoMail, $array);
        }

        redirect(base_url() . 'admin/contenido_mail/lists/', 'refresh');
    }

    function delete($id = 0)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $this->contenido_mail_model->delete($id);
        redirect(base_url() . 'admin/contenido_mail/lists/', 'refresh');
    }

    function mail_list()
    {
        $ID_TipoAlojamiento = $this->input->get('ID_TipoAlojamiento');
        $TipoAcuerdo        = $this->input->get('TipoAcuerdo');

        if ($ID_TipoAlojamiento == "")
            $ID_TipoAlojamiento = '0';
        if ($TipoAcuerdo == "")
            $TipoAcuerdo        = '0';

        $data['ID_TipoAlojamiento'] = $ID_TipoAlojamiento;
        $data['TipoAcuerdo']        = $TipoAcuerdo;
        $data['alojamientos']       = $this->contenido_mail_model->find_alo_inner_infogral($ID_TipoAlojamiento, $TipoAcuerdo);
        $data['tipos_mails']        = $this->contenido_mail_model->find_all();
        $data['tipo_alojamientos']  = $this->contenido_mail_model->find_tipos_alojamientos();
        $data['title']              = "Listado Alojamientos";
        $data['view']               = "admin/contenido_mail/mail_list";
        $data['js']                 = array("js/admin/mail_list");
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function mail_content()
    {
        $this->load->library('email');
        $this->load->library('parser');


        $comas_input      = $this->input->post('comas_input');
        $ID_ContenidoMail = $this->input->post('ID_ContenidoMail');

        //Borrar ultima coma
        $comas_input = substr($comas_input, 0, strlen($comas_input) - 1);


        //Buscar los alojamientos seleccionados
        $alojamientos = $this->contenido_mail_model->find_in_alojamientos($comas_input);

        //Buscar un contenido especial
        if ($ID_ContenidoMail == 1)
        {
            foreach ($alojamientos as $var)
            {
                $row = $this->contenido_mail_model->find_alojamiento_inner($var['ID_Alojamiento']);

                if ($row != null)
                {
                    $data['Nombre']            = $row['Nombre'];
                    $data['TituloAlojamiento'] = $row['TituloAlojamiento'];
                    $data['NombreCliente']     = $row['NombreCliente'];
                    $data['ApellidoCliente']   = $row['ApellidoCliente'];
                    $data['EmailCliente']      = $row['EmailCliente'];
                    $data['Usuario']           = $row['Usuario'];
                    $data['Clave']             = $row['Clave'];

                    $contenido = $this->parser->parse('admin/contenido_mail/mail_especial/clientes_claves', $data, true);

                    $this->email->clear($data['EmailCliente'], $data['TituloAlojamiento'] . ' ' . $data['Nombre']);
                    $this->email->to($data['EmailCliente'], $data['TituloAlojamiento'] . ' ' . $data['Nombre']);
                    $this->email->from('contacto@sanrafaellate.com.ar', 'San Rafael Late');
                    $this->email->subject(' NUEVO : San Rafael Late ADMIN - Administre la publicacion de su alojamiento  ');
                    $this->email->message($contenido);
                    $this->email->send();

                    echo "Se envio mail alojamiento " . $var['Nombre'] . "<br>";
                }
                else
                {
                    echo "No se envio mail alojamiento " . $var['Nombre'] . " (No tiene tiene ningun cliente generado)" . "<br>";
                    ;
                }
            }
            echo "<a href='" . base_url() . "/admin/contenido_mail/mail_list/'><h1>Volver</h1></a>";
            
        }
        else
        {
            //Buscar el contenido que va en los mail
            $contenido_mail = $this->contenido_mail_model->find($ID_ContenidoMail);
            $contenido      = $contenido_mail['DetalleMail'];
            $asunto         = $contenido_mail['AsuntoMail'];

            foreach ($alojamientos as $var)
            {
                $row = $this->contenido_mail_model->find_alojamiento_inner($var['ID_Alojamiento']);
                
                $this->email->clear();
                $this->email->to($row['EmailCliente'], $row['TituloAlojamiento'] . ' ' . $row['Nombre']);
                $this->email->from('contacto@sanrafaellate.com.ar', 'San Rafael Late');
                $this->email->subject($asunto);
                $this->email->message($contenido);
                $this->email->send();
                
            }
        }
        
        redirect(base_url() . 'admin/contenido_mail/mail_list/', 'refresh');
    }

}

?>
