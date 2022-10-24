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


if (!empty($_POST['id_producto'])
    && !empty($_POST['cantidad'])
) {
   $rp = new RepositorioProducto();
 }
    
    if ($rp->update($_POST['id_producto'], $_POST['cantidad'])) { 
    $redirigir = 'home.php?mensaje='.$result[1];
} else {
    $mensaje = "No fue posible modificar el producto.";
    $redirigir = "home.php?mensaje=$mensaje";
    
}
header("Location: $redirigir");