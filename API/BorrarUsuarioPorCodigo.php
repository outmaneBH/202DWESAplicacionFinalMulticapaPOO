<?php

//https://outmane.local/API/BuscarUsuarioPorDesc.php?descUsuario=outmane
/**
 * Llamar a los modelos porque no tenemos el index que controla eso de modelos 
 */
require_once "../config/confDBPDO.php";
require_once "../model/AppError.php";
require_once "../model/interfaceDB.php";
require_once "../model/interfaceUsuarioDB.php";
require_once "../model/DBPDO.php";
require_once "../model/Usuario.php";
require_once "../model/UsuarioPDO.php";


/**
 * Declarar un array
 */
$aUsuarios = [];

/**
 * sacar el codigo de usario y comprobar que tiene valor
 */

if (isset($_GET["codUsuario"])&& $_GET["key"]=='administrador'){
    $borrar = UsuarioPDO::borrarUsuarioPorCodigo($_GET["codUsuario"]); //meter el objeto de usuario devuelto en un varibale 
    if ($borrar) {//comprobar si ha borrado bien
        $aUsuarios = [
            'respuesta' => true,
            'msg' => "se Ha borrado el usario Correctamente"];
    } else {//meter el error devuelto desde el servidor
        $aUsuarios = [
            'respuesta' => false,
            'msg' => "No se Ha podido borrar el usuario con  este codigo"];
    }
} else {
    //Cuando no se ha escrito el paramaetro de Codigo mostramos el error
    $aUsuarios = [
        'respuesta' => false,
        'msg' => "No se Ha podido encontrar el usuario no hay parametros o no Tienes El codigo para Acceder "];
}

/**
 * alamcenamos el array devuelto en un fichero Json.Y mostramos  el fichero json
 */
$myJSON = json_encode($aUsuarios);
echo $myJSON;
?>

