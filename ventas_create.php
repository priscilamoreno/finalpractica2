<?php
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
						$id_cliente = $venta->sanitize($_POST['id_cliente']);
						$fecha = date($venta->sanitize($_POST['fecha']));
						$tipo = $venta->sanitize($_POST['tipo']);
						$forma_pago = $venta->sanitize($_POST['forma_pago']);
						$total = $venta->sanitize($_POST['total']);
						$observaciones = $venta->sanitize($_POST['observaciones']);

						//Determina si es item agregado o generación de venta
						$id_producto = $venta->sanitize($_POST['id_producto']);
						if($id_producto == 0){
							$res = $venta->create_ventas($id_cliente, $fecha, $tipo, $forma_pago, $total, $observaciones);

							//Redirecciona a pagina de grilla
							header("Location:ventas.php");

						} else {
							$id_producto = $venta->sanitize($_POST['id_producto']);
							$pr_unitario = $venta->sanitize($_POST['pr_unitario']);
							$cantidad = $venta->sanitize($_POST['cantidad']);
							$subtotal = $pr_unitario * $cantidad;

							$res = $venta->create_item($id_producto, $cantidad, $pr_unitario, $subtotal);
							$id_producto = 0;
						}

						//Calcula total factura
						$total = $venta->calc_total();

					} else {
						$id_cliente = 0;
						$fecha = date("Y-m-d");
						$tipo = 0;
						$forma_pago = "";
						$total = 0;
						$observaciones = "";
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
									<?php $tmp = $venta->clientes_select($id_cliente);?>
									<input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $id_cliente ?>">
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
										<option value="Minorista" <?php if($tipo == "Minorista") echo "selected" ?>>Minorista</option>
										<option value="Mayorista" <?php if($tipo == "Mayorista") echo "selected" ?>>Mayorista</option>
									</select>
								</div>
								<div class="col-md-3">
									<label>Forma de Pago:</label>
									<input type="text" name="forma_pago" id="forma_pago" class='form-control' value="<?php echo $forma_pago ?>"></input>
								</div>
								<div class="col-md-3">
									<label>Total:</label>
									<input  type="text" name="total" id="total" class='form-control' value="<?php echo $total ?>"></input>
								</div>
							</div>
						</div>

						<div class="form-group">
                        	<div class="row">
								<div class="col-md-12">
									<label>Observaciones:</label>
									<input  type="text" name="observaciones" id="observaciones" class='form-control' value="<?php echo $observaciones ?>"></input>
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
												<th>Cantidad</th>
												<th>Precio Unitario</th>
												<th>Subtotal</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody> 
											<?php 
											$ventas = new database();
											$listado=$ventas->temp_venta();
											
											while ($row=mysqli_fetch_object($listado)){
												$id=$row->id_producto;
												$producto=$row->producto;
												$cantidad=$row->cantidad;
												$precio_unitario=$row->precioUnitario;
												$subtotal=$row->Subtotal;
												?>
												<tr>
													<td><?php echo $producto;?></td>
													<td><?php echo $cantidad;?></td>
													<td><?php echo $precio_unitario;?></td>
													<td><?php echo $subtotal;?></td>
													<td>
														<a href="ventastmp_delete.php?id=<?php echo $id;?>" class="btn btn-danger" title="Eliminar">Eliminar</a>
													</td>
												</tr>	
											<?php
											}
											?>	
										</tbody>
									</table>
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label>Producto</label><br>
												<?php 
													$venta= new Database();
													$tmp = $venta->productos_select();
												?>
												<input type="hidden" id="id_producto" name="id_producto" value="<?php echo $id_producto ?>">
											</div>
											<div class="col-md-3">
												<label>Pr. Unitario</label>
												<input type="text" name="pr_unitario" id="pr_unitario" class='form-control' ></input>
											</div>
											<div class="col-md-3">
												<label>Cantidad:</label>
												<input  type="text" name="cantidad" id="cantidad" class='form-control' ></input>
											</div>
										</div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary">Agregar Item</button>
										<!--<button type="button" class="btn btn-primary mr-2" onclick="agregarItem()">Agregar Item</button>-->
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
                        	<div class="row">
								<div class="col-md-12 pull-right">
									<hr>
									<button type="submit" class="btn btn-success">Agregar</button>
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
			cliente = sel.options[sel.selectedIndex].value;
			console.log(cliente);
			document.getElementById("id_cliente").value=cliente;
		}
		
		function actualizarProducto(sel){
			var cliente;
			producto = sel.options[sel.selectedIndex].value;
			console.log(producto);
			document.getElementById("id_producto").value=producto;
		}
							
		function agregarItem(){
			//var url ="./grill.php?nempleados=";
			//var nempleados=document.getElementById("nempleados").value;
			//var url2 = url.concat(nempleados.toString());
			//window.open(url2, "Agregar empleado", "width=500");
			document.getElementById("grilla").insertRow(-1).innerHTML = '<td contenteditable="true"></td>&nbsp;<td contenteditable="true">&nbsp;</td><td contenteditable="true">&nbsp;</td><td contenteditable="true">&nbsp;</td>';
		}

		function eliminarFila(){
			var table = document.getElementById("grilla");
			var rowCount = table.rows.length;
			//console.log(rowCount);		  
			if(rowCount <= 1)
				alert('No se puede eliminar el encabezado');
			else
				table.deleteRow(rowCount -1);
		}
	</script>
<?php
	include("includes/footer.php");
?>