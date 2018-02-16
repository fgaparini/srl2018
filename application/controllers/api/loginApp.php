<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginApp extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user/clientes_user_model');
      
    }


    function login2()
    {
        echo "hola2";
    }


    function loginServices()
    {
    header ( 'Access-Control-Allow-Origin: *' ); 
    	if($this->input->post('Usuario')!=null){
        $Usuario = $this->input->post('Usuario');
  		$Clave = $this->input->post('Clave');
	  	}else {
	  		//echo "hola";
	  		$Usuario = "losniyus";
	  		$Clave = "pablo1234";
	  	}
        //query the database
        $query=sprintf("select  c.*  from clientes c where c.Usuario='%s' and c.Clave='%s' ",$Usuario,$Clave);
     
        $rows = $this->db->query($query);
        
       	$row =$rows->row();


        if ($row)
        {
       
        	 if($row->tipoCliente =='Alojar'){
        	 	 $query2=sprintf("select ID_Alojamiento as ID from alojamientos_clientes where ID_Cliente='%s'",$row->ID_Cliente);
  			   }else{
  			   		 $query2=sprintf("select  ID_Empresa as ID  from empresa_clientes where ID_Cliente='%s'",$row->ID_Cliente);
  			   }

			        $rows2 = $this->db->query($query2);
			        
			       	$row2 =$rows2->row();
        	 
            $sess_array = array(
				'ID_Cliente'      => $row->ID_Cliente,
				'Usuario'         => $row->Usuario,
				'NombreCliente'   => $row->NombreCliente,
				'ApellidoCliente' => $row->ApellidoCliente,
				'EmailCliente'    => $row->EmailCliente,
				'Cargo'           => $row->Cargo,
				'tipoCliente'     => $row->tipoCliente,
				'ID'			  => $row2->ID
               
            );

            //$this->session->set_userdata('logged_in', $sess_array);
            $json = array($sess_array);

           $json2=json_encode($json);
           echo $json2;
         } else {

            return '[]';
        }
    }


   

}

?>
