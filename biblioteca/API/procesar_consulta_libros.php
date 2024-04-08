<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$dbname = 'taller1';
$username = 'root';
$password = '';

// Obtener el ID del autor de los parámetros de la solicitud
$autor_id = isset($_GET['autor_id']) ? $_GET['autor_id'] : null;

try {
    // Conexión a la base de datos usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener los registros de libros relacionados con el autor
    $query = "SELECT autores.AutorID AS IdAutor, autores.Nombre AS NombreAutor, autores.Apellido AS ApellidoAutor, libros.Titulo, libros.FechaPublicacion, libros.ISBN
    FROM autores
    INNER JOIN libros ON autores.AutorID = libros.AutorID
    WHERE autores.AutorID = :autor_id;
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['autor_id' => $autor_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Devolver los resultados en formato JSON
    echo json_encode($result);
} catch (PDOException $e) {
    // Manejar errores de conexión o consulta
    echo json_encode(['error' => 'Error de conexión o consulta']);
}
?>
