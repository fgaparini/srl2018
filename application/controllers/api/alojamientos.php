<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alojamientos extends CI_Controller {


	

	public function __construct()
	{
		parent::__construct();

        $this->load->model('admin/alojamientos_model');
		$this->load->model("website/dblistado");
		$this->load->model("website/dbfichas");
		$this->load->config('avanbook_config');

	
	}


	public function get_alojar($tipo){
		header ( 'Access-Control-Allow-Origin: *' ); 

		$tipos=$tipo;
		if ($tipos==1) {$tipos2=4;} else {	$tipos2="0";}
		
		$start=0;
		$porpagina =100;
		//OBENGO ALOJAMIENTOS PARA LISTADO
		$listado=$this->dblistado->listar_api($tipos,$tipos2,$start,$porpagina);
		
		// retrono y parseo a json
		echo json_encode($listado);
		

	
	}

	// FICHA ALOJAMIENTOS
	public function fichasAlojar ($id){		
		header ( 'Access-Control-Allow-Origin: *' ); 
		header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
		$this->load->driver('cache');
 		$this->cache->clean();
 			header ( 'Access-Control-Allow-Origin: *' ); 
			//OBTENGO ALOJAMIENTO
			$queryAl= sprintf("Select 
					i.Nombre,i.Coordenadas,
					 ia.TelefonoAPP,
					 a.App_tipo,Telefono,a.Basico,ia.EmailAPP Email,
					 ia.DescripcionAPP Descripcion,
					 i.Direccion,a.Url,i.WebSite,
					 a.ID_Alojamiento 
					 FROM 
					 alojamientos a,
					 informaciongeneral i,
					 tipoalojamiento t,
					 informacionapp ia 
					 WHERE 
					 a.ID_Alojamiento=%s 
					AND i.ID_InformacionGeneral= a.ID_Alojamiento 
					AND t.ID_TipoAlojamiento=a.ID_TipoAlojamiento 
					AND ia.ID_Informacionapp =  a.ID_Alojamiento",$id);
			$rowsAl=$this->db->query($queryAl);
			$result_Al =$rowsAl->row_array();
			
			if (count($result_Al)>0) {
			# code...
			
			// FOTOS ALOKAR 
			$id_Al=$result_Al['ID_Alojamiento'];
			
			$fotos_alojar=$this->dbfichas->fotosal($id_Al);
			// SERVICIOS ALOJAR
			$servicios_alojar=$this->dbfichas->servicios($id_Al);
			
			$result_Al["servicios"]= $servicios_alojar;
			$result_Al["fotos"]= $fotos_alojar;
			
			echo json_encode($result_Al);

			}
	}

public function tipoalojamiento_list(){
	 			header ( 'Access-Control-Allow-Origin: *' ); 

        $query="select 
                ID_TipoAlojamiento,TipoAlojamiento, TituloAlojamiento
                from
                tipoalojamiento
                ";
        
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        echo "<pre>";
        echo json_encode($rows);
        echo "</pre>";
    }


public function imagenAlojar(){
 			header ( 'Access-Control-Allow-Origin: *' ); 

	$id_alojamiento = $_POST['id'];
	$nombreImagen = $_POST['nombreImagen'];
	if (!empty($_FILES)) {
    //$nombre = $_POST['nombre'];
    $file = $_FILES['file']['tmp_name'];
   
    //$path =$this->config->item('upload_path').$id."_".$nombreImagen.".jpg";
   //imagen
   $image_name   = $this->config->item('upload_path') . $id_alojamiento . "_" . $nombreImagen . ".jpg";
   //thumb grande del alojamiento
   $thumb_grande = $this->config->item('upload_path_thumb') . $id_alojamiento . "_" . $nombreImagen . "_p" . ".jpg";
   //thumb chico Alojamiento
   $thumb_chica  = $this->config->item('upload_path_thumb') . $id_alojamiento . "_" . $nombreImagen . ".jpg";

    $image      = ImageCreateFromJPEG($file);
                        //ancho
    $width      = imagesx($image);
    //alto imagen
    $height     = imagesy($image);
    //nuevo ancho imagen
    $new_width  = 850;
    //calcular alto 
    $new_height = ($new_width * $height) / $width;
    //crear imagen nueva
    $thumb      = imagecreatetruecolor($new_width, $new_height);
    //redimensiono
    imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    //Guardo imagen final 
    ImageJPEG($thumb, $image_name);

    //Thumb
    //nuevo ancho imagen
    $new_width  = 180;
    //calcular alto 
    $new_height = ($new_width * $height) / $width;
    //crear imagen nueva
    $thumb      = imagecreatetruecolor($new_width, $new_height);
    //redimensiono
    imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    //Guardo imagen final 
    ImageJPEG($thumb, $thumb_chica);

    if ( $nombreImagen == '1')
    {
        //Thumprincipal
        //nuevo ancho imagen
        $new_height = 350;
        //calcular alto 
        $new_width  = ($new_height * $width) / $height;
        //crear imagen nueva
        $thumb      = imagecreatetruecolor($new_width, $new_height);
        //redimensiono
        imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        //Guardo imagen final 
        ImageJPEG($thumb, $thumb_grande);
    }
$this->alojamientos_model->images_save($id_alojamiento, $nombreImagen);
 //    move_uploaded_file($tempPath, $path);

 //    $answer = array('answer' => 'File transfer completed');
    
 //    $json = json_encode($answer);
    
 //    echo $json;
	    
	// } else {

	//     echo 'No files';
	// }


}
}
public function prueba(){
	echo $this->alojamientos_model->images_save(135, 5);

	}
}/* End of file home.php */
/* Location: ./application/controllers/home.php */

?>