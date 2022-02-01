<?php

/**
 * @author OUTMANE BOUHOU
 * @since 5/01/2022
 * @version 1.0
 * 
 * Controlador del Detalle.
 * Requiere la vista del detalle.
 */
/**
 * Si ha pulasdo cancel devlover controlador de paginaAnterior
 */
if (isset($_REQUEST['cancel'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header("Location:index.php");
    exit;
}

require_once $views['layout'];
?>