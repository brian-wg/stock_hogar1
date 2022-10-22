<?php

require_once 'clases/Productos.php';
require_once 'clases/ControladorSesion.php';


session_start();
if (isset($_SESSION['usuario'])) {
    
    $usuario = unserialize($_SESSION['usuario']);
} else {

    header('Location: index.php');
}

if (
    !empty($_POST['usuario'])
    && !empty($_POST['producto'])
    && !empty($_POST['marca'])
    && !empty($_POST['cantidad'])
) {
    $cs = new ControladorSesion();

    $result = $cs->modificar(
       
        $_POST['producto'],
        $_POST['marca'],
        $_POST['cantidad'],
        $usuario
    );

    $redirigir = 'home.php?mensaje='.$result[1];
} else {
    $mensaje = "No fue posible modificar tus datos.";
    $redirigir = "home.php?mensaje=$mensaje";

}
header("Location: $redirigir");