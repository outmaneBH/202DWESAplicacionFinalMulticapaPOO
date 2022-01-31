<?php
/**
 * @author OUTMANE BOUHOU
 * @since 5/01/2022
 * @version 1.0
 * 
 * Controlador del inicioPublico.
 * Requiere la vista del de inicioPublico.
 */

/*Si el usuario ha pulsado en login cambiamos la vista y devolver la pagina de login*/
if (isset($_REQUEST['btnlogin'])) {
    $_SESSION['paginaEnCurso'] = 'login';
    header("Location:index.php");
    exit;
}

/*Si el usuario ha pulsado en registrar cambiamos la vista y devolver la pagina de registrar*/
if (isset($_REQUEST['btnregister'])) {
    $_SESSION['paginaEnCurso'] = 'registrar';
    header("Location:index.php");
    exit;
}


require_once $views['layout'];
?>
