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
    <title>Registro de Usuarios</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

 
	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">



  </head>
<body>

<header class="header">
<div class="container">
<div class="row">

</div>
</header>

  <!-- Navbar
    ================================================== -->

<?php 
include ("menu1.php");
 ?>

<!-- ======================================================================================================================== -->

	
	
		

		
<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="col-md-1">
                <img width="100px" src="img/logou.png">
            </div>
<div  class="container">
		<div class="container">
		<h2 align="center"> Administración de Usuarios Registrados</h2>
		<div class="col-md-offset-10">
		<form method="get" action="usuarionuevo.php">
<button class='btn btn-success' type="submit"> Nuevo Usuario <span class="glyphicon glyphicon-plus"></span>
</button>
</form>	
</div> <br>

			<?php

				require("connect_db.php");
				$sql=("SELECT * FROM login");
	
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				$query=mysqli_query($mysqli,$sql);
				echo "<table ; class='table table-striped';>";
					echo "<tr class=''>";
						echo "<td>Id</td>";
						echo "<td>Usuario</td>";
						echo "<td>Correo</td>";
						echo "<td>Contraseña</td>";
						echo "<td>Contraseña Administrador</td>";
						echo "<td>Rol</td>";
						echo "<td>Estado</td>";
						echo "<td>Editar</td>";
						echo "<td>Borrar</td>";
					echo "</tr>";

			    
			?>
			  
			<?php 
				 while($arreglo=mysqli_fetch_array($query)){
				  	echo "<tr class=''>";
				    	echo "<td>$arreglo[0]</td>";
				    	echo "<td>$arreglo[1]</td>";
				    	echo "<td>$arreglo[3]</td>";
				    	echo "<td>$arreglo[2]</td>";
				    	echo "<td>$arreglo[4]</td>";
				    	echo "<td>$arreglo[5]</td>";
				    	echo "<td>$arreglo[6]</td>";
				    	

				    	echo "<td><a href='actualizar.php?id=$arreglo[0]'><button class='btn btn-secundary' >Actualizar <span class='glyphicon glyphicon-pencil'> </span></button>";
						echo "<td><a href='admin.php?id=$arreglo[0]&idborrar=2'><button class='btn btn-danger'>Eliminar <span class='glyphicon glyphicon-trash'> </span></button>";
						

						
					echo "</tr>";
				}

				echo "</table>";

					extract($_GET);
					if(@$idborrar==2){
		
						$sqlborrar="DELETE FROM login WHERE id=$id";
						$resborrar=mysqli_query($mysqli,$sqlborrar);
						echo '<script>alert("REGISTRO ELIMINADO")</script> ';
						//header('Location: proyectos.php');
						echo "<script>location.href='admin.php'</script>";
					}
			?>
		</div>
<!-- Footer
      ================================================== -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
	<!-- include custom index.js -->
	<script type="text/javascript" src="custom/js/index.js"></script>
	
<link rel="stylesheet" href="Https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js" />
		
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>

    </body>
</html>