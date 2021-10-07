<?php
	/*n es la cantidad de filas de la tabla de detalles y se utiliza para contruir el id de los elementos de la lista select*/
	$n = $_REQUEST["n"];
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="priscila";
	
	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(mysqli_connect_error()){
		die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
	}
	/*consulta SQL para recuerar los datos de producto*/
	$sql = "CALL sp_productos_select();";
	$res = mysqli_query($con, $sql);
	if ($res != ""){
		echo "<select class=\"form-control\" name=\"idProducto".$n."\" id=\"idProducto".$n."\" onchange=\"actualizarProducto(this,".$n.")\">";
		echo "\t<option value=\"0\">". "Seleccione un Producto"	 ."\n";
		while ($tupla = mysqli_fetch_row($res))
			echo "\t<option value=\"$tupla[0]\">". $tupla[1] ."</option>";
		echo "</select>\n";
	}
	/*en este campo se guardara el nombre del producto seleccionado en la lista select*/
	echo "<td><input type=\"hidden\" id=\"producto".$n."\" name=\"producto".$n."\"></input></td>";
?>