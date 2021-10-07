<?php
	/*id del prodcuto*/
	$id = $_REQUEST["id"];
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="priscila";
	
	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(mysqli_connect_error()){
		die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
	}
	/*consulta SQL para obtener el precio de un producto*/
	$sql = "CALL sp_productos_price(".$id.");";
	$res = mysqli_query($con, $sql);
	if ($res != ""){
		$tupla = mysqli_fetch_row($res);
		echo $tupla[0];
	}
?>