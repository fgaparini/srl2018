<?php 

/**
* 
*/
class Dbfichas extends CI_Model
{
function tipoalojar ($url)
	{
				$query= sprintf("Select * FROM tipoalojamiento WHERE ID_TipoAlojamiento ='%s'",$url);
				$rows=$this->db->query($query);
				$rows =$rows->row_array();
				return $rows;
	}	

function fichaal ($url) {
							$queryAl= sprintf("Select *  FROM alojamientos a, informaciongeneral i, tipoalojamiento t WHERE a.Url='%s' AND a.ID_InformacionGeneral=i.ID_InformacionGeneral and a.ID_TipoAlojamiento=t.ID_TipoAlojamiento",$url);
							$rowsAl=$this->db->query($queryAl);
							$rows_Al =$rowsAl->row_array();
							
							return $rows_Al;
						}
function fichaname ($name) {
							$queryAl= sprintf("Select *  FROM alojamientos a, informaciongeneral i, tipoalojamiento t WHERE i.Nombre='%s' AND a.ID_InformacionGeneral=i.ID_InformacionGeneral and a.ID_TipoAlojamiento=t.ID_TipoAlojamiento",$name);
							$rowsAl=$this->db->query($queryAl);
							$rows_Al =$rowsAl->row_array();
							
							return $rows_Al;
						}

function fotosal ($ID) {
						$query =sprintf( "Select *  FROM alojamientos_imagenes  WHERE ID_Alojamiento= '%s' ORDER BY NombreImagen ASC ",$ID);	
						$rows  =$this->db->query($query);
						$rows  =$rows->result_array();
return $rows;
}

function servicios ($ID) {
				$query=sprintf( "Select *  FROM alojamientos_servicios a, servicios s  WHERE ID_Alojamiento= '%s' AND a.ID_Servicio=s.ID_Servicio ",$ID);	
				$rows=$this->db->query($query);
				$rows =$rows->result_array();
return $rows;
}

// FICHAS EMPRESAS

function localidad ($ID) {
				$query=sprintf( "Select *  FROM localidades  WHERE ID_Localidades='%s' ",$ID);	
				$rows=$this->db->query($query);
				$rows =$rows->row_array();
return $rows;
}

function empresas ($url) {


$query= sprintf("Select * From empresas WHERE Url='%s'",$url);
$rows=$this->db->query($query);
$totalrows=$rows->num_rows();
$rows =$rows->row_array();
$results=array("rows"=>$rows, "totals"=>$totalrows);
return $results;
}

function imagenesempresa ($id_empresa) {
$query= sprintf("Select * From empresas_imagenesemp WHERE ID_Empresa='%s'",$id_empresa);
$rows=$this->db->query($query);
$totalrows=$rows->num_rows();
$rows =$rows->result_array();
$results=array("rows"=>$rows, "totals"=>$totalrows);
return $results;
}

function subtiposemp ($subtipo) {
$query= sprintf("Select * From subtipoempresa WHERE SubtipoEmpresa='%s'",$subtipo);
$rows=$this->db->query($query);

$rows =$rows->row_array();

return $rows;


}

function getpromos($id)
{
	$hoy=date('Y-m-d');
$query= sprintf(" Select * from promociones Where ID_Alojamiento = '%s' AND HastaPromo >='%s' ",$id,$hoy);
$rows=$this->db->query($query);
$rows =$rows->result_array();
return $rows;
}

// API WEB SERVICES --------------------------------

function listarempresas ($ID_TipoEmp,$ID_Subemp) {


$query= sprintf(" Select * From empresas where ID_TipoEmpresa=%s and ID_SubtipoEmpresa=%s",$ID_TipoEmp,$ID_Subemp);
$rows=$this->db->query($query);
$rows =$rows->result_array();
return $rows;
}


}


 ?>