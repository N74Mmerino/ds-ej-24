<?php

header('Content-Type: application/json');

require_once 'modelosRespuestas/agregarRespuesta.php';
require_once 'modelosRequest/agregarRequest.php';
require_once '../../modelo/direccion.php';
require_once '../../modelo/titular.php';

//se obtiene el body
$json = file_get_contents('php://input',true);
// Convertir el body en un objeto
$req = json_decode($json);

$resp= new AgregarRespuesta();

$resp->IsOk=true;


if($req->Titular->Direccion== null){
    $resp->IsOk=false;
    $resp->Mensaje.='la dirección es obligatoria';

}
if($req->Titular->NroDocumento == null ){
    $resp->IsOk=false;
    $resp->Mensaje.='el numero de documento es obligatorio.';

}
if ($req->Titular->ApellidoNombre == null) {
    $resp->IsOk=false;
    $resp->Mensaje.='el nombre y apellido es obligatorio';
}
if ($resp->IsOk == true) {
    $resp->Mensaje='Titular agregado correctamente';
}



echo json_encode ($resp);