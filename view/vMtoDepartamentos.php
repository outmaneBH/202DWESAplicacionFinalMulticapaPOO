<!DOCTYPE html>
<html>
    <head>
        <title>OB - MtoDepartamentos</title>
        <link rel="stylesheet" href="webroot/css/w3css.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="webroot/css/bootstrap.min.css" rel="stylesheet">
        <script src="webroot/js/bootstrap.bundle.min.js"></script>
        <link rel="icon" href="webroot/media/fav.png" type="image/ico" sizes="16x16">
        <style>
            .div1{
                padding: 30px;
            }
            img{
                width: 30px;
            }
            button
            {
                border: none;
                background: transparent;
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
            <p style="padding: 2px;font-size: 18px;font-weight: bold;color: white;font-family: cursive;" class="w3-center ">Mto Departamentos</p>
        </div>
        <div class="div1">
            <form class="row g-3 w3-center">

                <div class="col">
                    <input type="text" class="form-control" name="searchTxt" placeholder="Codigo de Departamento" >
                </div>

                <div class="col">
                    <button type="submit" name="search" class="btn btn-success mb-3">Serach</button>
                </div>
            </form>
            <table class="table table-striped">
                <tr>
                    <th>NO</th>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>Fecha Creacion</th>
                    <th>Volumen</th>
                    <th>Fecha Baja</th>
                </tr>
                <?php
                if ($aDepartamentos) {
                    $i = 1;
                    foreach ($aDepartamentos as $aDepartamento) {
                        ?>
                        <form>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $aDepartamento['codigo']; ?></td>
                                <td><?php echo $aDepartamento['descripcion']; ?></td>
                                <td><?php echo $aDepartamento['fechaCrea']; ?></td>
                                <td><?php echo $aDepartamento['volumen']; ?></td>
                                <td><?php echo $aDepartamento['fechaBaja'] ?? '-'; ?></td>
                                <td><button type="submit" name="update"><img src="webroot/media/update.png"></button></td>
                                <td><button type="submit" name="update"><img src="webroot/media/delete.png"></button></td>
                            </tr>
                        </form>
                        <?php
                        $i++;
                    }
                } else {
                    ?>
                    <tr><td  colspan="8">
                            <div class="alert alert-info">
                                <strong>info!</strong> No hay Resultados.
                            </div>
                        </td></tr>
                <?php }
                ?>
            </table>
        </div>