<?php
  include './conexion.php';
  $id = $_POST["id"];
  $persona = $_POST["persona"];
  $area =$_POST["area"];
  $asunto =$_POST["asunto"];
  $fecha =$_POST["fecha"];
  $firma = hash('md5', $id . $persona . $area . $asunto . $fecha);  

  $sql = "UPDATE registros SET  id='$id', persona='$persona', area='$area', asunto='$asunto', fecha='$fecha', hash='$firma' WHERE id=$id";
  $result = $conn->query($sql);
  $conn->close();
  header("Location: ../indexOficios.php");
  
?>