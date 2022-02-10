<?php

/**
 * @author OUTMANE BOUHOU
 * @since 5/01/2022
 * @version 1.0
 * 
 * Controlador del Micuenta.
 * Requiere la vista del Micuenta.
 */
/* Si el usuario ha pulsado en borrarcuenta cambiamos la vista y devolver la pagina de borrarcuenta */
if (isset($_REQUEST['btndelete'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'borrar';
    header("Location:index.php");
    exit;
}

/* Si el usuario ha pulsado en cancelar cambiamos la vista y devolver la pagina de inicio */
if (isset($_REQUEST['btncancelar'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header("Location:index.php");
    exit;
}
/* Si el usuario ha pulsado en cambiarpassword cambiamos la vista y devolver la pagina de Password */
if (isset($_REQUEST['btnupdatePass'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'cambiarpassword';
    header("Location:index.php");
    exit;
}

/* Meter la session en un array de variables */
$objectUsuario = $_SESSION['usuario202DWESAplicacionFinalMulticapaPOO'];
$aMiCuenta = [
    'codUsuario' => $objectUsuario->get_codUsuario(),
    'descUsuario' => $objectUsuario->get_descUsuario(),
    'numConexiones' => $objectUsuario->get_numConexiones(),
    'fechaHoraUltimaConexion' => $objectUsuario->get_fechaHoraUltimaConexion(),
    'fechaHoraUltimaConexionAnterior' => $objectUsuario->get_fechaHoraUltimaConexionAnterior(),
    'perfil' => $objectUsuario->get_perfil()
];
/* Varible de entrada correcta inicializada a true */
$entradaOK = true;

/* definir un array para alamcenar errores del DescUsuario */
$aErrores = [
    'DescUsuario' => null
];
if (isset($_REQUEST['btnupdate'])) {
    //Para cada campo del formulario: Validar entrada y actuar en consecuencia
    //Validar entrada
    //Comprobar si el campo DescUsuario esta rellenado
    $aErrores["DescUsuario"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescUsuario'], 255, 1, OBLIGATORIO);

//recorrer el array de errores
    foreach ($aErrores as $nombreCampo => $value) {
        //Comprobar si el campo ha sido rellenado
        if ($value != null) {
            $_REQUEST[$nombreCampo] = "";
            // cuando encontremos un error
            $entradaOK = false;
        }
    }
} else {
    //El formulario no se ha rellenado nunca
    $entradaOK = false;
}
if ($entradaOK) {
    //Tratamiento del formulario - Tratamiento de datos OK
    //Si los datos estan correctos
    $oUsuario = $_SESSION['usuario202DWESAplicacionFinalMulticapaPOO']; //metemos el codigo de la session en un variable

    UsuarioPDO::modificarUsuario($oUsuario, $_REQUEST['DescUsuario']); //hagamos la actualizacion y mostramos la pagina inicioPrivado
    
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header('Location: index.php');
    exit;
} else {
    //Mostrar el formulario hasta que lo rellenemos correctamente
    //Mostrar formulario
    require_once $views['layout'];
}
?>
