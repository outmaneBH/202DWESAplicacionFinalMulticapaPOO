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

$entradaOK = true;

/* definir un array para alamcenar errores del username y la password */
$aErrores = ["codeDep" => null,
    "description" => null,
    "salary" => null
];

/* Array de respuestas inicializado a null */
$aRespuestas = ["codeDep" => null,
    "description" => null,
    "salary" => null
];

/* comprobar si ha pulsado el button enviar */
if (isset($_REQUEST['submitbtn'])) {
    //Para cada campo del formulario: Validamos la entrada y actuar en consecuencia
    //Validar entrada
    //Comprobar si el campo codeDep esta rellenado
    $aErrores["codeDep"] = validacionFormularios::comprobarAlfabetico($_REQUEST['codeDep'], 3, 3, OBLIGATORIO);

    //Comprobar si el campo description  esta rellenado 
    $aErrores["description"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['description'], 1000, 10, OBLIGATORIO);

    //Comprobar si el campo salary  esta rellenado 
    $aErrores["salary"] = validacionFormularios::comprobarFloat($_REQUEST['salary'], 10000, 1, OBLIGATORIO);

    if (!$aErrores["codeDep"]) {
        /* comprobamos si el codigo existe en la base de datos */

        $codExiste = DepartamentoPDO::validarCodNoExiste($_REQUEST['codeDep']);
        /* Si existe mostramos el error que esta */
        if ($codExiste) {
            $aErrores['codeDep'] = "Ya existe ese código";
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
    /* almacenamos los datos correctos */
    $aRespuestas = [
        "codeDep" => $_REQUEST['codeDep'],
        "description" => $_REQUEST['description'],
        "salary" => $_REQUEST['salary']
    ];

    $altaDepartamento = DepartamentoPDO::altaDepartamento($aRespuestas["codeDep"], $aRespuestas["description"], $aRespuestas["salary"]);
    if ($altaDepartamento) {
        header("Location:index.php");
        exit;
    }
} else {
    require_once $views['layout'];
}




