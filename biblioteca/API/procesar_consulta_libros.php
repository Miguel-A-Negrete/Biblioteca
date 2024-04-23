<?php
include_once '../tablas/libros.php';
include_once '../Views/view.php';

    $Libro = new Libro();
    $api = $_SERVER['REQUEST_METHOD'];
    $AutorID = intval($_GET['AutorID'] ?? '');

    if ($api == 'GET') {
        $data = $Libro->getJoin($AutorID);
        View::returnJSON($data);
    }
?>
