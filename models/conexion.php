<?php

class Conexion {

    public function conectar () {
        
        $link = new PDO("mysql:host=localhost;dbname=2cursophp","root","");
        return $link;
    }
}

