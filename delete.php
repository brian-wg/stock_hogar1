<?php
require_once 'clases/RepositorioProducto.php';
require_once 'clases/Producto.php';
require_once 'clases/controladorSesion.php';

session_start();
if (isset($_SESSION['usuario'])) {
    
    $usuario = unserialize($_SESSION['usuario']);
} else {
    
    header('Location: index.php');
}

$rp = new RepositorioProducto();

$id_producto = $_GET['id'];
 
 if ($rp->delete($id_producto)) {
 	 $redirigir = 'home.php?mensaje=Producto eliminado correctamente';
} else {
	$redirigir = 'home.php?mensaje=Error al eliminar';

}

header("Location: $redirigir");