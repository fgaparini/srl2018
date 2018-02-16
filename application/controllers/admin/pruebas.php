<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pruebas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('gf');
    }
    
    function estadisticas()
    {
        
        $this->gf->estadisticas('web','5','http://google.com.ar');
    }

    function index()
    {
        $query = "

                    select ah.ID_Alojamiento as a, ah.ID_Habitacion as b, cal_calendario.fecha as c
                    from
                    cal_calendario
                    inner join alojamientos_habitaciones as ah
                    on
                    cal_calendario.id_habitacion=ah.ID_Habitacion
                    where
                    fecha>'2013-01-01' and fecha<'2013-01-016'
                ";

        $rows_count = $this->db->query($query);
        $rows = $rows_count->result_array();
        $total = $rows_count->num_rows();
        $id_alojamiento = "";
        $id_habitacion = "";
        $count = 0;
        $final = array();
        $final_total = array();
        $alojamientos = array();
        $habitaciones = array();
        $fechas = array();
        foreach ($rows as $var)
        {
            $count++;
            if ($count == 1)
            {
                $id_alojamiento = $var['a'];
                $id_habitacion = $var['b'];
            }

            array_unshift($fechas, $var['c']);
            if ($id_habitacion != $var['b'] or $count == $total)
            {
                array_unshift($habitaciones, $var['b']);
                if ($id_alojamiento != $var['a'] or $count == $total)
                {

                    $final = array(
                        'id_aloamiento' => $var['a'],
                        'habitacion' => array(
                            'ids_habitaciones' => $habitaciones,
                            'fecha' => array(
                                'fechas' => $fechas
                            )
                        )
                    );

                    array_unshift($final_total, $final);

                    $final = array();
                    $fechas = array();
                    $habitaciones = array();
                }
            }
            $id_alojamiento = $var['a'];
            $id_habitacion = $var['b'];
        }

        foreach ($final_total as $var)
        {
            echo $var[0][0][0];
        }

        print_r($final_total);
    }

    function prueba2()
    {
        $array = array('uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho');

        foreach ($array as $var)
        {
            echo count($array) . " ";
        }
    }

    function mostrar()
    {
        $general = array(
            $a1 = array(
        'id_alojamiento' => '1',
        'id_habitacion' => '3',
        'fecha' => '01-01'
            ),
            $a2 = array(
        'id_alojamiento' => '1',
        'id_habitacion' => '3',
        'fecha' => '02-01'
            ),
            $a3 = array(
        'id_alojamiento' => '1',
        'id_habitacion' => '3',
        'fecha' => '03-01'
            ),
            //
            $a4 = array(
        'id_alojamiento' => '1',
        'id_habitacion' => '4',
        'fecha' => '01-01'
            ),
            $a5 = array(
        'id_alojamiento' => '1',
        'id_habitacion' => '4',
        'fecha' => '02-01'
            ),
            $a6 = array(
        'id_alojamiento' => '1',
        'id_habitacion' => '4',
        'fecha' => '03-01'
            ),
            $a7 = array(
        'id_alojamiento' => '2',
        'id_habitacion' => '10',
        'fecha' => '01-01'
            ),
            $a8 = array(
        'id_alojamiento' => '2',
        'id_habitacion' => '10',
        'fecha' => '02-01'
            ),
            $a9 = array(
        'id_alojamiento' => '2',
        'id_habitacion' => '10',
        'fecha' => '03-01'
            ),
            $a10 = array(
        'id_alojamiento' => '2',
        'id_habitacion' => '12',
        'fecha' => '01-01'
            ),
            $a11 = array(
        'id_alojamiento' => '2',
        'id_habitacion' => '12',
        'fecha' => '02-01'
            ),
            $a12 = array(
        'id_alojamiento' => '2',
        'id_habitacion' => '12',
        'fecha' => '03-01'
            ),
            //
            $a13 = array(
        'id_alojamiento' => '3',
        'id_habitacion' => '15',
        'fecha' => '01-01'
            ),
            $a14 = array(
        'id_alojamiento' => '3',
        'id_habitacion' => '15',
        'fecha' => '02-01'
            ),
            
            $a18 = array(
        'id_alojamiento' => '3',
        'id_habitacion' => '16',
        'fecha' => '03-01'
            ),
            //
            $a19 = array(
        'id_alojamiento' => '5',
        'id_habitacion' => '20',
        'fecha' => '01-01'
            ),
            $a20 = array(
        'id_alojamiento' => '5',
        'id_habitacion' => '20',
        'fecha' => '02-01'
            ),
            $a21 = array(
        'id_alojamiento' => '5',
        'id_habitacion' => '20',
        'fecha' => '03-01'
            ),
            $a22 = array(
        'id_alojamiento' => '5',
        'id_habitacion' => '24',
        'fecha' => '01-01'
            ),
            $a23 = array(
        'id_alojamiento' => '5',
        'id_habitacion' => '24',
        'fecha' => '02-01'
            ),
            $a24 = array(
        'id_alojamiento' => '5',
        'id_habitacion' => '24',
        'fecha' => '03-01'
            ),
        );

        $id_alojamiento = 0;
        $id_habitacion = 0;
        $habitaciones = array();
        $fechas = array();
        $fe = array();
        $alo = array();
        $alojamientos = array();
        $count = 0;
        $count_fe = 0;
        $bandera = 0;
        $total = count($general);
        foreach ($general as $var)
        {
            $count_fe++;

            $fe = array(
                'fecha' => $var['fecha'],
            );
            array_push($fechas, $fe);
            if ($count_fe == 3)
            {

                $hab = array(
                    'id_habitacion' => $var['id_habitacion'],
                    'fechas' => $fechas
                );
                array_push($habitaciones, $hab);
                $fechas = array();
                $count_fe = 0;

                if ($bandera)
                {
                    $alo = array(
                        'id_alojamiento' => $var['id_alojamiento'],
                        'habitacion' => $habitaciones
                    );
                    array_push($alojamientos, $alo);
                    $habitaciones = array();
                    $bandera = 0;
                }

                
                $id_alojamiento = $var['id_alojamiento'];
            }
            
            if ($id_alojamiento != $var['id_alojamiento'])
                {
                    $bandera = 1;
                }
            
        }





        foreach ($alojamientos as $var1)
        {
            echo "--------id_alojamiento:" . $var1['id_alojamiento'] . "<br>";
            foreach ($var1['habitacion'] as $var2)
            {
                echo "----id_habitacion: " . $var2['id_habitacion'] . "<br>";

                foreach ($var2['fechas'] as $var3)
                {
                    echo "id_fecha: " . $var3['fecha'] . "<br>";
                }
            }
        }
    }
    
    
    function X()
    {
        $query="select * from alojamientos";
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        $fecha1='2013-05-01';
        $fecha2='2013-05-04';
        {
            $query2=  sprintf("select * from alojamientos_habitaciones ah , habitaciones h, cal_calendario c where ah.ID_Alojamiento='106' AND h.ID_Habitacion = ah.ID_Habitacion AND c.id_habitacion=h.ID_Habitacion AND c.fecha between '%s' AND '%s' AND c.tarifa_normal >0 GROUP BY h.id_habitacion ", $var['ID_Alojamiento'], $fecha1, $fecha2);
          
            $rows1 = $this->db->query($query2);
            $rows1 = $rows1->result_array();
            $i=0;
            $habitacion="";
            foreach($rows1 as $var1)
            {
                $habitacion[$i]=$var1['ID_Habitacion'];
                
                echo $habitacion[$i]; 
               
                $i++;
            } 
            echo $var['ID_Alojamiento']."<br>";
            for($j=0 ; $j<=count($habitacion); $j++)
            {
                echo $habitacion[$j]['ID_Habitacion']."<br>";
            }
        }
        
    }

}

/*
 *
 * $id_alojamiento = 0;
  $id_habitacion = 0;
  $habitaciones = array();
  $fechas = array();
  $fe = array();
  $alo = array();
  $alojamientos = array();
  $count = 0;
  $total=count($general);
  foreach ($general as $var)
  {
  $count++;


  if ($id_habitacion != $var['id_habitacion'] or $count==$total)
  {
  krsort($fechas);
  $hab = array(
  'id_habitacion' => $var['id_habitacion'],
  'fechas' => $fechas
  );
  array_unshift($habitaciones, $hab);
  $fechas = array();

  if ($id_alojamiento != $var['id_alojamiento'] or $count==$total)
  {
  $alo = array(
  'id_alojamiento' => $var['id_alojamiento'],
  'habitacion' => $habitaciones
  );
  array_unshift($alojamientos, $alo);
  $alo=array();
  $habitaciones = array();
  }

  $id_habitacion = $var['id_habitacion'];
  }

  $id_alojamiento = $var['id_alojamiento'];

  $fe = array(
  'fecha' => $var['fecha'],
  );
  array_unshift($fechas, $fe);


  }
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
  foreach ($alojamientos as $var)
  {

  echo "id_alojamiento: " . $var['id_alojamiento'] . "  <br>";

  foreach ($var['habitacion'] as $var0)
  {
  echo "id_habitacion: " . $var0['id_habitacion'] . "<br>";

  foreach ($var0['fechas'] as $var1)
  {
  echo "fecha: " . $var1['fecha'] . "<br>";
  }
  }
  }
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * private function array_busqueda($rows_count = array(), $fecha_desde, $fecha_hasta) {
        $rows = $rows_count->result_array();
        $id_alojamiento =0;
        $count = 0;
        $count_i=0;
        $alo = array();
        $alojamientos = array();
        $habitaciones = array();
        $fechas = array();
        $fe = array();
        $bandera=0;
        $min_disp = 999;
        
        //Saber la cantidad de dias del rango dado-> se podria hacer en una funcion
        $rows_fechas = $this->cal_fecha->list_fechas_rango($fecha_desde, $fecha_hasta);
        $fe_count = 0;
        //Paso los dias a un array comun para despues recorrerlos con un for comun
        foreach ($rows_fechas as $var) {
            $fe_count++;
        }
        
        foreach ($rows as $var) {
            $count++;
            $count_i++;

            //Calcular el minimo disponible
            if ($min_disp > $var['cant_disponible']) {
                $min_disp = $var['cant_disponible'];
            }
            
            $fe = array(
                'fecha' => $var['fecha'],
                'tarifa_normal' => $var['tarifa_normal'],
                'tarifa_oferta' => $var['tarifa_oferta'],
                'cant_disponible' => $var['cant_disponible'],
                'min_disponible' => $min_disp
            );
            
            array_push($fechas, $fe);
            if ($count == $fe_count) {

                $hab = array(
                    'id_habitacion' => $var['ID_Habitacion'],
                    'nombrehab' => $var['NombreHab'],
                    'fechas' => $fechas
                );
                array_push($habitaciones, $hab);
                $fechas = array();
                $count = 0;
                $min_disp=999;
                
                if ($bandera) {
                    $alo = array(
                        'id_alojamiento' => $var['ID_Alojamiento'],
                        'nombre' => $var['Nombre'],
                        'descripcion' => $var['Descripcion'],
                        'tipoalojamiento' => $var['TipoAlojamiento'],
                        'pais' => $var['CountryName'],
                        'provincia' => $var['SuName'],
                        'ciudad' => $var['Name'],
                        'localidad' => $var['Localidad'],
                        'habitacion' => $habitaciones,
                        'fecha_desde' => $fecha_desde,
                        'fecha_hasta' => $fecha_hasta,
                        'direccion' => $var['Direccion'],
                        'cant_dias' => $fe_count
                        
                    );
                    array_push($alojamientos, $alo);
                    $habitaciones = array();
                    $bandera = 0;
                }
                if($count_i==1)
                {
                  $id_alojamiento != $var['ID_Alojamiento'];  
                }
                
                if ($id_alojamiento != $var['ID_Alojamiento']) {
                    $bandera = 1;
                }
                $id_alojamiento = $var['ID_Alojamiento'];
            }
        }
        
        return $alojamientos;
    }
 */
?>