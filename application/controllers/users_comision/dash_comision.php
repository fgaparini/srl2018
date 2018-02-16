<?php

class Dash_comision extends CI_Controller
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

    function main()
    {
        $a              = $this->session->userdata('users_comision_in');
      
        $this->sf->ses_comp_rol($a);
        $data['Usuario'] = $a["NombreCliente"];
        $ID_Alojamiento = $a['ID_Alojamiento']; //Este va a venir por sessiones
        //Busco todas las habitaciones para el select
        $hab_rows       = $this->alojamientos_habitaciones_model->habitaciones_alojamiento($ID_Alojamiento);

        $meses = array(
            'Enero'                 => '01', 
            'Febrero'               => '02', 
            'Marzo'                 => '03', 
            'Abril'                 => '04',
            'Mayo'                  => '05',
            'Junio'                 => '06', 
            'Julio'                 => '07', 
            'Agosto'                => '08', 
            'Septiembre'            => '09', 
            'Octubre'               => '10', 
            'Noviembre'             => '11', 
            'Diciembre'             => '12'
            );

        $data['mes_actual']     = date('m');
        $data['meses']          = $meses;
        $data['hab_rows']       = $hab_rows;
        $data['ID_Alojamiento'] = $ID_Alojamiento;
        $data['titlepage']      = "DashBoard - Sistema de Administracion de Alojamientos - SAN RAFAEL LATE";

        $data['js'] = array(
            'js/full_calendar-1.6.1/jquery/jquery-1.9.1.min',
            'js/full_calendar-1.6.1/jquery/jquery-ui-1.10.2.custom.min',
            'js/full_calendar-1.6.1/fullcalendar/fullcalendar.min',
            'js/jquery-ui/development-bundle/ui/jquery.ui.core',
            'js/jquery-ui/development-bundle/ui/jquery.ui.widget',
            'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker',
            'js/colorbox/jquery.colorbox-min',
            'js/users/dash_comision_main'
        );
        $data['script'] = array(
            'https://www.google.com/jsapi'
        );

        $data['css'] = array(
            'js/jquery-ui/development-bundle/themes/base/jquery.ui.all',
            'js/full_calendar-1.6.1/fullcalendar/fullcalendar',
            'js/colorbox/example1/colorbox'
        );

        $data['css_media'] = array('js/full_calendar-1.6.1/fullcalendar/fullcalendar.print');
        $data['view'] = 'users_comision/dash_main_comision';
        $this->load->view('users_comision/templates/temp_menu', $data);
    }

    function fancy_dash_comision()
    {
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);
            $data['Usuario'] = $a["NombreCliente"];
        $id_reserva = $this->input->get('id_reserva');

        $data['id_reserva']=$id_reserva;
        $data['rows_hab'] = $this->reserva_dat_model->reserva_nombre_hab($id_reserva);

        $data['titlepage'] = "Fancy";
        $data['view']      = 'users_comision/fancy_dash_comision';
        $data['reserva']   = $this->reserva_dat_model->reserva_inner_huesped($id_reserva);

        $this->load->view('users_comision/templates/temp_simple', $data);
    }
    
    function dash_reservas_pdf()
    {
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);
            $data['Usuario'] = $a["NombreCliente"];
        $this->load->library('tcpdf'); //tcpdf
        $id_reserva = $this->input->get('id_reserva');
        $data['id_reserva']=$id_reserva;
        $data['rows_hab'] = $this->reserva_dat_model->reserva_nombre_hab($id_reserva);
        $data['titlepage'] = "Fancy";
        $data['reserva']   = $this->reserva_dat_model->reserva_inner_huesped($id_reserva);
        //$this->load->view('users_comision/dash_reservas_pdf', $data);

        
        $this->load->library('tcpdf'); //tcpdf
        // $pdf = new TCPDF ( "P" , "mm" , "A4" , true , 'windows-1252' , false ) ;
        //$pdf = new TCPDF ( "P" , "mm" , "Legal" , true , 'UTF-8' , false ) ;
        $pdf = new TCPDF("P", "mm", "A4", true, 'UTF-8', false);

        $pdf->setPrintHeader(false); //no imprime la cabecera ni la linea
        $pdf->setPrintFooter(false); // imprime el pie ni la linea      
        // ---------------------------------------------------------  
        // set default font subsetting mode  
        $pdf->setFontSubsetting(true);

        // Set font  
        // dejavusans is a UTF-8 Unicode font, if you only need to  
        // print standard ASCII chars, you can use core fonts like  
        // helvetica or times to reduce file size.  
        $pdf->SetFont('dejavusans', '', 8.5, '', true);

        // Add a page  
        // This method has several options, check the source code documentation for more information.  
        $pdf->AddPage();
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $html = $this->load->view('users_comision/dash_reservas_pdf', $data, true);

        $pdf->writeHTML($html, false, true, false);

        $pdf->Output('Reserva pdf');
        
        
        
    }

    function ajax_reservas_calendario()
    {
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);
            $data['Usuario'] = $a["NombreCliente"];
        $ID_Alojamiento = $this->input->get('ID_Alojamiento');
        $ID_Habitacion  = $this->input->get('ID_Habitacion');

        $reservas = $this->reserva_dat_model->find_json_reserva($ID_Alojamiento, $ID_Habitacion);

        $cal_array = array();
        $cal_final_array = array();
        $color = "";
        foreach ($reservas as $var)
        {

            if ($var['web_reserva'] == 'SRL')
            {
                $color = '#FF66FF';
            }
            else
            {
                if ($var['estado_reserva'] == 'P')
                {
                    $color = '#FF9900';
                }
                elseif ($var['estado_reserva'] == 'R')
                {
                    $color = '#98ab1a';
                }
                elseif ($var['estado_reserva'] == 'CH')
                {
                    $color = '#3399CC';
                }
            }
            
            //Le resto 1 dia para que se vea bien en el calendario la fecha de reserva y no el chek-out
            $fecha_salida = $var['fecha_salida'];
            $fecha_salida = date("Y-m-d",  strtotime($fecha_salida." - 1 day"));
            
            

            $cal_array = array(
                'id'    => $var['Localizador'],
                'title' => $var['ApellidoHuesped'] . " " . $var['NombreHuesped'],
                'start' => $var['fecha_ingreso'],
                'end'   => $fecha_salida,
                'color' => $color
            );
            array_unshift($cal_final_array, $cal_array);
        }

        echo json_encode($cal_final_array);
    }

    function ajax_diagrama()
    {
        $a              = $this->session->userdata('users_comision_in');
        $this->sf->ses_comp_rol($a);
            $data['Usuario'] = $a["NombreCliente"];
        $ID_Alojamiento = $this->input->get('ID_Alojamiento');
        $ID_Habitacion  = $this->input->get('ID_Habitacion');
        $mes            = $this->input->get('mes');
        $ano            = $this->input->get('ano');

        //Saber los dias del mes 
        $fecha      = '01-' . $mes . "-2013";
        $timestamp  = strtotime($fecha);
        $diasdelmes = date("t", $timestamp);

        $query = sprintf('select 
                            cant_dias as cantidad
                       from
                           reserva_dat rd,
                           reservas_det rt
                       where
                           rd.alojamiento_id = %s
                               and
                               rt.Localizador=rd.Localizador
                               and

                               MONTH(rd.fecha_ingreso)=%s
                               and 
                                YEAR(rd.fecha_ingreso)=%s
                               group by rt.id_habitacion ;', $ID_Alojamiento, $mes,$ano);


        $rows = $this->db->query($query);
        $rows = $rows->result_array();

        $ocupado = 0;
        foreach ($rows as $var)
        {
            $ocupado = $var['cantidad'] + $ocupado;
        }


        $query = sprintf("select count(*) as cant_hab from alojamientos_habitaciones where ID_Alojamiento=%s", $ID_Alojamiento);
        $rows  = $this->db->query($query);
        $rows  = $rows->row_array();

        $cant_hab = $rows['cant_hab'];

        $total_mes = $cant_hab * $diasdelmes;

        $libre  = $total_mes - $ocupado;
        $return = array('ocupado' => $ocupado, 'libre'   => $libre);

        echo json_encode($return);
    }

}

?>
