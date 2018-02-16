<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Multiple extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}


public function emailmultiple()
	{

$data['tipoAlojar']=$this->input->get('tipoalojar');
$data['nameA']=$this->input->get('nameA');
$data['bu']= $this->input->get( 'bu');


// $query= sprintf("Select a.ID_Alojamiento, i.Email, i.Nombre  FROM alojamientos a, informaciongeneral i WHERE a.ID_TipoAlojamiento='%s' AND i.ID_InformacionGeneral=a.ID_InformacionGeneral AND a.Basico=0  AND i.email<>'contacto@sanrafaellate.com.ar' AND a.Activo ='A' ORDER BY RAND() Limit 0, 16",$data['tipoAlojar']);
// $rows=$this->db->query($query);
// $rows_P=$rows->result_array();


// $query2= sprintf("Select a.ID_Alojamiento, i.Email, i.Nombre  FROM alojamientos a, informaciongeneral i WHERE a.ID_TipoAlojamiento='%s' AND i.ID_InformacionGeneral=a.ID_InformacionGeneral AND a.Basico=0  AND i.email='contacto@sanrafaellate.com.ar' AND a.Activo ='A' ORDER BY RAND() Limit 0, 7",$data['tipoAlojar']);
// $rows2=$this->db->query($query2);
// $rows_C=$rows2->result_array();

// $datosA = array_merge($rows_P,$rows_C);

// $rows_P2=json_encode($datosA); 

// $data['rows_P2']=$rows_P2;$data['counjson']=count($datosA);
$this->load->view('website/envio_multiple', $data);

/* End of file home.php */
/* Location: ./application/controllers/home.php */
}
}
?>