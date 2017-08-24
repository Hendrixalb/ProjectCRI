
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
<head>
	<title>Sistema de control de estudiantes</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<center><h1 class="page-header">Niña Khalifa System ♥<small> con DataTables</small> </h1> </center>

				<div class="removeMessages"></div>

				<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	Nuevo
				</button>

				<br /> <br /> <br />

				<table class="table" id="manageMemberTable">					
					<thead>
						<tr>
							<th>ID</th>
							<th>Carnet</th>													
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Sexo</th>
							<th>Codigo de carrera</th>
							<th>Trabajo de graduacion</th>
							<th>Egreso</th>
							<th>Graduacion</th>								
							<th>Activo</th>
							<th>Acciones</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<!-- add modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="addMember">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Nuevo estudiante</h4>
	      </div>
	      
	      <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">

	      <div class="modal-body">
	      	<div class="messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="Carnet" class="col-sm-2 control-label">Carnet</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="Carnet" name="Carnet" placeholder="Carnet">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="Nombres" class="col-sm-2 control-label">Nombres</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="Nombres" name="Nombres" placeholder="Nombres">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Apellidos" class="col-sm-2 control-label">Apellidos</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="Apellidos" name="Apellidos" placeholder="Apellidos">
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="Sexo" class="col-sm-2 control-label">Sexo</label>
			    <div class="col-sm-10"> 
			      <Select type="text" class="form-control" id="Sexo" name="Sexo" placeholder="Sexo">
				<!-- here the text will apper  -->
					<option value="Masculino">Masculino</option>
					<option value="Femenino">Femenino</option>
				  </Select>
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="Cod_ca" class="col-sm-2 control-label">Codigo de carrera</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="Cod_ca" name="Cod_ca" placeholder="Codigo de carrera">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="Trb_gra" class="col-sm-2 control-label">Trabajo de graduacion</label>
			    <div class="col-sm-10"> 
			      <input type="date" class="form-control" id="Trb_gra" name="Trb_gra" placeholder="Trabajo de graduacion">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="Fecha_egre" class="col-sm-2 control-label">Egreso</label>
			    <div class="col-sm-10"> 
			      <input type="date" class="form-control" id="Fecha_egre" name="Fecha_egre" placeholder="Egreso">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="Fecha_grad" class="col-sm-2 control-label">Graduacion</label>
			    <div class="col-sm-10"> 
			      <input type="date" class="form-control" id="Fecha_grad" name="Fecha_grad" placeholder="Graduacion">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="active" class="col-sm-2 control-label">Active</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="active" id="active">
			      	<option value="">--Selecione una opcion--</option>
			      	<option value="1">Activo</option>
			      	<option value="2">Inactivo</option>
			      </select>
			    </div>
			  </div>			 		

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Guardar cambios</button>
	      </div>
	      </form> 
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /add modal -->

	<!-- remove modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Eliminar</h4>
	      </div>
	      <div class="modal-body">
	        <p>Realmente deseas eliminar este registro ?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="button" class="btn btn-primary" id="removeBtn">Guardar cambios</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /remove modal -->

	<!-- edit modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Editar</h4>
	      </div>

		<form class="form-horizontal" action="php_action/update.php" method="POST" id="updateMemberForm">	      

	      <div class="modal-body">
	        	
	        <div class="edit-messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="Carnet" class="col-sm-2 control-label">Carnet</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="Carnet" name="Carnet" placeholder="Carnet">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Nombres" class="col-sm-2 control-label">Nombres</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="Nombres" name="Nombres" placeholder="Nombres">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Apellidos" class="col-sm-2 control-label">Apellidos</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="Apellidos" name="Apellidos" placeholder="Apellidos">
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="Sexo" class="col-sm-2 control-label">Sexo</label>
			    <div class="col-sm-10"> 
			      <Select type="text" class="form-control" id="Sexo" name="Sexo" placeholder="Sexo">
				<!-- here the text will apper  -->
					<option value="Masculino">Masculino</option>
					<option value="Femenino">Femenino</option>
				  </Select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Cod_ca" class="col-sm-2 control-label">Codigo de carrera</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="Cod_ca" name="Cod_ca" placeholder="Codigo de carrera">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Trb_gra" class="col-sm-2 control-label">Trabajo de graduacion</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="Trb_gra" name="Trb_gra" placeholder="Trabajo de graduacion">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Fecha_egre" class="col-sm-2 control-label">Egreso</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="Fecha_egre" name="Fecha_egre" placeholder="Egreso">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Fecha_grad" class="col-sm-2 control-label">Graduacion</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="Fecha_grad" name="Fecha_grad" placeholder="Graduacion">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="active" class="col-sm-2 control-label">Activo</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="active" id="active">
			      	<option value="">--Selecione una opcion--</option>
			      	<option value="1">Activo</option>
			      	<option value="2">Inactivo</option>
			      </select>
			    </div>
			  </div>	
	      </div>
	      <div class="modal-footer editMemberModal">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Guardar cambios</button>
	      </div>
	      </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /edit modal -->

	<!-- jquery plugin -->
	<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
	<!-- include custom index.js -->
	<script type="text/javascript" src="custom/js/index.js"></script>
	
<link rel="stylesheet" href="Https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js" />
		
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>


</body>
</html>