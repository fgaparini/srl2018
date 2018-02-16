<?php 

/**
* 
*/
class Dbempresas extends CI_Model
{

	

function empresas ($idsubtipo, $star, $end) {


$query= sprintf("Select * From empresas  WHERE 	ID_SubtipoEmpresa='%s' and  Basico <2 ORDER BY Basico ASC,RAND()  LIMIT %s, %s ",$idsubtipo, $star, $end);
$rows=$this->db->query($query);
$totalrows=$rows->num_rows();
$rows =$rows->result_array();
$results=array("rows"=>$rows, "totals"=>$totalrows);
return $results;
}

function tipoempresas ($tipoempresa) {


$query= sprintf("Select * From tipoempresa  WHERE TipoEmpresa='%s' ",$tipoempresa);

$rows=$this->db->query($query);
$rows =$rows->row_array();

return $rows;
}
function listarTipoEmpresas () {


$query= sprintf("Select ID_TipoEmpresa, TipoEmpresa From tipoempresa ");

$rows=$this->db->query($query);
$rows =$rows->result_array();

return $rows;
}


function subtipoempresas ($urlsubtipo) {


$query= sprintf("Select * From subtipoempresa WHERE UrlSubEmpresa='%s' ORDER BY ID_SubtipoEmpresa DESC ",$urlsubtipo);

$rows=$this->db->query($query);
$rows =$rows->row_array();

return $rows;
}

/* -------------------------------------------------------------------------------------
								API PARA APP SAN RAFAEL
----------------------------------------------------------------------------------------*/
/**
 * [listarsubtipo lista los subtipos de empresas]
 * @param  [type] $tipoempresa [id empresa]
 * @return [type]              [array]
 */
function listarsubtipo ($tipoempresa) {
$query= sprintf("Select * From subtipoempresa WHERE ID_TipoEmpresa='%s'  ORDER BY SubtipoEmpresa asc ",$tipoempresa);
$rows=$this->db->query($query);
$rows =$rows->result_array();
return $rows;
}

/**
 * [listar_empresas description]
 * @param  [type] $idsubtipo [description]
 * @return [type]            [description]
 */
function listar_empresas ($idsubtipo) {
$query= sprintf("Select * From empresas  WHERE 	ID_SubtipoEmpresa='%s' and App_tipo>0  ORDER BY App_tipo Desc,RAND() ",$idsubtipo);
$rows=$this->db->query($query);
$totalrows=$rows->num_rows();
$rows =$rows->result_array();
$results=array("rows"=>$rows, "totals"=>$totalrows);
return $rows;

}

function detalle_empresa ($id) {
$query= sprintf("select * FROM empresas e, tipoempresa te, subtipoempresa ste WHERE e.ID_Empresa='%s' and te.ID_TipoEmpresa = e.ID_TipoEmpresa and ste.ID_SubTipoEmpresa=e.ID_SubTipoEmpresa",$id);
$rows=$this->db->query($query);
$rows =$rows->row_array();
return $rows;

}
function detalle_empresa_vino ($id) {
$query= sprintf("select * FROM empresas e, tipoempresa te, subtipoempresa ste, bodegas_data bd WHERE e.ID_Empresa='%s' and te.ID_TipoEmpresa = e.ID_TipoEmpresa and bd.id = e.bodega_id and ste.ID_SubTipoEmpresa=e.ID_SubTipoEmpresa",$id);
$rows=$this->db->query($query);
$rows =$rows->row_array();
return $rows;
}

/**
 * [listar_emp_con_coord ]
 * @param  [type] $tipoempresa [description]
 * @return [type]              [description]
 */
function listar_emp_con_coord ($tipoempresa) {

$query= sprintf("Select * From empresas WHERE coordenadas<>' ' ");
$rows=$this->db->query($query);
$rows =$rows->result_array();
return $rows;
}

function buscarPorTipoPublica ($tipoPublica,$limite) {
if($limite>0){
	$limite =' limit '. $limite ;
} else {
	$limite = ' ';
}

$query= sprintf("(SELECT a.ID_Alojamiento as ID, ig.Nombre as Nombre,ig.Direccion as Direccion, ig.Coordenadas as Coord, 'alojamientos' as tipo, 100 as tipoEmp FROM informaciongeneral ig, alojamientos a WHERE App_tipo ='%s' and ig.ID_InformacionGeneral = a.ID_InformacionGeneral and ig.Coordenadas !='') UNION (select e.ID_Empresa as ID, e.Empresa as Nombre , e.Direccion Direccion,e.Coordenadas as Coord, 'empresas' as tipo, e.ID_TipoEmpresa as tipoEmp from empresas e where App_tipo ='%s' and e.Coordenadas !='' ) order by rand() %s",$tipoPublica,$tipoPublica,$limite);
$rows=$this->db->query($query);
$rows =$rows->result_array();
return $rows;
}

function caminosvino () {
$query= sprintf("Select * From empresas e WHERE e.ID_SubtipoEmpresa='%s' and e.bodega_id > 0 and e.App_tipo>0  ORDER BY e.App_tipo Desc,RAND() ",8);
$rows=$this->db->query($query);


$totalrows=$rows->num_rows();
$rows =$rows->result_array();
return $rows;

}
function bodegas_data ($id) {
$query= sprintf("Select * From  bodegas_data bd WHERE  bd.id = '%s'",$id);
$rows=$this->db->query($query);
$rows =$rows->result_array();
return $rows;

}
    
}


 ?>