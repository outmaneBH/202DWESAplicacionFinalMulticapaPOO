<?php
/**
 * @author OUTMANE BOUHOU
 * @since 5/01/2022
 * @version 1.0
 * 
 * Controlador del pagina in progress.
 * Requiere la vista del pagina in progress.
 */
if (isset($_REQUEST['cancelwip'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso']='inicioPrivado';
    header("Location:index.php");
    exit;
}

require_once $views['layout'];

?>