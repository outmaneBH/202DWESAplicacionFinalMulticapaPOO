<!DOCTYPE html>
<html>
    <head>
        <title>OB - Mto Usuarios</title>
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
                height: auto;
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
            .botones{
                display: flex;
                justify-content: center;
                margin-bottom: 10px;

            }
            .botones button{
                margin-left: 20px;

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
            td img:nth-of-type(1){
                width: 30px;
            }
            button img{
                width: 30px;
            }
            td{
                font-weight: bold;
            }
            #alert{
                display: none;
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
            <p style="padding: 2px;font-size: 18px;font-weight: bold;color: white;font-family: cursive;" class="w3-center ">Mto Usuarios</p>
        </div>
        <div class="div1">
            <div class="botones">
                <button type="button" class="btn btn-primary" disabled>Export</button>
                <button type="button" class="btn btn-success" disabled>Import</button>
            </div>
            <div class="buscar">
                <div class="input-group mb-3">  
                    <input type="text" name="searchTxt" id="searchTxt" onKeyUp="loadDoc();" class="form-control"  placeholder="Buscar Usuario por descripcion" >
                    <button class="btn btn-outline-primary" onclick="loadDoc();" name="search" type="button">Buscar</button>
                </div>
            </div>
            <div id="alert" class="alert alert-success" role="alert">
               Success !
            </div>
            <table style="margin-bottom: 200px;" class="table table-striped">
                <thead>
                    <tr>
                        <th>Codigo Usuario</th>
                        <th>Descripcion Usuario</th>
                        <th>Num. Conexiones</th>
                        <th>Fecha Hora Ultima Conexion</th>
<!--                        <th>fechaHoraUltimaConexionAnterior</th>-->
                        <th>Perfil</th>
                        <th>Imagen Usuario</th>
                        <th style="text-align: center;" colspan="4">Crud</th>
                    </tr>
                </thead>
                <!--contenteditable="true"-->
                <tbody   id="tbody" >

                </tbody>


            </table>

        </div>
        <script src="webroot/js/ajax.js"></script>