<?php
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:index.php");
	}

	include("includes/header.php");
?>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
		<div class="container">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-8"><h2>Ventas</h2></div>
						<div class="col-sm-4">
							<a href="ventas.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
						</div>
					</div>
				</div>
				<?php
					include ("includes/db.php");
					$venta= new Database();

					if(isset($_POST) && !empty($_POST)){
						$id_venta = $venta->sanitize($_POST['id_venta']);
						$id_cliente = $venta->sanitize($_POST['idCliente']);
						$fecha = date($venta->sanitize($_POST['fecha']));
						$tipo = $venta->sanitize($_POST['tipo']);
						$id_formapago = $venta->sanitize($_POST['formapago']);
						$total = $venta->sanitize($_POST['total']);
						$observaciones = $venta->sanitize($_POST['observaciones']);

						$res = $venta->update_venta($id_venta, $id_cliente, $fecha, $tipo, $id_formapago, $total, $observaciones);
						if($res){
							$message= "venta actualizada con éxito";
							$class="alert alert-success";
						}else{
							$message="No se pudo actualizar la venta";
							$class="alert alert-danger";
						}
	
						echo "<div class='".$class."'>".$message."</div>";

					} else {
						$datos = $venta->single_record_venta($id);

						$id_venta = $datos['id_venta'];
						$id_cliente = $datos['id_cliente'];
						$fecha = $datos['fecha'];
						$tipo = $datos['proceso_venta'];
						$id_formapago = $datos['id_formaPago'];
						$total = $datos['monto'];
						$observaciones = $datos['observaciones'];
						$id_producto = 0;

						//Limpia tabla temproal de items
						$tmp = $venta->truncate_items();
					}
				?>
				<div class="row">
                <form enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Cliente: *</label><br>
								<?php 
									$venta= new Database();
									$tmp = $venta->clientes_select($id_cliente);
								?>
								<input type="hidden" id="id_venta" name="id_venta" value="<?php echo $id_venta ?>">
								<input type="hidden" id="cliente" name="cliente">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Fecha: *</label>
                                <input type="date" name="fecha" id="fecha" class='form-control' maxlength="250" value="<?php echo $fecha ?>" required ></input>
                            </div>
                            <div class="col-md-3">
                                <label>Tipo: *</label><br>
                                <select class="form-control" name="tipo" id="tipo" required>
                                    <option selected="selected" value="Minorista">Minorista</option>
                                    <option value="Mayorista">Mayorista</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Forma de Pago:</label>
                                <?php 
                                    $fpago = new Database();
                                    $tmp = $fpago->formapago_select($id_formapago);
                                ?>
                            </div>
                            <div class="col-md-3">
                                <label>Total:</label>
                                <input  type="number" name="total" id="total" class='form-control' value="<?php echo $total ?>" readonly></input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Productos</label>
                                <table width="100%" class="table table-bordered table-hover" id="grilla">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th></th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <input type="hidden" id="producto" name="producto">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary mr-2" onclick="agregarFila(n)">Agregar Producto</button>
                                    <button type="button" class="btn btn-danger" onclick="eliminarFila()">Eliminar Producto</button>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Observaciones:</label>
                                <input  type="text" name="observaciones" id="observaciones" class='form-control' value="<?php echo $observaciones ?>"></input>
                                <!--Campo oculto con la catidad de filas de la tabla-->
                                <input  type="hidden" name="nDetalles" id="nDetalles" class='form-control' ></input>
                            </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 pull-right">
                            <hr>
                                <button type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                        </div>
                    </div>
				</form>
			</div>
        </div>
    </div>     
	</main> 
	
	<script>
		jQuery(document).ready(function($){
			$(document).ready(function() {
				$('.mi-selector').select2();
			});
		});
		
		function actualizarCliente(sel){
			var cliente;
			cliente = sel.options[sel.selectedIndex].text;
			document.getElementById("cliente").value=cliente;
		}
		
		function actualizarProducto(sel,n){
			var cliente;
			var p_nombre;
			
			/*se un objeto request para la respuesta a la llamada de un archivo php*/
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					/*obtengo el precio del producto*/
					precio = this.responseText;
					/*contruyo el id de la celda a editar*/
					id_celda= "pu_p"+n;
					/*edito la celda con el precio obtenido*/
					document.getElementById(id_celda).value=precio;
				}
			};
			/*llamada a la archivo php de obtiene el precio de un producto por su ip*/
			xmlhttp.open("GET", "precio_producto.php?id="+sel.options[sel.selectedIndex].value, true);
			xmlhttp.send();
			
			/*se guarda en el campo input correspondiente; el nombre del producto seleccionado*/
			producto = sel.options[sel.selectedIndex].text;
			document.getElementById(p_nombre).value=producto;
		}
							
		function agregarFila(){
			var lista='';
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					lista = this.responseText;
					/*se agrega una fila a la tabla con los campos input con el correspondinte id, en función del contador de filas n*/
					document.getElementById("grilla").insertRow(-1).innerHTML = '<td>'+lista+'</td><td><input type="number" name="cant_p'+(n-1)+'" id="cant_p'+(n-1)+'" class="form-control" required></input></td><td><input type="number" id="pu_p'+(n-1)+'" name="pu_p'+(n-1)+'" class="form-control" required></input></td><td><input type="number" id="subtotal_p'+(n-1)+'" name="subtotal_p'+(n-1)+'" class="form-control" value="0"readonly required></input></td>';
				}
			};
			xmlhttp.open("GET", "listaProductos.php?n="+n, true);
			xmlhttp.send();
			
			/*se actualiza la variable global n que cuanta la cantidad de filas de la tabla*/
			n = n + 1;
			/*se guarda el valor del contador para poder utilizarlo al momento de impactar los detalles en la base de datos*/
			document.getElementById("nDetalles").value = n;
		}

		function eliminarFila(){
			var table = document.getElementById("grilla");
			var rowCount = table.rows.length;
			var tot=0;
		  
			if(rowCount <= 1)
				alert('No se puede eliminar el encabezado');
			else
				table.deleteRow(rowCount -1);
			/*se actualiza la variable global n que cuanta la cantidad de filas de la tabla*/
			n=n-1;
			/*se guarda el valor del contador para poder utilizarlo al momento de impactar los detalles en la base de datos*/
			document.getElementById("nDetalles").value = n;
			
		}
	</script>
<?php
	include("includes/footer.php");
?>