<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
}
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
<head>
	<title>Control de Usuarios</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">

</head>
<body>
<?php 
include('menu1.php'); 
?>
	<div class="container box">
		<div class="row">
			<div class="col-md-12">

				<center><h1 class="page-header">Control de usuarios<small> con DataTables</small> </h1> </center>

				<div class="removeMessages"></div>

				<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addUsu" id="addUsuModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	Nuevo
				</button>

				<br /> <br /> <br />

				<table class="table table-striped" id="manageUsuTable">					
					<thead>
						<tr>
							<th width="1%">Id</th>
							<th width="1%">User</th>													
							<th width="1%">Email</th>
							<th width="1%">Password</th>
							<th width="1%">Pasadmin</th>
							<th width="1%">Rol</th>								
							<th width="1%">Activo</th>
							<th width="1%">Acciones</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<!-- add modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="addUsu">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Nuevo estudiante</h4>
	      </div>
	      
	      <form class="form-horizontal" action="php_action/createUsu.php" method="POST" id="createUsuForm">

	      <div class="modal-body">
	      	<div class="messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="user" class="col-sm-2 control-label">user</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="user" name="user" placeholder="user">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="email" class="col-sm-2 control-label">email</label>
			    <div class="col-sm-10"> 
			      <input type="mail" class="form-control" id="email" name="email" placeholder="email">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="password" class="col-sm-2 control-label">password</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="password" name="password" placeholder="password">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="pasadmin" class="col-sm-2 control-label">pasadmin</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="pasadmin" name="pasadmin" placeholder="pasadmin">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="rol" class="col-sm-2 control-label">rol</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="rol" id="rol">
			      	<option value="">--Selecione una opcion--</option>
			      	<option value="Usuario">Usuario</option>
			      	<option value="Administrador">Administrador</option>
			      </select>
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
	<div class="modal fade" tabindex="-1" role="dialog" id="removeUsuModal">
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
	<div class="modal fade" tabindex="-1" role="dialog" id="editUsuModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Editar</h4>
	      </div>

		<form class="form-horizontal" action="php_action/updateUsu.php" method="POST" id="updateUsuForm">	      

	      <div class="modal-body">
	        	
	        <div class="edit-messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="Edituser" class="col-sm-2 control-label">user</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="Edituser" name="Edituser" placeholder="user">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Editemail" class="col-sm-2 control-label">email</label>
			    <div class="col-sm-10">
			      <input type="mail" class="form-control" id="Editemail" name="Editemail" placeholder="email">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Editpassword" class="col-sm-2 control-label">password</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="Editpassword" name="Editpassword" placeholder="password">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Editpasadmin" class="col-sm-2 control-label">pasadmin</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="Editpasadmin" name="Editpasadmin" placeholder="pasadmin">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Editrol" class="col-sm-2 control-label">rol</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="Editrol" id="Editrol">
			      	<option value="">--Selecione una opcion--</option>
			      	<option value="Usuario">Usuario</option>
			      	<option value="Administrador">Administrador</option>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Editactive" class="col-sm-2 control-label">Activo</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="Editactive" id="Editactive">
			      	<option value="">--Selecione una opcion--</option>
			      	<option value="1">Activo</option>
			      	<option value="2">Inactivo</option>
			      </select>
			    </div>
			  </div>	
	      </div>
	      <div class="modal-footer editUsuModal">
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