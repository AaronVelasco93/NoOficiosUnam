<?php
session_start();
include "./Logica/conexion.php";
$usuario = $_SESSION['usermane'];
if (!isset($usuario)){
    header("location: loginAdmin.php");
    }else {
        header('Location: ./indexOficios.php');
   ?>     

<?php  
}

?>