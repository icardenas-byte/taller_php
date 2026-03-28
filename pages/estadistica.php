<?php
require_once "../clases/Estadistica.php";
$resultado = "";
$moda = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $entrada = $_POST["numeros"] ?? "";
    $est = new Estadistica();
    $nums = $est->parsear($entrada);

    if (!empty($nums)) {
        $prom = $est->promedio($nums);
        $med = $est->mediana($nums);
        $moda = $est->moda($nums);
        $resultado = "
            <strong>Promedio:</strong> $prom<br>
            <strong>Mediana:</strong> $med<br>
            <strong>Moda:</strong> " . implode(", ", $moda);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadística</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="contenedor">
    <h2>Cálculo de Promedio, Mediana y Moda</h2>
    <form method="POST">
        <label>Ingrese números separados por coma o espacio (se permiten decimales):</label>
        <textarea name="numeros" rows="4" placeholder="Ej: 2 5 7 7 10 o 2, 5, 7, 7, 10" required></textarea>
        <button type="submit">Calcular</button>
    </form>

    <?php if ($resultado !== ""): ?>
        <div class="resultado">
            <?= $resultado ?>
        </div>
    <?php endif; ?>
    <a class="volver" href="../index.php">Volver al menú</a>
</div>
</body>
</html>