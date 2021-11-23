<?php
/*
EL PATRON DE DISEÑO DAO (DATA ACCESS OBJECT) NOS DICE QUE POR CADA UNA DE LAS
TABLAS QUE TENGAMOS EN LA BASE DE DATOS, CREAMOS UNA CLASE, LOS CAMPOS DE LA TABLA
SERÁN LOS ATRIBUTOS DE LA CLASE...
*/

class User
{

    //Atributos
    var $id;
    var $nomU;
    var $passU;

    //Constructor
    public function User()
    {
    }


    //Funciones Getter and Setter
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }



    public function getNom()
    {
        return $this->nomU;
    }
    public function setNom($nomU)
    {
        $this->nomU = $nomU;
    }



    public function getPass()
    {
        return $this->passU;
    }
    public function setPass($passU)
    {
        $this->passU = $passU;
    }
}
