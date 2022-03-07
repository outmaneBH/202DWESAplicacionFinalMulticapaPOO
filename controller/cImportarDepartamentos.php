<?php

/**
 * @author OUTMANE BOUHOU
 * @since 2/03/2022
 * @version 1.0
 * 
 * Controlador del login.
 * Requiere la vista del login.
 */
/* Si el usuario ha pulsado en registrar cambiamos la vista y devolver la pagina de registrar */
if (isset($_REQUEST['cancel'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'mtodepartamentos';
    header("Location:index.php");
    exit;
}

$msg = null;
$entradaOK = true;

/* definir un array para alamcenar errores del username y la password */
$aErrores = ['fileDepartamentos' => null
];

if (isset($_REQUEST['import'])) {
    //Para cada campo del formulario: Validar entrada y actuar en consecuencia
    //Validar entrada
    //Comprobar si el campo username esta rellenado

    $aErrores["fileDepartamentos"] = validacionFormularios::comprobarNoVacio($_REQUEST['fileDepartamentos']);

    $error = $aErrores["fileDepartamentos"];
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
    DepartamentoPDO::importarDepartamento($_REQUEST['fileDepartamentos']);
}



require_once $views['layout'];





