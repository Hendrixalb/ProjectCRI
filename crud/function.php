<?php
include("connect_db.php");
function insertar($id,$Carnet,$Nombres,$Apellidos,$Sexo,$Cod_ca,$Trab_gra,$Fecha_egre,$Fecha_grad,$active){
	$sentencia = "INSERT INTO estudiantes (id,Carnet,Nombres,Apellidos,Sexo,Cod_ca,Trab_gra,Fecha_egre,Fecha_grad,active) 
                   VALUES ($id,$Carnet,$Nombres,$Apellidos,$Sexo,$Cod_ca,$Trab_gra,$Fecha_egre,$Fecha_grad,$active)";
    $ejecutar = mysql_query($connect_db,$sentencia);
    return $ejecutar;
}

 ?>