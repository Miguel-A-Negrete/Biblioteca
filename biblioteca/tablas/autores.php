<?php
	include_once '../conexion/DB.php';

	class Autor{
		private $tableName = 'autores';
		private $connect;
		private $AutorID;
		private $Nombre;
		private $Apellido;
		private $Bio;
		private $FechaNacimiento;
		private $Nacionalidad;
	
		public function __construct(){
			$this->connect = DB::getInstance();
		}
	
		//Seleccionar autores
		public function get($AutorID = 0){
			$sql = 'SELECT * FROM ' . $this->tableName;
			if ($AutorID != 0) {
				$sql .= ' WHERE AutorID = :AutorID';
			}
			$stmt = $this->connect->prepare($sql);
			if ($AutorID != 0) {
				$stmt->execute(['AutorID' => $AutorID]);
			} else {
				$stmt->execute(); 
			}
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $rows;
		}

		//Insertar autores
		public function insert($Nombre, $Apellido, $Bio, $FechaNacimiento, $Nacionalidad) {
			$sql = 'INSERT INTO ' . $this->tableName . '(Nombre, Apellido, Bio, FechaNacimiento, Nacionalidad) VALUES (:Nombre, :Apellido, :Bio, :FechaNacimiento, :Nacionalidad)';
			$stmt = $this->connect->prepare($sql);
			$stmt->execute(['Nombre' => $Nombre, 'Apellido' => $Apellido, 'Bio' => $Bio, 'FechaNacimiento' => $FechaNacimiento, 'Nacionalidad' => $Nacionalidad]);
			return true;
		  }

		  //Actualizar autores
		  public function update($Nombre, $Apellido, $Bio,$FechaNacimiento,$Nacionalidad, $AutorID) {
			$sql = 'UPDATE ' . $this->tableName . ' SET Nombre = :Nombre, Apellido = :Apellido, Bio = :Bio, FechaNacimiento = :FechaNacimiento, Nacionalidad = :Nacionalidad  WHERE AutorID = :AutorID';
			$stmt = $this->connect->prepare($sql);
			$stmt->execute(['Nombre' => $Nombre, 'Apellido' => $Apellido, 'Bio' => $Bio, 'FechaNacimiento' => $FechaNacimiento, 'Nacionalidad' => $Nacionalidad, 'AutorID' => $AutorID]);
			return true;
		  }
	
		  // Eliminar autores
		  public function delete($AutorID) {
			$sql = 'DELETE FROM ' . $this->tableName . ' WHERE AutorID = :AutorID';
			$stmt = $this->connect->prepare($sql);
			$stmt->execute(['AutorID' => $AutorID]);
			return true;
		  }
	}

?>
