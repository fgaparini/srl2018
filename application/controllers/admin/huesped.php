<?php

class Huesped extends CI_Controller
{

    const title_save_form   = 'Nuevo Huesped';
    const title_update_form = 'Editar Huesped';
    const title_list_form   = 'Listado Huesped';

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/huesped_model');
        $this->load->model('admin/tipoalojamiento_model');
        $this->load->model('admin/huesped_mail_model');
        $this->load->library('form_validation');
        $this->load->library('gf');
        $this->load->helper('file');
        $this->load->helper('directory');
    }

    function index()
    {
        $this->lists();
    }

    function form($id = 0)
    {

        $cantidad                = $this->huesped_model->count_id($id);
        //Variables tabla
        $data['ID_Huesped']      = & $ID_Huesped;
        $data['NombreHuesped']   = & $NombreHuesped;
        $data['ApellidoHuesped'] = & $ApellidoHuesped;
        $data['EmailHuesped']    = & $EmailHuesped;
        $data['TelefonoFijo']    = & $TelefonoFijo;
        $data['TelefonoCelular'] = & $TelefonoCelular;
        $data['Ciudad']          = & $Ciudad;
        $data['Provincia']       = & $Provincia;
        $data['NotasHuesped']    = & $NotasHuesped;
        $data['EstadoHuesped']   = & $EstadoHuesped;
        $data['FechaDesde']      = & $FechaDesde;
        $data['FechaHasta']      = & $FechaHasta;



        //Variables a pasar segun la vista
        $data['title'] = & $title;

        //Si es mayor a 0 es editar
        if ($cantidad > 0)
        {
            $row             = $this->huesped_model->find($id);
            $ID_Huesped      = $row['ID_Huesped'];
            $NombreHuesped   = $row['NombreHuesped'];
            $ApellidoHuesped = $row['ApellidoHuesped'];
            $EmailHuesped    = $row['EmailHuesped'];
            $TelefonoFijo    = $row['TelefonoFijo'];
            $TelefonoCelular = $row['TelefonoCelular'];
            $Ciudad          = $row['Ciudad'];
            $Provincia       = $row['Provincia'];
            $NotasHuesped    = $row['NotasHuesped'];
            $EstadoHuesped   = $row['EstadoHuesped'];
            $FechaDesde      = $this->gf->html_mysql($row['FechaDesde']);
            $FechaHasta      = $this->gf->html_mysql($row['FechaHasta']);

            $title = self::title_update_form;
        }
        else
        {
            $title = self::title_save_form;
        }

        $data['view'] = "admin/huesped/huesped_form";
        $data['css']  = array(
            'js/jquery-ui/development-bundle/themes/base/jquery.ui.all',
        );
        $data['js'] = array(
            'js/jquery-ui/development-bundle/ui/jquery.ui.core',
            'js/jquery-ui/development-bundle/ui/jquery.ui.widget',
            'js/jquery-ui/development-bundle/ui/jquery.ui.position',
            'js/jquery-ui/development-bundle/ui/jquery.ui.menu',
            'js/jquery-ui/development-bundle/ui/jquery.ui.autocomplete',
            'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker',
            'js/ckeditor/ckeditor',
            'js/admin/huesped_form'
        );
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function save()
    {
        //Validacion formulario
        $this->form_validation->set_rules('NombreHuesped', 'Nombre', '');
        $this->form_validation->set_rules('ApellidoHuesped', 'Apellido', '');
        $this->form_validation->set_rules('EmailHuesped', 'Email', '');
        $this->form_validation->set_rules('TelefonoFijo', 'Telefono Fijo', '');
        $this->form_validation->set_rules('TelefonoCelular', 'Telefono Celular', '');
        $this->form_validation->set_rules('Ciudad', 'Ciudad', '');
        $this->form_validation->set_rules('Provincia', 'Provincia', '');
        $this->form_validation->set_rules('NotasHuesped', 'Notas', '');
        $this->form_validation->set_rules('EstadoHuesped', 'Estado', '');
        $this->form_validation->set_rules('FechaDesde', 'Fecha Desde', '');
        $this->form_validation->set_rules('FechaHasta', 'Fecha Hasta', '');

        //Variables post a guardar
        $ID_Huesped      = $this->input->post('ID_Huesped');
        $NombreHuesped   = $this->input->post('NombreHuesped');
        $ApellidoHuesped = $this->input->post('ApellidoHuesped');
        $EmailHuesped    = $this->input->post('EmailHuesped');
        $TelefonoFijo    = $this->input->post('TelefonoFijo');
        $TelefonoCelular = $this->input->post('TelefonoCelular');
        $Ciudad          = $this->input->post('Ciudad');
        $Provincia       = $this->input->post('Provincia');
        $NotasHuesped    = $this->input->post('NotasHuesped');
        $EstadoHuesped   = $this->input->post('EstadoHuesped');
        $FechaDesde      = $this->gf->html_mysql($this->input->post('FechaDesde'));
        $FechaHasta      = $this->gf->html_mysql($this->input->post('FechaHasta'));

        if ($this->form_validation->run() == TRUE)
        {

            $datos_array = array(
                'NombreHuesped'   => $NombreHuesped,
                'ApellidoHuesped' => $ApellidoHuesped,
                'EmailHuesped'    => $EmailHuesped,
                'TelefonoFijo'    => $TelefonoFijo,
                'TelefonoCelular' => $TelefonoCelular,
                'Ciudad'          => $Ciudad,
                'Provincia'       => $Provincia,
                'NotasHuesped'    => $NotasHuesped,
                'EstadoHuesped'   => $EstadoHuesped,
                'FechaDesde'      => $FechaDesde,
                'FechaHasta'      => $FechaHasta
            );

            if ($ID_Huesped == '')
            {
                $this->huesped_model->insert($datos_array);
                redirect(base_url() . 'admin/huesped/lists/', 'refresh');
            }
            else
            {
                $this->huesped_model->update($ID_Huesped, $datos_array);
                redirect(base_url() . 'admin/huesped/lists/', 'refresh');
            }
        }
        else
        {
            $data['ID_Huesped']      = $ID_Huesped;
            $data['NombreHuesped']   = set_value('NombreHuesped');
            $data['ApellidoHuesped'] = set_value('ApellidoHuesped');
            $data['EmailHuesped']    = set_value('EmailHuesped');
            $data['TelefonoFijo']    = set_value('TelefonoFijo');
            $data['TelefonoCelular'] = set_value('TelefonoCelular');
            $data['Ciudad']          = set_value('Ciudad');
            $data['Provincia']       = set_value('Provincia');
            $data['NotasHuesped']    = set_value('NotasHuesped');
            $data['EstadoHuesped']   = set_value('EstadoHuesped');
            $data['FechaDesde']      = $this->gf->html_mysql(set_value('FechaDesde'));
            $data['FechaHasta']      = $this->gf->html_mysql(set_value('FechaHasta'));


            if ($ID_Huesped == '')
            {
                //Variables a pasar segun la vista
                $data['title'] = self::title_save_form;
                $data['view']  = "admin/huesped_form";
                $this->load->view('admin/templates/temp_menu', $data);
            }
            else
            {
                $data['title'] = self::title_update_form;
                $data['view']  = "abm_simple/huesped_form";
                $this->load->view('admin/templates/temp_menu', $data);
            }
        }
    }

    function lists()
    {
        $this->load->library('pagination');


        $NombreHuesped   = $this->input->get('NombreHuesped');
        $ApellidoHuesped = $this->input->get('ApellidoHuesped');
        //Array para convertirlo en url y luego pasarselo a la paginacion (para que no se repita de nuevo per_page)
        $get_array       = $this->input->get();
        $get_query       = "";
        if (is_array($get_array))
            $get_query       = http_build_query($get_array);

        //Paginacion
        $per_page = $this->input->get('per_page');
        if ($per_page == "")
            $per_page = 0;

        $n_pag = 30;

        $array_query_result = $this->huesped_model->huesped_filtro($NombreHuesped, $ApellidoHuesped, $per_page, $n_pag);
        $data['rows']       = $array_query_result['rows'];
        //Es el resultado de resultados de la consulta sin limit y todos los parametros correspondientes
        $result_number      = $array_query_result['total_count'];

        $this->config->load("pagination");
        $config["base_url"]   = base_url() . "admin/huesped/lists/?" . $get_query;
        $config["total_rows"] = $result_number;
        $config["per_page"]   = $n_pag;
        $this->pagination->initialize($config);
        $data["links"]        = $this->pagination->create_links();
        $data['title']        = self::title_list_form;
        $data['view']         = "admin/huesped/huesped_list";
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function mail_huesped($ID_Huesped = 0)
    {
        $this->load->library('parser');
        $pdf_path         = $this->config->item('base_path'); //$_SERVER["DOCUMENT_ROOT"] . "/pdfs/";
        $data['pdf_path'] = $pdf_path;
        $folders          = directory_map($pdf_path, 1);
        $data['folders']  = $folders;

        //Econtrar datos huesped
        $row_huesped = $this->huesped_model->find($ID_Huesped);

        $NombreHuesped   = $row_huesped['NombreHuesped'];
        $ApellidoHuesped = $row_huesped['ApellidoHuesped'];
        $FechaDesde      = $row_huesped['FechaDesde'];
        $FechaHasta      = $row_huesped['FechaHasta'];

        $mail_data['NombreHuesped']   = $NombreHuesped;
        $mail_data['ApellidoHuesped'] = $ApellidoHuesped;
        $mail_data['FechaDesde']      = $FechaDesde;
        $mail_data['FechaHasta']      = $FechaHasta;
        $data['mail_html']            = $this->parser->parse('admin/huesped/mail_html', $mail_data, true);
        $data['ID_Huesped']           = $ID_Huesped;
        $data['NotasHuesped']         = $row_huesped['NotasHuesped'];
        $data['title']                = "Mail huesped";
        $data['view']                 = "admin/huesped/huesped_mail";
        $data['js']                   = array('js/ckeditor/ckeditor', 'js/admin/huesped_mail');
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function huesped_fancy_list()
    {
        $NombreHuesped      = $this->input->get('NombreHuesped');
        $ApellidoHuesped    = $this->input->get('ApellidoHuesped');
        //Array para convertirlo en url y luego pasarselo a la paginacion (para que no se repita de nuevo per_page)
        $array_query_result = $this->huesped_model->huesped_filtro_fancy($NombreHuesped, $ApellidoHuesped);
        $data['rows']       = $array_query_result;
        $data['title']      = self::title_list_form;
        $data['view']       = "admin/huesped/huesped_fancy_list";
        $data['js']         = array('js/admin/huesped_fancy_list');
        $this->load->view('admin/templates/temp_simple', $data);
    }

    function mail_huesped_save()
    {
        $str_alo     = "";
        $alo_total   = $this->input->post('alo_total');
        $ID_Huesped  = $this->input->post('ID_Huesped');
        $mail_html   = $this->input->post('mail_html');
        $mail_asunto = $this->input->post('mail_asunto');

        $row_huesped = $this->huesped_model->find($ID_Huesped);
        $Nombre      = $row_huesped['NombreHuesped'];
        $Apellido    = $row_huesped['ApellidoHuesped'];
        $Email       = $row_huesped['EmailHuesped'];

        //Configuracion del mail
        $config['protocol']     = 'smtp';
        $config['smtp_host']    = 'mail.sanrafaellate.com.ar';
        $config['smtp_user']    = 'contacto@sanrafaellate.com.ar';
        $config['smtp_pass']    = 'Donato07';
        $config['smtp_timeout'] = '5';
        $config['mailtype']     = 'html';
        $config['newline']      = "\r\n";
        $config['crlf']         = "\r\n";
        $config['charset']      = 'utf-8';
        $this->load->library('email');
        $this->email->initialize($config);

        //Pdf path
        $pdf_path = $this->config->item('base_path');

        $pdf_full_path = "";
        $i             = 0;
        $str_alo       = "";
        for ($i = 1; $i <= $alo_total; $i++)
        {
            $alo_num = $this->input->post('alo_' . $i);
            if ($alo_num != "")
            {
                $pdf_full_path = $pdf_path . $alo_num;
                $this->email->attach($pdf_full_path);
                $str_alo       = $alo_num . "," . $str_alo;
            }
        }

        $mail_list = array($Email, 'enviados@sanrafaellate.com.ar');
        $this->email->from('contacto@sanrafaellate.com.ar', 'San Rafael Late');
        $this->email->to($mail_list);
        $this->email->subject($mail_asunto);
        $this->email->message($mail_html);
        $this->email->send();

        //Saco las comillas simples para qeu se pueda guardar en la bd
        $mail_html = str_replace("'", '"', $mail_html);

        //Borrar la ultima coma de los archivos
        $str_alo = substr($str_alo, 0, strlen($str_alo) - 1);

        $row_save = array(
            'ID_Huesped'   => $ID_Huesped,
            'ArchivosMail' => $str_alo,
            'MensajeMail'  => $mail_html,
            'AsuntoMail'   => $mail_asunto,
            'DireMail'     => $Email
        );

        $this->huesped_mail_model->insert($row_save);

        $this->huesped_model->update_estado('respondido', $ID_Huesped);

        redirect(base_url() . "admin/huesped/lists", 'refresh');
    }

    function delete($id)
    {
        $this->huesped_model->delete($id);
        redirect(base_url() . 'admin/huesped/lists/', 'refresh');
    }

    function prueba_fancy()
    {
        $data['title'] = self::title_list_form;
        $data['view']  = "admin/huesped/prueba_fancy";
        $data['js']    = array(
            'js/fancybox/jquery.fancybox-1.3.4',
            'js/admin/prueba_fancy'
        );
        $data['css'] = array('js/fancybox/jquery.fancybox-1.3.4');
        $this->load->view('admin/templates/temp_simple', $data);
    }

}

?>
