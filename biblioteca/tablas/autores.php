<?php
	include_once '../conexion/Conexion.php';

	// Crea la clase autores
	class Database extends Config {
	  // Obtiene todos o un solo autor
      public function fetch($AutorID = 0) {
        $sql = 'SELECT * FROM autores';
        if ($AutorID != 0) {
            $sql .= ' WHERE AutorID = :AutorID';
        }
        $stmt = $this->conn->prepare($sql);
        if ($AutorID != 0) {
            $stmt->execute(['AutorID' => $AutorID]);
        } else {
            $stmt->execute(); 
        }
        $rows = $stmt->fetchAll();
        return $rows;
    }

	  // ingresa una autor a la database
	  public function insert($Nombre, $Apellido, $Bio, $FechaNacimiento, $Nacionalidad) {
	    $sql = 'INSERT INTO autores (Nombre, Apellido, Bio, FechaNacimiento, Nacionalidad) VALUES (:Nombre, :Apellido, :Bio, :FechaNacimiento, :Nacionalidad)';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['Nombre' => $Nombre, 'Apellido' => $Apellido, 'Bio' => $Bio, 'FechaNacimiento' => $FechaNacimiento, 'Nacionalidad' => $Nacionalidad]);
	    return true;
	  }

	  // actualiza los datos del autor
	  public function update($Nombre, $Apellido, $Bio,$FechaNacimiento,$Nacionalidad, $AutorID) {
	    $sql = 'UPDATE autores SET Nombre = :Nombre, Apellido = :Apellido, Bio = :Bio, FechaNacimiento = :FechaNacimiento, Nacionalidad = :Nacionalidad  WHERE AutorID = :AutorID';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['Nombre' => $Nombre, 'Apellido' => $Apellido, 'Bio' => $Bio, 'FechaNacimiento' => $FechaNacimiento, 'Nacionalidad' => $Nacionalidad, 'AutorID' => $AutorID]);
	    return true;
	  }

	  // Elimina a un autor de la base de datos
	  public function delete($AutorID) {
	    $sql = 'DELETE FROM autores WHERE AutorID = :AutorID';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['AutorID' => $AutorID]);
	    return true;
	  }
	}

?>