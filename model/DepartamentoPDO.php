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
    public static function buscaDepartamentosPorDesc($departamentoBuscado = null, $select, $limit = 1) {
        $query = '';
        $limit = ($limit - 1) * 3;
        switch ($select) {
            case "all":$query = '';
                break;
            case "alta":$query = ' AND T02_FechaBajaDepartamento IS NULL';
                break;
            case "baja":$query = ' AND T02_FechaBajaDepartamento IS NOT NULL';
                break;
        }
        $aDepartamento = [];
        $sql = "SELECT * FROM T02_Departamento where T02_DescDepartamento  like  '%" . $departamentoBuscado . "%' $query limit 3 OFFSET  $limit";
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

    public static function contarPaginasDepartamentos($departamentoBuscado = '', $select = "all") {
        $query = '';
        switch ($select) {
            case "all":$query = '';
                break;
            case "alta":$query = ' AND T02_FechaBajaDepartamento IS NULL';
                break;
            case "baja":$query = ' AND T02_FechaBajaDepartamento IS NOT NULL';
                break;
        }

        $sql = "SELECT COUNT(*) FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%$departamentoBuscado%'" . $query;

        $oResultado = DBPDO::ejecutaConsulta($sql);
        $oResultado = $oResultado->fetch();

        return ceil(intval($oResultado[0]) / 3);
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

    public static function Total() {
        $sql = "SELECT * FROM T02_Departamento";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultado = $resultadoConsulta->rowCount();
        return $resultado;
    }

    /**
     * Es una funccion que inserta un nuevo departamento en la base de datos 
     * con el codigo y la descripcion con el volumen de negocio y devuelve un boolean si
     *  ha insertado bien con true o mal con false
     * 
     * @param int $CodDepartamento
     * @param string $DescDepartamento
     * @param float $VolumenNegocio
     * @return boolean
     */
    public static function altaDepartamento($CodDepartamento, $DescDepartamento, $VolumenNegocio) {
        $insertado = false;
        $ofecha = new DateTime();
        $time = $ofecha->getTimestamp();
        $sql = "INSERT INTO T02_Departamento(T02_CodDepartamento,T02_DescDepartamento,T02_VolumenNegocio,T02_FechaCreacionDepartamento) VALUES ('$CodDepartamento','$DescDepartamento',$VolumenNegocio,$time)";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultado = $resultadoConsulta->rowCount();
        if ($resultado > 0) {
            $insertado = true;
        }
        return $insertado;
    }

    /**
     * Validamos el departamento si existe en la base de datos , si exsiste  devolvernos un 
     * true para tarabajar con este boolean en la aplicacion 
     * 
     * @param int $codDepartamento
     * @return boolean
     */
    public static function validarCodNoExiste($codDepartamento) {

        $validCod = false;
        $sql = "SELECT T02_CodDepartamento FROM T02_Departamento WHERE T02_CodDepartamento='" . $codDepartamento . "'";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultado = $resultadoConsulta->fetchObject();
        if ($resultado != null) {
            $validCod = true;
        }
        return $validCod;
    }

    /**
     * Es una funccion que modifica los datos de un departamento en la base de datos buscado 
     * con el codigo y modificar la descripcion con el volumen de negocio y devuelve un boolean si
     *  ha cambiado bien con true o mal con false
     * 
     * @param int $CodDepartamento
     * @param string $DescDepartamento
     * @param float $VolumenNegocio
     * @return boolean
     */
    public static function modificaDepartamento($CodDepartamento, $DescDepartamento, $VolumenNegocio) {
        $modificado = false;
        $sql = "UPDATE T02_Departamento SET T02_DescDepartamento='$DescDepartamento',T02_VolumenNegocio=$VolumenNegocio  WHERE T02_CodDepartamento='" . $CodDepartamento . "'";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultado = $resultadoConsulta->rowCount();
        if ($resultado > 0) {
            $modificado = true;
        }
        return $modificado;
    }
    
    /**
     * funccion que hace un export a los departamentos en un fichero de json en  la carpeta temp
     * @return int los bytes que han insertado
     */

    public static function exportarDepartamento() {
        $aDepartamentos = [];
        $sql = "SELECT * FROM T02_Departamento";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultados = $resultadoConsulta->fetchAll();

        foreach ($resultados as $valor) {
            $aDepartamento = [
                "codeDep" => $valor["T02_CodDepartamento"],
                "description" => $valor['T02_DescDepartamento'],
                "salary" => $valor['T02_VolumenNegocio']
            ];
            array_push($aDepartamentos, $aDepartamento);
        }
        
        $json = json_encode($aDepartamentos, JSON_PRETTY_PRINT);
        $bytes = file_put_contents("tmp/tablaDepartamento.json", $json);
        return $bytes;
    }

}
?>

