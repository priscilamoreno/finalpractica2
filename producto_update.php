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
	                    <div class="col-sm-8"><h2>Edición de Producto</h2></div>
	                    <div class="col-sm-4">
	                        <a href="productos.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
	                    </div>
	                </div>
	            </div>
	            <?php
					
					include ("includes/db.php");
					$producto = new Database();
					
					if(isset($_POST) && !empty($_POST)){
						include ("includes/upload.php");

						$nombre = $producto->sanitize($_POST['nombre']);
	                    $descripcion = $producto->sanitize($_POST['descripcion']);
						$precicosto = $producto->sanitize($_POST['preciocosto']);
						$precioventa = $producto->sanitize($_POST['precioventa']);
						$cantidad = $producto->sanitize($_POST['cantidad']);

						//Verifica si existe foto
						if (isset($dest_path)) {
							$foto = $dest_path;
						}else{
							$foto = "";
						}
											
						$res = $producto->update_producto($id, $nombre, $descripcion, $precicosto, $precioventa, $cantidad, $foto);
						if($res){
							$message= "Datos actualizados con éxito";
							$class="alert alert-success";
							
						}else{
							$message="No se pudieron actualizar los datos";
							$class="alert alert-danger";
						}
						
						?>
						<div class="<?php echo $class?>">
						  <?php echo $message;?>
						</div>	
							<?php
					}
					$datos=$producto->single_record_producto($id);
				?>
				<div class="row">
					<form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        	<div class="row">
								<div class="col-md-6">
									<label>Nombre:</label>
									<input type="text" name="nombre" id="nombre" class='form-control' required value="<?php echo $datos['nombre'];?>"></input>
								</div>
								<div class="col-md-6">
									<label>Descripcion:</label>
									<input type="text" name="descripcion" id="descripcion" class='form-control' required value="<?php echo $datos['descripcion'];?>"></input>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label>Precio Costo:</label>
									<input type="number" name="preciocosto" id="preciocosto" class='form-control' required value="<?php echo $datos['preciocosto'];?>"></input>
								</div>
								<div class="col-md-4">
									<label>Precio Venta:</label>
									<input type="text" name="precioventa" id="precioventa" class='form-control' required value="<?php echo $datos['precioventa'];?>"></input>
								</div>
								<div class="col-md-4">
									<label>Cantidad:</label>
									<input type="mail" name="cantidad" id="cantidad" class='form-control' required value="<?php echo $datos['cantidad'];?>"></input>
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
									<button type="submit" class="btn btn-success">Actualizar</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				
				<div class="row">
					<h2>Galería de Imágenes</h2>
				</div>

				<div id="gallery">
					<div style="OVERFLOW: auto; HEIGHT: 380px">
					<?php
						$directory = 'fotos';
						$allowed_types=array('jpg','jpeg','gif','png');
						$file_parts=array();
						$ext='';
						$title='';
						$i=0;

						$dir_handle = @opendir($directory) or die("Hay un error con el directorio de imágenes!");

						while ($file = readdir($dir_handle))
						{
							if($file=='.' || $file == '..') continue;

							$file_parts = explode('.',$file);
							$ext = strtolower(array_pop($file_parts));

							$title = implode('.',$file_parts);
							$title = htmlspecialchars($title);

							$nomargin='';

							if(in_array($ext,$allowed_types))
							{
								if(($i+1)%3==0) $nomargin='nomargin';

								echo '
								<div class="pic '.$nomargin.'" style="background:url('.$directory.'/'.$file.') no-repeat 50% 50%;">
								<a href="'.$directory.'/'.$file.'" title="'.$title.'" target="_blank">'.$title.'</a>
								</div>';

								$i++;
							}
						}
						closedir($dir_handle);

					?>
					</div>
				</div>
				<div class="clear"></div>
	        </div>
	    </div> 

    </main>     
<?php
	include("includes/footer.php");
?>    
