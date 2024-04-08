<<<<<<< HEAD
<?php
	include_once '../conexion/Conexion.php';

	
	class Database extends Config {
	  // Obtiene todos o un solo genero
      public function fetch($GeneroID = 0) {
        $sql = 'SELECT * FROM generos';
        if ($GeneroID != 0) {
            $sql .= ' WHERE GeneroID = :GeneroID';
        }
        $stmt = $this->conn->prepare($sql);
        if ($GeneroID != 0) {
            $stmt->execute(['GeneroID' => $GeneroID]);
        } else {
            $stmt->execute(); 
        }
        $rows = $stmt->fetchAll();
        return $rows;
    }

	  // ingresa una genero a la database
	  public function insert($NombreGenero, $Descripcion, $Popularidad, $CantidadLibros, $FechaCreacion) {
	    $sql = 'INSERT INTO generos (NombreGenero, Descripcion, Popularidad, CantidadLibros, FechaCreacion) VALUES (:NombreGenero, :Descripcion, :Popularidad, :CantidadLibros, :FechaCreacion)';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['NombreGenero' => $NombreGenero, 'Descripcion' => $Descripcion, 'Popularidad' => $Popularidad, 'CantidadLibros' => $CantidadLibros, 'FechaCreacion' => $FechaCreacion]);
	    return true;
	  }

	  // actualiza los datos del genero
	  public function update($NombreGenero, $Descripcion, $Popularidad, $CantidadLibros, $FechaCreacion,$GeneroID) {
	    $sql = 'UPDATE generos SET NombreGenero = :NombreGenero, Descripcion = :Descripcion, Popularidad = :Popularidad, CantidadLibros   = :CantidadLibros, FechaCreacion = :FechaCreacion  WHERE GeneroID = :GeneroID';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['NombreGenero' => $NombreGenero, 'Descripcion' => $Descripcion, 'Popularidad' => $Popularidad, 'CantidadLibros' => $CantidadLibros, 'FechaCreacion' => $FechaCreacion, 'GeneroID' => $GeneroID]);
	    return true;
	  }

	  // Elimina a un genero de la base de datos
	  public function delete($GeneroID) {
	    $sql = 'DELETE FROM generos WHERE GeneroID = :GeneroID';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['GeneroID' => $GeneroID]);
	    return true;
	  }
	}

=======
<?php
	include_once '../conexion/Conexion.php';

	
	class Database extends Config {
	  // Obtiene todos o un solo genero
      public function fetch($generoID = 0) {
        $sql = 'SELECT * FROM generos';
        if ($generoID != 0) {
            $sql .= ' WHERE generoID = :generoID';
        }
        $stmt = $this->conn->prepare($sql);
        if ($generoID != 0) {
            $stmt->execute(['generoID' => $generoID]);
        } else {
            $stmt->execute(); 
        }
        $rows = $stmt->fetchAll();
        return $rows;
    }

	  // ingresa una genero a la database
	  public function insert($NombreGenero, $Descripcion, $Popularidad, $CantidadLibros, $FechaCreacion) {
	    $sql = 'INSERT INTO generos (NombreGenero, Descripcion, Popularidad, CantidadLibros, FechaCreacion) VALUES (:NombreGenero, :Descripcion, :Popularidad, :CantidadLibros, :FechaCreacion)';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['NombreGenero' => $NombreGenero, 'Descripcion' => $Descripcion, 'Popularidad' => $Popularidad, 'CantidadLibros' => $CantidadLibros, 'FechaCreacion' => $FechaCreacion]);
	    return true;
	  }

	  // actualiza los datos del genero
	  public function update($NombreGenero, $Descripcion, $Popularidad, $CantidadLibros, $FechaCreacion) {
	    $sql = 'UPDATE generos SET NombreGenero = :NombreGenero, Descripcion = :Descripcion, Popularidad = :Popularidad, CantidadLibros   = :CantidadLibros, FechaCreacion = :FechaCreacion  WHERE generoID = :generoID';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['NombreGenero' => $NombreGenero, 'Descripcion' => $Descripcion, 'Popularidad' => $Popularidad, 'CantidadLibros' => $CantidadLibros, 'FechaCreacion' => $FechaCreacion, 'generoID' => $generoID]);
	    return true;
	  }

	  // Elimina a un genero de la base de datos
	  public function delete($generoID) {
	    $sql = 'DELETE FROM generos WHERE generoID = :generoID';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['genero' => $generoID]);
	    return true;
	  }
	}

>>>>>>> e3dfb09ebd6423708bad939305cc99db30a24dde
?>