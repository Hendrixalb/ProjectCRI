<?php

include('db.php');
include("function.php");

if(isset($_POST["user_id"]))
{
	$image = get_image_name($_POST["user_id"]);
	if($image != '')
	{
		unlink("upload/" . $image);
	}
	$statement = $connection->prepare(
		"DELETE FROM estudiantes WHERE Carnet = :Carnet"
	);
	$result = $statement->execute(
		array(
			':Carnet'	=>	$_POST["user_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Datos eliminados';
	}
}



?>