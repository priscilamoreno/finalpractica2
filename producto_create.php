<?php
	include("includes/header.php");
?>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	    <div class="container">
	        <div class="table-wrapper">
	            <div class="table-title">
	                <div class="row">
	                    <div class="col-sm-8"><h2>Agregar Producto</h2></div>
	                    <div class="col-sm-4">
	                        <a href="productos.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
	                    </div>
	                </div>
	            </div>
	            <?php
					include ("includes/db.php");
					$producto= new Database();
					if(isset($_POST) && !empty($_POST)){
						include ("includes/upload.php");

						//Grabar en base de datos
						$nombre = $producto->sanitize($_POST['nombre']);
						$descripcion = $producto->sanitize($_POST['descripcion']);
						$preciocosto = $producto->sanitize($_POST['preciocosto']);
						$precioventa = $producto->sanitize($_POST['precioventa']);
						$cantidad = $producto->sanitize($_POST['cantidad']);
						$foto = $dest_path;

						$res = $producto->create_producto($nombre, $descripcion, $preciocosto, $precioventa, $cantidad, $foto);
						//echo $res;

						if($res){
							$message= "Datos insertados con éxito";
							$class="alert alert-success";
						}else{
							$message="No se pudieron insertar los datos";
							$class="alert alert-danger";
						}
						
				?>
				<div class="<?php echo $class?>">
					<?php echo $message;?>
				</div>	
				<?php
					}
		
				?>
				<div class="row">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
                        	<div class="row">
								<div class="col-md-6">
									<label>Nombre: *</label>
									<input type="text" name="nombre" id="nombre" class='form-control' maxlength="250" required ></input>
								</div>
								<div class="col-md-6">
									<label>Descripcion: *</label>
									<input type="text" name="descripcion" id="descripcion" class='form-control' maxlength="250" required ></input>
								</div>
							</div>
						</div>
						<div class="form-group">
                        	<div class="row">
								<div class="col-md-4">
									<label>Precio Costo: *</label>
									<input type="number" name="preciocosto" id="preciocosto" class='form-control' maxlength="250" required ></input>
								</div>
								<div class="col-md-4">
									<label>Precio Venta: *</label>
									<input type="text" name="precioventa" id="precioventa" class='form-control' maxlength="250" required ></input>
								</div>
								<div class="col-md-4">
									<label>Cantidad: *</label>
									<input type="text" name="cantidad" id="cantidad" class='form-control' maxlength="250" required ></input>
								</div>
							</div>
						</div>
						<div class="form-group">
                        	<div class="row">
								<div class="col-md-12">
									<label>Foto Producto:</label>
									<input type="file" name="foto" id="foto"/>
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
<?php
	include("includes/footer.php");
?>