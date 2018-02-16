<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reservas_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function insert($row = array())
    {
        $this->db->insert('reserva_dat', $row);
        return $this->db->insert_id();
    }

    function update($id, $row = array())
    {
        $this->db->where('reservas_id', $id);
        $this->db->update('reserva_dat', $row);
    }

    function find($id)
    {
        $this->db->where('reservas_id', $id);
        $rows = $this->db->get('reserva_dat');
        return $rows;
    }


    
    //esto
    function datos_habitacion($id_habitacion)
    {
         $query = sprintf("
                        select 
                        h.NombreHab, h.UnidadAlojativa,th.TipoHabitacion,h.PaxMax
                        from habitaciones h ,tipo_habitaciones th WHERE h.ID_TipoHabitacion = th.ID_TipoHabitacion AND
                        h.ID_Habitacion = %s", $id_habitacion);
        $row   = $this->db->query($query);
        
        $row   = $row->row();
        return $row;
    }
    
    function precio_cal_calendar($id_habitacion, $fecha)
    {
        $query = sprintf("
                        select 
                        c.tarifa_oferta, c.tarifa_normal
                        from
                        cal_calendario c
                        where 
                        c.id_habitacion=%s 
                        and c.fecha='%s'", $id_habitacion, $fecha);

        $row = $this->db->query($query);
        $row = $row->row_array();
        return $row;
    }
    
    
    function comision_mp($id_alojamiento)
    {
        $query = sprintf("
            select m.Comision from alojamientos as a
            inner join 
            metododepago as m
            on
            a.ID_MP=m.ID_MP
            where a.ID_Alojamiento=%s", $id_alojamiento);
        $row   = $this->db->query($query);
        $row   = $row->row();
        return $row->Comision;
    }
    
    function update_mail($tipo, $mail, $Localizador)
    {
        if ($tipo == "alojamiento")
        {
            $query = sprintf("update reserva_dat set mail_alojamiento='%s'  where Localizador='%s' ", $mail, $Localizador);
            $this->db->query($query);
        }
        else if ($tipo == "huesped")
        {
            $query = sprintf("update reserva_dat set mail_huesped='%s' where Localizador='%s'   ", $mail, $Localizador);
            $this->db->query($query);
        }
        else if ($tipo == "sanrafaellate")
        {
            $query = sprintf("update reserva_dat set mail_sanrafaellate='%s'  where Localizador='%s'  ", $mail, $Localizador);
            $this->db->query($query);
        }
        else
        {
            return "";
        }

        $this->db->query($query);
    }
    
    function max_id()
    {
        $query = "select max(reservas_id) as max_id from reserva_dat";
        $row   = $this->db->query($query);
        $row   = $row->row();
        return $row->max_id;
    }
    
}