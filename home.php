<!-- Creación de la pantalla principal -->

<?php
require_once 'clases/Usuario.php';
sesion_strart();
if(isset($_SESSION['usuario'])){
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();
} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock del Hogar</title>
</head>

<body>
    <div>
        <h1>>> Stock Productos del Hogar <<</h1> 
    </div>

    <div>
        <h3>Hola <?php echo $nomApe;?><p>&#128516</p></h3>
    </div>


    <form action=".php" method="post">

        <label for="">Producto</label>
        <input name="producto"> <br><br>

        <label for="">Marca</label>
        <input name="marca"> <br><br>

        <label for="">Cantidad</label>
        <input type="number" name="cantidad" min="1"> <br><br>

    </form>

    <a href="">Consultar Stock</a>



    <p><a href="logout.php">Cerrar sesion</a></p>

</body>

</html>