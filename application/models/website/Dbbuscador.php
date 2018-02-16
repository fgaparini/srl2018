<?php 

/**
* 
*/
class Dbbuscador extends CI_Model
{

	function tipoalojar ($url)
	{
$query= sprintf("Select ID_TipoAlojamiento, TituloAlojamiento FROM tipoalojamiento WHERE UrlAlojamiento ='%s' LIMIT 1",$url);
$rows=$this->db->query($query);
$rows =$rows->row_array();
return $rows;
	}
	function listar($tipo,$star,$end) {

$query= sprintf("Select i.Nombre, i.Descripcion,i.Localidad,i.Email, i.Direccion,a.Url, a.ID_Alojamiento  FROM alojamientos a, informaciongeneral i 
WHERE i.ID_InformacionGeneral=a.ID_InformacionGeneral AND (a.ID_TipoAlojamiento='%s' OR a.ID_TipoAlojamientoSub ='%s') AND a.Activo ='A'   ORDER BY RAND()
LIMIT %s, %s ",$tipo,$tipo, $star, $end);
$rowsL=$this->db->query($query);
$rowsL=$rowsL->result_array();

return $rowsL;
	}

	function habitaciones ($id_alojar, $llegada, $salida){
	//OBTENDO 	 HABITAICON
		$query= sprintf("Select * from alojamientos_habitaciones  where ID_Alojamiento='%s'  ",$id_alojar);
		$rowsAH=$this->db->query($query);
		$rowsAH=$rowsAH->result_array();
		

	//OBTENGO DATOS TARIFAS X HABITACION
		if (count($rowsAH)>0) {
			# code...
	
		foreach ($rowsAH as $var2) {
		$query2= sprintf("
		SELECT h.NombreHab,h.UnidadAlojativa, h.PaxMax, d.Desayuno, th.TipoHabitacion,  Sum( c.tarifa_normal ) AS totalN, Sum( IF( c.tarifa_oferta, tarifa_oferta, tarifa_normal ) ) AS totalM
		FROM habitaciones h, cal_calendario c, tipo_desayunos d, tipo_habitaciones th
		WHERE c.id_habitacion = '%s'
		AND c.id_habitacion = h.ID_Habitacion
		AND c.tarifa_normal > '0'
		AND c.fecha >= '%s'
		AND c.fecha < '%s'
		AND d.ID_Desayuno = h.ID_Desayuno
		AND th.ID_TipoHabitacion = h.ID_TipoHabitacion
		GROUP BY h.ID_Habitacion"
		,$var2['ID_Habitacion'],$llegada, $salida);
		$rowsH=$this->db->query($query2);
		$rowsH=$rowsH->row_array();
		
		$habitacion[$var2['ID_Habitacion']]=$rowsH;

		} return $habitacion;
			} else {}

		
	}

	function localidad($id_localidad) 
	{
		$query2= sprintf("Select Localidad from localidades where ID_Localidades='%s'",$id_localidad);
		$rowsL=$this->db->query($query2);
		$rowsL=$rowsL->row_array();
		return $rowsL['Localidad'];
	}



	function detalleA($ID) {

$query= sprintf("Select *  FROM alojamientos a, informaciongeneral i, tipoalojamiento t WHERE a.ID_Alojamiento='%s' AND i.ID_InformacionGeneral=a.ID_InformacionGeneral and t.ID_TipoAlojamiento=a.ID_TipoAlojamiento",$ID);
$rowsAl=$this->db->query($query);
$rows_D =$rowsAl->row_array();

return $rows_D;
	}
	function habitacionesD ($id_alojar,$llegada, $salida){
	//OBTENDO 	 HABITAICON
		$query= sprintf("Select * from alojamientos_habitaciones  where ID_Alojamiento='%s'  ",$id_alojar);
		$rowsAH=$this->db->query($query);
		$rowsAH=$rowsAH->result_array();
		

	//OBTENGO DATOS TARIFAS X HABITACION
		if (count($rowsAH)>0) {
			# code...
	
		foreach ($rowsAH as $var2) {
		$query2= sprintf("
		SELECT h.NombreHab,h.UnidadAlojativa, h.PaxMax, d.Desayuno, th.TipoHabitacion,  Sum( c.tarifa_normal ) AS totalN, Sum( IF( c.tarifa_oferta, c.tarifa_oferta, c.tarifa_normal ) ) AS totalM,
		min(c.cant_disponible ) as minD, h.ID_Habitacion
		FROM habitaciones h, cal_calendario c, tipo_desayunos d, tipo_habitaciones th
		WHERE c.id_habitacion = '%s'
		AND c.id_habitacion = h.ID_Habitacion
		AND c.tarifa_normal > '0'
		AND c.fecha >= '%s'
		AND c.fecha < '%s'
		AND d.ID_Desayuno = h.ID_Desayuno
		AND th.ID_TipoHabitacion = h.ID_TipoHabitacion
		GROUP BY h.ID_Habitacion"
		,$var2['ID_Habitacion'],$llegada, $salida);
		$rowsH=$this->db->query($query2);
		$rowsH=$rowsH->row_array();
		$habitacion[$var2['ID_Habitacion']]=$rowsH;

		}
			} else {$habitacion=NULL;}

		return $habitacion;
	}

	function fotosDet ($ID)
	{
						$query =sprintf( "Select *  FROM alojamientos_imagenes  WHERE ID_Alojamiento= '%s' ORDER BY NombreImagen ASC ",$ID);	
						$rows  =$this->db->query($query);
						$rows  =$rows->result_array();
	return $rows;
	}
	function serviciosDet ($ID) 
			{
				$query=sprintf( "Select *  FROM alojamientos_servicios a, servicios s  WHERE ID_Alojamiento= '%s' AND a.ID_Servicio=s.ID_Servicio ",$ID);	
				$rows=$this->db->query($query);
				$rows =$rows->result_array();
				return $rows;
			}
	function imagenHab ($ID) 
			{
				$query=sprintf( "Select *  FROM habitaciones_imagenes  WHERE ID_Habitacion= '%s' ",$ID);	
				$rows=$this->db->query($query);
				$rows =$rows->result_array();
				return $rows;
			}
	// DATOS DE LA HABITACION
			function detalleHab ($ID) 
			{
				$query=sprintf( "Select *  FROM habitaciones h, tipo_habitaciones th WHERE h.ID_Habitacion= '%s' AND th.ID_TipoHabitacion = h.ID_TipoHabitacion ",$ID);	
				$rows=$this->db->query($query);
				$rows =$rows->row_array();
				return $rows;
			}
			function metodopago ($ID_MP) 
			{
				$query=sprintf( "Select *  FROM metododepago Where ID_MP=%s ",$ID_MP);	
				$rows=$this->db->query($query);
				$rows =$rows->row_array();
				return $rows;
			}
}
 ?>