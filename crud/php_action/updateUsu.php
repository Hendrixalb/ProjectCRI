<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$user = $_POST['Edituser'];
	$email = $_POST['Editemail'];
	$password = $_POST['Editpassword'];
	$pasadmin = $_POST['Editpasadmin'];
	$rol = $_POST['Editrol'];
	
	$active = $_POST['Editactive'];

	$sql = "UPDATE login SET user = '$user', email = '$email', password = '$password', pasadmin = '$pasadmin', rol = '$rol', active = '$active' WHERE id = $id";
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