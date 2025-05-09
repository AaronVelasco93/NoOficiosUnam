<?php
session_start();
include './Logica/conexion.php';
include './headerAdmin.php';
?>

<header>
 <h2 style="text-align:center">Login </h2>
  </header>

  <div class="row" style="margin-top:50px">
  <div class="col s6 offset-s3">
        
      
    <form action="./Logica/ValidarLogin.php" method="POST">
    <div class="form-group">
    <label >Nombre del Usuario</label>
    <input type="text"  placeholder="User" name="nombre_usuario" requiredclass="form-control" id="exampleInputEmail1" >
    
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" placeholder="Contraseña" name="password" requiredclass="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
   <button type="submit" class="btn btn-primary" style="background-color:black;color:white">Iniciar Sesion</button>

  </form>
      
</div>
</div>

<?php  include './footerAdmin.php';?>