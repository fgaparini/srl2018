<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model("website/dbhome");
		$this->load->model("website/dbagenda");

		$this->load->library('Mobile_Detect');
	}

	public function index()
	{
		  $detect = new Mobile_Detect();
		if ($detect->isMobile() && !$detect->isTablet() )
{
  redirect(base_url()."website/mobile");
}
//TABS ALOJAMIENTOS
		// $data['row1']=$this->dbhome->homeC("1","0","6");
		// $data['row2']=$this->dbhome->homeC("2","0","6");
		// $data['row3']=$this->dbhome->homeC("3","0","6");
//LISTADO DE ALOJAMIENTOS PARA FILTRAR
		$data['row_desta']=$this->dbhome->alojar_desta("0","8");
	foreach ($data['row_desta'] as $var) {
		$tipos['ids'][]=$var['ID_TipoAlojamiento'];
		$tipos['tipos'][]=$var['TituloAlojamiento'];
		# code.=..
	}
	$ids_tipo=array_unique($tipos['ids']);
	$tiposA=array_unique($tipos['tipos']);
// print_r($ids_tipo);
// print_r ("<br>");
// print_r($tiposA);
// exit();

	$data['ids_tipo']=$ids_tipo;
	$data['tiposA']=$tiposA;
	
//TABS EXCURSIONES
		$query2= "Select e.Empresa,e.ID_Empresa, e.Descripcion, e.Url  FROM empresas e, tipoempresa t  WHERE t.TipoEmpresa = 'turisticos' AND e.Basico='0' AND e.ID_TipoEmpresa= t.ID_TipoEmpresa
		ORDER BY RAND() LIMIT 0, 6 ";
		$rows4=$this->db->query($query2);
		$rows4 =$rows4->result_array();
		
//DESTACAMOS PAGINAS 
		$query3= "Select *  FROM paginas p, tipopagina t Where p.ID_TipoPagina=t.ID_TipoPagina AND p.DestaPagina ='1' AND t.TipoPagina <> 'noticias' ORDER BY ID_Pagina DESC LIMIT 0, 4 ";
		$rows5=$this->db->query($query3);
		$rows_p =$rows5->result_array();
		$data['row_p']=$rows_p;

//NOTICIAS 
		$query4= "Select *  FROM paginas p, tipopagina t Where p.ID_TipoPagina=t.ID_TipoPagina AND t.TipoPagina = 'noticias' ORDER BY ID_Pagina DESC LIMIT 0, 4 ";
		$rows6=$this->db->query($query4);
		$rows_n =$rows6->result_array();
		$data['row_not']=$rows_n;

// PROMOCIONES
		$hoypromo = date('Y-m-d');
		$query5= "Select 
					    p.*, i.Nombre,a.Url, a.ID_Alojamiento, ta.TipoAlojamiento
					FROM
					    promociones p,
					    alojamientos a,
					    informaciongeneral i,
						tipoalojamiento ta
					Where
					    p.HastaPromo >= '$hoypromo'    
						AND a.ID_Alojamiento = p.ID_Alojamiento
						AND i.ID_InformacionGeneral = a.ID_InformacionGeneral
						AND ta.ID_TipoAlojamiento=a.ID_TipoAlojamiento
					GROUP BY p.ID_Promocion 
					ORDER BY RAND() LIMIT 0, 5 ";
		$rowsP=$this->db->query($query5);
		$rows_Pro =$rowsP->result_array();
		
		$data['row_pro']=$rows_Pro;
//AGENDA 
		$data['row_A']=$this->fag->agenda();
// TIPOS ALOJAMIENTOS 
		$data['alojarmenu']=$this->fag->tiposalojar();
		$data['Tipo_A']=$this->fag->tiposalojar();//para buscador
// CIRCUITOS TURISTICO
		  $circuturis = $this->dbhome->PaginaCategoria('circuitos-turisticos');
		  $data['circuturis'] =$circuturis ;
		 
//PASAR DATOS	
		$data['row4']=$rows4;
		
		$data['js']=array(
			//esto es carusel 
			
			"js/carusel/js/jquery.smoothdivscroll-1.3-min",
			"js/carusel/js/jquery.mousewheel.min",
			//JS generales
			"js/funcionesG",
			"js/swfobject/swfobject",
			//revolutionslider
			"js/revolutionSlider/js/jquery.themepunch.plugins.min",
			"js/revolutionSlider/js/jquery.themepunch.revolution.min",
			"js/runtime",
			"js/isotope.pkgd.min",
			
		
			
			
			//JS Home
			"js/home"


			);
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			//revolutionslider
			"js/revolutionSlider/css/revolution",
			//CARUSELL
			"js/carusel/css/smoothDivScroll"

			

		);
		//DATOS DE LA PAGINA
		$data['body']="website/body_home_v2";
		$data['title']="Turismo en San Rafael Mendoza: Hoteles, Cabañas, Circuitos Turisticos ";
		$data['descripcion']="Portal turistico de San Rafael Mendoza Argentina. Consulta Hoteles, Cabañas, Apart hoteles, departamentos en San Rafael y Alrrededores. Disfruta de los imponentes paisajes de San Rafael ... te esperamos ";
		$data['keywords']="san, rafael, sanrafael, sanrafaelate, mendoza,mza, argentina,turismo,hotel, hoteles, cabanias,cabana, alojamiento, turismo,  valle, grande,reyunos, vinos, Aventura, excursiones";

		$this->load->view('templates/website/template_gral-v2', $data);

	}

public function pruebas()
	{ 
		
		  $detect = new Mobile_Detect();
		if ($detect->isMobile() && !$detect->isTablet() )
{
  redirect(base_url()."website/mobile");
}
//TABS ALOJAMIENTOS
		$data['row1']=$this->dbhome->homeC("1","0","6");
		$data['row2']=$this->dbhome->homeC("2","0","6");
		$data['row3']=$this->dbhome->homeC("3","0","6");
//TABS EXCURSIONES
		$query2= "Select e.Empresa,e.ID_Empresa, e.Descripcion, e.Url  FROM empresas e, tipoempresa t  WHERE t.TipoEmpresa = 'turisticos' AND e.Basico='0' AND e.ID_TipoEmpresa= t.ID_TipoEmpresa
		ORDER BY RAND() LIMIT 0, 6 ";
		$rows4=$this->db->query($query2);
		$rows4 =$rows4->result_array();
		
//DESTACAMOS PAGINAS 
		$query3= "Select *  FROM paginas p, tipopagina t Where p.ID_TipoPagina=t.ID_TipoPagina AND p.DestaPagina ='1' ORDER BY p.ID_Pagina DESC LIMIT 0, 4 ";
		$rows5=$this->db->query($query3);
		$rows_p =$rows5->result_array();
		$data['row_p']=$rows_p;

// PROMOCIONES
		$hoypromo = date('Y-m-d');
		$query5= "Select 
					    p.*, i.Nombre,a.Url, a.ID_Alojamiento, ta.TipoAlojamiento
					FROM
					    promociones p,
					    alojamientos a,
					    informaciongeneral i,
						tipoalojamiento ta
					Where
					    p.HastaPromo >= '$hoypromo'    
						AND a.ID_Alojamiento = p.ID_Alojamiento
						AND i.ID_InformacionGeneral = a.ID_InformacionGeneral
						AND ta.ID_TipoAlojamiento=a.ID_TipoAlojamiento
					GROUP BY p.ID_Promocion 
					ORDER BY RAND() LIMIT 0, 5 ";
		$rowsP=$this->db->query($query5);
		$rows_Pro =$rowsP->result_array();
		
		$data['row_pro']=$rows_Pro;
//AGENDA 
		$data['row_A']=$this->fag->agenda();
// TIPOS ALOJAMIENTOS 
		$data['alojarmenu']=$this->fag->tiposalojar();
		$data['Tipo_A']=$this->fag->tiposalojar();//para buscador
//PASAR DATOS	
		$data['row4']=$rows4;
		
		$data['js']=array(
			//esto es carusel 
			
			"js/carusel/js/jquery.smoothdivscroll-1.3-min",
			"js/carusel/js/jquery.mousewheel.min",
			//JS generales
			"js/funcionesG",
			"js/swfobject/swfobject",
			//JS Home
			"js/home"


			);
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			//CARUSELL
			"js/carusel/css/smoothDivScroll"

			

		);
		//DATOS DE LA PAGINA
		$data['body']="website/body_home_pruebas";
		$data['title']="Turismo en San Rafael Mendoza | Hoteles, Cabañas, Circuitos Turisticos | San Rafael Late ";
		$data['descripcion']="Portal de Turismo de San Rafael Mendoza - Guia de Hoteles, Cabañas,Apart, casas Turisticas en San Rafael -  Disfruta de los imponentes paisajes de San Rafael ... te esperamos ";
		$data['keywords']="san, rafael, sanrafael, sanrafaelate, mendoza,mza, argentina,turismo,hotel, hoteles, cabanias,cabana, alojamiento, turismo,  valle, grande,reyunos, vinos, Aventura, excursiones";

		$this->load->view('templates/website/template_home', $data);

	}



}

/* End of file home.php */
/* Location: ./application/controllers/home.php */

?>