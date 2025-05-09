<?php
include './conexion.php';

$considerando = $_POST['considerando'];
$seSolicita = $_POST['seSolicita'];
$notas = $_POST['notas'];
$fecha = $_POST['fecha'];

// Insertar sin hash primero
$sql = "INSERT INTO acuerdo (considerando, seSolicita, notas, fecha)
        VALUES ('$considerando', '$seSolicita', '$notas', '$fecha')";

if ($conn->query($sql) === TRUE) {
    $id = $conn->insert_id;

    // Generar el hash con los datos + ID
    $hash = hash('md5', $considerando . $seSolicita . $notas . $id .$fecha );

    // Guardar el hash
    $conn->query("UPDATE acuerdo SET hash='$hash' WHERE id=$id");

    header('Location: ../indexAcuerdo.php');
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
