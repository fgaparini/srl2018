<?php

//funciones para verificar las sesione
class Sf
{

    //Comparar si un cliente tiene rol de gestion
    function ses_comp_rol($a)
    {
        //$CI =& get_instance();
        if ($a != "")
        {
            if ($a['Rol'] != 'gestion')
            {
                redirect(base_url() . "users_comision/dash_login/login/");
            }
        }
        else
        {
             redirect(base_url() . "users_comision/dash_login/login/");
        }
       

    }

}

?>
