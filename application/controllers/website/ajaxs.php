<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajaxs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('fag');
			$this->load->library('gf');
	}

	public function envioemail()
	{
	
//OBTENGO DATOS 
		// datos del usuario
		$nombre                 =$this->input->post('name');
		$name                   =$nombre;
		$emailU                 =$this->input->post('email');
		$telefono               =$this->input->post('telefono');
		$consulta               =$this->input->post('consulta');
		$from                   =$this->input->post('from');
		$to                     =$this->input->post('to');
		
		//datos empresa o alojamiento
		$ids                    =$this->input->post('id');
		$email_A                =$this->input->post('email_A');
		$tipo_ae                =$this->input->post('tipo_ae');
		$name_ae                =$this->input->post('name_ae');
		
		$emailSRL               ="contacto@sanrafaellate.com.ar";
		$from2                  =$this->gf->html_mysql($from);
		$to2                    =$this->gf->html_mysql($to);
		//guardar email alojamiento
		if($tipo_ae=='alojar'){
		$array_consulta         =array(
		'Alojar_ID_Alojamiento' => $ids,
		'nombre_consulta'       =>$name,
		'Llegada'               => $from2,
		'Salida'                => $to2,
		'Email_consulta'        => $emailU,
		'Telefono_consulta'     => $telefono,
		'consulta'              => $consulta
		
		
		);
	$this->db->insert('consultas_alojar', $array_consulta);
}

//ESTADISTICAS 

		$this->fag->estadisticas('mail',$ids, '',$tipo_ae);


		$mensaje = "
		 	<div style='font-style:normal; font: tahoma; font-size=12px'>
	  
				<b>Consulta de alojamiento a <b>$name_ae</b>    :: www.sanrafaellate.com.ar :: </b>
				<br />

				<b>DATOS PERSONALES:</b> <br />

				      <b>Nombre y Apellido :</b> $nombre<br />
					
					  
				      <b>E-Mail:</b> $emailU <br />

				      <b>Telefono:</b> $telefono <br />
				______________________________________________________________________________________	 
				<br />
				     <b> DATOS ESTADIA</b>  <br />
				     <b>Fecha de Arribo:</b> $from <br />
   			         <b> Fecha de Salida: </b> $to <br />
				______________________________________________________________________________________
				<br /><b>CONSULTA</b> <br />
				    $consulta <br />
SAN RAFAEL LATE - www.sanrafaellate.com.ar - El portal Turistico mas visitado de San Rafael
			</div>";

		$this->load->library('email');
		//$this->email->initialize($config);

// ALOJAMIENTOS A PUBLICIDAD
if($email_A!="contacto@sanrafaellate.com.ar"){
		$this->email->from($emailSRL, "SAN RAFAEL LATE");
		$this->email->reply_to($emailU);
		$this->email->to($email_A);
		$this->email->bcc($emailSRL);
		$this->email->subject('Consulta a su Alojamiento - San Rafael Late');
		$this->email->message($mensaje);
		$this->email->send();
}
if($email_A=="contacto@sanrafaellate.com.ar"){
		$this->email->from($emailSRL);
		$this->email->reply_to($emailU,$name);
		$this->email->to($email_A);
		$this->email->subject('Consulta a '.$name_ae.' - Responder - San Rafael Late');
		$this->email->message($mensaje);
		$this->email->send();
}

		
	}

		public function emailxalojar()
	{

//OBTENGO DATOS 
		// datos del usuario
		$nombre   =$this->input->post('name');
		$name     =$nombre;
		
		$emailU   =$this->input->post('email');
		$telefono =$this->input->post('telefono');
		$consulta =$this->input->post('consulta');
		$from     =$this->input->post('from');
		$to       =$this->input->post('to');
		
		//datos empresa o alojamiento
		$ids      =$this->input->post('id');
		$email_A  =$this->input->post('email_A');
		$tipo_ae  =$this->input->post('tipo_ae');
		$name_ae  =$this->input->post('name_ae');
		
		$emailSRL ="contacto@sanrafaellate.com.ar";

//ESTADISTICAS 
		
		$this->fag->estadisticas('mail',$ids, '',$tipo_ae);

		$mensaje = "
		 	<div style='font-style:normal; font: tahoma; font-size=12px'>
	  
				<b>Consulta de alojamiento   :: www.sanrafaellate.com.ar :: </b>
				<br />

				<b>DATOS PERSONALES:</b> <br />

				      <b>Nombre y Apellido :</b> $nombre<br />
					
					  
				      <b>E-Mail:</b> $emailU <br />

				      <b>Telefono:</b> $telefono <br />
				______________________________________________________________________________________	 
				<br />
				     <b> DATOS ESTADIA</b>  <br />
				     <b>Fecha de Arribo:</b> $from <br />
   			         <b> Fecha de Salida: </b> $to <br />
				______________________________________________________________________________________
				<br /><b>CONSULTA</b> <br />
				    $consulta <br />
SAN RAFAEL LATE - www.sanrafaellate.com.ar - El portal Turistico mas visitado de San Rafael
			</div>";


		$this->load->library('email');
	//	$this->email->initialize($config);




// ALOJAMIENTOS A PUBLICIDAD
if($email_A!="contacto@sanrafaellate.com.ar"){

		$this->email->clear();
		$this->email->from($emailSRL);
		$this->email->reply_to($emailU, $name);
		$this->email->to($email_A);
		$this->email->bcc($emailSRL);
		$this->email->subject('Consulta a su Alojamiento - San Rafael Late');
		$this->email->message($mensaje);
		$this->email->send();
}
if($email_A=="contacto@sanrafaellate.com.ar"){
	
		$this->email->clear();
		$this->email->from($emailSRL,"SAN RAFAEL LATE");
		$this->email->reply_to($emailU, $name);
		$this->email->to($email_A);
		$this->email->subject('Consulta a '.$name_ae.' - Responder - San Rafael Late');
		$this->email->message($mensaje);
		$this->email->send();
	
}
	


	echo "<div class='exitoE'>Estimado <b>".$nombre."</b>: Su consulta fue enviada con EXITO! <p> Gracias por su Consulta</p> </div>";

	}

// ENVIO EMAIL MULTIPLES 
     

public function emailmultiple()
	{



//OBTENGO DATOS 
		// datos del usuario
		$nombre=$this->input->post('name');
		$name=$nombre;
	
		$emailU=$this->input->post('email');
		$telefono=$this->input->post('telefono');
		$consulta=$this->input->post('consulta');
		$from=$this->input->post('from');
		$to=$this->input->post('to');
	
		//datos empresa o alojamiento
		$tipoA=$this->input->post('tipoA');
		

		$emailSRL="contacto@sanrafaellate.com.ar";
		$this->load->library('email');
//		$this->email->initialize($config);


$query= sprintf("Select a.ID_Alojamiento, i.Email, i.Nombre  FROM alojamientos a, informaciongeneral i WHERE (a.ID_TipoAlojamiento='%s' OR a.ID_TipoAlojamientoSub='%s' )  AND i.ID_InformacionGeneral=a.ID_InformacionGeneral AND a.Basico='destacado'  AND i.email<>'contacto@sanrafaellate.com.ar' AND a.Activo ='A' ORDER BY RAND() Limit 0, 20", $tipoA,$tipoA);
$rows=$this->db->query($query);
$rows_P=$rows->result_array();

$query2= sprintf("Select a.ID_Alojamiento, i.Email, i.Nombre  FROM alojamientos a, informaciongeneral i WHERE (a.ID_TipoAlojamiento='%s' OR a.ID_TipoAlojamientoSub='%s' ) AND i.ID_InformacionGeneral=a.ID_InformacionGeneral AND a.Basico='destacado'  AND i.email='contacto@sanrafaellate.com.ar'AND a.Activo ='A' ORDER BY RAND() Limit 0, 7", $tipoA,$tipoA);
$rows2=$this->db->query($query2);
$rows_C=$rows2->result_array();

foreach ($rows_P as $var) {



		$mensaje = "
		 	<div style='font-style:normal; font: tahoma; font-size=12px'>
	  
				<b>Consulta de alojamiento a <b>".$var['Nombre']."</b>    :: www.sanrafaellate.com.ar :: </b>
				<br />

				<b>DATOS PERSONALES:</b> <br /><br />

				      <b>Nombre y Apellido :</b> $nombre<br /><br />
					
					  
				      <b>E-Mail:</b> $emailU <br /><br />

				      <b>Telefono:</b> $telefono <br /><br />
				______________________________________________________________________________________	 
				<br />
				     <b> DATOS ESTADIA</b>  <br /><br />
				     <b>Fecha de Arribo:</b> $from <br /><br />
   			         <b> Fecha de Salida: </b> $to <br /><br />
				______________________________________________________________________________________
				<br /><b>CONSULTA</b> <br /><br />
				    $consulta <br /><br />
SAN RAFAEL LATE - www.sanrafaellate.com.ar - El portal Turistico mas visitado de San Rafael
			</div>";
			

		//ESTADISTICAS 
		$this->fag->estadisticas('mail',$var["ID_Alojamiento"], '',"alojar");
				
		//ENVIO AL ALOJAMIENTO PUBLICIDAD
		$this->email->clear();
		$this->email->from($emailSRL, "SAN RAFAEL LATE");
		$this->email->reply_to($emailU, $name);
		$this->email->to($var["Email"]);
		$this->email->bcc($emailSRL);
		$this->email->subject('Consulta a su Alojamiento - San Rafael Late');
		$this->email->message($mensaje);
		$this->email->send();

};
foreach ($rows_C as $var2) {
		//ENVIO AL ALOJAMIENTO COMISION
		$mensaje = "
		 	<div style='font-style:normal; font: tahoma; font-size=12px'>
	  
				<b>Consulta de alojamiento a <b>".$var2['Nombre']."</b>    :: www.sanrafaellate.com.ar :: </b>
				<br />

				<b>DATOS PERSONALES:</b> <br />

				      <b>Nombre y Apellido :</b> $nombre<br /><br />
										  
				      <b>E-Mail:</b> $emailU <br /><br />

				      <b>Telefono:</b> $telefono <br /><br />
				______________________________________________________________________________________	 
				<br />
				     <b> DATOS ESTADIA</b>  <br /><br />
				     <b>Fecha de Arribo:</b> $from <br /><br />
   			         <b> Fecha de Salida: </b> $to <br /><br />
				______________________________________________________________________________________
				<br /><b>CONSULTA</b> <br /><br />
				    $consulta <br /><br />
SAN RAFAEL LATE - www.sanrafaellate.com.ar - El portal Turistico mas visitado de San Rafael
			</div>";
			
	$this->fag->estadisticas('mail',$var2["ID_Alojamiento"], '',"alojar");
		
		$this->email->clear();
		$this->email->from($emailSRL, "SAN RAFAEL LATE");
		$this->email->reply_to($emailU, $name);
		$this->email->to('contacto@sanrafaellate.com.ar');
		$this->email->subject('Consulta para Alojamiento - '.$var2["Nombre"].' - San Rafael Late');
		$this->email->message($mensaje);
		$this->email->send();

			}
			
	


	echo "<div class='exitoE'>Estimado PRUEBA:<b>".$nombre."</b>: Su consulta fue enviada con EXITO! <p> Gracias por su Consulta</p> </div>";

	}



public function emailmultiple2()
	{


//OBTENGO DATOS 
		// datos del usuario
		$nombre=$this->input->post('name');
		$name=$nombre;
	
		$emailU=$this->input->post('email');
		$telefono=$this->input->post('telefono');
		$consulta=$this->input->post('consulta');
		$from=$this->input->post('from');
		$to=$this->input->post('to');
	
		//datos empresa o alojamiento
		$tipoA=$this->input->post('tipoA');
		

		$emailSRL="contacto@sanrafaellate.com.ar";
		$this->load->library('email');
//		$this->email->initialize($config);

		$emailA=$this->input->get('emailA');
		$nameA=$this->input->get('nameA');
		$IDA=$this->input->get('IDA');
if ($emailA !="contacto@sanrafaellate.com.ar") {

		$mensaje = "
		 	<div style='font-style:normal; font: tahoma; font-size=12px'>
	  
				<b>Consulta de alojamiento a <b>".$nameA."</b>    :: www.sanrafaellate.com.ar :: </b>
				<br />

				<b>DATOS PERSONALES:</b> <br /><br />

				      <b>Nombre y Apellido :</b> $nombre<br /><br />
					
					  
				      <b>E-Mail:</b> $emailU <br /><br />

				      <b>Telefono:</b> $telefono <br /><br />
				______________________________________________________________________________________	 
				<br />
				     <b> DATOS ESTADIA</b>  <br /><br />
				     <b>Fecha de Arribo:</b> $from <br /><br />
   			         <b> Fecha de Salida: </b> $to <br /><br />
				______________________________________________________________________________________
				<br /><b>CONSULTA</b> <br /><br />
				    $consulta <br /><br />
SAN RAFAEL LATE - www.sanrafaellate.com.ar - El portal Turistico mas visitado de San Rafael
			</div>";
			

		//ESTADISTICAS 
		$this->fag->estadisticas('mail',$IDA, '',"alojar");
				
		//ENVIO AL ALOJAMIENTO PUBLICIDAD
		$this->email->clear();
		$this->email->from($emailSRL,"SAN RAFAEL LATE");
		$this->email->reply_to($emailU, $name);
		$this->email->to($emailA);
		$this->email->bcc($emailSRL);
		$this->email->subject('Consulta a su Alojamiento - San Rafael Late');
		$this->email->message($mensaje);
		//$this->email->send();



} else {

		//ENVIO AL ALOJAMIENTO COMISION
		$mensaje = "
		 	<div style='font-style:normal; font: tahoma; font-size=12px'>
	  
				<b>Consulta de alojamiento a <b>".$nameA."</b>    :: www.sanrafaellate.com.ar :: </b>
				<br />

				<b>DATOS PERSONALES:</b> <br />

				      <b>Nombre y Apellido :</b> $nombre<br /><br />
										  
				      <b>E-Mail:</b> $emailU <br /><br />

				      <b>Telefono:</b> $telefono <br /><br />
				______________________________________________________________________________________	 
				<br />
				     <b> DATOS ESTADIA</b>  <br /><br />
				     <b>Fecha de Arribo:</b> $from <br /><br />
   			         <b> Fecha de Salida: </b> $to <br /><br />
				______________________________________________________________________________________
				<br /><b>CONSULTA</b> <br /><br />
				    $consulta <br /><br />
SAN RAFAEL LATE - www.sanrafaellate.com.ar - El portal Turistico mas visitado de San Rafael
			</div>";
			
	$this->fag->estadisticas('mail',$IDA, '',"alojar");
		
		$this->email->clear();
		
		$this->email->from($emailSRL, "SAN RAFAEL LATE");
		$this->email->reply_to($emailU, $name);
		$this->email->to($emailA);
		$this->email->subject('Consulta para Alojamiento - '.$nameA.' - San Rafael Late');
		$this->email->message($mensaje);
		$this->email->send();

			}
			
	


	echo "<div class='exitoE'>Email enviado a ".$nameA." </div>";

	}



			public function contacto()
	{

//OBTENGO DATOS 
		// datos del usuario
		$nombre=$this->input->post('name');
		$name=$nombre;
		
		$emailU=$this->input->post('email');
		$telefono=$this->input->post('telefono');
		$consulta=$this->input->post('consulta');
		$asunto=$this->input->post('asunto');
		$tipoc=$this->input->post('tipoc');

		$emailSRL="contacto@sanrafaellate.com.ar";

		if($tipoc=="P"){$titlec="Consulta de Publicidad";}
		if($tipoc=="O"){$titlec="Opinion o Sugerencia";}
		if($tipoc=="C"){$titlec="Consulta";}
		$mensaje = "
		 	<div style='font-style:normal; font: tahoma; font-size=12px'>
	  
				<b>$titlec : </b>
				<br />

				<b>DATOS PERSONALES:</b> <br />

				      <b>Nombre y Apellido :</b> $nombre<br />
					
					  
				      <b>E-Mail:</b> $emailU <br />

				      <b>Telefono:</b> $telefono <br />
					
				______________________________________________________________________________________
				<br /><b>CONSULTA</b> <br />
				    $consulta <br />
SAN RAFAEL LATE - www.sanrafaellate.com.ar - El portal Turistico mas visitado de San Rafael
			</div>";


		$this->load->library('email');
	//	$this->email->initialize($config);




// ALOJAMIENTOS A PUBLICIDAD


		$this->email->clear();
		$this->email->from($emailU, $name);
		$this->email->reply_to($emailU, $name);
		$this->email->to($emailSRL);
		$this->email->subject($asunto);
		$this->email->message($mensaje);
		$this->email->send();

	

	


	echo "<div class='exitoE'>Estimado <b>".$nombre."</b>: Su ".$titlec." fue enviada con EXITO! <p> En breve nos comunicaremos con UD.</p> </div>";

	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
?>