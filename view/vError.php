<!DOCTYPE html>
<html>
    <title>Errores Try Catch</title>
    <link rel="stylesheet" href="webroot/css/w3css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="webroot/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" href="webroot/media/fav.png" type="image/ico" sizes="16x16">
    <body>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <button style="margin-top: 10px;" type="submit" name="cancel" class="w3-button w3-blue w3-hover-blue ">Cancel</button> 
        </form>
        <div class="w3-panel w3-yellow w3-card-4 w3-container">
            <!--Mostramos el codigo del error y su mensage-->
            <h4>Error Codigo :<?php echo $aError["codError"]; ?></h4>
            El Mensaje es <strong><?php echo $aError["msgError"]; ?> </strong><br>
            En la Linea <strong><?php echo $aError["lineaError"]; ?></strong><br>
            En el archivo : <strong><?php echo $aError["archivoError"]; ?></strong><br>
            La pagina Siguiente es  : <strong><?php echo $aError["paginaSiguiente"]; ?></strong>
        </div>



