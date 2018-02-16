<?php 

/**
* 
*/
class Dbgeneral extends CI_Model
{
	
//OBTENER DATOS DE LA PAGINA
function paginas ($tipopagina, $url) {

$url2=$url.".html";
$query= sprintf("Select * FROM paginas p, tipopagina t WHERE t.TipoPagina='%s' AND t.ID_TipoPagina=p.ID_TipoPagina  AND p.url='%s' LIMIT 1",$tipopagina,$url2);

$rows=$this->db->query($query);
$rows =$rows->row_array();

return $rows;
}
//OBTENER PAGINAS INTERNA DE LA PAGINA
function paginasint ($idpp,$idp) {

$query= sprintf("Select * FROM paginas p,tipopagina t WHERE p.ID_PaginaPrincipal='%s' AND p.ID_Pagina<>'%s'  AND t.ID_TipoPagina=p.ID_TipoPagina ORDER BY RAND() Limit 0, 6 ",$idpp,$idp);
$rows=$this->db->query($query);
$totalrows=$rows->num_rows();
$rows =$rows->result_array();
$results=array("rows"=>$rows, "totals"=>$totalrows);
return $results;

}
//fotos de la pagina
function fotosp ($idp) {

$query= sprintf("Select * FROM paginas_imagenespag  WHERE ID_Pagina = '%s' ",$idp);
$rows=$this->db->query($query);
$totalrows=$rows->num_rows();
$rows =$rows->result_array();
$results=array("rows"=>$rows, "totals"=>$totalrows);
return $results;

}
function fotosp_slider ($idp) {

$query= sprintf("Select * FROM paginas_imagenespag_slider  WHERE ID_Pagina = '%s' ",$idp);
$rows=$this->db->query($query);
$totalrows=$rows->num_rows();
$rows =$rows->result_array();
$results=array("rows"=>$rows, "totals"=>$totalrows);
return $results;

}
//Obteniendo paginas segun tipo 
function mastipos ($tipo,$idpp) {

$query= sprintf("Select * FROM paginas p, tipopagina t WHERE t.ID_TipoPagina='%s' AND t.ID_TipoPagina=p.ID_TipoPagina AND (p.ID_PaginaPrincipal<>'%s' OR p.ID_Pagina<>'%s')   ORDER BY RAND() LIMIT 0,4 ",$tipo,$idpp,$idpp);

$rows=$this->db->query($query);
$totalrows=$rows->num_rows();
$rows =$rows->result_array();
$results=array("rows"=>$rows, "totals"=>$totalrows);
return $results;

}
//obtenemos el nombre de la pagina top
function tipopp ($idpp) {
$query= sprintf("Select * FROM paginas WHERE ID_PaginaPrincipal='%s' LIMIT 1 ",$idpp);
$rows=$this->db->query($query);
$rows =$rows->row_array();
return $rows;
}


//PAGINAS 

function tipop ($tipop) {
$query= sprintf("Select * FROM tipopagina WHERE TipoPagina='%s' ",$tipop);
$rows=$this->db->query($query);
$rows =$rows->result_array();

return $rows;
}



}


 ?>