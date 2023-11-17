<?php
header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/PRODUCTO.php");
$categoria = new Categoria();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el código del producto desde POST
    $codProd = isset($_POST['codProd']) ? $_POST['codProd'] : null;

    // Verificar si el código del producto está presente
    if ($codProd !== null) {
        // Crear una instancia de la clase Categoria
        $categoria = new Categoria();

        // Obtener la categoría usando el código del producto
        $resultado = $categoria->get_categoria($codProd);

        // Devolver el resultado (puedes convertirlo a JSON si es necesario)
        echo json_encode($resultado);
    } else {
        // Código del producto no proporcionado
        echo json_encode(array('error' => 'Código del producto no proporcionado'));
    }
} else {
    // Método de solicitud no admitido
    echo json_encode(array('error' => 'Método de solicitud no admitido'));
}