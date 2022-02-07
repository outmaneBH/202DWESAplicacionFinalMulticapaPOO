<?php

/**
 * @author OUTMANE BOUHOU
 *  @updated: 31/01/2022
 * @version 1.0
 * 
 * Clase para el uso de Api Rest de internet y de un compañero.
 */
class REST {

    /**
     * Devolver array de universidades de un pais dado cmo parametro
     * 
     * @param String $country
     * @return array que contiene todos los datos devueltos sobre universidades del pais
     */
    public static function Buscaruniversidad($country) {
        $aUniversidad = [];
        $jsonFile = @file_get_contents("http://universities.hipolabs.com/search?country=$country");
        $universidad = json_decode($jsonFile, true);
        if ($universidad) {
            foreach ($universidad as $value) {
                array_push($aUniversidad, new universidad($value['name'],
                                $value['country'],
                                $value['web_pages'][0],
                                $value['alpha_two_code'],
                                $value['state-province']));
            }
        }
        return $aUniversidad;
    }


    /**
     * buscar Datos de una provincia con un codigo dado como parametro
     * 
     * @param Int $codProvincia
     * @return objeto dcon datos de la provincia
     */

    public static function provincia($codProvincia) {

        $oProvincia = null;
        $jsonFile = @file_get_contents("https://www.el-tiempo.net/api/json/v2/provincias/$codProvincia");
        $provincia = json_decode($jsonFile, true);
        if ($provincia) {
            $oProvincia = new Provincia($provincia['title'],
                    $provincia['ciudades']['0']['idProvince'],
                    $provincia['ciudades']['0']['nameProvince'],
                    $provincia['ciudades']['0']['stateSky']['description'],
                    $provincia['today']['p'],
                    $provincia['ciudades']['0']['temperatures']['max'],
                    $provincia['ciudades']['0']['temperatures']['min']
            );
        }

        return $oProvincia;
    }
    /**
     * La funcion devuelve datos de un departamento buscado con codigo
     * sacado como json file y devolverlo como objeto
     * 
     * @param Int $codDepartamento
     * @return objeto Departamento
     */
    public static function Departamento($codDepartamento) {

        $oDepartamento = null;
        $jsonFile = @file_get_contents("http://daw202.sauces.local/202DWESAplicacionFinalMulticapaPOO/API/BuscarDepPorCodigo.php?codDepartamento=$codDepartamento");
        $departamento = json_decode($jsonFile, true);
     
        if ($departamento['respuesta']) {
            $oDepartamento = new Departamento(
                    $departamento['codigo'],
                    $departamento['descripcion'],
                    $departamento['fechaCrea'],
                    $departamento['volumen'],
                    $departamento['fechaBaja'],
            );
        }

        return $oDepartamento;
    }


}
?>

