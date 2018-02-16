<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Alojamientos_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('gf');
        $this->load->model('user/alojamientos_clientes_user_model');
        $this->load->model('user/alojamientos_user_model');
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
        $this->load->config('avanbook_config');
    }

    function index()
    {
        $this->form_view_user();
    }

    //Mostrar Alojamiento
    function form_view_user()
    {
        $a              = $this->session->userdata('logged_user_in');
        $this->gf->comp_sesion($a, base_url());
        //Buscar el alojamiento que viene de la sesion del cliente con el cliente_id
        $ID_Alojamiento = $this->alojamientos_clientes_user_model->cliente_alojamiento($a['ID_Cliente']);

        $pestania = $this->input->get('pestania');
        if ($pestania == "")
            $pestania = "info";

        $data['p_a']             = $pestania;
        $data['title']           = "Mostrar Alojamiento";
        $data['ID_Alojamiento']  = $ID_Alojamiento;
        $data['menu_activo']     = 'info';
        $data['info_array']      = $this->alojamientos_user_model->info_gral_view($ID_Alojamiento);
        //Servicios
        $servicios_total         = $this->servicios_user_model->find_all();
        $servicios_alojamiento   = $this->alojamientos_servicios_user_model->find_id_alojamiento_inner_servicios($ID_Alojamiento);
        //Meto una combinacion de esos array en un array nuevo
        //La funcion esta al final de este archivo php
        $data['servicios_array'] = $this->alojamientos_servicios_array_final($servicios_total, $servicios_alojamiento);
        $data['fotos_array']     = $this->alojamientos_imagenes_user_model->find_from_id_alo($ID_Alojamiento);
        $data['js']              = array(
            'js/fancybox/jquery.mousewheel-3.0.4.pack',
            'js/fancybox/jquery.fancybox-1.3.4.pack',
            'js/blockui-master/jquery.blockUI',
            'js/user/alojamientos_user_view',
            'js/user/alojamientos_ubicacion_form_user'
        );
        $data['js_ext'] = array('http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAHTiRdnf18YS9VpJkmeSyhBTxt8bDmcuMY2RDz1zwKk3UO1V6uRSXgsbPej969xits0R1bko5xtIfTQ');
        $data['css'] = array('css/admin/alojamientos_list', 'js/fancybox/jquery.fancybox-1.3.4');
        $data['view'] = 'user/alojamientos_user/alojamientos_user_view';
        $this->load->view('user/templates_user/temp_menu_user', $data);
    }

    //Formulario Alojamiento
    function form_user($id_alojamiento = 0)
    {
        $a              = $this->session->userdata('logged_user_in');
        $this->gf->comp_sesion($a, base_url());
        
        //Apuntadores, segun tipo formulario a mostrar (update or insert) cambian los valores, y para no repetir
        //todo de nuevo uso apuntadores.
        //Tabla alojamientos
        $data['ID_Alojamiento']     = & $ID_Alojamiento;
        $data['ID_Categorias']      = & $ID_Categorias;
        $data['ID_TipoAlojamiento'] = & $ID_TipoAlojamiento;
        //Configuraciones agregadas al ultimo para posicionamiento
        $data['Url']                = & $Url;
        $data['DestaOrden']         = & $DestaOrden;
        $data['DestaHome']          = & $DestaHome;
        $data['Basico']             = & $Basico;

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
            $Restaurant            = $row->Restaurant;
            $InformacionRestaurant = $row->InformacionRestaurant;
            $Checkin               = $row->Checkin;
            $Checkout              = $row->Checkout;
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
        $data['tipoalojamientos_array'] = $this->tipoalojamiento_user_model->find_all();
        $data['categorias_array']       = $this->categorias_user_model->find_all();
        $data['js']                     = array(
            'js/user/alojamientos_form_user',
            'js/ckeditor/ckeditor'
        );
        $data['view'] = 'user/alojamientos_user/alojamientos_form_user';
        $this->load->view('user/templates_user/temp_menu_user', $data);
    }

    //Guardar Formulario alojamiento
    function save()
    {
        $a              = $this->session->userdata('logged_user_in');
        $this->gf->comp_sesion($a, base_url());
        
        $accion                = $this->input->post('accion');
        $ID_Alojamiento        = $this->input->post('ID_Alojamiento');
        $ID_InformacionGeneral = $this->input->post('ID_InformacionGeneral');
        $ID_MP                 = $this->input->post('ID_MP');

        $data_info_gral = array(
            'Nombre'                  => $this->input->post('Nombre'),
            'Direccion'               => $this->input->post('Direccion'),
            'Telefono'                => $this->input->post('Telefono'),
            'Email'                   => $this->input->post('Email'),
            'WebSite'                 => $this->input->post('WebSite'),
            'Responsable'             => $this->input->post('Responsable'),
            'Descripcion'             => $this->input->post('Descripcion'),
            'Coordenadas'             => $this->input->post('Coordenadas'),
            'Restaurant'              => $this->input->post('Restaurant'),
            'InformacionRestaurant'   => $this->input->post('InformacionRestaurant'),
            'InformacionHabitaciones' => $this->input->post('InformacionHabitaciones'),
            'Checkin'                 => $this->input->post('Checkin'),
            'Checkout'                => $this->input->post('Checkout'),
            'PoliticaCancelacion'     => $this->input->post('PoliticaCancelacion'),
            'DiasPolitica'            => $this->input->post('DiasPolitica')
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

        if ($accion == 'crear')
        {
            $id_data_info_gral   = $this->informaciongeneral_user_model->insert($data_info_gral);
            $id_data_metodo_pago = $this->metododepago_user_model->insert($data_metodo_pago);

            $data_alojamientos = array(
                'ID_InformacionGeneral' => $id_data_info_gral,
                'ID_Imagenes'           => 0, //no se sabe
                'ID_TipoAlojamiento'    => $this->input->post('ID_TipoAlojamiento'),
                'ID_Categorias'         => $this->input->post('ID_Categorias'),
                'Url'                   => $this->input->post('Url'),
                'TipoAcurdo'            => $this->input->post('TipoAcuerdo'),
                'DestaOrden'            => $this->input->post('DestaOrden'),
                'DestaHome'             => $this->input->post('DestaHome'),
                'ID_MP'                 => $id_data_metodo_pago,
                'ID_Modulos'            => '0', //no se sabe
                'Votos'                 => '0', //no se sabe
                'Activo'                => 'A', //no se sabe
                'Basico'                => $this->input->post('Basico')
            );

            $id_data_alojamientos = $this->alojamientos_model->insert($data_alojamientos);
            redirect(base_url() . 'user/alojamientos_user/form_view_user/' . $id_data_alojamientos . "/?pestania=info", 'refresh');
        }
        elseif ($accion == 'editar')
        {
            $data_alojamientos = array(
                'ID_InformacionGeneral' => $this->input->post('ID_InformacionGeneral'),
                'ID_Imagenes'           => 0, //no se sabe
                'ID_TipoAlojamiento'    => $this->input->post('ID_TipoAlojamiento'),
                'ID_Categorias'         => $this->input->post('ID_Categorias'),
                'Url'                   => $this->input->post('Url'),
                'TipoAcuerdo'           => $this->input->post('TipoAcuerdo'),
                'DestaOrden'            => $this->input->post('DestaOrden'),
                'DestaHome'             => $this->input->post('DestaHome'),
                'ID_MP'                 => $this->input->post('ID_MP'),
                'ID_Modulos'            => '0', //no se sabe
                'Votos'                 => '0', //no se sabe
                'Activo'                => 'A', //no se sabe
                'Basico'                => $this->input->post('Basico')
            );

            $this->metododepago_user_model->update($ID_MP, $data_metodo_pago);
            $this->informaciongeneral_user_model->update($ID_InformacionGeneral, $data_info_gral);
            $this->alojamientos_user_model->update($ID_Alojamiento, $data_alojamientos);

            redirect(base_url() . 'user/alojamientos_user/form_view_user/', 'refresh');
        }
    }

    //Guardar Servicios
    function servicios_user_save()
    {
        $a              = $this->session->userdata('logged_user_in');
        $this->gf->comp_sesion($a, base_url());
        
        $id_alojamiento = $this->input->post('ID_Alojamiento');
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

        redirect(base_url() . 'user/alojamientos_user/form_view_user/' . $id_alojamiento . "/?pestania=servicios");
    }

    //Funciones para guardar muchas imagenes
    function alojamientos_imagenes_save()
    {
        
        $a              = $this->session->userdata('logged_user_in');
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

                    if ($cantidad_fotos <= 12)
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
        redirect(base_url() . 'user/alojamientos_user/form_view_user/' . $id_alojamiento . "/?pestania=imagenes", 'refresh');
    }

    function alojamientos_ubicacion_save()
    {
        $a              = $this->session->userdata('logged_user_in');
        $this->gf->comp_sesion($a, base_url());
        
        $post_array = $this->input->post();
        $this->informaciongeneral_user_model->coordenadas_update($post_array['ID_Alojamiento'], $post_array['Coordenadas']);
        redirect(base_url().'user/alojamientos_user/form_view_user/' . $post_array['ID_Alojamiento'] . "/?pestania=ubicacion", 'refresh');
    }

    //------------------------------------------- Funciones que solo se usan en este controlador-----------------------------------
    private function alojamientos_servicios_array_final($servicios_total = array(), $servicios_alojamiento = array())
    {
        
        $ac              = $this->session->userdata('logged_user_in');
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

?>
