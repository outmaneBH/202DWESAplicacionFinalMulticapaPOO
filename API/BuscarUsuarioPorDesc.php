<?php

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
 * sacar la descripcion de usario y comprobar que tiene valor
 */
if (isset($_GET["descUsuario"])) {

    $buscarUsuario = UsuarioPDO::buscarUsuarioPorDesc($_GET["descUsuario"]); //meter el objeto de usuario devuelto en un varibale 
 

    if ($buscarUsuario) {//comprobar si hay datos meterlos en un array
        $aUsuarios = [
            'respuesta' => true,
            'codUsuario' => $buscarUsuario->get_codUsuario(),
            'descUsuario' => $buscarUsuario->get_descUsuario(),
            'numConexiones' => $buscarUsuario->get_numConexiones(),
            'fechaHoraUltimaConexion' => $buscarUsuario->get_fechaHoraUltimaConexion(),
            'fechaHoraUltimaConexionAnterior' => $buscarUsuario->get_fechaHoraUltimaConexionAnterior(),
            'perfil' => $buscarUsuario->get_perfil(),
            'imagen' => $buscarUsuario->get_imagenUsuario()
        ];
    } else {//meter el error devuelto desde el servidor
        $aUsuarios = [
            'respuesta' => false,
            'msg' => "No se Ha podido encontrar el usuario con el esta descripcion"];
    }
} else {
    //Cuando no se ha escrito el paramaetro de Codigo mostramos el error
    $aUsuarios = [
        'respuesta' => false,
        'msg' => "No se Ha podido encontrar el usuario no hay parametros  "];
}
 
/**
 * alamcenamos el array devuelto en un fichero Json.Y mostramos  el fichero json
 */
$myJSON = json_encode($aUsuarios);
echo $myJSON;

?>

