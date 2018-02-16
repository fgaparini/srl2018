<?php 

/**
* 
*/
class Dbmedia extends CI_Model
{
	// OBTENGO TODOS TIPO DE IMAGENES
	function tipo_fotos (){
		$query= sprintf("select it_id_imagen_tipo, it_nombre, it_descripcion, it_thumb_upload FROM imagenes_tipo ORDER BY RAND() ;");
		$row=$this->db->query($query);
		$rows =$row->result_array();
		return $rows;
	}


	// 
	function galeria_fotos($name) {

		$query= sprintf("select * from imagenes i,imagenes_tipo it  where it.it_nombre ='%s' AND it.it_id_imagen_tipo= i.im_id_imagen_tipo ORDER BY RAND() ",$name);
		$rows=$this->db->query($query);
		$rows_F=$rows->result_array();

		return $rows_F;

	}

function videos() {

		$query= sprintf("select * from videos ORDER BY RAND() ");
		$rows=$this->db->query($query);
		$rows_F=$rows->result_array();

		return $rows_F;

	}


}


 ?>