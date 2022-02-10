<!DOCTYPE html>
<html>
    <head>
        <title>OB - Api Rest</title>
        <link rel="stylesheet" href="webroot/css/w3css.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="webroot/css/bootstrap.min.css" rel="stylesheet">
        <script src="webroot/js/bootstrap.bundle.min.js"></script>
        <link rel="icon" href="webroot/media/fav.png" type="image/ico" sizes="16x16">
        <style>
            table{
                width: 100%;
                height: 40px;
            }
            .cont{
                width: 90vw;
                height: 99vh;
                margin: auto;
                display: flex;
                flex-flow: column nowrap;
                gap:20px;

            }
            .cont{
                margin-bottom: 100px;
            }

            tr td:nth-of-type(4){
                font-weight: bold;
            }
            a{
                font-size: 13px;
                font-weight: bold;
                font-family: cursive;
            }
            .sp2{
                color: red;
                font-size: 15px;
                font-weight: bold;
                margin-left: 10%;
            }
            #sp1{
                margin-left: 10%; 
                font-style: italic;
            }
            h3{
                position: relative;
                text-align: center;
                line-height: 300px;
            }

            #forms{
                display: flex;
                justify-content: space-around; 
            }


            #forms div{
                margin-left: 20px;
                width: 500px;
                padding: 10px;
            }
            h4{
                text-decoration: underline blue 2px;
            }

        </style>

    </head>
    <body>
        <div class="w3-bar w3-black  ">
            <p style="padding: 10px;font-size: 18px;font-weight: bold;font-family: cursive;" class="w3-center ">Last Web Application MVC POO</p>
        </div>

        <div class="w3-bar w3-deep-purple  ">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <button style="margin: 10px;font-weight: bold;float: left;" name="cancel" class="btn btn-primary" type="submit">Cancel</button>
            </form>
            <p style="padding: 2px;font-size: 18px;font-weight: bold;color: white;font-family: cursive;" class="w3-center ">Uso de REST </p>
        </div>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div id="forms">

                <div class="w3-panel w3-card">

<!--            <span id="sp2" ><?php echo ($aErrores["country"] != null ? $aErrores['country'] : null); ?></span><br>-->
                    <p id="sp1">Este api busca  universidades de Todo el mundo solamente hay que escribir  en el input el nombre del Pais  y pulsa <strong>Buscar</strong>  para mostrar los resultados , Por ejemplo ( Spain , Morocco , Canada , France ...)
                        para mas informacion <a href="https://apipheny.io/free-api/" target="_blank"> : informacion</a>
                    </p>
                    <input style="margin-left: 10%;" id="in1" type="text" placeholder="Buscar un Universidad"  name="country" value="<?php echo isset($_REQUEST['country']) ? $_REQUEST['country'] : null; ?>"/>
                    <input id="btn1" type="submit" name="submitbtn" style="padding: 4px;" class="w3-btn w3-teal"  value="Buscar"/><br>
                </div>
                <div class="w3-panel w3-card">
                    <p id="sp1">Este Web service busca el Tiemp de Toda españa con un codigo de provincia ( 01,02 , ...) y devuelve el estado de Meteo.<br>
                        Puedes consultar mas informacion desde este web <a href="https://www.el-tiempo.net/api" target="_blank">apiTiempo</a>.
                    </p>
                    <input id="in2" name="codProv" style="margin-left: 10%;" type="text" placeholder="Buscar por Provincia"   value="<?php echo isset($_REQUEST['codProv']) ? $_REQUEST['codProv'] : null; ?>"/>
                    <input id="btn2"   type="submit" name="submitbtn" style="padding: 4px;" class="w3-btn w3-teal"  value="Buscar"/><br>
                </div>
                <div class="w3-panel w3-card">
                    <p id="sp1">Este Web service es mi propio Api Rest , devuelve un deparatamento buscado con el codigo dado en el input de Abajo.
                        Puedes consultar mas informacion en mi web  <a href="https://daw202.ieslossauces.es/202DWESAplicacionFinalMulticapaPOO/doc/apiRest.php" target="_blank">Api Departamento</a>.
                    </p>

                    <input id="in3" name="codDepartamento" style="margin-left: 10%;" type="text" placeholder="Buscar por Codigo"   value="<?php echo isset($_REQUEST['codDepartamento']) ? $_REQUEST['codDepartamento'] : null; ?>"/>
                    <input id="btn2"   type="submit" name="submitbtn"  style="padding: 4px;" class="w3-btn w3-teal"  value="Buscar"/><br>
                </div>

            </div>

            <hr>

            <h1 id="srt"><?php echo $error; ?></h1>
           
        </form> 

        <div class="cont">


            <!-- Tabla de rest de Aroa -->
            <?php
            echo $error;
            if (isset($oResultadoProv) && $oResultadoProv != null) {

                if ($aResultado) {
                    ?>
                    <h4>Provincia <?php echo $aResultado['name']; ?> :</h4>
                    <table class="table table-hover">
                        <tr>
                            <th>Id Provincia</th>
                            <th>Provincia</th>
                            <th>Descripcion</th>
                            <th>Tiempo</th> 
                            <th>Min</th> 
                            <th>Max</th> 
                        </tr>
                        <tr>
                            <td><?php echo $aResultado['idprovincia']; ?></td>
                            <td><?php echo $aResultado['provincia']; ?></td>
                            <td> <?php echo $aResultado['descripcion']; ?></td>
                            <td><?php echo $aResultado['tiempo']; ?></td>
                            <td><?php echo $aResultado['min']; ?></td>
                            <td><?php echo $aResultado['max']; ?></td>
                        </tr>
                        <?php
                    } else {
                        echo '<h2>No hay resultados sobre provincia   !!</h2>';
                    }
                }
                ?>
            </table>
            <!--El uso de mi propio Api rest-->
            <?php
            echo $errorDep;
            if (isset($oResultadoDep)) {

                if ($aResultadoDep) {
                    ?>
                    <h4>Departameto Codigo <strong> <?php echo $aResultadoDep['codigo']; ?> :</strong></h4>
                    <table class="table table-hover">
                        <tr>
                            <th>codigo</th>
                            <th>descripcion</th>
                            <th>fecha Creacion</th>
                            <th>volumen</th> 
                            <th>fechaBaja</th> 
                        </tr>
                        <tr>
                            <td><?php echo $aResultadoDep['codigo']; ?></td>
                            <td><?php echo $aResultadoDep['descripcion']; ?></td>
                            <td> <?php echo date("d- m - Y H:i:s", $aResultadoDep['fechaCrea']); ?></td>
                            <td><?php echo $aResultadoDep['volumen']; ?></td>
                            <td><?php echo $aResultadoDep['fechaBaja'] ?? '-'; ?></td>

                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <!--Comprobar si hay una universidad y el array de Respuestas no sea null-->
            <?php
            if (isset($aUniversidades)) {
                if ($aRespuestas != null) {
                    ?>

                    <h4>Universidades en  <?php echo $_REQUEST['country']; ?> :</h4>
                    <table class="table table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Country</th>
                            <th>Website</th>
                            <th>Code</th> 
                            <th>State_province</th> 
                        </tr>

                        <?php
                        foreach ($aRespuestas as $value) {
                            ?>
                            <tr>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $value['country'] ?></td>
                                <td> <a href="<?php echo $value['website'] ?>" target="_blank"><?php echo $value['website'] ?></a></td>
                                <td><?php echo $value['code'] ?></td>
                                <td><?php echo $value['state_profince'] ?></td>
                                <?php
                            }
                        } else {
                            echo ' <hr><h2>No hay resultados sobre el pais buscado!!</h2>';
                        }
                    }
                    ?>
            </table>

        </div>
        <div style="height:200px;"></div>

        <script>

            function fn1(event) {
                var clave = prompt("El clave para usar el Api Rest:");
                if (clave) {
                    window.alert("Hola");
                } else {
                    ev.preventdefault();
                }
            }
            function fn2() {
                document.getElementById("in1").style.border = "red";
            }

        </script>




