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
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Editar producto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body class="text-center"> 

<div class="container mt-5">
    <div class="row"> 
    <div class="col-md-3">
        <h3>Editar producto</h3>
        <form action="actualizar2.php" method="POST">
    <input type="text" class="form-control mb-3" name="id_producto" value="<?php echo $_GET['id']; ?>" readonly="">
    <input type="number" class="form-control mb-3" name="cantidad" value="<?php echo $rp->getCantidadAnterior($_GET['id']); ?>">
    <button class="w-100 btn btn-lg btn-primary" type="submit">Editar</button>	
      
      </form>
        </div>

        </body>
</html>