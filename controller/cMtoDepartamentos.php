<?php

/* Volvernos a inicioPrivado cuando se pulsaado cancel */
if (isset($_REQUEST['cancel'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    unset($_SESSION['paginacion']);
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header("Location:index.php");
    exit;
}

/* rehabilitar al depatamento seleccionado */
if (isset($_REQUEST['down'])) {
    DepartamentoPDO::bajaLogicaDepartamento($_REQUEST['down']);
}

/* Dar alta depatamento seleccionado */
if (isset($_REQUEST['up'])) {
    DepartamentoPDO::altaLogicaDepartamento($_REQUEST['up']);
}

/* Borrar depatamento si el usuario ha pulsado delete departamento */
if (isset($_REQUEST['delete'])) {
    DepartamentoPDO::deleteDepartamento($_REQUEST['delete']);
}
/**/


$totalPage = ceil(DepartamentoPDO::Total() / 3);

if (isset($_REQUEST['last'])) {
    $_SESSION['paginacion'] = $totalPage;
}
/**/

if (isset($_REQUEST['first'])) {
    $_SESSION['paginacion'] = 1;
}
/**/
if (isset($_REQUEST['prev']) && $_SESSION['paginacion'] >= 2) {
    $_SESSION['paginacion']--;
}
/**/
if (isset($_REQUEST['next']) && $_SESSION['paginacion'] < $totalPage) {
    $_SESSION['paginacion']++;
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

/* meter el valor de select en variable respuesta */
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
if (!isset($_SESSION['paginacion'])) {
    $_SESSION['paginacion'] = 1;
}

//$objetoDepartamento = DepartamentoPDO::pagination($start,$end);
$objetoDepartamento = DepartamentoPDO::buscaDepartamentosPorDesc($aRespuestas["searchTxt"], $aRespuestas["select"], $_SESSION['paginacion']);


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

