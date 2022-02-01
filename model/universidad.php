
<?php

/**
 * @author OUTMANE BOUHOU
 * @updated: 31/01/2022
 * @version 1.0
 * 
 * Clase para el usar los el constuoctor y los metodos en el la clase REST
 */

/**
 * Uso de mi clase universidad 
 */
class universidad {

    private $name;
    private $country;
    private $website;
    private $code;
    private $state_province;

    function __construct($name, $country, $website, $code, $state_province) {
        $this->name = $name;
        $this->country = $country;
        $this->website = $website;
        $this->code = $code;
        $this->state_province = $state_province;
    }

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }

    function getCountry() {
        return $this->country;
    }

    function setCountry($country) {
        $this->country = $country;
    }

    function getWebsite() {
        return $this->website;
    }

    function setWebsite($website) {
        $this->website = $website;
    }

    function getCode() {
        return $this->code;
    }

    function setCode($code) {
        $this->code = $code;
    }

    function getState_province() {
        return $this->state_province;
    }

    function setState_province($state_province) {
        $this->state_province = $state_province;
    }

}

/**
 * Uso de la clase provincia de Aplicacion de Aroa
 */
class Provincia {

    private $provincia;
    private $idProvincia;
    private $name;
    private $descripcion;
    private $tiempo;
    private $temperaturaMax;
    private $temperaturaMin;

    function __construct($provincia, $idProvincia,$name, $descripcion, $tiempo, $temperaturaMax, $temperaturaMin) {
        $this->provincia = $provincia;
        $this->name = $name;
        $this->idProvincia = $idProvincia;
        $this->descripcion = $descripcion;
        $this->tiempo = $tiempo;
        $this->temperaturaMax = $temperaturaMax;
        $this->temperaturaMin = $temperaturaMin;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getIdProvincia() {
        return $this->idProvincia;
    }
     function getName() {
        return $this->name;
    }

    

    function getDescripcion() {
        return $this->descripcion;
    }

    function getTiempo() {
        return $this->tiempo;
    }

    function getTemperaturaMax() {
        return $this->temperaturaMax;
    }

    function getTemperaturaMin() {
        return $this->temperaturaMin;
    }

}

?>
