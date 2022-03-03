<?php
if (isset($_REQUEST['cancel'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header("Location:index.php");
    exit;
}
if (isset($_SESSION['usuario202DWESAplicacionFinalMulticapaPOO'])) {

    $objectUsuario = $_SESSION['usuario202DWESAplicacionFinalMulticapaPOO'];
    $aInicioPrivado = ['perfil' => $objectUsuario->get_perfil()];
}
require_once $views['layout'];

?>

