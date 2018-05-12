<?php 

require_once "conexion.php";

class Datos extends Conexion {
    
    // Registro de Usuarios
    public function registroUsuarioModel($datosModel, $tabla) {
        
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, email) VALUES (:usuario,:password,:email)");


        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "success" ;
        }
        else {
            return "error";
        }

        $stmt->close();
    }

    // Ingreso de Usuarios
    public function ingresoUsuarioModel ($datosModel, $tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT usuario, password, intentos FROM $tabla WHERE usuario=:usuario");
        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();
        $stmt->close();
    }

    // Intentos Usuarios
    public function intentosUsuarioModel ($datosModel, $tabla) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos =:intentos WHERE usuario = :usuario");
        $stmt->bindParam(":intentos", $datosModel["actualizarIntentos"], PDO::PARAM_INT);
        $stmt->bindParam(":usuario", $datosModel["usuarioActual"], PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->execute()) {
            return "success" ;
        }
        else {
            return "error";
        }

        $stmt->close();
    }

    // Vista de Usuarios

    public function vistaUsuarioModel ($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();

        return $stmt->fetchAll();
        $stmt->close();
    }

    public function editarUsuarioModel ($datosModel, $tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
    }

    public function actualizarUsuarioModel($datosModel, $tabla) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario =:usuario, password =:password, email =:email WHERE id = :id");
        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "success" ;
        }
        else {
            return "error";
        }

        $stmt->close();
    }
    
    // Borrar Usuario

    public function borrarUsuarioModel ($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id =:id");    
        $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "success" ;
        }
        else {
            return "error";
        }

        $stmt->close();
    }

    //Validar Usuarios existentes

    public function validarUsuarioModel($datosModel, $tabla) {

        $stmt = Conexion::conectar()->prepare("SELECT usuario FROM $tabla WHERE usuario =:usuario");    
        $stmt->bindParam(":usuario", $datosModel, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
    }


    // Validar Email Existentes

    public function validarEmailModel($datosModel, $tabla) {

        $stmt = conexion::conectar()->prepare("SELECT email FROM $tabla WHERE email = :email");
        $stmt->bindParam(":email", $datosModel, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
    }
}
