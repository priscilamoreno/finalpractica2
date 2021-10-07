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
			$lp = new Database();
			$datos = $lp->single_record_producto($id);

			//var_dump($datos);
		?>
		<div class="container">
	        <div class="table-wrapper">
	            <div class="table-title">
	                <div class="row">
	                    <div class="col-sm-8"><h2>Detalle de Producto</h2></div>
	                    <div class="col-sm-4">
	                        <a href="productos.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
	                    </div>
	                </div>
	            </div>
				<div class="row">
				    <div class="col-md-3">
						<ul>
							<li><h5>Nombre:</h5></li>
							<li><h5>Descripción:</h5></li>
							<li><h5>Precio Costo:</h5></li>
							<li><h5>Precio Venta:</h5></li>
							<li><h5>Cantidad:</h5></li>
						</ul>
					</div>
					<div class="col-md-3">
						<ul class="bolder">
							<li class="no-point"><h5><?php echo $datos['nombre'];?></h5></li>
							<li class="no-point"><h5><?php echo $datos['descripcion'];?></h5></li>
							<li class="no-point"><h5><?php echo $datos['preciocosto'];?></h5></li>
							<li class="no-point"><h5><?php echo $datos['precioventa'];?></h5></li>
							<li class="no-point"><h5><?php echo $datos['cantidad'];?></h5></li>
						</ul>
					</div>
					 
					<div class="col-md-6">
						<h3>Fotografía</h3>
						<img src="<?php echo $datos['foto'];?>" width="500" alt="No se encontró foto del producto"/>
						
					</div>

				</div>
	        </div>
	    </div>     
    </main>     
<?php
	include("includes/footer.php");
?>