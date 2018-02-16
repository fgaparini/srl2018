<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listado_alojar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("website/dblistado");
			$this->load->library('Mobile_Detect');
		
	}

	public function alojar($tipo,$start)
	{
		//determinar tipo de alojamiento
 $detect = new Mobile_Detect();
		if ($detect->isMobile() && !$detect->isTablet() )
		{	
			$tipoS=$tipo;
			if (!isset($tipoS)) {
				# code...
			
				$tipoEx=explode(".", $tipoS);
				if (end($tipoEx)=="html") {
	  				redirect(base_url()."m/alojamientos/".$tipo);
				} else {
				 	redirect(base_url()."m/alojamientos/".$tipo.".html");
		
				}
			}
}		

		$dtipos=$this->dblistado->tipoalojar($tipo);
if (count($dtipos)>0){
			$tipos=$dtipos['ID_TipoAlojamiento'];
			$titulo_p=$dtipos['TituloAlojamiento'];
			if ($dtipos['TituloAlojamiento']==1) {$tipos2=4;} else {	$tipos2="0";}
			$name_tipo=$dtipos['TipoAlojamiento'];
			$descripcion=$dtipos['DesAlojamiento'];
			$keywords=$dtipos['KeyAlojamiento'];
			$data["TAlojar"]=$tipos;			

	//AGENDA 
		$data['row_A']=$this->fag->agenda();
	// TIPOS ALOJAMIENTOS 
		$data['alojarmenu']=$this->fag->tiposalojar();
	 //	DESTACADOS DB
		$data['rowD']=$this->dblistado->desta($tipos,$tipos2,"0","4");

	 // DETERMINAR TIPOS DE ALJAMIENTOS
		$queryT="SELECT * FROM tipoalojamiento ORDER BY ID_TipoAlojamiento ASC ";
		$rowsT=$this->db->query($queryT);
    	$rows_T =$rowsT->result_array();
    	$data['row_T']=$rows_T;
	//ALOJAMIENTOS PAGINADOS

	//cargamos la librería

// $this->load->library('pagination');

//Obtenemos resultados
if($start==NULL) {$start=0;}
$porpagina="100";
$totals=$this->dblistado->getCantidad($tipos,$tipos2);
$data['rowL']=$this->dblistado->listar($tipos,$tipos2,$start,$porpagina);

 //configuramos

// $config['base_url'] = base_url()."alojamiento/".$tipo;
// $config['total_rows'] = $totals;//obtenemos la cantidad de registros
// $config['per_page'] = $porpagina;  //cantidad de registros por página
// $config['num_links'] = '3'; //nro. de enlaces antes y después de la pagina actual
// $config['prev_link'] = 'anterior'; //texto del enlace que nos lleva a la pagina ant.
// $config['next_link'] = 'siguiente'; //texto del enlace que nos lleva a la sig. página
// $config['uri_segment'] = '3';  //segmentos que va a tener nuestra URL
// $config['first_link'] = '<<';  //texto del enlace que nos lleva a la primer página
// $config['last_link'] = '>>';   //texto del enlace que nos lleva a la última página
// $config['full_tag_open']="<div id='paginacion'>"; //div de apertura de paginacion
// $config['full_tag_close']="</div>"; //div de cierre paginacion
// $config['next_tag_open']="<div class='nextR'>";
// $config['next_tag_close']="</div>";
// $config['num_tag_open'] = '<div>';
// $config['num_tag_close'] = '</div>';
// $this->pagination->initialize($config);
// $data['pag_links'] = $this->pagination->create_links();		
		
	 //javascript	
		$data['js']=array(
			"js/listado",
			"js/funcionesG",
			"js/jquery.ajax-progress"
				);
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			"js/scroll-infinite/css/jquery.ias",
			//TOOLTIP
			"css/tooltip"

		);

 //javascript	
		$Ajs=array(
			"listado.js",
			"funcionesG.js"
				);
		$Acss=array(
			
			"normalize.min.css",
			"estilos.css",
			"responsive.css",
			//"js/scroll-infinite/css/jquery.ias.css",
			"tooltip.css"

		);
		/* MINIFY 
		$this->load->library('minify');	
		//CSS
		$this->minify->css_file = 'sty.min.css';
		$this->minify->assets_dir = 'css';
		$this->minify->css($Acss);
		$cssp= $this->minify->deploy_css(true);
		$data['cssp']=$cssp;

		//JS 
		$this->minify->js_file = 'jsG.min.js';
		$this->minify->assets_dir = 'js';
		$this->minify->js($Ajs);
		$jsp= $this->minify->deploy_js(true);
		$data['jsp']=$jsp;
		*/
		$cant_A=count($data['rowL'])+4;
		//DATOS DE LA PAGINA
		$data['titulo_p']=$titulo_p;
		$data['name_T']=$name_tipo;
		$data['title']=$titulo_p." en San Rafael, Mendoza: Fotos, Info y Reservas";
		$data['descripcion']=$cant_A." ". $descripcion;
		$data['keywords']=$keywords;


		$this->load->view('templates/website/template_listado', $data);
	} else { redirect(base_url());}
	}

public function alojarpag ($pag,$tipo)
	{
	//OBTENGO TIPOS DE ALOJAMIENTOS
	 $alojar= $this->dblistado->settipos();
	 $data['tipoA']=$alojar;
     //print_r($alojar);
     //exit();
	 $data['loca']=str_replace("-", " ", $tipo);
	 $localidad=str_replace('-', ' ', $tipo);	
	//AGENDA 
		$data['row_A']=$this->fag->agenda();
	// TIPOS ALOJAMIENTOS 
		$data['alojarmenu']=$this->fag->tiposalojar();
	

	 // DETERMINAR TIPOS DE ALJAMIENTOS
		$queryT="SELECT * FROM tipoalojamiento ORDER BY ID_TipoAlojamiento ASC ";
		$rowsT=$this->db->query($queryT);
    $rows_T =$rowsT->result_array();
    $data['row_T']=$rows_T;
	//ALOJAMIENTOS PAGINADOS
	
		
	 //javascript	
		$data['js']=array(
			"js/listado",
			"js/funcionesG"
				);
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			"js/scroll-infinite/css/jquery.ias",
			//TOOLTIP
			"css/tooltip"

		);
		//DATOS DE LA PAGINA
		$data['titulo_p']="Alojamientos en ". $localidad  ;
		$data['title']="Alojamientos en  $localidad San Rafael | Cabañas, Hoteles , Apart en ". $localidad . " ";
		$data['descripcion']= "Alojamientos en ". $localidad . " San Rafael Mendoza - Hoteles, cabañas , ApartHoteles, hostel, etc en ". $localidad .". Alquile su Alojamiento en ".$localidad ." :: San Rafael Late ";
		$data['keywords']= $localidad.", san, rafael, mendoza, hoteles, cabanas, otel, apart, deptos, mendoza, mza, cabin, cabania, cabana";


		$this->load->view('templates/website/template_listado_localidad', $data);
	}



} ?>