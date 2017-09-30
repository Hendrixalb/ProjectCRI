<?php 

require_once 'db_connect.php';

$output = array('data' => array());

$sql = "SELECT * FROM estudiantes";
$query = $connect->query($sql);

$x = 1;
while ($row = $query->fetch_assoc()) {
	$active = '';
	if(($row['Fecha_egre'] == 0000-00-00)and($row['Fecha_grad'] == 0000-00-00))  {
		$active = '<div><label class="label label-danger">Incompleto</label></div>';
	}
elseif (($row['Fecha_egre']  != 0000-00-00)and($row['Fecha_grad']  != 0000-00-00)) {
$active = '<label class="label label-success label-lg">*Completo*</label>'; 
}

	 else {
		$active = '<label class="label label-warning label-lg">En proceso</label>'; 
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
		$x,
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

	$x++;
}

// database connection close
$connect->close();

echo json_encode($output);
?>