<?php
include_once "Producto.php";
include_once "RepositorioProducto.php";

$repo = new RepositorioProducto();

$prod = $repo->update("7", "12");

if($prod){
	echo "bien";
}
else{
	echo "mal";
}

?>