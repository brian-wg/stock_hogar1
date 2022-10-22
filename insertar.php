<?php 

require_once 'clases/Usuario.php';
require_once 'clases/ControladorSesion.php';
require_once 'clases/Producto.php';
require_once 'clases/RepositorioUsuario.php';
require_once 'clases/RepositorioProducto.php';


session_start();
if (isset($_SESSION['usuario'])) {
    
    $usuario = unserialize($_SESSION['usuario']);

    $id = $usuario->getId();
    $rp = new RepositorioProducto();
    $productos = $rp->getProductos($usuario);

    


} else {
    
    header('Location: index.php');
}
?>

<div class="container mt-5">
    <div class="row"> 
    <div class="col-md-3">
        <h2>Agregar producto</h2>
        <form action="insertar2.php" method="POST">
    <input type="text" class="form-control mb-3" name="producto" placeholder="producto">
    <input type="text" class="form-control mb-3" name="marca" placeholder="marca">
    <input type="text" class="form-control mb-3" name="cantidad" placeholder="cantidad">
    <button class="w-100 btn btn-lg btn-primary" type="submit">Agregar</button>	
      </form>
        </div>