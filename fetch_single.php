<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM estudiantes 
		WHERE Carnet = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["Carnet"] = $row["Carnet"];
		$output["Nombres"] = $row["Nombres"];
		$output["Apellidos"] = $row["Apellidos"];
		$output["Sexo"] = $row["Sexo"];
		$output["Cod_ca"] = $row["Cod_ca"];
		$output["Trb_gra"] = $row["Trb_gra"];
		$output["Fecha_egre"] = $row["Fecha_egre"];
		$output["Fecha_grad"] = $row["Fecha_grad"];
		if($row["image"] != '')
		{
			$output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>