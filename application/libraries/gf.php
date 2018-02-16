<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gf
{

    function comparar_general($var1, $var2, $result)
    {
        if ($var1 == $var2)
            return $result;
        else
            return "";
    }

    function eliminar_coma($string)
    {
        $array_comas = '';
        if ($string != '')
            $array_comas = substr($string, 0, strlen($string) - 1);
        else
            $array_comas = '';

        return $array_comas;
    }

    function cantidad_dias($fecha_desde, $fecha_hasta)
    {
        //Calcular la cantidad de dias entre una fecha y otra
        $f_desde_array = explode("-", $fecha_desde);
        $f_hasta_array = explode("-", $fecha_hasta);

        $dia_desde = $f_desde_array[0];
        $mes_desde = $f_desde_array[1];
        $ano_desde = $f_desde_array[2];

        $dia_hasta = $f_hasta_array[0];
        $mes_hasta = $f_hasta_array[1];
        $ano_hasta = $f_hasta_array[2];

        //calculo timestam de las dos fechas
        $timestamp1 = mktime(0, 0, 0, $mes_desde, $dia_desde, $ano_desde);
        $timestamp2 = mktime(0, 0, 0, $mes_hasta, $dia_hasta, $ano_hasta);

        //resto a una fecha la otra
        $segundos_diferencia = $timestamp1 - $timestamp2;

        //convierto segundos en días
        $dias_diferencia = $segundos_diferencia / (60 * 60 * 24);

        //obtengo el valor absoulto de los días (quito el posible signo negativo)
        $dias_diferencia = abs($dias_diferencia);

        //quito los decimales a los días de diferencia
        $dias_diferencia = floor($dias_diferencia);

        return $dias_diferencia;
    }

    //Esta es la que se debe usar siempre tanto para msql_html, y html_mysql
    function html_mysql($fecha)
    {
        $array_fecha = "";
        if ($fecha != "")
        {
            $array_fecha = explode("-", $fecha);
            $fecha       = $array_fecha[2] . "-" . $array_fecha[1] . "-" . $array_fecha[0];
            return $fecha;
        }
        else
        {
            return "";
        }
    }

    function fecha_hora($fecha)
    {
        if ($fecha != "")
        {
            $fecha_array = explode(" ", $fecha);
            $fecha_str   = $fecha_array[0];
            $hora_str    = $fecha_array[1];
            $fecha_str   = $this->html_mysql($fecha_str);
            $fecha_hora  = $fecha_str . " " . $hora_str;
            return $fecha_hora;
        }
        else
        {
            return "";
        }
    }

    //2013-12-30
    function mysql_html($fecha)
    {
        $array_fecha = "";
        $array_fecha = explode("-", $fecha);
        $fecha       = $array_fecha[0] . "-" . $array_fecha[1] . "-" . $array_fecha[2];
        return $fecha;
    }

    function fecha_corta($fecha)
    {
        $array_fecha = "";
        $array_fecha = explode("-", $fecha);
        $fecha       = $array_fecha[2] . "-" . $array_fecha[1] . "-" . $array_fecha[0][2] . $array_fecha[0][3];
        return $fecha;
    }

    function estadisticas($tipo_accion, $id_alojamiento, $web)
    {

        $CI           = & get_instance();
        $ip           = $_SERVER['REMOTE_ADDR'];
        $navegador    = $_SERVER['HTTP_USER_AGENT'];
        $estadisticas = array(
            'TipoAccion'     => & $tipo_accion,
            'Ip'             => $ip,
            'Navegador'      => $navegador,
            'ID_Alojamiento' => $id_alojamiento
        );

        if ($tipo_accion == 'ficha')
        {
            $tipo_accion = 'ficha';
            $CI->db->insert('estadisticas', $estadisticas);
        }
        elseif ($tipo_accion == 'mail')
        {
            $tipo_accion = 'mail';
            $CI->db->insert('estadisticas', $estadisticas);
        }
        elseif ($tipo_accion == 'web')
        {
            $tipo_accion = 'web';
            $CI->db->insert('estadisticas', $estadisticas);
            redirect($web);
        }
        else
        {
            echo "error en la funcion estadisticas";
            exit();
        }
    }

    function pago_alojar($id_alojamiento)
    {
        $CI = & get_instance();

        $query     = sprintf("select reservas_id from reserva_dat where  pago_alojar='N' and alojamiento_id=%s", $id_alojamiento);
        $row_query = $CI->db->query($query);
        $row       = $row_query->row();

        if ($row_query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function comp_sesion($a, $base_url)
    {
        if ($a == "")
            redirect($base_url . "user/login_user");
        else
            return $a;
    }

    function comp_sesion_admin($a, $base_url)
    {
        if ($a == "")
        {
            redirect($base_url . "admin/login");
        }
        else
        {
            return $a;
        }
            
    }

    function borrar_carpeta($dir)
    {
        $Res = false;

        if (file_exists($dir))
        {
            $dh = opendir($dir);

            while ($file = readdir($dh))
            {
                if ($file != "." && $file != "..")
                {
                    $fullpath = $dir . "/" . $file;

                    if (!is_dir($fullpath))
                    {
                        unlink($fullpath);
                    }
                    else
                    {
                        $this->borrar_carpeta($fullpath);
                    }
                }
            }

            closedir($dh);

            if (rmdir($dir))
            {
                $Res = true;
            }
        }

        return $Res;
    }

//     function utf8_encode_deep(&$input) {
//     if (is_string($input)) {
//         $input = utf8_encode($input);
//     } else if (is_array($input)) {
//         foreach ($input as &$value) {
//             utf8_encode_deep($value);
//         }
        
//         unset($value);
//     } else if (is_object($input)) {
//         $vars = array_keys(get_object_vars($input));
        
//         foreach ($vars as $var) {
//             utf8_encode_deep($input->$var);
//         }
//     }
// }

}
?>