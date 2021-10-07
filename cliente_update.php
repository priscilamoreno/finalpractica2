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
						<div class="col-sm-8"><h2>Editar Cliente</h2></div>
						<div class="col-sm-4">
							<a href="clientes.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
						</div>
					</div>
				</div>
				<?php
					
					include ("includes/db.php");
					$cliente= new Database();
					
					if(isset($_POST) && !empty($_POST)){
						$nombre = $cliente->sanitize($_POST['nombre']);
						$direccion = $cliente->sanitize($_POST['direccion']);
						$dni = $cliente->sanitize($_POST['dni']);
						$telefono = $cliente->sanitize($_POST['telefono']);
						$email = $cliente->sanitize($_POST['email']);
						
						$res = $cliente->update_cliente($id,$nombre, $dni,$direccion,$telefono, $email);
						if($res){
							$message= "Datos de cliente actualizados con éxito";
							$class="alert alert-success";
							
						}else{
							$message="No se pudo actualizar cliente";
							$class="alert alert-danger";
						}
						
						?>
						<div class="<?php echo $class?>">
						<?php echo $message;?>
						</div>	
							<?php
					}
					$datos=$cliente->single_record_cliente($id);
				?>
				<div class="row">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label>Nombre: *</label>
									<input type="text" name="nombre" id="nombre" class='form-control' maxlength="250" required value="<?php echo $datos['nombre']?>"></input>
								</div>
								<div class="col-md-6">
									<label>Direccion: *</label>
									<input type="text" name="direccion" id="direccion" class='form-control' maxlength="250" required value="<?php echo $datos['direccion']?>"></input>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label>DNI: *</label>
									<input type="number" name="dni" id="dni" class='form-control' maxlength="250" required value="<?php echo $datos['dni']?>"></input>
								</div>					
								<div class="col-md-4">
									<label>Telefono: *</label>
									<input type="text" name="telefono" id="telefono" class='form-control' maxlength="250" required value="<?php echo $datos['telefono']?>"></input>
								</div>
								<div class="col-md-4">
									<label>Email: *</label>
									<input type="email" name="email" id="email" class='form-control' maxlength="250" required value="<?php echo $datos['email']?>"></input>
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
<?php
	include("includes/footer.php");
?>    
