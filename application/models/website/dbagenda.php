<?php 

/**
* 
*/
class Dbagenda extends CI_Model
{
	

function agendaimg ($id_agenda) {


$query= sprintf("Select * From agendas_imagenesage WHERE  ID_Agenda='%s'  ",$id_agenda);
$rows=$this->db->query($query);
$rows =$rows->result_array();

return $rows;
}

}


 ?>