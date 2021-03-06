<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pagina Publico</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="icon" href="webroot/media/fav.png" type="image/ico" sizes="16x16">

        <style>

            body{
                background-image: url(webroot/media/night.jpg);
                background-repeat: no-repeat;
                background-size:  cover;
            }

            h3{
                color: white;
                width: 100%;
                padding: 5px;
                font-weight: bold;
                font-family: cursive;
            }

            @media screen and (max-width: 639px) {
                h3 {
                    font-size: 15px;

                }
                form input{
                    width: 100px;
                }
                nav  {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100px;
                }
            }
            #mySidenav {
                display: flex;
                flex-flow: column wrap;
                position: relative;

            }

            #mySidenav a {
                text-decoration: none;
                display: block;
                color: white;
                font-weight: bold;
                height: 50px;
                width: 290px;
                padding-left:6px ;
                margin: 1px;
                background: rgba(184, 6, 255, 0.863);
                border-top-right-radius: 10px;
                border-bottom-right-radius: 10px;
                display: flex;
                flex-flow: column wrap;
                justify-content: center;
                position: relative;
                left: -280px;
                font-size: 14px;
                font-family: cursive;
            }

            #mySidenav a:hover {
                transition: all 2s ease;
                left: -12px;
            }
            #mySidenav a:nth-of-type(1){
                background: rgba(63, 236, 193, 0.993);
                left: -12px;  
                width: 130px;
                color: black;
            }

            /* The side navigation menu */
            .sidenav1 {
                height: 100%;
                /* 100% Full-height */
                width: 0;
                /* 0 width - change this with JavaScript */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Stay on top */
                top: 0;
                /* Stay at the top */
                right: 0;
                background-color: #111;
                /* Black*/
                overflow-x: hidden;
                /* Disable horizontal scroll */
                padding-top: 60px;

                /* Place content 60px from the top */
                transition: 0.5s;
                /* 0.5 second transition effect to slide in the sidenav */
                text-align: center;
            }

            /* The navigation menu links */
            .sidenav1 a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
                transition: 0.3s;
            }

            /* When you mouse over the navigation links, change their color */
            .sidenav1 a:hover {
                color: #f1f1f1;
            }

            /* Position and style the close button (top right corner) */
            .sidenav1 .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }

            /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
            #main1 {
                transition: margin-right .5s;


            }

            /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
            @media screen and (max-height: 450px) {
                .sidenav1 {
                    padding-top: 15px;
                }

                .sidenav1 a {
                    font-size: 18px;
                }
            }
            form input,select{
                margin: 5px;
                width: 120px;
            }
            form select{
                height: 40px;
                border: none;
                color: white;
            }
            ul img{
                object-fit: contain;
                width: 80%;
                height: 300px;
            }

            .w3-ul img{
                margin-top: 30px;

            }

        </style>
    </head>
    <body onload="startTime()">

        <div id="main1">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="mynavbar">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <h3>Last Web Application MVC POO</h3>

                            </li>
                        </ul>
                        <!--                        <form action="index.php" method="POST">
                                                    <input name="btnapiFree" type="button" style="margin-right: 5px;" target="_blank" value="Api Propio" class="btn btn-primary" /> 
                                                </form>-->

                        <a href="doc/apiRest.php" target="_blank"><input name="btnapiFree" type="button" style="margin-right: 5px;"   value="Api Info" class="btn btn-info" /></a>

                        <input id="sp1" style="padding-left: 10px;padding-right: 10px;font-size: 20px;" type="button" name="t1" onclick="openNav()" value="&#9776;">


                    </div>
                </div>
            </nav>

            <div class="content">
                <div id="mySidenav1" class="sidenav1">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" >
                        <input name="btnlogin" type="submit" style="margin-right: 5px;" value="Login" class="btn btn-primary" /><br>
                        <input name="btnregister" type="submit" style="margin-right: 5px;" value="Register" class="btn btn-primary" /><br>
                        <select name="select" disabled class="bg-primary">      
                            <option value="">Idioma </option>
                            <option value="es">Espa??ol</option>
                            <option value="en">Ingles</option>
                            <option value="ar">??????????????</option>
                        </select>
                    </form>
                </div>
            </div>

            <div class="w3-row-padding w3-padding-16">
                <div class="w3-quarter w3-margin-bottom">
                    <ul class="w3-ul  w3-center ">
                        <li class="w3-blue w3-large w3-padding-4">Info Api</li>
                        <img  src="webroot/media/pdf/Api.PNG" alt="Info"  >
                        <li class=" w3-padding-12">
                            <button onclick="document.getElementById('id08').style.display = 'block'" class="w3-button w3-green w3-padding-6">Lerr EL PDF</button> 
                        </li>
                    </ul>
                </div>
                <div class="w3-quarter w3-margin-bottom">
                    <ul class="w3-ul  w3-center ">
                        <li class="w3-blue w3-large w3-padding-4">Estandar deDesarollo</li>
                        <img  src="webroot/media/pdf/estander.PNG" alt="Estandar"  >
                        <li class=" w3-padding-12">
                            <button onclick="document.getElementById('id00').style.display = 'block'" class="w3-button w3-green w3-padding-6">Lerr EL PDF</button> 
                        </li>
                    </ul>
                </div>
                <div class="w3-quarter w3-margin-bottom">
                    <ul class="w3-ul  w3-center ">
                        <li class="w3-blue w3-large w3-padding-4">Arbol deNavegacion</li>
                        <img src="webroot/media/pdf/arbol.PNG" alt="Arbol de Navegacion"  >
                        <li class= w3-padding-12">
                            <button onclick="document.getElementById('id01').style.display = 'block'" class="w3-button w3-green w3-padding-6">Lerr EL PDF</button>
                        </li>
                    </ul>
                </div>
                <div class="w3-quarter w3-margin-bottom">
                    <ul class="w3-ul w3-center ">
                        <li class="w3-blue w3-large w3-padding-4">Catalogo deRequisitos</li>
                        <img src="webroot/media/pdf/catalogo.PNG" alt="Catalogo de Requisitos"  >
                        <li class=" w3-padding-12">
                            <button onclick="document.getElementById('id02').style.display = 'block'" class="w3-button w3-green w3-padding-6">Lerr EL PDF</button>
                        </li>
                    </ul>
                </div>
                <div class="w3-quarter w3-margin-bottom">
                    <ul class="w3-ul  w3-center ">
                        <li class="w3-blue w3-large w3-padding-4">Diagrama de Casos deUso</li>
                        <img src="webroot/media/pdf/casos.PNG" alt="Diagrama de Casos de Uso"  >
                        <li class="w3-padding-12">
                            <button onclick="document.getElementById('id03').style.display = 'block'" class="w3-button w3-green w3-padding-6">Lerr EL PDF</button>
                        </li>
                    </ul>
                </div>
                <div class="w3-quarter w3-margin-bottom">
                    <ul class="w3-ul  w3-center ">
                        <li class="w3-blue w3-large w3-padding-4">Diagrama deClases</li>
                        <img src="webroot/media/pdf/clases.PNG" alt="Diagrama de Clases"  >
                        <li class=" w3-padding-12">
                            <button onclick="document.getElementById('id04').style.display = 'block'" class="w3-button w3-green w3-padding-6">Lerr EL PDF</button>
                        </li>
                    </ul>
                </div>
                <div class="w3-quarter w3-margin-bottom">
                    <ul class="w3-ul  w3-center ">
                        <li class="w3-blue w3-large w3-padding-4">Relacion deFicheros</li>
                        <img src="webroot/media/pdf/relacion.PNG" alt="Relacion de Ficheros"  >
                        <li class=" w3-padding-12">
                            <button onclick="document.getElementById('id05').style.display = 'block'" class="w3-button w3-green w3-padding-6">Lerr EL PDF</button>
                        </li>
                    </ul>
                </div>
                <div class="w3-quarter w3-margin-bottom">
                    <ul class="w3-ul  w3-center ">
                        <li class="w3-blue w3-large w3-padding-4">Uso deSession</li>
                        <img src="webroot/media/pdf/session.PNG" alt="Uso de Session"  >
                        <li class=" w3-padding-12">
                            <button onclick="document.getElementById('id06').style.display = 'block'" class="w3-button w3-green w3-padding-6">Lerr EL PDF</button>
                        </li>
                    </ul>
                </div>
                <div class="w3-quarter w3-margin-bottom">
                    <ul class="w3-ul  w3-center ">
                        <li class="w3-blue w3-large w3-padding-4">ModeloFisico deDatos</li>
                        <img src="webroot/media/pdf/modelofisico.PNG" alt="Uso de Session"  >
                        <li class=" w3-padding-12">
                            <button onclick="document.getElementById('id07').style.display = 'block'" class="w3-button w3-green w3-padding-6">Lerr EL PDF</button>
                        </li>
                    </ul>
                </div>
                <div style="height: 200px;" class="w3-quarter w3-margin-bottom">

                </div>

            </div>
            <div  id="divtOtal" class="container-fluid mt-3">
                <div id="id00" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width: 900px;">
                        <div class="w3-center"><br>
                            <span onclick="document.getElementById('id00').style.display = 'none'"
                                  class="w3-button  w3-white w3-display-topright " title="Close Modal">X</span>
                            <iframe src="webroot/media/pdf/211129EstandarDesarrolloDAWyEstructuraAlmacenamientoDWES.pdf"
                                    style="width:100%;border:none;height:500px"></iframe>
                        </div>
                    </div>
                </div>
                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width: 900px;">
                        <div class="w3-center"><br>
                            <span onclick="document.getElementById('id01').style.display = 'none'"
                                  class="w3-button  w3-white w3-display-topright " title="Close Modal">X</span>
                            <iframe src="webroot/media/pdf/220119ArbolDeNavegaci??n.pdf" style="width:100%;border:none;height:500px"></iframe>
                        </div>
                    </div>
                </div>

                <div id="id02" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width: 900px;">
                        <div class="w3-center"><br>
                            <span onclick="document.getElementById('id02').style.display = 'none'"
                                  class="w3-button  w3-white w3-display-topright " title="Close Modal">X</span>
                            <iframe src="webroot/media/pdf/220119CatalogoDeRequisitos.pdf" style="width:100%;border:none;height:500px"></iframe>
                        </div>
                    </div>
                </div>

                <div id="id03" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width: 900px;">
                        <div class="w3-center"><br>
                            <span onclick="document.getElementById('id03').style.display = 'none'"
                                  class="w3-button  w3-white w3-display-topright " title="Close Modal">X</span>
                            <iframe src="webroot/media/pdf/220119DiagramaDeCasosDeUso.pdf" style="width:100%;border:none;height:500px"></iframe>
                        </div>
                    </div>
                </div>

                <div id="id04" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width: 900px;">
                        <div class="w3-center"><br>
                            <span onclick="document.getElementById('id04').style.display = 'none'"
                                  class="w3-button  w3-white w3-display-topright " title="Close Modal">X</span>
                            <iframe src="webroot/media/pdf/220119DiagramaDeClases.pdf" style="width:100%;border:none;height:500px"></iframe>
                        </div>
                    </div>
                </div>

                <div id="id05" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width: 900px;">
                        <div class="w3-center"><br>
                            <span onclick="document.getElementById('id05').style.display = 'none'"
                                  class="w3-button  w3-white w3-display-topright " title="Close Modal">X</span>
                            <iframe src="webroot/media/pdf/220119RelacionDeFicheros.pdf" style="width:100%;border:none;height:500px"></iframe>
                        </div>
                    </div>
                </div>

                <div id="id06" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width: 900px;">
                        <div class="w3-center"><br>
                            <span onclick="document.getElementById('id06').style.display = 'none'"
                                  class="w3-button  w3-white w3-display-topright " title="Close Modal">X</span>
                            <iframe src="webroot/media/pdf/220111UsoDeLaSessionParaLaAplicaci??n.pdf"
                                    style="width:100%;border:none;height:500px"></iframe>
                        </div>
                    </div>
                </div>
                <div id="id07" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width: 900px;">
                        <div class="w3-center"><br>
                            <span onclick="document.getElementById('id07').style.display = 'none'"
                                  class="w3-button  w3-white w3-display-topright " title="Close Modal">X</span>
                            <iframe src="webroot/media/pdf/201127ModeloFisicoDeDatos20-21.pdf"
                                    style="width:100%;border:none;height:500px"></iframe>
                        </div>
                    </div>
                </div>
                <div id="id08" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width: 900px;">
                        <div class="w3-center"><br>
                            <span onclick="document.getElementById('id08').style.display = 'none'"
                                  class="w3-button  w3-white w3-display-topright " title="Close Modal">X</span>
                            <iframe src="webroot/media/pdf/ApiRest.pdf"
                                    style="width:100%;border:none;height:500px"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            function startTime() {
                const date = new Date();
                document.getElementById("demo3").innerHTML = date.toLocaleTimeString();
                setTimeout(startTime, 1000);
            }
            /* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
            function openNav() {
                document.getElementById("mySidenav1").style.width = "250px";
                document.getElementById("main1").style.marginRight = "250px";
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
                document.getElementById("sp1").style.display = "none";
            }

            /* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
            function closeNav() {
                document.getElementById("mySidenav1").style.width = "0";
                document.getElementById("main1").style.marginRight = "0";
                document.body.style.backgroundColor = "white";
                document.getElementById("sp1").style.display = "inline";
            }
        </script>