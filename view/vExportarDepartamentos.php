
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Exportar Departamentos</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body{
                background-image: url(webroot/media/night.jpg);
                background-repeat: no-repeat;
                background-size:  cover;
            }

            .w3-btn{
                width: 105px;
                font-size: small;
            }
            #div2{
                padding: 20px;

                background: rgb(1,1,1,0.8);
                height: 100vh;
            }
            #t2 {
                text-align: center;
            }
            #div2{
                display: flex;
                flex-flow: column;

                align-items: center;
            }
            .buscar{
                border: 1px solid white;
                height: 80px;
                margin-bottom: 20px;
                width: 100%;
                position: relative;
                left: 25%;
                padding: 20px;
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
            <p style="padding: 2px;font-size: 18px;font-weight: bold;color: white;font-family: cursive;" class="w3-center ">Exportar Departamento</p>
        </div>

        <?php  echo ($msg != null ? $msg : null); ?> 
        <div id="div2">
            <form action="index.php" method="get" class="row g-3 w3-center">

                <div class="buscar">
                    <div class="input-group mb-2">  

                        <input type="text" style="width: 200px" disabled class="form-control"  value="" name="searchTxt" placeholder="Export Departamentos" >
                        <!--<button type="submit" name="export" class="btn btn-dark mb-3" >Export</button>-->
                        <button class="btn btn-outline-primary" type="submit" name="export" >Export</button>
                        <a href="https://daw202.ieslossauces.es/202DWESAplicacionFinalMulticapaPO/tmp/tablaDepartamento.json" download class="btn btn-outline-success"  >descargar</a>
                    </div>
                </div>
            </form>


        </div>


