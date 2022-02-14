<?php

/* Volvernos a inicioPrivado cuando se pulsaado home */
if (isset($_REQUEST['cancel'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];

    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header("Location:index.php");
    exit;
}

if (isset($_REQUEST['down'])) {
    DepartamentoPDO::bajaLogicaDepartamento($_REQUEST['down']);
}

if (isset($_REQUEST['up'])) {
    DepartamentoPDO::altaLogicaDepartamento($_REQUEST['up']);
}

if (isset($_REQUEST['delete'])) {
    DepartamentoPDO::deleteDepartamento($_REQUEST['delete']);
}

/* definir un array para alamcenar errores del description */
$aErrores = [
    "searchTxt" => null];

/* Array de respuestas inicializado a null */
$aRespuestas = [
    "searchTxt" => null,
    "select" => null
];
$aDepartamentos = [];

if (isset($_REQUEST["select"])) {
    $aRespuestas["select"] = $_REQUEST["select"];
}

/* comprobar si ha pulsado el button buscar */
if (isset($_REQUEST['search'])) {
    //Para cada campo del formulario: Validamos la entrada y actuar en consecuencia
    //Validar entrada
    //Comprobar si el campo description  esta rellenado 
    $aErrores["searchTxt"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['searchTxt'], 1000, 1, OPCIONAL);

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
    /* almacenamos los datos
     */
    $aRespuestas["searchTxt"] = $_REQUEST["searchTxt"]; //meter el varibale de la drescripcion en aRespuestas y select value
}
/**
 * buscamos el departamento con su descripcion metiendole en variable como objeto y reccorerlo para usar
 * el array en la vista de mtodepartamentos.
 */
$_SESSION ["codDepartamentoEnCurso"] = $aRespuestas["searchTxt"];
$CodigoDepartamento = $_SESSION ["codDepartamentoEnCurso"];


$objetoDepartamento = DepartamentoPDO::buscaDepartamentosPorDesc($aRespuestas["searchTxt"], $aRespuestas["select"]);
if ($objetoDepartamento) {
    foreach ($objetoDepartamento as $aDepartamento) {
        array_push($aDepartamentos, [
            'codigo' => $aDepartamento->get_codDepartamento(),
            'descripcion' => $aDepartamento->get_descDepartamento(),
            'fechaCrea' => date('d-m-Y  , H:i:s', $aDepartamento->get_fechaCreacionDepartamento()),
            'volumen' => $aDepartamento->get_volumenDeNegocio(),
            'fechaBaja' => $aDepartamento->get_fechaBajaDepartamento()
        ]);
    }
}


require_once $views['layout'];
?>

