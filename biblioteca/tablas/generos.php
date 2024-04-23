<?php
	include_once '../conexion/DB.php';

	
	class Genero {
		private $tableName = 'generos';
		private $connect;
		private $GeneroID;
		private $NombreGenero;
		private $Descripcion;
		private $Popularidad;
		private $CantidadLibros;
		private $FechaCreacion;
	
		public function __construct(){
			$this->connect = DB::getInstance();
		}
	  // Obtiene todos o un solo genero
      public function get($GeneroID = 0) {
        $sql = 'SELECT * FROM ' . $this->tableName;
        if ($GeneroID != 0) {
            $sql .= ' WHERE GeneroID = :GeneroID';
        }
        $stmt = $this->connect->prepare($sql);
        if ($GeneroID != 0) {
            $stmt->execute(['GeneroID' => $GeneroID]);
        } else {
            $stmt->execute(); 
        }
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

	  // ingresa una genero a la database
	  public function insert($NombreGenero, $Descripcion, $Popularidad, $CantidadLibros, $FechaCreacion) {
	    $sql = 'INSERT INTO ' . $this->tableName . '(NombreGenero, Descripcion, Popularidad, CantidadLibros, FechaCreacion) VALUES (:NombreGenero, :Descripcion, :Popularidad, :CantidadLibros, :FechaCreacion)';
	    $stmt = $this->connect->prepare($sql);
	    $stmt->execute(['NombreGenero' => $NombreGenero, 'Descripcion' => $Descripcion, 'Popularidad' => $Popularidad, 'CantidadLibros' => $CantidadLibros, 'FechaCreacion' => $FechaCreacion]);
	    return true;
	  }

	  // actualiza los datos del genero
	  public function update($NombreGenero, $Descripcion, $Popularidad, $CantidadLibros, $FechaCreacion,$GeneroID) {
	    $sql = 'UPDATE ' . $this->tableName . ' SET NombreGenero = :NombreGenero, Descripcion = :Descripcion, Popularidad = :Popularidad, CantidadLibros   = :CantidadLibros, FechaCreacion = :FechaCreacion  WHERE GeneroID = :GeneroID';
	    $stmt = $this->connect->prepare($sql);
	    $stmt->execute(['NombreGenero' => $NombreGenero, 'Descripcion' => $Descripcion, 'Popularidad' => $Popularidad, 'CantidadLibros' => $CantidadLibros, 'FechaCreacion' => $FechaCreacion, 'GeneroID' => $GeneroID]);
	    return true;
	  }

	  // Elimina a un genero de la base de datos
	  public function delete($GeneroID) {
	    $sql = 'DELETE FROM ' . $this->tableName . ' WHERE GeneroID = :GeneroID';
	    $stmt = $this->connect->prepare($sql);
	    $stmt->execute(['GeneroID' => $GeneroID]);
	    return true;
	  }
	}

