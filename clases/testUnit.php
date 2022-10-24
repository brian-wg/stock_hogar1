<?php
include_once "Producto.php";
include_once "RepositorioUsuario.php";

$repo = new RepositorioUsuario();

$usuario = $repo->login("b2", "1234");

if($usuario){
	echo $usuario->getId();
}
else{
	echo $usuario;	
}

?>