<!DOCTYPE html>
<html>
    <head>
        <title>OB - Cambiar Perfil</title>
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
            #form1{

                height:  520px;
                display: flex;
                justify-content: space-evently;
                flex-flow: column ;
              
                gap:6px;

            }
            #bg{
                border-radius: 10px;
                width: 30%;  
            }
            input{
                padding: 10px;
                background: none;
                text-align: center;
                color: white;

            }
            span:nth-of-type(1){
                color: white;
                text-align: center;
                font-size: 30px;
            }
            span:nth-of-type(2){
                color: white;
                text-align: center;
                font-size: 30px;
            }
            span:nth-of-type(3), span:nth-of-type(4){
                color: red;
                text-align: center;
                font-size: 15px;
                margin-top: -30px;
                margin-bottom: -20px;
            }
            td input:nth-of-type(1){
                border: none;
                border-bottom:  2px solid yellow;

                padding: 2px;
                width: 98%;

            }
            input:nth-of-type(2),input:nth-of-type(3),input:nth-of-type(4),input:nth-of-type(5){
                border: 2px solid blue;
                border-radius: 25px;

            }

            section input:nth-of-type(1){
                border: 2px solid green;
                align-self: center;
                border-radius: 25px;
                width: 100px;
                display: inline;
            }
            section input:nth-of-type(2){
                display: inline;
                border: 2px solid red;
                align-self: center;
                border-radius: 25px;
                width: 100px;
            }
            ::placeholder{
                text-transform: uppercase;
                color: #978686;
            }
            table{
                border-collapse: collapse;
                color: white;
            }
            tr td:last-child{
                font-weight: 700;
            }
            #profilImg{
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="w3-bar w3-black  ">
            <p style="padding: 10px;font-size: 18px;font-weight: bold;font-family: cursive;" class="w3-center ">Last Web Application MVC POO</p>
        </div>
        <div class="w3-bar w3-deep-purple  ">
            <p style="padding: 2px;font-size: 18px;font-weight: bold;color: white;font-family: cursive;" class="w3-center ">Mi Cuenta </p>
        </div>
        <form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <button style="margin: 10px;font-weight: bold;float: right;" name="btnupdatePass" class="btn btn-primary" type="submit">Cambiar Password</button>
           
        </form>
        <div class="container mt-3">
            <div class="d-flex mb-3">
                <div class="p-2  flex-fill"></div>
                <div id="bg" class="p-2 flex-fill bg-dark">
                    <form  enctype="multipart/form-data" id="form1" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <span>Editar Perfil</span>
                        <span> <img src=" <?php echo  $aMiCuenta['imagen']?'data:image/jpg;base64,'.$aMiCuenta['imagen']:'webroot/media/user.png'; ?>" class="w3-bar-item w3-circle" style="width:90px;height: 90px"></span>
                        <table class="w3-table w3-bordered ">
                            <tr>
                                <td>DescUsuario</td>
                                <td><input type="text" name="DescUsuario"   value="<?php echo $aMiCuenta['descUsuario']; ?>"/></td>
                            </tr>
                            <tr>
                                <td>CodUsuario</td>
                                <td><?php echo $aMiCuenta['codUsuario']; ?></td>
                            </tr>
                            <tr>
                                <td>NumAccesos</td>
                                <td><?php echo $aMiCuenta['numConexiones']; ?></td>
                            </tr>
                            <tr>
                                <td>Ultima Conexion</td>

                                <td><?php echo ($aMiCuenta['numConexiones'] >= 1) ? date('d-m-Y  , H:i:s', $aMiCuenta['fechaHoraUltimaConexion']) : '-'; ?></td>
                            </tr>
                            <tr>
                                <td>Perfil</td>
                                <td><?php echo $aMiCuenta['perfil']; ?></td>
                            </tr>
                            <tr>
                                <td>Imagen</td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Example file input</label>
                                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <section>
                            <input type="submit" name="btnupdate" class="w3-hover-green w3-hover-text-black" value="Editar">
                            <input type="submit" name="btncancelar" class="w3-hover-red w3-hover-text-white" value="Cancel">
                            <button style="float: right;margin-top: 10px;" name="btndelete" class="btn btn-danger" type="submit">Delete Account</button>
                        </section>

                        <span><?php echo $error; ?></span>
                    </form> 
                </div>
                <div class="p-2 flex-fill"></div>
            </div>
        </div>
        <div style="height:200px;"></div>