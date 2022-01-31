<?php

/**
 * @author OUTMANE BOUHOU
 * @since 20/01/2022
 * @version 1.0
 * 
 * Controlador del Api rest.
 * Requiere la vista del Api rest.
 */
/* Si el usuario ha pulsado en cancelar cambiamos la vista y devolver la pagina de anterior */

if (isset($_REQUEST['cancel'])) {
    unset($_SESSION['apisRest']);
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    $_SESSION['paginaAnterior'] = 'inicioPrivado';
    header("Location:index.php");
    exit;
}
/* Variable de entrada correcta inicializada a true */
$entradaOK = true;

/* definir un array para alamcenar errores del country y codigo De Provincia */
$aErrores = [
    "country" => null,
    "codProv" => null
];
 $aRespuestas=[
        "country" =>null,
        "codProv" =>null
    ];
$aRespuestas = [];
/* comprobar si ha pulsado el button enviar */
if (isset($_REQUEST['submitbtn'])) {
    //Para cada campo del formulario: Validamos la entrada y actuar en consecuencia
    //Validar entrada
    //Comprobar si el campo description  esta rellenado 
   //$aErrores["country"] = validacionFormularios::comprobarAlfabetico($_REQUEST['country'], 1000, 2, OBLIGATORIO);
    //$aErrores["codProv"] = validacionFormularios::comprobarEntero($_REQUEST['codProv'], 52, 1, OBLIGATORIO);

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
    if ($_REQUEST['country'] != "") {
        $aUniversidades = REST::Buscaruniversidad($_REQUEST['country']);//alamcenar en este variable el array devuelto
        if ($aUniversidades) {//comprobar si hay si hay datos ,recoremos el array
            $i = 0;
            foreach ($aUniversidades as $value) {
                $aRespuestas[$i]['name'] = $value->getName();
                $aRespuestas[$i]['country'] = $value->getCountry();
                $aRespuestas[$i]['website'] = $value->getWebsite();
                $aRespuestas[$i]['code'] = $value->getCode();
                $aRespuestas[$i]['state_profince'] = $value->getState_province();
                $i++;
            }
        }
    }
    
    if ($_REQUEST['codProv'] != "") {
        $oResultadoProv = REST::provincia($_REQUEST['codProv']);//almacenar el objeto de provincia 

        if ($oResultadoProv) {//comorobar que sea true no false ,y rellenar el array 
            $aResultado = [
                "provincia" => $oResultadoProv->getProvincia(),
                "idprovincia" => $oResultadoProv->getIdProvincia(),
                "descripcion" => $oResultadoProv->getDescripcion(),
                "tiempo" => $oResultadoProv->getTiempo(),
                "min" => $oResultadoProv->getTemperaturaMin(),
                "max" => $oResultadoProv->getTemperaturaMax()
            ];
           
        }
    }

}



require_once $views['layout'];
?>
