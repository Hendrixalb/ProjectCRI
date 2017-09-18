<?php 

require_once 'db_connect.php';

$output = array('data' => array());

$sql = "SELECT * FROM estudiantes";
$query = $connect->query($sql);

$id = 1;
while ($row = $query->fetch_assoc()) {
	$active = '';
	if($row['active'] == 1) {
		$active = '<label class="label label-success">Activo</label>';
	} else {
		$active = '<label class="label label-danger">Inactivo</label>'; 
	}

	$actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['id'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember('.$row['id'].')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>	    
	  </ul>
	</div>
		';

	$output['data'][] = array(
		$row['id'],
		$row['Carnet'],
		$row['Nombres'],
		$row['Apellidos'],
		$row['Sexo'],
		$row['Cod_ca'],
		$row['Trb_gra'],
		$row['Fecha_egre'],
		$row['Fecha_grad'],
		$active,
		$actionButton
	);

	$id++;
}

// database connection close
$connect->close();

echo json_encode($output);
?>