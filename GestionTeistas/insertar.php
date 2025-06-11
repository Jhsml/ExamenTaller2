<?php
include 'conexion.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $apellido = $_POST['apellido'];
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $escuela_pro = $_POST['escuela_pro'];
        $disponible = isset($_POST['estado']) ? 1 : 0;

        $stmt = $conn->prepare("INSERT INTO tesista (apellido, nombre, dni, escuela_pro, estado) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisssi", $apellido, $nombre, $dni, $escuela_pro,$estado);
        $stmt->execute();
        $conn->commit();
        echo "<p> tesista insertado con éxito.</p>";
    }
} catch (Exception $e) {
    $conn->rollback();
    echo "<p>Error: " . $e->getMessage() . "</p>";
}
$stmt->close();
$conn->close();
header("Location: tabla.html");
exit();
?>