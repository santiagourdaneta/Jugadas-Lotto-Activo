<?php
if (!defined('PAGE_URL'))define ('PAGE_URL', 'http://localhost/jugadas_lotto_activo/jugadas');
include("auth.php");
$log = new logmein();
$log->encrypt = false; //set encryption
if($_REQUEST['action'] == "login"){
    $hashed_pass=  md5($_REQUEST['password']);
    if($log->login("logon", $_REQUEST['username'], $hashed_pass) == true){
        //do something on successful login
        header("location:".PAGE_URL);
    }else{
        //do something on FAILED login
      echo "Datos de acceso incorrectos";
      
    }
}
?>
