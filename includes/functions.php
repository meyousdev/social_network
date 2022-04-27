<?php

// Gere l'Etat actif de nos différents liens cliquables 

if ( ! function_exists ('set_active') )
{
    function set_active( $path , $class='active' )
    {
        $page = trim( strrchr( $_SERVER['SCRIPT_NAME'] , '/' ) , '/' );

        if ( $page == $path.'.php' )
        {
            return $class;
        }
        else
        {
            return "";
        }
    }
}