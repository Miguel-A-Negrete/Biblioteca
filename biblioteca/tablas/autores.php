<?php
require_once "../conexion/Conexion.php";
require_once "../index.php";
class autores{
    public static function getAll(){
        $db= new Conexion();
        $query = "SELECT * FROM autores";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows) {
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'AutorID'=>$row['AutorID'],
                    'Nombre'=>$row['Nombre'],
                    'Apellido'=>$row['Apellido'],
                    'Bio'=>$row['Bio'],
                    'FechaNacimiento'=>$row['FechaNacimiento'],
                    'Nacionalidad'=>$row['Nacionalidad']
                ];
            }//end while
            return $datos;
        }//end if
        return $datos;
    }//end getAll

    public static function getWhere($AutorID){
        $db= new Conexion();
        $query = "SELECT * FROM autores WHERE AutorID=$AutorID";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows) {
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'AutorID'=>$row['AutorID'],
                    'Nombre'=>$row['Nombre'],
                    'Apellido'=>$row['Apellido'],
                    'Bio'=>$row['Bio'],
                    'FechaNacimiento'=>$row['FechaNacimiento'],
                    'Nacionalidad'=>$row['Nacionalidad']
                ];
            }//end while
            return $datos;
        }//end if
        return $datos;
    }//end getWhere

    public static function insert($Nombre, $Apellido, $Bio, $FechaNacimiento, $Nacionalidad){
        $db = new Conexion();
        $query = "INSERT INTO autores (Nombre, Apellido, Bio, FechaNacimiento, Nacionalidad) 
        VALUES('".$Nombre."','".$Apellido."','".$Bio."','".$FechaNacimiento."','".$Nacionalidad."')";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;

        }return FALSE;//end if

    }//end insert

    public static function update ($AutorID,$Nombre, $Apellido, $Bio, $FechaNacimiento, $Nacionalidad){
        $db = new Conexion();
        $query = "UPDATE autores SET
        Nombre='".$Nombre."',Apellido='".$Apellido."',Bio='".$Bio."',FechaNacimiento='".$FechaNacimiento."',Nacionalidad='".$Nacionalidad."'
        WHERE AutorID=$AutorID";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;

        }return FALSE;//end if

    }//end insert

    public static function delete($AutorID){
        $db = new Conexion();
        $query = "DELETE FROM autores WHERE AutorID = $AutorID";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;
        }//end if
        return FALSE;

    }//end delete




}//end class autores