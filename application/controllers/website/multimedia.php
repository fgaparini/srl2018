<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Multimedia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->library('googlemaps');
			$this->load->model("website/dbmedia");

	}

	public function mapas($a)
	{
$vistapano="";
$vistaPlace="";
$placeName="";
$vistaInteres="";
		// SABER SI EXISTE PAGINA 
	
//if (count($a)!=""){

//-------------------------------------------- 
//SETEAR DIFERENTES MAPAS
//--------------------------------------------
$Pinteres=$this->input->get("Pinteres");
$pano=$this->input->get("panoramio");
$place=$this->input->get("Place");
$placeName=$this->input->get("placeN");

$url_opciones=$_SERVER['QUERY_STRING'];
parse_str($url_opciones, $info); 

//parseo URL


$center = "-34.612584,-68.350325";

// MAPA CIUDAD 
	if ($a=="interactivo" or $a=="Ciudad"){
$config['center'] = $center;
$config['zoom'] = 'auto';
$config['map_width'] = '100%';
$config['map_heigth'] = '600px';
//VER PANORAMIO
if($pano=="TRUE"){
$config['panoramio'] = TRUE;
$vistapano="Si";}
//VER PLACES
if($place=="TRUE"){
$vistaPlace="Si";
$config['places'] = TRUE;
$config['placesLocation'] =  $center;
$config['placesRadius'] = 5000; 
if($placeName!="FALSE" or $placeName!=""){
$config['placesName'] =$placeName; 
}
}

$this->googlemaps->initialize($config);
//PUNTOS DE INTERES 
if ($Pinteres=="TRUE") {
	$vistaInteres="Si";
$marker = array();
$marker['position'] = '-34.613219,-68.338802';
$marker['infowindow_content'] = '<div style="width:150px;"><b>CAsino tower</b></div><div><p>Casino del Hotel Tower Inn &amp; Suite, cuenta con gran variedad de maquinas, mesas de juegos. Torneos de Poker</p></div>';
$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
$this->googlemaps->add_marker($marker);
$marker['position'] = '-34.612584,-68.350325';
$marker['infowindow_content'] = '<div style="width:150px;"><b>Paruqe Yrigoyen</b></div><div><p>El parque Yrigoyen en el mayor pulmon verde de la ciudad. Cuenta con una suoerficie de mas de 60.000 m2 de parquizado.</p></div>';
$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
$this->googlemaps->add_marker($marker);
$marker['position'] = '-34.613891,-68.353329';
$marker['infowindow_content'] = '<div style="width:150px;"><b>Anfiteatro Chato Santa Cruz</b></div><div><p>Esta Ubicado en el centro del parque Yrigoyen. Cuenta con capacidad para 10.000 personas.</p></div>';
$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
$this->googlemaps->add_marker($marker);
$marker['position'] = '-34.613219,-68.330369';
$marker['infowindow_content'] = '<div style="width:150px;"><b>Plaza San Martin</b></div><div><p>Remodelada en 2009, con un dise&ntilde;o elegante y moderno, esta cuenta con 3 fuentes de Agua.</p></div>';
$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
$this->googlemaps->add_marker($marker);
}
$titulo_pag="MAPA INTERACTIVO";
$titleP=" MAPAS en San Rafael | San Rafael Late";
$descrip="Mapa interactivo de San Rafael Mendoza - Encuentre puntos de Interes,  Fotos, Empresas geolocalizadas con la herramienta de Google Maps ";
$keys="mapas, san, rafael, empresas, mendoza, argentina";
$data['opciones_map']="TRUE";
$data['direccion22']="FALSE";
;
}

if($a=="buscadorderutas")
{
$start = $this->input->get("start");
$end = $this->input->get("end");
if($start==""){$start="Buenos Aires";}
if($end==""){$end="San Rafael Mendoza";}

$config['zoom'] = 'auto';
$config['map_width'] = '100%';
$config['map_heigth'] = '600px';
$config['directions'] = TRUE;
$config['directionsStart'] = $start;
$config['directionsEnd'] = $end;
$config['directionsDivID'] = 'directionsDiv';
$this->googlemaps->initialize($config);

$titulo_pag="Buscador de Rutas ";
$data['titulo_pag2']=" Como Llegar a ".str_replace(","," ",ucwords($end))."  desde  ".str_replace(","," ",ucwords($start))." ";
$titleP=" Ruta  desde  ".str_replace(","," ",ucwords($start))." a ".str_replace(","," ",ucwords($end))." | Buscador de Rutas y Mapas ";
$descrip="Ruta  desde  ".str_replace(","," ",ucwords($start))." hasta ".str_replace(","," ",ucwords($end))." con guia e itinerario del viaje, tiempo de llegada a destino, la ruta mas corta ... la mejor herramienta para planificar tu viaje... ";
$keys="mapas, san, rafael, empresas, argentina,". ucwords($start).",".ucwords($end);
$data['opciones_map']="FALSE";
$data['direccion22']="TRUE";
$data['start']=$start;
$data['end']=$end;
}


// PASO DATOS DEL MAPA
if($vistapano!="" or $vistaInteres!="" or $vistaPlace!=""){
$vistaActual='<div class="vistaActualMap"> <b>Paramio:</b>'.$vistapano.'  -  <b>Puntos Interes:</b>'.$vistaInteres.'  -  <b>Empresas:</b>'.$vistaPlace. ' - <b>Rubro Empresa :</b> '.$placeName.' <a href="'.base_url().'/multimedia/Mapas/'.$a.'">  Eliminar Opciones</a>  </div>';
} else {
$vistaActual="";

}
$data['vista_actual']=$vistaActual;
$data['Place']=$vistaPlace;
$data['Pano']=$vistapano;
$data['PlaceName']=$placeName;
$data['Pinteres']=$vistaInteres;


$data['map'] = $this->googlemaps->create_map();
	// DATOS DE AGENDA
		$data['row_A']=$this->fag->agenda();
	// TIPOS ALOJAMIENTOS 
		$data['alojarmenu']=$this->fag->tiposalojar();
	// LISTAR TIPO ALOJAMIENTOS PARA BUSCADOR
		$data['Tipo_A']=$this->fag->tiposalojar();
	 //javascript	
		$data['js']=array(
     		//JS GENERAL
			"js/funcionesG"
			
			
						);
	//css
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			//TOOLTIP
			"css/tooltip"
		);
		$data['body']="website/body_maps";
		$data['titulo_pag']=$titulo_pag;
		$data['title']=$titleP;
		$data['descripcion']=$descrip;
		$data['keywords']=$keys;
	$this->load->view('templates/website/template_gral', $data);
//}


}

public function lista_fotos()
	{
		$tiposIM = $this->dbmedia->tipo_fotos();

		$data['tiposIM']=$tiposIM;
	// DATOS DE AGENDA
		$data['row_A']=$this->fag->agenda();
	// TIPOS ALOJAMIENTOS 
		$data['alojarmenu']=$this->fag->tiposalojar();
	// LISTAR TIPO ALOJAMIENTOS PARA BUSCADOR
		$data['Tipo_A']=$this->fag->tiposalojar();
	//javascript	
		$data['js']=array(
     //JS GENERAL
			"js/funcionesG"
			
			
						);
	//css
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			//TOOLTIP
			"css/tooltip"
		);


		$data['body']="website/body_fotos";
		$data['titulo_pag']="Fotos de San Rafael";
		$data['title']="Galeria de Fotos de San Rafael Mendoza";
		$data['descripcion']="Disfruta de la Belleza y Majestuosidad de los Paisajes de San Rafael, Disfruta como si estuvieras aca, las mejores actividades de San Rafael.";
		$data['keywords']="Fotos, Paisajes, san, rafael, galeria ";
	$this->load->view('templates/website/template_gral', $data);
		}



public function galeria_fotos($name)
	{

		$nombreIG=str_replace("-", " ",$name); // QUITO - a la URL de la imagenes para obtener name tipo_imagenes
		$fGaleria = $this->dbmedia->galeria_fotos($nombreIG);

		$data['Fgaleria']=$fGaleria;
		
	// DATOS DE AGENDA
		$data['row_A']=$this->fag->agenda();
	// TIPOS ALOJAMIENTOS 
		$data['alojarmenu']=$this->fag->tiposalojar();
	// LISTAR TIPO ALOJAMIENTOS PARA BUSCADOR
		$data['Tipo_A']=$this->fag->tiposalojar();
	//javascript	
		$data['js']=array(
     //JS GENERAL
			"js/funcionesG",
			"js/lightbox/js/lightbox",
			"js/fotos"
			
			
						);
	//css
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			//TOOLTIP
			"css/tooltip"
		);

		$data['imgface']=base_url().$fGaleria[0]['it_gral_upload']."1.jpg";
		$data['body']="website/body_fotos";
		$data['titulo_pag']=$fGaleria[0]['it_nombre'];
		$data['title']=$fGaleria[0]['it_nombre']." | Galeria de Fotos";
		$data['descripcion']=$fGaleria[0]['it_descripcion'];
		$data['keywords']="Fotos, Paisajes, san, rafael, galeria, ";
	$this->load->view('templates/website/template_gral', $data);
		}	



public function videos()
	{

		$videos = $this->dbmedia->videos();

		$data['videotube']=$videos;

	// DATOS DE AGENDA
		$data['row_A']=$this->fag->agenda();
	// TIPOS ALOJAMIENTOS 
		$data['alojarmenu']=$this->fag->tiposalojar();
	// LISTAR TIPO ALOJAMIENTOS PARA BUSCADOR
		$data['Tipo_A']=$this->fag->tiposalojar();
	//javascript	
		$data['js']=array(
     //JS GENERAL
			"js/funcionesG",
			"js/video",
		
			
			
						);
	//css
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			//TOOLTIP
			"css/tooltip",
			
		);


		$data['body']="website/body_videos";
		$data['titulo_pag']="Videos de San Rafael";
		$data['title']="Galeria de Videos de San Rafael";
		$data['descripcion']="Los mejores Videos de San Rafael, disfruta las mejores imagenes y videos de San Rafael, actividades,  rafting, etc";
		$data['keywords']="videos, Paisajes, san, rafael, galeria,rafting, actividades ";
	$this->load->view('templates/website/template_gral', $data);
		}	
	}
?>