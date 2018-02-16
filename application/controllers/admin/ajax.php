<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('gf');
    }

    function alojamientos_form_select()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $pais = $this->input->get('pais');
        $provincia = $this->input->get('provincia');
        $ciudad = $this->input->get('ciudad');
        $tipo = $this->input->get('tipo');
        $array_mostrar = "";

        switch ($tipo)
        {
            case 'pais':
                $query = sprintf("select * from provincias where SUCountry='%s'", $pais);
                $array = $this->db->query($query);
                $array = $array->result_array();

                foreach ($array as $var)
                {
                    $array_codes = $var['SUCode'] . "," . $var['SUName'] . "-";
                    $array_mostrar = $array_mostrar . $array_codes;
                }
                //echo $array_mostrar;


                break;
            case 'provincia':
                $query = sprintf("select * from ciudades where Country='%s' and Subdivision='%s'", $pais, $provincia);
                $array = $this->db->query($query);
                $array = $array->result_array();

                foreach ($array as $var)
                {
                    $array_codes = $var['Location'] . "," . $var['Name'] . "-";
                    $array_mostrar = $array_mostrar . $array_codes;
                }

                break;
            case 'ciudad':
                $query = sprintf("select * from localidades where Country='%s' and Subdivision='%s' and Location='%s' ", $pais, $provincia, $ciudad);
                $array = $this->db->query($query);
                $array = $array->result_array();

                foreach ($array as $var)
                {
                    $array_codes = $var['ID_Localidades'] . "," . $var['Localidad'] . "-";
                    $array_mostrar = $array_mostrar . $array_codes;
                }
                break;
        }
        $array_mostrar = substr($array_mostrar, 0, strlen($array_mostrar) - 1);
        echo $array_mostrar;
    }

    function clientes_eliminar()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());

        $query = sprintf("delete from clientes where ID_Cliente=%s", $this->input->post('ID_Cliente'));
        $this->db->query($query);
    }

    function habitaciones_eliminar()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $query = sprintf('delete from habitaciones where ID_Habitacion=%s', $this->input->post('ID_Habitacion'));
        $this->db->query($query);
    }

    //Funcion para borrar imagen
    function alojamientos_imagenes_delete()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $nombre_imagen = $this->input->post('NombreImagen');
        $id_alojamiento = $this->input->post('ID_Alojamiento');
        $query = sprintf("delete from alojamientos_imagenes where ID_Alojamiento=%s and NombreImagen=%s", $id_alojamiento, $nombre_imagen);
        $this->db->query($query);
    }

    //Funcion para borrar imagen
    function habitaciones_imagenes_delete()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $nombre_imagen = $this->input->post('NombreImagenHab');
        $id_habitacion = $this->input->post('ID_Habitacion');
        $query = sprintf("delete from habitaciones_imagenes where ID_Habitacion=%s and NombreImagenHab=%s", $id_habitacion, $nombre_imagen);
        $this->db->query($query);
    }

    //Funcion para listar los alojamientos con el autocompletado
    function reservas_alojamientos_list()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $query = "select informaciongeneral.nombre as name, alojamientos.ID_Alojamiento from alojamientos inner join informaciongeneral on alojamientos.ID_InformacionGeneral = informaciongeneral.ID_InformacionGeneral";
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        $array_comas = "";
        foreach ($rows as $var)
        {
            $array_comas = $var['name'] . "-" . $var['ID_Alojamiento'] . "," . $array_comas;
        }
        $array_comas = substr($array_comas, 0, strlen($array_comas) - 1);

        echo $array_comas;
    }

    function empresas_imagenes_descripcion()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $id_empresa = $this->input->post('ID_Empresa');
        $imagenempresa = $this->input->post('ImagenEmpresa');
        $imagendescripcion = $this->input->post('ImagenDescripcion');


        $query = sprintf('update empresas_imagenesemp set ImagenDescripcion="%s" where ID_Empresa=%s and ImagenEmpresa=%s', $imagendescripcion, $id_empresa, $imagenempresa);

        echo $query;
        $this->db->query($query);
    }
    
    function empresas_delete()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $id_empresa = $this->input->post('ID_Empresa');
        $query = sprintf("delete from empresas where ID_Empresa=%s",$id_empresa);
        $this->db->query($query);
    }

    function paginas_imagenes_descripcion()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $id_pagina = $this->input->post('ID_Pagina');
        $imagenpagina = $this->input->post('ImagenPagina');
        $imagendescripcion = $this->input->post('ImagenDescripcion');
        $query = sprintf('update paginas_imagenespag set ImagenDescripcion="%s" where ID_Pagina=%s and ImagenPagina=%s', $imagendescripcion, $id_pagina, $imagenpagina);

        echo $query;
        $this->db->query($query);
    }
       function paginas_imagenes_descripcion_slider()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $id_pagina = $this->input->post('ID_Pagina');
        $imagenpagina = $this->input->post('ImagenPagina');
        $imagendescripcion = $this->input->post('ImagenDescripcion');
        $query = sprintf('update paginas_imagenespag_slider set ImagenDescripcion="%s" where ID_Pagina=%s and ImagenPagina=%s', $imagendescripcion, $id_pagina, $imagenpagina);

        echo $query;
        $this->db->query($query);
    }
    function paginas_delete()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $id_pagina = $this->input->post('ID_Pagina');
        $query=sprintf("delete from paginas where ID_Pagina=%s",$id_pagina);
        $this->db->query($query);
    }

    function agendas_imagenes_descripcion()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $id_agenda = $this->input->post('ID_Agenda');
        $imagenagenda = $this->input->post('ImagenAgenda');
        $imagendescripcion = $this->input->post('ImagenDescripcion');
        $query = sprintf('update agendas_imagenesage set ImagenDescripcion="%s" where ID_Agenda=%s and ImagenAgenda=%s', $imagendescripcion, $id_agenda, $imagenagenda);
        $this->db->query($query);
    }

    function habitaciones_imagenes_descripcion()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $id_habitacion = $this->input->post('ID_Habitacion');
        $imagenhabitacion = $this->input->post('ImagenHabitacion');
        $imagendescripcion = $this->input->post('ImagenDescripcion');
        $query = sprintf('update habitaciones_imagenes set ImagenDescripcion="%s" where ID_Habitacion=%s and NombreImagenHab=%s', $imagendescripcion, $id_habitacion, $imagenhabitacion);
        $this->db->query($query);
    }
    
    function alojamientos_imagenes_descripcion()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $id_alojamiento = $this->input->post('ID_Alojamiento');
        $nombreimagen = $this->input->post('NombreImagen');
        $imagendescripcion = $this->input->post('ImagenDescripcion');
        $query = sprintf('update alojamientos_imagenes set ImagenDescripcion="%s" where ID_Alojamiento=%s and NombreImagen=%s', $imagendescripcion, $id_alojamiento, $nombreimagen);
        $this->db->query($query);
        echo $query;
    }
    
    function subtipoempresas_list()
    {
        $a              = $this->session->userdata('logged');
        $this->gf->comp_sesion_admin($a, base_url());
        
        $ID_TipoEmpresa = $this->input->post('ID_TipoEmpresa');
        $query=sprintf("select ID_SubtipoEmpresa,SubtipoEmpresa from subtipoempresa where ID_TipoEmpresa=%s",$ID_TipoEmpresa);
        $rows=$this->db->query($query);
        $rows=$rows->result_array();
        
        echo json_encode($rows);
    }
    
    function estado_alojamiento()
    {
        $ID_Alojamiento = $this->input->post('ID_Alojamiento');
        
        $query_buscar = sprintf("select Activo from alojamientos where ID_Alojamiento = %s limit 1",$ID_Alojamiento);
        $row = $this->db->query($query_buscar);
        $row = $row->row_array();
        //Buscar variable Activo
        $activo = $row['Activo'];
        $a_update ="";
        if($activo=='A' ){
            $a_update='D';
            echo "no";
        }
        elseif($activo=='D'){
            $a_update='A';
            echo "si";
        }
        
        $query_update = sprintf("update alojamientos set Activo='%s' where ID_Alojamiento=%s",$a_update,$ID_Alojamiento);
        $this->db->query($query_update);
        
    }
    
    function upload_fecha_publicidad()
    {
        $fecha_publicidad = $this->input->post('fecha_publicidad');
        $id_publicidad = $this->input->post('id_publicidad');
        $fecha_publicidad = $this->gf->html_mysql($fecha_publicidad);
        $query=sprintf("update publicidad set FechaPublicidad='%s' where ID_Publicidad=%s",$fecha_publicidad,$id_publicidad);
        $this->db->query($query);
        
        echo "si";
    }
}
?>
