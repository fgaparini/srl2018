<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Videos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/videos_model');
        $this->load->library('gf');
    }

    function index()
    {
        $this->lists();
    }

    function form($id = 0)
    {
        
        $cantidad = $this->videos_model->count($id);
        //Variables tabla
        $data['ID_Video'] = & $ID_Video;
        $data['NombreVideo'] = & $NombreVideo;
        $data['DesVideo'] = & $DesVideo;
        $data['UrlVideo'] = & $UrlVideo;
        $data['thumbVideo'] = & $thumbVideo;
        

        //Variables a pasar segun la vista
        $data['title'] = & $title;
        $data['accion'] = & $accion;

        //Si es mayor a 0 es editar
        if ($cantidad > 0)
        {
            $row = $this->videos_model->find($id);
            $ID_Video = $row['ID_Video'];
            $NombreVideo = $row['NombreVideo'];
            $DesVideo = $row['DesVideo'];
            $UrlVideo = $row['UrlVideo'];
            $thumbVideo = $row['thumbVideo'];
            $title = "Editar Video";
            $accion = "editar";
        }
        else
        {
            $title = "Nueva color página";
            $accion = "crear";
        }

        $data['view'] = "admin/videos/videos_form";
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function save()
    {
        
        $ID_Video = $this->input->post('ID_Video');
        $NombreVideo = $this->input->post('NombreVideo');
        $DesVideo = $this->input->post('DesVideo');
        $UrlVideo = $this->input->post('UrlVideo');
        $thumbVideo = $this->input->post('thumbVideo');
        $accion = $this->input->post('accion');

        $datos_array = array(
            'NombreVideo' => $NombreVideo,
            'DesVideo' => $DesVideo,
            'UrlVideo' => $UrlVideo,
            'thumbVideo' => $thumbVideo
        );

        if ($accion == 'crear')
        {
            $this->videos_model->insert($datos_array);
            redirect(base_url() . 'admin/videos/lists/', 'refresh');
        }
        elseif ($accion == 'editar')
        {
            $this->videos_model->update($ID_Video, $datos_array);
            redirect(base_url() . 'admin/videos/lists/', 'refresh');
        }
        else
        {
            echo "error";
            exit();
        }
    }
    
    function lists()
    {
        $data['datos_array'] = $this->videos_model->find_all();
        $data['title'] = "Listado videos";
        $data['view'] = "admin/videos/videos_list";
        $data['js'] = array('js/blockui-master/jquery.blockUI');
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function delete($id)
    {
        $this->videos_model->delete($id);
        redirect(base_url() . 'admin/videos/lists/', 'refresh');
    }

}

?>