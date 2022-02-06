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
     * La funcion busca un departamento con codigo existe
     * sino devuelve null
     * 
     * @param int $codDepartamento
     * @return objeto $validDepartamento
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
                    $resultado->T02_VolumenNegocio,
                    $resultado->T02_FechaBajaDepartamento
            );
        }

        return $validDepartamento;
    }

    /**
     * 
     * La funcion busca departamento con descripcion y por defecto es null
     * devuelve un array porque puede contener mas de un registro.
     * 
     * @param String $validDepartamento
     * @return array Departamento
     */
    public static function buscaDepartamentosPorDesc($validDepartamento=null) {
        $aDepartamento = [];
        $sql = "SELECT * FROM t02_departamento where T02_DescDepartamento  like  '%" . $validDepartamento . "%'";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultado = $resultadoConsulta->fetchAll();
        
        if ($resultado) {
            $i=0;
            foreach ($resultado as $value) {
                $aDepartamento[$i]= new Departamento(
                                $value['T02_CodDepartamento'],
                                $value['T02_DescDepartamento'],
                                $value['T02_FechaCreacionDepartamento'],
                                $value['T02_VolumenNegocio'],
                                $value['T02_FechaBajaDepartamento']);
               $i++; 
            }
        }
                
        return $aDepartamento;
        
    }
}
?>

