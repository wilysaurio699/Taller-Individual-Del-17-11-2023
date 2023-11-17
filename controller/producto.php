<?php
header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/PRODUCTO.php");
$categoria = new Categoria();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {
    case "GetAll":
        $datos = $categoria->get_categoria();
        echo json_encode($datos);
        break;
}


?>
