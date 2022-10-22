<?php
require_once 'clases/RepositorioProducto.php';
require_once '.env.php';
require_once 'clases/Producto.php';

$rp = new RepositorioProducto();

$producto = $_POST['producto'];
$marca = $_POST['marca'];
$cantidad = $_POST['cantidad'];


$p = new Producto($producto,$marca, $cantidad);

$agregar = $rp->agregar($p);

if($agregar) {
    $redirigir = 'home.php?mensaje=Producto agregado';
} else {
	$redirigir = 'home.php?mensaje=Error al agregar';
	
}
header('Location: '.$redirigir);
