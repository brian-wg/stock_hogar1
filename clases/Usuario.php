<?php 

class Usuario{

	protected $id;
	protected $usuario;
	protected $nombre;
	protected $apellido;
	protected $email;

	public function __construct ($usuario, $nombre, $apellido, $email, $id){

		$this->id = $id;
		$this->usuario = $usuario;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->email = $email;
	}

	public function getId() {
		return $this->id;
	}
    public function setId($id) {
    	$this->id = $id;
    }
    public function getUsuario() {
    	return $this->usuario;
    }
    public function getNombre() {
    	return $this->nombre;
    }
    public function getApellido() {
    	return $this->apellido;
    }
    public function email() {
    	return $this->email;
    }
}


 ?>