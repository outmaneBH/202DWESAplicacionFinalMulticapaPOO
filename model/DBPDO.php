<?php

/**
 * @author OUTMANE BOUHOU
 *  @updated: 02/01/2022
 * @version 1.0
 * 
 * Clase para conexión con la base de datos y ejecución de consultas mediante PDO.
 */
class DBPDO implements interfaceDB {

    /**
     * 
     * La Conexión con la base de datos para ejecución de una consulta con o sin
     * parámetros
     * 
     * @param type String $sentenciaSql
     * @param type Array $entradaParametros
     * @return PDOStatement Resultado de la sentencia ejecutada.
     */
    public static function ejecutaConsulta($sentenciaSql, $entradaParametros = null) {
        try {

            /**
             *  Establecemos la connection con pdo en global 
             */
            $miDB = new PDO(HOST, USER, PASSWORD);

            /**
             *  configurar las excepcion 
             */
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            /**
             * ejecutamos la Consulta y devolver la en el return 
             */
            $resultadoConsulta = $miDB->prepare($sentenciaSql);
            $resultadoConsulta->execute($entradaParametros);
            return $resultadoConsulta;
        } catch (PDOException $exception) {
            /**
             * Uso de la clase de Errores y devolver el index
             */
            $_SESSION['error'] = new AppError($exception->getCode(), $exception->getMessage(), $exception->getFile(), $exception->getLine(), $_SESSION['paginaAnterior']);
            $_SESSION['paginaEnCurso'] = 'error';
            header("Location:index.php");
            exit;
        } finally {
            unset($miDB);
        }
    }

}

?>