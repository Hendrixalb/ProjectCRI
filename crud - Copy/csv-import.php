<?php

$connect = mysql_connect('localhost','root','');
if (!$connect) {
die('Could not connect to MySQL: ' . mysql_error());
}

$cid =mysql_select_db('egresos',$connect);
// supply your database name

define('CSV_PATH','C:/wamp/www/csvfile/');
// path where your CSV file is located

$csv_file = CSV_PATH . "infotuts.csv"; // Name of your CSV file
$csvfile = fopen($csv_file, 'r');
$theData = fgets($csvfile);
$i = 0;
while (!feof($csvfile)) {
$csv_data[] = fgets($csvfile, 1024);
$csv_array = explode(",", $csv_data[$i]);
$insert_csv = array();
$insert_csv['ID'] = $csv_array[0];
$insert_csv['name'] = $csv_array[1];
$insert_csv['email'] = $csv_array[2];
$query = "INSERT INTO csvdata(ID,name,email)
VALUES('','".$insert_csv['name']."','".$insert_csv['email']."')";
$n=mysql_query($query, $connect );
$i++;
}
fclose($csvfile);

echo "File data successfully imported to database!!";
mysql_close($connect);
?>