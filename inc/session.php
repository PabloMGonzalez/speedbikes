<?php

session_start();  #inicia o reanuda la sesión

    
    $user = (isset($_SESSION["user"]) && !empty($_SESSION["user"]))? trim($_SESSION["user"]):"";
    $perfil = (isset($_SESSION["perfil"]) && !empty($_SESSION["perfil"]))? trim($_SESSION["perfil"]):"";

    if ($user=="") {
        
        # echo "sin seccion";
        # usuario invalido - si existe alguna session la destruye
        
        unset($_SESSION["user"]);
        $_SESSION = array();
        
        session_destroy();
    } else {
        /*
            operaciones relacionadas a la session
            por ej:
                - cargar datos de sesión,
                - verificar tiempo de la seccion,
                - eliminar datos de sección, luego de un determinado tiempo
                - cambiar ID de sección
                - registrar datos de usuario logueado, etc.
        */
    }


    

/*
Perfiles
    A - administrador - puede ingresar cargo y personas
    E - empleado - puede ingresar cargo
*/

    /*
    Funcion que verifica que la función/pagina requerida sea valida para el perfil logueado
    1 - personas
    2 - cargo
    3 - consultas
    */
    // function perfil_valido($opcion)
    // {
    //     global $perfil;
    //     switch ($opcion) {
    //         case 1:
    //             $valido=($perfil=="A")? true:false;
    //             break;
    //         case 2:
    //             $valido=($perfil=="A")? true:false;
    //             break;
    //         case 3:
    //             $valido=($perfil=="A" || $perfil=="E")? true:false;
    //             break;
    //         default:
    //             $valido=false;
    //     }
        
    //     return $valido;
    // }