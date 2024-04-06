<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Content-Type: application/json');

include_once '../tablas/autores.php';
$Autor = new Database();
$api = $_SERVER['REQUEST_METHOD'];
$AutorID = intval($_GET['AutorID'] ?? '');

//obtiene uno o todos los autores de la DB
if ($api == 'GET') {
	if ($AutorID != 0) {
		$data = $Autor->fetch($AutorID);
	} else {
		$data = $Autor->fetch();
	}
	echo json_encode($data);
}

//Agrega un autor a la DB
if ($api == 'POST') {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    if ($data !== null) {
        $Nombre = $data['Nombre'] ?? '';
        $Apellido = $data['Apellido'] ?? '';
        $Bio = $data['Bio'] ?? '';
        $FechaNacimiento = $data['FechaNacimiento'] ?? '';
        $Nacionalidad = $data['Nacionalidad'] ?? '';

        if ($Autor->insert($Nombre, $Apellido, $Bio, $FechaNacimiento, $Nacionalidad)) {
            echo $Autor->message('Autor agregado de forma exitosa!', false);
        } else {
            echo $Autor->message('No se pudo agregar al autor!', true);
        }
    } else {
      
        echo $Autor->message('Error: JSON invalido', true);
    }
}


//actualizar los datos del autor en la DB
if ($api == 'PUT') {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    if ($data !== null) {
        $Nombre = $data['Nombre'] ?? '';
        $Apellido = $data['Apellido'] ?? '';
        $Bio = $data['Bio'] ?? '';
        $FechaNacimiento = $data['FechaNacimiento'] ?? '';
        $Nacionalidad = $data['Nacionalidad'] ?? '';


	if ($Autor != null) {
		if ($Autor->update($Nombre, $Apellido, $Bio, $FechaNacimiento,$Nacionalidad, $AutorID)) {
			echo $Autor->message('Autor actualizado de forma exitosa!',false);
		} else {
			echo $Autor->message('No se pudo actualizar al autor!',true);
		}
	} else {
		echo $Autor->message('Autor no encontrado!',true);
	}
}
}


//eliminar Autor de la DB

if ($api == 'DELETE') {
	if ($AutorID != null) {
		if ($Autor->delete($AutorID)) {
			echo $Autor->message('Autor eliminado de forma exitosa!', false);
		} else {
			echo $Autor->message('No se pudo eliminar al Autor!', true);
		}
	} else {
		echo $Autor->message('Autor no encontrado!', true);
	}
}