<?php
class Conexion
{
    public static function Conectar()
    {
        define('servidor', 'localhost'); // mantener servidor si se crea  en local
        define('nombre_bbdd', 'inventariovuejs'); // nombre de la base se mantiene si se crea en base al scrip enviado
        define('usuario', ' '); //ingresar su usuario de acceso a la base de datos
        define('password', ' '); //Ingresar contraseña del usuario anterior
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES 'utf8'");
    try{
        $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bbdd, usuario, password, $opciones);
        return $conexion;
    }catch(Exception $error){
        die("El Error de Conexión es: ".$error->getMessage());
    }
    }
}
