<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Imagenes_tipo extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/it_model');
        $this->load->model('admin/im_model');
        $this->load->library('gf');
        $this->load->config('avanbook_config');
    }

    function index()
    {
        $this->lists();
    }

    function form($id = 0)
    {
        $cantidad                  = $this->it_model->count($id);
        //Variables tabla
        $data['it_id_imagen_tipo'] = & $it_id_imagen_tipo;
        $data['it_nombre']         = & $it_nombre;
        $data['it_descripcion']    = & $it_descripcion;

        $data['it_gral_upload']  = & $it_gral_upload;
        $data['it_thumb_upload'] = & $it_thumb_upload;

        $data['it_ancho'] = & $it_ancho;
        $data['it_largo'] = & $it_largo;

        $data['it_ancho_thumb'] = & $it_ancho_thumb;
        $data['it_largo_thumb'] = & $it_largo_thumb;

        $data['it_con_thumb'] = & $it_con_thumb;


        //Variables a pasar segun la vista
        $data['title']  = & $title;
        $data['accion'] = & $accion;

        //Si es mayor a 0 es editar
        if ($cantidad > 0)
        {
            $row               = $this->it_model->find($id);
            $it_id_imagen_tipo = $row['it_id_imagen_tipo'];
            $it_nombre         = $row['it_nombre'];
            $it_descripcion    = $row['it_descripcion'];

            $it_gral_upload  = $row['it_gral_upload'];
            $it_thumb_upload = $row['it_thumb_upload'];

            $it_ancho = $row['it_ancho'];
            $it_largo = $row['it_largo'];

            $it_ancho_thumb = $row['it_ancho_thumb'];
            $it_largo_thumb = $row['it_largo_thumb'];

            $it_con_thumb = $row['it_con_thumb'];


            $title  = "Editar tipo imagen";
            $accion = "editar";
        }
        else
        {
            $title  = "Nueva tipo imagen";
            $accion = "crear";
        }

        $data['view'] = "admin/imagenes_tipo/imagenes_tipo_form";
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function save()
    {
        $it_id_imagen_tipo = $this->input->post('it_id_imagen_tipo');
        $it_nombre         = $this->input->post('it_nombre');
        $it_descripcion    = $this->input->post('it_descripcion');

        $it_gral_upload  = $this->input->post('it_gral_upload');
        $it_thumb_upload = $this->input->post('it_thumb_upload');

        $it_ancho = $this->input->post('it_ancho');
        $it_largo = $this->input->post('it_largo');

        $it_ancho_thumb = $this->input->post('it_ancho_thumb');
        $it_largo_thumb = $this->input->post('it_largo_thumb');

        $it_con_thumb = $this->input->post('it_con_thumb');

        $accion      = $this->input->post('accion');
        $datos_array = array(
            'it_nombre'       => $it_nombre,
            'it_descripcion'  => $it_descripcion,
            'it_gral_upload'  => $it_gral_upload,
            'it_thumb_upload' => $it_thumb_upload,
            'it_ancho'        => $it_ancho,
            'it_largo'        => $it_largo,
            'it_ancho_thumb'  => $it_ancho_thumb,
            'it_largo_thumb'  => $it_largo_thumb,
            'it_con_thumb'    => $it_con_thumb,
        );

        if ($accion == 'crear')
        {
            //Crear el directorio para subir imagenes de esta seccion
            $upload_directory       = $this->config->item('base_hosting') . $it_gral_upload;
            $upload_directory_thumb = $this->config->item('base_hosting') . $it_thumb_upload;

            if ($it_con_thumb == 'si')
            {
                mkdir($upload_directory, 0777,true);
                mkdir($upload_directory_thumb, 0777,true);
            }
            else
            {
                mkdir($upload_directory, 0777,true);
            }
            
            $this->it_model->insert($datos_array);
            redirect(base_url() . 'admin/imagenes_tipo/lists/', 'refresh');
        }
        elseif ($accion == 'editar')
        {
            $upload_directory_thumb = $this->config->item('base_hosting') . $it_thumb_upload;
            if ($it_con_thumb == 'si')
            {
                if(!is_dir($upload_directory_thumb))
                mkdir($upload_directory_thumb, 0777,true);
            }
            else
            {
                if(is_dir($upload_directory_thumb))
                    rmdir($upload_directory_thumb);
            }
            
            $this->it_model->update($it_id_imagen_tipo, $datos_array);
            redirect(base_url() . 'admin/imagenes_tipo/lists/', 'refresh');
        }
        else
        {
            echo "error";
            exit();
        }
    }

    function lists()
    {
        $data['datos_array'] = $this->it_model->find_all();
        $data['title']       = "Listado imagenes_tipo";
        $data['view']        = "admin/imagenes_tipo/imagenes_tipo_list";
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function delete($id)
    {
        $row                    = $this->it_model->find($id);
        $upload_directory       = $this->config->item('base_hosting') . $row['it_gral_upload'];
        $upload_directory_thumb = $this->config->item('base_hosting') . $row['it_thumb_upload'];

        //Borrar las carpetas recursivamente
        if (is_dir($upload_directory))
            $this->gf->borrar_carpeta($upload_directory);
        if (is_dir($upload_directory_thumb))
            $this->gf->borrar_carpeta($upload_directory_thumb);

        //Borro todas las imagenes que queden guardadas en la tabla con ese tipo
        $this->im_model->delete_all_tipo($id);
        //Borro el tipo de la tabla imagenes_tipo
        $this->it_model->delete($id);
        //redirecciona
        redirect(base_url() . 'admin/imagenes_tipo/lists/', 'refresh');
    }

}

?>