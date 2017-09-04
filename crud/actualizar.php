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


  <!-- Navbar
    ================================================== -->

<!-- ======================================================================================================================== -->	
	
		
<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<h2> Administración de usuarios registrados</h2>	

		
		<?php
		extract($_GET);
		require("connect_db.php");

		$sql="SELECT * FROM login WHERE id=$id";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
		$ressql=mysqli_query($mysqli,$sql);
		while ($row=mysqli_fetch_row ($ressql)){
		    	$id=$row[0];
		    	$user=$row[1];
		    	$email=$row[3];
		    	$password=$row[2];
		    	$pasadmin=$row[4];
		    	$rol=$row[5];
		    	$active=$row[6];
		    }



		?>
<div class="col-md-offset-3">
		<form action="ejecutaactualizar.php" method="post">
<div class="col-md-8">
				Id<br><input type="text" name="id" value= "<?php echo $id ?>" class="form-control" readonly="readonly"><br>
				Usuario<br> <input type="text" name="user" required value="<?php echo $user?>" class="form-control"><br>
				Correo usuario<br> <input type="email" name="email" required value="<?php echo $email?>" class="form-control"><br>
				contraseña usuario<br> <input type="text" name="password" value="<?php echo $password?>" class="form-control"><br>
				contraseña administrador<br> <input type="text" name="pasadmin" value="<?php echo $pasadmin?>" class="form-control"><br>
				Rol
				<select name="rol" id="rol" required value="<?php echo $rol?>" class="form-control">
					<option value="Usuario">Usuario</option>
					<option value="Administrador">Administrador</option>
				</select> <br>
				Estado
				<select name="active" id="active" required value="<?php echo $active?>" class="form-control">
					<option value="activo">activo</option>
					<option value="inactivo">inactivo</option>
				</select><br>
		
				<input type="submit" value="Guardar" class="btn btn-success btn-primary">
				</div>
			</form>
</div>
				  
		
		
		


		<!--EMPIEZA DESLIZABLE-->
		
		 <!--TERMINA DESLIZABLE-->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
  </body>
</html>



