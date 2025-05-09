<?php
session_start();
$_SESSION['usermane']='text';
$_SESSION[''] = '';

session_destroy();
        
header('location: ../loginAdmin.php');
exit();
?>