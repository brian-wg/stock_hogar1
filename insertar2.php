<?php
session_start();
require_once 'clases/RepositorioProducto.php';
require_once 'clases/Producto.php';


$rp = new RepositorioProducto();

$producto = $_POST['producto'];
$marca = $_POST['marca'];
$cantidad = $_POST['cantidad'];


$p = new Producto($producto,$marca, $cantidad);
$usuario = unserialize($_SESSION['usuario']);

if($rp->agregar($p, $usuario)) {
    $redirigir = 'home.php?mensaje=Producto agregado';
} else {
	$redirigir = 'home.php?mensaje=Error al agregar';
	
}
header('Location: '.$redirigir);
