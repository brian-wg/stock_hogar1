<?php 

class Producto{

	protected $producto;
	protected $marca;
	protected $cantidad;
	

	public function __construct ($producto, $marca, $cantidad, $id=null){

		$this->producto = $producto;
		$this->marca = $marca;
		$this->cantidad = $cantidad;
        $this->id= $id;
		
	}

	public function getProducto() {
		return $this->producto;
	}
    public function getMarca() {
    	return $this->marca;
    }
    public function getCantidad() {
    	return $this->cantidad;
    }
    public function getId(){
        return $this->id;
    }



     public function setDatos($cantidad)
    {

        $this->cantidad = $cantidad;
    }
    
}


 ?>