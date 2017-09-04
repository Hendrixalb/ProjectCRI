<?php

	$user=$_POST['user'];
	$email=$_POST['email'];
	$password= $_POST['password'];
	$rpass=$_POST['rpass'];

	require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$checkemail=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$email'");
	$check_mail=mysqli_num_rows($checkemail);
		if($password==$rpass){
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el mail designado para un usuario, verifique sus datos");</script> ';
			}else{
				
				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO login VALUES('','$user','$password','$email','','2')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con Ã©xito");</script> ';
				
			}
			
		}else{
			echo 'Las contraseÃ±as son incorrectas';
		}

	
?>