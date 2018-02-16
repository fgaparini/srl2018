<?php

class Huesped_mail extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/huesped_mail_model');
        $this->load->model('admin/huesped_model');
        $this->load->library('form_validation');
        $this->load->library('gf');
    }

    function index()
    {
        $this->lists();
    }

    function huesped_mail_list($ID_HuespedMail)
    {
        $data['rows']  = $this->huesped_mail_model->find_by_huesped($ID_HuespedMail);
        $data['title'] = "Mails enviados a ";
        $data['view']  = "admin/huesped_mail/huesped_mail_list";
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function reenviar_mail($ID_HuespedMail)
    {
        //Cosas para hacer buscar pro el ID_HuespedMail
        //Cosas para hacer por el ID_HuespedID;

        $row_mail = $this->huesped_mail_model->find($ID_HuespedMail);

        $ArchivosMail = $row_mail['ArchivosMail'];
        $MensajeMail  = $row_mail['MensajeMail'];
        $AsuntoMail   = $row_mail['AsuntoMail'];
        $ID_Huesped   = $row_mail['ID_Huesped'];


        //Saco el mail de aca por si se equivocaron
        $row_huesped  = $this->huesped_model->find($ID_Huesped);
        $EmailHuesped = $row_huesped['EmailHuesped'];


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


        //Dividir en comas str_archivos
        $array_archivos = explode(",", $ArchivosMail);
        $pdf_full_path  = "";
        foreach ($array_archivos as $var)
        {
            $pdf_full_path = $pdf_path . $var;
            $this->email->attach($pdf_full_path);
        }
        $mail_list     = array($EmailHuesped, 'enviados@sanrafaellate.com.ar');
        $this->email->from('contacto@sanrafaellate.com.ar', 'San Rafael Late');
        $this->email->to($mail_list);
        $this->email->subject($AsuntoMail);
        $this->email->message($MensajeMail);
        $this->email->send();


        $row_save = array(
            'ID_Huesped'   => $ID_Huesped,
            'ArchivosMail' => $ArchivosMail,
            'MensajeMail'  => $MensajeMail,
            'AsuntoMail'   => $AsuntoMail,
            'DireMail'     => $EmailHuesped
        );

        $this->huesped_mail_model->insert($row_save);

        redirect(base_url() . "admin/huesped_mail/huesped_mail_list/" . $ID_Huesped, 'refresh');
    }

}

?>
