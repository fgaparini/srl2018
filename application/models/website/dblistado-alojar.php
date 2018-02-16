<?php 

/**
* 
*/
class Dblistadoa extends CI_Model
{
	

function desta ($Tipoalojar,$Tipoalojar2, $star, $end) {
	//para hoteles y Apart
if($Tipoalojar2!="0") {
$Tipoalojar22="OR a.ID_TipoAlojamiento=".$Tipoalojar2;
} else {
$Tipoalojar22="";
}

$query= sprintf("Select i.Nombre, i.Descripcion,i.Telefonom i.Email, i.Direccion,a.Url, a.ID_Alojamiento  FROM alojamientos a, informaciongeneral i 
WHERE i.ID_InformacionGeneral=a.ID_InformacionGeneral AND a.ID_TipoAlojamiento=%s %s  AND a.DestaOrden>'0' ORDEN BY a.DestaOrden ASC
LIMIT %s, %s ",$Tipoalojar, $Tipoalojar22, $star, $end);

$rows=$this->db->query($query);
$rows =$rows->result_array();

return $rows;
}


function ajax_list ($Tipoalojar, $star, $end) {

$query= sprintf("Select i.Nombre, i.Descripcion,i.Telefonom i.Email, i.Direccion,a.Url, a.ID_Alojamiento  FROM alojamientos a, informaciongeneral i 
WHERE i.ID_InformacionGeneral=a.ID_InformacionGeneral AND a.ID_TipoAlojamiento=%s AND a.DestaOrden='0' ORDEN BY RAND()
LIMIT %s, %s ",$Tipoalojar, $star, $end	);


$rowsA=$this->db->query($query);
$rowsA=$rowsA->result_array();

return $rowsA;
}
}


 ?>