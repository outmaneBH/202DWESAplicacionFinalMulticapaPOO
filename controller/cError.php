<?php

/**
 * @author OUTMANE BOUHOU
 * @since 5/01/2022
 * @version 1.0
 * 
 * Controlador del error.
 * Requiere la vista del error.
 */

/**
 * Si ha pulasdo cancel devlover controlador de Error
 */
if (isset($_REQUEST['cancel'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['error']->get_paginaSiguiente();
    unset($_SESSION['error']);
    header("Location:index.php");
    exit;
}

/**
 * creamos array donde almacenamos los datos de la session del Error
 */
$aError = [
    'codError' => $_SESSION['error']->get_codError(),
    'msgError' => $_SESSION['error']->get_descError(),
    'archivoError' => $_SESSION['error']->get_archivoError(),
    'lineaError' => $_SESSION['error']->get_lineaError(),
    'paginaSiguiente' => $_SESSION['error']->get_paginaSiguiente()
];
require_once $views['layout'];
?>