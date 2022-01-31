<!DOCTYPE html>
<html>
    <head>
        <title>OB - Programa</title>
        <link rel="stylesheet" href="webroot/css/w3css.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="webroot/css/bootstrap.min.css" rel="stylesheet">
        <script src="webroot/js/bootstrap.bundle.min.js"></script>
        <link rel="icon" href="webroot/media/fav.png" type="image/ico" sizes="16x16">
        <style>
            body{
                 background-image: url(webroot/media/sky2.jpg);
                background-repeat: no-repeat;
                 background-size:  cover;
            }
            input{
                margin: 10px;
            }
            .alert {
                padding: 20px;
                background-color: #864879;
                color: white;
                width: 29%;
                position: relative;
                bottom: 0;

            }
            .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }
            .closebtn:hover {
                color: black;
            }
            #mynavbar{
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            #form2{
                display: flex;                
            }
        </style>
    </head>
    <body>
         <div class="w3-bar w3-black  ">
            <p style="padding: 10px;font-size: 18px;font-weight: bold;font-family: cursive;" class="w3-center ">Last Web Application MVC POO</p>
        </div>
         <div class="w3-bar w3-deep-purple  ">
            <p style="padding: 2px;font-size: 18px;font-weight: bold;color: white;font-family: cursive;" class="w3-center ">Inicio Privado </p>
        </div> 
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"> 
                            <p style="font-size: 20px;" class="nav-link" > <?php echo 'Hello , ' . $aInicioPrivado['codUsuario']; ?> </p>
                        </li>
                    </ul>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="d-flex">
                       <!-- <input type="submit" class="btn btn-primary" name="detalle" value="Detalle" type="button"/>-->
                         <input name="apirest" type="submit" class="btn btn-info"  value="Api REST"  type="button"/>
                        <input name="logout" type="submit" class="btn btn-info"  value="LogOut <?php echo $aInicioPrivado['codUsuario']; ?> " type="button"/>
                        <div class="w3-dropdown-hover w3-right">
                            <img src="webroot/media/icons8-usuario-masculino-en-círculo-48.png" alt="Avatar" style="width:38px;height: 38px;margin-top:10px;" class="w3-circle">
                            <div class="w3-dropdown-content w3-bar-block " style="right:0;margin-top: 20%;">
                                <button class="w3-bar-item w3-button w3-black w3-hover-blue" name="editPerfil" type="submit">Editar Perfil </button>
                                <button class="w3-bar-item w3-button w3-black w3-hover-blue" name="deleteAccount" type="submit">Delete Account </button>
                               <?php // <button class="w3-bar-item w3-button btn-info w3-hover-blue" name="logout" type="submit">Logout <?php echo $aInicioPrivado['codUsuario'];  </button> ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container-fluid mt-3">
            <div style="float: left;" class="alert">
               <!-- <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> -->
                <p><?php echo ($aInicioPrivado['numConexiones'] > 1) ? $aInicioPrivado['descUsuario'] . ' es la ' . $aInicioPrivado['numConexiones'] . ' vez que se connecta y su ultima connexion anterior fue "' . date("d/m/Y H:i:s", $aInicioPrivado['fechaHoraUltimaConexionAnterior']) . '"' : $aInicioPrivado['descUsuario'] . ' esta es la primera vez que se connecta.'; ?></p>
            </div>
            <div style="float: right;width: 320px;background: white;" class="alert">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST"  id="form2">        
                    <input type="submit" name="detalle" class="w3-bar-item w3-button w3-black w3-hover-blue" value="Detalle">
                    <input type="submit" name="mtoDepartamentos" class="w3-bar-item w3-button w3-black w3-hover-blue" value="MtoDepartamentos"> 
                </form>
            </div>
        </div>
        <div style="height:100px;">
        </div>


    </body>
</html>


