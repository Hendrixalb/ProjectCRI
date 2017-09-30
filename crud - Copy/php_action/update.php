<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$Carnet = $_POST['EditCarnet'];
	$Nombres = $_POST['EditNombres'];
	$Apellidos = $_POST['EditApellidos'];
	$Sexo = $_POST['EditSexo'];
	$Cod_ca = $_POST['EditCod_ca'];
	$Trb_gra = $_POST['EditTrb_gra'];
	$Fecha_egre = $_POST['EditFecha_egre'];
	$Fecha_grad = $_POST['EditFecha_grad'];
	$active = $_POST['Editactive'];

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