<?php
/*
* iTech Empires:  How to Import Data from CSV File to MySQL Using PHP Script
* Version: 1.0.0
* Page: Import.PHP
*/

// Database Connection
require 'db_connection.php';

$message = "";
if (isset($_POST['submit'])) {
    $allowed = array('csv');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        // show error message
        $message = 'Invalid file type, please use .CSV file!';
    } else {

        move_uploaded_file($_FILES["file"]["tmp_name"], "files/" . $_FILES['file']['name']);

        $file = "files/" . $_FILES['file']['name'];

        $query = <<<eof
        LOAD DATA LOCAL INFILE '$file'
         INTO TABLE estudiantes
         FIELDS TERMINATED BY ','
         LINES TERMINATED BY '\n'
         IGNORE 1 LINES
        (Carnet,Nombres,Apellidos,Sexo,Cod_ca,Trb_gra,Fecha_egre,Fecha_grad)
eof;
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
        $message = "CSV file successfully imported!";
    }
}

// View records from the table
$users = '<table class="table table-bordered">
<tr>
    <th>No</th>
    <th>Carnet</th>
    <th>Nombres</th>
	 <th>Apellidos</th>
    <th>Sexo</th>
	<th>codigo</th>
	<th>trabajo Gra</th>
	<th>Fecha Egre</th>
	<th>Fecha gra</th>
	</tr>
';
$query = "SELECT * FROM estudiantes";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}
if (mysqli_num_rows($result) > 0) {
    $number = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $users .= '<tr>
            <td>' . $number . '</td>
            <td>' . $row['Carnet'] . '</td>
            <td>' . $row['Nombres'] . '</td>
            <td>' . $row['Apellidos'] . '</td>
			 <td>' . $row['Sexo'] . '</td>
			  <td>' . $row['Cod_ca'] . '</td>
            <td>' . $row['Trb_gra'] . '</td>
            <td>' . $row['Fecha_egre'] . '</td>
			 <td>' . $row['Fecha_grad'] . '</td>
        </tr>';
        $number++;
    }
} else {
    $users .= '<tr>
        <td colspan="4">Records not found!</td>
        </tr>';
}
$users .= '</table>';
?>
<!doctype html>
<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Import Data from CSV File to MySQL Tutorial</title>
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
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
<div  class="container">
    <h2 align="center">
    <br>
        INGRESO DE USUARIOS MASIVOS EGRESOS-UNICAESCRI
    </h2>
    <br><br>

    <div class="row">
    <div class="col-md-offset-0"> 
        <div class="col-md-12 col-md-offset-0">
            <form enctype="multipart/form-data" method="post" action="importar.php">
                <div class="form-group">
                    <label align="center" for="file">Selección de Archivo CSV</label >
                    <input  name="file" type="file" class="form-control">
                </div>
                <div class="form-group">
                    <?php echo $message; ?>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit" onclick="" />
                </div>
            </form>
            <div class="form-group">
                <?php echo $users; ?>
            </div>
        </div>
    </div>
    </div>
</div>
</body>
</html>
