<?php 


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
    public function getProductos($id_usuario)
    {
        $q = "SELECT id, producto, marca, cantidad FROM productos WHERE usuario = ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param('d', $usuario);

        if ($query->execute()){
            $query->bind_result($id, $producto, $marca, $cantidad);
            $lista_de_productos = [];
            while ($query->fetch()) {
                $lista_de_productos[] = new Producto($producto, $marca, $cantidad, $id);                
            }
            return $lista_de_productos;
        }
        return false;
        

    }


 public function agregar(Producto $p){
    
        // Preparamos la query del update
        $q = "INSERT INTO productos (producto, marca, cantidad) VALUES ?,?,?";        
        $query = self::$conexion->prepare($q);

        // Obtenemos los nuevos valores desde el objeto:
        $producto = $p->getProducto();
        $marca = $p->getMarca();    
        $cantidad = $p->getCantidad();
        $id = $p->getId();

        // Asignamos los valores para reemplazar los "?" en la query
        $query->bind_param("ssd", $producto, $marca, $cantidad);

        // Retornamos true si la query tiene éxito, false si fracasa
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
}


    /*public function saveProducto(Usuario $usuario, $clave){

        $q = "INSERT INTO productos (producto, marca, cantidad) WHERE usuario = ?";
        $q.= "VALUES (?, ?, ?)";
        $query = self::$conexion->prepare($q);
        $nombre_usuario = $usuario->getUsuario();
        $producto = $producto->getProducto();
        $marca = $marca->getMarca();
        $cantidad = $cantidad->getCantidad();   
            $query->bind_param("sssd",
            $nombre_usuario,
            $producto,
            $marca,
            $cantidad,
        );

        if ($query->execute()){
        Header("Location: Home.php");
        } 
    }

    public function updateProducto(Usuario $usuario, $clave){

        $q = "UPDATE productos SET (producto, marca, cantidad) WHERE usuario = ?";
        $q.= "VALUES (?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);
        $nombre_usuario = $usuario->getUsuario();
        $producto = $producto->getProducto();
        $marca = $marca->getMarca();
        $cantidad = $cantidad->getCantidad();   
            $query->bind_param("sssd",
            $nombre_usuario,
            $producto,
            $marca,
            $cantidad,
        );

        if ($query->execute()){
        Header("Location: Home.php");
        } 
    }*/

?>