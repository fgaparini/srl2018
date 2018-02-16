<?php 

class fw
{
	function tiposalojar() 
	{
		 $CI = & get_instance();
		 //AGENDA 
		$query= "Select tipoalojamientos FROM tipoalojamiento Order by DESC ";
		$rows=$CI->db->query($query);
		$rows_ =$rows->result_array();
		
		return $rows_;
	}

}





 ?>