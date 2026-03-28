<?php
require_once "../clases/Calculadora.php";

$calc = new Calculadora();
$resultado = "";
$historial = $calc->obtenerHistorial();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = floatval($_POST["num1"]);
    $b = floatval($_POST["num2"]);
    $op = $_POST["operacion"];
    $resultado = $calc->operar($a, $b, $op);
    $texto = "$a $op $b = $resultado";
    $calc->guardarHistorial($texto);
    $historial = $calc->obtenerHistorial();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora con Historial</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="contenedor">
    <h2>Calculadora con Historial</h2>
    <form method="POST">
        <label>Número 1:</label>
        <input type="number" step="any" name="num1" required>
        <label>Número 2:</label>
        <input type="number" step="any" name="num2" required>
        <label>Operación:</label>
        <select name="operacion">
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
        </select>
        <button type="submit">Calcular</button>
    </form>

    <?php if ($resultado !== ""): ?>
        <div class="resultado">
            <strong>Resultado:</strong> <?= $resultado ?>
        </div>
    <?php endif; ?>
    <h3>Historial:</h3>
    <pre class="resultado"><?= $historial ?></pre>
    <a class="volver" href="../index.php">Volver al menú</a>
</div>
</body>
</html>