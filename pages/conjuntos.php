<?php
require_once "../clases/Conjuntos.php";

$resultado = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = $_POST["conjuntoA"] ?? "";
    $b = $_POST["conjuntoB"] ?? "";

    $conj = new Conjuntos();
    $resultado = $conj->procesar($a, $b);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Operaciones con Conjuntos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="contenedor">
    <h2>Operaciones con Conjuntos A y B</h2>
    <form method="POST">
        <label>Conjunto A (números separados por coma o espacio):</label>
        <input type="text" name="conjuntoA" placeholder="Ej: 1 2 3 4" required>
        <label>Conjunto B (números separados por coma o espacio):</label>
        <input type="text" name="conjuntoB" placeholder="Ej: 3 4 5 6" required>
        <button type="submit">Calcular</button>
    </form>

    <?php if ($resultado): ?>
        <div class="resultado">
            <strong>A:</strong> <?= implode(", ", $resultado["A"]) ?><br>
            <strong>B:</strong> <?= implode(", ", $resultado["B"]) ?><br><br>
            <strong>Unión:</strong> <?= implode(", ", $resultado["union"]) ?><br>
            <strong>Intersección:</strong> <?= implode(", ", $resultado["interseccion"]) ?><br>
            <strong>A - B:</strong> <?= implode(", ", $resultado["AmenosB"]) ?><br>
            <strong>B - A:</strong> <?= implode(", ", $resultado["BmenosA"]) ?><br>
        </div>
    <?php endif; ?>
    <a class="volver" href="../index.php">Volver al menú</a>
</div>
</body>
</html>