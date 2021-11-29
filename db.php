<?php
	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="priscila";
		
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}

		public function sanitize($variable){
			$res = mysqli_real_escape_string($this->con, $variable);
			return $res;
		}

		public function lastId(){
			return mysqli_insert_id($this->con);
		}

		/*
		CLIENTES
		*/
		public function create_cliente($nombre, $dni, $direccion, $telefono, $email){
			$sql="INSERT INTO `cliente` (`id_cliente`, `nombre`, `dni`, `direccion`, `telefono`, `email`) VALUES (NULL, '" . $nombre . "', '" . $dni . "', '" . $direccion . "', '" .  $telefono . "', '" .  $email . "')";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function read_cliente(){
			$sql = "SELECT * FROM cliente";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record_cliente($id){
			$sql = "SELECT * FROM cliente WHERE id_cliente='" . $id . "'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res);
			return $return;
		}
		
		public function update_cliente($id, $nombre, $dni, $direccion, $telefono, $email){
			$sql = "UPDATE cliente SET nombre = '". $nombre . "', dni = '" . $dni . "', direccion = '" . $direccion . "', telefono = '". $telefono . "', email = '" . $email . "' WHERE id_cliente = " . $id;
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function delete_cliente($id){
			$sql = "DELETE FROM `cliente` WHERE `cliente`.`id_cliente` = " . $id;
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function clientes_select($id_cliente){
			$sql = "CALL sp_clientes_select();";
			$res = mysqli_query($this->con, $sql);
			if ($res != ""){
				echo "<select class='form-control' name=\"idCliente\" id=\"idCliente\" onchange=\"actualizarCliente(this)\">";
				echo "\t<option value=\"0\">". "Seleccione un Cliente"	 ."\n";
					while ($tupla = mysqli_fetch_row($res)){
						if($tupla[0] == $id_cliente){
							echo "\t<option value=\"$tupla[0]\" selected>". $tupla[1] ."\n";
						} else {
							echo "\t<option value=\"$tupla[0]\">". $tupla[1] ."\n";
						}						
					}
						
				echo "</select>\n";
				return true;
			}else{
				return false;
			}
		}

		/*
		PRODUCTOS
		*/
		public function create_producto($nombre, $descripcion, $preciocosto, $precioventa, $cantidad, $foto){
			$sql = "CALL sp_productos_insert('".$nombre."', '".$descripcion."', ".$preciocosto.", ".$precioventa.", ".$cantidad.", '".$foto."');";

			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function read_productos(){
			$sql = "CALL sp_productos_list();";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record_producto($id){
			$sql = "CALL sp_productos_get(". $id .");";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res);
			return $return;
		}
		
		public function update_producto($id, $nombre, $descripcion, $preciocosto, $precioventa, $cantidad, $foto){
			$sql = "CALL sp_productos_edit(". $id . ", '". $nombre . "', '". $descripcion . "', ". $preciocosto . ", ". $precioventa . ", ". $cantidad . ", '". $foto . "');";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
	
		public function delete_producto($id){
			$sql = "CALL sp_productos_delete(". $id .");";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function productos_select(){
			$sql = "CALL sp_productos_select();";
			$res = mysqli_query($this->con, $sql);
			if ($res != ""){
				echo "<select class='form-control' name=\"idProducto\" id=\"idProducto\" onchange=\"actualizarProducto(this)\">";
				echo "\t<option value=\"0\">". "Seleccione un Producto"	 ."\n";
					while ($tupla = mysqli_fetch_row($res)){
						echo "\t<option value=\"$tupla[0]\">". $tupla[1] ."\n";
					}	
				echo "</select>\n";
				return true;
			}else{
				return false;
			}
		}


		/*
		VENTAS
		*/
		public function formapago_select($id_forma_pago){
			$sql = "SELECT * FROM formapago;";
			$res = mysqli_query($this->con, $sql);
			if ($res != ""){
				echo "<select class='form-control' name=\"formapago\" id=\"formapago\">";
				while ($tupla = mysqli_fetch_row($res)){
					if($tupla[0] == $id_forma_pago){
						echo "\t<option value=\"$tupla[0]\" selected>". $tupla[1] ."\n";
					} else {
						echo "\t<option value=\"$tupla[0]\">". $tupla[1] ."\n";
					}						
				}
				echo "</select>\n";
				return true;
			}else{
				return false;
			}
		}
		public function create_ventas($id_cliente, $fecha, $tipo, $forma_pago, $total, $observaciones){
			$sql = "CALL sp_ventas_insert(".$id_cliente.", '".$fecha."', '".$tipo."', ".$forma_pago.", ".$total.", '".$observaciones."');";

			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function create_item($id_producto, $cantidad, $pr_unitario, $subtotal){
			$sql = "CALL sp_tmpventas_insert(".$id_producto.", ".$cantidad.", ".$pr_unitario.", ".$subtotal.");";

			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function truncate_items(){
			$sql = "TRUNCATE TABLE tmpventas;";

			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function read_venta(){
			$sql = "CALL sp_ventas_list();";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function temp_venta(){
			$sql = "CALL sp_ventas_temp();";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function calc_total(){
			$sql = "SELECT SUM(Subtotal) AS Total FROM tmpventas;";
			$res = mysqli_query($this->con, $sql);
			$row = mysqli_fetch_array($res);

			return $row['Total'];
		}
		
		public function single_record_venta($id){
			$sql = "CALL sp_ventas_get(". $id .");";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res);
			return $return;
		}

		public function detallesventa($id){
			$sql = "CALL sp_detallesventas_list(". $id .");";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function update_venta($id_venta, $id_cliente, $fecha, $tipo, $forma_pago, $total, $observaciones){
			$sql = "CALL sp_ventas_edit(".$id_venta.", ".$id_cliente.", '".$fecha."', '".$tipo."', ".$forma_pago.", ".$total.", '".$observaciones."');";

			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function delete_venta($id){
			$sql = "CALL sp_ventas_delete(". $id .");";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		


			
	}
?>