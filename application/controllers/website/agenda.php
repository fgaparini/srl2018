<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function detalle($id)
	{
//
		$ids=$id;	

		
		//AGENDA 
		$query4= "Select Date_format(Fecha,'%d/%m') as fechaA, ID_Agenda,Titulo, Descripcion  FROM agendas WHERE ID_Agenda='$ids'";
		$rowsA=$this->db->query($query4);
		$rows_A =$rowsA->row_array();
		$data['row_Ag']=$rows_A;
		// IMAGENES AGENDA
		$query5= "Select *  FROM agendas_imagenesage WHERE ID_Agenda='$ids'";
		$rowsAi=$this->db->query($query5);
		$rows_Ai =$rowsAi->result_array();
		$data['row_Ai']=$rows_Ai;
		
		$this->load->helper('date');
		
		$meshoy=mdate('%m');
		$meses=array(
			"1"=>"Enero",
			"2"=>"Febrero",
			"3"=>"Marzo",
			"4"=>"Abril",
			"5"=>"Mayo",
			"6"=>"Junio",
			"7"=>"Julio",
			"8"=>"Agosto",
			"9"=>"Septiembre",
			"10"=>"Octubre",
			"11"=>"Noviembre",
			"12"=>"Diciembre"
		);
		$data['meshoy']=$meshoy;
		$data['meses']=$meses;

		
		//datos generales	
		$data['body']="website/agenda";
		$data['title']= $rows_A['Titulo']." | Agenda | San Rafael Mendoza  ";
		$data['descripcion']=substr(strip_tags($rows_A['Descripcion']),0, 200);
		$data['keywords']="Agenda, Eventos, San , Rafael,".str_replace(" ",",",$rows_A['Titulo']);
		$data['agendameta']="ok";
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
			//GALERIA FICHA
			"js/AD-Gallery/jquery.ad-gallery.min",
			"js/galeriapaginas"				);
	//css
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			//TOOLTIP
			"css/tooltip",
			//GALERIA FICHA
			"js/AD-Gallery/jquery.ad-gallery2"


		);

	$this->load->view('templates/website/template_gral', $data);
	

		
	}

public function listado($mes)
	{
		//FUNCIONES DE FECHA
		$this->load->helper('date');

		
		$meshoy=mdate('%m');
		$meses=array(
			"0"=> "este Año",
			"1"=>"Enero",
			"2"=>"Febrero",
			"3"=>"Marzo",
			"4"=>"Abril",
			"5"=>"Mayo",
			"6"=>"Junio",
			"7"=>"Julio",
			"8"=>"Agosto",
			"9"=>"Septiembre",
			"10"=>"Octubre",
			"11"=>"Noviembre",
			"12"=>"Diciembre"
		);
		$data['meshoy']=$meshoy;
		$data['meses']=$meses;
		if ($mes>0){
		$mes=(int)$mes;} elseif($mes==0) {$mes=(int)$meshoy;}

		
		//OBTENGO TODOS LOS EVENTOS PARA EL MES 
		$query4= "Select Date_format(Fecha,'%d/%m') as fechaA, ID_Agenda,Titulo, Descripcion  FROM agendas WHERE MONTH(Fecha)='$mes'";
		$rowsAg=$this->db->query($query4);
		$rows_Ag =$rowsAg->result_array();
		$data['row_Ag']=$rows_Ag;

		
		
	
		$data['meshoy']=$meshoy;
		$data['meses']=$meses;
		$data['namemes'] = $meses[$mes];
		
		//datos generales	
		$data['body']="website/agendalist";
		$data['title']= "Agenda Cultural y Eventos de ".$meses[$mes]."| San Rafael Mendoza | San Rafael Late ";
		$data['descripcion']="Todos los Eventos de ".$meses[$mes]." en San Rafael, para que planifiques tus actividades  y saques el maximo provecho a tu estadia .. ";
		$data['keywords']="Agenda, Eventos, San , Rafael,Mendoza, Argentina, ".$meses[$mes];
		
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
			//GALERIA FICHA
			"js/AD-Gallery/jquery.ad-gallery.min",
			"js/galeriapaginas"				);
	//css
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			//TOOLTIP
			"css/tooltip",
			//GALERIA FICHA
			"js/AD-Gallery/jquery.ad-gallery2"


		);

	$this->load->view('templates/website/template_gral', $data);
	

		
	}

	public function todos()
	{
		//FUNCIONES DE FECHA
		$this->load->helper('date');

		
		$meshoy=mdate('%m');
		$meses=array(
			"1"=>"Enero",
			"2"=>"Febrero",
			"3"=>"Marzo",
			"4"=>"Abril",
			"5"=>"Mayo",
			"6"=>"Junio",
			"7"=>"Julio",
			"8"=>"Agosto",
			"9"=>"Septiembre",
			"10"=>"Octubre",
			"11"=>"Noviembre",
			"12"=>"Diciembre"
		);

		$ano_hoy = date("Y");
				
		//OBTENGO TODOS LOS EVENTOS PARA EL MES 
		$query4= "Select Date_format(Fecha,'%d/%m') as fechaA, ID_Agenda,Titulo, Descripcion  FROM agendas WHERE MONTH(Fecha)>='$meshoy' and YEAR(Fecha)>='$ano_hoy' ";
		$rowsAg=$this->db->query($query4);
		$rows_Ag =$rowsAg->result_array();
		$data['row_Ag']=$rows_Ag;

		

		$meshoy=$meshoy+1-1;
	
		$data['meshoy']=$meshoy;
		$data['meses']=$meses;
		$data['namemes'] = $meses[$meshoy];
		$data['Todos'] = "todos";
		
		//datos generales	
		$data['body']="website/agendalist";
		$data['title']= "Agenda Cultural de San Rafael | San Rafael Mendoza | San Rafael Late ";
		$data['descripcion']="Guia de todos los Eventos en San Rafael, para que planifiques tus actividades  y saques el maximo provecho a tu estadia .. Agenda Cultural de San Rafael ";
		$data['keywords']="Agenda, Eventos, San , Rafael,Mendoza, Argentina, ".$meses[$meshoy];
		
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
			//GALERIA FICHA
			"js/AD-Gallery/jquery.ad-gallery.min",
			"js/galeriapaginas"				);
	//css
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			//TOOLTIP
			"css/tooltip",
			//GALERIA FICHA
			"js/AD-Gallery/jquery.ad-gallery2"


		);

	$this->load->view('templates/website/template_gral', $data);
	

		
	}
	public function anteriores()
	{
		//FUNCIONES DE FECHA
		$this->load->helper('date');

		
		$meshoy=mdate('%m');
		$meses=array(
			"1"=>"Enero",
			"2"=>"Febrero",
			"3"=>"Marzo",
			"4"=>"Abril",
			"5"=>"Mayo",
			"6"=>"Junio",
			"7"=>"Julio",
			"8"=>"Agosto",
			"9"=>"Septiembre",
			"10"=>"Octubre",
			"11"=>"Noviembre",
			"12"=>"Diciembre"
		);

		$ano_hoy = date("Y");
				
		//OBTENGO TODOS LOS EVENTOS PARA EL MES 
		$query4= "Select Date_format(Fecha,'%d/%m') as fechaA, ID_Agenda,Titulo, Descripcion  FROM agendas WHERE DAY(Fecha)<now() and MONTH(Fecha)<='$meshoy' and YEAR(Fecha)<='$ano_hoy' ";
		$rowsAg=$this->db->query($query4);
		$rows_Ag =$rowsAg->result_array();
		$data['row_Ag']=$rows_Ag;

		

		$meshoy=$meshoy+1-1;
	
		$data['meshoy']=$meshoy;
		$data['meses']=$meses;
		$data['namemes'] = $meses[$meshoy];
		$data['Todos'] = "todos";
		
		//datos generales	
		$data['body']="website/agendalist";
		$data['title']= "Agenda Cultural de San Rafael | San Rafael Mendoza | San Rafael Late ";
		$data['descripcion']="Guia de todos los Eventos en San Rafael, para que planifiques tus actividades  y saques el maximo provecho a tu estadia .. Agenda Cultural de San Rafael ";
		$data['keywords']="Agenda, Eventos, San , Rafael,Mendoza, Argentina, ".$meses[$meshoy];
		
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
			//GALERIA FICHA
			"js/AD-Gallery/jquery.ad-gallery.min",
			"js/galeriapaginas"				);
	//css
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			//TOOLTIP
			"css/tooltip",
			//GALERIA FICHA
			"js/AD-Gallery/jquery.ad-gallery2"


		);

	$this->load->view('templates/website/template_gral', $data);
	

		
	}





}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
?>