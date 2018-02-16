<?php 

/**
* 
*/
class Dblistado extends CI_Model
{
	//DETERMINAR datos del tipo de alojamiento
	function tipoalojar ($url)
	{
$query= sprintf("Select * FROM tipoalojamiento WHERE UrlAlojamiento ='%s' LIMIT 1",$url);
$rows=$this->db->query($query);
$rows =$rows->row_array();
return $rows;
	}

function desta ($Tipoalojar,$Tipoalojar2, $star, $end) 
{
	//para hoteles y Apart
if($Tipoalojar2 !="0") {
$Tipoalojar22="OR a.ID_TipoAlojamiento=$Tipoalojar2 ";
} else {
$Tipoalojar22="";
}

$query= sprintf("Select i.Nombre, i.Descripcion,i.Telefono,i.Email, i.Direccion,a.Url,i.WebSite, a.ID_Alojamiento  FROM alojamientos a, informaciongeneral i 
WHERE i.ID_InformacionGeneral=a.ID_InformacionGeneral AND  (a.ID_TipoAlojamiento=%s %s OR a.ID_TipoAlojamientoSub ='%s' ) AND a.DestaOrden >'0' AND a.Activo ='A'   ORDER BY a.DestaOrden ASC
LIMIT %s, %s ",$Tipoalojar,$Tipoalojar22,$Tipoalojar, $star, $end);

$rows=$this->db->query($query);
$rows =$rows->result_array();

return $rows;
}


function listar ($Tipoalojar,$Tipoalojar2, $star, $end) {

if($Tipoalojar2 !="0") {
$Tipoalojar22="OR a.ID_TipoAlojamiento=$Tipoalojar2 ";
} else {
$Tipoalojar22=" ";
}

$query= sprintf("Select i.Nombre, i.Descripcion,i.Telefono,a.Basico,a.UrlBooking, a.UrlImage_Booking,i.Email, i.Direccion,a.Url,i.WebSite, a.ID_Alojamiento  FROM alojamientos a, informaciongeneral i 
WHERE i.ID_InformacionGeneral=a.ID_InformacionGeneral AND (a.ID_TipoAlojamiento=%s %s OR a.ID_TipoAlojamientoSub ='%s' ) AND a.DestaOrden ='0' AND a.Activo ='A'   ORDER BY  RAND()
LIMIT %s, %s ",$Tipoalojar,$Tipoalojar22,$Tipoalojar, $star, $end);

$rowsA=$this->db->query($query);
$rowsA=$rowsA->result_array();

return $rowsA;
}

function getCantidad ($Tipoalojar,$Tipoalojar2)
{
	if($Tipoalojar2 !="0") {
$Tipoalojar22="OR a.ID_TipoAlojamiento=$Tipoalojar2 ";
} else {
$Tipoalojar22="";
}
$query= sprintf(" SELECT COUNT(*) as totalrows FROM alojamientos a, informaciongeneral i WHERE i.ID_InformacionGeneral=a.ID_InformacionGeneral AND (a.ID_TipoAlojamiento=%s %s ) AND a.Activo ='A'  AND a.DestaOrden ='0'",$Tipoalojar,$Tipoalojar22);
$rows= $this->db->query($query);
$rows=$rows->row();
return $rows->totalrows;
}


// ALOJAMIENTOS SEGUN LOCALIDAD

	function settipos ()
	{
$query= sprintf("Select * FROM tipoalojamiento ");
$rows=$this->db->query($query);
$rows =$rows->result_array();
return $rows;
	}

function listadoalojar ($loca,$tipo, $star, $end)
{
	$query= sprintf("Select i.Nombre, i.Descripcion,i.Telefono,i.Email,a.Basico, i.Direccion,a.Url,l.Localidad, l.ID_Localidades,i.WebSite, a.ID_Alojamiento  FROM alojamientos a, informaciongeneral i, localidades l 
WHERE l.Localidad Like '%s' AND i.Localidad=l.ID_Localidades AND a.ID_TipoAlojamiento='%s'   AND i.ID_InformacionGeneral= a.ID_InformacionGeneral 
LIMIT %s, %s ",$loca,$tipo, $star, $end);

$rows=$this->db->query($query);
$rows =$rows->result_array();
return $rows;
}

// PROMOCIONES
function getpromo($id)
{
$hoy=date('Y-m-d');
$query= sprintf("Select ID_Alojamiento from promociones Where ID_Alojamiento = '%s' AND HastaPromo >='%s'",$id,$hoy);
$rows=$this->db->query($query);
$rows =$rows->result_array();
$totalrows = count($rows);
return $totalrows;
}


/*-------------------------------------------------------------------------------------
								API REST PARA APP SAN RAFAEL
----------------------------------------------------------------------------------------*/
//busco tipo alojamientos
function tipoalojar_api($tipo){
$query= sprintf("Select ID_TipoAlojamiento, TipoAlojamiento,TituloAlojamiento FROM tipoalojamiento WHERE TipoAlojamiento ='%s' LIMIT 1",$tipo);
$rows=$this->db->query($query);
$rows =$rows->row_array();
return $rows;
	}

// LISTO ALOJAMIENTOS SEGUN TIPO 
function listar_api ($Tipoalojar,$Tipoalojar2, $star, $end) {

if($Tipoalojar2 !="0") {
$Tipoalojar22="OR a.ID_TipoAlojamiento=$Tipoalojar2 ";
} else {
$Tipoalojar22=" ";
}

$query= sprintf("Select i.Nombre,ia.TelefonoAPP Telefono,a.Basico,a.UrlBooking, 
	 a.UrlImage_Booking,ia.EmailAPP Email, i.Direccion,a.Url,i.WebSite, a.ID_Alojamiento , a.App_tipo
	 FROM alojamientos a, informaciongeneral i,informacionapp ia 
	 WHERE i.ID_InformacionGeneral=a.ID_InformacionGeneral AND ia.ID_InformacionAPP = a.ID_InformacionGeneral 
	 AND (a.ID_TipoAlojamiento=%s %s OR a.ID_TipoAlojamientoSub ='%s' ) 
	 AND a.App_tipo > 0  AND a.Activo ='A'  
	 ORDER BY a.App_tipo Desc,  RAND() 
	 LIMIT %s, %s ",$Tipoalojar,$Tipoalojar22,$Tipoalojar, $star, $end);

$rowsA=$this->db->query($query);
$rowsA=$rowsA->result_array();

return $rowsA;
}

}


 ?>