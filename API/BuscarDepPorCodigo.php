<?php
/**
 * Llamar a los modelos porque no tenemos el index que controla eso de modelos 
 */
require_once "../config/confDBPDO.php";
require_once "../model/AppError.php";
require_once "../model/interfaceDB.php";
require_once "../model/interfaceUsuarioDB.php";
require_once "../model/DBPDO.php";
require_once "../model/DepartamentoPDO.php";
require_once "../model/Departamento.php";

/**
 * Declarar un array
 */
 $aDepartamento = [];
 
 /**
  * sacar el codigo de departamento y comjprobar que tiene valor
  */
if (isset($_GET["codDepartamento"])) {

    $buscarDepartamento = DepartamentoPDO::buscaDepartamentoPorCod($_GET["codDepartamento"]);//meter el objeto de departamento devuelto en un varibale 

    if ($buscarDepartamento) {//comprobar si hay datos meterlos en un array
        $aDepartamento = [
            'respuesta' => true,
            'codigo' => $buscarDepartamento->get_codDepartamento(),
            'descripcion' => $buscarDepartamento->get_descDepartamento(),
            'fechaCrea' => $buscarDepartamento->get_fechaCreacionDepartamento(),
            'volumen' => $buscarDepartamento->get_volumenDeNegocio(),
            'fechaBaja' => $buscarDepartamento->get_fechaBajaDepartamento()];
    } else {//meter el error devuelto desde el servidor
        $aDepartamento = [
            'respuesta' => false,
            'msg' => "No se Ha podido encontrar el departamento con el codigo"];
    }
}else{
    //Cuando no se ha escrito el paramaetro de Codigo mostramos el error
    $aDepartamento = [
            'respuesta' => false,
            'msg' => "No has escrito el Parametro de CodigoDepartamento"]; 
}

/**
 * alamcenamos el array devuelto en un fichero Json.Y mostramos  el fichero json
 */
$myJSON = json_encode($aDepartamento);
echo $myJSON ;

//http://daw202.sauces.local/202DWESAplicacionFinalMulticapaPOO/API/BuscarDepPorCodigo.php?codDepartamento=DIW
?>

