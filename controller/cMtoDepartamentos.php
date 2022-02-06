<?php

/* Volvernos a inicioPrivado cuando se pulsaado home */
if (isset($_REQUEST['home'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header("Location:index.php");
    exit;
}

/* definir un array para alamcenar errores del description */
$aErrores = [
    "searchTxt" => null];

/* Array de respuestas inicializado a null */
$aRespuestas = [
    "searchTxt" => null
];
$aDepartamentos = [];

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
    
    $aRespuestas["searchTxt"] = $_REQUEST["searchTxt"];//meter el varibale de la drescripcion en aRespuestas
}
/**
 * buscamos el departamento con su descripcion metiendole en variable como objeto y reccorerlo para usar
 * el array en la vista de mtodepartamentos.
 */
$objetoDepartamento = DepartamentoPDO::buscaDepartamentosPorDesc($aRespuestas["searchTxt"]);
if ($objetoDepartamento) {
    foreach ($objetoDepartamento as $aDepartamento) {
        array_push($aDepartamentos, [
            'codigo' => $aDepartamento->get_codDepartamento(),
            'descripcion' => $aDepartamento->get_descDepartamento(),
            'fechaCrea' => $aDepartamento->get_fechaCreacionDepartamento(),
            'volumen' => $aDepartamento->get_volumenDeNegocio(),
            'fechaBaja' => $aDepartamento->get_fechaBajaDepartamento()
        ]);
    }
}


require_once $views['layout'];
?>

