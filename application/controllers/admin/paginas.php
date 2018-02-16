<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Paginas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/paginas_model');
        $this->load->config('avanbook_config');
        $this->load->library('gf');
    }

    function index()
    {
        $this->lists();
    }

    function lists()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $data['paginas_array'] = $this->paginas_model->paginas_list();
        $data['title']         = "Listado Páginas";
        $data['js']            = array('js/admin/paginas_lists');
        $data['view'] = 'admin/paginas/paginas_list';
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function view($id_pagina = 0)
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $query_rows = $this->paginas_model->paginas_find($id_pagina);
        $row        = $query_rows->row();
        if ($query_rows->num_rows() == 0)
        {
            echo "esta pagina no existe";
        }
        else
        {
            $data['ID_Pagina']       = $row->ID_Pagina;
            $data['MetaTitulo']      = $row->MetaTitulo;
            $data['MetaDescripcion'] = $row->MetaDescripcion;
            $data['Keywords']        = $row->Keywords;
            $data['TituloContenido'] = $row->TituloContenido;
            $data['Contenido']       = $row->Contenido;
            $data['Subtitulo']       = $row->Subtitulo;
            $data['Url']             = $row->Url;
            $data['title']           = $row->TituloContenido;
            $data['keywords']        = $row->Keywords;
            $data['description']     = $row->MetaDescripcion;
            $data['js']              = array('js/admin/paginas_lists');
            $data['view'] = 'admin/paginas/paginas_view';
            $this->load->view('admin/templates/temp_menu', $data);
        }
    }

    function form($id_pagina = 0)
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['ID_Pagina']          = & $ID_Pagina;
        $data['MetaTitulo']         = & $MetaTitulo;
        $data['MetaDescripcion']    = & $MetaDescripcion;
        $data['Keywords']           = & $Keywords;
        $data['TituloContenido']    = & $TituloContenido;
        $data['Contenido']          = & $Contenido;
        $data['Subtitulo']          = & $Subtitulo;
        $data['Url']                = & $Url;
        $data['ID_TipoPagina']      = & $ID_TipoPagina;
        $data['ID_PaginaPrincipal'] = & $ID_PaginaPrincipal;
        $data['OrdenPagina']        = & $OrdenPagina;
        $data['DestaPagina']        = & $DestaPagina;

        $query_rows = $this->paginas_model->paginas_find($id_pagina);
        $row        = $query_rows->row();

        if ($query_rows->num_rows() == 0)
        {
            $data['title']  = 'Crear Página';
            $data['accion'] = 'crear';
            $OrdenPagina='top';
        }
        else
        {
            $data['title']  = 'Editar Página';
            $data['accion'] = 'editar';

            //Tabla paginas
            $ID_Pagina                  = $row->ID_Pagina;
            $MetaTitulo                 = $row->MetaTitulo;
            $MetaDescripcion            = $row->MetaDescripcion;
            $Keywords                   = $row->Keywords;
            $TituloContenido            = $row->TituloContenido;
            $Contenido                  = $row->Contenido;
            $Subtitulo                  = $row->Subtitulo;
            $Url                        = $row->Url;
            $ID_TipoPagina              = $row->ID_TipoPagina;
            $ID_PaginaPrincipal         = $row->ID_PaginaPrincipal;
            $OrdenPagina                = $row->OrdenPagina;
            $DestaPagina                = $row->DestaPagina;
        }
        $data['tipo_paginas_array'] = $this->paginas_model->tipo_pagina_list();
        $data['js']                 = array('js/ckeditor/ckeditor');
        $data['view'] = "admin/paginas/paginas_form";
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function form_interna()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $ID_Pagina=$this->input->get('ID_Pagina');
        $ID_TipoPagina=$this->input->get('ID_TipoPagina');
        
        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['ID_Pagina']          = "";
        $data['MetaTitulo']         = "";
        $data['MetaDescripcion']    = "";
        $data['Keywords']           = "";
        $data['TituloContenido']    = "";
        $data['Contenido']          = "";
        $data['Subtitulo']          = "";
        $data['Url']                = "";
        $data['ID_TipoPagina']      = $ID_TipoPagina;
        $data['ID_PaginaPrincipal'] = $ID_Pagina;
        $data['OrdenPagina']        = "interna";
        $data['DestaPagina']        = "";
        $data['title']              = 'Crear Página Interna';
        $data['accion']             = 'crear';
        $data['tipo_paginas_array'] = $this->paginas_model->tipo_pagina_list();
        $data['js']                 = array('js/ckeditor/ckeditor');
        $data['view'] = "admin/paginas/paginas_form";
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function save()
    {   
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $ID_Pagina=$this->input->post('ID_Pagina');
        $MetaTitulo=$this->input->post('MetaTitulo');
        $MetaDescripcion=$this->input->post('MetaDescripcion');
        $Keywords=$this->input->post('Keywords');
        $TituloContenido=$this->input->post('TituloContenido');
        $Contenido=$this->input->post('Contenido');
        $Subtitulo=$this->input->post('Subtitulo');
        $Url=$this->input->post('Url');
        $ID_TipoPagina=$this->input->post('ID_TipoPagina');
        $ID_PaginaPrincipal=$this->input->post('ID_PaginaPrincipal');
        $OrdenPagina=$this->input->post('OrdenPagina');
        $DestaPagina=$this->input->post('DestaPagina');
        
        $accion=$this->input->post("accion");
        $paginas_array = array(
            'MetaTitulo'      => $MetaTitulo,
            'MetaDescripcion' => $MetaDescripcion,
            'Keywords'        => $Keywords,
            'TituloContenido' => $TituloContenido,
            'Contenido'       => $Contenido,
            'Subtitulo'       => $Subtitulo,
            'Url'             => $Url,
            'ID_TipoPagina'   => $ID_TipoPagina,
            'ID_PaginaPrincipal' => $ID_PaginaPrincipal,
            'OrdenPagina' => $OrdenPagina,
            'DestaPagina' => $DestaPagina
        );

        if($OrdenPagina=='interna')
        {
            $this->paginas_model->update_pagina_principal_top($ID_PaginaPrincipal);
        }
        
        if ($accion == 'crear')
        {
            $this->paginas_model->insert('paginas', $paginas_array);
        }
        elseif ($accion == 'editar')
        {
            $this->paginas_model->update($ID_Pagina, $paginas_array, 'ID_Pagina', 'paginas');
        }

        redirect(base_url() . 'admin/paginas/lists/', 'refresh');
    }

    function paginas_imagenes_list($id_pagina)
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        //$data['js'] = array('js/empresas_publicidad_list');
        $row                            = $this->paginas_model->paginas_find($id_pagina);
        $row                            = $row->row();
        $data['TituloContenido']        = $row->TituloContenido;
        $data['ID_Pagina']              = $row->ID_Pagina;
        $data['paginas_imagenes_array'] = $this->paginas_model->paginas_imagenes_list($id_pagina);
        $data['title']                  = 'Paginas Imagenes';
        $data['js']                     = array('js/admin/paginas_imagenes_list', 'js/blockui-master/jquery.blockUI');
        $data['view'] = 'admin/paginas/paginas_imagenes_list';
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function paginas_imagenes_list_slider($id_pagina)
    {

        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        //$data['js'] = array('js/empresas_publicidad_list');
        $row                            = $this->paginas_model->paginas_find($id_pagina);
        $row                            = $row->row();
        $data['TituloContenido']        = $row->TituloContenido;
        $data['ID_Pagina']              = $row->ID_Pagina;
        $data['paginas_imagenes_array'] = $this->paginas_model->paginas_imagenes_list_slider($id_pagina);
        $data['title']                  = 'Paginas Imagenes';
        // echo "hola";
        // exit();
        $data['js']                     = array('js/admin/paginas_imagenes_list', 'js/blockui-master/jquery.blockUI');
        $data['view'] = 'admin/paginas/paginas_imagenes_list_slider';
        $this->load->view('admin/templates/temp_menu', $data);
    }

    //Funciones para guardar muchas imagenes
    function paginas_imagenes_save()
    {
        
        ini_set("memory_limit", "1000M");
        ini_set("max_execution_time", "10800");
        ini_set("upload_max_filesize", "100M");
        ini_set("file_uploads", "500");
        
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $id_pagina     = $this->input->post('ID_Pagina');
        $tipo          = $this->input->post('tipo');
        $nombre_imagen = $this->input->post('foto_numero');
        $tipo_gal = $this->input->post('tipo_gal');

        $cantidad_fotos = 0;

        if (isset($_FILES['filesToUpload']['tmp_name']))
        {
            if (count($_FILES['filesToUpload']['tmp_name']))
            {

                //Borrar las imagenes de la tabla imagenes_alojamientos ya que se agregaran varias mas
                if ($tipo == 'foto_comun')
                    $this->paginas_model->paginas_images_delete_nombre_imagen($id_pagina, $nombre_imagen);
                elseif ($tipo == 'muchas_fotos')
                    $this->paginas_model->paginas_images_delete($id_pagina);

                $i = 0;
                foreach ($_FILES['filesToUpload']['tmp_name'] as $file)
                {

                    $i++;

                    $cantidad_fotos = $this->paginas_model->paginas_images_count($id_pagina);
                    $cantidad_fotos = $cantidad_fotos + 1;

                    if ($cantidad_fotos <= 20)
                    {

                        if ($tipo == 'muchas_fotos')
                        {
                            $image_name   = $this->config->item('upload_path_pag') . $id_pagina . "_" . $i . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $i . "_p" . ".jpg";
                            $thumb_chica  = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $i . ".jpg";
                        }
                        elseif ($tipo == 'foto_comun')
                        {
                            $image_name   = $this->config->item('upload_path_pag') . $id_pagina . "_" . $nombre_imagen . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $nombre_imagen . "_p" . ".jpg";
                            $thumb_chica  = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $nombre_imagen . ".jpg";

                        }
                        elseif ($tipo == 'foto_mas')
                        {
                            $image_name   = $this->config->item('upload_path_pag') . $id_pagina . "_" . $cantidad_fotos . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $cantidad_fotos . "_p" . ".jpg";
                            $thumb_chica  = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $cantidad_fotos . ".jpg";

                        }

                        
                                        $image      = ImageCreateFromJPEG($file);
                                        //ancho
                                        $width      = imagesx($image);
                                        //alto imagen
                                        $height     = imagesy($image);
                                        //nuevo ancho imagen
                                        $new_width  = 550;
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
                                        $new_width  = 100;
                                        //calcular alto 
                                        $new_height = ($new_width * $height) / $width;
                                        //crear imagen nueva
                                        $thumb      = imagecreatetruecolor($new_width, $new_height);
                                        //redimensiono
                                        imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                        //Guardo imagen final 
                                        ImageJPEG($thumb, $thumb_chica);

                                        if ($i == 1 or $cantidad_fotos == 1 or $nombre_imagen == '1')
                                        {
                                            //Thumprincipal
                                            //nuevo ancho imagen
                                            $new_height = 270;
                                            //calcular alto 
                                            $new_width  = ($new_height * $width) / $height;
                                            //crear imagen nueva
                                            $thumb      = imagecreatetruecolor($new_width, $new_height);
                                            //redimensiono
                                            imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                            //Guardo imagen final 
                                            ImageJPEG($thumb, $thumb_grande);
                                        }
                                       
                        
                       
                  
                        //Guardar imagenes en la table alojamientos_imagenes
                        if ($tipo == 'foto_comun')
                            $this->paginas_model->paginas_images_save($id_pagina, $nombre_imagen);
                        elseif ($tipo == 'muchas_fotos')
                            $this->paginas_model->paginas_images_save($id_pagina, $i);
                        elseif ($tipo == 'foto_mas')
                            $this->paginas_model->paginas_images_save($id_pagina, $cantidad_fotos);
                    }
                }
            }
        }
        redirect(base_url() . 'admin/paginas/paginas_imagenes_list/' . $id_pagina, 'refresh');
    }

 function paginas_imagenes_save_slider()
    {
        // print_r( $_FILES['filesToUpload']['tmp_name']);
        // exit();
        ini_set("memory_limit", "1000M");
        ini_set("max_execution_time", "10800");
        ini_set("upload_max_filesize", "100M");
        ini_set("file_uploads", "500");
        
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $id_pagina     = $this->input->post('ID_Pagina');
        $tipo          = $this->input->post('tipo');
        $nombre_imagen = $this->input->post('foto_numero');
        $tipo_gal = $this->input->post('tipo_gal');
        $yaxis=$this->input->post('yxial');
        $cantidad_fotos = 0;

        if (isset($_FILES['filesToUpload']['tmp_name']))
        {
            if (count($_FILES['filesToUpload']['tmp_name']))
            {

                //Borrar las imagenes de la tabla imagenes_alojamientos ya que se agregaran varias mas
                if ($tipo == 'foto_comun')
                    $this->paginas_model->paginas_images_delete_nombre_imagen_slider($id_pagina, $nombre_imagen);
                elseif ($tipo == 'muchas_fotos')
                    $this->paginas_model->paginas_images_delete($id_pagina);

                $i = 0;
                foreach ($_FILES['filesToUpload']['tmp_name'] as $file)
                {

                    $i++;

                    $cantidad_fotos = $this->paginas_model->paginas_images_count_slider($id_pagina);
                    $cantidad_fotos = $cantidad_fotos + 1;

                    if ($cantidad_fotos <= 20)
                    {

                        if ($tipo == 'muchas_fotos')
                        {
                            $image_name   = $this->config->item('upload_path_pag') . $id_pagina . "_" . $i . "_slider.jpg";
                            $image_name2   = $this->config->item('upload_path_pag') . $id_pagina . "_" . $i . "_slider.jpg";
                            $thumb_grande = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $i . "_p" . ".jpg";
                            $thumb_chica  = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $i . ".jpg";
                        }
                        elseif ($tipo == 'foto_comun')
                        {
                            $image_name   = $this->config->item('upload_path_pag') . $id_pagina . "_" . $nombre_imagen . "_slider.jpg";

                            $image_name2   = $this->config->item('upload_path_pag') . $id_pagina . "_" . $nombre_imagen . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $nombre_imagen . "_p" . ".jpg";
                            $thumb_chica  = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $nombre_imagen . ".jpg";

                        }
                        elseif ($tipo == 'foto_mas')
                        {
                            $image_name   = $this->config->item('upload_path_pag') . $id_pagina . "_" . $cantidad_fotos . "_slider.jpg";
                            $image_name2   = $this->config->item('upload_path_pag') . $id_pagina . "_" . $cantidad_fotos . ".jpg";

                            $thumb_grande = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $cantidad_fotos . "_p" . ".jpg";
                            $thumb_chica  = $this->config->item('upload_path_pag_thumb') . $id_pagina . "_" . $cantidad_fotos . ".jpg";

                        }

                                        //SLIDER 

                                        $image_s      = ImageCreateFromJPEG($file);
                                        //ancho
                                        $width_s      = imagesx($image_s);
                                        //alto imagen
                                        $height_s     = imagesy($image_s);
                                        //nuevo ancho imagen
                                        $new_width_s  = 1400;
                                        //calcular alto 
                                        $new_height_s = ($new_width_s * $height_s) / $width_s;
                                        //crear imagen nueva
                                        $thumb_s      = imagecreatetruecolor($new_width_s, $new_height_s);
                                        //redimensiono
                                        imagecopyresized($thumb_s, $image_s, 0, 0, 0, 0, $new_width_s, $new_height_s, $width_s, $height_s);
                                        //Guardo imagen final 
                                        ImageJPEG($thumb_s, $image_name);

                                        //GALERIA

                                        $image      = ImageCreateFromJPEG($file);
                                        //ancho
                                        $width      = imagesx($image);
                                        //alto imagen
                                        $height     = imagesy($image);
                                        //nuevo ancho imagen
                                        $new_width  = 550;
                                        //calcular alto 
                                        $new_height = ($new_width * $height) / $width;
                                        //crear imagen nueva
                                        $thumb      = imagecreatetruecolor($new_width, $new_height);
                                        //redimensiono
                                        imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                        //Guardo imagen final 
                                        ImageJPEG($thumb, $image_name2);
                                            if ($new_height_s>=450) {
                                           
                                           $this->load->library('image_lib');
                                            $config = array();
                                            $config['image_library'] = 'gd2';
                                            $config['source_image'] =  $image_name;
                                            $config['new_image'] = $image_name ;
                                            $config['maintain_ratio'] = FALSE;
                                            $config['create_thumb'] = FALSE;
                                            $config['width'] = 1400;
                                            $config['height'] =  430;
                                            $y_axis = floor(($height-410 ) / 2);
                                           
                                            $config['y_axis'] = $yaxis;
                                            $this->image_lib->initialize($config);
                                            $this->image_lib->crop();
                                            $this->image_lib->clear(); 
                                                 # code...
                                            }
                                        //Thumb
                                        //nuevo ancho imagen
                                        $new_width  = 100;
                                        //calcular alto 
                                        $new_height = ($new_width * $height) / $width;
                                        //crear imagen nueva
                                        $thumb      = imagecreatetruecolor($new_width, $new_height);
                                        //redimensiono
                                        imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                        //Guardo imagen final 
                                        ImageJPEG($thumb, $thumb_chica);

                                        if ($i == 1 or $cantidad_fotos == 1 or $nombre_imagen == '1')
                                        {
                                            //Thumprincipal
                                            //nuevo ancho imagen
                                            $new_height = 270;
                                            //calcular alto 
                                            $new_width  = ($new_height * $width) / $height;
                                            //crear imagen nueva
                                            $thumb      = imagecreatetruecolor($new_width, $new_height);
                                            //redimensiono
                                            imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                            //Guardo imagen final 
                                            ImageJPEG($thumb, $thumb_grande);
                                        }
     

                          
                             
                        
                        //Guardar imagenes en la table alojamientos_imagenes
                        if ($tipo == 'foto_comun')
                            $this->paginas_model->paginas_images_save_slider($id_pagina, $nombre_imagen);
                        elseif ($tipo == 'muchas_fotos')
                            $this->paginas_model->paginas_images_save_slider($id_pagina, $i);
                        elseif ($tipo == 'foto_mas')
                            $this->paginas_model->paginas_images_save_slider($id_pagina, $cantidad_fotos);
                    }
                }
            }
        }
         redirect(base_url() . 'admin/paginas/paginas_imagenes_list_slider/' . $id_pagina, 'refresh');
    }

    function paginas_imagenes_delete()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $id_pagina    = $this->input->get('ID_Pagina');
        $ImagenPagina = $this->input->get('ImagenPagina');
        $this->paginas_model->delete_paginas_imagenespag($id_pagina, $ImagenPagina);
        redirect(base_url() . 'admin/paginas/paginas_imagenes_list/' . $id_pagina, 'refresh');
    }

}

?>
