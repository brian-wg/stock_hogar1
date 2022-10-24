<?php 

class Usuario{

	protected $id;
	protected $usuario;
	protected $nombre;
	protected $apellido;
	protected $email;

	public function __construct ($nombre_usuario, $nombre, $apellido, $email, $id = null){

		$this->id = $id;
		$this->nombre_usuario = $nombre_usuario;
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
    	return $this->nombre_usuario;
    }
    public function getNombre() {
    	return $this->nombre;
    }
    public function getApellido() {
    	return $this->apellido;
    }
    public function getEmail() {
    	return $this->email;
    }
    public function getNombreApellido(){
    	return $this->nombre." ".$this->apellido;
    }

    public function __toString(){
        return "Obj usuario";
    }
}


 ?>