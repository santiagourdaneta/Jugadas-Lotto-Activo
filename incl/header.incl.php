<?php
define('PAGE_URL', 'http://localhost/jugadas_lotto_activo/');
$current_user = array();

function Page_Url() {
    echo PAGE_URL;
}

if (file_exists('auth/auth.php')) {
    include 'auth/auth.php';
} elseif (file_exists('../auth/auth.php')) {
    include '../auth/auth.php';
} elseif (file_exists('../../auth/auth.php')) {
    include '../../auth/auth.php';
}
$log = new logmein();
$log->encrypt = true;
if (!isset($_SESSION['loggedin']) || !$log->logincheck($_SESSION['loggedin'], "usuarios", "e_pass", "e_mail")) {
    $log->loginform("login", "loginform", PAGE_URL . "auth/login.php");
    exit();
} else {
    $current_user['email'] = $_SESSION['username'];
    $current_user['name'] = $_SESSION['full_name'];
    $current_user['role'] = $_SESSION['userlevel'];
    list($singlename) = explode(' ', $current_user['name'], 3);
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <!-- for faster page loads these should be on the footer, but careful on having jQuery code in your pages if you do -->
        <script type="text/javascript" src="<?php Page_Url() ?>js/jquery-1.8.2.js"></script>
        <script type="text/javascript" src="<?php Page_Url() ?>js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php Page_Url() ?>js/bootstrap-datetimepicker.min.js"></script>

        <link type="text/css" rel="stylesheet" href="<?php Page_Url() ?>css/bootstrap.css" /> 
        <link type="text/css" rel="stylesheet"	href="<?php Page_Url() ?>css/bootstrap-responsive.css" />
        <link type="text/css" rel="stylesheet" href="<?php Page_Url() ?>css/main.css" />
        <link type="text/css" rel="stylesheet" href="<?php Page_Url() ?>css/bootstrap-datetimepicker.min.css" />
        <title>Jugadas Lotto Activo</title>
    </head>
    <body >
        <!--    The top of the page visible on all pages in the system-->

        <div id="top" class="page-header">
            <div id="user" class='pull-right'>
                <?php echo "Bienvenido $singlename" ?> 
                <a class="" href=<?php Page_Url(); ?>auth/logout.php>Salir</a>      
            </div>
            <!--top logo-->	
            <a href="<?php Page_Url(); ?>"></a>

            <div id="navigation" class="navbar pull-center">
                <h1 id="title" >Jugadas Lotto Activo</h1>

                
            </div> <!--end navigation-->
        </div>
        <!--beginning of the pages' body-->
        <div  id="main-content" class="modal-body" >