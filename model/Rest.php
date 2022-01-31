<?php

class REST {

    public static function Buscaruniversidad($country) {
        $aUniversidad = [];
        $jsonFile = file_get_contents("http://universities.hipolabs.com/search?country=$country");
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

    public static function get_http_response_code($url) {
        $aHeaders = get_headers($url);
        return substr($aHeaders[0], 9, 3);
    }

    public static function obtenerDatosCrudos($url, $parametros) {
        $sResultado = false;
        if (self::get_http_response_code($url . $parametros) == "200") {
            $sResultado = file_get_contents($url .$parametros);
        }
        return $sResultado;
    }

    public static function provincia($codProvincia) {
        $oProvincia = null;
       
        $jsonFile = self::obtenerDatosCrudos("https://www.el-tiempo.net/api/json/v2/provincias/",$codProvincia);
        $provincia = json_decode($jsonFile, true);
        if ($provincia) {
            $oProvincia = new Provincia($provincia['title'],
                    $provincia['ciudades']['0']['idProvince'],
                    $provincia['ciudades']['0']['stateSky']['description'],
                    $provincia['today']['p'],
                    $provincia['ciudades']['0']['temperatures']['max'],
                    $provincia['ciudades']['0']['temperatures']['min']
            );
        }
        return $oProvincia;
    }

}
?>

