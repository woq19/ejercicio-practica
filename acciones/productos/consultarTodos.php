<?php

require_once '../../acciones/productos/responses/consultarTodosResponse.php';
require_once '../../configuracion/database.php';
require_once '../../modelo/producto.php';

header('Content-Type: application/json');

$json = file_get_contents('php://input',true);
$req = json_decode($json);

$resp = new ConsultarTodosResponse();

$resp->ListProductos=Producto::BuscarTodas();

$cp=0;

foreach ($resp->ListProductos as $lp) {
    $cp=$cp+1;
}

$resp->CantidadProductos=$cp;

echo json_encode($resp);