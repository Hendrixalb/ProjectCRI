<?php

require_once("conexion.php");

	$ruta = 'Upload/';	

	foreach ($_FILES as $key) {

		$nombre=$key["name"];
		$ruta_temporal=$key["tmp_name"];		
		
		$fecha=getdate();
		$nombre_v=$fecha["mday"]."-".$fecha["mon"]."-".$fecha["year"]."_".$fecha["hours"]."-".$fecha["minutes"]."-".$fecha["seconds"].".csv";		

		$destino=$ruta.$nombre_v;
		$explo=explode(".",$nombre);


		if($explo[1] != "csv"){
			$alert=1;
		}else{

			if(move_uploaded_file($ruta_temporal, $destino)){
				$alert=2;
			}

		}

	}

	$x=0;
	$data=array();
	$fichero=fopen($destino, "r");

	while(($datos= fgetcsv($fichero,1000)) != FALSE){

		$x++;
		if($x>1){

			$data[]='('.$datos[0].',"'.$datos[1].'","'.$datos[2].'","'.$datos[3].'",'.$datos[4].')';

		}

	}

	$inserta="insert into importar values ". implode(",", $data);
	mysql_query($inserta);
	fclose($fichero);


?>