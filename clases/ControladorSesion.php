<?php 
require_once 'RepositorioUsuario.php';
require_once 'Usuario.php';

class ControladorSesion{

	protected $usuario = null;

	public function login($usuario, $clave){

		$r = new RepositorioUsuario();
		$usuario = $r->login($usuario, $clave);

		if ($usuario === false){
			return [false, "usuario o clave incorrecta"];
		}
		else {
			session_start();
			$_SESSION['usuario'] = serialize($usuario);
			return [true, "Ingreso correcto"];
		}
	}
}


 ?>