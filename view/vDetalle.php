<!DOCTYPE html>
<html>
    <head>
        <title>OB - Detalle</title>
        <link rel="stylesheet" href="webroot/css/w3css.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="webroot/css/bootstrap.min.css" rel="stylesheet">
        <script src="webroot/js/bootstrap.bundle.min.js"></script>
        <link rel="icon" href="webroot/media/fav.png" type="image/ico" sizes="16x16">
        <style>
            body{
                background-image: url(webroot/media/water-g93351de39_1920.jpg);
                background-repeat: no-repeat;
                background-size: cover;
            }
            input{
                margin: 10px;
            }
            #supGlob{
                margin-left:2%;
                width: 100%;
            }


            table ,tr,td{
                border: 2px solid black;
                border-collapse: collapse;

                font-size: 16px;
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
            <p style="padding: 2px;font-size: 18px;font-weight: bold;color: white;font-family: cursive;" class="w3-center ">Detalle </p>
        </div>
        <br><br>
        <div id="supGlob">
            <?php
            echo '<h3>Mostrar el contenido de las variables superglobales:</h3>  ';
            // El contenido de $_SESSION
            echo '<h3>Mostrar el contenido de $_SESSION :</h3>  ';
            echo '<table id="t1"><tr><th>Clave</th><th>Valor</th></th>';
            foreach ($_SESSION as $key => $value) {
                echo '<tr>';
                echo "<td>$key</td><td><pre>";
                print_r($value); // print_r porque pueden ser objetos.
                echo '</pre></td></tr>';
            }
            echo '</table>';

            // El contenido de $_COOKIE
            echo '<h3>Mostrar el contenido de $_COOKIE :</h3>  ';
            echo '<table><tr><th>Clave</th><th>Valor</th></th>';
            foreach ($_COOKIE as $Clave => $Valor) {
                echo '<tr>';
                echo "<td>$Clave</td>";
                echo "<td>$Valor</td>";
                echo '</tr>';
            }
            echo '</table>';


            echo '<h3>Mostrar el contenido de $_SERVER :</h3>  ';
            echo '<table><tr><th>Clave</th><th>Valor</th></th>';
            /* usando foreach() */
            foreach ($_SERVER as $Clave => $Valor) {
                echo '<tr>';
                echo "<td>$Clave</td>";
                echo "<td>$Valor</td>";
                echo '</tr>';
            }
            echo '</table>';
            ?>

        </div>
        <?php echo phpinfo(); ?> 


