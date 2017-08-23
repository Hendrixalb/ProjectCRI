<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$Carnet = $_POST['Carnet'];
	$Nombres = $_POST['Nombres'];
	$Apellidos = $_POST['Apellidos'];
	$Sexo = $_POST['Sexo'];
	$Cod_ca = $_POST['Cod_ca'];
	$Trb_gra = $_POST['Trb_gra'];
	$Fecha_egre = $_POST['Fecha_egre'];
	$Fecha_grad = $_POST['Fecha_grad'];
	$active = $_POST['active'];

	$sql = "INSERT INTO estudiantes (Carnet, Nombres, Apellidos, Sexo, Cod_ca, Trb_gra, Fecha_egre, Fecha_grad, active) VALUES ('$Carnet', '$Nombres', '$Apellidos', '$Sexo', '$Cod_ca', '$Trb_gra', '$Fecha_egre', '$Fecha_grad', '$active')";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}