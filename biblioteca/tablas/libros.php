<?php
include_once '../conexion/DB.php';


	// Crea la clase libro
	class Libro {
		private $tableName = 'libros';
		private $connect;
		private $LibroID;
		private $Titulo;
		private $AutorID;
		private $EditorialID;
		private $GeneroID;
		private $FechaPublicacion;
		private $ISBN;
		private $Precio;
		private $CantidadStock;
		private $Paginas;
		private $Idioma;
	
		public function __construct(){
			$this->connect = DB::getInstance();
		}
	  // Obtiene todos o un solo libro
	  public function get($LibroID = 0) {
        $sql = 'SELECT * FROM ' . $this->tableName;
        if ($LibroID != 0) {
            $sql .= ' WHERE LibroID = :LibroID';
        }
        $stmt = $this->connect->prepare($sql);
        if ($LibroID != 0) {
            $stmt->execute(['LibroID' => $LibroID]);
        } else {
            $stmt->execute(); 
        }
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

	public function getJoin($AutorID = 0){
		$sql = "SELECT autores.AutorID AS IdAutor, autores.Nombre AS NombreAutor, autores.Apellido AS ApellidoAutor, {$this->tableName}.Titulo, {$this->tableName}.FechaPublicacion, {$this->tableName}.ISBN
		FROM {$this->tableName}
		INNER JOIN autores ON autores.AutorID = {$this->tableName}.AutorID
		WHERE autores.AutorID = :AutorID;
		";
        $stmt = $this->connect->prepare($sql);
        if ($AutorID != 0) {
            $stmt->execute(['AutorID' => $AutorID]);
        } else {
            echo 'Debe especificar un id de autor';
        }
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
	}

	  // ingresa un libro a la database
	  public function insert($Titulo, $AutorID, $EditorialID, $GeneroID, $FechaPublicacion, $ISBN, $Precio, $CantidadStock, $Paginas, $Idioma) {
	    $sql = 'INSERT INTO ' . $this->tableName . '(Titulo, AutorID, EditorialID, GeneroID, FechaPublicacion, ISBN, Precio, CantidadStock, Paginas, Idioma) VALUES (:Titulo, :AutorID, :EditorialID, :GeneroID, :FechaPublicacion, :ISBN, :Precio, :CantidadStock, :Paginas, :Idioma)';
	    $stmt = $this->connect->prepare($sql);
	    $stmt->execute(['Titulo' => $Titulo, 'AutorID' => $AutorID, 'EditorialID' => $EditorialID, 'GeneroID' => $GeneroID, 'FechaPublicacion' => $FechaPublicacion, 'ISBN' => $ISBN, 'Precio' => $Precio, 'CantidadStock' => $CantidadStock, 'Paginas' => $Paginas, 'Idioma' => $Idioma]);
	    return true;
	  }

		  // actualiza los datos del libroautor
	  public function update($Titulo, $AutorID, $EditorialID, $GeneroID, $FechaPublicacion, $ISBN, $Precio, $CantidadStock, $Paginas, $Idioma, $LibroID) {
	    $sql = 'UPDATE ' . $this->tableName . ' SET Titulo = :Titulo, AutorID = :AutorID, EditorialID = :EditorialID, GeneroID = :GeneroID, FechaPublicacion = :FechaPublicacion, ISBN = :ISBN, Precio = :Precio, CantidadStock = :CantidadStock, Paginas = :Paginas, Idioma = :Idioma  WHERE LibroID = :LibroID';
	    $stmt = $this->connect->prepare($sql);
	    $stmt->execute(['Titulo' => $Titulo, 'AutorID' => $AutorID, 'EditorialID' => $EditorialID, 'GeneroID' => $GeneroID, 'FechaPublicacion' => $FechaPublicacion, 'ISBN' => $ISBN, 'Precio' => $Precio, 'CantidadStock' => $CantidadStock, 'Paginas' => $Paginas, 'Idioma' => $Idioma, 'LibroID' => $LibroID]);
	    return true;
	  }

	  // Elimina a un autor de la base de datos
	  public function delete($LibroID) {
	    $sql = 'DELETE FROM ' . $this->tableName . ' WHERE LibroID = :LibroID';
	    $stmt = $this->connect->prepare($sql);
	    $stmt->execute(['LibroID' => $LibroID]);
	    return true;
	  }


	
	}

?>
