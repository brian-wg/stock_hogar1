<?php 

require_once 'Usuario.php';
require_once '.env.php';

class RepositorioProducto{

private static $conexion = null;

    public function __construct(){

        if (is_null(self::$conexion)) {
            $credenciales = credenciales();
            self::$conexion = new mysqli(
                $credenciales['servidor'],
                $credenciales['usuario'],
                $credenciales['clave'],
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


    /**
    * Retorna un array con todos los productos cuyo id_usuario es el parámetro recibido.
    * 
    * @param int $id_usuario El id del usuario para el cual queremos ver los productos.
    * 
    * @return Array Un array compuesto por objetos de tipo Producto, con todos los prodductos
    *               del usuario.
    */
    public function getProductos($id)
    {
        $q = "SELECT id_producto, producto, marca, cantidad FROM productos WHERE usuario_fk = ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param('d', $id);

        if ($query->execute()){
            $query->bind_result($id_producto, $producto, $marca, $cantidad);
            $lista_de_productos = [];
            while ($query->fetch()) {
                $lista_de_productos[] = new Producto($producto, $marca, $cantidad, $id_producto);                
            }
            return $lista_de_productos;
        }
        return false;
        

    }


 public function agregar(Producto $p, $usuario){
    
        // Preparamos la query del update
        $q = "INSERT INTO productos (producto, usuario_fk, marca, cantidad) VALUES (?, ?, ?,?)";        
        $query = self::$conexion->prepare($q);

        // Obtenemos los nuevos valores desde el objeto:
        $usuario_id = $usuario->getId();
        $producto = $p->getProducto();
        $marca = $p->getMarca();    
        $cantidad = $p->getCantidad();
        

        // Asignamos los valores para reemplazar los "?" en la query
        if(!$query->bind_param("sisi", $producto, $usuario_id, $marca, $cantidad)){
            echo "fallo la consulta";
        }

        // Retornamos true si la query tiene éxito, false si fracasa
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }




    public function update($cantidad, $id_producto){

        $q = "UPDATE productos SET cantidad = ? WHERE id_producto = ?";
        $query = self::$conexion->prepare($q);


        $query->bind_param('dd', $cantidad, $id);

        if ($query->execute()){
          return true;
        }
        else {
            return false;
        }
    

  }
}
