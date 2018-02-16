<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Propabm_model extends CI_Model
{
 public function __construct()
    {
        parent::__construct();
         $this->db_prop = $this->load->database('propiedades', TRUE);
    }
    const tabla    = 'propiedades';
    const id_tabla = 'ID_Propiedades';

    /* ------------------------ INSERTAR EN LA BASE DE DATOS----------------------- */

    function insert($row = array())
    {
        $this->db_prop->insert(self::tabla, $row);
        return $this->db_prop->insert_id();
    }

    /* ------------------------ BUSCAR POR ID-------------------------------------- */

    function find($id)
    {
        $query = sprintf("select * from %s where %s=%s", self::tabla, self::id_tabla, $id);
        $row   = $this->db_prop->query($query);
        $row   = $row->row_array();
        return $row;
    }



       function find_info($idinfo)
    {
        $query = sprintf("select * from informacionprop where ID_InformacionProp=%s",  $idinfo);
        $row   = $this->db_prop->query($query);
        $row   = $row->row_array();
        return $row;
    }

    /* ------------------------ LISTADO BASICO TODOS LOS ELEMENTOS------------------------ */

    function find_all()
    {
        $query = sprintf("select * from %s order by RAND()", self::tabla);
        $rows  = $this->db_prop->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }

    /* ------------------------ MODIFICAR UN REGISTRO----------------------------- */

    function update($id, $row = array())
    {
        $this->db_prop->where(self::id_tabla, $id);
        $this->db_prop->update(self::tabla, $row);
    }

    /* ------------------------ ELIMINAR UN REGISTRO------------------------------- */

    function delete($id)
    {
        $query = sprintf("delete from %s where %s=%s", self::tabla, self::id_tabla, $id);
        $this->db_prop->query($query);
    }

    /* ------------------------ CONTAR RESULTADOS TRAIDOS------------------------------- */

    function count_all()
    {
        $query = sprintf("select count(*) as cantidad from %s", self::tabla);
        $row   = $this->db_prop->query($query);
        $row   = $row->row_array();
        return $row['cantidad'];
    }

// ===================================================================================
/* ------------------------ IMAGENES PROPIEDADES ------------------------------- */    
// ===================================================================================

    /* ------------------------ CONTAR IMAGENES------------------------------- */
   function images_count($id_prop)
    {
        $query = sprintf("select MAX(name) as count from fotos where Propiedades_ID_Propiedades=%s", $id_prop);
        $rows  = $this->db_prop->query($query);
        $rows  = $rows->row();
        return $rows->count;
    }
    /* ------------------------ INSERTAR IMAGENES ------------------------------- */
function insertfotos($row = array())
    {
        $this->db_prop->insert('fotos', $row);
        return $this->db_prop->insert_id();
    }
        /* ------------------------ INSERTAR IMAGENES ------------------------------- */
function find_fotos($row = array())
    {
        $query = sprintf("select * from %s order by RAND()", self::tabla);
        $rows  = $this->db_prop->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }
function listar_fotos($id_prop)
    {
        $query = sprintf("select * from fotos where Propiedades_ID_Propiedades =%s", $id_prop);
        $rows  = $this->db_prop->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }
    /* ------------------------ LISTADO COMPLETO ------------------------------- */
        function listado_completo_asc($limite)
    {
        if($limite==0)
        {
            $limit="";
        } else {
            $limit="limit 0,".$limite;
        }
          // $query = sprintf("select propiedades p, informacionprop ip, from  Where p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp  order by RAND()",$Bdistrito,$Btipo,$Boperacion,$Bprecio);
                $query = sprintf("select * from propiedades p, informacionprop ip  Where p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp  order by .p.Fecha_Publicacion,.p.ID_Propiedades ASC %s", $limit);
        $rows  = $this->db_prop->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }
//busco coordenadas de todas la propiedades
        function listado_completo_asc_coord($limite)
    {
        if($limite==0)
        {
            $limit="";
        } else {
            $limit="limit 0,".$limite;
        }
          // $query = sprintf("select propiedades p, informacionprop ip, from  Where p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp  order by RAND()",$Bdistrito,$Btipo,$Boperacion,$Bprecio);
                $query = sprintf("select ip.Coordenadas from propiedades p, informacionprop ip  Where p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp AND p.estado ='A' order by .p.Fecha_Publicacion,.p.ID_Propiedades ASC %s", $limit);
        $rows  = $this->db_prop->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }
// ------------------------------------------------------------------ >>>>>>>>>>>>>>>>>>    
// LISTADO COMPLETO DE LAS PROPIEDADES SIN FILTROS CON SU INFORMACION 
    function listado_completo ()
    {
          // $query = sprintf("select propiedades p, informacionprop ip, from  Where p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp  order by RAND()",$Bdistrito,$Btipo,$Boperacion,$Bprecio);
                $query = sprintf("select * from propiedades p, informacionprop ip  Where p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp AND p.estado ='A' order by RAND()");
        $rows  = $this->db_prop->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }
// ------------------------------------------------------------------ >>>>>>>>>>>>>>>>>>    
// LISTADO COMPLETO DE LAS PROPIEDADES OPOR TIPO DE PROPIEDAD
    function listado_tp ($tipo)
    {   
       
                $query = sprintf("select * from propiedades p, informacionprop ip, tipopropiedades tp  Where tp.TipoPropiedades ='%s' AND p.TipoPropiedades_ID_Tipo=tp.ID_Tipo AND  p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp  AND p.estado ='A'  order by RAND()",$tipo);
        $rows  = $this->db_prop->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }
  // ------------------------------------------------------------------ >>>>>>>>>>>>>>>>>>    
// LISTADO COMPLETO DE LAS PROPIEDADES OPOR OPERACIO
    function listado_op ($operacion)
    {   
       
                $query = sprintf("select * from propiedades p, informacionprop ip Where p.Operacion= '%s' AND  p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp  AND p.estado ='A'  order by RAND()",$operacion);
        $rows  = $this->db_prop->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }  
// ----------------------------------------------------------------- >>>>>>>>>>>>>>>>>>
// BUSCADOR DE PROPIEDADES
    function buscador_prop ($tipo,$zona,$operacion,$precio1,$precio2, $limit1=0,$limit2=25,$order='DESC', $filter=0)
    {
// Filtrar por tipo de propiedades
if ($tipo!='0' && $tipo!=NULL) {
    $sql_tipo="AND tp.TipoPropiedades='".$tipo."' AND p.TipoPropiedades_ID_Tipo=tp.ID_Tipo";
} else {$sql_tipo="";}

// Filtrar por zona 
if ($zona!='0' && $zona!=NULL) {
    $sql_zona="AND d.Distrito='".$zona."' AND p.Distritos_ID_Distritos= d.ID_Distritos";
} else {$sql_zona="";}

if ($operacion!='0' && $operacion!=NULL) {
    $sql_operacion="AND p.Operacion='".$operacion."'";
} else {$sql_operacion="";}

if ($precio2!='0' && $precio1!='0') {
    $sql_precio="AND ip.Precio between '".$precio1."' AND '".$precio2."'";
} else {
    if ($precio1!='0' && $precio2=='0') {
    $sql_precio="AND ip.Precio>='".$precio1."'";
} else {
    if ($precio2!='0' && $precio1=='0') {
    $sql_precio="AND ip.Precio<='".$precio2."'";
} else {$sql_precio="";}
}

}

// ORDENAR LOS RESULTADOS ---------------------

        switch ($filter) {
            case 'precio':
                $sqlfilter="ip.Precio";
                $order="";
                break;
            case 'fecha':
                $sqlfilter="p.Fecha_Publicacion";
                break;
            case 'superficie':
                $sqlfilter="ip.Superficie";
                break;
            default:
                $sqlfilter="rand()";
                break;
        }

       $query = sprintf("select * from propiedades p, informacionprop ip,distritos d, tipopropiedades tp Where p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp $sql_tipo $sql_zona $sql_operacion $sql_precio group by p.ID_Propiedades AND p.estado ='A' order by $sqlfilter $order");
        $rows  = $this->db_prop->query($query);
        $rows  = $rows->result_array();
        return $rows;
    }


// ----------------------------------------------------------------- >>>>>>>>>>>>>>>>>>
// BUSCO PROPIEDAD POR ID Y SU INFORMACION
     function findProp($id)
    {
        $query = sprintf("select * from %s p,informacionprop ip Where  %s=%s AND p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp ", self::tabla, self::id_tabla, $id);
        $row   = $this->db_prop->query($query);
        $row   = $row->row_array();
        return $row;
    }
    // BUSCO PROPIEDAD POR TITULO Y SU INFORMACION
     function findPropxTitulo($titulo)
    {
        $query = sprintf("select p.Titulo from %s p,informacionprop ip Where  ip.Titulo=%s AND p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp ", self::tabla, $titulo);
        $row   = $this->db_prop->query($query);
        $row   = $row->row_array();
        return $row;
    }

     // BUSCO PROPIEDAD SIMILARES POR TIPO Y ZONA
     function findSimilar($distrito,$tipo,$id)
    {
        $query = sprintf("select * from %s p,informacionprop ip Where  p.Distritos_ID_Distritos=%s AND p.TipoPropiedades_ID_Tipo=%s AND p.ID_Propiedades<>%s AND  p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp AND p.estado ='A' GROUP BY p.ID_Propiedades Order by RAND() limit 0,4 ", self::tabla, $distrito,$tipo,$id);

        $row   = $this->db_prop->query($query);
        $row   = $row->result_array();
        return $row;
    }
    // BUSCO PROPIEDAD POR TIPO
     function findSimilar_tipo($tipo,$id)
    {
        $query = sprintf("select * from %s p,informacionprop ip Where  p.TipoPropiedades_ID_Tipo=%s AND p.ID_Propiedades<>%s AND  p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp AND p.estado ='A' GROUP BY p.ID_Propiedades Order by RAND() limit 0,6 ", self::tabla,$tipo,$id);

        $row   = $this->db_prop->query($query);
        $row   = $row->result_array();
        return $row;
    }
    /* -------------------------------------------------------------------------------  */
    /* ------------------------ BUSCAR PROPIEDADES DE USUARIOS------------------------ */
    /* ------------------------------------------------------------------------------- */

      function find_allxuser($id_user)
    {
        $query = sprintf("select * from %s p, informacionprop ip where Usuarios_ID_Usuarios='%s' and ip.ID_InformacionProp = InformacionProp_ID_InformacionProp", self::tabla, $id_user);
        $row   = $this->db_prop->query($query);
        $row   = $row->result_array();
        return $row;
    }
      function count_allxuser($id_user)
    {
        $query = sprintf("select count(*) as cantidad from %s where Usuarios_ID_Usuarios='%s'", self::tabla,$id_user);
        $row   = $this->db_prop->query($query);
        $row   = $row->row_array();
        return $row['cantidad'];
    }
     /* ------------------------ BUSCAR POR ID RESTRIGIDO POR USUARIO-------------------------------------- */
      function findxuser($id, $id_user)
    {
        $query = sprintf("select * from %s where %s=%s and Usuarios_ID_Usuarios=%s", self::tabla, self::id_tabla, $id, $id_user);
        $row   = $this->db_prop->query($query);
        $row   = $row->row_array();
        return $row;
    }

       function findPropxuser($id,$id_user)
    {
        $query = sprintf("select * from %s p,informacionprop ip Where  %s=%s AND p.InformacionProp_ID_InformacionProp = ip.ID_informacionProp AND  p.Usuarios_ID_Usuarios =%s ", self::tabla, self::id_tabla, $id,$id_user);
        $row   = $this->db_prop->query($query);
        $row   = $row->row_array();
        return $row;
    }
       function validar_user_prop($id)
    {
        $query = sprintf("select * from %s Where  %s=%s ", self::tabla, self::id_tabla, $id);
        $row   = $this->db_prop->query($query);
        $row   = $row->row_array();
        return $row;
    }
}
?>
