<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile extends CI_Controller {


	

	public function __construct()
	{
		parent::__construct();

		$this->load->model("website/dblistado");
		$this->load->model("website/dbempresas");
		$this->load->model("website/dbgeneral");
		$this->load->model("website/dbfichas");
}
public function index()
	{

		$this->load->view('mobile/home');

	}

	public function alojamientos($url)
	{
		// obtengo tipo alojamiento con URL
		$dtipos=$this->dblistado->tipoalojar($url);


if (count($dtipos)>0){
	// Obtengo datos del tipo alojamiento
			$tipos=$dtipos['ID_TipoAlojamiento'];
			$titulo_p=$dtipos['TituloAlojamiento'];
			if ($dtipos['TituloAlojamiento']==1) {$tipos2=4;} else {	$tipos2="0";}
			$name_tipo=$dtipos['TipoAlojamiento'];
			$descripcion=$dtipos['DesAlojamiento'];
			$keywords=$dtipos['KeyAlojamiento'];
			$data["TAlojar"]=$tipos;
}
$start=0;
$porpagina =40;
//OBENGO ALOJAMIENTOS PARA LISTADO
$data['rowL']=$this->dblistado->listar($tipos,$tipos2,$start,$porpagina);
// OBTENGO ALOJAMIENTOS DESTACADOS
$data['rowD']=$this->dblistado->desta($tipos,$tipos2,"0","6");
	// Obtengo 
		$data['titulo_p']=$titulo_p;
		$data['name_T']=$name_tipo;
		$data['title']=$titulo_p." en San Rafael Mendoza | Version Mobile";
		$data['descripcion']=$descripcion.".. version para celulares, Mobile ";
	

		$this->load->view('mobile/alojamientos',$data);
		// $this->load->view('templates/website/template_listado', $data);
	
}
	public function servicios($tipo)
	{



		$b = $this->dbempresas->tipoempresas($tipo);//obtengo tipo de empresa

		$subtipo_emp = $this->dbempresas->listarsubtipo($b['ID_TipoEmpresa']);
		
		$data['subtipo']= $subtipo_emp;
		$data['TipoEmpresa']= $tipo;
				$data['title']= $b['TituloEmpresa']." | San Rafael Mendoza | Mobile  ";
				$data['descripcion']=$b['DesEmpresa'];
				
		$this->load->view('mobile/servicios',$data);
	}

	public function paginas($a,$b)
	{


		// Obtengo datos de la pagina
 		$pagina = $this->dbgeneral->paginas($a,$b);

 		if (count($pagina)>0){
  $idPagina=  $pagina['ID_Pagina']; // ID PAGINA PPAL
		//obtengo paginas internas relacionadas
  if($pagina['ID_PaginaPrincipal']!=0){
  		$idPaginap=  $pagina['ID_PaginaPrincipal'];
  		$intena_Pa=$this->dbgeneral->paginasint($idPaginap,$idPagina);
	} 
	else 
	{$idPaginap=$idPagina;}

$foto_Pa = $this->dbgeneral->fotosp($idPagina);
}
		$data['row_P'] =$pagina; //datos de la pagina a mostrar
			$data['title']= $pagina['MetaTitulo']." | Version Mobile";
		$data['descripcion']=$pagina['MetaDescripcion'].".. al alcance de tu smartphone.. SAN RAFAEL LATE Mobile";
		$this->load->view('mobile/paginas',$data);
	}



public function fichasA ($a,$b,$c)
	{
		
// DATOS ALOJAMIENTO
		if ($c==0 OR $c==""){$url=$a."/".$b."/index.html"; 	} else {$url=$a."/".$b."/".$c;}
        
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


// datos  PAGINA
		$descripcion=$result_Al['TipoAlojamiento']." ".$result_Al['Nombre']." en San Rafael Mendoza - ". substr(strip_tags($result_Al['Descripcion']),0,200).".. - Version Mobile SAN RAFAEL LATE" ;
		$data['title']= $result_Al['TipoAlojamiento']." ".$result_Al['Nombre']." San Rafael Mendoza | para Mobile  ";
		$data['descripcion']=$descripcion;

		$this->load->view('mobile/fichasA',$data);
		}
	}

	public function turismoaventura ()
	{
		// Obtengo datos de la pagina
 		
 		$query= "Select * FROM paginas p,tipopagina t WHERE p.ID_PaginaPrincipal='8' AND p.ID_Pagina<>'8'  AND t.ID_TipoPagina=p.ID_TipoPagina  ";
		$rows=$this->db->query($query);

		$paginaInt =$rows->result_array();

	$data['pagInt'] =$paginaInt; //datos de la pagina a mostrar
	$data['title']= "Turismo Aventura En San Rafael Mendoza | Version Mobile";
	 $data['descripcion']="Toda la Aventura de San Rafael en un Solo lugar. Rafting, kayak, tirolesa, windsurf, rapel, doky ... San Rafael Late para Smartphone";
	$this->load->view('mobile/turismoaventura',$data);
	}
	public function mapa ()
	{
		// Obtengo datos de la pagina
	
 		
	$data['title']= "Mapa Callejero de San Rafael | Version Mobile ";
	 $data['descripcion']="Encontra todos los lugares de interes a tu alrrededor ... San Rafael Late para mobile, celulares";
	$this->load->view('mobile/mapa',$data);
	}


}
?>