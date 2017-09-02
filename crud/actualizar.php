<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
}
?>		
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Proyecto Academias</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.min.css" rel="stylesheet"/>

  </head>
<body>
<div class="container-fluid">
<header class="header">
	<?php 
include("menu1.php");
	 ?>
</header>

  <!-- Navbar
    ================================================== -->

<!-- ======================================================================================================================== -->	
	
		
<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<h2> Administración de usuarios registrados</h2>	
		<div class="row-fluid">
		
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

		<form action="ejecutaactualizar.php" method="post">
			<div class="row">
			<div class="col-md-6">
				Id<br><input type="text" name="id" value= "<?php echo $id ?>" class="form-control" readonly="readonly"><br>
				Usuario<br> <input type="text" name="user" value="<?php echo $user?>" class="form-control"><br>
				Correo usuario<br> <input type="mail" name="email" value="<?php echo $email?>" class="form-control"><br>
				contraseña usuario<br> <input type="text" name="password" value="<?php echo $password?>" class="form-control"><br>
				contraseña administrador<br> <input type="text" name="pasadmin" value="<?php echo $pasadmin?>" class="form-control"><br>
				<select name="rol" id="rol" value="<?php echo $rol?>" class="form-control">
					<option value="Usuario">Usuario</option>
					<option value="Administrador">Administrador</option>
				</select> <br>
				<select name="active" id="active" value="<?php echo $active?>" class="form-control">
					<option value="activo">activo</option>
					<option value="inactivo">inactivo</option>
				</select><br>
			</div>
			</div>	
				<input type="submit" value="Guardar" class="btn btn-success btn-primary">
			</form>

				  
		
		
		


		<!--EMPIEZA DESLIZABLE-->
		
		 <!--TERMINA DESLIZABLE-->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	</style>
  </body>
</html>


