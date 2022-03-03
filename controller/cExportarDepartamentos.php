<?php

/**
 * @author OUTMANE BOUHOU
 * @since 2/03/2022
 * @version 1.0
 * 
 * Controlador del login.
 * Requiere la vista del login.
 */
/* Si el usuario ha pulsado en registrar cambiamos la vista y devolver la pagina de registrar */
if (isset($_REQUEST['cancel'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'mtodepartamentos';
    header("Location:index.php");
    exit;
}

$msg=null;

/* comprobar si ha pulsado el button export */
if (isset($_REQUEST['export'])) {
    $bytes = DepartamentoPDO::exportarDepartamento();
     if($bytes>0)
     {
         $msg=  '
                            <div class="w3-panel w3-blue">
                            <h3>Information!</h3>
                            <p>The number of bytes written are '.$bytes.'</p>
                            </div>';
            
     }
}
require_once $views['layout'];





