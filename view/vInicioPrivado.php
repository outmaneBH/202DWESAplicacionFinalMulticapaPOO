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
                background-image: url(webroot/media/night.jpg);
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
                flex-flow: column;                
            }
            #form2 input{
                width: 200px;
                margin-bottom: 2px;
            }
            h6{
                color: black;
                text-align: center;
                font-weight:bold;
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
                        <div class="w3-dropdown-hover w3-right w3-transparent">
                            <img src=" <?php echo $aInicioPrivado['imagen'] ? 'data:image/jpg;base64,' . $aInicioPrivado['imagen'] : 'webroot/media/user.png'; ?>" alt="alt" style="width:50px;height: 50px;" class="w3-circle ">
                            <div class="w3-dropdown-content w3-bar-block " style="right:0;margin-top: 2%;">
                                <button class="w3-bar-item w3-button w3-black w3-hover-blue" name="editPerfil" type="submit">Editar Perfil </button>
                                <button class="w3-bar-item w3-button w3-black w3-hover-blue" name="deleteAccount" type="submit">Delete Account </button>
                                <button class="w3-bar-item w3-button w3-black w3-hover-blue" name="logout" type="submit">LogOut <?php echo $aInicioPrivado['codUsuario']; ?> </button>
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
            <div style="float: right;width: 270px;background: white;" class="alert">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST"  id="form2"> 
                    <h6>Funciones de mi aplicacion</h6>
                    <input type="submit" name="detalle" class="w3-bar-item w3-button w3-black w3-hover-blue" value="Detalle">
                   
                    <input name="apirest" type="submit" class="w3-bar-item w3-button w3-black w3-hover-blue"  value="Api REST"  type="button"/>
                    <input name="consultarModificarOpiniones" type="submit" class="w3-bar-item w3-button w3-black w3-hover-blue"  value="ConsultarModificarOpinion"  type="button"/>
                    <?php if ($aInicioPrivado['perfil'] == "administrador") { ?>
                        <input name="mtousuarios" type="submit" class="w3-bar-item w3-button w3-black w3-hover-blue"  value="MtoUsuarios"  type="button"/>
                        <input name="mtocuestiones" type="submit" class="w3-bar-item w3-button w3-black w3-hover-blue"  value="MtoCuestiones"  type="button"/>
                    <?php } else {
                        ?>
                          <input type="submit" name="mtoDepartamentos" class="w3-bar-item w3-button w3-black w3-hover-blue" value="MtoDepartamentos">
                        <?php
                    }
                    ?>

                </form>
            </div>
        </div>
        <div style="height:100px;">
        </div>
    </body>
</html>


