<?php
	include_once '../conexion/Conexion.php';

	
	class Database extends Config {
	  // Obtiene todos o una sola editorial
      public function fetch($EditorialID = 0) {
        $sql = 'SELECT * FROM editoriales';
        if ($EditorialID != 0) {
            $sql .= ' WHERE EditorialID = :EditorialID';
        }
        $stmt = $this->conn->prepare($sql);
        if ($EditorialID != 0) {
            $stmt->execute(['EditorialID' => $EditorialID]);
        } else {
            $stmt->execute(); 
        }
        $rows = $stmt->fetchAll();
        return $rows;
    }

	  // ingresa una editorial a la database
	  public function insert($Nombre, $Direccion, $Telefono, $Email, $SitioWeb) {
	    $sql = 'INSERT INTO editoriales (Nombre, Direccion, Telefono, Email, SitioWeb) VALUES (:Nombre, :Direccion, :Telefono, :Email, :SitioWeb)';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['Nombre' => $Nombre, 'Direccion' => $Direccion, 'Telefono' => $Telefono, 'Email' => $Email, 'SitioWeb' => $SitioWeb]);
	    return true;
	  }

	  // actualiza los datos de la editorial
	  public function update($Nombre, $Direccion, $Telefono, $Email, $SitioWeb, $EditorialID) {
	    $sql = 'UPDATE editoriales SET Nombre = :Nombre, Direccion = :Direccion, Telefono = :Telefono, Email = :Email, SitioWeb = :SitioWeb  WHERE EditorialID = :EditorialID';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['Nombre' => $Nombre, 'Direccion' => $Direccion, 'Telefono' => $Telefono, 'Email' => $Email, 'SitioWeb' => $SitioWeb, 'EditorialID' => $EditorialID]);
	    return true;
	  }

	  // Elimina a una editorial de la base de datos
	  public function delete($EditorialID) {
	    $sql = 'DELETE FROM editoriales WHERE EditorialID = :EditorialID';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['EditorialID' => $EditorialID]);
	    return true;
	  }
	}

?>