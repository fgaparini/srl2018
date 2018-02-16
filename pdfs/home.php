<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
        $this->load->library('parser');
		$this->load->model('propiedades/propabm_model');
		$this->load->model('propiedades/db_infoprop');
		$this->load->model('propiedades/db_tipoprop');
		$this->load->model('propiedades/db_distrito');
		$this->load->model('propiedades/db_planuser');
		$this->load->model('propiedades/db_users');
		$this->load->model('propiedades/db_consultas');
		$this->load->model('propiedades/db_stats');

	}

	public function index()
	{
		$data['PropList']       = $this->propabm_model->listado_completo_asc(0);
		$data['TipoProp'] 		= $this->db_tipoprop->find_all();
		$data['Distrito'] = $this->db_distrito->find_all();

		// print_r($data['TipoProp']);
		// exit();

		// DATOS DEL PAGE
		$data['body']="home";
			$data['page']="home";
		$data['titulo']="Propiedades en San Rafael Mendoza | Compra - Venta - Alquiler de Propiedades en San Rafael | Casas - Lotes - Departamentos ";
		$data['descripcion']="Propiedades en San Rafael Mendoza, compra, venta o alquiler  de casas, departamentos, terrenos, lotes, locales, etc. Alquiler temporario de Casas Vacionales  en San Rafael Mendoza.  ";

		$this->load->view('templates/propiedades/template_gral',$data);

	}

public function propmap()
	{
			$propmap      = $this->propabm_model->listado_completo_asc(0);


			// $propmap2[]="";
			// foreach ($propmap as $var) {
			// $propmap2[]=$var['Coordenadas'];
			// }
		
			$json_propmap=json_encode($propmap);
			echo $json_propmap;
	}
//busco propiedades segun tipo propiedad o operacion
public function listado_po($a)
	{
		//LISTO SEGUN TIPO DE PROPIEDAD 
		if ($a=="venta" OR $a=="alquiler") {
			# code...
		
		$data['PropList']       = $this->propabm_model->listado_op($a);
		$data['TipoProp'] 		= $this->db_tipoprop->find_all();
		$data['Distrito'] = $this->db_distrito->find_all();
		$data['TituloPage'] = "Propiedades en ".$a."";
		$data['tipo'] = $a;

		// print_r($data['TipoProp']);
		// exit();
// DATOS DEL PAGE
		$data['body']="listado_prop";
			$data['page']="listado";
		$data['titulo']=$a." de Propiedades en San Rafael Mendoza | Casas - Departamentos - Locales - Lotes -Fincas  ";
		$data['descripcion']="Avisos de Propiedades en ".$a." , San Rafael Mendoza, Casas , departamentos, lotes, Fincas, Bodegas.";
		
		} else {
	

		$data['PropList']       = $this->propabm_model->listado_tp($a);
		$data['TipoProp'] 		= $this->db_tipoprop->find_all();
		$data['Distrito'] = $this->db_distrito->find_all();
		$data['TituloPage'] = $a."s en San Rafael";

		$data['tipo'] = $a;

		// print_r($data['TipoProp']);
		// exit();

	// DATOS DEL PAGE
		$data['body']="listado_prop";
			$data['page']="listado";
		$data['titulo']=$a."s en San Rafael Mendoza | Venta - Compra - Alquiler  ";
		$data['descripcion']="Avisos de ".$a."s en San Rafael Mendoza, compre , venda, alquiler de ".$a."s ";

		}


		$this->load->view('templates/propiedades/template_gral',$data);

	}

public function buscador($tipo, $zona, $operacion, $precio1, $precio2)
	{



			# code...
		$zona   =str_replace("-", " ", $zona);
		$limit1 = $this->input->get('limit1');
		$limit2 = $this->input->get('limit2');
		$order = $this->input->get('order');

		$filter = $this->input->get('filter');
		$data['filter']=$filter;
		$data['order']=$order;
	if ($limit1=="" && $limit2=="") 	{	$limit1=0;	$limit2=18;	}

		  $data['PropList'] = $this->propabm_model->buscador_prop($tipo,$zona,$operacion,$precio1,$precio2, $limit1,$limit2,$order,$filter);
		

		$data['TipoProp']   = $this->db_tipoprop->find_all();
		$data['Distrito']   = $this->db_distrito->find_all();
		
		$data['now_url']   = base_url().'/propiedades/buscador/'.$tipo.'/'.$zona.'/'.$operacion.'/'.$precio1.'/'.$precio2;
	
		$countpprop=count($data['PropList']);
		$data['TituloPage'] = $countpprop ." Propieadades Encontradas" ;
		$data['body']="buscador";
		if ($tipo!=0 && $zona && $operacion ) {
		$data['titulo']= $operacion ." de ". $tipo."s en ".$zona." Mendoza   ";
		$data['descripcion']=$countpprop." ".$tipo."s en ".$operacion." encontrados en ".$zona." - San Rafael Mendoza - Propiedades" ;
		} else {$data['titulo']= "Propiedades en San Rafael Mendoza | ".$tipo ." ".$zona." ".$operacion ;
		$data['descripcion']=$countpprop." Propiedades encontradas  en San Rafael Mendoza - ".$tipo ." ".$zona." ".$operacion." -  " ;
		}
		$data['page']="buscador";
		$data['tipo']=$tipo;
		$data['tipo2']=$tipo;
if ($operacion=="alquilar") {
	$operacion="alquiler";
}
		$data['ope']=$operacion;
		$data['zona']=$zona;
		


		$this->load->view('templates/propiedades/template_gral',$data);
		}

		public function detalle($id,$titulo)
	{	
	
		$data['Prop']       = $this->propabm_model->findProp($id);
		$data['TipoP'] 	= $this->db_tipoprop->find($data['Prop']['TipoPropiedades_ID_Tipo']);
		$data['cant_fotos'] = $this->propabm_model->images_count($id);
		$data['DistritoP'] = $this->db_distrito->find($data['Prop']['Distritos_ID_Distritos']);
		$data['TipoProp'] 		= $this->db_tipoprop->find_all();
		$data['Distrito'] = $this->db_distrito->find_all();

	//estadisticas 

		  $ip           = $_SERVER['REMOTE_ADDR'];
        $navegador    = $_SERVER['HTTP_USER_AGENT'];
       
        $estadisticas=array();

            $estadisticas = array(
                'Ip' => $ip,
                'Navegador' => $navegador,
                'ID_Propiedades' => $id,
                'TipoAccion' => "ficha"
                );

            $this->db_stats->insert($estadisticas);
		//END ESTADISTICAS

		$data['PropSimi'] = $this->propabm_model->findSimilar($data['Prop']['Distritos_ID_Distritos'],$data['Prop']['TipoPropiedades_ID_Tipo'],$data['Prop']['ID_Propiedades']);

		//

		$data['user']     = $this->db_users->find($data['Prop']['Usuarios_ID_Usuarios']);

		//MAPA

		$this->load->library('googlemaps');

		$config['center'] =$data['Prop']['Coordenadas'];
		$config['zoom'] = '15';
		// $config['map_type']='HYBRID';
		$config['styles'] = array(
		  array("name"=>"Prueba", "definition"=>array(
		  	    array("featureType"=>"all", "stylers"=>array(array("saturation"=>"-70"))),

		    array("featureType"=>"road","elementType"=>"geometry", "stylers"=>array(array("saturation"=>"-30","hue"=>'#CF6505'))),
		  ))
		);
		$config['stylesAsMapTypes'] = false;
		$config['stylesAsMapTypesDefault'] = "Prueba"; 


		$this->googlemaps->initialize($config);
	
		$marker = array();
		$marker['position'] =$data['Prop']['Coordenadas'];
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();

		// DATOS DEL PAGE
		$data['body']="detalle";
		$data['page']="detalle";
		$data['titulo']="Propiedades en San Rafael Mendoza | Compra - Venta - Alquiler de Propiedades en San Rafael | Casas - Lotes - Departamentos ";
		$data['descripcion']="Propiedades en San Rafael Mendoza, compra, venta o alquiler  de casas, departamentos, terrenos, lotes, locales, etc. Alquiler temporario de Casas Vacionales  en San Rafael Mendoza.  ";

		$this->load->view('templates/propiedades/template_gral',$data);

	}
	public function plan_usuarios(){
$data['TipoProp'] 		= $this->db_tipoprop->find_all();
		$data['Distrito'] = $this->db_distrito->find_all();

	$data['body']="plan_usuarios";
		$data['page']="planuser";
		$data['titulo']="Registre y Publique gratis su Propiedad - Planes FREE (gratis)  - Standard - Premium";
		$data['descripcion']="Propiedades en San Rafael Mendoza, compra, venta o alquiler  de casas, departamentos, terrenos, lotes, locales, etc. Alquiler temporario de Casas Vacionales  en San Rafael Mendoza.  ";

		$this->load->view('templates/propiedades/template_gral',$data);

	}
		public function contacto(){
$data['TipoProp'] 		= $this->db_tipoprop->find_all();
		$data['Distrito'] = $this->db_distrito->find_all();

	$data['body']="contacto";
		$data['page']="contacto";
		$data['titulo']="Contáctenos - Porpiedades San Rafael Late";
		$data['descripcion']="Contactenos - Propiedades en San Rafael Mendoza, compra, venta o alquiler  de casas, departamentos, terrenos, lotes, locales, etc. Alquiler temporario de Casas Vacionales  en San Rafael Mendoza.  ";

		$this->load->view('templates/propiedades/template_gral',$data);

	}

public function registracion(){
		$data['TipoProp'] 		= $this->db_tipoprop->find_all();
		$data['Distrito'] = $this->db_distrito->find_all();
		$plan = $this->input->get('plan');
		$data['plan']=$plan;
		$data['body']="registracion";
		$data['page']="planuser";
		$data['titulo']="Registre y Publique gratis su Propiedad - Planes FREE (gratis)  - Standard - Premium";
		$data['descripcion']="Propiedades en San Rafael Mendoza, compra, venta o alquiler  de casas, departamentos, terrenos, lotes, locales, etc. Alquiler temporario de Casas Vacionales  en San Rafael Mendoza.  ";

		$this->load->view('templates/propiedades/template_gral',$data);

	}

public function inmo_promo(){
		$data['TipoProp'] 		= $this->db_tipoprop->find_all();
		$data['Distrito'] = $this->db_distrito->find_all();

		$data['body']="landing_inmo";
		$data['page']="inmo";
		$data['titulo']="Registra tu Inmobiliaria GRATIS  - Publica hasta 10 propiedades Gratis";
		$data['descripcion']="Inmobiliaria en San Rafael, registro gratis !!  publica hasta 10 propiedades gratis !! por 6 meses.  ";

		$this->load->view('templates/propiedades/template_gral',$data);

	}


public function registronew(){

	$plan=$this->input->post('plan');
	$particular=$this->input->post('particular');
	if (!isset($particular)) {
		$particular=1;
	}
	if (!isset($plan)) {
		$plan=1;
	}

$array_user =array(
					'Usuario'               => $this->input->post('usuario'),
					'Password'              => $this->input->post('pass'),
					'Email'                 => $this->input->post('email'),
					'Vendedor'              => $this->input->post('nombre'),
					'Telefono'              => $this->input->post('telefono'),
					'web'                   => $this->input->post('web'),
					'Direccion'             => $this->input->post('Direccion'),
					'Particular'            => $particular,
					'PlanUsuarios_ID_PlanU' => $plan
				
				);
					$iduser = $this->db_users->insert($array_user);
echo $iduser;

			$user = $this->input->post('usuario');
			$emailuser= $this->input->post('email');
		

			$data['user']=$user;
			
			$data['Vendedor']=$this->input->post('nombre');

			switch ($plan) {
				case '1':
					$data['cant_prop']=3;
					$data['plan']="FREE";
							$mensaje = $this->parser->parse('propiedades/mensaje_registro', $data, true);

					break;
				case '2':
					$data['cant_prop']=20;
					$data['plan']="Standar";
							$mensaje = $this->parser->parse('propiedades/mensaje_registro', $data, true);

					break;
				case '3':
					$data['plan']="Premium";
					$data['cant_prop']=200;
							$mensaje = $this->parser->parse('propiedades/mensaje_registro', $data, true);

					break;
				case '4':
					$data['plan']="Plan Inmo";
					$data['cant_prop']=10;
							$mensaje = $this->parser->parse('propiedades/mensaje_registro_inmo', $data, true);

					break;

			}
		

		$emailSRL="propiedades@sanrafaellate.com.ar";

//ESTADISTICAS 
		
		// $this->fag->estadisticas('mail',$ids, '',$tipo_ae);




	//	$this->email->initialize($config);






		$this->email->clear();
		$this->email->from($emailSRL, "Propiedades SRL");
		$this->email->to($emailuser);
		$this->email->subject('Bienvenidos a Propiedades SRL');
		$this->email->message($mensaje);
		$this->email->send();




	}
	

	public function consultaprop(){


	$nombre= $this->input->post('nombre');
	$email= $this->input->post('email');
	$telefono= $this->input->post('telefono');
	$consulta= $this->input->post('consulta');
	$emailprop= $this->input->post('emailprop');
	$idprop = $this->input->post('idprop');

	$ip           = $_SERVER['REMOTE_ADDR'];
    $navegador    = $_SERVER['HTTP_USER_AGENT'];
       
     $estadisticas=array();

            $estadisticas = array(
                'Ip' => $ip,
                'Navegador' => $navegador,
                'ID_Propiedades' => $idprop,
                'TipoAccion' => "consulta"
                );

            $this->db_stats->insert($estadisticas);

$array_c =array(
					'Nombre'                     => $nombre,
					'Email'                      => $email,
					'Telefono'                   => $telefono,
					'consulta'                   => $consulta,
					'Propiedades_ID_Propiedades' =>$idprop
			      );
				
					  $this->db_consultas->insert($array_c);
				

		$emailSRL="propiedades@sanrafaellate.com.ar";
$mensaje =" <div style='font-style:normal; font: tahoma; font-size=12px'>
	  
				<b>Consulta a su Propiedades - <b>$idprop</b>    :: Propiedades SRL :: </b>
				<br />

				<b>DATOS CLIENTE:</b> <br />

				      <b>Nombre y Apellido :</b> $nombre<br />
					
					  
				      <b>E-Mail:</b> $email <br />

				      <b>Telefono:</b> $telefono <br />
				
				______________________________________________________________________________________
				<br /><b>CONSULTA</b> <br />
				    $consulta <br />
PROPIEDADES - SAN RAFAEL LATE - www.sanrafaellate.com.ar/propiedadessrl - El portal Inmobiliario de San Rafael
			</div>";
		$this->email->clear();
		$this->email->from($emailSRL, "Propiedades SRL");
		$this->email->reply_to($email, $nombre);
		$this->email->bcc($emailSRL);
		$this->email->to($emailprop);
		$this->email->subject('Tienes una Consulta a tu Propiedad');
		$this->email->message($mensaje);
		$this->email->send();


echo $emailprop;

	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */

?>
