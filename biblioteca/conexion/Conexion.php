<?php   

    class Conexion extends Mysqli {
        function __construct(){
            parent::__construct('localhost', 'root', '', 'biblioteca');
            $this->set_charset('utf8');
            $this->connect_error == NULL ? 'conexión exitosa': die('error de conexión');
        }
    }

    