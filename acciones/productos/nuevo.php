<?php

require_once '../../acciones/productos/request/nuevoRequest.php';
require_once '../../acciones/productos/responses/nuevoResponse.php';
require_once '../../configuracion/database.php';
require_once '../../modelo/producto.php';

header('Content-Type: application/json');

$json = file_get_contents('php://input',true);
$req = json_decode($json);

$p = new Producto();

$p->Marca = $req->Marca;
$p->Descripcion = $req->Descripcion;
$p->Codigo = $req->Codigo;

$p->Agregar();

$resp = new NuevoResponse();
$resp->IsOk=true;

echo json_encode($resp);