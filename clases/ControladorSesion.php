<?php 
require_once 'RepositorioUsuario.php';
require_once 'Usuario.php';

class ControladorSesion{

	protected $usuario = null;

	public function login($nombre_usuario, $clave){

		$r = new RepositorioUsuario();
		$usuario = $r->login($nombre_usuario, $clave);

		if ($usuario === false){
			return [false, "usuario o clave incorrecta"];
		}
		else {
			session_start();
			$_SESSION['usuario'] = serialize($usuario);
			return [true, "Ingreso correcto"];
		}
	}

	public function create($nombre_usuario, $nombre, $apellido, $clave, $email){

		$r = new RepositorioUsuario();
		$usuario = new Usuario($nombre_usuario, $nombre, $apellido, $email);
		$id = $r->save($usuario, $clave);
		if ($id ===false) {
			return [false, "No se pudo crear el usuario"];
		} 
		else {
			$usuario->setId($id);
			session_start();
			$_SESSION['usuario'] = serialize($usuario);
			return [true, "Usuario creado con exito!"];
		}
	}

	 public function modificar($nombre_usuario, $nombre, $apellido, $email, Usuario $usuario)
    {
        $repo = new RepositorioUsuario();
        // Actualizamos los datos del usuario con el método setDatos de la clase Usuario:
        $usuario->setDatos($nombre_usuario, $nombre, $apellido, $email);

        // Actualizadmos los valores en la BD, con el método actualizar del repositorio:
        if ($repo->actualizar($usuario)) {
            // Si se actualizó correctamente, actualizamos la variable de sesión
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            // y retornamos valor de éxito
            return [true, "Datos actualizados correctamente"];
        } else {
            // Si hubo error al actualizar, retornamos advertencia.
            return [false, "Error al actualizar datos"];
        }
    }
}


 ?>