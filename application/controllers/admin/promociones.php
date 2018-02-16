<?php

class Promociones extends CI_Controller
{

    const title_save_form   = 'Nueva promoción';
    const title_update_form = 'Editar promoción';
    const title_list_form   = 'Listado promociones';

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/promociones_model');
        $this->load->library('form_validation');
        $this->load->library('gf');
    }

    function index()
    {
        $this->lists();
    }

    function form($id = 0)
    {

        //Traigo el alojamiento
        $ID_Alojamiento = $this->input->get('ID_Alojamiento');

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
            $row            = $this->promociones_model->find($id);
            $ID_Promocion   = $row['ID_Promocion'];
            $NombrePromo    = $row['NombrePromo'];
            $DetallePromo   = $row['DetallePromo'];
            $DesdePromo     = $this->gf->html_mysql($row['DesdePromo']);
            $HastaPromo     = $this->gf->html_mysql($row['HastaPromo']);
            

            
            $ID_Alojamiento = $row['ID_Alojamiento'];

            $title = self::title_update_form;
        }
        else
        {
            $title = self::title_save_form;
        }

        $data['view'] = "admin/promociones/promociones_form";
        $data['css']  = array(
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
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function save()
    {
        //Validacion formulario
        $this->form_validation->set_rules('NombrePromo', 'Nombre', 'required');
        $this->form_validation->set_rules('DetallePromo', 'Detalle', 'required');
        $this->form_validation->set_rules('DesdePromo', 'Desde', 'required');
        $this->form_validation->set_rules('HastaPromo', 'Hasta', 'required');
        $this->form_validation->set_rules('ID_Alojamiento', '', '');
        //Variables post a guardar
        $ID_Promocion   = $this->input->post('ID_Promocion');
        $NombrePromo    = $this->input->post('NombrePromo');
        $DetallePromo   = $this->input->post('DetallePromo');
        $DesdePromo     = $this->gf->html_mysql($this->input->post('DesdePromo'));
        $HastaPromo     = $this->gf->html_mysql($this->input->post('HastaPromo'));
        
        
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
                redirect(base_url() . 'admin/promociones/lists/'.$ID_Alojamiento, 'refresh');
            }
            else
            {
                $this->promociones_model->update($ID_Promocion, $datos_array);
                redirect(base_url() . 'admin/promociones/lists/'.$ID_Alojamiento, 'refresh');
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
                //Variables a pasar segun la vista
                $data['title'] = self::title_save_form;
                $data['view']  = "admin/promociones/promociones_form";
                $this->load->view('admin/templates/temp_menu', $data);
            }
            else
            {
                $data['title'] = self::title_update_form;
                $data['view']  = "admin/promociones/promociones_form";
                $this->load->view('admin/templates/temp_menu', $data);
            }
        }
    }

    function lists($ID_Alojamiento=0)
    {
        $data['datos_array']    = $this->promociones_model->list_inner_alojamiento($ID_Alojamiento);
        $data['ID_Alojamiento'] = $ID_Alojamiento;
        
        $data['title']          = self::title_list_form;
        $data['view']           = "admin/promociones/promociones_list";
        $this->load->view('admin/templates/temp_menu', $data);
    }

    function delete($id)
    {
        $ID_Alojamiento = $this->input->get('ID_Alojamiento');
        $this->promociones_model->delete($id);
        redirect(base_url() . 'admin/promociones/lists/'.$ID_Alojamiento, 'refresh');
    }

}

?>