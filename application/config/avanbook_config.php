<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$base_path      = $_SERVER['DOCUMENT_ROOT'];
//Trabajo
$config['upload_path'] =$base_path  .'/upload/alojamientos/';
$config['upload_path_thumb'] =$base_path  .'/upload/alojamientos/thumb/';

$config['upload_path_hab']=$base_path  .'/upload/habitaciones/';
$config['upload_path_hab_thumb']=$base_path  .'/upload/habitaciones/thumb/';

$config['upload_path_emp']=$base_path  .'/upload/empresas/';
$config['upload_path_emp_thumb']=$base_path  .'/upload/empresas/thumb/';

$config['upload_path_pag']=$base_path  .'/upload/paginas/';
$config['upload_path_pag_thumb']=$base_path  .'/upload/paginas/thumb/';

$config['upload_path_agenda']=$base_path  .'/upload/agendas/';
$config['upload_path_agenda_thumb']=$base_path  .'/upload/agendas/thumb/';
//habitaciones 
$config['upload_path_hab']=$base_path  .'/upload/habitaciones/';
$config['upload_path_hab_thumb']=$base_path  .'/upload/habitaciones/thumb/';


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
    ),
      'li_7' => array(
        'nombre' => 'Agregar APP',
        'href'   => 'admin/alojamientos/alojamientos_app_form/',
        'tipo'   => 'app'
    )
);

?>