<?php
header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/PRODUCTO.php");
$categoria = new Categoria();