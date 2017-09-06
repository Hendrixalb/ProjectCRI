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
    <title>Proyecto Academias</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">
</head>
<body>

<?php 
include("menu1.php");
 ?>	
<!-- formulario registro -->
<div class="container">
	<div class="col-md-offset-3">
<form method="post" action="nuevo.php" >
<div class="col-md-8">
   <h1>Registro de Usuarios</h1>
    <div class="form-group">
      <label><b>Ingresa tu nombre</b></label>
      <input type="text" name="user" class="form-control" placeholder="Ingresa tu nombre" />
    </div>
    <div class="form-group">
      <label><b>Ingresa tu email</b></label>
      <input type="email" name="email" class="form-control"  required placeholder="Ingresa email"/>
    </div>
    <div class="form-group">
      <label><b>Ingresa tu Password</b></label>
      <input type="password" name="password" class="form-control"  placeholder="Ingresa contraseña" />
    </div>
    <div class="form-group">
      <label><b>Repite tu contraseña</b></label>
      <input type="password" name="rpass" class="form-control" required placeholder="repite contraseña" />
      <br>
       <input  class="btn btn-success" type="submit" name="submit" value="Registrarse"/>
    </div>  
    </div>
   
<?php
		if(isset($_POST['submit'])){
			require("nuevo.php");
		}
	?>
</form>
</div>
</div>

</body>
</html>