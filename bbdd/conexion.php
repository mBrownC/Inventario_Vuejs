<?php
class Conexion
{
    public static function Conectar()
    {
        define('servidor', 'localhost');
        define('nombre_bbdd', 'inventariovuejs');
        define('usuario', 'inventariovuejs');
        define('password', 'Mm080520@');
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES 'utf8'");
    try{
        $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bbdd, usuario, password, $opciones);
        return $conexion;
    }catch(Exception $error){
        die("El Error de Conexión es: ".$error->getMessage());
    }
    }
}
