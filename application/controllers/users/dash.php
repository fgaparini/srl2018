<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dash extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('gf');
        $this->load->model('user/alojamientos_clientes_user_model');
        $this->load->model('user/alojamientos_user_model');
        $this->load->model('user/clientes_user_model');
        $this->load->model('user/categorias_user_model');
        $this->load->model('user/alojamientos_imagenes_user_model');
        $this->load->model('user/ciudades_user_model');
        $this->load->model('user/localidades_user_model');
        $this->load->model('user/paises_user_model');
        $this->load->model('user/provincias_user_model');
        $this->load->model('user/tipoalojamiento_user_model');
        $this->load->model('user/servicios_user_model');
        $this->load->model('user/alojamientos_servicios_user_model');
        $this->load->model('user/informaciongeneral_user_model');
        $this->load->model('user/metododepago_user_model');
        $this->load->model('user/alojamiento_estadisticas');
        $this->load->model('user/promociones_model');
        $this->load->config('avanbook_config');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $a                  = $this->session->userdata('logged_in');
        $id                 = $a['ID_Cliente'];
        $ID_Alojamiento     = $this->alojamientos_clientes_user_model->cliente_alojamiento($id);
        $cliente            = $this->clientes_user_model->find($id);
        $data['namealojar'] = $this->alojamientos_user_model->findname($ID_Alojamiento);
        $data['hab']        = $this->alojamientos_user_model->findhab($ID_Alojamiento);

        $data['Usuario']        = $a['NombreCliente'];
        $data['id_cliente']     = $id;
        $data['ID_Alojamiento'] = $ID_Alojamiento;
        //INFO ALOJAMIENTO
        $data['info_array']     = $this->alojamientos_user_model->info_gral_view($ID_Alojamiento);
        //Servicios
        //  $servicios_total         = $this->servicios_user_model->find_all();//listado servicios totales
        $data['servicios']      = $this->alojamientos_servicios_user_model->find_id_alojamiento_inner_servicios($ID_Alojamiento); //servicios del alojamiento
        //$data['servicios_array'] = $this->alojamientos_servicios_array_final($servicios_total, $servicios_alojamiento); //

        $data['fotos_array'] = $this->alojamientos_imagenes_user_model->find_from_id_alo($ID_Alojamiento);
        $data['dash']        = "dash";
        $data['body']        = "users/dash";
        $data['titlepage']   = " Dashboard |Gestion de Alojamientos | San Rafael Late | ";
        //ESTADISTICAS 
        // $TipoAccion1         = $this->alojamiento_estadisticas->tipoaccion($ID_Alojamiento);
        // $tipoacciones        = array();
        // foreach ($TipoAccion1 as $var)
        // {
        //     $tipoacciones[] = $var['TipoAccion'];
        // }
        // $estaxtipo      = array();


        // foreach ($TipoAccion1 as $var)
        // {
        //     $estaxtipo[$var['TipoAccion']] = $this->alojamiento_estadisticas->sum_estadisca($var['TipoAccion'], $ID_Alojamiento);
        //     $jsondata[$var['TipoAccion']]  = implode(",", $estaxtipo[$var['TipoAccion']]);
        // }

        // $arraytipo = array('Website'         => 'web', 'Email'           => 'mail', 'Ficha'           => 'ficha', 'Facebook'        => 'facebook', 'Twitter'         => 'twitter', 'Google +'        => 'gplus', 'Pinterest'       => 'pinterest');
        // $data['tipacc']   = $arraytipo;
        // $data['jsondata'] = $jsondata;

        //$data['stats']=$estadisticas;

        $this->load->view('templates/users/template_gral', $data);
    }

    public function editar($seccion)
    {
        //
        $a              = $this->session->userdata('logged_in');
        $id_c           = $a['ID_Cliente'];
        $ID_Alojamiento = $a['ID_Alojamiento'];
        $cliente        = $this->clientes_user_model->find($id_c);

        $data['namealojar']     = $this->alojamientos_user_model->findname($ID_Alojamiento);
        $data['Usuario']        = $cliente['NombreCliente'];
        $data['ID_Alojamiento'] = $ID_Alojamiento;
        //INFO ALOJAMIENTO
        //Servicios
        //  $servicios_total         = $this->servicios_user_model->find_all();//listado servicios totales
        if ($seccion == "servicios")
        {
            # code...

            $servicios_total         = $this->servicios_user_model->find_all();
            $servicios_alojamiento   = $this->alojamientos_servicios_user_model->find_id_alojamiento_inner_servicios($ID_Alojamiento);
            //Meto una combinacion de esos array en un array nuevo
            //La funcion esta al final de este archivo php   
            $data['servicios_array'] = $this->alojamientos_servicios_array_final($servicios_total, $servicios_alojamiento);
            $data['edito']           = "Servicios";
            $data['titlepage']       = "Editar Servicios | Gestion de Alojamientos | San Rafael Late | ";
        }
        if ($seccion == "fotos")
        {
            $data['fotos_array'] = $this->alojamientos_imagenes_user_model->find_from_id_alo($ID_Alojamiento);
            $data['edito']       = "Fotos";
            $data['titlepage']   = "Editar Fotos | Gestion de Alojamientos | San Rafael Late | ";
            
        }

        if ($seccion == 'promociones')
        {
            $data['datos_array']    = $this->promociones_model->list_inner_alojamiento($ID_Alojamiento);
            $data['ID_Alojamiento'] = $ID_Alojamiento;
            $data['edito']          = "Promociones";
            $data['titlepage']      = "Editar Fotos | Gestion de Alojamientos | San Rafael Late | ";
        }


        $data['body'] = "users/body_edit";

        //$data['stats']=$estadisticas;
        $this->load->view('templates/users/template_gral', $data);
    }

    function edit_promocion($id = 0)
    {
        $a              = $this->session->userdata('logged_in');
        $id_c           = $a['ID_Cliente'];
        $ID_Alojamiento = $a['ID_Alojamiento'];
        $cliente        = $this->clientes_user_model->find($id_c);

        $data['namealojar'] = $this->alojamientos_user_model->findname($ID_Alojamiento);
        $data['Usuario']    = $cliente['NombreCliente'];


        $cantidad               = $this->promociones_model->count_id($id);
        //Variables tabla
        $data['ID_Promocion']   = & $ID_Promocion;
        $data['NombrePromo']    = & $NombrePromo;
        $data['DetallePromo']   = & $DetallePromo;
        $data['DesdePromo']     = & $DesdePromo;
        $data['HastaPromo']     = & $HastaPromo;
        $data['ID_Alojamiento'] = & $ID_Alojamiento;

        //Variables a pasar segun la vista
        $data['title'] = & $title;

        //Si es mayor a 0 es editar
        if ($cantidad > 0)
        {
            $row          = $this->promociones_model->find($id);
            $ID_Promocion = $row['ID_Promocion'];
            $NombrePromo  = $row['NombrePromo'];
            $DetallePromo = $row['DetallePromo'];
            $DesdePromo   = $this->gf->html_mysql($row['DesdePromo']);
            $HastaPromo   = $this->gf->html_mysql($row['HastaPromo']);

            $ID_Alojamiento = $row['ID_Alojamiento'];

            $title = "Editar promoción";
        }
        else
        {
            $title = "Crear promoción";
        }

        //Array segun lugar para mostrar 
        //$data['alojaredit']             = "hola";
        $data['body']      = 'users/body_edit_promocion';
        $data['titlepage'] = "Editar Informacion | Gestion de Alojamientos | San Rafael Late | ";


        /* $data['view']  = "users/body_edit_promocion"; */
        $data['css'] = array(
            'js/jquery-ui/development-bundle/themes/base/jquery.ui.all',
        );
        $data['js'] = array(
            'js/jquery-ui/development-bundle/ui/jquery.ui.core',
            'js/jquery-ui/development-bundle/ui/jquery.ui.widget',
            'js/jquery-ui/development-bundle/ui/jquery.ui.position',
            'js/jquery-ui/development-bundle/ui/jquery.ui.menu',
            'js/jquery-ui/development-bundle/ui/jquery.ui.autocomplete',
            'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker',
            'js/admin/promociones_form'
        );
        //es para habilitar el cfkeditor
        $data['Descripcion'] ="algo";
        
        $this->load->view('templates/users/template_gral', $data);
    }

    function save_promocion()
    {
        //Validacion formulario
        $this->form_validation->set_rules('NombrePromo', 'Nombre', 'required');
        $this->form_validation->set_rules('DetallePromo', 'Detalle', 'required');
        $this->form_validation->set_rules('DesdePromo', 'Desde', 'required');
        $this->form_validation->set_rules('HastaPromo', 'Hasta', 'required');
        $this->form_validation->set_rules('ID_Alojamiento', '', '');
        //Variables post a guardar
        $ID_Promocion = $this->input->post('ID_Promocion');
        $NombrePromo  = $this->input->post('NombrePromo');
        $DetallePromo = $this->input->post('DetallePromo');
        $DesdePromo   = $this->gf->html_mysql($this->input->post('DesdePromo'));
        $HastaPromo   = $this->gf->html_mysql($this->input->post('HastaPromo'));


        $ID_Alojamiento = $this->input->post('ID_Alojamiento');

        if ($this->form_validation->run() == TRUE)
        {

            $datos_array = array(
                'NombrePromo'    => $NombrePromo,
                'DetallePromo'   => $DetallePromo,
                'DesdePromo'     => $DesdePromo,
                'HastaPromo'     => $HastaPromo,
                'ID_Alojamiento' => $ID_Alojamiento
            );

            if ($ID_Promocion == '')
            {
                $this->promociones_model->insert($datos_array);
                redirect(base_url() . 'users/dash/editar/promociones/', 'refresh');
            }
            else
            {
                $this->promociones_model->update($ID_Promocion, $datos_array);
                redirect(base_url() . 'users/dash/editar/promociones/', 'refresh');
            }
        }
        else
        {
            $data['ID_Promocion']   = $ID_Promocion;
            $data['NombrePromo']    = set_value('NombrePromo');
            $data['DetallePromo']   = set_value('DetallePromo');
            $data['DesdePromo']     = set_value('DesdePromo');
            $data['HastaPromo']     = set_value('HastaPromo');
            $data['ID_Alojamiento'] = set_value('ID_Alojamiento');

            if ($ID_Promocion == '')
            {
                $a              = $this->session->userdata('logged_in');
                $id_c           = $a['ID_Cliente'];
                $ID_Alojamiento = $a['ID_Alojamiento'];
                $cliente        = $this->clientes_user_model->find($id_c);

                $data['namealojar'] = $this->alojamientos_user_model->findname($ID_Alojamiento);
                $data['Usuario']    = $cliente['NombreCliente'];

                $data['namealojar'] = $this->alojamientos_user_model->findname($ID_Alojamiento);
                $data['Usuario']    = $cliente['NombreCliente'];

                
            }
            else
            {
                $a              = $this->session->userdata('logged_in');
                $id_c           = $a['ID_Cliente'];
                $ID_Alojamiento = $a['ID_Alojamiento'];
                $cliente        = $this->clientes_user_model->find($id_c);

                $data['namealojar'] = $this->alojamientos_user_model->findname($ID_Alojamiento);
                $data['Usuario']    = $cliente['NombreCliente'];

                $data['namealojar'] = $this->alojamientos_user_model->findname($ID_Alojamiento);
                $data['Usuario']    = $cliente['NombreCliente'];
                
            }
            
                $data['body']      = 'users/body_edit_promocion';
                $data['titlepage'] = "Crear Promoción | Gestion de Alojamientos | San Rafael Late | ";
                $data['title']     = "Editar promoción";
                $data['css']       = array(
                    'js/jquery-ui/development-bundle/themes/base/jquery.ui.all',
                );
                $data['js'] = array(
                    'js/jquery-ui/development-bundle/ui/jquery.ui.core',
                    'js/jquery-ui/development-bundle/ui/jquery.ui.widget',
                    'js/jquery-ui/development-bundle/ui/jquery.ui.position',
                    'js/jquery-ui/development-bundle/ui/jquery.ui.menu',
                    'js/jquery-ui/development-bundle/ui/jquery.ui.autocomplete',
                    'js/jquery-ui/development-bundle/ui/jquery.ui.datepicker',
                    'js/ckeditor/ckeditor',
                    'js/admin/promociones_form'
                );
                $this->load->view('templates/users/template_gral', $data);
        }
    }

    function delete_promocion($id)
    {
        $a              = $this->session->userdata('logged_in');
        $ID_Alojamiento = $a['ID_Alojamiento'];
        $this->promociones_model->delete($id);
        redirect(base_url() . 'users/dash/editar/promociones/' . $ID_Alojamiento, 'refresh');
    }

    //Formulario Alojamiento
    function edit_info()
    {
        $a                          = $this->session->userdata('logged_in');
        $this->gf->comp_sesion($a, base_url());
        $id_alojamiento             = $a['ID_Alojamiento'];
        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla alojamientos
        $data['namealojar']         = $this->alojamientos_user_model->findname($id_alojamiento);
        $data['Usuario']            = $a['NombreCliente'];
        $data['ID_Alojamiento']     = & $ID_Alojamiento;
        $data['ID_Categorias']      = & $ID_Categorias;
        $data['ID_TipoAlojamiento'] = & $ID_TipoAlojamiento;
        //Configuraciones agregadas al ultimo para posicionamiento

        $data['DestaOrden'] = & $DestaOrden;
        $data['DestaHome']  = & $DestaHome;
        $data['Basico']     = & $Basico;

        //Tabla informaciongeneral
        $data['ID_InformacionGeneral'] = & $ID_InformacionGeneral;
        $data['Nombre']                = & $Nombre;
        $data['Direccion']             = & $Direccion;
        $data['Telefono']              = & $Telefono;
        $data['Email']                 = & $Email;
        $data['WebSite']               = & $WebSite;
        $data['Responsable']           = & $Responsable;
        $data['Descripcion']           = & $Descripcion;
        $data['Coordenadas']           = & $Coordenadas;
        $data['Restaurant']            = & $Restaurant;
        $data['InformacionRestaurant'] = & $InformacionRestaurant;
        $data['Checkin']               = & $Checkin;
        $data['Checkout']              = & $Checkout;
        $data['PoliticaCancelacion']   = & $PoliticaCancelacion;
        $data['DiasPolitica']          = & $DiasPolitica;
        $data['TipoAcuerdo']           = & $TipoAcuerdo;
        $data['Facebook']              = & $Facebook;
        $data['Twitter']               = & $Twitter;
        $data['Gplus']                 = & $Gplus;
        $data['Pinterest']             = & $Pinterest;

        //Tabla metodosdepago
        $data['ID_MP']             = & $ID_MP;
        $data['Senia']             = & $Senia;
        $data['GarantiaDebooking'] = & $GarantiaDebooking;
        $data['Anticipado']        = & $Anticipado;
        $data['ComisionSenia']     = & $ComisionSenia;
        $data['AceptaSenia']       = & $AceptaSenia;
        $data['Comision']          = & $Comision;
        $data['MejorPrecio']       = & $MejorPrecio;

        $query_rows = $this->alojamientos_user_model->alojamiento_find($id_alojamiento);
        $row        = $query_rows->row();

        if ($query_rows->num_rows() == 0)
        {
            $data['title']  = 'Crear Alojamiento';
            $data['accion'] = 'crear';
        }
        else
        {
            $data['title']      = 'Editar Alojamiento';
            $data['accion']     = 'editar';
            //Tabla alojamientos
            $ID_Alojamiento     = $row->ID_Alojamiento;
            $ID_Categorias      = $row->ID_Categorias;
            $ID_TipoAlojamiento = $row->ID_TipoAlojamiento;
            //Configuracion
            $Url                = $row->Url;
            $DestaOrden         = $row->DestaOrden;
            $DestaHome          = $row->DestaHome;
            $TipoAcuerdo        = $row->TipoAcuerdo;
            $Basico             = $row->Basico;

            //Tabla informaciongeneral
            $ID_InformacionGeneral = $row->ID_InformacionGeneral;
            $Nombre                = $row->Nombre;
            $Direccion             = $row->Direccion;
            $Telefono              = $row->Telefono;
            $Email                 = $row->Email;
            $WebSite               = $row->WebSite;
            $Responsable           = $row->Responsable;
            $Descripcion           = $row->Descripcion;
            $Coordenadas           = $row->Coordenadas;
            $Gplus                 = $row->Gplus;
            $Facebook              = $row->Facebook;
            $Twitter               = $row->Twitter;
            $Pinterest             = $row->Pinterest;
            $PoliticaCancelacion   = $row->PoliticaCancelacion;
            $DiasPolitica          = $row->DiasPolitica;

            //Tabla metodosdepago
            $ID_MP             = $row->ID_MP;
            $Senia             = $row->Senia;
            $GarantiaDebooking = $row->GarantiaDebooking;
            $Anticipado        = $row->Anticipado;
            $ComisionSenia     = $row->ComisionSenia;
            $AceptaSenia       = $row->AceptaSenia;
            $Comision          = $row->Comision;
            $MejorPrecio       = $row->MejorPrecio;
        }

        //Array segun lugar para mostrar 
        $data['alojaredit']             = "hola";
        $data['tipoalojamientos_array'] = $this->tipoalojamiento_user_model->find_all();
        $data['categorias_array']       = $this->categorias_user_model->find_all();
        $data['body']                   = 'users/body_edit_alojar';
        $data['titlepage']              = "Editar Informacion | Gestion de Alojamientos | San Rafael Late | ";

        $this->load->view('templates/users/template_gral', $data);
    }

    //Guardar Formulario alojamiento
    function save()
    {
        $a = $this->session->userdata('logged_in');
        $this->gf->comp_sesion($a, base_url());

        $accion                = $this->input->post('accion');
        $ID_Alojamiento        = $this->input->post('ID_Alojamiento');
        $ID_InformacionGeneral = $this->input->post('ID_InformacionGeneral');
        $ID_MP                 = $this->input->post('ID_MP');

        $data_info_gral = array(
            'Nombre'      => $this->input->post('Nombre'),
            'Direccion'   => $this->input->post('Direccion'),
            'Telefono'    => $this->input->post('Telefono'),
            'Email'       => $this->input->post('Email'),
            'WebSite'     => $this->input->post('WebSite'),
            'Responsable' => $this->input->post('Responsable'),
            'Descripcion' => $this->input->post('Descripcion'),
            'Facebook'    => $this->input->post('Facebook'),
            'Twitter'     => $this->input->post('Twitter'),
            'Pinterest'   => $this->input->post('Pinterest'),
            'Gplus'       => $this->input->post('Gplus')
        );

        $data_metodo_pago = array(
            'Senia'             => $this->input->post('Senia'),
            'GarantiaDebooking' => $this->input->post('GarantiaDebooking'),
            'Anticipado'        => $this->input->post('Anticipado'),
            'ComisionSenia'     => $this->input->post('ComisionSenia'),
            'AceptaSenia'       => $this->input->post('AceptaSenia'),
            'Comision'          => $this->input->post('Comision'),
            'MejorPrecio'       => $this->input->post('MejorPrecio')
        );

        $data_alojamientos = array(
            'ID_InformacionGeneral' => $this->input->post('ID_InformacionGeneral'),
            'ID_TipoAlojamiento'    => $this->input->post('ID_TipoAlojamiento'),
            'ID_Categorias'         => $this->input->post('ID_Categorias')
        );

        // $this->metododepago_user_model->update($ID_MP, $data_metodo_pago);
        $this->informaciongeneral_user_model->update($ID_InformacionGeneral, $data_info_gral);
        $this->alojamientos_user_model->update($ID_Alojamiento, $data_alojamientos);

        redirect(base_url() . 'users/dash/edit_info', 'refresh');
    }

    //Guardar Servicios
    function servicios_user_save()
    {
        $a = $this->session->userdata('logged_in');
        $this->gf->comp_sesion($a, base_url());

        $id_alojamiento = $this->alojamientos_clientes_user_model->cliente_alojamiento($a['ID_Cliente']);
        $post_array     = $this->input->post();

        //Saco el ultimo elemento del array post que es el id_alojamiento;
        array_pop($post_array);

        //Elimino todos los servicios que existen en este alojamiento,
        //Para que no de conflicto al insertarlo de nuevo (se borra y se agregan los ya ingresados mas los nuevos)
        $this->alojamientos_servicios_user_model->delete_alojamientos_servicios($id_alojamiento);

        $array_comas = "";
        foreach ($post_array as $var)
        {
            $this->alojamientos_servicios_user_model->insert_alojamientos_servicios($id_alojamiento, $var);
        }

        redirect(base_url() . 'users/dash/editar/servicios/');
    }

    //Funciones para guardar muchas imagenes
    function alojamientos_imagenes_save()
    {

        $a          = $this->session->userdata('logged_in');
        $id_cliente = $a['ID_Cliente'];
        $this->gf->comp_sesion($a, base_url());

        $id_alojamiento = $this->input->post('ID_Alojamiento');
        $tipo           = $this->input->post('tipo');
        $nombre_imagen  = $this->input->post('foto_numero');

        $cantidad_fotos = 0;


        if (isset($_FILES['filesToUpload']['tmp_name']))
        {
            if (count($_FILES['filesToUpload']['tmp_name']))
            {

                //Borrar las imagenes de la tabla imagenes_alojamientos ya que se agregaran varias mas
                if ($tipo == 'foto_comun')
                    $this->alojamientos_imagenes_user_model->images_delete_nombre_imagen($id_alojamiento, $nombre_imagen);

                $i = 0;
                foreach ($_FILES['filesToUpload']['tmp_name'] as $file)
                {

                    $i++;
                    $cantidad_fotos = $this->alojamientos_imagenes_user_model->images_count($id_alojamiento);
                    $cantidad_fotos = $cantidad_fotos + 1;

                    if ($cantidad_fotos <= 20 || $tipo=='foto_comun')
                    {

                        if ($tipo == 'muchas_fotos')
                        {
                            $image_name   = $this->config->item('upload_path') . $id_alojamiento . "_" . $i . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_thumb') . $id_alojamiento . "_" . $i . "_p" . ".jpg";
                            $thumb_chica  = $this->config->item('upload_path_thumb') . $id_alojamiento . "_" . $i . ".jpg";
                        }
                        elseif ($tipo == 'foto_comun')
                        {
                            $image_name   = $this->config->item('upload_path') . $id_alojamiento . "_" . $nombre_imagen . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_thumb') . $id_alojamiento . "_" . $nombre_imagen . "_p" . ".jpg";
                            $thumb_chica  = $this->config->item('upload_path_thumb') . $id_alojamiento . "_" . $nombre_imagen . ".jpg";
                        }
                        elseif ($tipo == 'foto_mas')
                        {
                            $image_name   = $this->config->item('upload_path') . $id_alojamiento . "_" . $cantidad_fotos . ".jpg";
                            $thumb_grande = $this->config->item('upload_path_thumb') . $id_alojamiento . "_" . $cantidad_fotos . "_p" . ".jpg";
                            $thumb_chica  = $this->config->item('upload_path_thumb') . $id_alojamiento . "_" . $cantidad_fotos . ".jpg";
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
                            $this->alojamientos_imagenes_user_model->images_save($id_alojamiento, $nombre_imagen);
                        elseif ($tipo == 'muchas_fotos')
                            $this->alojamientos_imagenes_user_model->images_save($id_alojamiento, $i);
                        elseif ($tipo == 'foto_mas')
                            $this->alojamientos_imagenes_user_model->images_save($id_alojamiento, $cantidad_fotos);
                    }
                }
            }
        }
        redirect(base_url() . 'users/dash/editar/fotos/', 'refresh');
    }

    function perfil()
    {
        $a                       = $this->session->userdata('logged_in');
        $ID_Cliente              = $a['ID_Cliente'];
        $ID_Alojamiento          = $a['ID_Alojamiento'];
        $cli                     = $this->clientes_user_model->find($ID_Cliente);
        $data['namealojar']      = $this->alojamientos_user_model->findname($ID_Alojamiento);
        $data['Usuario']         = $a['NombreCliente'];
        $data['perfil']          = 'Perfil';
        //Variables tabla clientes
        $data['ID_Cliente']      = $cli['ID_Cliente'];
        $data['Usuario2']        = $cli['Usuario'];
        $data['Clave']           = $cli['Clave'];
        $data['NombreCliente']   = $cli['NombreCliente'];
        $data['ApellidoCliente'] = $cli['ApellidoCliente'];
        $data['EmailCliente']    = $cli['EmailCliente'];
        $data['Cargo']           = $cli['Cargo'];


        $data['body']      = 'users/body_perfil';
        $data['titlepage'] = "Perfil| Gestion de Alojamientos | San Rafael Late | ";

        $this->load->view('templates/users/template_gral', $data);
    }

    //Guardar Cliente
    function clientes_save()
    {
        $a               = $this->session->userdata('logged_in');
        $ID_Cliente      = $a['ID_Cliente'];
        $Usuario         = $this->input->post('Usuario');
        $Clave           = $this->input->post('Clave');
        $NombreCliente   = $this->input->post('NombreCliente');
        $ApellidoCliente = $this->input->post('ApellidoCliente');
        $EmailCliente    = $this->input->post('EmailCliente');
        $Cargo           = $this->input->post('Cargo');

        $clientes_array = array(
            'Usuario'         => $Usuario,
            'Clave'           => $Clave,
            'NombreCliente'   => $NombreCliente,
            'ApellidoCliente' => $ApellidoCliente,
            'EmailCliente'    => $EmailCliente,
            'Cargo'           => $Cargo
        );

        $this->clientes_user_model->update($ID_Cliente, $clientes_array);

        redirect(base_url() . 'users/dash/perfil');
        //Falta el redirect
    }

    //------------------------------------------- Funciones que solo se usan en este controlador-----------------------------------
    private function alojamientos_servicios_array_final($servicios_total = array(), $servicios_alojamiento = array())
    {

        $ac = $this->session->userdata('logged_in');
        $this->gf->comp_sesion($ac, base_url());

        //Inicializo la variable que sera a donde se metan todos los array
        $a[]     = "";
        //La variable que contrendra cuales son los check chekeados
        $checked = "";
        //Un contador para pugar el primer elemento cosa que el array tenga el primer elemento
        //para luego pugar los demas
        $count   = 0;
        foreach ($servicios_total as $var0)
        {
            $count++;
            foreach ($servicios_alojamiento as $var1)
            {
                if ($var0['Servicio'] != $var1['Servicio'])
                {
                    $checked = "";
                }
                else
                {
                    $checked = "checked='checked'";
                    break; //En caso de ser iguales se hace un brack para que no se sobrescriba la variable
                }
            }

            $b = array(
                'Servicio'    => $var0['Servicio'],
                'ID_Servicio' => $var0['ID_Servicio'],
                'checked'     => $checked
            );

            if ($count == 1)
            //Pongo el primer elemento del array
                $a[0] = $b;
            else
            //Se puja el array
                array_push($a, $b);
        }

        return $a;
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
?>