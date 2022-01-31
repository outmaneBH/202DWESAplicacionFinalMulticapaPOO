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

  
}
?>

