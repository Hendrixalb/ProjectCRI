<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO estudiantes (Carnet, Nombres, Apellidos, Sexo, Cod_ca, Trb_gra, Fecha_egre, Fecha_grad, image) 
			VALUES (:Carnet, :Nombres, :Apellidos, :Sexo, :Cod_ca, :Trb_gra, :Fecha_egre, :Fecha_grad, :image)
		");
		$result = $statement->execute(
			array(
				':Carnet'	=>	$_POST["Carnet"],
				':Nombres'	=>	$_POST["Nombres"],
				':Apellidos'	=>	$_POST["Apellidos"],
				':Sexo'	=>	$_POST["Sexo"],
				':Cod_ca'	=>	$_POST["Cod_ca"],
				':Trb_gra'	=>	$_POST["Trb_gra"],
				':Fecha_egre'	=>	$_POST["Fecha_egre"],
				':Fecha_grad'	=>	$_POST["Fecha_grad"],
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Datos ingresados';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE estudiantes 
			SET Carnet = :Carnet, Nombres = :Nombres, Apellidos = :Apellidos, Sexo = :Sexo, Cod_ca = :Cod_ca, Trb_gra = :Trb_gra, Fecha_egre = :Fecha_egre, Fecha_grad = :Fecha_grad, image = :image  
			WHERE Carnet = :Carnet
			"
		);
		$result = $statement->execute(
			array(
				':Nombres'	=>	$_POST["Nombres"],
				':Apellidos'	=>	$_POST["Apellidos"],
				':Sexo'	=>	$_POST["Sexo"],
				':Cod_ca'	=>	$_POST["Cod_ca"],
				':Trb_gra'	=>	$_POST["Trb_gra"],
				':Fecha_egre'	=>	$_POST["Fecha_egre"],
				':Fecha_grad'	=>	$_POST["Fecha_grad"],
				':image'		=>	$image,
				':Carnet'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Datos actualizados';
		}
	}
}

?>