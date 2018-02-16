<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Trabajo
$config['upload_path'] ='/home/nn000337/public_html/upload/alojamientos/';
$config['upload_path_thumb'] ='/home/nn000337/public_html/upload/alojamientos/thumb/';

$config['upload_path_hab']='/home/nn000337/public_html/upload/habitaciones/';
$config['upload_path_hab_thumb']='/home/nn000337/public_html/upload/habitaciones/thumb/';

$config['upload_path_emp']='/home/nn000337/public_html/upload/empresas/';
$config['upload_path_emp_thumb']='/home/nn000337/public_html/upload/empresas/thumb/';

$config['upload_path_pag']='/home/nn000337/public_html/upload/paginas/';
$config['upload_path_pag_thumb']='/home/nn000337/public_html/upload/paginas/thumb/';

$config['upload_path_agenda']='/home/nn000337/public_html/upload/agendas/';
$config['upload_path_agenda_thumb']='/home/nn000337/public_html/upload/agendas/thumb/';
//habitaciones 
$config['upload_path_hab']='/home/nn000337/public_html/upload/habitaciones/';
$config['upload_path_hab_thumb']='/home/nn000337/public_html/upload/habitaciones/thumb/';


$config['alojamientos_menu_sidebar'] =array(
    
    'li_0' => array(
        'nombre' => 'Info Gral',
        'href' => 'admin/alojamientos/form_view/',
        'tipo' => 'info'
    ),
    
    'li_1' => array(
        'nombre' => 'Agregar Cliente',
        'href' => 'admin/alojamientos/alojamientos_clientes_form/',
        'tipo' => 'clientes'
    ),
    'li_2' => array(
        'nombre' => 'Agregar Habitaciones',
        'href'  =>'admin/alojamientos/alojamientos_habitaciones_form/',
        'tipo'  => 'habitaciones'
    ),
    'li_3' => array(
        'nombre' => 'Agregar Servicios',
        'href'   => 'admin/alojamientos/alojamientos_servicios_form/',
        'tipo'  => 'servicios'
    ),
    'li_4' => array(
        'nombre' => 'Agregar Fotos',
        'href'   => 'admin/alojamientos/alojamientos_imagenes_form/',
        'tipo'   => 'imagenes'
    ),
    'li_5' => array(
        'nombre' => 'Agregar Ubicación',
        'href'   => 'admin/alojamientos/alojamientos_ubicacion_form/',
        'tipo'   => 'ubicacion'
    ),
    'li_6' => array(
        'nombre' => 'Agregar Publicidad',
        'href'   => 'admin/alojamientos/alojamientos_publicidad_form/',
        'tipo'   => 'publicidad'
    )
);

?>
