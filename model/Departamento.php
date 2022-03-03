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
    function set_codDepartamento($codDepartamento) {
       $this->codDepartamento=$codDepartamento;
    }

    function get_descDepartamento() {
        return $this->descDepartamento;
    }
    function set_descDepartamento($descDepartamento) {
         $this->descDepartamento=$descDepartamento;
    }

    function get_fechaCreacionDepartamento() {
        return $this->fechaCreacionDepartamento;
    }

    function get_volumenDeNegocio() {
        return $this->volumenDeNegocio;
    }
    function set_volumenDeNegocio($volumenDeNegocio) {
         $this->volumenDeNegocio=$volumenDeNegocio;
    }

    function get_fechaBajaDepartamento() {
        return $this->fechaBajaDepartamento;
    }

}

class Pagination {

    private $first;
    private $last;
    private $next;
    private $prev;

    function __construct($first, $last, $next, $prev) {
        $this->first = $first;
        $this->last = $last;
        $this->next = $next;
        $this->prev = $prev;
    }

    function get_fisrt() {
        return $this->first;
    }

    function get_last() {
        return $this->last;
    }

    function get_next() {
        return $this->next;
    }

    function get_prev() {
        return $this->prev;
    }

    function set_fisrt($first) {
        $this->first = $first;
    }

    function set_last($last) {
        $this->last = $last;
    }

    function set_next($next) {
        $this->next = $next;
    }

    function set_prev($prev) {
        $this->prev = $prev;
    }

}

?>
