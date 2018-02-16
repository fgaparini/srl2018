<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pagoalojar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/reservas_model');
        $this->load->model('admin/pagoalojar_model');
        $this->load->model('admin/pagoalojar_reservas_model');
        $this->load->library('gf');
    }

    function reservas_alojamientos($id_alojamiento)
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $query_row = $this->reservas_model->reservas_alojamiento($id_alojamiento);

        if ($query_row->num_rows() > 0)
        {
            $data['title']          = 'Elegir reservas';
            $data['reservas_array'] = $query_row->result_array();
            $data['id_alojamiento'] = $id_alojamiento;
            $data['view']           = "admin/pagoalojar/pagoalojar_reservas_list";
            $data['css']            = array('js/jquery-ui/development-bundle/themes/base/jquery.ui.all');
            $data['js'] = array(
                'js/jquery-ui/development-bundle/ui/jquery.ui.core',
                'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker',
                'js/admin/pagoalojar_reservas_list'
            );
            $this->load->view('admin/templates/temp_menu', $data);
        }
        else
        {
            echo "Este Alojamiento no tiene reservas sin pagar";
            exit();
        }
    }

    function reservas_save()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $id_alojamieto     = $this->input->post('id_alojamiento');
        $cantidad_reservas = $this->input->post('cantidad_reservas');

        //Tabla pago alojar
        $Monto     = $this->input->post('Monto');
        $FechaPago = $this->input->post('FechaPago');
        if ($FechaPago != "")
            $FechaPago = $this->gf->html_mysql($FechaPago);
        $Cocepto   = $this->input->post('Concepto');

        $row_pagoalojar = array(
            'ID_Alojamiento' => $id_alojamieto,
            'Monto'          => $Monto,
            'FechaPago'      => $FechaPago,
            'Concepto'       => $Cocepto,
        );

        $id_pagoalojar = $this->pagoalojar_model->insert($row_pagoalojar);

        $i = 0;
        for ($i = 1; $i <= $cantidad_reservas; $i++)
        {
            $reserva_id = $this->input->post("reservas_id_" . $i);
            $localizador = $this->input->post("localizador_" . $i);

            if ($reserva_id != "")
            {
                $row_pagoalojar_reservas = array(
                    'ID_PagoAlojar'  => $id_pagoalojar,
                    'ID_Reserva'     => $reserva_id,
                    'ID_Alojamiento' => $id_alojamieto,
                    'Localizador' => $localizador
                );

                $id_pagoalojar_reservas = $this->pagoalojar_reservas_model->insert($row_pagoalojar_reservas);

                $row_reserva_dat = array(
                    'pago_alojar' => 'S'
                );

                //Actualizo el campo "pago_alojar"
                $this->reservas_model->update($reserva_id, $row_reserva_dat);
            }
        }

        redirect('admin/alojamientos/', 'refresh');
    }

}

?>
