<?php

class Reservar_chango extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Cargar librerias
        $this->load->library('email');
        $this->load->library('parser');
        $this->load->library('gf');
        $this->load->model('website/dbhuesped');
        $this->load->model('website/cal_fecha');
        $this->load->model('website/reservas_model');
        $this->load->model('website/reservas_det_model');
        $this->load->model('website/clientes_model');
        $this->load->model('website/alojamientos_model');
    }

    function guardar_reserva()
    {
        //Datos reserva
        $metodo_pago_post = "G";
        $tipo_pago_post   = "T";

        $habitaciones_comas          = "0," . "1,188,189";
        $cantidad_habitaciones_comas = "0," . "1,0,0";

        $CheckIn  = "1-08-2013";
        $CheckOut = "2-08-2013";

        $CheckIn  = $this->gf->html_mysql($CheckIn);
        $CheckOut = $this->gf->html_mysql($CheckOut);


        //Datos Huesped
        $NombreHuesped        = "Gudu"; //$this->input->post('NombreHuesped');
        $ApellidoHuesped      = "Chango"; //$this->input->post('ApellidoHuesped');
        $EmailHuesped         = "gudu.chango@gmail.com"; //$this->input->post('EmailHuesped');
        $TelefonoFijo         = "4422026"; //$this->input->post('TelefonoFijo');
        $TelefonoCelular      = "15680711"; //$this->input->post('TelefonoCelular');
        $Ciudad               = "San Rafael"; //$this->input->post('Ciudad');
        $Provincia            = "Mendoza"; //$this->input->post('Provincia');
        $ObservacionesHuesped = "Observacion Copada";


        $habitaciones_array          = explode(",", $habitaciones_comas);
        $cantidad_habitaciones_array = explode(",", $cantidad_habitaciones_comas);

        //alojamiento_id     
        $alojamiento_id = 110; //$this->input->post('id_alojamiento');


        $rows_fechas = $this->cal_fecha->list_fechas_rango($CheckIn, $CheckOut);
        $fe_array    = "";
        $fe_array2   = "";
        $fe_count    = 0;
        //Paso los dias a un array comun para despues recorrerlos con un for comun
        foreach ($rows_fechas as $var)
        {
            $fe_count++;
            //tiene el formato 2013-08-01 -> Comienza desde $i=1
            $fe_array[$fe_count]  = $var['fecha'];
            $explode              = explode("-", $var['fecha']);
            //Tiene la fecha del siguiente formato 01-08-13 -> Comienza desd $i=1
            $fe_array2[$fe_count] = $explode[2] . "-" . $explode[1] . "-" . $explode[0][2] . $explode[0][3];
        }


        //Arrays varios valores de habitaciones
        $cantidad_habitaciones = count($habitaciones_array) - 1; //Le resto 1 ya que agrego un elemento al principio de la coma para que empieze con $i=1
        $id_habitacion;
        $nombre_hab;
        $tarifa_oferta;
        $tarifa_normal;
        $unidad_alojativa;

        $total_final = 0;
        $z           = 1;
        for ($i = 1; $i <= $cantidad_habitaciones; $i++)
        {

            $id_habitacion = $habitaciones_array[$i];

            $row = $this->reservas_model->datos_habitacion($id_habitacion);

            $nombre_hab[$i]       = $row->NombreHab;
            $unidad_alojativa[$i] = $row->UnidadAlojativa;
            for ($z = 1; $z <= $fe_count; $z++)
            {
                $fecha = $fe_array[$z];



                $row_habitacion = $this->reservas_model->precio_cal_calendar($id_habitacion, $fecha);
                
                if (sizeof($row_habitacion) == 0)
                {
                    echo "No esta cargada la tarifa para el id_habitacion=".$id_habitacion;
                    exit();
                }
                else
                {
                    $str_precio_oferta = $row_habitacion['tarifa_oferta'];
                    $str_precio_normal = $row_habitacion['tarifa_normal'];
                }



                //Saco el precio total final
                if ($str_precio_oferta > 0)
                    $total_final = $str_precio_oferta + $total_final;
                else
                    $total_final = $str_precio_normal + $total_final;

                $precio_oferta[$z]     = $str_precio_oferta;
                $precio_normal[$z]     = $str_precio_normal;
                //se pone array con formato de matriz ya que puede tener muchas habitaciones
                $tarifa_normal[$i][$z] = $precio_normal[$z];
                $tarifa_oferta[$i][$z] = $precio_oferta[$z];
            }
        }


        $row_db_huesped   = $this->dbhuesped->verificar_mail_apellido($ApellidoHuesped, $EmailHuesped);
        $cantidad_huesped = $row_db_huesped['cantidad'];
        $ID_Huesped       = 0;

        $huesped_array = array(
            'NombreHuesped'   => $NombreHuesped,
            'ApellidoHuesped' => $ApellidoHuesped,
            'EmailHuesped'    => $EmailHuesped,
            'TelefonoFijo'    => $TelefonoFijo,
            'TelefonoCelular' => $TelefonoCelular,
            'Ciudad'          => $Ciudad,
            'Provincia'       => $Provincia
        );

        if ($cantidad_huesped > 0)
        {
            //Actualizo con los datos nuevos ingresados por el huesped
            $ID_Huesped = $row_db_huesped['ID_Huesped'];
            $this->dbhuesped->update($ID_Huesped, $huesped_array);
        }
        else
        {
            //Inserto un nuevo huesped
            $ID_Huesped = $this->dbhuesped->insert($huesped_array);
        }


        //Buscar el ultimo id_reserva
        $id_reserva  = $this->reservas_model->max_id();
        $id_reserva  = $id_reserva + 1;
        $num_reserva = 600 + $id_reserva;
        $num_reserva = $num_reserva . ""; //pasar a string
        //Armado del localizador
        $Localizador = "SRL" . $num_reserva;
        $pasajeros   = 0;

        for ($i = 1; $i <= $fe_count; $i++)
        {
            for ($z = 1; $z <= $cantidad_habitaciones; $z++)
            {
                $a_reservas_det = array(
                    'Localizador'   => $Localizador,
                    'id_habitacion' => $habitaciones_array[$z],
                    'fecha_reserva' => $fe_array[$i],
                    'cant_reserva'  => '1',
                    'tarifa'        => $tarifa_normal[$z][$i],
                    'tarifa_oferta' => $tarifa_oferta[$z][$i],
                    'id_detalle'    => '',
                    'num_hab'       => $cantidad_habitaciones_array[$z],
                );
                $pasajeros      = $cantidad_habitaciones_array[$z] + $pasajeros;
                $this->reservas_det_model->insert($a_reservas_det);

                $query = sprintf("update cal_calendario set cant_reservada=cant_reservada+%s,cant_disponible=cant_asignada-%s where id_habitacion=%s and fecha='%s'", $cantidad_habitaciones_array[$z], $cantidad_habitaciones_array[$z], $habitaciones_array[$z], $fe_array[$i]);
                $this->db->query($query);
            }
        }

        //Datos reservas_dat
        $id_husped      = $ID_Huesped;
        $fecha_ingreso  = $CheckIn;
        $fecha_salida   = $CheckOut;
        $cant_pasajeros = $pasajeros;
        $estado_reserva = "P";
        $deposito       = "";
        $observaciones  = $ObservacionesHuesped;
        //post de reservarII
        $costo_total    = $total_final; //$this->input->post('total');
        $fecha_reserva  = date("Y-m-d");
        $estado_pago    = "P"; //P(pendiente) O (OK)
        $comision       = $this->reservas_model->comision_mp($alojamiento_id);
        $metodo_pago    = $metodo_pago_post;

        if ($metodo_pago == 'G')
            $estado_pago = "O"; //P(pendiente) O (OK)
        else
            $estado_pago = "P";


        $descuento    = '0';
        $web_reserva  = "SRL";
        $visitas      = "";
        $cantidad_hab = $cantidad_habitaciones;
        $Localizador  = $Localizador;
        $cant_dias    = $fe_count;
        $id_promo     = "";
        $tipo_pago    = $tipo_pago_post;

        $reservas_dat = array(
            'id_huesped'     => $id_husped,
            'fecha_ingreso'  => $fecha_ingreso,
            'fecha_salida'   => $fecha_salida,
            'alojamiento_id' => $alojamiento_id,
            'cant_pasajeros' => $cant_pasajeros,
            'estado_reserva' => $estado_reserva,
            'deposito'       => $deposito,
            'observaciones'  => $observaciones,
            'costo_total'    => $costo_total,
            'fecha_reserva'  => $fecha_reserva,
            'estado_pago'    => $estado_pago,
            'comision'       => $comision,
            'metodo_pago'    => $metodo_pago,
            'descuento'      => $descuento,
            'web_reserva'    => $web_reserva,
            'visitas'        => $visitas,
            'cantidad_hab'   => $cantidad_hab,
            'Localizador'    => $Localizador,
            'cant_dias'      => $cant_dias,
            'id_promo'       => $id_promo,
            'tipo_pago'      => $tipo_pago
        );
        //Agregar campo tipo_pago
        $this->reservas_model->insert($reservas_dat);
        //Buscar datos del cliente del alojamiento
        $row_cliente     = $this->clientes_model->mail_cliente_alojamiento($alojamiento_id);
        $responsable     = $row_cliente['ApellidoCliente'] . ", " . $row_cliente['NombreCliente'];

        //Armar forma de pago
        $metodo_pago_str = "";
        if ($metodo_pago == 'A')
            $metodo_pago_str = "Anticipado (total anticipado)";
        elseif ($metodo_pago == 'S')
            $metodo_pago_str = "Seña (seña + resto al llegar)";
        elseif ($metodo_pago == 'G')
            $metodo_pago_str = "Garantía (pago en alojamiento)";

        //Buscar tipo alojamient, nombre alojamiento  y seña del alojamiento
        $row_data     = $this->alojamientos_model->find_nombre_tipo_senia($alojamiento_id);
        $tipo_Hotel   = $row_data['TipoAlojamiento'];
        $nombre_Hotel = $row_data['Nombre'];
        $senia        = $row_data['Senia'];


        $data['enviar_descuento'] = "no";
        $data['tipo_Hotel']       = $tipo_Hotel;
        $data['nombre_Hotel']     = $nombre_Hotel;
        $data['senia']            = $senia;
        $data['descuento']        = "";
        $data['responsable']      = $responsable;
        $data['localizador']      = $Localizador;
        $data['nombre']           = $NombreHuesped;
        $data['apellido']         = $ApellidoHuesped;
        $data['telefono']         = $TelefonoFijo;
        $data['telefono_celular'] = $TelefonoCelular;
        $data['email']            = $EmailHuesped;
        $data['ciudad']           = $Ciudad;
        $data['provincia']        = $Provincia;
        $data['fecha1']           = $CheckIn;
        $data['fecha2']           = $CheckOut;
        $data['cant_dias']        = $fe_count;
        $data['cant_paxs']        = $pasajeros;
        $data['total_estadia']    = $costo_total;
        $data['pago3']            = $metodo_pago_str;
        $data['consulta']         = $observaciones;
        $data['metodo_pago']      = $metodo_pago;
        $data['tipo_pago']        = $tipo_pago;

        //para el detalle de habitaciones array comunes []
        $data['cant_por_hab']          = $cantidad_habitaciones_array;
        $data['nombre_hab']            = $nombre_hab;
        $data['cantidad_habitaciones'] = $cantidad_habitaciones;
        $data['cantidad_dias']         = $fe_count;
        $data['unidad_alojativa']      = $unidad_alojativa;
        $data['fe_array']              = $fe_array2;
        $data['ids_habitacion']        = $habitaciones_array;

        //para detalle de dias array doble[][]
        $data['tarifa_normal'] = $tarifa_normal;
        $data['tarifa_oferta'] = $tarifa_oferta;

        //Crear los distintos tipos de mail
        //Hacer un update para ingresar en reservas det los mail creados como dato tipo text
        $data['enviar_tipo']    = "alojamiento";
        $str_mail_alojamiento   = $this->parser->parse('admin/mails/mail_general', $data, true);
        $str_mail_alojamiento   = str_replace("'", '"', $str_mail_alojamiento);
        $this->reservas_model->update_mail('alojamiento', $str_mail_alojamiento, $Localizador);
        $data['enviar_tipo']    = "huesped";
        $str_mail_huesped       = $this->parser->parse('admin/mails/mail_general', $data, true);
        $str_mail_huesped       = str_replace("'", '"', $str_mail_huesped);
        $this->reservas_model->update_mail('huesped', $str_mail_huesped, $Localizador);
        $data['enviar_tipo']    = "sanrafaellate";
        $str_mail_sanrafaellate = $this->parser->parse('admin/mails/mail_general', $data, true);
        $str_mail_sanrafaellate = str_replace("'", '"', $str_mail_sanrafaellate);
        $this->reservas_model->update_mail('sanrafaellate', $str_mail_sanrafaellate, $Localizador);


        $data_mail['mensaje']            = "Señor huesped en breve le enviaremos el voucher con la confirmacion de la reserva";
        $data_mail['tipo_alojamiento']   = $tipo_Hotel;
        $data_mail['nombre_alojamiento'] = $nombre_Hotel;
        $data_mail['ApellidoHuesped']    = $ApellidoHuesped;
        $data_mail['NombreHuesped']      = $NombreHuesped;
        $str_mail_huesped_pendiente      = $this->parser->parse('website/mails/reserva_pendiente_huesped', $data_mail, true);
        $this->email->clear();
        $this->email->to($EmailHuesped);
        $this->email->from('reservas@sanrafaellate.com.ar', 'Voucher Reserva para ' . $tipo_Hotel . ' ' . $nombre_Hotel);
        $this->email->subject('Voucher Reserva para ' . $tipo_Hotel . ' ' . $nombre_Hotel);
        $this->email->message($str_mail_huesped_pendiente);
        $this->email->send();

        $this->email->clear();
        $this->email->to("gudu.chango@gmail.com"); //Cambiar el mail por el de contaco@sanrafaellate.com
        $this->email->from('reservas@sanrafaellate.com.ar', 'Voucher Reserva para ' . $tipo_Hotel . ' ' . $nombre_Hotel);
        $this->email->subject('Voucher Reserva para ' . $tipo_Hotel . ' ' . $nombre_Hotel);
        $this->email->message("Alerta de reserva pendiente");
        $this->email->send();
    }

}

?>
