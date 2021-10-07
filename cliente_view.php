<?php
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:index.php");
	}

	include("includes/header.php");
?>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
		<?php
			include ("includes/db.php");
			$lp= new Database();
			$datos=$lp->single_record_cliente($id);

			//var_dump($datos);
		?>
		<div class="container">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-8"><h2>Ver Cliente</h2></div>
						<div class="col-sm-4">
							<a href="clientes.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label>Nombre:</label>
						<input type="text" name="nombre" id="nombre" class='form-control' required value="<?php echo $datos['nombre'];?>" disabled></input>
					</div>
					<div class="col-md-6">
						<label>Direccion:</label>
						<input type="text" name="direccion" id="direccion" class='form-control' required value="<?php echo $datos['direccion'];?>" disabled></input>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label>DNI:</label>
						<input type="number" name="dni" id="dni" class='form-control' required value="<?php echo $datos['dni'];?>" disabled></input>
					</div>
					<div class="col-md-4">
						<label>Telefono:</label>
						<input type="text" name="telefono" id="telefono" class='form-control' required value="<?php echo $datos['telefono'];?>" disabled></input>
					</div>
					<div class="col-md-4">
						<label>Email:</label>
						<input type="mail" name="email" id="email" class='form-control' required value="<?php echo $datos['email'];?>" disabled></input>
					</div>
				</div>
			</div>
		</div> 
	</main>     
<?php
	include("includes/footer.php");
?>