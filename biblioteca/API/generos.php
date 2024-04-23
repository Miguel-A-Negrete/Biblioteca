<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With');

include_once '../tablas/generos.php';
include_once '../Views/view.php';

$Genero = new Genero();
$api = $_SERVER['REQUEST_METHOD'];
$GeneroID = intval($_GET['GeneroID'] ?? '');

//obtiene uno o todos los Genero de la DB
if ($api == 'GET') {
	if ($GeneroID != 0) {
		$data = $Genero->get($GeneroID);
        View::returnJSON($data);
	} else {
		$data = $Genero->get();
        View::returnJSON($data);
	}
}

//Agrega un autor a la DB
if ($api == 'POST') {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    if ($data !== null) {
        $NombreGenero = $data['NombreGenero'] ?? '';
        $Descripcion = $data['Descripcion'] ?? '';
        $Popularidad = $data['Popularidad'] ?? '';
        $CantidadLibros = $data['CantidadLibros'] ?? '';
        $FechaCreacion = $data['FechaCreacion'] ?? '';

        if ($Genero->insert($NombreGenero, $Descripcion, $Popularidad, $CantidadLibros, $FechaCreacion)) {
            echo $Genero->message('Genero agregado de forma exitosa!', false);
        } else {
            echo $Genero->message('No se pudo agregar al Genero!', true);
        }
    } else {
      
        echo $Genero->message('Error: JSON invalido', true);
    }
}


//actualizar los datos del autor en la DB
if ($api == 'PUT') {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    if ($data !== null) {
        $NombreGenero = $data['NombreGenero'] ?? '';
        $Descripcion = $data['Descripcion'] ?? '';
        $Popularidad = $data['Popularidad'] ?? '';
        $CantidadLibros = $data['CantidadLibros'] ?? '';
        $FechaCreacion = $data['FechaCreacion'] ?? '';


	if ($Genero != null) {
		if ($Genero->update($NombreGenero, $Descripcion, $Popularidad, $CantidadLibros, $FechaCreacion, $GeneroID)) {
			echo $Genero->message('Genero actualizado de forma exitosa!',false);
		} else {
			echo $Genero->message('No se pudo actualizar el Genero!',true);
		}
	} else {
		echo $Genero->message('Genero no encontrado!',true);
	}
}
}


//eliminar Genero de la DB

if ($api == 'DELETE') {
	if ($GeneroID != null) {
		if ($Genero->delete($GeneroID)) {
			echo $Genero->message('Genero eliminado de forma exitosa!', false);
		} else {
			echo $Genero->message('No se pudo eliminar el Genero!', true);
		}
	} else{

        echo $Genero->message('Genero no encontrado!', true);
	}
}
