<?php
include './conexion.php';

$persona = $_POST['persona'];
$area = $_POST['area'];
$asunto = $_POST['asunto'];
$fecha = $_POST['fecha'];

// Insertar sin hash primero
$sql = "INSERT INTO registros (persona, area, asunto, fecha)
        VALUES ('$persona','$area','$asunto','$fecha')";

if ($conn->query($sql) === TRUE) {
    $id = $conn->insert_id;

    // Generar el hash con los datos + ID
    $hash = hash('md5', $persona . $area . $asunto . $id);

    // Guardar el hash
    $conn->query("UPDATE registros SET hash='$hash' WHERE id=$id");

    header('Location: ../indexOficios.php');
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
