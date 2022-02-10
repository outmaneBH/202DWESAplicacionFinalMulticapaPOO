<?php

/**
 * @author OUTMANE BOUHOU
 * @since 5/01/2022
 * @version 1.0
 * 
 * Controlador del cambiarPassword.
 * Requiere la vista del de cambiarPassword.
 */
/**
 * Si ha pulasdo cancel devlover controlador de paginaAnterior
 */
if (isset($_REQUEST['btncancelar'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'editar';
    header("Location:index.php");
    exit;
}

$oUsuario = $_SESSION['usuario202DWESAplicacionFinalMulticapaPOO'];
/* Varible de entrada correcta inicializada a true */
$entradaOK = true;

/* definir un array para alamcenar errores del nombre y la altura */
$aErrores = ['password' => null,
    'password1' => null,
    'password2' => null
];

/* Array de respuestas inicializado a null */
$aRespuestas = ['password' => null,
    'password1' => null,
    'password2' => null
];

$error = "";


/* comprobar si ha pulsado el button entrar */
if (isset($_REQUEST['btnupdate'])) {

//Para cada campo del formulario: Validar entrada y actuar en consecuencia
//Validar entrada
//Comprobar si el campo password esta rellenado
    $aErrores["password"] = validacionFormularios::validarPassword($_REQUEST['password'], 8, 1, 2, OBLIGATORIO);

//Comprobar si el campo password1 esta rellenado
    $aErrores["password1"] = validacionFormularios::validarPassword($_REQUEST['password1'], 8, 1, 2, OBLIGATORIO);

//Comprobar si el campo password2 esta rellenado
    $aErrores["password2"] = validacionFormularios::validarPassword($_REQUEST['password2'], 8, 1, 2, OBLIGATORIO);

    /* Si hay algun error devolvernos el mensaje de $error */
    if ($aErrores["password"] || $aErrores["password1"] || $aErrores["password2"]) {
        $error = "! Algo mal ¡";
    }
    if (!UsuarioPDO::validarUsuario($oUsuario->get_codUsuario(), $_REQUEST['password'])) {
        $error = "Pass Error";
    } else {
        if ($_REQUEST['password1'] != $_REQUEST['password2']) {
            $entradaOK = false;
        }
    }



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

    $cambiarUsuario = UsuarioPDO::cambiarPassword($oUsuario->get_codUsuario(), $_REQUEST['password1']);

    if ($cambiarUsuario) {
        /* LLevamos el usuario a la pagina de inicio */
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'editar';
        header('Location: index.php');
        exit;
    }
} else {
//Mostrar el formulario hasta que lo rellenemos correctamente
//Mostrar formulario

    require_once $views['layout'];
}
