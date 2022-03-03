
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Insert</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            div{
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <?php
        require_once '../config/confDBPDO.php';

        try {

            /* Establecemos la connection con pdo */
            $miDB = new PDO(HOST, USER, PASSWORD);

            /* configurar las excepcion */
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = <<<OB
                    USE dbs4868775;
                    INSERT INTO T02_Departamento(T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenNegocio) VALUES 
                       ('FOL', 'departamento FOL', 1406149672, 102.4),
                       ('DAW', 'departamento DAW', 1406149672, 1000.3),
                       ('ING', 'departamento ING', 1406149672, 102.4),
                       ('MAT', 'departamento MATH', 1406149672, 1000.3),
                       ('PHC', 'departamento PHC', 1406149672, 1000.5),
                       ('DAM', 'departamento DAM', 1406149672, 1000.2),
                       ('PPT', 'departamento PPT', 1406149672, 999.5),
                       ('CVS', 'departamento CVS', 1406149672, 500.3),
                       ('DIW', 'departamento DIW', 1406149672, 289.3);

                    INSERT INTO T01_Usuario(T01_CodUsuario,T01_Password,T01_DescUsuario)  VALUES 
                       ('albertoF',SHA2('albertoFpaso',256),'ALBERTOF'),
                       ('outmane',SHA2('outmanepaso',256),'OUTMANE'),
                       ('rodrigo',SHA2('rodrigopaso',256),'RODRIGO'),
                       ('isabel',SHA2('isabelpaso',256),'ISABEL'),
                       ('david',SHA2('davidpaso',256),'DAVID'),
                       ('aroa',SHA2('aroapaso',256),'AROA'),
                       ('johanna',SHA2('johannapaso',256),'JOHANNA'),
                       ('oscar',SHA2('oscarpaso',256),'OSCAR'),
                       ('sonia',SHA2('soniapaso',256),'SONIA'),
                       ('heraclio',SHA2('heracliopaso',256),'HERACLIO'),
                       ('amor',SHA2('amorpaso',256),'AMOR'),
                       ('antonio',SHA2('antoniopaso',256),'ANTONIO'),
                       ('albertoB',SHA2('albertoBpaso',256),'ALBERTOB');

                    INSERT INTO T01_Usuario(T01_CodUsuario,T01_Password,T01_DescUsuario,T01_Perfil) VALUES 
                       ('admin',SHA2('adminpaso',256),'ADMINISTRADOR','administrador');
            OB;
            $miDB->exec($sql);
            echo '          <div class="w3-panel w3-blue">
                            <h3>Information!</h3>
                            <p>Se insertado bien.</p>
                            </div>';
        } catch (PDOException $ex) {
            /* Si hay algun error el try muestra el error del codigo */
            echo '<span> Codigo del Error :' . $exception->getCode() . '</span> <br>';

            /* Muestramos su mensage de error */
            echo '<span> Error :' . $exception->getMessage() . '</span> <br>';
        } finally {
            unset($miDB);
        }
        ?>
    </body>
</html>
