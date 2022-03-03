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
            body{
                background-image: url(webroot/media/night.jpg);
                background-repeat: no-repeat;
                background-size:  cover;
            }
            .div1{
                padding: 30px;
                background: rgb(1,1,1,0.8);
                height: 150vh;
            }
            img{
                width: 30px;
            }
            button
            {
                border: none;
                background: transparent;
            }
            td,th{
                text-align: center;
                color: white;
            }
            .buscar{
                border: 1px solid white;
                height: 80px;
                margin-bottom: 20px;
                width: 50%;
                position: relative;
                left: 25%;
                padding: 20px;
            }
            td{
                font-weight: bold;
            }

        </style>
    </head>
    <body>
        <div class="w3-bar w3-black  ">
            <p style="padding: 10px;font-size: 18px;font-weight: bold;font-family: cursive;" class="w3-center ">Last Web Application MVC POO</p>
        </div>
        <?php
        $selectValor = '';
        if (isset($_REQUEST["select"])) {
            $selectValor = $_REQUEST["select"];
        }
        ?>
        <div class="w3-bar w3-deep-purple  ">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <button style="margin: 10px;font-weight: bold;float: left;" name="cancel" class="btn btn-primary" type="submit">Cancel</button>
            </form>
            <p style="padding: 2px;font-size: 18px;font-weight: bold;color: white;font-family: cursive;" class="w3-center ">Mto Departamentos</p>
        </div>
        <div class="div1">
            <form action="index.php" method="get" class="row g-3 w3-center">
                <div class="botones">
                    <button type="submit" name="add" class="btn btn-success mb-3">Add</button>
                    <button type="button" name="import" class="btn btn-info mb-3"disabled>Import</button>
                    <button type="submit" name="export" class="btn btn-dark mb-3" >Export</button>
                </div>
                <div class="buscar">
                    <div class="input-group mb-2">  

                        <input type="text" class="form-control"  value="<?php echo $CodigoDepartamento ? $CodigoDepartamento : null; ?>" name="searchTxt" placeholder="Buscar Deparatmento por Codigo" >

                        <button class="btn btn-outline-primary" type="submit" name="search" >Buscar</button>
                        <select onchange="this.form.submit()" name="select" style="width: 20%;border: none;margin-left: 10px;padding: 5px;">
                            <option <?php echo $selectValor == 'all' ? 'selected' : ''; ?> value="all">All</option>
                            <option <?php echo $selectValor == 'alta' ? 'selected' : ''; ?> value="alta">Alta</option>
                            <option <?php echo $selectValor == 'baja' ? 'selected' : ''; ?> value="baja">Baja</option>
                        </select>
                    </div>
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
                    <th style="text-align: center;" colspan="5">Crud</th>

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
                                <td><?php echo $aDepartamento['fechaBaja'] != null ? date('d-m-Y  , H:i:s', $aDepartamento['fechaBaja']) : '-'; ?></td>
        <!--                                <td><button type="button" name="more" value="<?php echo $aDepartamento['codigo']; ?>"><img src="webroot/media/more.png"></button></td>-->
                                <td><button type="submit" name="update" value="<?php echo $aDepartamento['codigo']; ?>"><img src="webroot/media/update.png"></button></td>
                                <td><button type="button" onclick="index(this)" name="delete" value="<?php echo $aDepartamento['codigo']; ?>"><img src="webroot/media/delete.png"></button></td>
                                <td><button type="submit" name="up" value="<?php echo $aDepartamento['codigo']; ?>"><img src="webroot/media/up.png"></button></td>
                                <td><button type="submit" name="down" value="<?php echo $aDepartamento['codigo']; ?>"><img src="webroot/media/down.png"></button></td>
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
            <div style="margin-bottom: 200px" class="w3-center w3-text-cyan w3-hover-text-cyan ">
                <div class="w3-bar ">
                    <form method="post" action="index.php">
                        <input type="submit" class="btn btn-outline-primary" value="<<" name="first" />
                        <input type="submit" class="btn btn-outline-primary" value="<" name="prev" />
                        <input type="button" class="btn btn-outline-primary" value="<?php echo $_SESSION['paginacion']; ?> / <?php echo $totalPage; ?>" name="page" />
                        <input type="submit" class="btn btn-outline-primary" value=">" name="next" />
                        <input type="submit" class="btn btn-outline-primary" value=">>" name="last" />
                    </form>
                </div>
            </div>
        </div>

        <script>
            function index(x){
                if (confirm("Really you want to delete it ?")) {
                    x.setAttribute("type", "submit");
                } else {
                    x.setAttribute("type", "button");
                }
            }

        </script>