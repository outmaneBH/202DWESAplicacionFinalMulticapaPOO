<?php

/**
 * @author OUTMANE BOUHOU
 * @since 5/01/2022
 * @version 1.0
 * 
 * Controlador del Registro.
 * Requiere la vista del Registro.
 */
/* Si el usuario ha pulsado en cancelar cambiamos la vista y devolver la pagina de login */
if (isset($_REQUEST['btncancelar'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
    header("Location:index.php");
    exit;
}
/* Varible de entrada correcta inicializada a true */
$entradaOK = true;

/* definir un array para alamcenar errores del username,password y description */
$aErrores = ['username' => null,
    'password' => null,
    'DescUsuario' => null
];

/* Array de respuestas inicializado a null */
$aRespuestas = ['username' => null,
    'password' => null,
    'DescUsuario' => null
];

$error = "";
/* comprobar si ha pulsado el button entrar */
if (isset($_REQUEST['btncreate'])) {
    //Para cada campo del formulario: Validar entrada y actuar en consecuencia
    //Validar entrada
    //Comprobar si el campo DescUsuario esta rellenado
    $aErrores["DescUsuario"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescUsuario'], 255, 1, OBLIGATORIO);

    //Comprobar si el campo username esta rellenado
    $aErrores["username"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['username'], 8, 2, OBLIGATORIO);

    //Comprobar si el campo password esta rellenado
    $aErrores["password"] = validacionFormularios::validarPassword($_REQUEST['password'], 8, 3, OBLIGATORIO);

    /* meter el error si este usuario ye tiene cuenta antes */
    if ($aErrores["username"] == null) {
        $aErrores["username"] = UsuarioPDO::validarCodNoExiste($_REQUEST['username']);
        $error = $aErrores["username"];
    }

    /* recorrer el array de errores */
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

    /* Insertamos el nuevo usuario y hagamos la actualizacion de este usuario  */
    UsuarioPDO::altaUsuario($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['DescUsuario']);
    $objetoUsuario = UsuarioPDO::validarUsuario($_REQUEST['username'], $_REQUEST['password']);

    /* Si todo esta bien metemos su datos en la session y cambiamos la vista a inicio */
    if ($objetoUsuario) {

        $oUsuario = UsuarioPDO::registrarUltimaConexion($objetoUsuario);
        $_SESSION['usuario202DWESAplicacionFinalMulticapaPOO'] = $oUsuario;

        /* LLevamos el usuario a la pagina de inicio */
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header('Location: index.php');
        exit;
    }
} else {
    //Mostrar el formulario hasta que lo rellenemos correctamente
    //Mostrar formulario

    require_once $views['layout'];
}
?>

