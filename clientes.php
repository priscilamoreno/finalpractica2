<?php
	include("includes/header.php");
?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      	<div class="container">
	        <div class="table-wrapper">
	        	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<div class="col-sm-8"><h2>Lista de Clientes</h2></div>
		            <div class="col-sm-4">
		                <a href="cliente_create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Cliente</a>
		            </div>
		      	</div>

	            <table class="table table-bordered">
	                <thead>
	                    <tr>
							<th>Nombre</th>
							<th>DNI</th>
							<th>Direccion</th>
							<th>Telefono</th>
							<th>Email</th>
							<th>Acciones</th>
	                    </tr>
	                </thead>
	                 
	                <tbody> 
						<?php 
						include ('includes/db.php');
						$lp = new Database();
						$listado=$lp->read_cliente();
						 
						while ($row=mysqli_fetch_object($listado)){
							$id=$row->id_cliente;
							$nombre=$row->nombre;
							$dni=$row->dni;
							$direccion=$row->direccion;
							$telefono=$row->telefono;
							$email=$row->email;
							
							?>
							<tr>
								<td><?php echo $nombre;?></td>
								<td><?php echo $dni;?></td>
								<td><?php echo $direccion;?></td>
								<td><?php echo $telefono;?></td>
								<td><?php echo $email;?></td>
								<td>
									<a href="cliente_update.php?id=<?php echo $id;?>" class="btn btn-primary" title="Editar" data-toggle="tooltip">Editar</a>
									<a href="cliente_view.php?id=<?php echo $id;?>" class="btn btn-success title="Ver" data-toggle="tooltip">Ver</a>
									<a href="cliente_delete.php?id=<?php echo $id;?>" class="btn btn-danger" title="Eliminar">Eliminar</a>
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
			