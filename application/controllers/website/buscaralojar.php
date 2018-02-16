<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscaralojar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->model("website/dbbuscador");
			$this->load->library('gf');
	}


	
public function buscador($url)
	{

  
    $Talojar=$this->dbbuscador->tipoalojar($url);
    $data['alojar']=$this->dbbuscador->listar($Talojar['ID_TipoAlojamiento'],0,25);
  

    $desde = $this->input->get('from');
    $hasta = $this->input->get('to');
 	$data['desde2']=$desde;
  	$data['hasta2']=$hasta;
    $data['desde']=$this->gf->html_mysql($desde);
    $data['hasta']=$this->gf->html_mysql($hasta);
   	$data['cant_dias']=$this->gf->cantidad_dias($desde, $hasta );
    /*foreach ($alojar as $var) {
    	echo $var['Nombre'];

    	$habitaciones=$this->dbbuscador->habitaciones($var['ID_Alojamiento'],'2013-07-03','2013-07-011');
    	foreach ($habitaciones as $var2) {
    		echo $var2['UnidadAlojativa'].' '.$var2['NombreHab'];
    		echo '<br>Total:';
    		if ($var2['totalM']<$var2['totalN']) {
    			echo $var2['totalM'];
    			# code...
    		}else {echo $var2['totalN'];}
    		echo '<hr><br>';

    	}
    		
    	
    }*/	
    	$data['tipoBus']=$Talojar['TituloAlojamiento'];;

    	$data['body']="website/body_buscador";
		$data['title']= $Talojar['TituloAlojamiento']." en San Rafael | Reserva de  ".$Talojar['TituloAlojamiento']." | San Rafael Late ";
		$data['descripcion']=$Talojar['TituloAlojamiento']." en San Rafael Mendoza, Reservas Online de ".$Talojar['TituloAlojamiento']." - Pague en hasta 12 cuotas sin interes - San Rafael Late Turismo en San Rafael ";
		$data['keywords']=$Talojar['TituloAlojamiento'].", san, rafael, reservas, reserve, booking, mendoza, alojamienos";
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
			"js/galeriapaginas"	,
			"js/buscador"			);
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

public function detalle($id,$from,$to)
	{
		//DATOS ESTADIA 
		$data['cant_dias']=$this->gf->cantidad_dias($from, $to );
		$data['fromEs']=$from; //Fecha formato dd/mm/yy
		$data['toEs']=$to;	//Fecha formato dd/mm/yy
   		$fromEs=$from;
   		$toEs=$to;
   		// Conversion de Fechas a yy/mm/dd
   		$from=$this->gf->html_mysql($from);
    	$to=$this->gf->html_mysql($to);

    	//obtengos datos alojamiento seleccionado
		$alojar = $this->dbbuscador->detalleA($id);
		$habita = $this->dbbuscador->habitacionesD($id,$from,$to);
	
		$data['row_Al']=$alojar;
		$data['habitaD']=array_filter($habita);

		$data['tipoaloamientos']=$this->fag->tiposalojar();	
		
// FOTOS ALOKAR 
		
		$data['row_FA']=$this->dbbuscador->fotosDet($id);
// SERVICIOS ALOJAR
		$data['row_S']=$this->dbbuscador->serviciosDet($id);
		$data['alojarmenu']=$this->fag->tiposalojar();
// LOCALIDAD  ALOJAR
//		$data['row_Lo']=$this->dbfichas->localidad($result_Al['Localidad']);
//AGENDA 
		$data['row_A']=$this->fag->agenda();

		$urlback=base_url()."buscar/".$alojar['UrlAlojamiento']."?from=".$fromEs."&to=".$toEs;	

//DATA ENVIAR
		$data['body']="website/body_buscador_detalle";
		$data['title']= "Reserva ".$alojar['TipoAlojamiento']." ".$alojar['Nombre']."| En Hasta 12 Cuotas Sin Interes | San Rafael Mendoza | San Rafael Late ";
		$data['descripcion']="Reserva Online  ".$alojar['TipoAlojamiento']." ".$alojar['Nombre']." en San Rafael Mendoza - Paga en Hasta 12 Cuotas sin Interes - San Rafael Late - www.sanrafaellate.com";
		$data['keywords']="Reserva, Online, reserve, hoteles, cabain, turismo, sin, interes";
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
			"js/buscador",
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


		$this->load->view('templates/website/template_gral', $data);	
	

	}

	public function reservar()
	{		
			//tarifas 
			$tarifas=$this->input->get('tarifashab'); //cadena tarifas
			$data['tarifas_arr']=explode(',', $tarifas);
			$data['tarifas']=$tarifas; //TARIFAS CON ,
			//cantidad de habitaciones
			$cant_hab=$this->input->get('cant_hab');//cadena cant hab 
			$data['cant_hab']=explode(',', $cant_hab);
			$data['cant_habs']=$cant_hab;// CANTIDAD HAB con ,
			// id de habitacion
			$id_hab=$this->input->get('idhabs');//cadena con ids de habitaciones separados x ,
			$data['id_hab']=explode(',', $id_hab);
			$data['id_habs']=$id_hab;//ID HAB con ,
			//ID alojamiento
			$id_Alojar=$this->input->get('idalojar');
			$alojar = $this->dbbuscador->detalleA($id_Alojar);
			$data['row_Al']=$alojar;
			// fecha llegada
			$from=$this->input->get('from');
			$data['from']=$from;
			//fecha salida
			$to=$this->input->get('to');
			$data['to']=$to;
			// calculo cantidad de dias
			 $data['cant_dias']=$this->gf->cantidad_dias($from, $to );
			//METODOS DE PAGO
			 $data['MP'] = $this->dbbuscador->metodopago($alojar['ID_MP']);
			//total reserva
			$total_reserva=$this->input->get('totalreserva');
			$data['total_reserva']=$total_reserva;
			



		//listar alojamientos en menu
		$data['alojarmenu']=$this->fag->tiposalojar();
		// LOCALIDAD  ALOJAR
		//$data['row_Lo']=$this->dbfichas->localidad($result_Al['Localidad']);
		//AGENDA 
		$data['row_A']=$this->fag->agenda();

		$urlback=base_url()."buscar/detalle/".$alojar['ID_Alojamiento']."/".$from."/".$to;	

		//DATA ENVIAR
		$data['body']="website/body_reservar";
		$data['title']= "Reserva ".$alojar['TipoAlojamiento']." ".$alojar['Nombre']."| En Hasta 12 Cuotas Sin Interes | San Rafael Mendoza | San Rafael Late ";
		$data['descripcion']="Reserva Online  ".$alojar['TipoAlojamiento']." ".$alojar['Nombre']." en San Rafael Mendoza - Paga en Hasta 12 Cuotas sin Interes - San Rafael Late - www.sanrafaellate.com";
		$data['keywords']="Reserva, Online, reserve, hoteles, cabain, turismo, sin, interes";
		$data['urlback']=$urlback;
		// SCRIPT 
		
		 //javascript	
		$data['js']=array(
			//JS GENERAL
			"js/funcionesG",
			"js/fichas",
			"js/buscador"
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


		$this->load->view('templates/website/template_gral', $data);	
	}
	// funcion privada para hacer un explode de una cadena;
	
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
?>