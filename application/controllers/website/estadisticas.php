<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadisticas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function contador($tcliente,$tipo,$id)
	{
	/*
if ($tipo=="web" && $tcliente=="alojar")
	{$tipo2='Website';}
elseif ($tipo=="web" && $tcliente=="empresa") 
	{$tipo2='Url';}
else 
	{$tipo2=$tipo;}

	$queryAl= sprintf("Select i.'web' FROM alojamientos a, informaciongeneral i WHERE a.ID_Alojamiento='4' AND a.ID_InformacionGeneral=i.ID_InformacionGeneral ",$tipo,$id);
	$rowsAl=$this->db->query($queryAl);
	$rows_Al =$rowsAl->row_array();

	echo $rows_Al[$tipo2];
	exit();*/

	$url= $this->input->get('dir');
	$this->fag->estadisticas ($tipo,$id,$url,$tcliente);



}

}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
?>