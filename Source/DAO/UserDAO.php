<?php
/*
EL PATRON DAO NOS DICE QUE POR CADA CLASE QUE HAY EN NUESTRO PROYECTO SE DEBE HACER UNA
CLASE DAO QUE ES LA ENCARGADA DE LAS TRANSACCIONES CON LA BASE DE DATOS PARA UNA TABLA
ESPECÍFICA.
*/

include_once "../Source/Connection/ConnectionDB.php";
require_once "../Source/Entities/User.php";

class UserDAO
{

    //Atributos
    var $conection;


    //Constructor
    public function UserDAO()
    {
    }



    //TRABAJAMOS LA SENTENCIA LOGIN
    public function login($objectUser)
    {
        $con = getConnection();

        $nomU = $objectUser->getNom();
        $passU = $objectUser->getPass();

        //Sentencia SQL para MODIFICAR los datos de un usuario
        $sql = "SELECT * FROM USUARIOS WHERE NOMBRE='$nomU' AND CONTRASEÑA='$passU'";

        $datesUser = $con->query($sql);

        foreach ($datesUser as $datosU) {
            $idU = $datosU[0];
        }

        if (is_null($idU)) {

            print '<script languaje="JavaScript"> alert("No se pudo iniciar sesión, credenciales incorrectas :c");</script>';
            $con = null;
            header("Location: index.php");
            die();
        } else {
            //Mostramos un mensaje de que se ha modificado los datos
            print '<script languaje="JavaScript"> alert("Bienvenido!");</script>';
            $logueo = true;
        }

        //Una vez concluida la sentencia CERRAMOS la comunicación con la BD
        $con = null;

        return $logueo;
    }


    //TRABAJAMOS EL CRUD (CREATE, READ, UPDATE and DELETE)
    public function insert($objectUser)
    {

        $con = getConnection();

        $nomU = $objectUser->getNom();
        $passU = $objectUser->getPass();

        //Sentencia SQL para INSERTAR datos
        $sql = "INSERT INTO USUARIOS VALUES('$nomU','$passU')";


        if (!$con->query($sql)) {
            print "Error al insertar un nuevo usuario";
        } else {
            //Mostramos la inserción
            print '<script languaje="JavaScript"> alert("Usuario Guardado!");</script>';
        }

        //Una vez concluida la sentencia CERRAMOS la comunicación con la BD
        $con = null;
    }



    //FUNCIÓN ELIMINAR
    public function delete($objectUser)
    {

        $con = getConnection();

        $idU = $objectUser->getId();

        //Sentencia SQL para ELIMINAR un usuario
        $sql = "DELETE FROM USUARIOS WHERE ID=$idU";


        if (!$con->query($sql)) {
            print "Error al eliminar";
        } else {
            //Mostramos la eliminación
            print '<script languaje="JavaScript"> alert("Usuario Eliminado!");</script>';
        }

        //Una vez concluida la sentencia CERRAMOS la comunicación con la BD
        $con = null;
    }



    //FUNCIÓN MODIFICAR
    public function update($objectUser)
    {
        $con = getConnection();

        $idU = $objectUser->getId();
        $nomU = $objectUser->getNom();
        $passU = $objectUser->getPass();

        //Sentencia SQL para MODIFICAR los datos de un usuario
        $sql = "UPDATE USUARIOS SET nombre='$nomU', contraseña='$passU' WHERE ID=$idU";

        if (!$con->query($sql)) {
            print "Error al actualizar los datos del usuarios";
        } else {
            //Mostramos un mensaje de que se ha modificado los datos
            print '<script languaje="JavaScript"> alert("Datos del Usuario Modificados!");</script>';
        }

        //Una vez concluida la sentencia CERRAMOS la comunicación con la BD
        $con = null;
    }



    //FUNCIÓN LEER
    public function selectAll()
    {
        $con = getConnection();

        //Sentencia SQL para MOSTRAR todos los usuarios registrados
        $sql = "SELECT * FROM USUARIOS";

        //Guardamos todos los usuarios que nos devuelve la base datos
        $listaUsuarios = $con->query($sql);

        $con = null;

        //Los datos lo representaremos en un tabla
        return $listaUsuarios;
    }
}
