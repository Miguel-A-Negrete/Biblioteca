<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With');

include_once '../tablas/editoriales.php';
include_once '../Views/view.php';

$Editorial = new Editorial();
$api = $_SERVER['REQUEST_METHOD'];
$EditorialID = intval($_GET['EditorialID'] ?? '');

//obtiene uno o todas las editoriales de la DB
if ($api == 'GET') {
	if ($EditorialID != 0) {
		$data = $Editorial->get($EditorialID);
        View::returnJSON($data);
	} else {
		$data = $Editorial->get();
        View::returnJSON($data);
	}
}

//Agrega a una editorial a la DB
if ($api == 'POST') {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    if ($data !== null) {
        $Nombre = $data['Nombre'] ?? '';
        $Direccion = $data['Direccion'] ?? '';
        $Telefono = $data['Telefono'] ?? '';
        $Email = $data['Email'] ?? '';
        $SitioWeb = $data['SitioWeb'] ?? '';

        if ($Editorial->insert($Nombre, $Direccion, $Telefono, $Email, $SitioWeb)) {
            echo $Editorial->message('Editorial agregada de forma exitosa!', false);
        } else {
            echo $Editorial->message('No se pudo agregar a la editorial!', true);
        }
    } else {
      
        echo $Editorial->message('Error: JSON invalido', true);
    }
}


//actualizar los datos de la editorial en la DB
if ($api == 'PUT') {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    if ($data !== null) {
        $Nombre = $data['Nombre'] ?? '';
        $Direccion = $data['Direccion'] ?? '';
        $Telefono = $data['Telefono'] ?? '';
        $Email = $data['Email'] ?? '';
        $SitioWeb = $data['SitioWeb'] ?? '';

	if ($Editorial != null) {
		if ($Editorial->update($Nombre, $Direccion, $Telefono, $Email, $SitioWeb, $EditorialID)) {
			echo $Editorial->message('Editorial actualizada de forma exitosa!',false);
		} else {
			echo $Editorial->message('No se pudo actualizar la editorial!',true);
		}
	} else {
		echo $Editorial->message('Editorial no encontrado!',true);
	}
}
}


//eliminar editorial de la DB

if ($api == 'DELETE') {
	if ($EditorialID != null) {
		if ($Editorial->delete($EditorialID)) {
			echo $Editorial->message('Editorial eliminada de forma exitosa!', false);
		} else {
			echo $Editorial->message('No se pudo eliminar a la editorial!', true);
		}
	} else {
		echo $Editorial->message('Editorial no encontrado!', true); 
	}
}
