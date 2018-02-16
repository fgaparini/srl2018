<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detalle extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->model("website/dbfichas");
			$this->load->library('Mobile_Detect');

	}

	
public function alojar($a,$b,$c)
	{

		  $detect = new Mobile_Detect();
		if ($detect->isMobile() && !$detect->isTablet() )
		{
				if ($c==0){  
					redirect(base_url()."m/alojamiento/".$a."/".$b."/index.html");
						} else {  
							redirect(base_url()."m/alojamiento/".$a."/".$b."/".$c) ;
						}


		}
// DATOS ALOJAMIENTO
		if ($c==0){$url=$a."/".$b."/index.html"; 	} else {$url=$a."/".$b."/".$c;}
		
		$result_Al = $this->dbfichas->fichaal($url);
if (count($result_Al)>0) {
			# code...
		
		$this->fag->estadisticas('ficha',$result_Al['ID_Alojamiento'],'','alojar');
		$data['row_Al']=$result_Al ;
// FOTOS ALOKAR 
		$id_Al=$result_Al['ID_Alojamiento'];
		
		$data['row_FA']=$this->dbfichas->fotosal($id_Al);
// SERVICIOS ALOJAR
		$data['row_S']=$this->dbfichas->servicios($id_Al);
// LOCALIDAD  ALOJAR
//		$data['row_Lo']=$this->dbfichas->localidad($result_Al['Localidad']);
//AGENDA 
		$data['row_A']=$this->fag->agenda();
// TIPOS ALOJAMIENTOS 
		$data['alojarmenu']=$this->fag->tiposalojar();

// DESCRIPCION KEYS Y URLS DE LOS ALOJAMIENTOS
		$datostipo= $this->dbfichas->tipoalojar($result_Al['ID_TipoAlojamiento']);
		$descripcion=$result_Al['TipoAlojamiento']." ".$result_Al['Nombre']." en San Rafael Mendoza - ". substr(strip_tags($result_Al['Descripcion']),0,200).".. " ;
		$keywords=$datostipo['KeyAlojamiento'];
		$tipoalojamientos=$datostipo['TituloAlojamiento'];
		$urlback="alojamiento/".$datostipo['UrlAlojamiento'];	

//ESTADISTICAS DE VISITAS
//$url="hola";
 //$this->fag->estadisticas('ficha',$id_Al,$url,'alojar');
			

//DATA ENVIAR
		$data['body']="website/body_fichas";
		$data['title']= $result_Al['TipoAlojamiento']." ".$result_Al['Nombre']." | San Rafael Mendoza ";
		$data['descripcion']=$descripcion;
		$data['keywords']=$keywords;
		$data['tipoalojamientos']=$tipoalojamientos;
		$data['urlback']=$urlback;
	// SCRIPT 
		$data['script']=array(
			'<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>'
			);
	 //javascript	
		$data['js']=array(
			//JS GENERAL
			"js/funcionesG",
			"js/fichas",
						//GALERIA FICHA
			"js/AD-Gallery/jquery.ad-gallery.min",
			"js/galeriaFicha"		
					);

		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			//TOOLTIP
			"css/tooltip",
			//GALERIA FICHA
			"js/AD-Gallery/jquery.ad-gallery"


		);


	$this->load->view('templates/website/template_gral-v2', $data);
	} else {redirect(base_url()."website/errores");}  

	}

//--------------------------------------------------//
// --------------- FICHA EMPRESA ------------------ //
//--------------------------------------------------//

public function empresa($a,$b,$c)
	{
// DATOS EMPRESA

		 
		$url="servicios/".$a."/".$b."/".$c;
		
		$resulta = $this->dbfichas->empresas($c);
		$result_E = $resulta['rows'];
		$total_E=$resulta['totals'];
		$data['row_Al']=$result_E;
		$data['total_E']=$total_E;
// FOTOS EMPRESA 

		$id_E=$result_E['ID_Empresa'];
		$imgsEmpresa=$this->dbfichas->imagenesempresa($id_E);
		$data['row_img']=$imgsEmpresa['rows'];
//SUPTIPO EMPRESA
		$subtipo= str_replace("-"," ", $b);
		$subtipodata=$this->dbfichas->subtiposemp($subtipo);
		$data['row_sub']=$subtipodata;

//AGENDA 
		$data['row_A']=$this->fag->agenda();
// TIPOS ALOJAMIENTOS 
		$data['alojarmenu']=$this->fag->tiposalojar();

// DESCRIPCION KEYS Y URLS DE LOS ALOJAMIENTOS
		$descripcion=$result_E['Empresa']." - ".$result_E['Descripcion']." - San Rafael Late - www.sanrafaellate.com" ;
		$keywords=$subtipodata['KeySubEmpresa'];
		
		$urlback="servicios/". $a ."/". $subtipodata['UrlSubEmpresa'] ;	
		$urltipoE= base_url()."servicios/". $a ."/";
		$tipoE=$a;
		

// ESTIDISTICAS DE VISITAS 
			$this->fag->estadisticas ('ficha',$id_E,$url,'empresa');

//DATA ENVIAR
		$data['body']="website/body_fichas_E";
		$data['title']= $result_E['Empresa']." | ". $subtipo ." | ". $a." | San Rafael Mendoza | San Rafael Late ";
		$data['descripcion']=strip_tags($descripcion);
		$data['keywords']=$keywords;
		
		$data['urlback']=$urlback;
		$data['urltipoE']=$urltipoE;
		$data['tipoE']=$tipoE;
	 //javascript	
		$data['js']=array(
			"js/fichas",
						//JS GENERAL
			"js/funcionesG",
			//GALERIA FICHA
			"js/AD-Gallery/jquery.ad-gallery.min",
			"js/galeriaFicha"				);
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			//TOOLTIP
			"css/tooltip",
			//GALERIA FICHA
			"js/AD-Gallery/jquery.ad-gallery"


		);


		$this->load->view('templates/website/template_gral', $data);	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
?>