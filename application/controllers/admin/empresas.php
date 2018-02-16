<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Empresas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/empresas_model');
        $this->load->model('admin/bodegas_data');
        $this->load->library('gf');
        $this->load->helper('file');
        $this->load->config('avanbook_config');
    }

    function index()
    {
        $this->lists();
    }

    function lists()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $data['tipoempresa_array'] = $this->empresas_model->tipo_empresas_list();
        //$data['empresas_array'] = $this->empresas_model->empresas_list();
        $data['title']             = "Listado Empresas";
        $data['js']                = array('js/admin/empresas_list');
        $data['view'] = 'admin/empresas/empresas_list';
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function view($id_empresa = 0)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $query_rows = $this->empresas_model->paginas_find($id_empresa);
        $row        = $query_rows->row();
        if ($query_rows->num_rows() == 0)
        {
            echo "esta empresa no existe";
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
            $data['Basico']          = $row->Basico;
            $data['title']           = $row->TituloContenido;
            $data['keywords']        = $row->Keywords;
            $data['description']     = $row->MetaDescripcion;

            $data['js'] = array('js/admin/paginas_lists');
            $data['view'] = 'admin/paginas/paginas_view';
            $this->load->view('admin/templates/temp_menu', $data);
        }
    }

    function form($id_empresa = 0)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla paginas
        $data['ID_Empresa']        = & $ID_Empresa;
        $data['Empresa']           = & $Empresa;
        $data['Direccion']         = & $Direccion;
        $data['Telefono']          = & $Telefono;
        $data['Mail']              = & $Mail;
         $data['Coordenadas']      = & $Coordenadas;
        $data['Facebook']          = & $Facebook;
        $data['Twitter']           = & $Twitter;
        $data['Pinterest']         = & $Pinterest;
        $data['Gplus']             = & $Gplus;
        $data['Web']               = & $Web;
        $data['Url']               = & $Url;
        $data['Basico']            = & $Basico;
        $data['App_tipo']          = & $App_tipo;
        $data['Descripcion']       = & $Descripcion;
        $data['DescripcionDeta']   = & $DescripcionDeta;
        $data['ID_TipoEmpresa']    = & $ID_TipoEmpresa;
        $data['ID_SubtipoEmpresa'] = & $ID_SubtipoEmpresa;
        $data["bodega_id"]        = & $bodega_id;
        $data["circuitovino"]=& $circuitovino;
        $data["vino"] = & $vino;
        $data["espumante"] = & $espumante;
        $data["organicoartesanal"] = & $organicoartesanal;
        $data["region"] = & $region;
        $data["paseos"] = & $paseos;
        $data["restaurant"] = & $restaurant;
        $data["degustaciones"] = & $degustaciones;
        $data["shop"] = & $shop;
        $data["entretenimiento"] = & $entretenimiento;

        $query_rows = $this->empresas_model->empresas_find($id_empresa);
        $row        = $query_rows->row();

        if ($query_rows->num_rows() == 0)
        {
            $data['title']  = 'Crear Empresa';
            $data['accion'] = 'crear';
        }
        else
        {
            $data['title']  = 'Editar Empresa';
            $data['accion'] = 'editar';

            //Tabla paginas
            $ID_Empresa                  = $row->ID_Empresa;
            $Empresa                     = $row->Empresa;
            $Url                         = $row->Url;
            $Direccion                   = $row->Direccion;
            $Telefono                    = $row->Telefono;
            $Mail                        = $row->Mail;
            $Coordenadas                 = $row->Coordenadas;
            $Facebook                    = $row->Facebook;
            $Twitter                     = $row->Twitter;
            $Pinterest                   = $row->Pinterest;
            $Gplus                       = $row->Gplus;
            $Web                         = $row->Web;
            $Descripcion                 = $row->Descripcion;
            $DescripcionDeta             = $row->DescripcionDeta;
            $ID_TipoEmpresa              = $row->ID_TipoEmpresa;
            $ID_SubtipoEmpresa           = $row->ID_SubtipoEmpresa;
            $Basico                      = $row->Basico;
            $App_tipo                    = $row->App_tipo;
            $bodega_id = $row->bodega_id;
            
            

                if($bodega_id!=0){
                     $query_rows_bodega = $this->empresas_model->empresas_bodegas_find($row->bodega_id);
                     $bodegas       = $query_rows_bodega->row();

                    $circuitovino=true;
                    $vino = $bodegas->vino;
                    $espumante = $bodegas->espumante;
                    $organicoartesanal = $bodegas->organicoartesanal;
                    $region = $bodegas->region;
                    $paseos = $bodegas->paseos;
                    $restaurant = $bodegas->restaurant;
                    $degustaciones = $bodegas->degustaciones;
                    $shop = $bodegas->shop;
                    $entretenimiento = $bodegas->entretenimiento;
                }
           
        }

        $data['tipo_empresas_array'] = $this->empresas_model->tipo_empresas_list();
        if ($ID_TipoEmpresa == "")
        {
            $ID_TipoEmpresa                = 0;
        }
        $data['suptipo_empresa_array'] = $this->empresas_model->subtipo_empresas_list_by_tipo($ID_TipoEmpresa);
        $data['js']                    = array('js/ckeditor/ckeditor', 'js/admin/empresas_form');
        $data['view'] = "admin/empresas/empresas_form";
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function save()
    {
     
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $ID_Empresa        = $this->input->post('ID_Empresa');
        $Empresa           = $this->input->post('Empresa');
        $Url               = $this->input->post('Url');
        $Direccion         = $this->input->post('Direccion');
        $Telefono          = $this->input->post('Telefono');
        $Mail              = $this->input->post('Mail');
         $Coordenadas              = $this->input->post('Coordenadas');
        $Facebook          = $this->input->post('Facebook');
        $Twitter           = $this->input->post('Twitter');
        $Pinterest         = $this->input->post('Pinterest');
        $Gplus             = $this->input->post('Gplus');
        $Web               = $this->input->post('Web');
        $Descripcion       = $this->input->post('Descripcion');
        $DescripcionDeta   = $this->input->post('DescripcionDeta');
        $ID_TipoEmpresa    = $this->input->post('ID_TipoEmpresa');
        $ID_SubtipoEmpresa = $this->input->post('ID_SubtipoEmpresa');
        $Basico            = $this->input->post('Basico');
        $App_tipo          = $this->input->post('App_tipo');
        $circuitovino= $this->input->post('circuitovino');
        $id_bodega =$this->input->post('bodega_id');

            
        $accion = $this->input->post('accion');
        
        if($id_bodega>=0){   
      
            if($circuitovino==true){
               
                $vino = $this->input->post('vino');
                $espumante =$this->input->post('espumante');
                $organicoartesanal = $this->input->post('organicoartesanal');
                $region = $this->input->post('region');
                $paseos = $this->input->post('paseos');
                $restaurant = $this->input->post('restaurant');
                $degustaciones = $this->input->post('degustaciones');
                $shop = $this->input->post('shop');
                $entretenimiento= $this->input->post('entreteniento');
                 $bodega_array = array(
                    "vino" => $vino,
                    "espumante" =>$espumante,
                    "organicoartesanal"=> $organicoartesanal,
                    "region"=>$region,
                    "paseos"=>$paseos,
                    "restaurant"=>$restaurant,
                    "degustaciones"=>$degustaciones,
                    "shop"=>$shop,
                    "entretenimiento"=>$entretenimiento
                 );

             
             

                  if ($accion == 'crear')
                    {
                                $id_bodega = $this->bodegas_data->insert($bodega_array);
                    }
                    elseif ($accion == 'editar')
                    {
                           if ($id_bodega==0)
                            {
                                $id_bodega = $this->bodegas_data->insert($bodega_array);
                            }
                            else
                            {                             
                                  $this->bodegas_data->update($id_bodega,$bodega_array);
                              }
                    }
            }else {
                  if($id_bodega !==0){
                     $this->bodegas_data->delete($id_bodega);
                     $id_bodega =null;
                     }

            }
        }
        $paginas_array = array(
            'Empresa'           => $Empresa,
            'Url'               => $Url,
            'Direccion'         => $Direccion,
            'Telefono'          => $Telefono,
            'Mail'              => $Mail,
            'Coordenadas'              => $Coordenadas,
            'Facebook'          => $Facebook,
            'Twitter'           => $Facebook,
            'Pinterest'         => $Pinterest,
            'Gplus'             => $Gplus,
            'Web'               => $Web,
            'Descripcion'       => $Descripcion,
            'DescripcionDeta'   => $DescripcionDeta,
            'ID_TipoEmpresa'    => $ID_TipoEmpresa,
            'ID_SubtipoEmpresa' => $ID_SubtipoEmpresa,
            'Basico'            => $Basico,
            "App_tipo"          =>$App_tipo,
            "bodega_id" => $id_bodega    
        );

        if ($accion == 'crear')
        {
            $this->empresas_model->insert('empresas', $paginas_array);
        }
        elseif ($accion == 'editar')
        {
            $this->empresas_model->update($ID_Empresa, $paginas_array, 'ID_Empresa', 'empresas');
        }

        redirect(base_url() . 'admin/empresas/lists/', 'refresh');
    }

    function empresas_publicidad_form($id_empresa)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $empresa_row = $this->empresas_model->empresas_find($id_empresa);
        $row         = $empresa_row->row();

        if (!$empresa_row->num_rows() == 0)
        {
            $data['empresa_nombre']   = $row->Empresa;
            $data['publicidad_array'] = $this->empresas_model->publicidad_select();
            $data['ID_Empresa']       = $row->ID_Empresa;
            $data['js']               = array('js/admin/alojamientos_publicidad_form');
            $data['title'] = 'Nueva publicidad';
            $data['css']   = array('css/admin/alojamientos_list');
            $data['view'] = 'admin/empresas/empresas_publicidad_form';
            $this->load->view('admin/templates/temp_menu', $data);
        }
        else
        {
            echo "No existe el alojamiento indicado (Mejorar menaje de error";
        }
    }

    function empresas_publicidad_list($id_empresa)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $data['id_empresa']       = $id_empresa;
        $data['publicidad_array'] = $this->empresas_model->info_publicidad($id_empresa);
        $data['js']               = array('js/admin/empresas_publicidad_list');
        $data['title'] = 'Nueva publicidad';
        $data['view']  = 'admin/empresas/empresas_publicidad_list';
        $this->load->view('admin/templates/temp_menu', $data);
    }

    //Guardar Servicios
    function empresas_publicidad_save()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $id_empresa = $this->input->post('ID_Empresa');
        $post_array = $this->input->post();


        //Saco el ultimo elemento del array post que es el id_alojamiento;
        array_pop($post_array);

        //Busco el precio en tipopublicidad
        foreach ($post_array as $var)
        {
            $precio = $this->empresas_model->find_precio_tipo_publicidad($var['ID_TipoPublicidad']);

            $array_publicidad = array(
                'ID_TipoPublicidad' => $var,
                'Precio'            => $precio
            );

            $id_publicidad = $this->empresas_model->insert('publicidad', $array_publicidad);

            $array_empresas_publicidad = array(
                'ID_Empresa'    => $id_empresa,
                'ID_Publicidad' => $id_publicidad
            );

            $this->empresas_model->insert('empresas_publicidad', $array_empresas_publicidad);
        }

        redirect('admin/empresas/empresas_publicidad_list/' . $id_empresa . "");
    }

    function empresas_imagenes_list($id_empresa)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        //$data['js'] = array('js/empresas_publicidad_list');
        $row                             = $this->empresas_model->empresas_find($id_empresa);
        $row                             = $row->row();
        $data['Empresa']                 = $row->Empresa;
        $data['ID_Empresa']              = $row->ID_Empresa;
        $data['empresas_imagenes_array'] = $this->empresas_model->empresas_imagenes_list($id_empresa);
        $data['title']                   = 'Empresa Imagenes';
        $data['js']                      = array('js/admin/empresas_imagenes_list', 'js/blockui-master/jquery.blockUI');
        $data['view'] = 'admin/empresas/empresas_imagenes_list';
        $this->load->view('admin/templates/temp_menu', $data);
    }

    //Funciones para guardar muchas imagenes
    function empresas_imagenes_save()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $id_empresa    = $this->input->post('ID_Empresa');
        $tipo          = $this->input->post('tipo');
        $nombre_imagen = $this->input->post('foto_numero');
       


        $cantidad_fotos = 0;

        if (isset($_FILES['filesToUpload']['tmp_name']))
        {
            if (count($_FILES['filesToUpload']['tmp_name']))
            {
     
                $i = 0;
                foreach ($_FILES['filesToUpload']['tmp_name'] as $file)
                {

                    $i++;

                    $cantidad_fotos = $this->empresas_model->empresas_images_count($id_empresa);
                    $cantidad_fotos = $cantidad_fotos + 1;

                    if ($cantidad_fotos < 20)
                    {

                        if ($tipo == 'foto_comun')
                        {
                            $image_name   = $this->config->item('upload_path_emp') . $id_empresa . "_" . $nombre_imagen . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_emp_thumb') . $id_empresa . "_" . $nombre_imagen . "_p" . ".jpg";
                            $thumb_chica  = $this->config->item('upload_path_emp_thumb') . $id_empresa . "_" . $nombre_imagen . ".jpg";
                        }
                        elseif ($tipo == 'foto_mas')
                        {
                            $image_name   = $this->config->item('upload_path_emp') . $id_empresa . "_" . $cantidad_fotos . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_emp_thumb') . $id_empresa . "_" . $cantidad_fotos . "_p" . ".jpg";
                            $thumb_chica  = $this->config->item('upload_path_emp_thumb') . $id_empresa . "_" . $cantidad_fotos . ".jpg";
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

                        if ($tipo == 'foto_mas')
                        {
                          $this->empresas_model->empresas_images_save($id_empresa, $cantidad_fotos);  
                        }
                            
                    }
                }
            }
        }
        redirect(base_url() . 'admin/empresas/empresas_imagenes_list/' . $id_empresa, 'refresh');
    }

    function empresas_imagenes_delete()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $id_empresa    = $this->input->get('ID_Empresa');
        $ImagenEmpresa = $this->input->get('ImagenEmpresa');
        $this->empresas_model->delete_empresas_imagenesemp($id_empresa, $ImagenEmpresa);
        redirect(base_url() . 'admin/empresas/empresas_imagenes_list/' . $id_empresa, 'refresh');
    }

    function empresas_publicidad_estado($id_empresa)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $id_publicidad = $this->input->get('ID_Publicidad');
        $this->empresas_model->update_estado_publicidad($id_publicidad);
        redirect(base_url() . 'admin/empresas/empresas_publicidad_list/' . $id_empresa . "");
    }

    function empresas_publicidad_renovar($id_empresa)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $id_publicidad    = $this->input->get('ID_Publicidad');
        $row              = $this->empresas_model->find_precio_publicidad($id_publicidad);
        $this->empresas_model->update_estado_publicidad_simple($id_publicidad, 0);
        $array_publicidad = array(
            'ID_TipoPublicidad' => $row->ID_TipoPublicidad,
            'Precio'            => $row->Precio
        );

        $id_publicidad             = $this->empresas_model->insert('publicidad', $array_publicidad);
        $array_empresas_publicidad = array(
            'ID_Empresa'    => $id_empresa,
            'ID_Publicidad' => $id_publicidad
        );

        $this->empresas_model->insert('empresas_publicidad', $array_empresas_publicidad);

        redirect(base_url() . 'admin/empresas/empresas_publicidad_list/' . $id_empresa . "");
    }


    #######################################------Funciones Clientes-------##################################
    //Formulario clientes

    function empresas_clientes_form($idempresa = 0)
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $Cliente = $this->empresas_model->clientes_Empresa_find($idempresa);
        $hayCliente = $Cliente->num_rows();
        
        
            if($hayCliente >0){
                 $ID_Cliente1= $Cliente->result_array();
                 $ID_Cliente=$ID_Cliente1[0]['ID_Cliente'];
               
            }else{
                 $ID_Cliente = 0;
            }

        //Comprobar que existe el alojamiento sino tirar error
      
            //Variables tabla clientes
            $data['ID_Cliente']      = & $ID_Cliente;
            $data['Usuario']         = & $Usuario;
            $data['Clave']           = & $Clave;
            $data['NombreCliente']   = & $NombreCliente;
            $data['ApellidoCliente'] = & $ApellidoCliente;
            $data['EmailCliente']    = & $EmailCliente;
            $data['Cargo']           = & $Cargo;
            $data['Rol']             = & $Rol;
            $data['tipoCliente']     = & $tipoCliente;
            //Traigo el ID_Cliente deseado

            $query_rows = $this->empresas_model->clientes_find($ID_Cliente);
            $row        = $query_rows->row();

            if ($query_rows->num_rows() == 0)
            {
                $data['title']  = 'Nuevo Cliente';
                $data['accion'] = 'crear';
            }
            else
            {
                $data['title']                     = 'Editar Cliente';
                $data['accion']                    = 'editar';
                $ID_Cliente                        = $row->ID_Cliente;
                $Usuario                           = $row->Usuario;
                $Clave                             = $row->Clave;
                $NombreCliente                     = $row->NombreCliente;
                $ApellidoCliente                   = $row->ApellidoCliente;
                $EmailCliente                      = $row->EmailCliente;
                $Cargo                             = $row->Cargo;
                $Rol                               = $row->Rol;
                $tipoCliente                       = $row->tipoCliente;
            }
            //Menu sidebar que estara activo
           
            $data['empresa_numero']        = $idempresa; 
            $data['ID_Cliente']        = $ID_Cliente;
            $data['css']                       = array('css/admin/alojamientos_list');
            $data['view'] = 'admin/empresas/empresas_clientes_form';
            $this->load->view('admin/templates/temp_menu', $data);
     
    }

    //Guardar Cliente
    function empresas_clientes_save()
    {
        $a = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $clientes_post = $this->input->post();

        $clientes_array = array(
            'Usuario'         => $clientes_post['Usuario'],
            'Clave'           => $clientes_post['Clave'],
            'NombreCliente'   => $clientes_post['NombreCliente'],
            'ApellidoCliente' => $clientes_post['ApellidoCliente'],
            'EmailCliente'    => $clientes_post['EmailCliente'],
            'Cargo'           => $clientes_post['Cargo'],
            'Rol'             => $clientes_post['Rol'],
            'tipoCliente'             => $clientes_post['tipoCliente']
        );

        if ($clientes_post['accion'] == 'crear')
        {
            $id_cliente                  = $this->empresas_model->insert('clientes', $clientes_array);
            $empresas_clientes_array = array(
                'ID_Empresa' => $clientes_post['ID_Empresa'],
                'ID_Cliente'     => $id_cliente
            );

            $this->empresas_model->insert('empresa_clientes', $empresas_clientes_array);
        }
        elseif ($clientes_post['accion'] == 'editar')
        {

            $this->empresas_model->update($clientes_post['ID_Cliente'], $clientes_array, 'ID_Cliente', 'clientes');
        }

        redirect('admin/empresas/', 'refresh');
    }


}

?>
