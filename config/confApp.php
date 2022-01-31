   
<?php
/**
 * Login Logout de Users y mantimiento de Departamentos.
 * 
 * Ficheros necesarios para La aplicacion
 * 
 * @author: OUTMANE BOUHOU
 * @updated: 02/01/2022
 * @version 1.0
 */

/*
 * @author: OUTMANE BOUHOU
 * @updated: 02/1/2022
 * @see : Añadir los ficheros para usarlos */

/* Añadir las librerias */
require_once "core/LibreriaValidacion.php";

/* definir los variables de la applicacion */
define("OBLIGATORIO", 1);
define("OPCIONAL", 0);
$error = '';

/* Añadir modelsm para usarlos en toda la Aplicacion */
require_once "model/AppError.php";
require_once "model/interfaceDB.php";
require_once "model/interfaceUsuarioDB.php";
require_once "model/Usuario.php";
require_once "model/UsuarioPDO.php";
require_once "model/DBPDO.php";
require_once "model/Rest.php";
require_once "model/universidad.php";

/* Añadir controladores en Array */
$controllers = [
    "error" => "controller/cError.php",
    "rest" => "controller/cRest.php",
    "login" => "controller/cLogin.php",
    "inicioPublico" => "controller/cInicioPublico.php",
    "detalle" => "controller/cDetalle.php",
    "wip" => "controller/cWIP.php",
    "registrar" => "controller/cRegistro.php",
    "inicioPrivado" => "controller/cInicioPrivado.php",
    "editar" => "controller/cMiCuenta.php",
    "cambiarpassword" => "controller/cCambiarPassword.php",
    "borrar" => "controller/cBorrarCuenta.php"
];

/* Añadir vistas en Array */
$views = [
    "layout" => "view/Layout.php",
    "error" => "view/vError.php",
    "rest" => "view/vRest.php",
    "inicioPublico" => "view/vInicioPublico.php",
    "wip" => "view/vWIP.php",
    "detalle" => "view/vDetalle.php",
    "login" => "view/vLogin.php",
    "registrar" => "view/vRegistro.php",
    "inicioPrivado" => "view/vInicioPrivado.php",
    "editar" => "view/vMiCuenta.php",
    "cambiarpassword" => "view/vCambiarPassword.php",
    "borrar" => "view/vBorrarCuenta.php"
];

/* Iniciamos la session para saber que vista esta en curso y que usuario */
session_start();
?>
