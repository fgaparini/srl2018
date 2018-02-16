<?php

class Mailreserva extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //$this->load->library('gf');
    }

    function chango()
    {
        echo "chango";
    }

    function index($tipo='alojamiento')
    {
        
        $data['enviar_tipo']           = $tipo; //alojamiento-huesped-late;
        $data['tipo_Hotel']            = 'tipo hotel';
        $data['nombre_Hotel']          = 'nombre hotel';
        $data['responsable']           = 'responsable';
        $data['apellido']              = 'apellido';
        $data['nombre']                = 'nombre';
        $data['localizador']           = 'Localizador';
        $data['telefono']              = 'Telefono';
        $data['email']                 = '$email';
        $data['ciudad']                = '$ciudad';
        $data['provincia']             = '$provincia';
        $data['fecha1']                = '$fecha1';
        $data['fecha2']                = '$fecha1';
        $data['cant_dias']             = '$cant_dias';
        $data['cant_paxs']             = '$cant_paxs';
        $data['total_estadia']         = '$total_estadia';
        $data['pago3']                 = '$pago3';
        $data['consulta']              = '$consulta';
        $data['cantidad_habitaciones'] = 1;
        $cant_por_hab[1]               = 2;
        $data['cant_por_hab']          = $cant_por_hab;
        $unidad_alojativa[1]           = 'unidad alojativa';
        $data['unidad_alojativa']      = $unidad_alojativa;
        $nombre_hab[1]                 = 'Nombre habitacion';
        $data['nombre_hab']            = $nombre_hab;
        $data['cantidad_dias']         = 1;
        $tarifa_oferta[1][1]           = 100;
        $data['tarifa_oferta']         = $tarifa_oferta;
        $tarifa_normal[1][1]           = 100;
        $data['tarifa_normal']         = $tarifa_normal;
        $fe_array[1][1]                = '01/06/2013';
        $data['fe_array']              = $fe_array;
        $data['descuento']             = 10;
        $data['senia']                 = '200';
        $data['tipo_pago']             = 'T'; //B-T
        $data['metodo_pago']           = 'A'; //A-S-G

        $this->load->view('admin/mails/mail_general', $data);
    }

}

?>
