<?php
/**
 * @author Outmane Bouhou
 * @since 12/01/2022
 * @version 1.0
 * 
 * Usamos la clase para iniciar los erroes en toda la aplicaion (mostramos los excepciones en una otra vista )
 */

class AppError {

    /**
     * Properties de la clase AppError
     */
    private $codError;
    private $descError;
    private $archivoError;
    private $lineaError;
    private $paginaSiguiente;


    
    /**
     *  constroctor AppError
     */
    function __construct($codError, $descError, $archivoError, $lineaError, $paginaSiguiente) {
        $this->codError = $codError;
        $this->descError = $descError;
        $this->archivoError = $archivoError;
        $this->lineaError = $lineaError;
        $this->paginaSiguiente = $paginaSiguiente;
    }

    /**
     * Los Geters y Los seteres
     */
    function get_codError() {
        return $this->codError;
    }

    function set_codError($codError) {
        $this->codError = $codError;
    }

 

    function get_descError() {
        return $this->descError;
    }

    function set_descError($descError) {
        $this->descError = $descError;
    }

   

    function get_archivoError() {
        return $this->archivoError;
    }

    function set_archivoError($archivoError) {
        $this->archivoError = $archivoError;
    }

  

    function get_lineaError() {
        return $this->lineaError;
    }

    function set_lineaError($lineaError) {
        $this->lineaError = $lineaError;
    }

    

    function get_paginaSiguiente() {
        return $this->paginaSiguiente;
    }

    function set_fechaHoraUltimaConexionAnterior($paginaSiguiente) {
        $this->paginaSiguiente = $paginaSiguiente;
    }

}
