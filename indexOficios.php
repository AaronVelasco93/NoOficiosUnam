<?php
session_start();
include "./Logica/conexion.php";
$usuario = $_SESSION['usermane'];
if (!isset($usuario)){
    header("location: loginAdmin.php");
    }else { ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Oficios ICO</title>
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
        <form action="./Logica/guardar.php" method="POST" class="card p-4 shadow-sm">
      <div class="row g-3 align-items-center">
        <div class="col-md-3">
          <label class="form-label">Persona</label>
          <input type="text" name="persona" class="form-control" required>
        </div>

        <div class="col-md-3">
          <label class="form-label">Área</label>
          <input type="text" name="area" class="form-control" required>
        </div>

        <div class="col-md-3">
          <label class="form-label">Asunto</label>
          <input type="text" name="asunto" class="form-control" required>
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
    <a href="./indexAcuerdo.php"><button class="btn btn-primary" > No. de Acuerdos</button></a> 
    <div class="col text-end">
        <button class="btn btn-danger" onclick="location.href='./Logica/session_destroyAdmin.php'">Salir</button>
    </div>
  </div>
  <?php
  include './Logica/conexion.php';
  //Listar Datos
  mysqli_set_charset($conn,'utf8');
  $q=" SELECT * FROM registros ORDER BY id DESC ";
  $result= $conn->query($q);
?>
  <div class="container">
    <!-- TABLA CON SCROLL -->
        <h3 class="mb-5">📑 Lista de Oficios 2025</h3>
        <div class="tabla-scroll mt-3 border rounded bg-white p-2 shadow-sm">
            <table  class="table table-striped table-bordered align-middle text-center">
                    <thead class="table-dark" > 
                        <tr>
                            <th style="width: 30px;">ID</th>
                            <th>Persona</th>
                            <th>Área</th>
                            <th>Asunto</th>
                            <th>Fecha</th>
                            <th  style="width: 80px;">Hash</th>
                            <th>Editar</th>
                        
                        </tr>
                    </thead>
                    <?php

            while ($row = $result->fetch_assoc()) {
                if (isset($_GET['id']) && $row['id'] == $_GET['id']) {
            ?>
        
                <form action="./Logica/update.php" method="POST">
                        
                        <tr>
                            <td><input style="width: 30px;" disabled name ="id" type="text" value="<?php echo $row ['id'];?>"> </td>    
                            <td><input type="text"  name ="persona" type="text" value="<?php echo $row ['persona'];?>"></td>
                            <td><input name ="area" type="text" value="<?php echo $row ['area'];?>"></td>
                            <td><input name ="asunto" type="text" value="<?php echo $row ['asunto'];?>" ></td>
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
                            <td style="white-space: normal; word-wrap: break-word; max-width: 250px;" > <?php echo $row ['persona'];?></td>
                            <td style="white-space: normal; word-wrap: break-word; max-width: 250px;"> <?php echo $row ['area']; ?></td>
                            <td style="white-space: normal; word-wrap: break-word; max-width: 250px;"> <?php echo $row ['asunto']; ?></td>
                            <td> <?php echo $row ['fecha']; ?></td>
                            <td> <?php echo $row ['hash']; ?></td>

                <?php
                            echo '<td><a href="./indexOficios.php?id=' . $row['id'] . '" role="button" >Editar</a></td>';
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