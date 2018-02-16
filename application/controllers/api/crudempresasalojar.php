<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crudempresasalojar extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		
		$this->load->model("website/dblistado");
		$this->load->model("website/dbempresas");
		$this->load->model("admin/alojamientos_model");
		$this->load->model("admin/empresas_model");
		

    }
	

  
    //Listo subtipo empresas
    //@paramenter = IdTipo
	public function listarsubtipo($idtipo) {
		header ( 'Access-Control-Allow-Origin: *' ); 
		header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
		$subtipos = $this->dbempresas->listarsubtipo($idtipo);
		echo json_encode($subtipos);

	}
	
	public function save()
  	  {

		header ( 'Access-Control-Allow-Origin: *' ); 
		header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

		$ID = $this->input->post('ID');
		$ID_Alojamiento    = $this->input->post('ID');
		$tipoCliente       = $this->input->post('userTipo');
		
		        $data_info_app = array(
		           
					'TelefonoAPP'                => $this->input->post('Telefono'),
		            'EmailAPP'                   => $this->input->post('Email'),
		            'DescripcionAPP'             => $this->input->post('Descripcion')
		   
		        );

			 $data_info_gral = array(
		            'Nombre'                  => $this->input->post('Nombre'),
		            'Direccion'               => $this->input->post('Direccion'),          
		            'WebSite'           	  => $this->input->post('WebSite'),
		            'Coordenadas'             => $this->input->post('Coordenadas')
		        );
		
			        $data_info_empresa = array(
		           
					'Telefono'        => $this->input->post('Telefono'),
					'Mail'            => $this->input->post('Email'),
					'DescripcionDeta' => $this->input->post('Descripcion'),
					'Descripcion' 	  => $this->input->post('Descripcion'),	
					'Empresa'         => $this->input->post('Nombre'),
					'Direccion'       => $this->input->post('Direccion'),          
					'Web'             => $this->input->post('WebSite'),
					'Coordenadas'     => $this->input->post('Coordenadas')
		        );			
		if($tipoCliente == 'Alojar') 
		{ 
	   
		             $this->alojamientos_model->insert_update_appdata($ID, 'informacionapp', $data_info_app );
		            $this->alojamientos_model->update($ID, $data_info_gral, 'ID_InformacionGeneral', 'informaciongeneral');
		           
		 }
		 else{

		 	  $this->empresas_model->update($ID, $data_info_empresa, 'ID_Empresa', 'empresas');
		 	 
		 }
		  
    }



}/* End of file home.php */
/* Location: ./application/controllers/home.php */

?>