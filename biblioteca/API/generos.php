<<<<<<< HEAD
<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Content-Type: application/json');

include_once '../tablas/generos.php';
$Genero = new Database();
$api = $_SERVER['REQUEST_METHOD'];
$GeneroID = intval($_GET['GeneroID'] ?? '');

//obtiene uno o todos los Genero de la DB
if ($api == 'GET') {
	if ($GeneroID != 0) {
		$data = $Genero->fetch($GeneroID);
	} else {
		$data = $Genero->fetch();
	}
	echo json_encode($data);
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
=======
<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Content-Type: application/json');

include_once '../tablas/generos.php';
$genero = new Database();
$api = $_SERVER['REQUEST_METHOD'];
$generoID = intval($_GET['GeneroID'] ?? '');

//obtiene uno o todos los Genero de la DB
if ($api == 'GET') {
	if ($generoID != 0) {
		$data = $genero->fetch($AutorID);
	} else {
		$data = $genero->fetch();
	}
	echo json_encode($data);
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

        if ($genero->insert($NombreGenero, $Descripcion, $Popularidad, $CantidadLibros, $FechaCreacion)) {
            echo $genero->message('Genero agregado de forma exitosa!', false);
        } else {
            echo $genero->message('No se pudo agregar al Genero!', true);
        }
    } else {
      
        echo $genero->message('Error: JSON invalido', true);
    }
}


//actualizar los datos del autor en la DB
if ($api == 'PUT') {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    if ($data !== null) {
        $NombreGenero = $data['NombreGenero'] ?? '';
        $Descipcion = $data['Descripcion'] ?? '';
        $Popularidad = $data['Popularidad'] ?? '';
        $CantidadLibros = $data['CantidadLibros'] ?? '';
        $FechaCreacion = $data['FechaCreacion'] ?? '';


	if ($genero != null) {
		if ($genero->update($NombreGenero, $Descripcion, $Popularidad, $CantidadLibros, $FechaCreacion, $GeneroID)) {
			echo $genero->message('Genero actualizado de forma exitosa!',false);
		} else {
			echo $genero->message('No se pudo actualizar el Genero!',true);
		}
	} else {
		echo $genero->message('Genero no encontrado!',true);
	}
}
}


//eliminar Genero de la DB

if ($api == 'DELETE') {
	if ($generoID != null) {
		if ($genero->delete($GeneroID)) {
			echo $genero->message('Genero eliminado de forma exitosa!', false);
		} else {
			echo $genero->message('No se pudo eliminar el Genero!', true);
		}
	} else {
		echo $genero->message('Genero no encontrado!', true);
	}
}
>>>>>>> e3dfb09ebd6423708bad939305cc99db30a24dde
