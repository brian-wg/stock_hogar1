<?php 
require_once '.env.php'
require_once 'Usuario.php';

class RepositorioUsuario{

	private static $conexion = null;

	public fucntion __construct(){

		if (is_null(self::$conexion)) {
			$credenciales = credenciales();
			self::$conexion = new mysqli(
				$credenciales['usuario'],
				$credenciales['clave'],
				$credenciales['servidor'],
				$credenciales['base_de_datos']
			);
			if (self::$conexion->connect_error){
				$error = 'Error al conectar:' . self::$conexion->connect_error;
				self::$connexion = null;
				die($error);
			}
			self::$conexion->set_charset('utf8mb4');
		}
	}

	public function login($usuario, $clave){

		$q = "SELECT id , clave, nombre, apellido FROM usuarios WHERE usuario = ?";
		$query = self::$conexion->prepare($q);
		$query->bind_param('s', $usuario);

		if ($query->execute()){
			$query->bind_result($id, $clave_encriptada, $nombre, $apellido, $email);
			if ($query->fetch()) {
				if (password_verify($clave, $clave_encriptada)){
				return new Usuario($usuario, $nombre, $apellido, $email, $id)	
				}
			}
		}
		return false;
	}
}

 ?>