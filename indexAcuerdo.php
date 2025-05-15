<?php
session_start();
include "./Logica/conexion.php";
$usuario = $_SESSION['usermane'];
if (!isset($usuario)){
    header("location: loginAdmin.php");
    }else {?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Acuerdos ICO</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="./assets/img/ICOFavicion.png" type="image/x-icon">
</head>
<style>
        .formulario-fijo {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: white;
            padding: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .tabla-scroll {
            max-height: 600px;
            max-width: 2500px;
            overflow-y: auto;
        }

        table {
            white-space: nowrap;
        }
</style>
<body class="bg-light p-4">

  <div class="container">
        <form action="./Logica/guardarAcuerdo.php" method="POST" class="card p-4 shadow-sm">
      <div class="row g-3 align-items-center">
        <div class="col-md-3">
          <label class="form-label">Considerando</label>
          <input type="text" name="considerando" class="form-control" required>
        </div>

        <div class="col-md-3">
          <label class="form-label">Se Solicita</label>
          <input type="text" name="seSolicita" class="form-control" required>
        </div>

        <div class="col-md-3">
          <label class="form-label">Nota</label>
          <input type="text" name="notas" class="form-control" required>
        </div>

        <div class="col-md-3">
          <label class="form-label">Fecha</label>
          <input type="text" name="fecha" class="form-control" required>
        </div>
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
    <br>
    <a href="./indexOficios.php"><button class="btn btn-primary" > No. de Oficios</button></a>
    <div class="col text-end">
        <button class="btn btn-danger" onclick="location.href='./Logica/session_destroyAdmin.php'">Salir</button>
    </div>    

  </div>
  <?php
  include './Logica/conexion.php';
  //Listar Datos
  mysqli_set_charset($conn,'utf8');
  $q=" SELECT * FROM acuerdo ORDER BY id DESC ";
  $result= $conn->query($q);
?>
  <div class="container">
    <!-- TABLA CON SCROLL -->
        <h3 class="mb-5">📑 Lista de Acuerdos 2025</h3>
        <div class="tabla-scroll mt-3 border rounded bg-white p-2 shadow-sm">
            <table  class="table table-striped table-bordered align-middle text-center">
                    <thead class="table-dark" > 
                        <tr>
                            <th style="width: 30px;">ID</th>
                            <th>Considerando</th>
                            <th>Se solicita</th>
                            <th>Notas</th>
                            <th>Fecha</th>
                            <th style="width: 80px;">Hash</th>
                            <th>Editar</th>
                        
                        </tr>
                    </thead>
                    <?php

            while ($row = $result->fetch_assoc()) {
                if (isset($_GET['id']) && $row['id'] == $_GET['id']) {
            ?>
        
                <form action="./Logica/updateAcuerdo.php" method="POST">
                        
                        <tr>
                            <td><input style="width: 30px;" disabled name ="id" type="text" value="<?php echo $row ['id'];?>"> </td>    
                            <td><input type="text"  name ="considerando" type="text" value="<?php echo $row ['considerando'];?>"></td>
                            <td><input name ="seSolicita" type="text" value="<?php echo $row ['seSolicita'];?>"></td>
                            <td><input name ="notas" type="text" value="<?php echo $row ['notas'];?>" ></td>
                            <td><input style="width: 80px;"name ="fecha" type="text" value="<?php echo $row ['fecha'];?>" ></td>
                            <td><input disabled name ="hash" type="text" value="<?php echo $row ['hash'];?>" ></td>
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <td><button  type="submit"> Guardar </button><button  type="cancel"> Cancelar </button></td>
                        
                            
                        </tr>
                    
                </form>

            <?php 
                }else{
                ?>
                        <tr>
                            <td> <?php echo $row ['id'];?></td>
                            <td style="white-space: normal; word-wrap: break-word; max-width: 250px;" > <?php echo $row ['considerando'];?></td>
                            <td style="white-space: normal; word-wrap: break-word; max-width: 250px;"> <?php echo $row ['seSolicita']; ?></td>
                            <td style="white-space: normal; word-wrap: break-word; max-width: 250px;"> <?php echo $row ['notas']; ?></td>
                            <td> <?php echo $row ['fecha']; ?></td>
                            <td> <?php echo $row ['hash']; ?></td>

                <?php
                            echo '<td><a href="./indexAcuerdo.php?id=' . $row['id'] . '" role="button" >Editar</a></td>';
                        echo '</tr>';
                    
                        
                }
                ?>
                
                <?php
            }//Fin while
            ?>
        </div>    
    </div>
    <script>
  function autoResize(input) {
    input.style.width = "10px"; // reset temporal
    input.style.width = (input.scrollWidth + 10) + "px";
  }
</script>


  
</body>
</html>

<?php  
}

?>