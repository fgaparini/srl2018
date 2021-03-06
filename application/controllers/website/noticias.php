<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->model("website/dbdestacados");

	}

	
public function listado($tipopag, $start)
	{

		//PAGINACION
		$this->load->library('pagination');

//Obtenemos resultados
$porpagina="10";
$totals=$this->dbdestacados->getcantidad($tipopag);
$destaPag=$this->dbdestacados->listar($tipopag,$start,$porpagina);
$data['rowDe']=$destaPag;
 //configuramos

$config['base_url'] = base_url()."noticias/noticias-san-rafael/";
$config['total_rows'] = $totals;//obtenemos la cantidad de registros
$config['per_page'] = $porpagina;  //cantidad de registros por página
$config['num_links'] = '6'; //nro. de enlaces antes y después de la pagina actual
$config['uri_segment'] = '3';  //segmentos que va a tener nuestra URL
$config['use_page_numbers'] = TRUE;
$config['page_query_string'] = FALSE;
$config['full_tag_open'] = '<div class="pagination"><ul>';
$config['full_tag_close'] = '</ul></div><!--pagination-->';
$config['first_link'] = '&laquo; Primer';
$config['first_tag_open'] = '<li class="prev page">';
$config['first_tag_close'] = '</li>';
$config['last_link'] = 'último &raquo;';
$config['last_tag_open'] = '<li class="next page">';
$config['last_tag_close'] = '</li>';
$config['next_link'] = 'siguiente &rarr;';
$config['next_tag_open'] = '<li class="next page">';
$config['next_tag_close'] = '</li>';
$config['prev_link'] = '&larr; anterior';
$config['prev_tag_open'] = '<li class="prev page">';
$config['prev_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="">';
$config['cur_tag_close'] = '</a></li>';
$config['num_tag_open'] = '<li class="page">';
$config['num_tag_close'] = '</li>';

$this->pagination->initialize($config);
$data['paginacion'] = $this->pagination->create_links();
$data['listartipos'] = $this->dbdestacados->listartipos($tipopag);
$data['tipopag']=$tipopag;
		//datos generales	
		$data['body']="website/noticias";
		if ($start==0) { //TIPO PAGINA TODOS
		$data['title']= "Noticias de San Rafael | Actualidad , información  y mas   ";
		$data['descripcion']= "Toda la actualidad vinculada a San Rafael, Argentina. Informate de las últimas noticias de San Rafael Mendoza ";
		
		} else { //TIPO PAGINA TODOS
			$tipoagina=$this->dbdestacados->tipopag($tipopag);

			$data['title']= "Noticias de San Rafael | Pagina Nº ".$start;
		$data['descripcion']= "Toda la actualidad vinculada a San Rafael, Argentina. Informate de las últimas noticias de San Rafael Mendoza, Paginas N°".$start;
		}


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