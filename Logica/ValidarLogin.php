<?php
session_start();
include "./conexion.php";
$usuario = $_POST['nombre_usuario'];
$password = $_POST['password'];

//$q = "SELECT COUNT(*) as contar from usuarios where nombre_usuario= '$usuario' and password = '$password'";
$q = "SELECT COUNT(*) as contar from usuarios where nombre= '$usuario' and password = '$password'";
$consulta = mysqli_query($conn,$q);

$array = mysqli_fetch_array($consulta);

if($array['contar']>0){
    
    // en la variable session se guarda el numero de cuenta esto para poder acarrearla
    $_SESSION['usermane']=$usuario;
    

    header("location: ../dashboardAdmin.php");
}else{

    header("location: ../loginAdmin.php");
}

?>