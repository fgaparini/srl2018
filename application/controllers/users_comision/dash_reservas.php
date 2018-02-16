<?php

class Dash_reservas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('gf');
        $this->load->library('sf');
        $this->load->model('user_comision/alojamientos_habitaciones_model');
        $this->load->model('user_comision/reservas_det_model');
        $this->load->model('user_comision/cal_calendario_model');
        $this->load->model('user_comision/reserva_dat_model');
        $this->load->model('user_comision/huesped_model');
        $this->load->model('user_comision/alojamientos_model');
    }

    function lists()
    {
    $data['Usuario'] = $a["NombreCliente"];
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);

        $ID_Alojamiento = $a['ID_Alojamiento'];
$data['ID_Alojamiento'] = $ID_Alojamiento;

        $get_array = $this->input->get();
        $get_query = "";
        if (is_array($get_array))
            $get_query = http_build_query($get_array);

        //Paginacion
        $per_page = $this->input->get('per_page');
        if ($per_page == "")
            $per_page = 0;

        $n_pag = 30;

        $result_array  = $this->reserva_dat_model->reservas_list_pag($ID_Alojamiento, $per_page, $n_pag);
        $result_number = $result_array['total_count'];

        $config["base_url"]   = base_url() . "users_comision/dash_reservas/lists/?" . $get_query;
        $config["total_rows"] = $result_number;
        $config["per_page"]   = $n_pag;

        $config['num_links']         = 2;
        $config['use_page_numbers']  = FALSE;
        $config['page_query_string'] = TRUE;
        $config['full_tag_open']     = '<div class="block-controls"><ul class="controls-buttons">';
        $config['full_tag_close']    = '</ul></div>';
        $config['first_link']        = '&laquo; Primer';
        $config['first_tag_open']    = '<li >';
        $config['first_tag_close']   = '</li>';
        $config['last_link']         = 'último &raquo;';
        $config['last_tag_open']     = '<li >';
        $config['last_tag_close']    = '</li>';
        $config['next_link']         = 'siguiente &rarr;';
        $config['next_tag_open']     = '<li >';
        $config['next_tag_close']    = '</li>';
        $config['prev_link']         = '&larr; anterior';
        $config['prev_tag_open']     = '<li >';
        $config['prev_tag_close']    = '</li>';
        $config['cur_tag_open']      = '<li ><a class="current" href="">';
        $config['cur_tag_close']     = '</a></li>';
        $config['num_tag_open']      = '<li>';
        $config['num_tag_close']     = '</li>';

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        $data['reservas']  = $result_array['rows'];
        $data['titlepage'] = "Listado reservas";
        $data['view']      = 'users_comision/reservas_list';
        $data['js']        = array(
            'js/colorbox/jquery.colorbox-min',
            'js/users/dash_reservas_list'
        );
        $data['css'] = array(
            'js/colorbox/example1/colorbox',
        );
        $this->load->view('users_comision/templates/temp_menu', $data);
    }

    function reservas_estado_ajax()
    {
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);
            $data['Usuario'] = $a["NombreCliente"];
        $Localizador    = $this->input->post('Localizador');
        $estado_reserva = $this->input->post('estado_reserva');

        if ($estado_reserva == 'pendiente')
        {
            $estado_reserva = 'P';
        }
        else if ($estado_reserva == 'reservado')
        {
            $estado_reserva = 'R';
        }
        else if ($estado_reserva == 'checkin')
        {
            $estado_reserva = 'CH';
        }

        $query = sprintf("update reserva_dat set estado_reserva='%s' where Localizador='%s'", $estado_reserva, $Localizador);
        $this->db->query($query);

        echo 'ok';
    }

    function reservas_eliminar_ajax()
    {
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);
            $data['Usuario'] = $a["NombreCliente"];
        $Localizador = $this->input->post('Localizador');

        $query = sprintf("select * from reserva_dat where Localizador='%s'", $Localizador);
        $rows  = $this->db->query($query);
        $rows  = $rows->row_array();

        $fecha_ingreso = $rows['fecha_ingreso'];
        $fecha_salida  = $rows['fecha_salida'];

        $query = sprintf("select id_habitacion from reservas_det where Localizador=%s group by id_habitacion;", $Localizador);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();

        foreach ($rows as $var)
        {
            $query = sprintf("update cal_calendario set cant_disponible = cant_disponible+1, cant_reservada=cant_reservada-1 where id_habitacion=%s and fecha>='%s' and fecha<'%s'", $var['id_habitacion'], $fecha_ingreso, $fecha_salida);
            $this->db->query($query);
        }

        $query = sprintf("delete from reserva_dat where Localizador='%s'", $Localizador);
        $this->db->query($query);

        $query = sprintf("delete from reservas_det where Localizador='%s'", $Localizador);
        $this->db->query($query);

        echo "ok";
    }

    function reservas_form()
    {
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);
        
        $ID_Alojamiento = $a['ID_Alojamiento']; //Este va a venir por sessiones
        //Busco todas las habitaciones para el select
        $hab_rows       = $this->alojamientos_habitaciones_model->habitaciones_alojamiento($ID_Alojamiento);
    $data['Usuario'] = $a["NombreCliente"];
        $data['hab_rows']       = $hab_rows;
        $data['ID_Alojamiento'] = $ID_Alojamiento;
        $data['titlepage']      = "Titulo Pagina";
        $data['view']           = 'users_comision/reservas_form_comision';
        $data['css']            = array(
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
            'js/users/reservas_form_comision'
        );
        $this->load->view('users_comision/templates/temp_menu', $data);
    }

    function fancy_reservas_pago()
    {
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);
        
        $Localizador        = $this->input->get('id_reserva');
        $row                = $this->reserva_dat_model->find($Localizador);
        $data['monto_pago'] = $this->reserva_dat_model->find_localizador($Localizador);
        $data['id_reserva'] = $Localizador;
        $data['titlepage']  = "Fancy";
        $data['js']         = array('js/users/fancy_reservas_pago');
        $data['view'] = 'users_comision/fancy_reservas_pago';
        $this->load->view('users_comision/templates/temp_simple', $data);
    }

    function fancy_reserva_pago_save_ajax()
    {
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);
        
        $Localizador = $this->input->post('Localizador');
        $monto_pago  = $this->input->post('monto_pago');

        $query = sprintf("update reserva_dat set monto_pago=%s where Localizador='%s'", $monto_pago, $Localizador);
        $this->db->query($query);

        echo "ok";
    }

    function reservas_save()
    {
        
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);

        $ID_Alojamiento = $this->input->post('ID_Alojamiento');

        $ID_Habitacion  = $this->input->post('ID_Habitacion');
        $cant_pasajeros = $this->input->post('cant_pasajeros');
        $costo_total    = $this->input->post('costo_total');
        $observaciones  = $this->input->post('observaciones');
        $observaciones  = $this->input->post('observaciones');

        $NombreHuesped   = $this->input->post('NombreHuesped');
        $ApellidoHuesped = $this->input->post('ApellidoHuesped');
        $TelefonoFijo    = $this->input->post('TelefonoFijo');
        $TelefonoCelular = $this->input->post('TelefonoCelular');
        $EmailHuesped    = $this->input->post('EmailHuesped');

        $fecha_ingreso_post = $this->input->post('fecha_ingreso');
        $fecha_salida_post  = $this->input->post('fecha_salida');

        //calculo la cantidad de dias
        $cant_dias = $this->gf->cantidad_dias($fecha_ingreso_post, $fecha_salida_post);

        //paso la fecha para que mysql lo entienda
        $fecha_ingreso = $this->gf->html_mysql($fecha_ingreso_post);
        $fecha_salida  = $this->gf->html_mysql($fecha_salida_post);

        $huesped_array = array(
            'NombreHuesped'   => $NombreHuesped,
            'ApellidoHuesped' => $ApellidoHuesped,
            'TelefonoFijo'    => $TelefonoFijo,
            'TelefonoCelular' => $TelefonoCelular,
            'EmailHuesped'    => $EmailHuesped
        );

        $ID_Huesped = $this->huesped_model->insert($huesped_array);

        $UltimaReserva_ID = $this->reserva_dat_model->count_all();
        $UltimaReserva_ID = $UltimaReserva_ID + 1;

        //Buscar el nombre del alojamiento
        $NombreAlojamiento = $this->alojamientos_model->nombre_alojamiento($ID_Alojamiento);

        $reserva_dat_array = array(
            'id_huesped'     => $ID_Huesped,
            'fecha_ingreso'  => $fecha_ingreso,
            'fecha_salida'   => $fecha_salida,
            'alojamiento_id' => $ID_Alojamiento,
            'cant_pasajeros' => $cant_pasajeros,
            'estado_reserva' => 'P',
            'observaciones'  => $observaciones,
            'costo_total'    => $costo_total,
            'cantidad_hab'   => 1,
            'Localizador'    => $UltimaReserva_ID,
            'cant_dias'      => $cant_dias,
            'web_reserva'    => $NombreAlojamiento,
            'fecha_reserva'  => date('Y-m-d')
        );

        $reservas_id = $this->reserva_dat_model->insert($reserva_dat_array);

        $rows_fechas = $this->cal_calendario_model->list_fechas($fecha_ingreso, $fecha_salida,$ID_Habitacion);

        //Diferencia de dias entre fechas tomando el menor al final
        $cant_dias = $this->gf->cantidad_dias($fecha_ingreso, $fecha_salida);

        foreach ($rows_fechas as $var)
        {
            $reservas_det_array = array(
                'Localizador'   => $UltimaReserva_ID,
                'id_habitacion' => $ID_Habitacion,
                'fecha_reserva' => $var['fecha'],
                'cant_reserva'  => 1,
                'tarifa'        => $var['tarifa_normal'],
                'tarifa_oferta' => $var['tarifa_oferta'],
                'num_hab'       => 1
            );
            //Inserto en reserva det los dias de reserva
            $this->reservas_det_model->insert($reservas_det_array);

            //Actualizo el estado de la disponibilidad a 0 en cal_calendario
            $this->cal_calendario_model->update_disponibilidad($var['fecha'], $ID_Habitacion);
        }
    $data['Usuario'] = $a["NombreCliente"];
        redirect(base_url() . "users_comision/dash_comision/main/", 'refresh');
    }

    function ajax_precio_habitacion()
    {
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);
        
        $post_fecha_ingreso = $this->input->post('fecha_ingreso');
        $post_fecha_salida  = $this->input->post('fecha_salida');

        $fecha_ingreso = $this->gf->html_mysql($post_fecha_ingreso);
        $fecha_salida  = $this->gf->html_mysql($post_fecha_salida);
        $ID_Habitacion = $this->input->post('ID_Habitacion');

        if ($fecha_ingreso != "" && $fecha_salida != "")
        {
            $total = $this->cal_calendario_model->sum_total_diponibilidad($fecha_ingreso, $fecha_salida, $ID_Habitacion);
            echo json_encode($total);
        }
        else
        {
            $result = "false";
            echo json_encode($result);
        }
    }


}

?>
