<?php

class Full_calendar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/full_calendar_model');
        $this->load->library('gf');
    }

    function index()
    {
        
    }

    function fullcalendar_hab()
    {
        $ID_Alojamiento = $this->input->get('ID_Alojamiento');
        $ID_Habitacion  = $this->input->get('ID_Habitacion');
        $fecha_desde    = $this->input->get('fecha_desde');

        if($fecha_desde=="")
        {
            $fecha_desde = date('Y-m-d');
        }

        $data['hab_array']      = $this->full_calendar_model->habitaciones_alojamientos($ID_Alojamiento);
        $data['ID_Alojamiento'] = $ID_Alojamiento;
        $data['ID_Habitacion']  = $ID_Habitacion;
        $data['fecha_desde']    = $fecha_desde;
        $data['js']             = array(
            'js/full_calendar-1.6.1/jquery/jquery-1.9.1.min',
            'js/full_calendar-1.6.1/jquery/jquery-ui-1.10.2.custom.min',
            'js/full_calendar-1.6.1/fullcalendar/fullcalendar.min',
            'js/jquery-ui/development-bundle/ui/jquery.ui.core',
            'js/jquery-ui/development-bundle/ui/jquery.ui.widget',
            'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker',
            'js/admin/full_calendar_hab'
        );
        $data['css'] = array(
            'js/jquery-ui/development-bundle/themes/base/jquery.ui.all',
            'js/full_calendar-1.6.1/fullcalendar/fullcalendar',
        );
        $data['css_media']=array('js/full_calendar-1.6.1/fullcalendar/fullcalendar.print');
        $data['title']="full calendar";
        $data['view'] = "admin/full_calendar/full_calendar_hab";
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function json_hab()
    {
        $ID_Habitacion  = $this->input->get('ID_Habitacion');
        $ID_Alojamiento = $this->input->get('ID_Alojamiento');
        $fecha_get      = $this->input->get('fecha_desde');

        $rows  = $this->full_calendar_model->habitacion_find($ID_Alojamiento,$ID_Habitacion);

        if ($fecha_get == "")
        {
            $fecha_get = date('Y-m-d');
        }
        else
        {
            $fecha_get = $fecha_get;
        }

        $rows = $this->full_calendar_model->cal_calendario_data($ID_Alojamiento,$ID_Habitacion,$fecha_get);

        $cal_array = array();
        $cal_final_array = array();
        foreach ($rows as $var)
        {
            $cal_array = array(
                'id'    => $var['id_habitacion'],
                'title' => "normal ($" . $var['tarifa_normal'] . ")",
                'start' => $var['fecha'],
            );
            array_unshift($cal_final_array, $cal_array);
        }

        echo json_encode($cal_final_array);
    }

    /* Codigo para muchas habitaciones
      function fullcalendar($ID_Alojamiento = 0)
      {
      $data['ID_Alojamiento'] = $ID_Alojamiento;
      $this->load->view('admin/full_calendar/full_calendar', $data);
      }

      function json($ID_Alojamiento = 0)
      {

      $colores[1]  = '#dc8495';
      $colores[2]  = '#703ecb';
      $colores[3]  = '#70bacb';
      $colores[4]  = '#e5ec70';
      $colores[5]  = '#b4b77e';
      $colores[6]  = '#76e7e0';
      $colores[7]  = '#4ea262';
      $colores[8]  = '#b571c1';
      $colores[9]  = '#f3f0c0';
      $colores[10] = '#9d2672';

      $query = sprintf("select * from alojamientos_habitaciones where ID_Alojamiento=%s", $ID_Alojamiento);
      $rows  = $this->db->query($query);
      $rows  = $rows->result_array();

      $count          = 0;
      $array_color[3] = "";
      foreach ($rows as $var)
      {
      $count++;
      $array_color[$var['ID_Habitacion']] = $colores[$count];
      }

      $query = sprintf("select
     *
      from
      cal_calendario cc
      inner join
      alojamientos_habitaciones ah ON cc.id_habitacion = ah.ID_Habitacion
      where
      ah.ID_Alojamiento = %s and cc.cant_disponible>0 and tarifa_normal>0;", $ID_Alojamiento);

      $rows = $this->db->query($query);
      $rows = $rows->result_array();

      $cal_array = array();
      $cal_final_array = array();
      foreach ($rows as $var)
      {
      $cal_array = array(
      'id'    => $var['id_habitacion'],
      'title' => "normal ($" . $var['tarifa_normal'] . ")",
      'start' => $var['fecha'],
      'color' => $array_color[$var['id_habitacion']]
      );

      array_unshift($cal_final_array, $cal_array);
      }
      echo json_encode($cal_final_array);
      }

     */
}

?>
