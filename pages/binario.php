<?php
require_once "../clases/Binario.php";

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $numero = $_POST["numero"] ?? "";
    $bin = new Binario();
    $resultado = $bin->convertir($numero);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversión a Binario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="contenedor">
    <h2>Convertir número entero a binario</h2>
    <form method="POST">
        <label>Ingrese un número entero:</label>
        <input type="number" name="numero" placeholder="Ej: 25" required>
        <button type="submit">Convertir</button>
    </form>

    <?php if ($resultado !== ""): ?>
        <div class="resultado">
            <strong>Binario:</strong> <?= $resultado ?>
        </div>
    <?php endif; ?>
    <a class="volver" href="../index.php">Volver al menú</a>
</div>
</body>
</html>