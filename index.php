<!DOCTYPE html>
<html><head>
<meta charset="utf-8">
<title>Control de Estudiantes Egresados </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/button.css">
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/dataTables.js"></script>

    <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="js/jszip.min.js"></script>
    <script type="text/javascript" src="js/vfs_fonts.js"></script>
    <script type="text/javascript" src="js/pdfmake.min.js"></script>
  
    <script type="text/javascript" src="js/buttons.html5.min.js"></script>
</head>
<body>
<div class="container box">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Nuevo Usuario</button>
				</div>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped tbuser">
					<thead>
						<tr>
							<th width="10%">Carnet</th>
							<th width="10%">Imagen</th>
							<th width="10%">Nombre</th>
							<th width="35%">Apellido</th>
							<th width="35%">Sexo</th>
							<th width="15%">Codigo de carrera</th>
							<th width="35%">Trabajo de graduacion</th>
							<th width="35%">Egreso</th>
							<th width="10%">Graduacion</th>
							<th width="10%">Editar</th>
							<th width="10%">Borrar</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
</body>
</html>
<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Agregar Usuario</h4>
				</div>
				<div class="modal-body">
					<label>Carnet</label>
					<input type="text" name="Carnet" id="Carnet" class="form-control" />
					<br />
					<label>Nombres</label>
					<input type="text" name="Nombres" id="Nombres" class="form-control" />
					<br />
					<label>Apellidos</label>
					<input type="text" name="Apellidos" id="Apellidos" class="form-control" />
					<br />
					<label>Sexo</label>
					<input type="select" name="Sexo" id="Sexo" class="form-control" />
					<br />
					<label>Codigo de carrera</label>
					<input type="text" name="Cod_ca" id="Cod_ca" class="form-control" />
					<br />
					<label>Tabajo de Graduacion</label>
					<input type="date" name="Trb_grad" id="Trb_grad" class="form-control" />
					<br />
					<label>Egreso</label>
					<input type="date" name="Fecha_egre" id="Fecha_egre" class="form-control" />
					<br />
					<label>Graduacion</label>
					<input type="date" name="Fecha_grad" id="Fecha_grad" class="form-control" />
					<br />
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Add User");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 0, 0],
				"orderable":false,
			},
		],
	  dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
			
        ]

	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var Carnet = $('#Carnet').val();
		var Nombres = $('#Nombres').val();
		var Apellidos = $('#Apellidos').val();
		var Sexo = $('#Sexo').val();
		var Cod_ca = $('#Cod_ca').val();
		var Trb_gra = $('#Trb_gra').val();
		var Fecha_egre = $('#Fecha_egre').val();
		var Fecha_grad = $('#Fecha_grad').val();
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#user_image').val('');
				return false;
			}
		}	
		if(Carnet != '' && Nombres != '' && Apellidos != '' && Sexo != '' && Cod_ca != '' && Trb_gra != '' && Fecha_egre != '' && Fecha_grad != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Ambos campos son requeridos");
		}
	});
	
	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("Carnet");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#Carnet').val(data.Carnet);
				$('#Nombres').val(data.Nombres);
				$('#Apellidos').val(data.Apellidos);
				$('#Sexo').val(data.Sexo);
				$('#Cod_ca').val(data.Cod_ca);
				$('#trb_gra').val(data.Trb_gra);
				$('#Fecha_egre').val(data.Fecha_egre);
				$('#Fecha_grad').val(data.Fecha_grad);
				$('.modal-title').text("Edit User");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("Carnet");
		if(confirm("Esta seguro de eliminar?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
});
</script>