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
 * sacar la descripcion de usario y comprobar que tiene valor
 */
if (isset($_GET["descUsuario"])) {

    $buscarUsuario = UsuarioPDO::buscarUsuarioPorDesc($_GET["descUsuario"]); //meter el objeto de usuario devuelto en un varibale 
   
    if ($buscarUsuario) {//comprobar si hay datos meterlos en un array
        $i = 0;
        foreach ($buscarUsuario as $resultado) {

            $aUsuarios[$i]['codUsuario'] = $resultado->get_codUsuario();
            $aUsuarios[$i]['descUsuario'] = $resultado->get_descUsuario();
            $aUsuarios[$i]['numConexiones'] = $resultado->get_numConexiones();
            $aUsuarios[$i]['fechaHoraUltimaConexion'] = $resultado->get_fechaHoraUltimaConexion();
            $aUsuarios[$i]['fechaHoraUltimaConexionAnterior'] = $resultado->get_fechaHoraUltimaConexionAnterior();
            $aUsuarios[$i]['perfil'] = $resultado->get_perfil();
            $aUsuarios[$i]['imagen'] =$resultado->get_imagenUsuario();

            $i++;
        }
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

