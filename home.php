<?php 
session_start();
require_once 'clases/Usuario.php';
require_once 'clases/ControladorSesion.php';
require_once 'clases/Producto.php';
require_once 'clases/RepositorioUsuario.php';
require_once 'clases/RepositorioProducto.php';



if (isset($_SESSION['usuario'])) {
    
    $usuario = unserialize($_SESSION['usuario']);

    $id = $usuario->getId();
    $rp = new RepositorioProducto();
    $productos = $rp->getProductos($id);
    $nomApe = $usuario->getNombreApellido();
    
    //almacenar con variable el total de conteos de productos llamados por un metodo de rp
    //$productos_totales = $rp->totalProductosUsuario($id)

} else {
    
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Stock Hogar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <div class="container mt-2">
    <p align="right"><a href="logout.php">Cerrar sesión</a></p>
    </div>
    <body class="text-center">
     <h1 class="h3 mb-3 fw-normal" id="titulo">Bienvenido a Stock Hogar</h1><br> 
     <h4>Hola <?php echo $nomApe;?></h4>

    <div class="container mt-3">
    <div class="row"> 
    

            <div class="col-md-12">
                <table class="table" >
                    <thead class="table-success table-striped" >
                        <tr>
                            <th>id</th>
                            <th>producto</th>
                            <th>marca</th>
                            <th>cantidad</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

    <tbody>
<?php

// imprimo el total de los productos contados anteriormente almacenados
// echo "<h3>Total de productos de '".$usuario->getNomAp()."': ".$productos_totales."</h3>";

foreach ($productos as $p) {
    echo '<tr><td>'.$p->getId().'</td><td>'.$p->getProducto().'</td><td>'.$p->getMarca().'</td><td>'.$p->getCantidad().'</td>';
    echo '<td><a href="actualizar.php?id="'.$p->getId().'"';
    echo 'class="btn btn-info">Editar</a></th>';
    echo '<th><a href="delete.php?id="'.$p->getId().' class="btn btn-danger">Eliminar</a></th>';
}?>
</tr>

 </tbody>
    </table>
        </div>
        </div>  
        </div>
        <a  href="insertar.php" class="w-10 btn btn-lg btn-primary">Agregar producto</a>
    </body>
</html>