<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$fname = $_POST['editName'];
	$lname = $_POST['editlname'];
	$contact = $_POST['editContact'];
	$active = $_POST['editActive'];

	$sql = "UPDATE members SET fname = '$fname', contact = '$contact', lname = '$lname', active = '$active' WHERE id = $id";
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