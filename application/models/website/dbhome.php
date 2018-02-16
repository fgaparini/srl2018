<?php 

/**
* 
*/
class Dbhome extends CI_Model
{
	

function homeC ($Tipoalojar, $star, $end) {

if ($Tipoalojar=='3') { $extra="OR a.ID_TipoAlojamiento='6' ";}
		if ($Tipoalojar=='1') { $extra="OR a.ID_TipoAlojamiento='12' ";}
	if ($Tipoalojar=='2') { $extra=" ";}

$query= sprintf("Select i.Nombre, i.Descripcion,a.Url, a.ID_Alojamiento  FROM alojamientos a, informaciongeneral i 
WHERE i.ID_InformacionGeneral=a.ID_InformacionGeneral AND (a.ID_TipoAlojamiento=%s %s) AND a.DestaHome='1' AND a.Activo='A'
LIMIT %s, %s ",$Tipoalojar,$extra, $star, $end	);
$rows=$this->db->query($query);
$rows =$rows->result_array();

return $rows;
}

function getpromo($id)
{
	$hoy=date('Y-m-d');
$query= sprintf("Select ID_Alojamiento from promociones Where ID_Alojamiento = '%s' AND HastaPromo >='%s'",$id,$hoy);
$rows=$this->db->query($query);
$rows =$rows->result_array();
$totalrows = count($rows);
return $totalrows;
}

function alojar_desta ($star, $end) {

$query= sprintf("Select i.Nombre, i.Descripcion,a.Url, a.ID_Alojamiento ,ta.ID_TipoAlojamiento,ta.TituloAlojamiento,ta.TipoAlojamiento FROM alojamientos a, informaciongeneral i, tipoalojamiento ta WHERE i.ID_InformacionGeneral=a.ID_InformacionGeneral AND ta.ID_TipoAlojamiento=a.ID_TipoAlojamiento AND a.DestaHome='1' AND a.Activo='A' ORDER BY RAND()
LIMIT %s, %s ", $star, $end	);
$rows=$this->db->query($query);
$rows =$rows->result_array();

return $rows;

}
//Obtengo Paginas Top segun categoria
function PaginaCategoria ($tipopagina) {

$query= sprintf("Select p.*, t.*, (Select count(*) from paginas_imagenespag pip where pip.ID_Pagina = p.ID_Pagina ) as TotalImg FROM paginas p, tipopagina t WHERE t.TipoPagina='%s' AND p.ID_TipoPagina=t.ID_TipoPagina AND OrdenPagina='top' ",$tipopagina);

$rows=$this->db->query($query);
$rows =$rows->result_array();

return $rows;

}
}


 ?>