<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reserva_dat_model extends CI_Model
{

    const tabla    = 'reserva_dat';
    const id_tabla = 'reservas_id';

    /* ------------------------ INSERTAR EN LA BASE DE DATOS----------------------- */

    function insert($row = array())
    {
        $this->db->insert(self::tabla, $row);
        return $this->db->insert_id();
    }

    /* ------------------------ BUSCAR POR ID-------------------------------------- */

    function find($id)
    {
        $query = sprintf("select * from %s where %s='%s'", self::tabla, self::id_tabla, $id);
        $row   = $this->db->query($query);
        $row   = $row->row_array();
        return $row;
    }

    /* ------------------------ LISTAR TODOS LOS ELEMENTOS------------------------ */

    function find_all()
    {
        $query = sprintf("select * from %s ", self::tabla);
        $rows  = $this->db->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    /* ------------------------ MODIFICAR UN REGISTRO----------------------------- */

    function update($id, $row = array())
    {
        $this->db->where(self::id_tabla, $id);
        $this->db->update(self::tabla, $row);
    }

    /* ------------------------ ELIMINAR UN REGISTRO------------------------------- */

    function delete($id)
    {
        $query = sprintf("delete from %s where %s=%s", self::tabla, self::id_tabla, $id);
        $this->db->query($query);
    }

    /* ------------------------ CONTAR RESULTADOS TRAIDOS------------------------------- */

    function count_all()
    {
        $query = sprintf("select count(*) as cantidad from %s", self::tabla);
        $row   = $this->db->query($query);
        $row   = $row->row_array();
        return $row['cantidad'];
    }

    /* ------------------------ CONTAR RESULTADOS TRAIDOS POR ID------------------------------- */

    function count_id($id)
    {
        $query = sprintf("select count(*) as cantidad from %s where %s=%s", self::tabla, self::id_tabla, $id);
        $row   = $this->db->query($query);
        $row   = $row->row_array();
        return $row['cantidad'];
    }
    
    
    //Buscar el al reserva para devolver en el json del dash del calendario de comision
    function find_json_reserva($ID_Alojamiento,$ID_Habitacion)
    {
        $query=  sprintf("
                            select 
                            reservas_id,
                            rd.Localizador,
                            ApellidoHuesped,
                            NombreHuesped,
                            fecha_ingreso,
                            fecha_salida,
                            estado_reserva,
                            web_reserva
                        from
                            reserva_dat rd,
                            reservas_det rt,
                            huesped h
                        where
                            rd.alojamiento_ID = %s
                                AND rt.Localizador = rd.Localizador
                                AND rt.id_habitacion = %s
                                AND h.ID_Huesped = rd.id_huesped GROUP BY rd.reservas_id;",$ID_Alojamiento,$ID_Habitacion);
        
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
    
    function reserva_inner_huesped($id_reserva)
    {
        
        $query=sprintf("select 
                            *
                        from
                            reserva_dat rd
                                inner join
                            huesped h ON h.ID_Huesped = rd.id_huesped
                        where
                            rd.Localizador = '%s'",$id_reserva);
       
        
        $rows = $this->db->query($query);
        $rows = $rows->row_array();

        return $rows;
    }
    
    function reserva_nombre_hab($Localizador)
    {
        $query=sprintf("select 
                            NombreHab
                        from
                            reserva_dat ra,
                            reservas_det re,
                            habitaciones h
                        where
                            ra.Localizador = '%s'
                                and re.Localizador = ra.Localizador
                                and re.id_habitacion = h.ID_Habitacion
                        group by re.id_habitacion;",$Localizador);
        
        $row = $this->db->query($query);
        $row = $row->result_array();
        return $row;
        
    }
    
    function reservas_list($ID_Alojamiento)
    {
        $query=sprintf('select 
                        NombreHuesped,
                            ApellidoHuesped,
                            fecha_ingreso,
                            fecha_salida,
                            web_reserva,
                            estado_reserva,
                            Localizador,
                            costo_total,
                            monto_pago
                    from
                        reserva_dat rda
                            inner join
                        huesped h ON rda.id_huesped = h.ID_Huesped
                    where rda.alojamiento_id=%s;',$ID_Alojamiento);
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
        
    }
    
    function reservas_list_pag($ID_Alojamiento,$start,$end)
    {
        $select =sprintf("select 
                        NombreHuesped,
                            ApellidoHuesped,
                            fecha_ingreso,
                            fecha_salida,
                            web_reserva,
                            estado_reserva,
                            Localizador,
                            costo_total,
                            monto_pago
                    from
                        reserva_dat rda
                            inner join
                        huesped h ON rda.id_huesped = h.ID_Huesped where alojamiento_id=%s",$ID_Alojamiento);
        
        
        
        $select_count = sprintf("select 
                        count(Localizador) as cantidad
                    from
                        reserva_dat rda
                            inner join
                        huesped h ON rda.id_huesped = h.ID_Huesped where alojamiento_id=%s" ,$ID_Alojamiento);
        
        
        $order = " order by fecha_reserva desc";
        $litmit = " limit " . $start . "," . $end . "";


        $query_final = $select . $order . $litmit;
        $query_final_count = $select_count;
        

        $row=$this->db->query($query_final_count);
        $row = $row->row();
        $cantidad = $row->cantidad;
        
        $row = $this->db->query($query_final);
        $row = $row->result_array();
        
         $array_return = array(
            'total_count' => $cantidad,
            'rows' => $row
        );
        return $array_return;
    }

    function find_localizador($Localizador)
    {
        $query=sprintf("select * from reserva_dat where Localizador='%s'",$Localizador);
        $row = $this->db->query($query);
        $row = $row->row_array();
        return $row['monto_pago'];
    }

}

?>
