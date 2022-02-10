<?php

/**
 * @author OUTMANE BOUHOU
 * @since 5/01/2022
 * @version 1.0
 * 
 * Controlador del inicioPrivado.
 * Requiere la vista del de inicioPrivado.
 */
/* Volvernos a login cuando se pulsaado logout */
if (isset($_REQUEST['logout'])) {
    session_destroy();
    header("Location:index.php");
    exit;
}
/* Volvernos a login cuando se pulsaado apiRest */
if (isset($_REQUEST['apirest'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'rest';
    header("Location:index.php");
    exit;
}

/**
 * Si ha pulasdo detalle devlover controlador de detalle
 */
if (isset($_REQUEST['detalle'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'detalle';
    header("Location:index.php");
    exit;
}
/**
 * Si ha pulasdo mtoDepartamentos devlover controlador de mtoDepartamentos pero ahora 
 * solamente devolver pagina en progress
 */
if (isset($_REQUEST['mtoDepartamentos'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION ["codDepartamentoEnCurso"] = "";
    $_SESSION['paginaEnCurso'] = 'mtodepartamentos';
    header("Location:index.php");
    exit;
}

/**
 * Si ha pulasdo mtoDeparatamentos devlover controlador de ededitPerfil.
 */
if (isset($_REQUEST['editPerfil'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'editar';
    header("Location:index.php");
    exit;
}

/**
 * Si ha pulasdo deleteAccount devlover controlador de borrarCuenta.
 */
if (isset($_REQUEST['deleteAccount'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'borrar';
    header("Location:index.php");
    exit;
}

/**
 *  Meter la session del usuario en un array de variables 
 */
$objectUsuario = $_SESSION['usuario202DWESAplicacionFinalMulticapaPOO'];

$aInicioPrivado = [
    'codUsuario' => $objectUsuario->get_codUsuario(),
    'descUsuario' => $objectUsuario->get_descUsuario(),
    'numConexiones' => $objectUsuario->get_numConexiones(),
    'fechaHoraUltimaConexionAnterior' => $objectUsuario->get_fechaHoraUltimaConexionAnterior(),
    'perfil' => $objectUsuario->get_perfil()
];


require_once $views['layout'];
?>

