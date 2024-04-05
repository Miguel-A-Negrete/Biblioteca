<?php
require_once "../conexion/Conexion.php";
require_once "../index.php";
class generos{
    public static function getAll(){
        $db= new Conexion();
        $query = "SELECT * FROM generos";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows) {
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'GeneroID'=>$row['GeneroID'],
                    'NombreGenero'=>$row['NombreGenero'],
                    'Descripcion'=>$row['Descripcion'],
                    'Popularidad'=>$row['Popularidad'],
                    'CantidadLibros'=>$row['CantidadLibros'],
                    'FechaCreacion'=>$row['FechaCreacion']
                ];
            }//end while
            return $datos;
        }//end if
        return $datos;
    }//end getAll

    public static function getWhere($GeneroID){
        $db= new Conexion();
        $query = "SELECT * FROM generos WHERE GeneroID=$GeneroID";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows) {
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'GeneroID'=>$row['GeneroID'],
                    'NombreGenero'=>$row['NombreGenero'],
                    'Descripcion'=>$row['Descripcion'],
                    'Popularidad'=>$row['Popularidad'],
                    'CantidadLibros'=>$row['CantidadLibros'],
                    'FechaCreacion'=>$row['FechaCreacion']
                ];
            }//end while
            return $datos;
        }//end if
        return $datos;
    }//end getWhere

    public static function insert($NombreGenero, $Descripcion, $Popularidad, $CantidadLibros, $FechaCreacion){
        $db = new Conexion();
        $query = "INSERT INTO generos (NombreGenero, Descripcion, Popularidad, CantidadLibros, FechaCreacion) 
        VALUES('".$NombreGenero."','".$Descripcion."','".$Popularidad."','".$CantidadLibros."','".$FechaCreacion."')";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;

        }return FALSE;//end if

    }//end insert

    public static function update ($GeneroID,$NombreGenero, $Descripcion, $Popularidad, $CantidadLibros, $FechaCreacion){
        $db = new Conexion();
        $query = "UPDATE generos SET
        NombreGenero='".$NombreGenero."',Descripcion='".$Descripcion."',Popularidad='".$Popularidad."',CantidadLibros='".$CantidadLibros."',FechaCreacion='".$FechaCreacion."'
        WHERE GeneroID=$GeneroID";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;

        }return FALSE;//end if

    }//end insert

    public static function delete($GeneroID){
        $db = new Conexion();
        $query = "DELETE FROM generos WHERE GeneroID = $GeneroID";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;
        }//end if
        return FALSE;

    }//end delete




}//end class genero