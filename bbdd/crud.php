<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents(('php://input')), true);

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

$id =  isset($_POST["id"]) ? $_POST["id"] : "";
$nombre =  isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$sku =  isset($_POST["sku"]) ? $_POST["sku"] : "";
$valor =  isset($_POST["valor"]) ? $_POST["valor"] : "";
$stock =  isset($_POST["stock"]) ? $_POST["stock"] : "";

switch ($opcion) {
    case 1: //nuevo
        try {
            $consulta = "INSERT INTO productos (nombre, sku, stock, valor) VALUES ('$nombre', '$sku', '$stock', '$valor')";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
        } catch (PDOException $e) {
            echo 'Error al ejecutar la consulta: ' . $e->getMessage();
        }
        break;
    case 2: //modificación
        try {
            $consulta = "UPDATE productos SET nombre='$nombre', sku='$sku', valor='$valor', stock='$stock' WHERE id= '$id' ";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
        } catch (PDOException $e) {
            echo 'Error al ejecutar la consulta: ' . $e->getMessage();
        }
        break;
    case 3: //eliminar
        try {
            $consulta = "DELETE FROM productos WHERE id='$id' ";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
        } catch (PDOException $e) {
            echo 'Error al ejecutar la consulta: ' . $e->getMessage();
        }
        break;
    case 4: //listar
        try {
            $consulta = "SELECT id, nombre, sku, stock, valor FROM productos";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error al ejecutar la consulta: ' . $e->getMessage();
        }
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;
?>