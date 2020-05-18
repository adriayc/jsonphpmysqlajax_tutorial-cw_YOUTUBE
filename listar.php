<?php

include 'Conexion.php';

$conexion = new Conexion();
$cnn = $conexion->getConexion();

$sql = 'SELECT * FROM producto';
$statement = $cnn->prepare($sql);
$valor = $statement->execute();

if ($valor) {
    while ($resultado = $statement->fetch(PDO::FETCH_ASSOC)) {
        $data['data'][] = $resultado;
    }
    # json_encode: retorna la representacion JSON del valor dado
    # json_encode: se usa para codificar un valor en formato JSON
    echo json_encode($data);
} else {
    echo 'Error';
}

# closeCursor: cierra un cursor, habilitando a la sentencia para que sea ejecutado otra vez
$statement->closeCursor();
# Cerramos la conexion
$conexion = null;