<?php 
if (isset($_GET['id'])){
	include('includes/db.php');
	$lp = new Database();
	$id=intval($_GET['id']);
	$res = $lp->delete_producto($id);
	if($res){
		header('location:productos.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>