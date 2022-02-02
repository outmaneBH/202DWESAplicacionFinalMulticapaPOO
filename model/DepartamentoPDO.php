<?php

/**
 * @author OUTMANE BOUHOU
 * @updated: 02/02/2022
 * @version 1.0
 * 
 * Clase para defenido de atributos y metodos de Deparatemto
 */
class DepartamentoPDO {

    public static function buscaDepartamentoPorCod($codDepartamento) {
        $validDepartamento = null;

        $sql = "SELECT T02_Departamento FROM T01_Usuario WHERE T02_CodDepartamento='" . $validDepartamento . "'";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultado = $resultadoConsulta->fetchObject();
        if ($resultado != null) {
            $CodNoExiste = "Ya hay Cuenta con este Usuario.";
        }
        return $validDepartamento;
    }

}
?>

