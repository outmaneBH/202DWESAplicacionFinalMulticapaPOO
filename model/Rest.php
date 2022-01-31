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

    public static function provincia($codProvincia) {

        $oProvincia = null;
        $jsonFile = file_get_contents("https://www.el-tiempo.net/api/json/v2/provincias/$codProvincia");
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

