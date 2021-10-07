<?php
	include("includes/header.php");
?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      	<div class="container">
	        <div class="table-wrapper">
	        	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<div class="col-sm-8"><h2>Lista de Productos</h2></div>
		            <div class="col-sm-4">
		                <a href="producto_create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Producto</a>
		            </div>
		      	</div>

	            <table class="table table-bordered">
	                <thead>
	                    <tr>
	                        <th>Nombre</th>
	                        <th>Descripcion</th>
	                        <th>Precio Costo</th>
							<th>Precio Venta</th>
							<th>Cantidad</th>
	                        <th>Acciones</th>
	                    </tr>
	                </thead>
	                 
	                <tbody> 
						<?php 
						include ('includes/db.php');
						$lp = new Database();
						$listado=$lp->read_productos();
						 
						while ($row=mysqli_fetch_object($listado)){
							$id=$row->id_producto;
							$nombre=$row->nombre;
							$descripcion=$row->descripcion;
							$preciocosto=$row->preciocosto;
							$precioventa=$row->precioventa;
							$cantidad=$row->cantidad;
							?>
							<tr>
								<td><?php echo $nombre;?></td>
								<td><?php echo $descripcion;?></td>
								<td><?php echo $preciocosto;?></td>
								<td><?php echo $precioventa;?></td>
								<td><?php echo $cantidad;?></td>
								<td>
									<a href="producto_update.php?id=<?php echo $id;?>" class="btn btn-primary" title="Editar" data-toggle="tooltip">Editar</a>
									<a href="producto_view.php?id=<?php echo $id;?>" class="btn btn-success title="Ver" data-toggle="tooltip">Ver</a>
									<a href="producto_delete.php?id=<?php echo $id;?>" class="btn btn-danger" title="Eliminar">Eliminar</a>
								</td>
							</tr>	
							<?php
						}
						?>
	                          
	                </tbody>
            	</table>
	        </div>
	    </div>  
    </main>

<?php
	include("includes/footer.php");
?>
			