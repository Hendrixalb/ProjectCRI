<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$contact = $_POST['contact'];
	$active = $_POST['active'];

	$sql = "INSERT INTO members (fname, contact, lname, active) VALUES ('$fname', '$contact', '$lname', '$active')";
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