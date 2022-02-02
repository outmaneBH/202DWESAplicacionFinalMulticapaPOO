<?php

/**
 * @author OUTMANE BOUHOU
 * @updated: 02/02/2022
 * @version 1.0
 * 
 * Clase para defenido de atributos y metodos de Deparatemto
 */
class Departamento {

    /**
     * Properties de la clase Departamento
     */
    private $codDepartamento;
    private $descDepartamento;
    private $fechaCreacionDepartamento;
    private $volumenDeNegocio;
    private $fechaBajaDepartamento;

    /**
     * constroctor de clase Departamento
     */
    function __construct($codDepartamento, $descDepartamento, $fechaCreacionDepartamento, $volumenDeNegocio, $fechaBajaDepartamento) {
        $this->codDepartamento = $codDepartamento;
        $this->descDepartamento = $descDepartamento;
        $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
        $this->volumenDeNegocio = $volumenDeNegocio;
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }

    /**
     *  get y set de la clase Departamento
     */
    function get_codDepartamento() {
        return $this->codDepartamento;
    }

    function get_descDepartamento() {
        return $this->descDepartamento;
    }
     function get_fechaCreacionDepartamento() {
        return $this->fechaCreacionDepartamento;
    }
     function get_volumenDeNegocio() {
        return $this->volumenDeNegocio;
    }
     function get_fechaBajaDepartamento() {
        return $this->fechaBajaDepartamento;
    }

}

?>
