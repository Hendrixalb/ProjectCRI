<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$user = $_POST['user'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$pasadmin = $_POST['pasadmin'];
	$rol = $_POST['rol'];

	$active = $_POST['active'];

	$sql = "INSERT INTO login (user, email, password, pasadmin, rol, active) VALUES ('$user', '$email', '$password', '$pasadmin', '$rol','$active')";
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