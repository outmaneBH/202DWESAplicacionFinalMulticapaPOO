<?php

/**
 * @author Outmane Bouhou
 * @since 01/01/2022
 * @version 1.0
 * 
 * Clase que crea y utiliza usuarios en la aplicación.
 */
class Usuario {

    /**
     * Properties de la clase Usuario
     */
    private $codUsuario;
    private $password;
    private $descUsuario;
    private $numConexiones;
    private $fechaHoraUltimaConexion;
    private $fechaHoraUltimaConexionAnterior;
    private $perfil;
    private $imagenUsuario;

    /**
     * constroctor de clase Usuario
     */
    function __construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $fechaHoraUltimaConexionAnterior, $perfil, $imagenUsuario) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numConexiones = $numConexiones;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
        $this->perfil = $perfil;
        $this->imagenUsuario = $imagenUsuario;
    }

    /**
     *  get y set de la clase Usuario
     */
    function get_codUsuario() {
        return $this->codUsuario;
    }

    function set_codUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    function get_password() {
        return $this->password;
    }

    function set_password($codUsuario) {
        $this->password = $password;
    }

    function get_descUsuario() {
        return $this->descUsuario;
    }

    function set_descUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }

    function get_numConexiones() {
        return $this->numConexiones;
    }

    function set_numConexiones($numConexiones) {
        $this->numConexiones = $numConexiones;
    }

    function get_fechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }

    function set_fechaHoraUltimaConexion($fechaHoraUltimaConexion) {
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    }

    function get_fechaHoraUltimaConexionAnterior() {
        return $this->fechaHoraUltimaConexionAnterior;
    }

    function set_fechaHoraUltimaConexionAnterior($fechaHoraUltimaConexionAnterior) {
        $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
    }

    function get_perfil() {
        return $this->perfil;
    }

    function set_perfil($perfil) {
        $this->perfil = $perfil;
    }

    function get_imagenUsuario() {
        return $this->imagenUsuario;
    }

    function set_imagenUsuario($imagenUsuario) {
        $this->imagenUsuario = $imagenUsuario;
    }

}

?>
