<?php

require_once "../config/confDBPDO.php";
require_once "../model/AppError.php";
require_once "../model/interfaceDB.php";
require_once "../model/interfaceUsuarioDB.php";
require_once "../model/DBPDO.php";
require_once "../model/DepartamentoPDO.php";
require_once "../model/Departamento.php";


if (isset($_GET["codDepartamento"])) {

    $aDepartamento = [];
    $buscarDepartamento = DepartamentoPDO::buscaDepartamentoPorCod($_GET["codDepartamento"]);

    if ($buscarDepartamento) {
        $aDepartamento = [
            'respuesta' => true,
            'codigo' => $buscarDepartamento->get_codDepartamento(),
            'descripcion' => $buscarDepartamento->get_descDepartamento(),
            'fechaCrea' => $buscarDepartamento->get_fechaCreacionDepartamento(),
            'volumen' => $buscarDepartamento->get_volumenDeNegocio(),
            'fechaBaja' => $buscarDepartamento->get_fechaBajaDepartamento()];
    } else {
        $aDepartamento = [
            'error' => false,
            'msg' => "No se Ha podido encontrar el departamento con el codigo"];
    }
}
$json = json_encode($aDepartamento, JSON_PRETTY_PRINT);
var_dump($json);
?>

