<!DOCTYPE html>
<html>
    <head>
        <title>OB-Log In</title>
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
                height:  310px;
                display: flex;
                justify-content: center;
                flex-flow: column wrap;
                align-content: center;
                gap:30px;
                padding-bottom: 10px;
            }
            #bg{
                border-radius: 10px;
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
            
            span:nth-of-type(2), span:nth-of-type(3){
                color: red;
                text-align: center;
                font-size: 15px;
                margin-top: -30px;
                margin-bottom: -20px;
            }
            input:nth-of-type(1),input:nth-of-type(2){
                border: 2px solid blue;
                border-radius: 25px;

            }
            input:nth-of-type(3){
                border: 2px solid green;
                align-self: center;
                border-radius: 25px;
                width: 100px;
            }
            section input:nth-of-type(1){
                border: 2px solid blue;
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
            section input:nth-of-type(1),section input:nth-of-type(2){
                position: relative;  
            }
            ::placeholder{
                text-transform: uppercase;
                color: #978686;
            }
        </style>
    </head>
    <body>
        <div class="w3-bar w3-black  ">
            <p style="padding: 10px;font-size: 18px;font-weight: bold;font-family: cursive;" class="w3-center ">Last Web Application MVC POO</p>
        </div>
         <div class="w3-bar w3-deep-purple  ">
            <p style="padding: 2px;font-size: 18px;font-weight: bold;color: white;font-family: cursive;" class="w3-center ">Login </p>
        </div>
       
        <div class="container mt-3">
            <div class="d-flex mb-3">
                <div class="p-2  flex-fill"></div>
                <div id="bg" class="p-2 flex-fill bg-dark">
                    <form id="form1" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <span> Login </span>
                        <input type="text" name="username"  value=""  placeholder="username">
                        <input type="password" name="password" value=""  placeholder="password"> 
                        <section>
                            <input type="submit" name="btnlogin" class="w3-hover-blue w3-hover-text-white" value="Next">
                            <input type="submit" name="cancel" class="w3-hover-red w3-hover-text-black" value="Cancel">
                        </section>
                        <span><?php echo $error; ?></span>
                    </form> 
                </div>
                <div class="p-2  flex-fill"></div>
            </div>
        </div>
        <div style="height:200px;"></div>