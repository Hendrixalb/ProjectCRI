<?php
 
//conexiones, conexiones everywhere
ini_set('display_errors', 1);
error_reporting(E_ALL);
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
 
$database = 'egresos';
$table = 'upload';
if (!@mysql_connect($db_host, $db_user, $db_pass))
    die("No se pudo establecer conexión a la base de datos");
 
if (!@mysql_select_db($database))
    die("base de datos no existe");
    if(isset($_POST['submit']))
    {
        //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['sel_file']['name'];
         echo 'Cargando nombre del archivo: '.$fname.' <br>';
         $chk_ext = explode(".",$fname);
 
         if(strtolower(end($chk_ext)) == "csv")
         {
             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");
 
             while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
             {
               //Insertamos los datos con los valores...
                $sql = "INSERT into TABLA(CAMPOS SEPARADOS POR COMAS) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]',...)";
                mysql_query($sql) or die('Error: '.mysql_error());
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
             echo "Importación exitosa!";
         }
         else
         {
            //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             
//ver si esta separado por " , "
             echo "Archivo invalido!";
         }
    }
 
?>