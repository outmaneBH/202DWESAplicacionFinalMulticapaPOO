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

        $sql = "SELECT * FROM T02_Departamento WHERE T02_CodDepartamento='" . $codDepartamento . "'";
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

    /**
     * 
     * La funcion busca departamento con descripcion y por defecto es null
     * devuelve un array porque puede contener mas de un registro.
     * 
     * @param String $validDepartamento
     * @return array Departamento
     */
    public static function buscaDepartamentosPorDesc($validDepartamento = null, $select) {
        $query = '';
        switch ($select) {
            case "all":$query = '';
                break;
            case "alta":$query = ' AND T02_FechaBajaDepartamento IS NULL';
                break;
            case "baja":$query = ' AND T02_FechaBajaDepartamento IS NOT NULL';
                break;
        }
        $aDepartamento = [];
        $sql = "SELECT * FROM T02_Departamento where T02_DescDepartamento  like  '%" . $validDepartamento . "%' $query";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultado = $resultadoConsulta->fetchAll();

        if ($resultado) {
            $i = 0;
            foreach ($resultado as $value) {
                $aDepartamento[$i] = new Departamento(
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

    /**
     * Dar a la funcion el codigo de departamento dar al departamento una
     * baja logica , lo cambiamos en la base de datos
     * 
     * @param Int $codDepartamento
     */
    public static function bajaLogicaDepartamento($codDepartamento) {
        $ofecha = new DateTime();
        $time = $ofecha->getTimestamp();
        $sql2 = "UPDATE T02_Departamento SET T02_FechaBajaDepartamento=" . $time . " WHERE T02_CodDepartamento='" . $codDepartamento . "'";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql2);
    }

    /**
     * Dar a la funcion el codigo de departamento , dar al departamento una
     * Alta logica , lo cambiamos en la base de datos
     * 
     * @param Int $codDepartamento
     */
    public static function altaLogicaDepartamento($codDepartamento) {
        $sql2 = "UPDATE T02_Departamento SET T02_FechaBajaDepartamento=null WHERE T02_CodDepartamento='" . $codDepartamento . "'";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql2);
    }

    /**
     * Dar a la funcion el codigo de departamento 
     * para borrar este dipartamento en la base de datos
     * 
     * @param Int $codDepartamento
     */
    public static function deleteDepartamento($codDepartamento) {
        $sql2 = "DELETE FROM T02_Departamento  WHERE T02_CodDepartamento='" . $codDepartamento . "'";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql2);
    }

    public static function pagination($limitStrat,$LimitEnd) {
        $aDepartamento = [];
        $sql = "SELECT * FROM T02_Departamento limit $limitStrat,$LimitEnd";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultado = $resultadoConsulta->fetchAll();
        if ($resultado) {
            $i = 0;
            foreach ($resultado as $value) {
                $aDepartamento[$i] = new Departamento(
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
    public static function Total() {
      
        $sql = "SELECT * FROM T02_Departamento";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultado = $resultadoConsulta->rowCount();
        return $resultado;
    }
}
?>

