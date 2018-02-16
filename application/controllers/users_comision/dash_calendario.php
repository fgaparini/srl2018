<?php

class Dash_calendario extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('gf');
        $this->load->library('sf');
        $this->load->model('user_comision/alojamientos_habitaciones_model');
        $this->load->model('user_comision/reservas_det_model');
        $this->load->model('user_comision/cal_calendario_model');
        $this->load->model('user_comision/reserva_dat_model');
        $this->load->model('user_comision/huesped_model');
    }

    function calendario_form()
    {
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);
            $data['Usuario'] = $a["NombreCliente"];
        $ID_Alojamiento = $a['ID_Alojamiento']; //Este va a venir por sessiones
        //Busco todas las habitaciones para el select
        $hab_rows       = $this->alojamientos_habitaciones_model->habitaciones_alojamiento($ID_Alojamiento);

        $data['hab_rows']       = $hab_rows;
        $data['ID_Alojamiento'] = $ID_Alojamiento;
        $data['titlepage']      = "Titulo Pagina";
        $data['view']           = 'users_comision/calendario_form_comision';
        $data['js']             = array(
            'js/full_calendar-1.6.1/jquery/jquery-1.9.1.min',
            'js/full_calendar-1.6.1/jquery/jquery-ui-1.10.2.custom.min',
            'js/full_calendar-1.6.1/fullcalendar/fullcalendar.min',
            'js/jquery-ui/development-bundle/ui/jquery.ui.core',
            'js/jquery-ui/development-bundle/ui/jquery.ui.widget',
            'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker',
            'js/users/calendario_form_comision'
        );

        $data['css'] = array(
            'js/jquery-ui/development-bundle/themes/base/jquery.ui.all',
            'js/full_calendar-1.6.1/fullcalendar/fullcalendar'
        );

        $data['css_media'] = array('js/full_calendar-1.6.1/fullcalendar/fullcalendar.print');

        $this->load->view('users_comision/templates/temp_menu', $data);
    }

    function ajax_calendario()
    {
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);
        
        $ID_Habitacion  = $this->input->get('ID_Habitacion');
        $ID_Alojamiento = $this->input->get('ID_Alojamiento');
        $fecha_get      = $this->input->get('fecha_desde');

    $data['Usuario'] = $a["NombreCliente"];

        if ($fecha_get == "")
        {
            $fecha_get = date('Y-m-d');
        }
        else
        {
            $fecha_get = $fecha_get;
        }

        $rows = $this->cal_calendario_model->cal_calendario_data($ID_Alojamiento, $ID_Habitacion, $fecha_get);



        $cal_array1 = array();
        $cal_array2 = array();
        $cal_final_array = array();
        foreach ($rows as $var)
        {

            if ($var['tarifa_oferta'] != 0)
            {
                $cal_array1 = array(
                    'id'        => $var['id_habitacion'],
                    'title'     => "$" . $var['tarifa_oferta'],
                    'start'     => $var['fecha'],
                    'textColor' => '#FF9900',
                    'color'     => '#FFF'
                );
                array_unshift($cal_final_array, $cal_array1);
            }
            $cal_array2 = array(
                'id'        => $var['id_habitacion'],
                'title'     => "$" . $var['tarifa_normal'],
                'start'     => $var['fecha'],
                'textColor' => '#3399CC',
                'color'     => '#FFF'
            );

            array_unshift($cal_final_array, $cal_array2);
        }

        echo json_encode($cal_final_array);
    }

    function calendario_save()
    {
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);
            $data['Usuario'] = $a["NombreCliente"];
        $fecha_desde = $this->gf->html_mysql($this->input->post('fecha_desde'));
        $fecha_hasta = $this->gf->html_mysql($this->input->post('fecha_hasta'));
        $normal      = $this->input->post('precio_normal');
        $oferta      = $this->input->post('precio_oferta');



        //hidden
        $id_habitacion = $this->input->post('ID_Habitacion');
        $fechas        = $this->cal_calendario_model->fecha_rango($fecha_desde, $fecha_hasta);

        //Definir variables que van a usarse dentro del for
        $disponible = "";
        foreach ($fechas as $var)
        {
            if ($this->cal_calendario_model->dia_count($var['fecha'], $id_habitacion))
            {
                //actualizar
                $row = $this->cal_calendario_model->dia_tarifa($var['fecha'], $id_habitacion);

                if ($row['cant_disponible'] > 0)
                {
                    $disponible = '';
                }
                else
                {
                    $disponible = '1';
                }


                $this->cal_calendario_model->update_query($id_habitacion, $var['fecha'], $normal, $oferta, $disponible);
            }
            else
            {
                //insertar
                $datos = array(
                    'id_habitacion'   => $id_habitacion,
                    'fecha'           => $var['fecha'],
                    'cant_asignada'   => '1',
                    'cant_disponible' => '1',
                    'estancia_minima' => '',
                    'tarifa_normal'   => $normal,
                    'tarifa_oferta'   => $oferta,
                    'estado_bloqueo'  => 'A',
                );

                $this->cal_calendario_model->insert($datos);
            }
        }
        redirect(base_url() . "users_comision/dash_calendario/calendario_form", 'refresh');
    }

}

?>
