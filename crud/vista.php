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
	<title>Sistema de control de estudiantes</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">

</head>
<body>
<?php 
include('menu1.php'); 
?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			<div class="col-md-1">
				<img width="100px" src="img/logou.png">
			</div>

			<div class="col-md-11">
				<center><h1 class="page-header">Sistema de Egresos de Alumnos <small> UNICAES-CRI</small> </h1> </center>
				<center><strong><label class="titulo">IMPORTAR REGISTROS DESDE ARCHIVO .CSV</label></strong></center>
    <p>
<<<<<<< HEAD
    	<?php 
    	if (isset($_POST["enviar"])){
    		require_once("connect_db.php");
    		
    		require_once("function.php");

    		$archivo = $_FILES["archivo"]["name"];
    		$archivo_copiado = ($_FILES["archivo"]["tmp_name"]);
    		$archivo_guardado = "Upload/".$archivo;

    		if (copy($archivo_copiado, $archivo_guardado)) {
    			echo "Se copio correctamente el archivo temporal a la carpeta de trabajo <br/>";
    		}else{
    			echo "Hubo un error <br/>";
    		}

    		if (file_exists($archivo_guardado)) {
    			$fp = fopen($archivo_guardado, "r");
    			$rows = 0;
    			while ($datos = fgetcsv($fp, 10000, ";")) {
    				$rows ++;
    				if ($rows > 1) {
    					$resultado = insertar($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9],$datos[10]);
    					if ($resultado) {
    						echo "Se insertaron correctamente los datos <br/>";
    					}else{
    						echo "No se insertaron los datos <br/>";
    					}
    				}
    			}
    		}else{
    			echo "No existe el archivo copiado <br/>";
    		}
    	}
    	 ?>
=======

>>>>>>> 6eec612dea7612398a3c135f0f90c79956803316
    	 <div class="formulario">
                <form id="upload_csv" method="post" enctype="multipart/form-data">  
                     <div class="col-md-3">  
                          <br />  
                          <label>Add More Data</label>  
                     </div>  
                     <div class="col-md-4">  
                          <input type="file" name="employee_file" style="margin-top:15px;" />  
                     </div>  
                     <div class="col-md-5">  
                          <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />  
                     </div>  
                     <div style="clear:both"></div>  
                </form> 
        </div>   
			</div>
<div class="col-md-12">
				<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	Nuevo
				</button>
</div>
<div class="col-md-12">
	<br>
</div>

				

				<div class="removeMessages"></div>

				<br /> <br /> <br />

				<table class="table table-hover" id="manageMemberTable">					
					<thead>
						<tr>
							<th width="1%">ID</th>
							<th width="1%">Carnet</th>													
							<th width="1%">Nombres</th>
							<th width="1%">Apellidos</th>
							<th width="1%">Sexo</th>
							<th width="1%">Codigo de Carrera</th>
							<th width="1%">Trabajo de Graduacion</th>
							<th width="1%">Egreso</th>
							<th width="1%">Graduacion</th>								
							<th width="1%">Activo</th>
							<th width="1%">Acciones</th>
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
			      <input type="text" class="form-control" id="Carnet" name="Carnet" required placeholder="Carnet">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="Nombres" class="col-sm-2 control-label">Nombres</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="Nombres" name="Nombres" required placeholder="Nombres">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Apellidos" class="col-sm-2 control-label">Apellidos</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="Apellidos" name="Apellidos" required placeholder="Apellidos">
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="Sexo" class="col-sm-2 control-label">Sexo</label>
			    <div class="col-sm-10"> 
			      <Select type="text" class="form-control" id="Sexo" name="Sexo" required placeholder="Sexo">
				<!-- here the text will apper  -->
					<option value="Masculino">Masculino</option>
					<option value="Femenino">Femenino</option>
				  </Select>
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="Cod_ca" class="col-sm-2 control-label">Codigo de carrera</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="Cod_ca" name="Cod_ca" required placeholder="Codigo de carrera">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="Trb_gra" class="col-sm-2 control-label">Trabajo de graduacion</label>
			    <div class="col-sm-10"> 
			      <input type="date" class="form-control" id="Trb_gra" name="Trb_gra"  placeholder="Trabajo de graduacion">
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
			      <select class="form-control" name="active" required id="active">
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
			    <label for="EditCarnet" class="col-sm-2 control-label">Carnet</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="EditCarnet" name="EditCarnet" required placeholder="Carnet">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="EditNombres" class="col-sm-2 control-label">Nombres</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="EditNombres" name="EditNombres" required placeholder="Nombres">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="EditApellidos" class="col-sm-2 control-label">Apellidos</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="EditApellidos" name="EditApellidos" required placeholder="Apellidos">
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="EditSexo" class="col-sm-2 control-label">Sexo</label>
			    <div class="col-sm-10"> 
			      <Select type="text" class="form-control" id="EditSexo" name="EditSexo" required placeholder="Sexo">
				<!-- here the text will apper  -->
					<option value="Masculino">Masculino</option>
					<option value="Femenino">Femenino</option>
				  </Select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="EditCod_ca" class="col-sm-2 control-label">Codigo de carrera</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="EditCod_ca" name="EditCod_ca" required placeholder="Codigo de carrera">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="EditTrb_gra" class="col-sm-2 control-label">Trabajo de graduacion</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="EditTrb_gra" name="EditTrb_gra" placeholder="Trabajo de graduacion">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="EditFecha_egre" class="col-sm-2 control-label">Egreso</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="EditFecha_egre" name="EditFecha_egre" placeholder="Egreso">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="EditFecha_grad" class="col-sm-2 control-label">Graduacion</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="EditFecha_grad" name="EditFecha_grad" placeholder="Graduacion">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Editactive" class="col-sm-2 control-label">Activo</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="Editactive" required id="Editactive">
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
	

<script type="text/javascript" src="custom/js/buttons.colVis.min.js"></script>


		
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css
"/>

<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>

   <script src="custom/js/buttons.dataTables.min.css"></script>
   <link rel="stylesheet" type="text/css" href="custom/js/buttons.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="custom/js/jquery.dataTables.min.css">
    <script src="custom/js/jquery.dataTables.min.css"></script>
    <script src="custom/js/vfs_fonts.js"></script>
    <script>  
      $(document).ready(function(){  
           $('#upload_csv').on("submit", function(e){  
                e.preventDefault(); //form will not submitted  
                $.ajax({  
                     url:"import.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                          if(data=='Error1')  
                          {  
                               alert("Invalid File");  
                          }  
                          else if(data == "Error2")  
                          {  
                               alert("Please Select File");  
                          }  
                          else  
                          {  
                               $('#employee_table').html(data);  
                          }  
                     }  
                })  
           });  
      });  
 </script>  
</body>
</html>