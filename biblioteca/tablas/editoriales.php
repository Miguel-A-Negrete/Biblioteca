<?php
	include_once '../conexion/DB.php';

	
	class Editorial {
		private $tableName = 'editoriales';
		private $connect;
		private $EditorialID;
		private $Nombre;
		private $Direccion;
		private $Telefono;
		private $Email;
		private $SitioWeb;
	
		public function __construct(){
			$this->connect = DB::getInstance();
		}
	  // Obtiene todos o una sola editorial
      public function get($EditorialID = 0) {
        $sql = 'SELECT * FROM ' . $this->tableName;
        if ($EditorialID != 0) {
            $sql .= ' WHERE EditorialID = :EditorialID';
        }
        $stmt = $this->connect->prepare($sql);
        if ($EditorialID != 0) {
            $stmt->execute(['EditorialID' => $EditorialID]);
        } else {
            $stmt->execute(); 
        }
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

	  // ingresa una editorial a la database
	  public function insert($Nombre, $Direccion, $Telefono, $Email, $SitioWeb) {
	    $sql = 'INSERT INTO ' . $this->tableName . '(Nombre, Direccion, Telefono, Email, SitioWeb) VALUES (:Nombre, :Direccion, :Telefono, :Email, :SitioWeb)';
	    $stmt = $this->connect->prepare($sql);
	    $stmt->execute(['Nombre' => $Nombre, 'Direccion' => $Direccion, 'Telefono' => $Telefono, 'Email' => $Email, 'SitioWeb' => $SitioWeb]);
	    return true;
	  }

	  // actualiza los datos de la editorial
	  public function update($Nombre, $Direccion, $Telefono, $Email, $SitioWeb, $EditorialID) {
	    $sql = 'UPDATE ' . $this->tableName . ' SET Nombre = :Nombre, Direccion = :Direccion, Telefono = :Telefono, Email = :Email, SitioWeb = :SitioWeb  WHERE EditorialID = :EditorialID';
	    $stmt = $this->connect->prepare($sql);
	    $stmt->execute(['Nombre' => $Nombre, 'Direccion' => $Direccion, 'Telefono' => $Telefono, 'Email' => $Email, 'SitioWeb' => $SitioWeb, 'EditorialID' => $EditorialID]);
	    return true;
	  }

	  // Elimina a una editorial de la base de datos
	  public function delete($EditorialID) {
	    $sql = 'DELETE FROM ' . $this->tableName . ' WHERE EditorialID = :EditorialID';
	    $stmt = $this->connect->prepare($sql);
	    $stmt->execute(['EditorialID' => $EditorialID]);
	    return true;
	  }
	}

?>
