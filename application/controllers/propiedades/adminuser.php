<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminuser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('propiedades/propabm_model');
		$this->load->model('propiedades/db_infoprop');
		$this->load->model('propiedades/db_users');
		$this->load->model('propiedades/db_consultas');
		$this->load->model('propiedades/db_tipoprop');
		$this->load->model('propiedades/db_distrito');
		$this->load->model('propiedades/db_planuser');


		$this->load->library('gf');
		$this->load->library('sf');

	}

	public function index()
	{
		//datos de session
		$a              = $this->session->userdata('logged_user');
		$id_user        = $a['ID_Usuarios'];
		$data['user']=$a;

		$data['PropList']       = $this->propabm_model->find_allxuser($id_user);
		// print_r($data['PropList'] );
		// exit();
		$data['TotalProp']      = $this->propabm_model->count_allxuser($id_user);
		$data['TotalConsultas'] = $this->db_consultas->count_allxuser($id_user);
		$data['PlanUser'] = $this->db_planuser->find($a['PlanUsuarios_ID_PlanU']);
		
		$data['body']           ="home";
		$data['page']           ="home";
		$this->load->view('templates/propiedades/admin-user',$data);

	}


 function formprop($ID_Propiedades=0)
	{       

				// DATOS DE SESSION
		$a              = $this->session->userdata('logged_user');
		$id_user        = $a['ID_Usuarios'];
		$data['user']=$a;
		$data['PlanUser'] = $this->db_planuser->find($a['PlanUsuarios_ID_PlanU']);
		$data['TotalProp'] = $this->propabm_model->count_allxuser($id_user);	


				$data['TipoProp'] = $this->db_tipoprop->find_all();
				$data['Distrito'] = $this->db_distrito->find_all();


		if($ID_Propiedades !=0){
		$data['Prop']      = $this->propabm_model->findPropxuser($ID_Propiedades,$id_user);
		
		
		$data['body']      ="editar_prop";
		$data['page']      ="propiedades";

		} else {
		
		$data['body']      ="nueva_prop";	
		$data['page']      ="nueva_prop";	
		}
		
		$this->load->view('templates/propiedades/admin-user',$data);

	}
/* ------------------- LISTADO PROPIEDADES ----------------------------------------*/

 function propiedades()
	{

			// DATOS DE SESSION
		$a                 = $this->session->userdata('logged_user');
		$id_user           = $a['ID_Usuarios'];
		$data['user']      =$a;
		
		
		$data['PropList']  = $this->propabm_model->find_allxuser($id_user);
		$data['TotalProp'] = $this->propabm_model->count_allxuser($id_user);	
		$data['PlanUser']  = $this->db_planuser->find($a['PlanUsuarios_ID_PlanU']);
		
		$data['body']      ="propiedades";
		$data['page']      ="propiedades";
		
		$this->load->view('templates/propiedades/admin-user',$data);

}


/* ------------------- FICHA DE LA PROPIEDAD ----------------------------------------*/

 function propiedad($id_prop)
	{
		// DATOS DE SESSION
		$a              = $this->session->userdata('logged_user');
		$id_user        = $a['ID_Usuarios'];
		$data['user']=$a;

		//OBTENGO PROPIEDAD SEGUN USER
		$data['prop']       = $this->propabm_model->findxuser($id_prop,$id_user);
		
		if (count($data['prop'])<=0) {
						redirect('propiedades/adminuser/?accion=invalida', '');

		}

		$infoprop  = $this->propabm_model->find_info($data['prop']['InformacionProp_ID_InformacionProp']);

		$data['infoprop'] =$infoprop;

		$data['TipoProp'] 	= $this->db_tipoprop->find($data['prop']['TipoPropiedades_ID_Tipo']);
		
		$data['cant_fotos'] = $this->propabm_model->images_count($id_prop);

		// GOOGLE MAPS --------------------------------
		$this->load->library('googlemaps');

		$config['center'] =$infoprop['Coordenadas'];
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
		$marker['position'] =$infoprop['Coordenadas'];
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();

		// ---------------------------------------------------
		
		$data['propiedad']  ="propiedad";	
		$data['body']       ="propiedad";
		$data['page']      ="propiedades";

		$this->load->view('templates/propiedades/admin-user',$data);

}

function map_prop($id_prop)
	{

	// DATOS DE SESSION
		$a              = $this->session->userdata('logged_user');
		$id_user        = $a['ID_Usuarios'];
		$data['user']=$a;

		$data['prop']       = $this->propabm_model->findxuser($id_prop,$id_user);
		
		$data['infoprop']   = $this->propabm_model->find_info($data['prop']['InformacionProp_ID_InformacionProp']);

		// $data['TipoProp'] = $this->db_tipoprop->find($data['prop']['TipoPropiedades_ID_Tipo']);
		
		// $data['cant_fotos'] = $this->propabm_model->images_count($id_prop);
		
		// $data['propiedad']  ="propiedad";	

		if ($data['infoprop'] ['Coordenadas']!=NULL)
{

 $data['coordenadas'] = explode(",", $data['infoprop']['Coordenadas']);
 $data['latitud'] = $data['coordenadas'][0];
 $data['longitud'] = $data['coordenadas'][1];
 $data['direccion'] =$data['infoprop']['Direccion'].",San Rafael, Mendoza";
}

if ($data['infoprop']['Coordenadas']==NULL && $data['infoprop']['Direccion'] !="")
{


  $data['direccion'] =$data['infoprop']['Direccion'].", San Rafael, Mendoza";
 $data['coordenadas']="";
 $data['latitud'] ="";
  $data['longitud'] = "";
}

		$data['body']       ="coord_prop";
				$data['page']      ="nueva_prop";

		$data['mapa_coord']       ="coord_prop";
		//  $data['latitud']= "-34.617528323422434";
		//  $data['longitud']="-68.32546591758728";
		// $data['zoom']= "17";
		$data['tipo_mapa'] = "HYBRID";
		// $data['direccion'] = "Mitre 333, San Rafael, Mendoza";
			$this->load->view('templates/propiedades/admin-user',$data);

}

function map_guardar()
	{
		$coordenadas = $this->input->post('coordenadas');
		$id_infoprop = $this->input->post('id_infoprop');
$array_info =array(
	'Coordenadas' => $coordenadas
	);
		$this->db_infoprop->update($id_infoprop,$array_info);

	}
function addfotos($idprop)
	{
		$a                 = $this->session->userdata('logged_user');
		$id_user           = $a['ID_Usuarios'];
		$data['user']      =$a;

		//VALIDAR USUARIO & PROPIEDAD
		$iduser  = $this->propabm_model->validar_user_prop($idprop);
	
		// SI ES  VALIDO EL USUARIO PROCEDO ------------------------------

		if ($id_user==$iduser['Usuarios_ID_Usuarios']) 
		{
				$estado =$this->input->get('estado');
				if ($estado=="nuevo") {
					$data['nuevoprop']="si";
				}
				if ($estado=="agregar") {
					$data['masfoto']="si";
					$data['cant_fotos']= $cantidad_fotos = $this->propabm_model->images_count($idprop);
				}
				$data['idprop']      =$idprop;	
				$data['body']      ="add_fotos";
		$data['page']      ="nueva_prop";

				
				$data['addfoto']      ="sii";
				
				$this->load->view('templates/propiedades/admin-user',$data);
	} else 
	{
					redirect('propiedades/adminuser/', '');

	}

}

function listarfotos($idprop)
	{	
		$a            = $this->session->userdata('logged_user');
		$id_user      = $a['ID_Usuarios'];
		$data['user'] =$a;
		$data['prop'] = $this->propabm_model->findxuser($idprop,$id_user);
		
		$iduser       = $this->propabm_model->validar_user_prop($idprop);
if ($id_user==$iduser['Usuarios_ID_Usuarios']) 
		{

		$data['fotos']       = $this->propabm_model->listar_fotos($idprop);
		$data['idprop']      =$idprop;
		$data['id_prop']      =$idprop;	
		$data['body']      ="listar_fotos";
		$data['page']      ="nueva_prop";

				
		$this->load->view('templates/propiedades/admin-user',$data);
	}else 
	{
					redirect('propiedades/adminuser/', '');

	}


}

 function ajaxuser()
	{       

		$buscar = trim(strip_tags($_GET['term']));
		$user   = $this->db_users->find_auto($buscar);
		
		$json   = json_encode($user);
		echo $json;

	}


function save() 
{
		$accion = $this->input->post('accion');

		// echo $accion;
		// exit();
		// NUEVA PROPIEDAD
		if($accion=="new")
		{
		/*-----CARGO LA INFORMACION DE LA PROPIEDAD ------*/
			// array info
			$array_info = array(
				'Titulo'        => $this->input->post('titulo'),
				'Descripcion'   => $this->input->post('descripcion'),
				'Direccion'     => $this->input->post('direccion'),
				'Telefono'      => $this->input->post('telefono'),
				'Superficie'    => $this->input->post('superficie'),
				'SuperficieCub' => $this->input->post('superficiecub'),
				'Garage'        => $this->input->post('garage'),
				'Electricidad'  => $this->input->post('electricidad'),
				'Gas'           => $this->input->post('gas'),
				'Cloacas'       => $this->input->post('cloacas'),
				'Habitaciones'  => $this->input->post('habitaciones'),
				'Banos'         => $this->input->post('banos'),
				'Ambientes'     => $this->input->post('ambientes'),
				'Antiguedad'    => $this->input->post('antiguedad'),
				'Hectareas'     => $this->input->post('Hectareas'),
				'Precio'        => $this->input->post('precio'),
				'Moneda'        => $this->input->post('moneda')

			);
			// inserto info
			$id_info_prop   = $this->db_infoprop->insert($array_info); //id de info propiedad

			/*-----------  OBTENGO USUARIOS  ---------- */
			
			// CREAR USUARIO
			$adduser=$this->input->post('ADDusuario');//SI AGREGA O NO NUEVO USUARIO

				if( isset($adduser) && $adduser ==1  )
				{
					$array_user =array(
					'Usuario'                      => $this->input->post('username'),
					'Password'                     => $this->input->post('pass'),
					'Email'                        => $this->input->post('useremail'),
					'Vendedor'                     => $this->input->post('uservendedor'),
					'Direccion'                    => $this->input->post('userdireccion'),
					'Telefono'                     => $this->input->post('usertelefono'),
					'Particular'                   => $this->input->post('particular'),
					'PlanUsuarios_ID_PlanU'        => $this->input->post('planuser')
				
				);
					$iduser = $this->db_users->insert($array_user); //id de info propiedad
				} 
					$searchuser = $this->input->post('searchusuario'); //buscar usuario

				if(isset($searchuser) && $searchuser==1)
				{	 
					$iduser=$this->input->post('iduser');
					
				}
			/* armo array de la propiedad*/
			$array_prop = array(
					'Fecha_Publicacion'                  => date("Y-m-d"),
					'Operacion'                          => $this->input->post('operacion'),
					'TipoPropiedades_ID_Tipo'            => $this->input->post('tipoprop'),
					'Distritos_ID_Distritos'             => $this->input->post('distrito'),
					'Usuarios_ID_Usuarios'               => $iduser,
					'InformacionProp_ID_InformacionProp' => $id_info_prop

					);
			//INSERTAR PROPIEADAD 
			$idprop = $this->propabm_model->insert($array_prop);
			redirect('propiedades/adminuser/addfotos/'.$idprop.'/?estado=nuevo', '');
		}
	// FIN NUEVA PROPIEDAD

		//EDITAR PORPIEDAD
if($accion=="edit")
		{
		/*-----CARGO LA INFORMACION DE LA PROPIEDAD ------*/
			// array info
			$array_info = array(
				'Titulo'        => $this->input->post('titulo'),
				'Descripcion'   => $this->input->post('descripcion'),
				'Direccion'     => $this->input->post('direccion'),
				'Telefono'      => $this->input->post('telefono'),
				'Superficie'    => $this->input->post('superficie'),
				'SuperficieCub' => $this->input->post('superficiecub'),
				'Garage'        => $this->input->post('garage'),
				'Electricidad'  => $this->input->post('electricidad'),
				'Gas'           => $this->input->post('gas'),
				'Cloacas'       => $this->input->post('cloacas'),
				'Habitaciones'  => $this->input->post('habitaciones'),
				'Banos'         => $this->input->post('banos'),
				'Ambientes'     => $this->input->post('ambientes'),
				'Antiguedad'    => $this->input->post('antiguedad'),
				'Hectareas'     => $this->input->post('Hectareas'),
				'Precio'        => $this->input->post('precio'),
				'Moneda'        => $this->input->post('moneda')

			);
			// inserto info
			$id_info_prop=$this->input->post('ID_infoprop');
			$this->db_infoprop->update($id_info_prop,$array_info); //UPDATE de info propiedad

			//DATOS Propiedad
			$array_prop = array(
					'Operacion'                          => $this->input->post('operacion'),
					'TipoPropiedades_ID_Tipo'            => $this->input->post('tipoprop'),
					'Distritos_ID_Distritos'             => $this->input->post('distrito'),
					'InformacionProp_ID_InformacionProp' => $id_info_prop

					);
			//INSERTAR PROPIEADAD 
			$id_prop = $this->input->post('id_prop');
			$this->propabm_model->update($id_prop,$array_prop);
			redirect('propiedades/adminuser/formprop/'.$id_prop, 'refresh');

		}

}

/* -------------------------------------------------------------------------------*/
/* ------------------------USUARIOS ----------------------------------------------*/
/* -------------------------------------------------------------------------------*/
function usuarios_list ()
{
		$data['usuarios']       = $this->db_users->find_all();
	

		$data['body']           ="usuarios";
		$this->load->view('templates/propiedades/admin-user',$data);

}
function perfil()
{
					// $data['PlanUser'] = $this->db_planuser->find_all();

	
		// DATOS DE SESSION
		$a              = $this->session->userdata('logged_user');
		$id_user        = $a['ID_Usuarios'];
		$data['user']=$a;

		$data['usuarios']       = $this->db_users->find($id_user);
				$data['PlanUser'] = $this->db_planuser->find($a['PlanUsuarios_ID_PlanU']);


		$data['id_user'] = $id_user;
		$data['body']           ="perfil";
	$this->load->view('templates/propiedades/admin-user',$data);
	
		


}
function abm_usuarios ($id_user=0)
{

	/* ------------- AGREGAR USUARIO ------------------- */
	if($id_user==0)
	{
		$adduser=$this->input->post('ADDusuario');//SI AGREGA O NO NUEVO USUARIO

				
		$array_user =array(
		'Usuario'                      => $this->input->post('username'),
		'Password'                     => $this->input->post('pass'),
		'Email'                        => $this->input->post('useremail'),
		'Vendedor'                     => $this->input->post('uservendedor'),
		'Direccion'                    => $this->input->post('userdireccion'),
		'Telefono'                     => $this->input->post('usertelefono'),
		'Particular'                   => $this->input->post('particular'),
		'PlanUsuarios_ID_PlanU'        => $this->input->post('planuser')			
				
					);
					$iduser = $this->db_users->insert($array_user);		
					redirect(base_url() . "propiedades/adminuser/usuarios_list", 'refresh');	
	}
	if($id_user != 0)
	{
		$accion = $this->input->post('accion');

		// EDITAR USUARIO
		if ($accion =="edit")
		{
				$array_user =array(
		'Usuario'                      => $this->input->post('username'),
		'Password'                     => $this->input->post('pass'),
		'Email'                        => $this->input->post('useremail'),
		'Vendedor'                     => $this->input->post('uservendedor'),
		'Direccion'                    => $this->input->post('userdireccion'),
		'Telefono'                     => $this->input->post('usertelefono'),
		'Particular'                   => $this->input->post('particular'),
		'PlanUsuarios_ID_PlanU'        => $this->input->post('planuser')			
				
					);
		$this->db_users->update($id_user,$array_user); // UPDATE
		redirect(base_url() . "propiedades/adminuser/usuarios_list", 'refresh');	

		}
		// ELIMINAR USUARIO
		if($accion=="delete")
		{
 		
 		$this->db_users->delete($id_user);


		}


	}

}

/* -------------------------------------------------------------------------------*/
/* ------------------------Plan Users ----------------------------------------------*/
/* -------------------------------------------------------------------------------*/
function planu_list ()
{
		$data['planu']       = $this->db_planuser->find_all();
	

		$data['body']           ="planu";
		$this->load->view('templates/propiedades/admin-user',$data);

}

function planu($id_usuario=0)
{
	
	if ($id_usuario==0) {

		$data['body']           ="planu-new";
		$this->load->view('templates/propiedades/admin-user',$data);
	} else 
	{

		$data['planu']       = $this->db_planuser->find($id_usuario);

		$data['id_planu'] = $id_usuario;
		$data['body']           ="planu-edit";
	$this->load->view('templates/propiedades/admin-user',$data);
	}
		


}

function abm_planU ($id_plan=0)
{

	/* ------------- AGREGAR Plan ------------------- */
	if($id_plan==0)
	{
				
		$array_user =array(
		'NombrePlan'                      => $this->input->post('nombreplan'),
		'CantidadProp'                     => $this->input->post('cantidadprop'),
		'Agentes'                        => $this->input->post('agentes')
	);	
				
				
					$idplanu = $this->db_planuser->insert($array_user);		
					redirect(base_url() . "propiedades/adminuser/planu_list", 'refresh');	
	}
	if($id_plan != 0)
	{
		$accion = $this->input->post('accion');

		// EDITAR USUARIO
		if ($accion =="edit")
		{
				$array_user =array(
		'NombrePlan'                      => $this->input->post('nombreplan'),
		'CantidadProp'                     => $this->input->post('cantidadprop'),
		'Agentes'                        => $this->input->post('agentes')		
				
					);
		$this->db_planuser->update($id_plan,$array_user); // UPDATE
		redirect(base_url() . "propiedades/adminuser/planu_list", 'refresh');	

		}
		// ELIMINAR USUARIO
		if($accion=="delete")
		{
 		
 		$this->db_planuser->delete($id_plan);


		}


	}

}
/* -------------------------------------------------------------------------------*/
/* ------------------------TIPOPROP ----------------------------------------------*/
/* -------------------------------------------------------------------------------*/

function list_tipo_prop()
{
	$data['TipoProp']       = $this->db_tipoprop->find_all();
	

		$data['body']           ="tipoprop";
		$this->load->view('templates/propiedades/admin-user',$data);
}
function tipoprop($id_tipoprop=0)
{
	
	if ($id_tipoprop==0) {
		$data['body']           ="tipoprop-new";
		$this->load->view('templates/propiedades/admin-user',$data);
	} else 
	{

		$data['TipoProp']       = $this->db_tipoprop->find($id_tipoprop);

		$data['id_tipo'] = $id_tipoprop;
		$data['body']           ="tipoprop-edit";
	$this->load->view('templates/propiedades/admin-user',$data);
	}
		


}


function abm_tipoprop($id_tipoprop=0) {

// agrego tipo propiedad
if($id_tipoprop==0)
{
	$array_tipo =array(
		'TipoPropiedades' => $this->input->post('tipoprop')

	);
	$idtipo = $this->db_tipoprop->insert($array_tipo);
	redirect(base_url() . "propiedades/adminuser/list_tipo_prop", 'refresh');
		
}

// editar o eliminar tipo propiedad


	if($id_tipoprop!=0)
	{
		$accion = $this->input->post('accion');

		//  editar tipo propiedad
		if ($accion=="edit") {

			$array_tipo =array(
				'TipoPropiedades'                      => $this->input->post('tipoprop')
			);
			 $this->db_tipoprop->update($id_tipoprop,$array_tipo);	
        redirect(base_url() . "propiedades/adminuser/list_tipo_prop", 'refresh');

		}	
		//eliminar tipo propiedad
		if ($accion=="delete") {
			
			$this->db_tipoprop->delete($id_tipoprop);	

		}	
	}



}
function dropzone($idprop)
{
	// $cantidad_fotos = $this->propabm_model->images_count(1);
	// echo $cantidad_fotos;
	$data['idprop'] =$idprop;
	$this->load->view('propiedades/admin/dropzone',$data );
}

function dz_upload($idprop) {

// VERIFICO TIPO ACCION (NUEVA FOTO O EDITAR FOTO)
$id_foto=$this->input->post('id_foto');
$plan=$this->input->post('plan');

if($plan==1)
{
	$max_fotos=8;
} else {
	$max_fotos=20;
}


//SI EXITE ID_FOTO MODIFICO FOTO INDIVIDUAL
if (isset($id_foto) && $id_foto>0) {
$name_foto =$id_foto;
 //obtengo los directorio y nombre de las imagenes

} else {
// SI NO EXITE ID_FOTO AGREGO UNA FOTO MAS
$cantidad_fotos = $this->propabm_model->images_count($idprop);//cantidad de fotos subidas
$name_foto =$cantidad_fotos + 1;
 //obtengo los directorio y nombre de las imagenes

}

// $image_name='/home/nn000337/public_html/upload/propiedades/'.$idprop. "_".$name_foto.".jpg";;
// $thumb_chica='/home/nn000337/public_html/upload/propiedades/thumb/'.$idprop. "_".$name_foto.".jpg";
// $thumb_grande='/home/nn000337/public_html/upload/propiedades/thumbG/'.$idprop. "_".$name_foto."_g.jpg";	

$image_name='C:\wamp\www\late\upload/propiedades/'.$idprop. "_".$name_foto.".jpg";
$thumb_chica='C:\wamp\www\late\upload/propiedades/thumb/'.$idprop. "_".$name_foto.".jpg";
$thumb_grande='C:\wamp\www\late\upload/propiedades/thumbG/'.$idprop. "_".$name_foto."_g.jpg";	
if (!empty($_FILES)) {
	// 
     
    $file = $_FILES['file']['tmp_name'];          //3             
      
     
   


 
    // move_uploaded_file($tempFile,$targetFile); //6

           $image      = ImageCreateFromJPEG($file);
                        //ancho
                        $width      = imagesx($image);
                        //alto imagen
                        $height     = imagesy($image);

						if($height<480)
						{
							//nuevo ancho imagen
	                        $new_width  = 700;
	                        //calcular alto 
	                        $new_height = ($new_width * $height) / $width;
	                        //crear imagen nueva
                    	} else {
							$new_height = 466;

					 		$new_width =($new_height * $width) / $height;

                   		 }

                        $thumb      = imagecreatetruecolor($new_width, $new_height);
                        //redimensiono
                        imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                        //Guardo imagen final 
                        ImageJPEG($thumb, $image_name);

                        //Thumb
                        //nuevo ancho imagen
                        $new_width  = 120;
                        //calcular alto 
                        $new_height = ($new_width * $height) / $width;
                        //crear imagen nueva
                        $thumb      = imagecreatetruecolor($new_width, $new_height);
                        //redimensiono
                        imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                        //Guardo imagen final 
                        ImageJPEG($thumb, $thumb_chica);

                        
                            //Thumprincipal
                            //nuevo ancho imagen
                            $new_height = 270;
                            //calcular alto 
                            $new_width  = ($new_height * $width) / $height;
                            //crear imagen nueva
                            $thumb      = imagecreatetruecolor($new_width, $new_height);
                            //redimensiono
                            imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                            //Guardo imagen final 
                            ImageJPEG($thumb, $thumb_grande);
                        


   if (isset($id_foto) && $id_foto>0) {
     
     redirect(base_url() . "propiedades/adminuser/listarfotos/".$idprop, 'refresh');
 
     } else {
    $array_fotos=array(
	'name' => $name_foto,
	'Propiedades_ID_Propiedades' => $idprop

	);
    $cantidad_fotos = $this->propabm_model->insertfotos($array_fotos);
    echo $cantidad_fotos;
     }
}
}


/* -------------------------------------------------------------------------------*/
/* ------------------------DISTRITOS ----------------------------------------------*/
/* -------------------------------------------------------------------------------*/
function list_distritos()
{
		$data['distritos']       = $this->db_distrito->find_all();
	

		$data['body']           ="distrito";
		$this->load->view('templates/propiedades/admin-user',$data);

}

function distritos($id_distrito=0)
{
	
	if ($id_distrito==0) {

		$data['body']           ="distrito-new";
		$this->load->view('templates/propiedades/admin-user',$data);
	} else 
	{

		$data['distrito']       = $this->db_distrito->find($id_distrito);

		$data['id_distritos'] = $id_distrito;
		$data['body']           ="distrito-edit";
	$this->load->view('templates/propiedades/admin-user',$data);
	}
		


}

function abm_distrito ($id_distrito=0)
{

	/* ------------- AGREGAR Plan ------------------- */
	if($id_distrito==0)
	{
				
		$array_distrito =array(
		'Distrito'                      => $this->input->post('distrito'),
		'Cod_ciudad'                     => $this->input->post('codigo')
		             
	);	
				
				
					$iddistrito = $this->db_distrito->insert($array_distrito);		
					redirect(base_url() . "propiedades/adminuser/list_distritos", 'refresh');	
	}
	if($id_distrito != 0)
	{
		$accion = $this->input->post('accion');

		// EDITAR USUARIO
		if ($accion =="edit")
		{
				$array_distrito =array(
		'Distrito'                      => $this->input->post('distrito'),
		'Cod_ciudad'                     => $this->input->post('codigo')
		             
				
					);
		$this->db_distrito->update($id_distrito,$array_distrito); // UPDATE
		redirect(base_url() . "propiedades/adminuser/list_distritos", 'refresh');	

		}
		// ELIMINAR USUARIO
		if($accion=="delete")
		{
 		
 		$this->db_distrito->delete($id_plan);


		}


	}

}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */

?>