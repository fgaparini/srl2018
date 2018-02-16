<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	$this->load->model("website/dbempresas");
	}

	public function listarempresas($a,$b)
	{
		$start=0;
		$end=100;

		
		$subtipo_emp = $this->dbempresas->subtipoempresas($b);
		$data['subtipo']= $subtipo_emp;

		$id_subtipo = $subtipo_emp['ID_SubtipoEmpresa'];// id subtipo empresa
		$empresas_sub=$this->dbempresas->empresas ($id_subtipo ,0,100);// obtengo las empresas segun el subtipo
		$data['empresaslist']=$empresas_sub['rows'];//obtengo los datos de las empresasa x subtipo
		$data['empresasltotal']=$empresas_sub['totals'];// cantidad de resultaos empresas 
		$data['TipoEmpresa'] = $this->dbempresas->tipoempresas($a);//obtengo tipo de empresa
		$dirsubt = str_replace(" ", "-", $subtipo_emp['SubtipoEmpresa']);	// quito espacios en balco de la cadena
		$data['dirsubt']=$dirsubt;// envio candena
	 //datos generales	
		$data['body']="website/body_empresas";
		$data['title']= $subtipo_emp['TituloSubEmpresa']." | San Rafael Mendoza  ";
		$data['descripcion']=$subtipo_emp['DesSubEmpresa'];
		$data['keywords']=$subtipo_emp['KeySubEmpresa'];
	//DATA PAGINA 
		$data['titulo_E']=$subtipo_emp['TituloSubEmpresa'];
	// DATOS DE AGENDA
		$data['row_A']=$this->fag->agenda();
	// TIPOS ALOJAMIENTOS MENU
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
			"js/AD-Gallery/jquery.ad-gallery"


		);

	$this->load->view('templates/website/template_gral', $data);
	
}


	public function infoempresas($a)
	{
		$start=0;
		$end=100;

		
		$tipoempresas = $this->dbempresas->tipoempresas($a);
		$data['tipoempresas']= $tipoempresas;
		$idtipo=$tipoempresas['ID_TipoEmpresa'];
		
		$subtipos = $this->dbempresas->listarsubtipo ($idtipo);
		$data['subtipo']= $subtipos;
	 //datos generales	
		$data['body']="website/body_tipoempresas";
		$data['title']= $tipoempresas['TituloEmpresa']." | San Rafael Mendoza  ";
		$data['descripcion']=$tipoempresas['DesEmpresa'];
		$data['keywords']=$tipoempresas['KeyEmpresa'];
	//DATA PAGINA 
		$data['titulo_E']=$tipoempresas['TituloEmpresa'];
	// DATOS DE AGENDA
		$data['row_A']=$this->fag->agenda();
	// TIPOS ALOJAMIENTOS MENU
		$data['alojarmenu']=$this->fag->tiposalojar();
		// LISTAR TIPO ALOJAMIENTOS PARA BUSCADOR
		$data['Tipo_A']=$this->fag->tiposalojar();
	 //javascript	
		$data['js']=array(
     		//JS GENERAL
			"js/funcionesG",
					);
	//css
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			//TOOLTIP
			"css/tooltip"
			//GALERIA FICHA

		);

	$this->load->view('templates/website/template_gral', $data);
	
}


}
?>