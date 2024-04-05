<?php
require_once "../conexion/Conexion.php";
require_once "../index.php";

class editoriales{
    public static function getAll(){
        $db= new Conexion();
        $query = "SELECT * FROM editoriales";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows) {
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'EditorialID'=>$row['EditorialID'],
                    'Nombre'=>$row['Nombre'],
                    'Direccion'=>$row['Direccion'],
                    'Telefono'=>$row['Telefono'],
                    'Email'=>$row['Email'],
                    'SitioWeb'=>$row['SitioWeb']
                ];
            }//end while
            return $datos;
        }//end if
        return $datos;
    }//end getAll

    public static function getWhere($EditorialID){
        $db= new Conexion();
        $query = "SELECT * FROM editoriales WHERE EditorialID=$EditorialID";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows) {
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'EditorialID'=>$row['EditorialID'],
                    'Nombre'=>$row['Nombre'],
                    'Direccion'=>$row['Direccion'],
                    'Telefono'=>$row['Telefono'],
                    'Email'=>$row['Email'],
                    'SitioWeb'=>$row['SitioWeb']
                ];
            }//end while
            return $datos;
        }//end if
        return $datos;
    }//end getWhere

    public static function insert($Nombre, $Direccion, $Telefono, $Email, $SitioWeb){
        $db = new Conexion();
        $query = "INSERT INTO editoriales (Nombre, Direccion, Telefono, Email, SitioWeb) 
        VALUES('".$Nombre."','".$Direccion."','".$Telefono."','".$Email."','".$SitioWeb."')";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;

        }return FALSE;//end if

    }//end insert

    public static function update ($EditorialID,$Nombre, $Direccion, $Telefono, $Email, $SitioWeb){
        $db = new Conexion();
        $query = "UPDATE editoriales SET
        Nombre='".$Nombre."',Direccion='".$Direccion."',Telefono='".$Telefono."',email='".$Email."',SitioWeb='".$SitioWeb."'
        WHERE EditorialID=$EditorialID";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;

        }return FALSE;//end if

    }//end insert

    public static function delete($EditorialID){
        $db = new Conexion();
        $query = "DELETE FROM editoriales WHERE EditorialID = $EditorialID";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;
        }//end if
        return FALSE;

    }//end delete




}//end class editoriales