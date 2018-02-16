<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reservas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set("Asia/Manila");
        $this->load->model('admin/reservas_model');
        $this->load->model('admin/alojamientos_model');
        $this->load->model('admin/huesped_model');
        $this->load->model('admin/cal_fecha');
        $this->load->model('admin/reservas_model');
        $this->load->model('admin/reservas_det_model');
        $this->load->model('admin/pagoalojar_model');
        $this->load->model('admin/pagoalojar_reservas_model');
        $this->load->model('admin/clientes_model');
        $this->load->library('pagination');
        $this->load->library('gf');
    }

    function index()
    {
        $this->lists();
    }

    function edit($reservas_id = 0)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['monto_pago']  = & $monto_pago;
        $data['fecha_pago']  = & $fecha_pago;
        $data['tipo_pago']   = & $tipo_pago;
        $data['reservas_id'] = & $reservas_id;
        $data['metodo_pago'] = & $metodo_pago;

        $query_rows = $this->reservas_model->find_huesped_pago($reservas_id);
        $row        = $query_rows->row();

        if ($query_rows->num_rows() > 0)
        {
            $data['title']  = 'Editar Servicio';
            $data['accion'] = 'editar';

            //Tabla
            $reservas_id = $row->reservas_id;
            $tipo_pago   = $row->tipo_pago;
            $fecha_pago  = $this->gf->html_mysql($row->fecha_pago);
            $monto_pago  = $row->monto_pago;
            $metodo_pago = $row->metodo_pago;
            $data['css'] = array('js/jquery-ui/development-bundle/themes/base/jquery.ui.all');
            $data['js'] = array(
                'js/jquery-ui/development-bundle/ui/jquery.ui.core',
                'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker',
                'js/admin/reservas_edit'
            );
            $data['view'] = "admin/reservas/reservas_edit";
            $this->load->view('admin/templates/temp_menu', $data);
        }
        else
        {
            echo "no se encontro la reserva";
            exit();
        }
    }

    function update()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $reservas_id = $this->input->post('reservas_id');
        $tipo_pago   = $this->input->post('tipo_pago');
        $fecha_pago  = $this->input->post('fecha_pago');
        $fecha_pago  = $this->gf->html_mysql($fecha_pago);
        $monto_pago  = $this->input->post('monto_pago');
        $metodo_pago = $this->input->post('metodo_pago');

        $estado_pago = "P";
        if ($monto_pago == "")
            $estado_pago = "P";
        else
            $estado_pago = "O";

        $row = array(
            'tipo_pago'      => $tipo_pago,
            'fecha_pago'     => $fecha_pago,
            'monto_pago'     => $monto_pago,
            'metodo_pago'    => $metodo_pago,
            'estado_reserva' => 'R',
            'estado_pago'    => $estado_pago
        );

        $this->reservas_model->update($reservas_id, $row);

        redirect(base_url() . 'admin/reservas/lists/', 'refresh');
    }

    function liquidacion($id_alojamiento = 0)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        if ($this->alojamientos_model->count($id_alojamiento))
        {
            $data['li_array']         = $this->reservas_model->liquidacion($id_alojamiento);
            $data['pagoalojar_array'] = $this->pagoalojar_model->pagos_alojamientos($id_alojamiento);
            //$data['pagoalojar_reservas_array'] = $this->pagoalojar_reservas_model->pagos_reservas($id_alojamiento);
            $data['title']            = 'Reservas';
            $data['view']             = 'admin/reservas/liquidacion_list';
            $this->load->view('admin/templates/temp_menu', $data);
        }
        else
        {
            echo "error";
        }
    }

    function lists()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        //Traigo Variables
        $order = $this->input->get('order');
        $campo = $this->input->get('campo');
        $valor = $this->input->get('valor');
        $start = $this->input->get('per_page');

        //Armado de URL
        $url = '?';
        if ($campo != '')
        {
            if ($valor != '')
                $url = $url . "campo=" . $campo . "&valor=" . $valor;
        }
        if ($order != '')
            $url = $url . "&order=" . $order;

        if ($start == "")
            $start = 0;

        //Configuracion paginado
        $result_number      = 30;
        $config['base_url'] = base_url() . 'admin/reservas/lists/' . $url;

        //Contar la cantidad de resultados de la consulta a paginar
        $array_valores        = $this->reservas_model->reservas_filtro($order, $campo, $valor, $start, $result_number);
        $config['total_rows'] = $array_valores['rows_count']; // le indico la cantidad total de resultado de la consulta sin limit ni order
        $config['per_page']   = $result_number;
        $config['num_links']  = 1;
        //iniciamos la paginacion
        $this->pagination->initialize($config);

        $data['reservas_array'] = $array_valores['rows_list'];
        $data['title']          = 'Reservas';
        $data['view']           = 'admin/reservas/reservas_list';
        $data['js']             = array(
            'js/fancybox/jquery.fancybox-1.3.4',
            'js/admin/reservas_list'
        );
        $data['css'] = array('js/fancybox/jquery.fancybox-1.3.4');
        //Envio los datos a la vista
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function confirmar_reserva($reservas_id = 0)
    {
        $row = $this->reservas_model->find_id($reservas_id);

        $data['reservas_id']        = $reservas_id;
        $data['mail_huesped']       = $row['mail_huesped'];
        $data['mail_sanrafaellate'] = $row['mail_sanrafaellate'];
        $data['mail_alojamiento']   = $row['mail_alojamiento'];
        $data['title']              = "Enviar  mail";

        $data['view'] = "admin/reservas/confirmar_reserva";
        $data['js']   = array(
            'js/admin/confirmar_reserva',
            'js/blockui-master/jquery.blockUI'
        );
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function confirmar_reserva_ajax()
    {
        $this->load->library('email');
        $this->load->library('parser');

        $mail_alojamiento_check   = $this->input->post('mail_alojamiento');
        $mail_sanrafaellate_check = $this->input->post('mail_sanrafaellate');
        $mail_huesped_check       = $this->input->post('mail_huesped');
        $reservas_id              = $this->input->post('reservas_id');

        $row_rdat                = $this->reservas_model->find_id($reservas_id);
        $data_mail_sanrafaellate = $row_rdat['mail_sanrafaellate'];
        $data_mail_huesped       = $row_rdat['mail_huesped'];
        $data_mail_alojamiento   = $row_rdat['mail_alojamiento'];

        $row_huesped     = $this->huesped_model->find($row_rdat['id_huesped']);
        $mail_huesped    = $row_huesped['EmailHuesped'];
        $row_alojamiento = $this->alojamientos_model->find_mail_alojamiento($row_rdat['alojamiento_id']);

        $mail_alojamiento   = $row_alojamiento['Email'];
        $nombre_alojamiento = $row_alojamiento['Nombre'];
        $tipo_alojamiento   = $row_alojamiento['TipoAlojamiento'];



        if ($mail_alojamiento_check == '1')
        {
            $this->email->clear();
            $this->email->to($mail_alojamiento);
            $this->email->from('reservas@sanrafaellate.com.ar', 'Reserva San Rafael Late');
            $this->email->subject('voucher');
            $this->email->message($data_mail_alojamiento);
            $this->email->send();
            $this->reservas_model->update_estado_reserva($reservas_id);
        }

        if ($mail_huesped_check == '1')
        {
            $this->email->clear();
            $this->email->to($mail_huesped);
            $this->email->from('reservas@sanrafaellate.com.ar', 'Reserva Alojamiento');
            $this->email->subject('Voucher Reserva para ' . $nombre_alojamiento . ' ' . $tipo_alojamiento);
            $this->email->message($data_mail_huesped);
            $this->email->send();
            $this->reservas_model->update_estado_reserva($reservas_id);
        }

        if ($mail_sanrafaellate_check == '1')
        {
            $this->email->clear();
            $this->email->to('clientes@sanrafaellate.com.ar');
            $this->email->from('reservas@sanrafaellate.com.ar', 'San Rafael Late Admin');
            $this->email->subject('Voucher Reserva ' . $tipo_alojamiento . ' ' . $nombre_alojamiento);
            $this->email->message($data_mail_sanrafaellate);
            $this->email->send();
            $this->reservas_model->update_estado_reserva($reservas_id);
        }

        echo "ok";
    }

    function form()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $data['title'] = 'Crear Reserva';
        $data['css']   = array('js/jquery-ui/development-bundle/themes/base/jquery.ui.all');
        $data['js'] = array(
            'js/jquery-ui/development-bundle/ui/jquery.ui.core',
            'js/jquery-ui/development-bundle/ui/jquery.ui.widget',
            'js/jquery-ui/development-bundle/ui/jquery.ui.position',
            'js/jquery-ui/development-bundle/ui/jquery.ui.menu',
            'js/jquery-ui/development-bundle/ui/jquery.ui.autocomplete',
            'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker',
            'js/admin/reservas_form'
        );
        $data['view']              = 'admin/reservas/reservas_form';
        $data['localidades_array'] = $this->alojamientos_model->localidades('AR', 'MZA', 'AFA');
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function form_nueva()
    {
        $data['title'] = 'Crear Reserva';
        $data['css']   = array('js/jquery-ui/development-bundle/themes/base/jquery.ui.all');
        $data['js'] = array(
            'js/jquery-ui/development-bundle/ui/jquery.ui.core',
            'js/jquery-ui/development-bundle/ui/jquery.ui.widget',
            'js/jquery-ui/development-bundle/ui/jquery.ui.position',
            'js/jquery-ui/development-bundle/ui/jquery.ui.menu',
            'js/jquery-ui/development-bundle/ui/jquery.ui.autocomplete',
            'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker',
            'js/admin/reservas_form'
        );
        $data['view']              = 'admin/reservas/reservas_form_nueva';
        $data['localidades_array'] = $this->alojamientos_model->localidades('AR', 'MZA', 'AFA');
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function reserva_fancy_mail()
    {
        $alojamiento_id = $this->input->get('alojamiento_id');
        $id_huesped     = $this->input->get('id_huesped');
        $reservas_id    = $this->input->get('reservas_id');

        $data['alojamiento_id'] = $alojamiento_id;
        $data['id_huesped']     = $id_huesped;
        $data['reservas_id']    = $reservas_id;


        $data['title'] = "Reenviar mail";
        $data['view']  = "admin/reservas/reserva_fancy_mail";
        $this->load->view('admin/templates/temp_simple', $data);
    }

    function reserva_fancy_enviar()
    {
        $this->load->library('email');
        $this->load->library('parser');

        $alojamiento_id = $this->input->get('alojamiento_id');
        $id_huesped     = $this->input->get('id_huesped');
        $reservas_id    = $this->input->get('reservas_id');

        //Checks parametros
        $check_alojamiento   = $this->input->get('check_alojamiento');
        $check_huedped       = $this->input->get('check_huedped');
        $check_sanrafaellate = $this->input->get('check_sanrafaellate');

        $row                = $this->alojamientos_model->mail_alojamiento($alojamiento_id);
        $mail_alojamiento   = $row['Email'];
        $tipo_alojamiento   = $row['TipoAlojamiento'];
        $nombre_alojamiento = $row['Nombre'];
        $row                = $this->huesped_model->mail_huesped($id_huesped);
        $mail_huesped       = $row['EmailHuesped'];
        $nombre_huesped     = $row['NombreHuesped'];
        $apellido_huesped   = $row['ApellidoHuesped'];


        $row                     = $this->reservas_model->contenido_mail_reserva($reservas_id);
        $contenido_alojamiento   = $row['mail_alojamiento'];
        $contenido_huesped       = $row['mail_huesped'];
        $contenido_sanrafaellate = $row['mail_sanrafaellate'];

        if ($check_alojamiento == '1')
        {
            $this->email->clear();
            $this->email->to($mail_alojamiento);
            $this->email->from('reservas@sanrafaellate.com.ar', 'Reserva San Rafael Late');
            $this->email->subject('voucher');
            $this->email->message($contenido_alojamiento);
            $this->email->send();
            echo "Se envio correctamente el vaucher a  " . $mail_alojamiento . "<br>";
        }

        if ($check_huedped == '1')
        {
            $this->email->clear();
            $this->email->to($mail_huesped);
            $this->email->from('reservas@sanrafaellate.com.ar', 'Reserva Alojamiento');
            $this->email->subject('Voucher Reserva para ' . $nombre_alojamiento . ' ' . $tipo_alojamiento);
            $this->email->message($contenido_huesped);
            $this->email->send();
            echo "Se envio correctamente el vaucher a  " . $mail_huesped . "<br>";
        }

        if ($check_sanrafaellate == '1')
        {
            $this->email->clear();
            $this->email->to('clientes@sanrafaellate.com.ar');
            $this->email->from('reservas@sanrafaellate.com.ar', 'San Rafael Late Admin');
            $this->email->subject('Voucher Reserva ' . $tipo_alojamiento . ' ' . $nombre_alojamiento);
            $this->email->message($contenido_sanrafaellate);
            $this->email->send();
            echo "Se envio correctamente el vaucher a  clientes@sanrafaellate.com.ar <br>";
        }

        if ($check_alojamiento == "" && $check_huedped == "" && $check_sanrafaellate == "")
        {
            echo "No se selecciono ningun destino";
        }
    }

    function buscar_disponibilidad_nueva()
    {
        $this->load->library('pagination');
        $campo              = $this->input->get('campo');
        $nombre_alojamiento = $this->input->get('nombre_alojamiento');
        $fecha_desde        = $this->input->get('fecha_desde');
        $fecha_hasta        = $this->input->get('fecha_hasta');
        $paxmax             = $this->input->get('PaxMax');
        $pais               = $this->input->get('Pais');
        $ciudad             = $this->input->get('Ciudad');
        $provincia          = $this->input->get('Provincia');
        $localidad          = $this->input->get('Localidad');

        //Calcular la diferencia de dias entre las 2 fechas
        ///$cantidad_dias = $this->gf->cantidad_dias($fecha_desde, $fecha_hasta);
        //Saco el id del nombre
        if ($nombre_alojamiento != "")
        {
            $array_nombre_alojamiento = explode("-", $nombre_alojamiento);
            $id_alojamiento           = $array_nombre_alojamiento[1];
        }
        else
        {
            $id_alojamiento = 0;
        }

        //Cambio el orde de la fecha para que mysql lo entienda
        $a_fecha_desde_mysql = explode("-", $fecha_desde);
        $a_fecha_hasta_mysql = explode("-", $fecha_hasta);

        $fecha_desde = $a_fecha_desde_mysql[2] . "-" . $a_fecha_desde_mysql[1] . "-" . $a_fecha_desde_mysql[0];
        $fecha_hasta = $a_fecha_hasta_mysql[2] . "-" . $a_fecha_hasta_mysql[1] . "-" . $a_fecha_hasta_mysql[0];

        //Array para convertirlo en url y luego pasarselo a la paginacion (para que no se repita de nuevo per_page)
        $get_array = $this->input->get();
        $get_query = "";
        if (is_array($get_array))
            $get_query = http_build_query($get_array);

        //Paginacion
        $per_page = $this->input->get('per_page');
        if ($per_page == "")
            $per_page = 0;

        $n_pag                      = 10;
        //Consulta
        $result                     = $this->reservas_model->buscar_alojamientos_nueva($campo, $id_alojamiento, $fecha_desde, $fecha_hasta, $paxmax, $pais, $provincia, $ciudad, $localidad, $per_page, $n_pag);
        $data['alojamientos_array'] = $result['result'];
        //Es el resultado de resultados de la consulta sin limit y todos los parametros correspondientes
        $result_number              = $result['count'];

        $this->config->load("pagination");
        $config["base_url"]   = base_url() . "admin/reservas/buscar_disponibilidad_nueva/?" . $get_query;
        $config["total_rows"] = $result_number;
        $config["per_page"]   = $n_pag;
        $this->pagination->initialize($config);
        $data["links"]        = $this->pagination->create_links();

        $data['fecha_desde_c'] = $fecha_desde;
        $data['fecha_hasta_c'] = $fecha_hasta;
        $data['title']         = "Habitaciones Disponibles";
        $data['css']           = array('css/admin/reservas_alojamientos');
        $data['view'] = 'admin/reservas/reservas_alojamientos_nueva';
        $data['js']   = array('js/admin/reservas_alojamientos');
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function buscar_disponibilidad()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $campo              = $this->input->post('campo');
        $nombre_alojamiento = $this->input->post('nombre_alojamiento');
        $fecha_desde        = $this->input->post('fecha_desde');
        $fecha_hasta        = $this->input->post('fecha_hasta');
        $paxmax             = $this->input->post('PaxMax');
        $pais               = $this->input->post('Pais');
        $ciudad             = $this->input->post('Ciudad');
        $provincia          = $this->input->post('Provincia');
        $localidad          = $this->input->post('Localidad');

        //Calcular la diferencia de dias entre las 2 fechas
        ///$cantidad_dias = $this->gf->cantidad_dias($fecha_desde, $fecha_hasta);
        //Saco el id del nombre
        if ($nombre_alojamiento != "")
        {
            $array_nombre_alojamiento = explode("-", $nombre_alojamiento);
            $id_alojamiento           = $array_nombre_alojamiento[1];
        }
        else
        {
            $id_alojamiento = 0;
        }

        //Cambio el orde de la fecha para que mysql lo entienda
        $a_fecha_desde_mysql = explode("-", $fecha_desde);
        $a_fecha_hasta_mysql = explode("-", $fecha_hasta);

        $fecha_desde = $a_fecha_desde_mysql[2] . "-" . $a_fecha_desde_mysql[1] . "-" . $a_fecha_desde_mysql[0];
        $fecha_hasta = $a_fecha_hasta_mysql[2] . "-" . $a_fecha_hasta_mysql[1] . "-" . $a_fecha_hasta_mysql[0];

        //Consulta 
        //$data['alojamientos_array'] = $this->reservas_model->buscar_disponibilidad($campo, $id_alojamiento, $fecha_desde, $fecha_hasta, $paxmax, $pais, $provincia, $ciudad, $localidad);
        $rows                       = $this->reservas_model->buscar_disponibilidad($campo, $id_alojamiento, $fecha_desde, $fecha_hasta, $paxmax, $pais, $provincia, $ciudad, $localidad);
        $data['alojamientos_array'] = $this->array_busqueda($rows, $fecha_desde, $fecha_hasta);

        $data['title'] = "Habitaciones Disponibles";
        $data['css']   = array('css/admin/reservas_alojamientos');
        $data['view'] = 'admin/reservas/reservas_alojamientos';
        $data['js']   = array('js/admin/reservas_alojamientos');
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function buscar_disponibilidad_ii()
    {


        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $cantidad_habitaciones = $this->input->post('cant_habitaciones');
        $id_alojamiento        = $this->input->post('id_alojamiento');

        $subtotal = 0;
        $total    = 0;

        for ($i = 1; $i <= $cantidad_habitaciones; $i++)
        {
            $nombre_hab[$i]    = $this->input->post('nombre_hab_' . $i);
            $id_habitacion[$i] = $this->input->post('id_habitacion_' . $i);
            $cant_por_hab[$i]  = $this->input->post('cantidad_por_habitacion_' . $i);
            $precio_hab[$i]    = $this->input->post('precio_habitacion_' . $i);
            $subtotal          = $cant_por_hab[$i] * $precio_hab[$i];
            $total             = $subtotal + $total;
        }

        //Arrays varios valores de habitaciones
        $data['nombre_hab']    = $nombre_hab;
        $data['id_habitacion'] = $id_habitacion;
        $data['cant_por_hab']  = $cant_por_hab;
        $data['precio_hab']    = $precio_hab;

        //Metodos de pago
        //Buscar acepta senia, anticipado
        $MP                            = $this->reservas_model->select_mp_alo($id_alojamiento);
        $senia                         = $MP->Senia;
        $senia                         = ($senia * $total) / 100;
        $data['senia']                 = $MP->Senia;
        $data['senia_total']           = $senia;
        $data['Anticipado']            = $MP->Anticipado;
        $data['ComisionSenia']         = $MP->ComisionSenia;
        $data['AceptaSenia']           = $MP->AceptaSenia;
        $data['Comision']              = $MP->Comision;
        $data['MejorPrecio']           = $MP->MejorPrecio;
        //Info alojamiento
        $data['descripcion']           = $this->input->post('descripcion');
        $data['direccion']             = $this->input->post('direccion');
        $data['tipoalojamiento']       = $this->input->post('tipo_alojamiento');
        $data['localidad']             = $this->input->post('localidad');
        $data['checkin']               = $this->gf->html_mysql($this->input->post('checkin'));
        $data['checkout']              = $this->gf->html_mysql($this->input->post('checkout'));
        $data['id_alojamiento']        = $this->input->post('id_alojamiento');
        $data['nombre_alojamiento']    = $this->input->post('nombre_alojamiento');
        $data['cantidad_dias']         = $this->input->post('cant_dias');
        $data['cantidad_habitaciones'] = $cantidad_habitaciones;
        $data['title']                 = "Reservar paso 2";
        $data['view']                  = 'admin/reservas/reservas_alojamientos_ii';
        $data['js']                    = array(
            'js/fancybox/jquery.fancybox-1.3.4',
            'js/blockui-master/jquery.blockUI',
            'js/admin/reservas_alojamientos_ii',
        );
        $data['css'] = array('js/fancybox/jquery.fancybox-1.3.4');
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function buscar_disponibilidad_iii()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        //alojamiento_id     
        $alojamiento_id = $this->input->post('id_alojamiento');


        //Datos reservas_Det
        $CheckIn  = $this->input->post('checkin');
        $CheckOut = $this->input->post('checkout');
        //Paso la fecha a formato que entienda la consulta la fecha
        $CheckIn  = $this->gf->html_mysql($CheckIn);
        $CheckOut = $this->gf->html_mysql($CheckOut);

        $rows_fechas = $this->cal_fecha->list_fechas_rango($CheckIn, $CheckOut);
        $fe_array    = "";
        $fe_array2   = "";
        $fe_count    = 0;
        //Paso los dias a un array comun para despues recorrerlos con un for comun
        foreach ($rows_fechas as $var)
        {
            $fe_count++;
            $fe_array[$fe_count]  = $var['fecha'];
            $explode              = explode("-", $var['fecha']);
            $fe_array2[$fe_count] = $explode[2] . "-" . $explode[1] . "-" . $explode[0][2] . $explode[0][3];
        }

        //Arrays varios valores de habitaciones
        $cantidad_habitaciones = $this->input->post('cantidad_habitaciones');
        $id_habitacion;
        $ids_habitacion;
        $cant_por_hab;
        $precio_hab;
        $nombre_hab;
        $tarifa_oferta;
        $tarifa_normal;
        $unidad_alojativa;
        $total_final           = 0;
        $z                     = 1;


        for ($i = 1; $i <= $cantidad_habitaciones; $i++)
        {
            $id_habitacion      = $this->input->post('id_habitacion_' . $i);
            $ids_habitacion[$i] = $id_habitacion;
            $cant_por_hab[$i]   = $this->input->post('cant_por_hab_' . $i);
            $row                = $this->reservas_model->datos_habitacion($id_habitacion);

            $nombre_hab[$i]       = $row->NombreHab;
            $unidad_alojativa[$i] = $row->UnidadAlojativa;
            $Tipo_hab[$i] = $row->TipoHabitacion;
            $paxM[$i] = $row->PaxMax;
            for ($z = 1; $z <= $fe_count; $z++)
            {
                $fecha          = $fe_array[$z];
                $row_habitacion = $this->reservas_model->precio_cal_calendar($id_habitacion, $fecha);

                $precio_oferta[$z] = $row_habitacion->tarifa_oferta;

                $precio_normal[$z]     = $row_habitacion->tarifa_normal;
                $tarifa_normal[$i][$z] = $precio_normal[$z];
                $tarifa_oferta[$i][$z] = $precio_oferta[$z];
            }
        }


        //Guardo y obtengo el ultimo id de la insercion
        $ID_Huesped = $this->input->post('ID_Huesped');

        //Busco los datos del huesped
        $row_huesped     = $this->huesped_model->find($ID_Huesped);
        $NombreHuesped   = $row_huesped['NombreHuesped'];
        $ApellidoHuesped = $row_huesped['ApellidoHuesped'];
        $EmailHuesped    = $row_huesped['EmailHuesped'];
        $TelefonoFijo    = $row_huesped['TelefonoFijo'];
        $TelefonoCelular = $row_huesped['TelefonoCelular'];
        $Ciudad          = $row_huesped['Ciudad'];
        $Provincia       = $row_huesped['Provincia'];


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
                    'id_habitacion' => $ids_habitacion[$z],
                    'fecha_reserva' => $fe_array[$i],
                    'cant_reserva'  => '1',
                    'tarifa'        => $tarifa_normal[$z][$i],
                    'tarifa_oferta' => $tarifa_oferta[$z][$i],
                    'id_detalle'    => '',
                    'num_hab'       => $cant_por_hab[$z],
                );
                
               
                $this->reservas_det_model->insert($a_reservas_det);

                $query = sprintf("update cal_calendario set cant_reservada=cant_reservada+%s,cant_disponible=cant_asignada-%s where id_habitacion=%s and fecha='%s'", $cant_por_hab[$z], $cant_por_hab[$z], $ids_habitacion[$z], $fe_array[$i]);
                $this->db->query($query);
            }
        }
        for ($h=1; $h <=count($paxM) ; $h++) { 
            $pasajeros=$paxM[$h]+$pasajeros;
        }
       

        //Datos reservas_dat
        $id_husped      = $ID_Huesped;
        $fecha_ingreso  = $CheckIn;
        $fecha_salida   = $CheckOut;
        $cant_pasajeros = $pasajeros;
        
       
        $estado_reserva = "P";
        $deposito       = "";
        $observaciones  = $this->input->post('hueped_observaciones');
        //post de reservarII
        $costo_total    = $this->input->post('total');
        $fecha_reserva  = date("Y-m-d");
        $estado_pago    = "P"; //P(pendiente) O (OK)
        $comision       = $this->reservas_model->comision_mp($alojamiento_id);
        $metodo_pago    = $this->input->post('metodo');

        if ($metodo_pago == 'G')
            $estado_pago = "O"; //P(pendiente) O (OK)
        else
            $estado_pago = "P";


        $descuento    = $this->input->post('descuento');
        $web_reserva  = "SRL";
        $visitas      = "";
        $cantidad_hab = $cantidad_habitaciones;
        $Localizador  = $Localizador;
        $cant_dias    = $fe_count;
        $id_promo     = "";
        $tipo_pago    = $this->input->post('metodo_pago');

        $reservas_dat = array(
            'id_huesped'             => $id_husped,
            'fecha_ingreso'          => $fecha_ingreso,
            'fecha_salida'           => $fecha_salida,
            'alojamiento_id'         => $alojamiento_id,
            'cant_pasajeros'         => $cant_pasajeros,
            'estado_reserva'         => $estado_reserva,
            'deposito'               => $deposito,
            'observaciones'          => $observaciones,
            'costo_total'            => $costo_total,
            'fecha_reserva'          => $fecha_reserva,
            'estado_pago'            => $estado_pago,
            'comision'               => $comision,
            'metodo_pago'            => $metodo_pago,
            'descuento'              => $descuento,
            'web_reserva'            => $web_reserva,
            'visitas'                => $visitas,
            'cantidad_hab'           => $cantidad_hab,
            'Localizador'            => $Localizador,
            'cant_dias'              => $cant_dias,
            'id_promo'               => $id_promo,
            'tipo_pago'              => $tipo_pago
        );
        //Agregar campo tipo_pago
        $this->reservas_model->insert($reservas_dat);
        //Buscar datos del cliente del alojamiento
        $row_cliente             = $this->clientes_model->mail_cliente_alojamiento($alojamiento_id);
        $responsable             = $row_cliente['ApellidoCliente'] . ", " . $row_cliente['NombreCliente'];
        $EmailClienteAlojamiento = $row_cliente['EmailCliente'];

        //Armar forma de pago
        $metodo_pago_str = "";
        if ($metodo_pago == 'A')
            $metodo_pago_str = "Anticipado (total anticipado)";
        elseif ($metodo_pago == 'S')
            $metodo_pago_str = "Seña (seña + resto al llegar)";
        elseif ($metodo_pago == 'G')
            $metodo_pago_str = "Garantía (pago en alojamiento)";

        $data['tipo_Hotel']       = $this->input->post('tipo_alojamiento');
        $data['nombre_Hotel']     = $this->input->post('nombre_alojamiento');
        $data['senia']            = $this->input->post('senia');
        $data['descuento']        = $this->input->post('descuento');
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
        $data['cant_por_hab']          = $cant_por_hab;
        $data['nombre_hab']            = $nombre_hab;
        $data['Tipo_hab']              = $Tipo_hab; 
        $data['cantidad_habitaciones'] = $cantidad_habitaciones;
        $data['cant_por_hab']          = $cant_por_hab;
        $data['cantidad_dias']         = $fe_count;
        $data['unidad_alojativa']      = $unidad_alojativa;
        $data['fe_array']              = $fe_array2;
        $data['ids_habitacion']        = $ids_habitacion;

        //para detalle de dias array doble[][]
        $data['tarifa_normal'] = $tarifa_normal;
        $data['tarifa_oferta'] = $tarifa_oferta;

        //Mails a enviar
        $mail_huesped     = $this->input->post('envio_huesped');
        $mail_alojamiento = $this->input->post('envio_alojamiento');
        $enviar_descuento = $this->input->post('enviar_descuento');

        //Con estod datos checkeo a quien debo enviar son mail_huesped(1/"") mail_alojamiento(1/"") enviar_descuento("si","")
        $data['mail_huesped']     = $mail_huesped;
        $data['mail_alojamiento'] = $mail_alojamiento;
        $data['enviar_descuento'] = $enviar_descuento;

        //Cargar librerias
        $this->load->library('email');
        $this->load->library('parser');

        //Crear los distintos tipos de mail
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

        //Hacer un update para ingresar en reservas det los mail creados como dato tipo text

        if ($mail_alojamiento)
        {
            $this->email->clear();
            $this->email->to($EmailClienteAlojamiento);
            $this->email->from('reservas@sanrafaellate.com.ar', 'Voucher Reserva - San Rafael Late');
            $this->email->subject('voucher');
            $this->email->message($str_mail_alojamiento);
            $this->email->send();
        }

        $data['tipo_Hotel']   = $this->input->post('tipo_alojamiento');
        $data['nombre_Hotel'] = $this->input->post('nombre_alojamiento');

        if ($mail_huesped)
        {
            $this->email->clear();
            $this->email->to($EmailHuesped);
            $this->email->from('reservas@sanrafaellate.com.ar', 'Voucher Reserva para ' . $data['tipo_Hotel'] . ' ' . $data['nombre_Hotel']);
            $this->email->subject('voucher');
            $this->email->message($str_mail_huesped);
            $this->email->send();
        }

        $this->email->clear();
        $this->email->to('reservas@sanrafaellate.com.ar');
        $this->email->from('reservas@sanrafaellate.com.ar', 'Voucher Reserva ' . $data['tipo_Hotel'] . ' ' . $data['nombre_Hotel']);
        $this->email->subject('voucher');
        $this->email->message($str_mail_sanrafaellate);
        $this->email->send();

        $this->load->view('admin/mails/mail_general', $data);

        //redirect(base_url()."admin/alojamientos/");
    }

    function delete($id)
    {
        $query = sprintf("select * from reserva_dat where reservas_id=%s", $id);
        $row1  = $this->db->query($query);
        $row1  = $row1->row_array();

        $query = sprintf("select * from reservas_det where Localizador='%s' and fecha_reserva='%s'", $row1['Localizador'], $row1['fecha_ingreso']);
        $row2  = $this->db->query($query);
        $row2  = $row2->row_array();

        $query = sprintf("update reserva_dat set estado_reserva='C' where reservas_id=%s ", $id);
        $this->db->query($query);
        $query = sprintf("update cal_calendario set cant_reservada=cant_reservada-%s,cant_disponible=cant_asignada+%s where id_habitacion=%s and fecha between '%s' and '%s'", $row2['num_hab'], $row2['num_hab'], $row2['id_habitacion'], $row1['fecha_ingreso'], $row1['fecha_salida']);
        $this->db->query($query);

        redirect(base_url() . "admin/reservas/", 'refresh');
    }

}

?>
