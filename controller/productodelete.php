<?php
header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/PRODUCTO.php");
$categoria = new Categoria();

$body = json_decode(file_get_contents("php://input"), true);
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if (isset($_GET['codProd'])) {
        $id_usuario = $_GET['codProd'];

        $categoria = new Categoria();
        $resultado = $categoria->eliminar_categoria($id_usuario);

        if ($resultado) {
            echo json_encode(array('mensaje' => 'Categoría eliminada con éxito'));
        } else {
            echo json_encode(array('mensaje' => 'Error al eliminar la categoría'));
        }
    } else {
        echo json_encode(array('mensaje' => 'ID de usuario no proporcionado'));
    }
} else {
    echo json_encode(array('mensaje' => 'Método no permitido'));
    
}
