
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Alta de Departamento</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body{
                background-image: url(webroot/media/night.jpg);
                background-repeat: no-repeat;
                background-size:  cover;
            }
            #t1 td{
                padding: 20px;
                color: white;
                font-weight: bold;
                
            }
            span{
                color: red;
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
            #t1 input[type="text"]{
                color: blue;
                font-weight: bold;
                text-align: center;
            }

        </style>
    </head>
    <body>
        <div class="w3-bar w3-black  ">
            <p style="padding: 10px;font-size: 18px;font-weight: bold;font-family: cursive;" class="w3-center ">Last Web Application MVC POO</p>
        </div>
        <div class="w3-bar w3-deep-purple  ">
<!--            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <button style="margin: 10px;font-weight: bold;float: left;" name="cancel" class="btn btn-primary" type="submit">Cancel</button>
            </form>-->
            <p style="padding: 2px;font-size: 18px;font-weight: bold;color: white;font-family: cursive;" class="w3-center ">Añadir Departamento</p>
        </div>

        <div id="div2">
   
            <div>
                <table id="t1">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <tr>
                            <!--El campo codeDep obligatorio -->
                            <td><label>Código del Departamento (*)   :</label></td>
                            <td> <input type="text" name="codeDep" class="form-control" value="<?php echo (isset($_REQUEST['codeDep']) ? $_REQUEST['codeDep'] : null); ?>"/></td>
                            <td><span><?php echo ($aErrores["codeDep"] != null ? $aErrores['codeDep'] : null); ?></span></td>
                        </tr>

                        <!--El campo description obligatorio -->
                        <tr>
                            <td><label>Descripción(*)   :</label></td>
                            <td><input type="text"  name="description" class="form-control" value="<?php echo (isset($_REQUEST['description']) ? $_REQUEST['description'] : null); ?>"/></td>
                            <td><span><?php echo ($aErrores["description"] != null ? $aErrores['description'] : null); ?></span></td>
                        </tr>

                        <!--El campo salary -->
                        <tr>
                            <td> <label>Volumen del negocio (*) :</label></td>
                            <td> <input type="text"  name="salary" class="form-control" value="<?php echo (isset($_REQUEST['salary']) ? $_REQUEST['salary'] : null); ?>"/></td>
                            <td> <span><?php echo ($aErrores["salary"] != null ? $aErrores['salary'] : null); ?></span></td>
                        </tr>

                        <tr> 
                            <td></td>
                            <td><input type="submit" class="btn btn-success" name="submitbtn" value="Añadir Dep"/>
                                <input type="submit" name="cancel" class="btn btn-danger" value="Cancelar">
                            </td>
                            
                        </tr>
                    </form>
                </table>

            </div>


