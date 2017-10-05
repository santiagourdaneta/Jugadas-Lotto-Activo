<?php
if (!defined(PAGE_URL))define ('PAGE_URL', 'http://localhost/jugadas_lotto_activo/');
include("auth.php");
$log = new logmein();
$log->encrypt = FALSE; //set encryption
//Log out
$log->logout();
header("location:".PAGE_URL);
?>
