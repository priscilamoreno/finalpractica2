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
							<a href="ventas_create_2.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Venta</a>
						</div>
					</div>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>Cliente</th>
							<th>Tipo</th>
							<th>Forma Pago</th>
							<th>Monto</th>
							<th>Acciones</th>
						</tr>
					</thead>
					
					<tbody> 
						<?php 
						include ('includes/db.php');
						$ventas = new database();
						$listado=$ventas->read_venta();
						
						while ($row=mysqli_fetch_object($listado)){
							$id = $row->id_venta;
							$fecha = $row->fecha;
							$cliente = $row->cliente;
							$tipo = $row->proceso_venta;
							$formapago = $row->formapago;							
							$monto=$row->monto;							
						?>
							<tr>
								<td><?php echo $fecha;?></td>
								<td><?php echo $cliente;?></td>
								<td><?php echo $tipo;?></td>
								<td><?php echo $formapago;?></td>
								<td><?php echo $monto;?></td>
								<td>
									<a href="ventas_update.php?id=<?php echo $id;?>" class="btn btn-primary" title="Editar" data-toggle="tooltip">Editar</a>
									<a href="ventas_view.php?id=<?php echo $id;?>" class="btn btn-success" title="Ver" data-toggle="tooltip">Ver</a>
									<a href="ventas_delete.php?id=<?php echo $id;?>" class="btn btn-danger" title="Eliminar">Eliminar</a>
								</td>
							</tr>	
						<?php } ?>	
					</tbody>
				</table>
			</div>
		</div>     
	</main>

<?php
	include("includes/footer.php");
?>