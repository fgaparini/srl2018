<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nosotros extends CI_Controller {

	public function __construct()
	{
		parent::__construct();


	}

	
public function aboutus($url)
	{

$query= sprintf("Select *  FROM paginas p, tipopagina t Where p.ID_TipoPagina=t.ID_TipoPagina AND t.TipoPagina='nosotros' AND p.url='%s' ",$url);
$rowsD=$this->db->query($query);
$rowsPa=$rowsD->row_array();
$data['row_Pa']=$rowsPa;

if($url=="publicidad.html"){
	$asunto = "Quiero Publicidad en San Rafael Late";
	$C_form="si";
	$tipoc= "P";
}
elseif($url=="contacto.html"){
	$asunto = "Contacto San Rafael Late ";
	$C_form="si";
	$tipoc= "C";
}
elseif($url=="opina.html"){
	$asunto = "Opinion sobre San Rafael Late ";
	$C_form="si";
	$tipoc= "O";
}
elseif($url=="opina.php"){
	$asunto = "Opinion sobre San Rafael Late ";
	$C_form="si";
	$tipoc= "O";
} else {$asunto = "0";
	$C_form="0";
	$tipoc= "O";}
$data['asunto']=$asunto;
$data['C_form']=$C_form;
$data['tipoc']=$tipoc;
		//datos generales	
		$data['body']="website/nosotros";
		$data['title']=$rowsPa['MetaTitulo'];
		$data['descripcion']=$rowsPa['MetaDescripcion'];
		$data['keywords']=$rowsPa['Keywords'];



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
			"js/aboutas"	);
	//css
		$data['css']=array(
			//CSS globales
			"css/normalize.min",
			"css/estilos",
			"css/responsive",
			//TOOLTIP
			"css/tooltip"


		);

	$this->load->view('templates/website/template_gral', $data);
	

		
	}





}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
?>