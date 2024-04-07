<?php
include_once '../conexion/Conexion.php';


	// Crea la clase libros
	class Database extends Config {
	  // Obtiene todos o un solo libro
      public function fetch($LibroID = 0) {
        $sql = 'SELECT * FROM libros';
        if ($LibroID != 0) {
            $sql .= ' WHERE LibroID = :LibroID';
        }
        $stmt = $this->conn->prepare($sql);
        if ($LibroID != 0) {
            $stmt->execute(['LibroID' => $LibroID]);
        } else {
            $stmt->execute(); 
        }
        $rows = $stmt->fetchAll();
        return $rows;
    }

	  // ingresa un libro a la database
	  public function insert($Titulo, $AutorID, $EditorialID, $GeneroID, $FechaPublicacion, $ISBN, $Precio, $CantidadStock, $Paginas, $Idioma) {
	    $sql = 'INSERT INTO libros (Titulo, AutorID, EditorialID, GeneroID, FechaPublicacion, ISBN, Precio, CantidadStock, Paginas, Idioma) VALUES (:Titulo, :AutorID, :EditorialID, :GneroID, :FechaPublicacion, :ISBN, :Precio, :CantidadStock, :Paginas, :Idioma)';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['Titulo' => $Titulo, 'AutorID' => $AutorID, 'EditorialID' => $EditorialID, 'GeneroID' => $GeneroID, 'FechaPublicacion' => $FechaPublicacion, 'ISBN' => $ISBN, 'Precio' => $Precio, 'CantidadStock' => $CantidadStock, 'Paginas' => $Paginas, 'Idioma' => $Idioma]);
	    return true;
	  }
	}

		  // actualiza los datos del libroautor
	  public function update($Titulo, $AutorID, $EditorialID, $GeneroID, $FechaPublicacion, $ISBN, $Precio, $CantidadStock, $Paginas, $Idioma, $LibroID) {
	    $sql = 'UPDATE libros SET Titulo = :Titulo, AutorID = :AutorID, EditorialID = :EditorialID, GeneroID = :GeneroID, FechaPublicacon = :FechaPublicacion, ISBN = :ISBN, Precio = :Precio, CantidadStock = :CantidadStock, Paginas = :Paginas, Idioma = :Idioma  WHERE LibroID = :LibroID';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['Titulo' => $Titulo, 'AutorID' => $AutorID, 'EditorialID' => $EditorialID, 'GeneroID' => $GeneroID, 'FechaPublicacion' => $FechaPublicacion, 'ISBN' => $ISBN, 'Precio' => $Precio, 'CantidadStock' => $CantidadStock, 'Paginas' => $Paginas, 'Idioma' => 'Idioma', 'LibroID' => $LibroID]);
	    return true;
	  }

	  // Elimina a un autor de la base de datos
	  public function delete($LibroID) {
	    $sql = 'DELETE FROM libros WHERE LibroID = :LibroID';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['LibroID' => $LibroID]);
	    return true;
	  }
	}

?>
