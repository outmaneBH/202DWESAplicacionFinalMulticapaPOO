<?php
/* Meter el variable en curso de que vista este en ejecucion:require $vistaEnCurso; */
require_once $views[$_SESSION['paginaEnCurso']];
?>
<div id="idHer" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

        <div class="w3-center"><br>
            <span onclick="document.getElementById('idHer').style.display = 'none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
            <h3 style="color: black;">Tecnologias utilizadas</h3>
        </div>

        <div style="display: flex;flex-flow: row;justify-content: center" class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <div class="w3-panel w3-card">Css<img src="https://img.icons8.com/color/48/000000/css3.png" alt="alt"/></div>
            <div class="w3-panel w3-card">JS<img src="https://img.icons8.com/color/48/000000/javascript--v1.png"/></div>
            <div class="w3-panel w3-card">HTML5<img src="https://img.icons8.com/color/48/000000/html-5--v1.png"/></div>
            <div class="w3-panel w3-card">Bootstrap<img src="https://img.icons8.com/color/48/000000/bootstrap.png"/></div>
            <div class="w3-panel w3-card">PHP<img src="https://img.icons8.com/officel/48/000000/php-logo.png"/></div>
            <div class="w3-panel w3-card">MYSQL<img src="https://img.icons8.com/external-tal-revivo-color-tal-revivo/48/000000/external-mysql-an-open-source-relational-database-management-system-logo-color-tal-revivo.png"/></div>
        </div>

    </div>
</div>
<script src="webroot/js/font.js"></script>
<footer style="bottom: 0;position: fixed;width: 100%" class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-2 pb-0">
        <!-- Section: Social media -->
        <span style="color: white; font-size: 20px;font-family: cursive;opacity: 0.5 ;" id="demo3"></span>
        <section class="mb-1">
            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;color: orange"  href="#!"  role="button"><i class="fa fa-rss" ></i></a>
            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;color: green"  href="#!"  role="button"><i class="fas fa-atom"></i></a>
            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;"  href="#!"  role="button"><img src="https://img.icons8.com/fluency/20/000000/set-as-resume.png"/></a>
            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;color: red"  href="../index.html" target="_blank" role="button"><i class="fab fa-firefox-browser"></i></a>
            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;" href="https://github.com/outmaneBH/202DWESAplicacionFinalMulticapaPOO" target="_blank" role="button"><i class="fab fa-github"></i></a>
            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;" href="#!"  role="button"><i class="far fa-comments"></i></a>
            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;" href="doc/index.html" target="_blank"  role="button"><i class="fas fa-file-pdf"></i></a>
            
            <button onclick="document.getElementById('idHer').style.display = 'block'" class="btn btn-primary btn-floating m-1" style="background-color: #333333;" href="#!" target="_blank" role="button"><i class="fas fa-code"></i></button>
        </section>
          
    </div>

    <!-- Grid container -->
    <!-- Copyright -->
    <div class="text-center p-1" style="background-color: rgba(0, 0, 0, 0.2);">
        Copyrights © 2021-2022 
        OUTMANE BOUHOU
        . All rights reserved.
        <p>Ultima actualizacion : 10 / 02 / 2022 , version 2 </p>
    </div>
    <!-- Copyright -->
</footer>
</body>
</html>



