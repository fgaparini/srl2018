<?php 

/**
* 
*/
class Dbdestacados extends CI_Model
{
	//DETERMINAR datos del tipo de alojamiento
	function listartipos ($tipopag) {
		if($tipopag=="todos"){
	$query= sprintf("Select t.TituloPagina,t.TipoPagina  FROM paginas p, tipopagina t Where p.ID_TipoPagina=t.ID_TipoPagina AND p.DestaPagina ='1' AND TipoPagina<>'noticias' GROUP BY t.TipoPagina ");
} else {
	$query= sprintf("Select t.TituloPagina,t.TipoPagina  FROM paginas p, tipopagina t Where p.ID_TipoPagina=t.ID_TipoPagina AND p.DestaPagina ='1' AND TipoPagina<>'%s' AND TipoPagina<>'noticias' GROUP BY t.TipoPagina ",$tipopag);
}
$rowsD=$this->db->query($query);
$rowsD=$rowsD->result_array();
return $rowsD;
}

function tipopag ($tipopag) {
$query= sprintf("Select *  FROM tipopagina  Where  TipoPagina='%s' AND TipoPagina<>'noticias' ",$tipopag);
$rowsD=$this->db->query($query);
$rowsD=$rowsD->row_array();
return $rowsD;
}


function listar ($tipopag, $star, $end) {
//OBTENGO TODOS LOS EVENTOS PARA EL MES 
switch ($tipopag) {
	case 'todos':
$query= sprintf("Select *  FROM paginas p, tipopagina t Where p.ID_TipoPagina=t.ID_TipoPagina AND p.DestaPagina ='1' AND  t.TipoPagina<>'noticias' ORDER BY p.ID_Pagina DESC LIMIT %s, %s ", $star, $end);
		break;
		case 'noticias':
$query= sprintf("Select *  FROM paginas p, tipopagina t Where  t.TipoPagina='noticias' AND p.ID_TipoPagina=t.ID_TipoPagina ORDER BY  p.ID_Pagina DESC LIMIT %s, %s ", $star, $end);
		break;
	default:
$query= sprintf("Select *  FROM paginas p, tipopagina t Where  p.DestaPagina ='1' AND t.TipoPagina='%s' AND p.ID_TipoPagina=t.ID_TipoPagina AND t.TipoPagina<>'noticias' ORDER BY  p.ID_Pagina DESC LIMIT %s, %s ",$tipopag, $star, $end);
		break;
}


$rowsD=$this->db->query($query);
$rowsD=$rowsD->result_array();

return $rowsD;
}

function getcantidad ($tipopag)
{

if ($tipopag=="todos") { 
$query= sprintf("Select *  FROM paginas p, tipopagina t Where p.ID_TipoPagina=t.ID_TipoPagina AND p.DestaPagina ='1'");
} else {
$query= sprintf("Select *  FROM paginas p, tipopagina t Where  p.DestaPagina ='1' AND t.TipoPagina='%s' AND  p.ID_TipoPagina=t.ID_TipoPagina",$tipopag);
}

$rows= $this->db->query($query);
$totalrows=$rows->num_rows();
return $totalrows;
}
}
 ?>