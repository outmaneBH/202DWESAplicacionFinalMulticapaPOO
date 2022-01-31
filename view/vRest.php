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

            table,tr,td,th{
                border-collapse: collapse;
                border: 2px solid black;
                text-align: center;
                padding: 5px;
            }
            table{

                width: 100%;
                height: 40px;
            }
            .cont{

                width: 90vw;
                height: 99vh;
                margin: auto;
                display: flex;
                flex-flow: row nowrap;
                justify-content: space-between;
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
            #sp2{
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
            #form2{
                display: flex;
                justify-content: space-around;
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
        <hr>
        <div id="forms">
            <form id="form2"action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div>
                    <input style="margin-left: 10%;" type="text" placeholder="Buscar un Universidad"  name="country" value="<?php echo isset($_REQUEST['country']) ? $_REQUEST['country'] : null; ?>"/>
                    <input id="btn1" type="submit" name="submitbtn"  style="padding: 4px;" class="w3-btn w3-teal"  value="Buscar"/><br>
                    <span id="sp2" ><?php echo ($aErrores["country"] != null ? $aErrores['country'] : null); ?></span><br>
                    <p id="sp1">Este api busca  universidades de Todo el mundo solamente hay que escribir <br> en el input el nombre del Pais y pulsa <strong>Buscar</strong> para mostrar los resultados ,<br> Por ejemplo ( Spain , Morocco , Canada , France ...)</p>

                </div>
                <div>
                    <input name="codProv" style="margin-left: 10%;" type="text" placeholder="Buscar por Provincia"   value="<?php echo isset($_REQUEST['codProv']) ? $_REQUEST['codProv'] : null; ?>"/>
                    <input id="btn2" name="submitbtn"  type="submit" style="padding: 4px;" class="w3-btn w3-teal"  value="Buscar"/><br>
                    <p id="sp1">Este api busca  provincia con codigo y devuelve sus  datos.</p>
                    <span id="sp2" ><?php echo ($aErrores["codProv"] != null ? $aErrores['codProv'] : null); ?></span><br> 
                </div>
            </form> 
        </div>

        <hr>
        <h1 id="srt"></h1>
        <div class="cont">

            <?php
            if (isset($aUniversidades)) {
                if ($aRespuestas != null && !($aErrores["country"])) {
                    ?>
                    <a href="http://universities.hipolabs.com/search?country=spain" target="_blank"> Aqui esta el Api de Universidades</a> <br><br> 
                    <table>
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
                            echo '<h2>No hay Datos !!</h2>';
                        }
                    }
                    ?>
            </table>
            <hr>
            <!-- Tabla de rest de Aroa -->
            <?php
            if (isset($aResultado)) {
                ?>
                <table style="margin-bottom: 500px;">
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
}
?>
            </table>

        </div>
        <div style="height:200px;"></div>

