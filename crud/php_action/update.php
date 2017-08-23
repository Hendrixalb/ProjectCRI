<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$Carnet = $_POST['Carnet'];
	$Nombres = $_POST['Nombres'];
	$Apellidos = $_POST['Apellidos'];
	$Sexo = $_POST['Sexo'];
	$Cod_ca = $_POST['Cod_ca'];
	$Trb_gra = $_POST['Trb_gra'];
	$Fecha_egre = $_POST['Fecha_egre'];
	$Fecha_grad = $_POST['Fecha_grad'];
	$active = $_POST['active'];

	$sql = "UPDATE estudiantes SET Carnet = '$Carnet', Nombres = '$Nombres', Apellidos = '$Apellidos', Sexo = '$Sexo', Cod_ca = '$Cod_ca', Trb_gra = '$Trb_gra', Fecha_egre = '$Fecha_egre', Fecha_grad = '$Fecha_grad', active = '$active' WHERE id = $id";
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
?>