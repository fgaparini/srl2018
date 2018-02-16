<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calendar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/calendar_model');
        $this->load->model('admin/habitaciones_model');
        $this->load->library('gf');
    }

    function index()
    {
        $id_habitacion  = $this->input->get('id_habitacion');
        $id_alojamiento = $this->input->get('id_alojamiento');

        $rango        = $this->input->get('rango');
        $operacion    = $this->input->get('operacion');
        $cant         = $this->input->get('cant');
        $fecha        = $this->input->get('fecha');
        $fecha_inicio = "";
        $fecha_fin    = "";

        //$fecha_actual = date('Y-m-d');
        if ($rango == '')
        {
            $rango     = 15;
            $cant      = 1;
            $operacion = 'suma';
            $fecha     = date('Y-m-d');
        }

        //Calculo el rango de dia deseado
        if ($operacion == 'suma')
        {
            $fecha_inicio = $fecha;
            $fecha_fin    = strtotime('+' . $rango . ' day', strtotime($fecha_inicio));
            $fecha_fin    = date('Y-m-d', $fecha_fin);
        }
        else if ($operacion == 'resta')
        {
            $fecha_fin              = $fecha;
            $fecha_inicio           = strtotime('-' . $rango . ' day', strtotime($fecha_fin));
            $fecha_inicio           = date('Y-m-d', $fecha_inicio);
        }
        $row_habitaciones       = $this->habitaciones_model->find($id_habitacion);
        $data['NombreHab']      = $row_habitaciones['NombreHab'];
        $data['id_alojamiento'] = $id_alojamiento;
        $data['id_habitacion']  = $id_habitacion;
        $data['rango']          = $rango;
        $data['cant']           = $cant;
        $data['operacion']      = $operacion;
        $data['fecha']          = $fecha;
        $data['siguiente']      = base_url() . "admin/calendar/?rango=" . $rango . "&operacion=resta&cant=" . $cant . "&fecha=" . $fecha_inicio . "&id_habitacion=" . $id_habitacion . "&id_alojamiento=" . $id_alojamiento;
        $data['anterior']       = base_url() . "admin/calendar/?rango=" . $rango . "&operacion=suma&cant=" . $cant . "&fecha=" . $fecha_fin . "&id_habitacion=" . $id_habitacion . "&id_alojamiento=" . $id_alojamiento;
        $data['fechas']         = $this->calendar_model->fecha_rango($fecha_inicio, $fecha_fin);
        $data['title']          = "Calendario";

        $data['view'] = 'admin/calendar/calendar_view';
        $data['css']  = array(
            'js/jquery-ui/development-bundle/themes/base/jquery.ui.all',
            'js/fancybox/jquery.fancybox-1.3.4'
        );
        $data['js'] = array(
            'js/jquery-ui/development-bundle/ui/jquery.ui.core',
            'js/jquery-ui/development-bundle/ui/jquery.ui.widget',
            'js/jquery-ui/development-bundle/ui/jquery.ui.position',
            'js/jquery-ui/development-bundle/ui/jquery.ui.menu',
            'js/jquery-ui/development-bundle/ui/jquery.ui.autocomplete',
            'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker',
            'js/fancybox/jquery.fancybox-1.3.4',
            'js/admin/calendar_view'
        );
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function save()
    {
        $fecha_desde    = $this->gf->html_mysql($this->input->post('fecha_desde'));
        $fecha_hasta    = $this->gf->html_mysql($this->input->post('fecha_hasta'));
        $asignada       = $this->input->post('asignada');
        $minima         = $this->input->post('minima');
        $normal         = $this->input->post('normal');
        $oferta         = $this->input->post('oferta');
        $bloqueo        = $this->input->post('bloqueo');
        $id_alojamiento = $this->input->post('id_alojamiento');
        $rango          = $this->input->post('rango');
        $operacion      = $this->input->post('operacion');
        $cant           = $this->input->post('cant');
        $fecha          = $this->input->post('fecha');

        //Bloqueo se convierte en estos valores
        if ($bloqueo == 'C')
            $bloqueo = 'C';
        else
            $bloqueo = 'A';

        //hidden
        $id_habitacion = $this->input->post('id_habitacion');
        $fechas        = $this->calendar_model->fecha_rango($fecha_desde, $fecha_hasta);

        //Definir variables que van a usarse dentro del for
        $disponible = "";
        foreach ($fechas as $var)
        {
            if ($this->calendar_model->dia_count($var['fecha'], $id_habitacion))
            {
                //actualizar
                $row        = $this->calendar_model->dia_tarifa($var['fecha'], $id_habitacion);
                $disponible = $asignada - $row['cant_reservada'];

                $this->calendar_model->update_query($id_habitacion, $var['fecha'], $asignada, $minima, $normal, $oferta, $bloqueo, $disponible);
            }
            else
            {
                $disponible = $asignada;
                //insertar
                $datos      = array(
                    'id_habitacion'   => $id_habitacion,
                    'fecha'           => $var['fecha'],
                    'cant_asignada'   => $asignada,
                    'cant_disponible' => $disponible,
                    'estancia_minima' => $minima,
                    'tarifa_normal'   => $normal,
                    'tarifa_oferta'   => $oferta,
                    'estado_bloqueo'  => $bloqueo,
                );

                $this->calendar_model->insert($datos);
            }
        }
        redirect(base_url() . "admin/calendar/?rango=" . $rango . "&operacion=".$operacion."&cant=" . $cant . "&fecha=" . $fecha . "&id_habitacion=" . $id_habitacion . "&id_alojamiento=" . $id_alojamiento, 'refresh');
    }

    function fancy_form()
    {
        $id_habitacion = $this->input->get('id_habitacion');
        $fecha         = $this->input->get('fecha');

        //Para el paginado (osea siguiente o anterior)
        $rango     = $this->input->get('rango');
        $fecha_fin = $this->input->get('fecha_fin');
        $cant      = $this->input->get('cant');
        $operacion = $this->input->get('operacion');


        $data['rango']     = $rango;
        $data['fecha_fin'] = $fecha_fin;
        $data['cant']      = $cant;
        $data['operacion'] = $operacion;

        if ($this->calendar_model->dia_count($fecha, $id_habitacion))
        {
            $row                   = $this->calendar_model->dia_tarifa($fecha, $id_habitacion);
            $data['asignada']      = $row['cant_asignada'];
            $data['minima']        = $row['estancia_minima'];
            $data['normal']        = $row['tarifa_normal'];
            $data['oferta']        = $row['tarifa_oferta'];
            $data['bloqueo']       = $row['estado_bloqueo'];
            $data['fecha']         = $row['fecha'];
            $data['id_habitacion'] = $row['id_habitacion'];
        }
        else
        {
            $data['asignada']      = 0;
            $data['minima']        = 0;
            $data['normal']        = 0;
            $data['oferta']        = 0;
            $data['bloqueo']       = '';
            $data['fecha']         = $fecha;
            $data['id_habitacion'] = $id_habitacion;
        }

        $data['title'] = "fancy form";
        $data['view']  = 'admin/calendar/calendar_fancy_form';
        $data['js']    = array('js/admin/calendar_fancy_form');
        $this->load->view('admin/templates/temp_simple', $data);
    }

    function fancy_form_save()
    {
        $id_habitacion = $this->input->post('id_habitacion');
        $fecha         = $this->input->post('fecha');
        $asignada      = $this->input->post('asignada');
        $minima        = $this->input->post('minima');
        $normal        = $this->input->post('normal');
        $oferta        = $this->input->post('oferta');
        $bloqueo       = $this->input->post('bloqueo');

        //Bloqueo se convierte en estos valores
        if ($bloqueo == 'C')
            $bloqueo = 'C';
        else if ($bloqueo == '')
            $bloqueo = 'A';



        if ($this->calendar_model->dia_count($fecha, $id_habitacion))
        {
            //actualizar
            $row        = $this->calendar_model->dia_tarifa($fecha, $id_habitacion);
            $disponible = $asignada - $row['cant_reservada'];

            $this->calendar_model->update_query($id_habitacion, $fecha, $asignada, $minima, $normal, $oferta, $bloqueo, $disponible);
        }
        else
        {
            $disponible = $asignada;
            //insertar
            $datos      = array(
                'id_habitacion'   => $id_habitacion,
                'fecha'           => $fecha,
                'cant_asignada'   => $asignada,
                'cant_disponible' => $disponible,
                'estancia_minima' => $minima,
                'tarifa_normal'   => $normal,
                'tarifa_oferta'   => $oferta,
                'estado_bloqueo'  => $bloqueo,
            );

            $this->calendar_model->insert($datos);
        }


        echo "true";
    }

}

?>