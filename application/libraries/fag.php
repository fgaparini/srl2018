<?php 

/**
* funcion a utilizar en todo el website.
*/
class fag
{
	function agenda() 
	{
		 $CI = & get_instance();
		 //AGENDA 
		$query4= "Select Date_format(Fecha,'%d/%m') as fechaA, ID_Agenda,Titulo, Descripcion  FROM agendas WHERE Fecha>(now())- interval 1 day ORDER BY  Fecha ASC ";
		$rowsA=$CI->db->query($query4);
		$rows_A =$rowsA->result_array();
		
		return $rows_A;
	}
//LISTAR LOS TIPOS DE ALOJAMIENTOS
	function tiposalojar() 
	{
		 $CI = & get_instance();
		 //AGENDA 
		$query= "Select TipoAlojamiento, UrlAlojamiento,TituloAlojamiento,ID_TipoAlojamiento  FROM tipoalojamiento Order by ID_TipoAlojamiento ASC ";
		$rows=$CI->db->query($query);
		$rows_ =$rows->result_array();
		
		return $rows_;
	}

	 function estadisticas ($tipo_a, $id, $web,$table)
    {

        $CI           = & get_instance();
        $ip           = $_SERVER['REMOTE_ADDR'];
        $navegador    = $_SERVER['HTTP_USER_AGENT'];
       
        $estadisticas=array();

        if($table=="alojar"){
        
            $tabla = "estadistica_alojar";
            $estadisticas = array(
                'Ip' => $ip,
                'Navegador' => $navegador,
                'ID_Alojamiento' => $id

            );

        }elseif ($table == "empresa") {
            $tabla = "estadistica_empresa";
            $estadisticas = array(

                'Ip' => $ip,
                'Navegador' => $navegador,
                'ID_Empresa' => $id

            );
        }else
        {
            echo "error";
            exit();
        }
       


        if ($tipo_a == 'ficha')
        {
          
            $estadisticas['TipoAccion']="ficha";
            $CI->db->insert($tabla, $estadisticas);
         }                 
        elseif ($tipo_a == 'mail')
        {
            $estadisticas['TipoAccion']="mail";
            $CI->db->insert($tabla, $estadisticas);
        }
        elseif ($tipo_a == 'web')
        {
            $estadisticas['TipoAccion']="web";
            $CI->db->insert($tabla, $estadisticas);
            redirect('http://'.$web);
        }
         elseif ($tipo_a == 'facebook')
        {   
            $estadisticas['TipoAccion']="facebook";
            $CI->db->insert($tabla, $estadisticas);
            redirect('https://facebook.com/'.$web);
        }
         elseif ($tipo_a == 'twitter')
        {
            $estadisticas['TipoAccion']="twitter";
            $CI->db->insert($tabla, $estadisticas);
            redirect('https://twitter.com/'.$web)   ; }
         elseif ($tipo_a == 'gplus')
        {
            $estadisticas['TipoAccion']="gplus";
            $CI->db->insert($tabla, $estadisticas);
            redirect('https://plus.google.com/'.$web);
        }
  		elseif ($tipo_a == 'pinterest')
        {
            $estadisticas['TipoAccion']="pinterest";
            $CI->db->insert($tabla, $estadisticas);
            redirect('https://pinterest.com/'.$web);
        }
        else
        {
            echo "error en la funcion estadisticas";
            exit();
        }
    }

       

}



 ?>