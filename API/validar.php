<?php

//https://outmane.local/API/BuscarUsuarioPorDesc.php?descUsuario=outmane
/**
 * Llamar a los modelos porque no tenemos el index que controla eso de modelos 
 */
require_once "../config/confDBPDO.php";
require_once "../model/AppError.php";
require_once "../core/LibreriaValidacion.php";


/**
 * Declarar un array
 */
$aUsuarios = [];

/**
 * sacar 
 */
if (isset($_GET["dni"])&&$_GET["dni"]!=""&& $_GET["dni"]!=0) {

    $dni = validacionFormularios::validarDni($_GET["dni"]); //meter el objeto de usuario devuelto en un varibale 
  
    if ($dni!=" El DNI no es válido.") {//comprobar si hay datos meterlos en un array
        $aUsuarios = [
            'respuesta' => true,
            'msg' => "El dni Valido"];
        
    } else {//meter el error devuelto desde el servidor
        $aUsuarios = [
            'respuesta' => false,
            'msg' => "El dni no es Valido"];
    }
} else {
    //Cuando no se ha escrito el paramaetro de Codigo mostramos el error
    $aUsuarios = [
        'respuesta' => false,
        'msg' => "No se Ha podido encontrar datos no hay parametros o no Tienes El codigo para Acceder "];
}

/**
 * alamcenamos el array devuelto en un fichero Json.Y mostramos  el fichero json
 */
$myJSON = json_encode($aUsuarios);
echo $myJSON;
?>

