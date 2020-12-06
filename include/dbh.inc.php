<?php
/*conectarea la baza de date*/
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "skilly";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
if(!$conn)
	{
		echo 'Aplicatia nu se poate conecta la baza de date';
		exit();
	}
?>