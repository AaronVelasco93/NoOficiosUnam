  <?php
  include './conexion.php';
  $id = $_POST["id"];
  $considerando = $_POST["considerando"];
  $seSolicita =$_POST["seSolicita"];
  $notas =$_POST["notas"];
  $fecha =$_POST["fecha"];
  $firma = hash('md5', $id . $considerando . $seSolicita . $notas . $fecha);  

  $sql = "UPDATE acuerdo SET  id='$id', considerando='$considerando', seSolicita='$seSolicita', notas='$notas', fecha='$fecha', hash='$firma' WHERE id=$id";
  $result = $conn->query($sql);
  $conn->close();
  header("Location: ../indexAcuerdo.php");
  
?>