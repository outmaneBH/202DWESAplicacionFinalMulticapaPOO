<?php

class universidad{

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
?>

