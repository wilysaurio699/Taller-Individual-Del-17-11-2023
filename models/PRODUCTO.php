<?php
class Categoria extends Conectar {
    public function get_categoria() {
        $conectar = parent::Conexion();
        $sql = "SELECT * FROM `productos`";
        $stmt = $conectar->prepare($sql);
        $stmt->execute();
        return $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function eliminar_categoria($codProd) {
        $conectar = parent::Conexion();
        $sql = "DELETE FROM productos WHERE codProd = :id";
        $sql = $conectar->prepare($sql);
        $sql->bindParam(':id', $codProd, PDO::PARAM_INT);
        
        if ($sql->execute()) {
            return true; // Éxito al eliminar
        } else {
            return false; // Error al eliminar
        }
    }        
        public function get_categoria_post($codProd) {
            $conectar = parent::Conexion();
            $sql = "SELECT * FROM `productos` WHERE `codProd` = $codProd";
            $stmt = $conectar->prepare($sql);
            $stmt->bindParam(':codProd', $codProd, PDO::PARAM_INT);
            $stmt->execute();
            return $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function insertar_categoria($datos) {
            $conectar = parent::Conexion();
            $sql = "INSERT INTO productos (campo1, campo2, campo3) VALUES (:valor1, :valor2, :valor3)";
            $stmt = $conectar->prepare($sql);
    
            // Bind de los parámetros
            $stmt->bindParam(':valor1', $datos['campo1'], PDO::PARAM_STR);
            $stmt->bindParam(':valor2', $datos['campo2'], PDO::PARAM_STR);
            $stmt->bindParam(':valor3', $datos['campo3'], PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                return true; // Éxito al insertar
            } else {
                return false; // Error al insertar
            }
        }
    }

?>
