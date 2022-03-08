<?php

/**
 * @author OUTMANE BOUHOU
 * @since 2/03/2022
 * @version 1.0
 * 
 * Controlador del login.
 * Requiere la vista del login.
 */
$departamentoEnCurso = $_SESSION['DepartamentoEnCurso'];
$aModificar = [
    'codDepartamento' => $departamentoEnCurso->get_codDepartamento(),
    'descDepartamento' => $departamentoEnCurso->get_descDepartamento(),
    'volumenDepartamento' => $departamentoEnCurso->get_volumenDeNegocio()
];

/* Si el usuario ha pulsado en registrar cambiamos la vista y devolver la pagina de registrar */
if (isset($_REQUEST['cancel'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'mtodepartamentos';
    header("Location:index.php");
    exit;
}

$entradaOK = true;

/* definir un array para alamcenar errores del username y la password */
$aErrores = [
    "codeDep" => null,
    "description" => null,
    "salary" => null
];

/* Array de respuestas inicializado a null */
$aRespuestas = [
    "description" => null,
    "salary" => null
];

/* comprobar si ha pulsado el button enviar */
if (isset($_REQUEST['submitbtn'])) {
    //Para cada campo del formulario: Validamos la entrada y actuar en consecuencia
    //Validar entrada
    //Comprobar si el campo description  esta rellenado 
    $aErrores["description"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['description'], 1000, 10, OBLIGATORIO);

    //Comprobar si el campo salary  esta rellenado 
    $aErrores["salary"] = validacionFormularios::comprobarFloat($_REQUEST['salary'], 10000, 1, OBLIGATORIO);

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
        "description" => $_REQUEST['description'],
        "salary" => $_REQUEST['salary']
    ];

    $modificarDepartamento = DepartamentoPDO::modificaDepartamento($aModificar["codDepartamento"], $aRespuestas["description"], $aRespuestas["salary"]);

    if ($modificarDepartamento) {
        $departamentoEnCurso->set_descDepartamento($aRespuestas["description"]);
        $departamentoEnCurso->set_volumenDeNegocio($aRespuestas["salary"]);
    }
    $_SESSION['paginaEnCurso'] = 'mtodepartamentos';
    header("Location:index.php");
    exit;
} else {
    require_once $views['layout'];
}
    





