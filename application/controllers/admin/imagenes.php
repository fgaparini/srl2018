<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Imagenes extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/im_model');
        $this->load->model('admin/it_model');
        $this->load->config('avanbook_config');
    }

    function lists($im_id_imagen_tipo)
    {
        $it_row                    = $this->it_model->find($im_id_imagen_tipo);
        $data['datos_array']       = $this->im_model->find_tipo($im_id_imagen_tipo);
        $data['im_id_imagen_tipo'] = $im_id_imagen_tipo;
        $data['it_nombre']         = $it_row['it_nombre'];
        $data['it_gral_upload']    = $it_row['it_gral_upload'];
        $data['it_thumb_upload']   = $it_row['it_thumb_upload'];
        $data['it_con_thumb']      = $it_row['it_con_thumb'];
        $data['title']             = "Listado imagenes";
        $data['view']              = "admin/imagenes/imagenes_list";
        $data['js'] = array('js/admin/imagenes_list','js/blockui-master/jquery.blockUI');
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function save()
    {

        $im_id_imagen      = $this->input->post('im_id_imagen');
        $im_id_imagen_tipo = $this->input->post('im_id_imagen_tipo');
        $tipo              = $this->input->post('tipo');

        $ti_row = $this->it_model->find($im_id_imagen_tipo);

        if (isset($_FILES['filesToUpload']['tmp_name']))
        {
            if (count($_FILES['filesToUpload']['tmp_name']))
            {
                foreach ($_FILES['filesToUpload']['tmp_name'] as $file)
                {
                    $image_name    = "";
                    $thumb_chica   = "";
                    $numero_imagen = 0;
                    if ($tipo == 'foto_comun')
                    {
                        $numero_imagen = $im_id_imagen;
                        $image_name    = $this->config->item('base_hosting') . $ti_row['it_gral_upload'] . $im_id_imagen . ".jpg";
                        $thumb_chica   = $this->config->item('base_hosting') . $ti_row['it_thumb_upload'] . $im_id_imagen . ".jpg";
                    }
                    elseif ($tipo == 'foto_mas')
                    {
                        $cant_tipo     = $this->im_model->count_tipo($im_id_imagen_tipo);
                        $numero_imagen = $cant_tipo + 1;

                        $image_name  = $this->config->item('base_hosting') . $ti_row['it_gral_upload'] . $numero_imagen . ".jpg";
                        $thumb_chica = $this->config->item('base_hosting') . $ti_row['it_thumb_upload'] . $numero_imagen . ".jpg";
                    }

                    $image      = ImageCreateFromJPEG($file);
                    //ancho
                    $width      = imagesx($image);
                    //alto imagen
                    $height     = imagesy($image);
                    //nuevo ancho imagen
                    $new_width  = $ti_row['it_ancho'];
                    //calcular alto 
                    $new_height = ($new_width * $height) / $width;
                    //crear imagen nueva
                    $thumb      = imagecreatetruecolor($new_width, $new_height);
                    //redimensiono
                    imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                    //Guardo imagen final 
                    ImageJPEG($thumb, $image_name);

                    if ($ti_row['it_con_thumb'] == 'si')
                    {
                        //Thumb
                        //nuevo ancho imagen
                        $new_width  = $ti_row['it_ancho_thumb'];
                        //calcular alto 
                        $new_height = ($new_width * $height) / $width;
                        //crear imagen nueva
                        $thumb      = imagecreatetruecolor($new_width, $new_height);
                        //redimensiono
                        imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                        //Guardo imagen final 
                        ImageJPEG($thumb, $thumb_chica);
                    }

                    if ($tipo == 'foto_mas')
                    {
                        $datos_array = array(
                            'im_id_imagen'      => $numero_imagen,
                            'im_id_imagen_tipo' => $im_id_imagen_tipo
                        );

                        $this->im_model->insert($datos_array);
                    }
                }
            }
        }
        redirect(base_url() . 'admin/imagenes/lists/' . $im_id_imagen_tipo . "/", 'refresh');
    }

    function delete($im_id_imagen = 0)
    {
        $im_id_imagen_tipo = $this->input->get('im_id_imagen_tipo');
        $it_row            = $this->it_model->find($im_id_imagen_tipo);
        $file_image        = $this->config->item('base_hosting') . $it_row['it_gral_upload']  . $im_id_imagen . ".jpg";
        $file_image_thumb  = $this->config->item('base_hosting') . $it_row['it_thumb_upload'] . $im_id_imagen . ".jpg";

        if (is_file($file_image))
            unlink($file_image);

        if (is_file($file_image_thumb))
            unlink($file_image_thumb);

        $this->im_model->delete($im_id_imagen);

        redirect(base_url() . 'admin/imagenes/lists/' . $im_id_imagen_tipo . "/", 'refresh');
    }

    //Guardar la descripcion de imagenes por ajax
    function ajax_descripcion()
    {
        $im_id_imagen      = $this->input->post('im_id_imagen');
        $im_descripcion    = $this->input->post('im_descripcion');
        $im_id_imagen_tipo = $this->input->post('im_id_imagen_tipo');

        $return = $this->im_model->upload_des($im_id_imagen, $im_id_imagen_tipo, $im_descripcion);

        $array = array("result" => $return);
        echo json_encode($array);
    }

}

?>
