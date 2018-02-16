<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresas extends CI_Controller {

public function __construct()
	{
		parent::__construct();

		$this->load->model("website/dbempresas");
		$this->load->model("website/dbfichas");
		$this->load->model("admin/empresas_model");
		$this->load->config('avanbook_config');

    }
	

  
    //Listo subtipo empresas
    //@paramenter = IdTipo
	public function listarsubtipo($idtipo) {
header ( 'Access-Control-Allow-Origin: *' ); 
		$subtipos = $this->dbempresas->listarsubtipo($idtipo);
		echo json_encode($subtipos);

	}
	
	//Listo Tipo empresas
	public function listarTipoempresas(){
header ( 'Access-Control-Allow-Origin: *' ); 
		$tipoempresas = $this->dbempresas->listarTipoEmpresas();
		//header("Content-type: application/json; charset=utf-8");
		// print_r($tipoempresas);
		 echo json_encode($tipoempresas);
		
	}

	//Listo Empresas
	//@paramenter = IdSub
	public function listarempresas($idsub){
header ( 'Access-Control-Allow-Origin: *' ); 
		$empresas = $this->dbempresas->listar_empresas($idsub);
		//header("Content-type: application/json; charset=utf-8");
		echo json_encode($empresas);
		
	}

        public function caminosvino(){
        header ( 'Access-Control-Allow-Origin: *' ); 
        $empresas = $this->dbempresas->caminosvino();
        //header("Content-type: application/json; charset=utf-8");
        foreach ($empresas as $key=> $value) {
          
            $bodegas = $this->dbempresas->bodegas_data($value["bodega_id"]);
           // print_r($empresas[$key]);
           // exit();
           $empresas[$key]["bodega_data"] = $bodegas[0];
        }
        echo json_encode($empresas);
        
    }
	public function empresa($id){
		header ( 'Access-Control-Allow-Origin: *' ); 
		$this->load->driver('cache');
 			$this->cache->clean();

		$empresa = $this->dbempresas->detalle_empresa($id);

		$imgsEmpresa=$this->dbfichas->imagenesempresa($id);
		$empresa['fotos']=$imgsEmpresa['rows'];
		
		//header("Content-type: application/json; charset=utf-8");
		echo json_encode($empresa);
		
	}
        public function empresavino($id){
        header ( 'Access-Control-Allow-Origin: *' ); 
        $this->load->driver('cache');
            $this->cache->clean();

        $empresa = $this->dbempresas->detalle_empresa_vino($id);

        $imgsEmpresa=$this->dbfichas->imagenesempresa($id);
        $empresa['fotos']=$imgsEmpresa['rows'];
        
        //header("Content-type: application/json; charset=utf-8");
        echo json_encode($empresa);
        
    }

	public function BuscarPorTipoPublica($tipoPublica,$limite=0){

header ( 'Access-Control-Allow-Origin: *' ); 
		$empresa = $this->dbempresas->buscarPorTipoPublica($tipoPublica,$limite);
		//header("Content-type: application/json; charset=utf-8");
		echo json_encode($empresa);
		
	}

public function imagenEmpresa(){
header ( 'Access-Control-Allow-Origin: *' ); 
	$id = $_POST['id'];
	$nombreImagen = $_POST['nombreImagen'];
	if (!empty($_FILES)) {
    //$nombre = $_POST['nombre'];
    $file = $_FILES['file']['tmp_name'];
   
    //$path =$this->config->item('upload_path').$id."_".$nombreImagen.".jpg";
   //imagen

   $image_name   = $this->config->item('upload_path_emp') . $id . "_" . $nombreImagen . ".jpg";
   //thumb grande del alojamiento
   $thumb_grande = $this->config->item('upload_path_emp_thumb') . $id . "_" . $nombreImagen . "_p" . ".jpg";
   //thumb chico Alojamiento
   $thumb_chica  = $this->config->item('upload_path_emp_thumb') . $id . "_" . $nombreImagen . ".jpg";

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

$this->empresas_model->empresas_images_save($id, $nombreImagen);
echo $id.",".$nombreImagen;


}
}



}/* End of file home.php */
/* Location: ./application/controllers/home.php */

?>