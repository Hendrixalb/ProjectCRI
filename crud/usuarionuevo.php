<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:index.php");
}
?>    
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Administracion de Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- bootstrap css -->
  <link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
  <!-- datatables css -->
  <link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">


  </head>
<body>
  
  <?php 
include("menu1.php");
   ?>

   <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="col-md-1">
                <img width="100px" src="img/logou.png">
            </div>
			<br>
					</br>
<div  class="container">
		<div class="container">
		<h2 align="center">Administración de usuarios registrados</h2>  

    
<div class="col-md-offset-3">
    <form action="nuevo.php" method="post">
<div class="col-md-8">

        Usuario<br> <input type="text" name="user" required  class="form-control"><br>
        Correo usuario<br> <input type="email" name="email" required class="form-control"><br>
        Contraseña usuario<br> <input type="text" name="password"  class="form-control"><br>
        Repite la contraseña<br> <input type="text" name="rpass"  class="form-control"><br>
        Rol
        <select name="rol" id="rol" required class="form-control">
          <option value="Usuario">Usuario</option>
          <option value="Administrador">Administrador</option>
        </select> <br>

    
        <input type="submit" value="Guardar" class="btn btn-success btn-primary">
        </div>
      </form>
</div>

    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>



