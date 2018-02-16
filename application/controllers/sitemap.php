<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sitemap extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        
        $this->load->library('sitemaps');
      
        $alo_rows = array();
        $temp_rows = array();
        $subemp_rows = array();
        $ep_rows = array();
        $pag_rows = array();


       //Alojamientos
        $query    = "Select Url from alojamientos";

        $alo_rows = $this->db->query($query);

        $alo_rows = $alo_rows->result_array();
 
        //tipo Alojamiento
        $query    = "Select  UrlAlojamiento  FROM tipoalojamiento Order by ID_TipoAlojamiento ASC ";
        $TipoAlo_rows = $this->db->query($query);
        $TipoAlo_rows = $TipoAlo_rows->result_array();
        
        //Empresas
        $query    = "Select TipoEmpresa From tipoempresa ";
        $temp_rows = $this->db->query($query);
        $temp_rows = $temp_rows->result_array();

       
        //Subtipo Empresas
        $query    = "Select te.TipoEmpresa, ste.UrlSubEmpresa from subtipoempresa ste, tipoempresa te where te.ID_TipoEmpresa=ste.ID_TipoEmpresa  ";
        $subemp_rows = $this->db->query($query);
        $subemp_rows = $subemp_rows->result_array();


        //Empresas
        $query   = "Select e.url, te.TipoEmpresa, ste.SubtipoEmpresa 
                    FROM empresas e, tipoempresa te, subtipoempresa ste
                    WHERE te.ID_TipoEmpresa = e.ID_TipoEmpresa
                    AND ste.ID_SubTipoEmpresa = e.ID_SubtipoEmpresa
                    AND e.url != ''";
        $ep_rows = $this->db->query($query);
        $ep_rows = $ep_rows->result_array();

        //Paginas
        $query   = "Select t.TipoPagina,p.Url FROM paginas p, tipopagina t WHERE t.ID_TipoPagina = p.ID_TipoPagina ";
        $pag_rows = $this->db->query($query);
        $pag_rows = $pag_rows->result_array();

        //Listar tipo paginas para destacados
        $query   = "Select t.TituloPagina,t.TipoPagina  FROM paginas p, tipopagina t Where p.ID_TipoPagina=t.ID_TipoPagina AND p.DestaPagina ='1' GROUP BY t.TipoPagina";
        $desta_rows = $this->db->query($query);
        $desta_rows = $desta_rows->result_array();

        //galeria fotos
         $query   = "select it_id_imagen_tipo, it_nombre, it_descripcion, it_thumb_upload FROM imagenes_tipo ORDER BY RAND()";
        $fotos_rows = $this->db->query($query);
        $fotos_rows = $fotos_rows->result_array();

        //AGENDA
         $query = "select 
                *
                from
                agendas order by  ID_Agenda desc
                ";

        $agenda_rows = $this->db->query($query);
        $agenda_rows = $agenda_rows->result_array();



        /*-------------------------------------------------------
                        Paginas estaticas
        --------------------------------------------------------*/
        //home
        $item = array(
            "loc"      => base_url(),
            "priority" => "1"
        );
        $this->sitemaps->set_item_key("loc");
        $this->sitemaps->add_item($item);
        //noticias listado
        $item = array(
            "loc"      => base_url()."noticias/noticias-san-rafael.html",
            "priority" => "0.85"
        );
        $this->sitemaps->set_item_key("loc");
        $this->sitemaps->add_item($item);
        //Multimedia
            //mapas
            $item = array(
                "loc"      => base_url()."multimedia/Mapas/Ciudad",
                "priority" => "0.85"
            );
            $this->sitemaps->set_item_key("loc");
            $this->sitemaps->add_item($item);
            //Fotos
            $item = array(
                "loc"      => base_url()."multimedia/fotos",
                "priority" => "0.85"
            );
            $this->sitemaps->set_item_key("loc");
            $this->sitemaps->add_item($item);
            //Videos
            $item = array(
                "loc"      => base_url()."multimedia/videos",
                "priority" => "0.85"
            );
            $this->sitemaps->set_item_key("loc");
            $this->sitemaps->add_item($item);
            //Videos
            $item = array(
                "loc"      => base_url()."multimedia/videos",
                "priority" => "0.85"
            );
            $this->sitemaps->set_item_key("loc");
            $this->sitemaps->add_item($item);
            //agenda
             $item = array(
                "loc"      => base_url()."agenda/agenda-san-rafael.html",
                "priority" => "0.85"
            );
            $this->sitemaps->set_item_key("loc");
            $this->sitemaps->add_item($item);


        // $item = array(
        //     "loc"      => base_url() . "que-es-insanrafael.html",
        //     "priority" => "1"
        // );
        // $this->sitemaps->set_item_key("loc");
        // $this->sitemaps->add_item($item);

        // $item = array(
        //     "loc"      => base_url() . "nosotros.html",
        //     "priority" => "0.8"
        // );

        // $this->sitemaps->set_item_key("loc");
        // $this->sitemaps->add_item($item);

        // $item = array(
        //     "loc"      => base_url() . "registrarse.html",
        //     "priority" => "1"
        // );

        // $this->sitemaps->set_item_key("loc");
        // $this->sitemaps->add_item($item);


        // $item = array(
        //     "loc"      => base_url() . "eventos-san-rafael.html",
        //     "priority" => "1",
        //     "changefreq" => "daily"
        // );

        // $this->sitemaps->set_item_key("loc");
        // $this->sitemaps->add_item($item);

        //Alojamientos
        foreach ($alo_rows as $var)
        {
            $item = array(
                "loc"        => base_url() ."alojamiento/".  $var['Url'] ,
                // ISO 8601 format - date("c") requires PHP5
                "priority"   => "0.9",
                "changefreq" => "monthly",
            );
            $this->sitemaps->set_item_key("loc");
            $this->sitemaps->add_item($item);
        }
        //tipo alojamiento

         foreach ($TipoAlo_rows as $var)
                {
                    $item = array(
                        "loc"        => base_url() ."alojamiento/".  $var['UrlAlojamiento'] ,
                        // ISO 8601 format - date("c") requires PHP5
                        "priority"   => "0.95",
                        "changefreq" => "monthly",
                    );
                    $this->sitemaps->set_item_key("loc");
                    $this->sitemaps->add_item($item);
                }
        //Tipo Empresas (gastronomia,Transporte,etc)
        foreach ($temp_rows as $var)
        {
            

            $item = array(
                "loc"        => base_url() . "servicios/" . $var['TipoEmpresa'] ,
                // ISO 8601 format - date("c") requires PHP5
                "priority"   => "0.85",
                "changefreq" => "monthly",
            );
            $this->sitemaps->set_item_key("loc");
            $this->sitemaps->add_item($item);
        }
         //Sub tipo Empresas (Restaurant, Pubs, Bares, Pizzerias, etc)
        foreach ($subemp_rows as $var)
        {
            $item = array(
                "loc"        => base_url() . "servicios/". $var['TipoEmpresa'] ."/" . $var['UrlSubEmpresa'] ,
                // ISO 8601 format - date("c") requires PHP5
                "priority"   => "0.80",
                "changefreq" => "monthly",
            );
            $this->sitemaps->set_item_key("loc");
            $this->sitemaps->add_item($item);
        }

        //Ficha de la empresa
        foreach ($ep_rows as $var)
        {
            $item = array(
                "loc"        => base_url() . "servicios/". $var['TipoEmpresa'] ."/" .  str_replace(" ","-", $var['SubtipoEmpresa']) ."/". $var['url'] ,
                // ISO 8601 format - date("c") requires PHP5
                "priority"   => "0.80",
                "changefreq" => "monthly",
            );
            $this->sitemaps->set_item_key("loc");
            $this->sitemaps->add_item($item);
        }
          //Paginas
        foreach ($pag_rows as $var)
        {
            $item = array(
                "loc"        => base_url() . $var['TipoPagina'] ."/" .  $var['Url'],
                // ISO 8601 format - date("c") requires PHP5
                "priority"   => "0.85",
                "changefreq" => "monthly",
            );
            $this->sitemaps->set_item_key("loc");
            $this->sitemaps->add_item($item);
        }
          //Destacados
        foreach ($desta_rows as $var)
        {
            $item = array(
                "loc"        => base_url() ."destacados/" . $var['TipoPagina'] ,
                // ISO 8601 format - date("c") requires PHP5
                "priority"   => "0.80",
                "changefreq" => "monthly",
            );
            $this->sitemaps->set_item_key("loc");
            $this->sitemaps->add_item($item);
        }
          //fotos
        foreach ($fotos_rows as $var)
        {
            $item = array(
                "loc"        => base_url() ."multimedia/fotos/galeria/" . str_replace(" ","-",$var['it_nombre']) ,
                // ISO 8601 format - date("c") requires PHP5
                "priority"   => "0.80",
                "changefreq" => "monthly",
            );
            $this->sitemaps->set_item_key("loc");
            $this->sitemaps->add_item($item);
        }

        //Agenda
        foreach ($agenda_rows as $var)
        {
            $item = array(
                "loc"        => base_url() ."agenda/" . str_replace(" ","-",$var['Titulo'])."-".$var['ID_Agenda'] ,
                // ISO 8601 format - date("c") requires PHP5
                "priority"   => "0.80",
                "changefreq" => "monthly",
            );
            $this->sitemaps->set_item_key("loc");
            $this->sitemaps->add_item($item);
        }







        /* foreach($rubros as $var)
          {
          $item = array(
          "loc" => base_url()."san-rafael-rubro/" . $var['nombre']."/",
          "changefreq" => "daily",
          "priority" => "1"
          );
          $this->sitemaps->set_item_key("loc,changefreq,priority");
          $this->sitemaps->add_item($item);
          }
          foreach($etiquetas as $var)
          {

          $tag=  str_replace(" ", "%20" , $var['nombre']);

          $item = array(
          "loc" => base_url()."san-rafael-tag/" . $tag."/",
          "changefreq" => "daily",
          "priority" => "0.85"
          );
          $this->sitemaps->set_item_key("loc,changefreq,priority");
          $this->sitemaps->add_item($item);
          } */

        // file name may change due to compression
        $file_name = $this->sitemaps->build("sitemap.xml");

       $reponses = $this->sitemaps->ping(site_url($file_name));



        // //Muros
        // $query   = "select * from Muro where mu_Tipo='evento' order by mu_Id desc";
        // $mu_rows = $this->db->query($query);
        // $mu_rows = $mu_rows->result_array();

        // //Muro
        // $date = "";
        // foreach ($mu_rows as $var)
        // {
        //     $date = strtotime($var['mu_Fecha']);

        //     $item = array(
        //         "loc"        => base_url() . "eventos-san-rafael/" . $var['mu_UrlReal'] . ".html",
        //         // ISO 8601 format - date("c") requires PHP5
        //         "lastmod"    => date("Y-m-d", $date),
        //         "changefreq" => "never",
        //         "priority"   => "1",
        //     );
        //     $this->sitemaps->set_item_key("loc");
        //     $this->sitemaps->add_item($item);
        // }


        // // file name may change due to compression
        // $file_name = $this->sitemaps->build("sitemap-insanrafael-news.xml");

        // $reponses = $this->sitemaps->ping(site_url($file_name));



        //redirect("");
    }

}

?>