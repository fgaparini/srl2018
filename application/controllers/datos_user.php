<?php

class Datos_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $base_path = $_SERVER['DOCUMENT_ROOT'];
        echo $base_path;
        exit();
        
        $ip        = $this->input->ip_address();
        $navegador = $this->input->user_agent();

        $datos_user = array(
            'ip'        => $ip,
            'navegador' => $navegador
        );

        $this->db->insert('datos_user', $datos_user);
        $base_path = $_SERVER['DOCUMENT_ROOT'];
        $fp        = fopen($base_path . "/late/base_url.txt", "r");
        $contents="";
        while (!feof($fp))
        {
            $contents .= fread($fp,1);
        }        
        fclose($fp);

        header( 'Location: '.$contents ) ;
    }

}

?>
