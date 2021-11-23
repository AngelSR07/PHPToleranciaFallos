<?php

require 'Parametros.php';


function getConnection()
{
    try {
        $conn = new PDO(HOST, USER, PASS);
    } catch (PDOException $e) {
        print("Error al intentar conectarse con la base de datos" + $e->intl_get_error_message);
        die(print_r($e));
    }

    return $conn;
}
