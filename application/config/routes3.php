<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "website/home";
$route['login'] = "users/login_user";
$route['clientes'] = "users/login_user";
//$route['error-page'] = "website/errores";
$route['error-page']='website/errores';
//$route['404_override'] = 'http://sanrafaellate.com.ar/';

$route['index.html'] = "website/home";
//$route['([^/]+)'] = "website/home";
$route['user/loguin']='user/alojamientos_user/form_view_user';
// $route['propiedades/home/listado/lote/'] ="propiedades/home/listado_po/lote";

//AGENDA--------------------------
$route['agenda/([^/]+)-([^/]+)'] ='website/agenda/detalle/$2';//AGENDA
$route['agenda/mes/([^/]+)'] ='website/agenda/listado/$1';//AGENDA
$route['agenda/agenda-san-rafael.html'] ='website/agenda/todos';//AGENDA
//ALOJAMIENTOS--------------------
$route['alojamiento/([^/]+)/([^/]+)/([^/]+)'] ='website/detalle/alojar/$1/$2/$3'; // fichas alojamiento
//$route['alojamiento/([^/]+)/([^/]+)/'] ='website/detalle/alojar/$1/$2/0'; // 0fichas alojamiento
$route['alojamiento/([^/]+)'] ='website/listado_alojar/alojar/$1/0';//listado alojamientos
//$route['alojamiento2/([^/]+)'] ='website/listado_alojarP/alojar/$1/0';//listado alojamientos de prueba
$route['buscar/([^/]+)'] ='website/buscaralojar/buscador/$1';
$route['buscar/detalle/([^/]+)/([^/]+)/([^/]+)'] ='website/buscaralojar/detalle/$1/$2/$3';
$route['buscar/reservar'] ='website/buscaralojar/reservar';

$route['alojamiento/([^/]+)/([^/]+)'] ='website/detalle/alojar/$1/$2/0';//listado alojamientos no se para q

//ALOJAMIENTOS POR LOCALIDAD---------------------------------------------------
$route['([^/]+)/([^/]+)/alojamiento'] ='website/listado_alojar/alojarpag/$1/$2';

//ABOUT US------------------------------------------------------------------------
$route['nosotros/([^/]+)'] ='website/nosotros/aboutus/$1';

//PAGINAS------------------------------------------------------------------------
$route['([^/]+)/([^/]+).html'] ='website/general/paginas/$1/$2';
$route['destacados/([^/]+)'] ='website/destacados/listado/$1/0';
$route['destacados/([^/]+)'] ='website/destacados/listado/$1/0';
$route['destacados/([^/]+)/([^/]+)'] ='website/destacados/listado/$1/$2';
/* End of file routes.php */
/* Location: ./application/config/routes.php */

//EMPRESAS ----------------------------------------------------------------------
$route['servicios/([^/]+)/([^/]+)'] ='website/empresas/listarempresas/$1/$2';//listado empresas x subtipo
$route['servicios/([^/]+)'] ='website/empresas/infoempresas/$1';// info tipo empresas
$route['servicios/([^/]+)/([^/]+)/([^/]+)'] ='website/detalle/empresa/$1/$2/$3';// FICHA EMPRESAS


//ESTADISTICAS ----------------------------------------------------------------------
$route['contador/([^/]+)/([^/]+)/([^/]+)'] ='website/estadisticas/contador/$1/$2/$3';

// BUSCADOR DE ALOJAMIENTOS
$route['buscar/([^/]+)'] ='website/buscaralojar/buscador/$1';
$route['buscar/detalle/([^/]+)/([^/]+)/([^/]+)'] ='website/buscaralojar/detalle/$1/$2/$3';
$route['buscar/reservar'] ='website/buscaralojar/reservar';

//MULTIMEDIA--------------------------------------------------------------------------------------
             

$route['multimedia/([^/]+)/([^/]+)'] ='website/multimedia/$1/$2';//MAPA
$route['multimedia/fotos'] ='website/multimedia/lista_fotos/'; // LISTAR GALERIA DE FOTOS
$route['multimedia/fotos/galeria/([^/]+)'] ='website/multimedia/galeria_fotos/$1'; // LISTAR GALERIA DE FOTOS por TIPO
$route['multimedia/videos'] ='website/multimedia/videos'; // LISTAR GALERIA DE FOTOS por TIPO


// -----------------------------------------------------
// MOBILE ROUTER
// -----------------------------------------------------
$route['m'] ='website/mobile';//pagina home
$route['m/mapa'] ='website/mobile/mapa';//pagina home
$route['m/turismoaventura'] ='website/mobile/turismoaventura';//listado alojamientos
$route['m/alojamientos/([^/]+)'] ='website/mobile/alojamientos/$1/0';//listado alojamientos
$route['m/servicios/([^/]+)'] ='website/mobile/servicios/$1/0';//listado alojamientos
$route['m/([^/]+)/([^/]+).html'] ='website/mobile/paginas/$1/$2';//listado alojamientos
$route['m/alojamiento/([^/]+)/([^/]+)/([^/]+)'] ='website/mobile/fichasA/$1/$2/$3'; // fichas alojamiento



// $route['propiedades/index.html'] = "propiedades/home/";
// $route['propiedades/([^/]+)']="inmo/$1";
// $route['propiedades/([^/]+)/([^/]+)']="inmo/$1/$2";
// $route['propiedades/([^/]+)/([^/]+)/([^/]+)']="inmo/$1/$2/$3";
// $route['propiedades/([^/]+)/([^/]+)/([^/]+)/([^/]+)']="inmo/$1/$2/$3/$4";
// $route['propiedades/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)']="inmo/$1/$2/$3/$4/$5";
// $route['propiedades/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)']="inmo/$1/$2/$3/$4/$5/$6";

 $route['propiedades/propiedad/([^/]+)/([^/]+)/([^/]+).html']="propiedades/home/detalle/$2/$3";
 $route['propiedades/listado/([^/]+)']="propiedades/home/listado_po/$1";
 $route['propiedades/listado/([^/]+)']="propiedades/home/listado_po/$1";
 $route['propiedades/buscador/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)']="propiedades/home/buscador/$1/$2/$3/$4/$5";
/*require_once( BASEPATH .'database/DB'. EXT );
$db =& DB();
$query = $db->get ("tipoempresa ");
$result = $query->result();
foreach( $result as $row )
{
    $route[ 'empresas/'.$row->TipoEmpresa.'/([^/]+)' ] = 'website/empresas/'.$row->TipoEmpresa.'/$1';
}
*/
?>
