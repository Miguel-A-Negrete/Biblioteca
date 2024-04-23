<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With');

include_once '../tablas/libros.php';
include_once '../Views/view.php';

$Libro = new Libro();
$api = $_SERVER['REQUEST_METHOD'];
$LibroID = intval($_GET['LibroID'] ?? '');


//obtiene uno o todos los libros de la DB
if ($api == 'GET') {
    $data = $Libro->get($LibroID);
    View::returnJSON($data);
}


//Agrega un libro a la DB 
if ($api == 'POST') {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    if ($data !== null) {
        $Titulo = $data['Titulo'] ?? '';
        $AutorID = $data['AutorID'] ?? '';
        $EditorialID = $data['EditorialID'] ?? '';
        $GeneroID = $data['GeneroID'] ?? '';
        $FechaPublicacion = $data['FechaPublicacion'] ?? '';
        $ISBN = $data['ISBN'] ?? '';
        $Precio = $data['Precio'] ?? '';
        $CantidadStock = $data['CantidadStock'] ?? '';
        $Paginas = $data['Paginas'] ?? '';
        $Idioma = $data['Idioma'] ?? '';

        if ($Libro->insert($Titulo, $AutorID, $EditorialID, $GeneroID, $FechaPublicacion, $ISBN, $Precio, $CantidadStock, $Paginas, $Idioma)) {
            echo $Libro->message('Libro agregado de forma exitosa!', false);
        } else {
            echo $Libro->message('No se pudo agregar el libro!', true);
        }
    } else {
      
        echo $Libro->message('Error: JSON invalido', true);
    }
}


//actualizar los datos del libro en la DB
if ($api == 'PUT') {
	parse_str(file_get_contents('php://input'), $post_input);
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    if ($data !== null) {
        $Titulo = $data['Titulo'] ?? '';
        $AutorID = $data['AutorID'] ?? '';
        $EditorialID = $data['EditorialID'] ?? '';
        $GeneroID = $data['GeneroID'] ?? '';
        $FechaPublicacion = $data['FechaPublicacion'] ?? '';
        $ISBN = $data['ISBN'] ?? '';
        $Precio = $data['Precio'] ?? '';
        $CantidadStock = $data['CantidadStock'] ?? '';
        $Paginas = $data['Paginas'] ?? '';
        $Idioma = $data['Idioma'] ?? '';


	if ($Libro != null) {
		if ($Libro->update($Titulo, $AutorID, $EditorialID, $GeneroID , $FechaPublicacion, $ISBN, $Precio, $CantidadStock, $Paginas, $Idioma, $LibroID)) {
			echo $Libro->message('Libro actualizado de forma exitosa!',false);
		} else {
			echo $Libro->message('No se pudo actualizar el libro!',true);
		}
	} else {
		echo $Libro->message('Libro no encontrado!',true);
	}
}
}


//eliminar libro de la DB

if ($api == 'DELETE') {
	if ($LibroID != null) {
		if ($Libro->delete($LibroID)) {
			echo $Libro->message('Libro eliminado de forma exitosa!', false);
		} else {
			echo $Libro->message('No se pudo eliminar el libro!', true);
		}
	} else {
		echo $Libro->message('Libro no encontrado!', true);
	}


    
}
