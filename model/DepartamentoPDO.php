<?php

/**
 * @author OUTMANE BOUHOU
 * @updated: 02/02/2022
 * @version 2.0
 * 
 * Este clase DepartamentoPDO contiene un static metodo buscaDepartamentoPorCod
 */
class DepartamentoPDO {
    /**
     * 
     * @param int $codDepartamento
     * @return objeto 
     */

    public static function buscaDepartamentoPorCod($codDepartamento) {
        $validDepartamento = null;

        $sql = "SELECT * FROM T02_Departamento WHERE T02_CodDepartamento='" . $validDepartamento . "'";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultado = $resultadoConsulta->fetchObject();
        if ($resultado != null) {
            $validDepartamento = new Departamento(
                    $resultado->T02_CodDepartamento,
                    $resultado->T02_DescDepartamento,
                    $resultado->T02_FechaCreacionDepartamento,
                    $resultado->T02_VolumenNegocio,
                    $resultado->T02_FechaBajaDepartamento
            );
        }

        return $validDepartamento;
    }

}
?>

