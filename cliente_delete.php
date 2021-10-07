<?php 
if (isset($_GET['id'])){
	include('includes/db.php');
	$lp = new Database();
	$id=intval($_GET['id']);
	$res = $lp->delete_cliente($id);
	if($res){
		header('location: clientes.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>