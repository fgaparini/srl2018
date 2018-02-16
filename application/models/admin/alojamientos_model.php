<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Alojamientos_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct(); 
    }

    function insert($nombre_tabla, $row = array())
    {
        $this->db->insert($nombre_tabla, $row);
        return $this->db->insert_id();
    }

    function update($id, $row = array(), $id_nombre, $nombre_tabla)
    {
        $this->db->where($id_nombre, $id);
        $this->db->update($nombre_tabla, $row);
    }
    
    function delete($id_alojamiento)
    {
       $query_alojamientos=sprintf("delete from alojamientos where ID_Alojamiento=%s;",$id_alojamiento);
       $query_informaciongeneral=sprintf("delete from informaciongeneral where ID_InformacionGeneral=%s;",$id_alojamiento);
       $query_metododepago=sprintf("delete from metododepago where ID_MP=%s;",$id_alojamiento);
       $query_alojamientos_servicios=sprintf("delete from alojamientos_servicios where ID_Alojamiento=%s;",$id_alojamiento);
       $query_alojamientos_imagenes=sprintf("delete from alojamientos_imagenes where ID_Alojamiento=%s;",$id_alojamiento);
       $query_alojamientos_habitaciones=sprintf("delete from alojamientos_habitaciones where ID_Alojamiento=%s;",$id_alojamiento);
       $query_publicidad=sprintf("delete from alojamientos_publicidad where ID_Alojamiento=%s;",$id_alojamiento);
       $query_estadistica_alojar=sprintf("delete from estadistica_alojar where ID_Alojamiento=%s;",$id_alojamiento);
       
       $this->db->query($query_alojamientos);
       $this->db->query($query_informaciongeneral);
       $this->db->query($query_metododepago);
       $this->db->query($query_alojamientos_servicios);
       $this->db->query($query_alojamientos_imagenes);
       $this->db->query($query_alojamientos_habitaciones);
       $this->db->query($query_publicidad);
       $this->db->query($query_estadistica_alojar);
       
    }

    function count($id_alojamiento)
    {
        $query = sprintf("select count(*) as cantidad from alojamientos where id_alojamiento=%s", $id_alojamiento);
        $row   = $this->db->query($query);
        $row   = $row->row_array();

        if ($row['cantidad'] > 0)
            return true;
        else
            return false;
    }

    function alojamiento_find($id_alojamiento)
    {
        $query = sprintf('
                select 
                ID_Alojamiento,
                ID_Categorias,
                ID_TipoAlojamiento,
                ID_TipoAlojamientoSub,
                DestaOrden,
                DestaHome,
                Url,
                UrlBooking,
                ID_Bookingcom,
                UrlImage_Booking,
                Activo,
                App_tipo,
                informaciongeneral.ID_InformacionGeneral,
                metododepago.ID_MP, 
                Nombre,
                Direccion,
                Telefono,
                Email,
                WebSite,
                Facebook,
                Twitter,
                Pinterest,
                Gplus,
                Basico,
                Responsable,
                Descripcion,
                Coordenadas,
                TipoAcuerdo,
                Pais,
                Provincia,
                Ciudad,
                Localidad,
                Restaurant,
                InformacionRestaurant,
                Checkin,
                Checkout,
                PoliticaCancelacion,
                DiasPolitica,
                Senia,
                GarantiaDebooking,
                Anticipado,
                ComisionSenia,
                AceptaSenia,
                Comision,
                MejorPrecio
                from alojamientos
                inner join 
                informaciongeneral 
                on  
                alojamientos.ID_InformacionGeneral = informaciongeneral.ID_InformacionGeneral 
                inner join
                metododepago
                on
                alojamientos.ID_MP=metododepago.ID_MP
                where 
                ID_Alojamiento=%s', $id_alojamiento);

        $rows = $this->db->query($query);

        return $rows;
    }

    function buscar_habitaciones($valor, $paxmax, $fecha_desde, $fecha_hasta)
    {
        $query = sprintf(
                "
                select 
                h.ID_Habitacion,
                h.NombreHab,
                th.TipoHabitacion,
                h.PaxMax,
                i.Checkin,
                i.Checkout,
                c.cant_disponible,
                c.fecha
                from 
                alojamientos_habitaciones as ah
                inner join 
                habitaciones as h
                on 
                h.ID_Habitacion = ah.ID_Habitacion 
                inner join 
                alojamientos as a
                on
                a.ID_Alojamiento = ah.ID_Alojamiento
                inner join
                informaciongeneral as i
                on
                i.ID_InformacionGeneral = i.ID_InformacionGeneral
                inner join
                tipo_habitaciones as th
                on
                h.ID_TipoHabitacion=th.ID_TipoHabitacion
                inner join
                cal_calendario as c
                on
                c.id_habitacion = h.ID_Habitacion

                where i.nombre='%s' and c.fecha>'%s' and c.fecha<='%s' and h.PaxMax>=%s ", $valor, $paxmax, $fecha_desde, $fecha_hasta);


        $rows = $this->db->query($query);
        $rows = result_array();
        return $rows;
    }

    function tipo_alojamientos()
    {
        $query = "select * from tipoalojamiento";
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    function alojamientos_filtro($NombreAlojamiento, $TipoAlojamiento,$TipoAcuerdo, $start, $end)
    {

        $where = "";
        $select_count = " select 
                        count(*) as cantidad         
                        from 
                        alojamientos as a
                        inner join 
                        informaciongeneral as i
                        on a.ID_InformacionGeneral  = i.ID_InformacionGeneral 
                        inner join 
                        tipoalojamiento as t
                        on a.ID_TipoAlojamiento =  t.ID_TipoAlojamiento 
                         inner join 
                        localidades as l
                        on i.Localidad = l.ID_Localidades
                        ";


        $select = "select
                        *
                    from 
                        alojamientos as a
                    inner join 
                        informaciongeneral as i
                        on a.ID_InformacionGeneral  = i.ID_InformacionGeneral 
                    inner join 
                        tipoalojamiento as t
                        on a.ID_TipoAlojamiento =  t.ID_TipoAlojamiento
                    inner join 
                        localidades as l
                        on i.Localidad = l.ID_Localidades
                     ";

        //Si no viene nada no pongo where
        if ($NombreAlojamiento == "" and $TipoAlojamiento == "" and $TipoAcuerdo =="0")
            $where = "";
        else
            $where = " where";

        $arg = "";

        if ($NombreAlojamiento != "")
        {
            $arg = " i.Nombre like '%" . $NombreAlojamiento . "%'";
        }
        if ($TipoAlojamiento != "")
        {
            if ($arg != "")
                $arg = $arg . " and a.ID_TipoAlojamiento='" . $TipoAlojamiento . "'";
            else
                $arg = " a.ID_TipoAlojamiento='" . $TipoAlojamiento . "'";
        }
        if($TipoAcuerdo !="0")
        {
            if ($arg != "")
                $arg = $arg . " and a.TipoAcuerdo='" . $TipoAcuerdo . "'";
            else
                $arg = " a.TipoAcuerdo='" . $TipoAcuerdo . "'";
        }

        $order = " order by a.ID_Alojamiento desc";

        $litmit = " limit " . $start . "," . $end . "";


        $query_final       = $select . $where . $arg . $order . $litmit;
        $query_final_count = $select_count . $where . $arg;

        $row_count   = $this->db->query($query_final_count);
        $row_count   = $row_count->row();
        $total_count = $row_count->cantidad;

        $rows = $this->db->query($query_final);
        $rows = $rows->result_array();

        $array_return = array(
            'total_count' => $total_count,
            'rows'        => $rows
        );
        return $array_return;
    }

    function categorias()
    {
        $query = "select * from categorias";
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    function paises()
    {
        $query = "select * from paises order by CountryName asc";
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    function provincias($pais)
    {
        $query = sprintf("select * from provincias where SUCountry='%s'", $pais);
        $array = $this->db->query($query);
        $array = $array->result_array();
        return $array;
    }

    function ciudades($pais, $provincia)
    {
        $query = sprintf("select * from ciudades where Country='%s' and Subdivision='%s'", $pais, $provincia);
        $array = $this->db->query($query);
        $array = $array->result_array();
        return $array;
    }

    function localidades($pais, $provincia, $ciudad)
    {
        $query = sprintf("select * from localidades where Country='%s' and Subdivision='%s' and Location='%s' ", $pais, $provincia, $ciudad);
        $array = $this->db->query($query);
        $array = $array->result_array();
        return $array;
    }
    
    function localidades_simple()
    {
        $query = "select * from localidades";
        $array = $this->db->query($query);
        $array = $array->result_array();
        return $array;
    }

    function info_gral_view($id_alojamiento)
    {
        $query = "
        select 
        ID_Alojamiento, 
        Nombre,
        Descripcion,
        Coordenadas,
        Direccion,
        Telefono,
        Responsable,
        Email,
        Checkin,
        Checkout,
        Name,
        SUName,
        Facebook,
        Twitter,
        Pinterest,
        Gplus,
        Url
        from alojamientos
        inner join 
        informaciongeneral 
        on  
        alojamientos.ID_InformacionGeneral = informaciongeneral.ID_InformacionGeneral
        inner join 
        ciudades 
        on 
        informaciongeneral.Ciudad = ciudades.Location 
        inner join 
        provincias 
        on 
        informaciongeneral.Provincia = provincias.SUcode 
        where 
        ID_Alojamiento=" . $this->db->escape_str($id_alojamiento);

        $rows = $this->db->query($query);
        $rows = $rows->row();
        return $rows;
    }

    //Se usa solo para la vista servicios
    function servicios_select()
    {
        $query = "select * from servicios order by Servicio";
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    function publicidad_select()
    {
        $query = "select * from tipopublicidad";

        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }

    function find_precio_tipo_publicidad($id_tipopublicidad)
    {
        $query = sprintf("select Precio from tipopublicidad where ID_TipoPublicidad=%s", $id_tipopublicidad);
        $row   = $this->db->query($query);
        $row   = $row->row();
        return $row->Precio;
    }

    function find_precio_publicidad($id_publicidad)
    {
        $query = sprintf("select Precio, ID_TipoPublicidad from publicidad where ID_Publicidad=%s ", $id_publicidad);
        $row   = $this->db->query($query);
        $row   = $row->row();
        return $row;
    }

    function insert_alojamientos_publicidad($id_alojamientos, $id_publicidad)
    {
        $query = sprintf("insert 
                          into 
                          alojamientos_publicidad 
                          (ID_Alojamiento, ID_Publicidad) 
                          values 
                          (%s,%s)", $id_alojamientos, $id_publicidad);
        $this->db->query($query);
    }

    function alojamientos_servicios_select($id_alojamientos)
    {
        $query = sprintf("
        select 
        servicios.ID_Servicio,
        Servicio 
        from servicios 
        inner join 
        alojamientos_servicios 
        on 
        servicios.ID_Servicio = alojamientos_servicios.ID_Servicio 
        where 
        ID_Alojamiento =%s", $id_alojamientos);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    function alojamientos_info_gral($id_alojamiento)
    {
        $query = sprintf("select 
                        Nombre,
                        ID_Alojamiento,
                        Coordenadas,
                        Direccion 
                        from alojamientos 
                        inner join 
                        informaciongeneral 
                        on 
                        alojamientos.ID_InformacionGeneral = informaciongeneral.ID_InformacionGeneral
                        where 
                        ID_Alojamiento=%s", $this->db->escape_str($id_alojamiento));

        $rows = $this->db->query($query);

        if ($rows->num_rows > 0)
            $rows = $rows->row();
        else
            $rows = 0;

        return $rows;
    }

    function insert_alojamientos_servicios($id_alojamientos, $id_servicios)
    {
        $query = sprintf("insert 
                          into 
                          alojamientos_servicios 
                          (ID_Alojamiento, ID_Servicio) 
                          values 
                          (%s,%s)", $id_alojamientos, $id_servicios);
        $this->db->query($query);
    }

    function delete_alojamientos_servicios($id_alojamiento)
    {
        $query = sprintf("delete from alojamientos_servicios where ID_Alojamiento=%s", $id_alojamiento);
        $this->db->query($query);
    }

    function info_servicios($id_alojamiento)
    {
        //select servicios.ID_Servicio,Servicio from alojamientos_servicios inner join servicios on alojamientos_servicios.ID_Servicio=servicios.ID_Servicio
        $query = sprintf("select servicios.ID_Servicio,Servicio from alojamientos_servicios inner join servicios on alojamientos_servicios.ID_Servicio=servicios.ID_Servicio where ID_Alojamiento=%s order by Servicio", $id_alojamiento);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    function update_estado_publicidad_simple($id_publicidad, $estado)
    {
        $query = sprintf("update publicidad set Activo=%s where ID_Publicidad=%s", $estado, $id_publicidad);
        $this->db->query($query);
    }

    function update_estado_publicidad($id_publicidad)
    {
        $query  = sprintf("select Activo from publicidad where ID_Publicidad=%s", $id_publicidad);
        $row    = $this->db->query($query);
        $row    = $row->row();
        $activo = $row->Activo;
        $valor  = 1;
        if ($activo == 1)
            $valor  = 0;
        else
            $valor  = 1;

        $query = sprintf("update publicidad set activo=%s where ID_Publicidad=%s", $valor, $id_publicidad);
        $this->db->query($query);
    }

    function info_publicidad($id_alojamiento)
    {
        $query = sprintf("
                            select
                            p.ID_Publicidad,
                            TipoPublicidad,
                            p.Precio,
                            FechaPublicidad,
                            Activo,
                            DetallePublicidad,
                            PERIOD_DIFF(EXTRACT(YEAR_MONTH FROM NOW()), EXTRACT(YEAR_MONTH FROM FechaPublicidad)) AS Meses
                            from 
                            alojamientos_publicidad as ap
                            inner join
                            publicidad as p
                            on 
                            p.ID_Publicidad = ap.ID_Publicidad
                            inner join
                            tipopublicidad as tp
                            on
                            p.ID_TipoPublicidad = tp.ID_TipoPublicidad            
                            where ID_Alojamiento=%s order by activo desc", $id_alojamiento);

        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }

    //Fin funciones para vista servicios
    //Se usa para imagenes
    function images_save($id_alojamiento, $nombre_imagen)
    {

        $query2 = sprintf("select count(*) as total from alojamientos_imagenes where NombreImagen=%s and ID_Alojamiento = %s", $nombre_imagen,$id_alojamiento);
        $rows = $this->db->query($query2); 
       
        $row= $rows->row();

        $count = $row->total;
    
        if($count== 0){
        
            $query = sprintf("insert into alojamientos_imagenes (ID_Alojamiento,NombreImagen) values (%s,%s)", $id_alojamiento, $nombre_imagen);
            $this->db->query($query);   
        }
        return $count;
    }

    function images_delete($id_alojamiento)
    {
        $query = sprintf("delete from alojamientos_imagenes where ID_Alojamiento=%s", $id_alojamiento);
        $this->db->query($query);
    }

    function images_delete_nombre_imagen($id_alojamiento, $nombre_foto)
    {
        $query = sprintf("delete from alojamientos_imagenes where ID_Alojamiento=%s and NombreImagen='%s'", $id_alojamiento, $nombre_foto);
        $this->db->query($query);
    }

    function images_count($id_alojamiento)
    {
        $query = sprintf("select MAX(NombreImagen) as count from alojamientos_imagenes where ID_Alojamiento=%s", $id_alojamiento);
        $rows  = $this->db->query($query);
        $rows  = $rows->row();
        return $rows->count;
    }

    function fotos_list($id_alojamiento)
    {
        $query = sprintf("select * from alojamientos_imagenes where ID_Alojamiento=%s", $id_alojamiento);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    //Fin imagenes
    //funciones para el apartado de clientes

    function clientes_list($id_alojamiento)
    {
        $query = sprintf(
                "select 
                    * 
                    from 
                    alojamientos_clientes 
                    inner join 
                    clientes 
                    on 
                    alojamientos_clientes.ID_Cliente=clientes.ID_Cliente 
                    where 
                    ID_Alojamiento=%s", $id_alojamiento);

        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }

    function clientes_find($id_clientes)
    {
        $query = sprintf("select * from clientes where ID_Cliente=%s", $id_clientes);
        $rows  = $this->db->query($query);
        return $rows;
    }

    //fin clientes
    //funciones para el apartado habitaciones
    function tipo_habitaciones_list()
    {
        $query = "select * from tipo_habitaciones";
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    function tipo_desayunos_list()
    {
        $query = "select * from tipo_desayunos";
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    function habitaciones_list($id_alojamiento)
    {
        $query = sprintf(
                "select 
                ID_Alojamiento,habitaciones.ID_Habitacion,NombreHab,DescripcionHab,Desayuno,PaxMax,PaxAdulto,PaxNinio,TipoHabitacion
                from habitaciones 
                inner join tipo_habitaciones 
                on
                tipo_habitaciones.ID_TipoHabitacion = habitaciones.ID_TipoHabitacion 
                inner join alojamientos_habitaciones
                on
                alojamientos_habitaciones.ID_Habitacion = habitaciones.ID_Habitacion
                inner join tipo_desayunos
                on
                tipo_desayunos.ID_Desayuno = habitaciones.ID_Desayuno
                where ID_Alojamiento=%s", $id_alojamiento
        );
        
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }

    function imageshab_delete($id_habitacion)
    {
        $query = sprintf("delete from habitaciones_imagenes where ID_Habitacion=%s", $id_habitacion);
        $this->db->query($query);
    }

    function imageshab_delete_nombre_imagen($id_habitacion, $nombre_foto)
    {
        $query = sprintf("delete from habitaciones_imagenes where ID_Habitacion=%s and NombreImagenHab=%s", $id_habitacion, $nombre_foto);
        $this->db->query($query);
    }

    function imageshab_count($id_habitacion)
    {
        $query = sprintf("select MAX(NombreImagenHab) as count from habitaciones_imagenes where ID_Habitacion=%s", $id_habitacion);
        $rows  = $this->db->query($query);
        $rows  = $rows->row();
        return $rows->count;
    }

    function imageshab_save($id_habitacion, $nombre_imagen)
    {
        $query = sprintf("insert into habitaciones_imagenes (ID_Habitacion,NombreImagenHab) values (%s,%s)", $id_habitacion, $nombre_imagen);
        $this->db->query($query);
    }

    function imageneshab_list($id_habitacion)
    {
        $query = sprintf("select * from habitaciones_imagenes where ID_Habitacion=%s", $id_habitacion);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    function habitaciones_find($ID_Habitacion)
    {
        $query = sprintf("select * from habitaciones where ID_Habitacion=%s", $ID_Habitacion);
        $rows  = $this->db->query($query);
        return $rows;
    }

    //fin habitaciones
    //funciones ubicacion
    function alojamiento_ubicacion_update($id_alojamiento, $coordenadas)
    {
        $query = sprintf("select ID_InformacionGeneral from alojamientos where ID_Alojamiento=%s", $id_alojamiento);
        $row   = $this->db->query($query);
        $row   = $row->row();


        $query = sprintf('update informaciongeneral set Coordenadas="%s" where ID_InformacionGeneral=%s', $coordenadas, $id_alojamiento);

        $this->db->query($query);
    }
    
    function find_mail_alojamiento($ID_Alojamiento)
    {
        $query=sprintf("select 
                            Email,
                            Nombre,
                            TipoAlojamiento
                        from
                            alojamientos a
                                inner join
                            informaciongeneral i ON i.ID_InformacionGeneral = a.ID_InformacionGeneral
                                inner join
                            tipoalojamiento ta On ta.ID_TipoAlojamiento = a.ID_TipoAlojamiento
                        where
                            a.ID_Alojamiento = %s;",$ID_Alojamiento);
        $row = $this->db->query($query);
        $row = $row->row_array();
        return $row;
                
    }

    function get_info_app($id_alojar) {


        $query = sprintf("select ia.* , ig.nombre nombre,a.app_tipo from informacionapp ia inner join alojamientos a on  ia.ID_informacionAPP= %s inner join informaciongeneral ig on ig.ID_informaciongeneral =ia.ID_informacionAPP where a.id_alojamiento = %s ",$id_alojar,$id_alojar);
       
        $rows = $this->db->query($query);
        if($rows->num_rows()>0){
         $rows = $rows->row();
        }else {

        $query2 = sprintf("select a.app_tipo,ig.nombre nombre,ig.id_informaciongeneral ID_informacionAPP, ig.email emailAPP,ig.telefono TelefonoAPP, ig.descripcion DescripcionAPP from informaciongeneral  ig inner join alojamientos a on ig.ID_informaciongeneral  = %s where a.id_alojamiento = %s ",$id_alojar,$id_alojar);
       
        $rows = $this->db->query($query2);
 $rows = $rows->row();
        }
        return $rows;
    //print_r($rows);
    
    }
    function find_app ($idapp) {
         $query = sprintf("select * from informacionapp where ID_informacionAPP =%s",$idapp);
       
        $rows = $this->db->query($query);
        $rows = $rows->row();
        return $rows;
    }

      function insert_update_appdata($idapp, $nombre_tabla, $row = array())
    {
       $query = sprintf("select * from informacionapp where ID_informacionAPP =%s",$idapp);
       
        $rows = $this->db->query($query);
         $query2 = sprintf("update alojamientos set ID_informacionAPP = %s  ",$idapp);
        $this->db->query($query2);

        if($rows->num_rows()>0){
        $this->db->where("ID_informacionAPP", $idapp);
        $this->db->update($nombre_tabla, $row);
        }else{
        $this->db->insert($nombre_tabla, $row);
        }
    }
}

?>
