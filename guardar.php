<?php

include 'Conexion.php';

$productos = json_decode($_POST['json']);
// var_dump($_POST['json']);
// var_dump($productos);
// var_dump($productos->{'data'});
// var_dump($productos->{'data'}[0]->{'producto'});

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = 'INSERT INTO producto (producto, stock, precio) VALUES (?, ?, ?)';
$statement = $cnn->prepare($sql);

$respuesta = false;
foreach ($productos->{'data'} as $producto) {
    // echo $producto->{'producto'} .'<br>';
    // echo $producto->{'precio'} .'<br>';

    $statement->bindParam(1, $producto->{'producto'}, PDO::PARAM_STR);
    $statement->bindParam(2, $producto->{'stock'}, PDO::PARAM_INT);
    $statement->bindParam(3, $producto->{'precio'}, PDO::PARAM_INT);
    $respuesta = $statement->execute();
}

echo $respuesta;

