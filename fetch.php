<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM estudiantes";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE Carnet LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Nombres LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Apellidos LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Cod_ca LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Trb_gra LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Fecha_egre LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Fecha_grad LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY Carnet DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$image = '';
	if($row["image"] != '')
	{
		$image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
	}
	else
	{
		$image = '';
	}
	$sub_array = array();
	$sub_array[] = $image;
	$sub_array[] = $row["Carnet"];
	$sub_array[] = $row["Nombres"];
	$sub_array[] = $row["Apellidos"];
	$sub_array[] = $row["Sexo"];
	$sub_array[] = $row["Cod_ca"];
	$sub_array[] = $row["Trb_gra"];
	$sub_array[] = $row["Fecha_egre"];
	$sub_array[] = $row["Fecha_grad"];
	$sub_array[] = '<button type="button" name="update" Carnet="'.$row["Carnet"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" Carnet="'.$row["Carnet"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>